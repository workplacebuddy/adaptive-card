<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Displays a media player for audio or video content.
 *
 * @since 1.1
 * @psalm-suppress MissingConstructor
 */
final class Media extends Element implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `Media`
     *
     * @since 1.1
     */
    private const TYPE = 'Media';

    /**
     * Array of media sources to attempt to play.
     *
     * @var MediaSource[]
     * @since 1.1
     */
    public array $sources;

    /**
     * URL of an image to display before playing. Supports data URI in version 1.2+
     *
     * @since 1.1
     */
    public ?string $poster = null;

    /**
     * Alternate text describing the audio or video.
     *
     * @since 1.1
     */
    public ?string $altText = null;

    /**
     * Make an instance in a single call
     *
     * @param MediaSource[] $sources
     */
    public static function make(
        array $sources,
        ?string $poster = null,
        ?string $altText = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ): self {
        $self = new self();

        $self->sources = $sources;
        $self->poster = $poster;
        $self->altText = $altText;
        $self->fallback = $fallback;
        $self->height = $height;
        $self->separator = $separator;
        $self->spacing = $spacing;

        return $self;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            array_filter(
                [
                    'type' => self::TYPE,
                    'sources' => $this->sources,
                    'poster' => $this->poster,
                    'altText' => $this->altText,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
