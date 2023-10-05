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
 * @psalm-suppress MissingConstructor
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
     * Mime type of associated media (e.g. `"video/mp4"`).
     *
     * @since 1.1
     */
    public string $mimeType;

    /**
     * URL to media. Supports data URI in version 1.2+
     *
     * @since 1.1
     */
    public string $url;

    /**
     * Make an instance in a single call
     */
    public static function make(string $mimeType, string $url): self
    {
        $self = new self();

        $self->mimeType = $mimeType;
        $self->url = $url;

        return $self;
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
