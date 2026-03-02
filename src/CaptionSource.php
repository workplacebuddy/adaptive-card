<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\CaptionSourceExtensionInterface;
use JsonSerializable;

/**
 * Defines a source for captions
 *
 * @since 1.6
 */
final class CaptionSource implements JsonSerializable
{
    /**
     * Must be `CaptionSource`
     *
     * @since 1.6
     */
    private const TYPE = 'CaptionSource';

    /**
     * Mime type of associated caption file (e.g. `"vtt"`). For rendering in
     * JavaScript, only `"vtt"` is supported, for rendering in UWP, `"vtt"` and `"srt"`
     * are supported.
     *
     * @since 1.6
     */
    public string $mimeType;

    /**
     * URL to captions.
     *
     * @since 1.6
     */
    public string $url;

    /**
     * Label of this caption to show to the user.
     *
     * @since 1.6
     */
    public string $label;

    /**
     * Extensions to augment this element
     *
     * @var CaptionSourceExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "CaptionSource" instance in a single call
     *
     * @param CaptionSourceExtensionInterface[]|null $extensions
     */
    public function __construct(
        string $mimeType,
        string $url,
        string $label,
        ?array $extensions = null,
    ) {
        $this->mimeType = $mimeType;
        $this->url = $url;
        $this->label = $label;
        $this->extensions = $extensions;
    }

    /**
     * Make a "CaptionSource" instance in a single call
     *
     * @psalm-api
     *
     * @param CaptionSourceExtensionInterface[]|null $extensions
     */
    public static function make(
        string $mimeType,
        string $url,
        string $label,
        ?array $extensions = null,
    ): self {
        return new self($mimeType, $url, $label, $extensions);
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
                'label' => $this->label,
                ...$extensionProperties,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
