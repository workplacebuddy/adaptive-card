<?php

declare(strict_types=1);

namespace AdaptiveCardGenerator\Command;

use JsonSerializable;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Constant;
use Nette\PhpGenerator\EnumType;
use Nette\PhpGenerator\Literal;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\Property;
use Nette\PhpGenerator\PsrPrinter;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\String\UnicodeString;

/**
 * Highly specific generation command from the Adaptive Card schema
 *
 * Makes a bunch of assumptions that might not be true anymore in the next version of the schema
 *
 * @psalm-type TProperty = array{
 *     version?: string,
 *     description?: ?string,
 *     type?: string,
 *     anyOf?: array<array{
 *         type?: string,
 *         $ref?: string,
 *         enum?: string[],
 *     }>,
 *     $ref?: string,
 *     items?: array{
 *         $ref: string,
 *     },
 * }
 *
 * @psalm-type TDefinition = array{
 *     description?: ?string,
 *     version?: string,
 *     properties?: array<string, TProperty>,
 *     anyOf?: array<array{
 *         allOf?: array<array{
 *             $ref: string,
 *         }>,
 *         enum?: string[],
 *     }>,
 *     allOf?: array<array{
 *         $ref?: string,
 *     }>,
 *     $ref?: string,
 *     required?: string[],
 * }
 */
#[
    AsCommand(
        name: 'adaptive-card:generate',
        description: 'Generate Adaptive Card classes/enums',
    ),
]
class GenerateCommand extends Command
{
    private const SCHEMA = 'http://adaptivecards.io/schemas/adaptive-card.json';
    private const BASE_NAMESPACE = 'AdaptiveCard';

    protected function execute(
        InputInterface $input,
        OutputInterface $output,
    ): int {
        $filesystem = new Filesystem();

        $baseLocation = Path::canonicalize(__DIR__ . '/../../../src');

        $schemaFilename = Path::canonicalize(
            __DIR__ . '/../../data/schema.json',
        );

        /**
         * @psalm-var array{definitions: array<string, TDefinition>} $schema
         */
        $schema = json_decode(file_get_contents($schemaFilename), true);

        /** @var array<string, array{string, PhpFile}> $generated */
        $generated = [];

        /** @var array<string, array<array{string, PhpFile}>> $implementations */
        $implementations = [];

        /** @var array<string, array<array{fullType: string, property: Property}>> $parentProperties */
        $parentProperties = [];

        $generated['Version'] = $this->generateVersionEnum();

        foreach ($schema['definitions'] as $definitionName => $definition) {
            if (strpos($definitionName, 'ImplementationsOf.') === false) {
                continue;
            }

            $info = $this->generatePhpFile(
                $definitionName,
                $schema['definitions'][$definitionName],
                [],
                [],
            );

            if (isset($definition['anyOf'])) {
                foreach ($definition['anyOf'] as $type) {
                    if (!isset($type['allOf'])) {
                        continue;
                    }

                    $targetDefinitionName = str_replace(
                        '#/definitions/',
                        '',
                        $type['allOf'][0]['$ref'],
                    );

                    if (!isset($implementations[$targetDefinitionName])) {
                        $implementations[$targetDefinitionName] = [];
                    }

                    $implementations[$targetDefinitionName][] = $info;
                }
            }

            $generated[$definitionName] = $info;
        }

        foreach ($schema['definitions'] as $definitionName => $definition) {
            if (strpos($definitionName, 'Extendable.') === false) {
                continue;
            }

            $info = $this->generatePhpFile(
                $definitionName,
                $definition,
                $implementations,
                [],
            );

            $parentProperties[$definitionName] = $info[2];

            $generated[$definitionName] = $info;
        }

        foreach ($schema['definitions'] as $definitionName => $definition) {
            if (strpos($definitionName, 'ImplementationsOf.') === 0) {
                continue;
            }

            if (strpos($definitionName, 'Extendable.') === 0) {
                continue;
            }

            $generated[$definitionName] = $this->generatePhpFile(
                $definitionName,
                $definition,
                $implementations,
                $parentProperties,
            );
        }

        $filesystem->remove($baseLocation);
        $filesystem->mkdir($baseLocation, 0755);

        $printer = new PsrPrinter();

        foreach ($generated as $info) {
            $phpFilename =
                $baseLocation .
                '/' .
                preg_replace(
                    '/^' . self::BASE_NAMESPACE . '\//',
                    '',
                    str_replace('\\', '/', $info[0]),
                ) .
                '.php';

            $filesystem->dumpFile($phpFilename, $printer->printFile($info[1]));
        }

        return 0;
    }

