<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\MetadataExtensionInterface;
use JsonSerializable;

/**
 * Defines various metadata properties
 *
 * @since 1.6
 */
final class Metadata implements JsonSerializable
{
    /**
     * Must be `Metadata`
     *
     * @since 1.6
     */
    private const TYPE = 'Metadata';

    /**
     * URL that uniquely identifies the card and serves as a browser fallback that can
     * be used by some hosts.
     *
     * @since 1.6
     */
    public ?string $webUrl = null;

    /**
     * Extensions to augment this element
     *
     * @var MetadataExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "Metadata" instance in a single call
     *
     * @param MetadataExtensionInterface[]|null $extensions
     */
    public function __construct(
        ?string $webUrl = null,
        ?array $extensions = null,
    ) {
        $this->webUrl = $webUrl;
        $this->extensions = $extensions;
    }

    /**
     * Make a "Metadata" instance in a single call
     *
     * @psalm-api
     *
     * @param MetadataExtensionInterface[]|null $extensions
     */
    public static function make(
        ?string $webUrl = null,
        ?array $extensions = null,
    ): self {
        return new self($webUrl, $extensions);
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
                'webUrl' => $this->webUrl,
                ...$extensionProperties,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
