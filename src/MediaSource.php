<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\MediaSourceExtensionInterface;
use JsonSerializable;

/**
 * Defines a source for a Media element
 *
 * @since 1.1
 */
final class MediaSource implements JsonSerializable
{
    /**
     * Must be `MediaSource`
     *
     * @since 1.1
     */
    private const TYPE = 'MediaSource';

    /**
     * Mime type of associated media (e.g. `"video/mp4"`). For YouTube and other Web
     * video URLs, `mimeType` can be omitted.
     *
     * @since 1.1
     */
    public ?string $mimeType = null;

    /**
     * URL to media. Supports data URI in version 1.2+
     *
     * @since 1.1
     */
    public string $url;

    /**
     * Extensions to augment this element
     *
     * @var MediaSourceExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "MediaSource" instance in a single call
     *
     * @param MediaSourceExtensionInterface[]|null $extensions
     */
    public function __construct(
        string $url,
        ?string $mimeType = null,
        ?array $extensions = null,
    ) {
        $this->url = $url;
        $this->mimeType = $mimeType;
        $this->extensions = $extensions;
    }

    /**
     * Make a "MediaSource" instance in a single call
     *
     * @psalm-api
     *
     * @param MediaSourceExtensionInterface[]|null $extensions
     */
    public static function make(
        string $url,
        ?string $mimeType = null,
        ?array $extensions = null,
    ): self {
        return new self($url, $mimeType, $extensions);
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
                'mimeType' => $this->mimeType,
                'url' => $this->url,
                ...$extensionProperties,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