    /**
     * Generate a version enum
     *
     * @return array{string, PhpFile, array<array{fullType: string, property: Property}>}
     */
    private function generateVersionEnum()
    {
        $phpFile = new PhpFile();
        $phpFile->setStrictTypes(true);

        $phpFile->addComment(
            'This is a generated file, do not modify this by hand.',
        );

        $phpNamespace = $phpFile->addNamespace(self::BASE_NAMESPACE);

        $enumName = 'Version';

        $phpEnum = $phpNamespace->addEnum($enumName);
        $phpEnum->addComment('Minimal schema version');

        $versions = [
            'Version10' => '1.0',
            'Version11' => '1.1',
            'Version12' => '1.2',
            'Version13' => '1.3',
            'Version14' => '1.4',
            'Version15' => '1.5',
        ];

        foreach ($versions as $caseName => $caseValue) {
            $phpEnum->addCase($caseName, $caseValue);
        }

        return [$enumName, $phpFile, []];
    }

    /**
     * @param string $definitionName
     * @param array $definition
     * @psalm-param TDefinition $definition
     * @param array<string, array<array{string, PhpFile}>> $implementations
     * @psalm-param array<string, array<array{fullType: string, property: Property}>> $parentProperties
     * @return array{string, PhpFile, array<array{fullType: string, property: Property}>}
     */
    private function generatePhpFile(
        string $definitionName,
        array $definition,
        array $implementations,
        array $parentProperties,
    ): array {
        $phpFile = new PhpFile();
        $phpFile->setStrictTypes(true);

        $phpFile->addComment(
            'This is a generated file, do not modify this by hand.',
        );

        $namespace = self::BASE_NAMESPACE;

        $className = preg_replace(
            ['/^Extendable\./', '/^ImplementationsOf\.(.*)$/'],
            ['', '$1Interface'],
            $definitionName,
        );

        if (str_contains($className, '.')) {
            $namespaceParts = explode('.', $className);
            $className = array_pop($namespaceParts);

            if (!empty($namespaceParts)) {
                $namespace .= '\\' . implode('\\', $namespaceParts);
            }
        }

        $phpNamespace = $phpFile->addNamespace($namespace);

        $isExtentable = str_contains($definitionName, 'Extendable.');
        $isInterface = str_contains($definitionName, 'ImplementationsOf.');
        $isExtending = false;

        if ($isInterface) {
            $phpNamespace->addInterface($className);

            return [$phpNamespace->resolveName($className), $phpFile, []];
        }

        $fullClassName = $phpNamespace->resolveName($className);

        $isEnumAdded = $this->maybeAddEnum(
            $phpNamespace,
            $className,
            $definition,
        );

        if ($isEnumAdded) {
            return [$fullClassName, $phpFile, []];
        }

        if (isset($definition['anyOf'])) {
            foreach ($definition['anyOf'] as $type) {
                if (isset($type['type']) && $type['type'] === 'object') {
                    $description =
                        $type['description'] ??
                        ($definition['description'] ?? null);
                    $definition = $type;
                    $definition['description'] = $description;

                    break;
                }
            }
        }

        $phpNamespace->addUse(JsonSerializable::class);

        $phpClass = $phpNamespace->addClass($className);
        $phpClass->addImplement(JsonSerializable::class);

        if (isset($implementations[$definitionName])) {
            foreach ($implementations[$definitionName] as $implementation) {
                $phpNamespace->addUse($implementation[0]);
                $phpClass->addImplement($implementation[0]);
            }
        }

        if ($isExtentable) {
            $phpClass->setAbstract(true);
        } else {
            $phpClass->setFinal(true);
        }

        $this->addDescription($phpClass, $definition);
        $phpClass->addComment('@since ' . ($definition['version'] ?? '1.0'));
        $phpClass->addComment('@psalm-suppress MissingConstructor');

        $currentParentProperties = [];
        if (isset($definition['allOf'])) {
            $isExtending = true;

            $phpExtendClass = $this->resolveType(
                $phpNamespace,
                $definition['allOf'][0],
            );

            $phpNamespace->addUse($phpExtendClass);
            $phpClass->setExtends($phpExtendClass);

            if (isset($definition['allOf'][0]['$ref'])) {
                $targetDefinitionName = str_replace(
                    '#/definitions/',
                    '',
                    $definition['allOf'][0]['$ref'],
                );

                $currentParentProperties =
                    $parentProperties[$targetDefinitionName] ?? [];
            }
        }

        if (isset($definition['properties'])) {
            [$hasType, $hasSchema, $ownProperties] = $this->addProperties(
                $phpNamespace,
                $phpClass,
                $isExtending,
                $definitionName,
                $definition,
                $definition['properties'],
            );
        } else {
            $hasType = false;
            $hasSchema = false;
            $ownProperties = [];
        }

        if (!$isExtentable) {
            $this->addTheMaker($phpClass, [
                ...$ownProperties,
                ...$currentParentProperties,
            ]);
        }

        $this->addJsonSerialize(
            $phpClass,
            hasType: $hasType,
            hasSchema: $hasSchema,
            isExtending: $isExtending,
            ownProperties: $ownProperties,
        );

        return [$fullClassName, $phpFile, $ownProperties];
    }

