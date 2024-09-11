<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

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
     * Create a "CaptionSource" instance in a single call
     */
    public function __construct(string $mimeType, string $url, string $label)
    {
        $this->mimeType = $mimeType;
        $this->url = $url;
        $this->label = $label;
    }

    /**
     * Make a "CaptionSource" instance in a single call
     *
     * @psalm-api
     */
    public static function make(
        string $mimeType,
        string $url,
        string $label,
    ): self {
        return new self($mimeType, $url, $label);
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'type' => self::TYPE,
                'mimeType' => $this->mimeType,
                'url' => $this->url,
                'label' => $this->label,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
