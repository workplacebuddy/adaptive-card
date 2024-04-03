<?php

declare(strict_types=1);

namespace AdaptiveCardGenerator\Command;

use Exception;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

#[
    AsCommand(
        name: 'adaptive-card:fetch-schema',
        description: 'Fetch a fresh Adaptive Card schema',
    ),
]
class FetchSchemaCommand extends Command
{
    private const SCHEMA = 'https://adaptivecards.io/schemas/adaptive-card.json';

    protected function execute(
        InputInterface $input,
        OutputInterface $output,
    ): int {
        $filesystem = new Filesystem();

        $schemaLocation = Path::canonicalize(__DIR__ . '/../../data');

        $filesystem->mkdir($schemaLocation, 0755);

        $schemaFilename = Path::canonicalize(
            __DIR__ . '/../../data/schema.json',
        );

        $schemaContents = @file_get_contents(self::SCHEMA);

        if ($schemaContents === false) {
            throw new RuntimeException('Could not fetch schema');
        }

        try {
            /** @var array $schemaData */
            $schemaData = json_decode(
                $schemaContents,
                true,
                512,
                JSON_THROW_ON_ERROR,
            );
        } catch (Exception $e) {
            throw new RuntimeException('Could not decode schema', 0, $e);
        }

        $filesystem->dumpFile(
            $schemaFilename,
            json_encode(
                $schemaData,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES,
            ) . "\n",
        );

        return 0;
    }
}
