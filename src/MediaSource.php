<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

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
     * Create a "MediaSource" instance in a single call
     */
    public function __construct(string $url, ?string $mimeType = null)
    {
        $this->url = $url;
        $this->mimeType = $mimeType;
    }

    /**
     * Make a "MediaSource" instance in a single call
     *
     * @psalm-api
     */
    public static function make(string $url, ?string $mimeType = null): self
    {
        return new self($url, $mimeType);
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
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