    /**
     * @param array $definition
     * @psalm-param TDefinition $definition
     * @psalm-param array<string, TProperty> $properties
     * @return array{bool, bool, array<array{fullType: string, property: Property}>}
     */
    private function addProperties(
        PhpNamespace $phpNamespace,
        ClassType $phpClass,
        bool $isExtending,
        string $definitionName,
        array $definition,
        array $properties,
    ): array {
        $hasType = false;
        $hasSchema = false;
        $ownProperties = [];

        foreach ($properties as $propertyName => $property) {
            if ($propertyName === '$schema') {
                $hasSchema = true;

                $phpConstant = $phpClass->addConstant('SCHEMA', self::SCHEMA);
                $phpConstant->setPrivate();
                $this->addDescription($phpConstant, $property);

                continue;
            }

            if ($propertyName === 'type') {
                $hasType = true;

                $phpConstant = $phpClass->addConstant('TYPE', $definitionName);
                $phpConstant->setPrivate();
                $this->addDescription($phpConstant, $property);
                $phpConstant->addComment(
                    '@since ' . ($definition['version'] ?? '1.0'),
                );

                continue;
            }

            // typo in the schema
            if ($propertyName === 'rtl?') {
                $propertyName = 'rtl';
            }

            // assume it available in the parent
            if ($isExtending && empty($property)) {
                continue;
            }

            $phpProperty = $phpClass->addProperty($propertyName);
            $this->addDescription($phpProperty, $property);

            $isNullable =
                array_search($propertyName, $definition['required'] ?? []) ===
                false;
            $phpProperty->setNullable($isNullable);

            if ($isNullable) {
                $phpProperty->setValue(null);
            }

            $fullType = null;

            if (isset($property['anyOf'])) {
                $types = array_filter(
                    array_map(
                        fn(array $t) => $this->resolveType($phpNamespace, $t),
                        $property['anyOf'],
                    ),
                    fn(mixed $t) => $t !== 'null',
                );

                if (in_array('object', $types)) {
                    $types[] = 'array';
                }

                $phpProperty->setType(implode('|', $types));
            }

            if (isset($property['$ref'])) {
                $phpProperty->setType(
                    $this->resolveType($phpNamespace, $property),
                );
            }

            if ($propertyName === 'version') {
                $fullType = $this->resolveType(
                    $phpNamespace,
                    ['$ref' => '#/definitions/Version'],
                    true,
                );

                $phpProperty->setType($fullType);
                $phpProperty->setNullable(false);
                $phpProperty->setValue(new Literal('Version::Version10'));
            } elseif (isset($property['type'])) {
                if ($property['type'] === 'array') {
                    $phpProperty->setType('array');

                    if (isset($property['items'])) {
                        $arrayType =
                            $this->resolveType(
                                $phpNamespace,
                                $property['items'],
                                false,
                            ) . '[]';
                    } else {
                        $arrayType = 'array';
                    }

                    $fullType = $arrayType;

                    if ($isNullable) {
                        $arrayType .= '|null';
                    }

                    $phpProperty->addComment('@var ' . $arrayType);
                } elseif ($property['type'] === 'boolean') {
                    $phpProperty->setType('bool');
                } elseif ($property['type'] === 'string') {
                    $phpProperty->setType('string');
                } elseif ($property['type'] === 'object') {
                    $phpProperty->setType('object|array');
                } elseif ($property['type'] === 'number') {
                    $phpProperty->setType('int');
                }
            }

            if ($fullType === null) {
                $fullType = (string) $phpProperty->getType();
            }

            $phpProperty->addComment(
                '@since ' .
                    ($property['version'] ?? ($definition['version'] ?? '1.0')),
            );

            if ($propertyName !== '$schema') {
                $ownProperties[] = [
                    'fullType' => $fullType,
                    'property' => $phpProperty,
                ];
            }
        }

        return [$hasType, $hasSchema, $ownProperties];
    }

