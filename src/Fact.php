<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\FactExtensionInterface;
use JsonSerializable;

/**
 * Describes a Fact in a FactSet as a key/value pair.
 *
 * @since 1.0
 */
final class Fact implements JsonSerializable
{
    /**
     * Must be `Fact`
     *
     * @since 1.0
     */
    private const TYPE = 'Fact';

    /**
     * The title of the fact.
     *
     * @since 1.0
     */
    public string $title;

    /**
     * The value of the fact.
     *
     * @since 1.0
     */
    public string $value;

    /**
     * Extensions to augment this element
     *
     * @var FactExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "Fact" instance in a single call
     *
     * @param FactExtensionInterface[]|null $extensions
     */
    public function __construct(
        string $title,
        string $value,
        ?array $extensions = null,
    ) {
        $this->title = $title;
        $this->value = $value;
        $this->extensions = $extensions;
    }

    /**
     * Make a "Fact" instance in a single call
     *
     * @psalm-api
     *
     * @param FactExtensionInterface[]|null $extensions
     */
    public static function make(
        string $title,
        string $value,
        ?array $extensions = null,
    ): self {
        return new self($title, $value, $extensions);
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        $extensionProperties = [];

        foreach ($this->extensions ?? [] as $extension) {
            $extensionProperties = array_merge_recursive(
                $extensionProperties,
                $extension->getExtensionProperties(),
            );
        }

        return array_filter(
            [
                'type' => self::TYPE,
                'title' => $this->title,
                'value' => $this->value,
                ...$extensionProperties,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