    /**
     * @psalm-param TDefinition $definition
     */
    private function maybeAddEnum(
        PhpNamespace $phpNamespace,
        string $className,
        array $definition,
    ): bool {
        if (isset($definition['anyOf'])) {
            foreach ($definition['anyOf'] as $type) {
                if (isset($type['enum'])) {
                    $phpEnum = $phpNamespace->addEnum($className);

                    $this->addDescription($phpEnum, $definition);

                    $phpEnum->addComment(
                        '@since ' . ($definition['version'] ?? '1.0'),
                    );

                    foreach ($type['enum'] as $enumCase) {
                        $caseName = new UnicodeString($enumCase);
                        $phpEnum->addCase(
                            (string) $caseName->camel()->title(),
                            $enumCase,
                        );
                    }

                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param array<array{fullType: string, property: Property}> $properties
     */
    private function addTheMaker(ClassType $phpClass, array $properties): void
    {
        $phpMethod = $phpClass->addMethod('make');
        $phpMethod->setStatic();
        $phpMethod->addComment('Make an instance in a single call');
        $phpMethod->addComment('');
        $phpMethod->setReturnType('self');

        $sorted = $properties;

        // move all the required arguments to the top
        usort(
            $sorted,
            /**
             * @param array{fullType: string, property: Property} $one
             * @param array{fullType: string, property: Property} $two
             */
            fn(array $one, array $two) => $one['property']->isNullable() <=>
                $two['property']->isNullable(),
        );

        foreach ($sorted as $property) {
            $propertyName = $property['property']->getName();
            $phpParameter = $phpMethod->addParameter($propertyName);

            $type = (string) $property['property']->getType();
            $phpParameter->setType($type);

            if ($type === 'array') {
                $arrayType = $property['fullType'];

                if ($property['property']->isNullable()) {
                    $arrayType .= '|null';
                }

                $phpMethod->addComment(
                    '@param ' . $arrayType . ' $' . $propertyName,
                );
            }

            if ($property['property']->getName() === 'version') {
                $phpParameter->setDefaultValue(
                    new Literal('Version::Version10'),
                );
            } elseif ($property['property']->isNullable()) {
                $phpParameter->setNullable();
                $phpParameter->setDefaultValue(null);
            }
        }

        $body = <<<BODY
        \$self = new self();

        BODY;

        foreach ($sorted as $property) {
            $propertyName = $property['property']->getName();
            $body .= <<<BODY

            \$self->$propertyName = \$$propertyName;
            BODY;
        }

        $body .= <<<BODY


        return \$self;
        BODY;

        $phpMethod->setBody($body);
    }

    /**
     * @param array<array{fullType: string, property: Property}> $ownProperties
     */
    private function addJsonSerialize(
        ClassType $phpClass,
        bool $hasType,
        bool $hasSchema,
        bool $isExtending,
        array $ownProperties,
    ): void {
        $phpMethod = $phpClass->addMethod('jsonSerialize');
        $phpMethod->addComment(
            'Specify data which should be serialized to JSON',
        );
        $phpMethod->setReturnType('array');

        if ($isExtending) {
            $body = <<<BODY
            return array_merge(parent::jsonSerialize(), array_filter([
            BODY;
        } else {
            $body = <<<BODY
            return array_filter([
            BODY;
        }

        if ($hasType) {
            $body .= <<<BODY

                'type' => self::TYPE,
            BODY;
        }

        if ($hasSchema) {
            $body .= <<<BODY

                '\$schema' => self::SCHEMA,
            BODY;
        }

        foreach ($ownProperties as $property) {
            $propertyName = $property['property']->getName();

            $body .= <<<BODY

                '$propertyName' => \$this->$propertyName,
            BODY;
        }

        if ($isExtending) {
            $body .= <<<BODY

            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed \$value): bool => \$value !== null));
            BODY;
        } else {
            $body .= <<<BODY

            ]);
            BODY;
        }

        $phpMethod->setBody($body);
    }

    /**
     * @param ClassType|Constant|Property|EnumType $node
     * @param array{description?: ?string} $item
     */
    private function addDescription(
        ClassType|Constant|Property|EnumType $node,
        $item,
    ): void {
        $description = $item['description'] ?? null;

        if (empty($description)) {
            return;
        }

        $description = new UnicodeString($description);
        $descriptionParts = $description->wordwrap(80);

        $node->addComment((string) $descriptionParts);
        $node->addComment('');
    }

    /**
     * Black magic method to generate a valid type
     *
     * @param array{$ref?: string, type?: string} $info
     */
    private function resolveType(
        PhpNamespace $phpNamespace,
        array $info,
        bool $resolve = true,
    ): string {
        $phpBaseNamespace = new PhpNamespace(self::BASE_NAMESPACE);

        if (isset($info['$ref'])) {
            $replaced = preg_replace(
                [
                    '@#/definitions/ImplementationsOf.(\w+)@i',
                    '@#/definitions/Extendable.(\w+)$@i',
                    '@#/definitions/([\w.]+)$@i',
                ],
                ['$1Interface', '$1', '$1'],
                $info['$ref'],
            );

            $className = str_replace('.', '\\', $replaced);

            $resolvedClassName = $phpBaseNamespace->resolveName($className);

            $hasClass = false;
            foreach ($phpNamespace->getClasses() as $classLike) {
                if ($classLike->getName() === $className) {
                    $hasClass = true;
                    break;
                }
            }

            if (!$hasClass) {
                $phpNamespace->addUse($resolvedClassName);
            }

            if ($resolve) {
                return $resolvedClassName;
            } else {
                return $className;
            }
        } elseif (isset($info['type'])) {
            return match ($info['type']) {
                'boolean' => 'bool',
                'number' => 'int',
                default => $info['type'],
            };
        } else {
            return '';
        }
    }
}
