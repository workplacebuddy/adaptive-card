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
     * URL of an image to display before playing. Supports data URI in version 1.2+. If
     * poster is omitted, the Media element will either use a default poster
     * (controlled by the host application) or will attempt to automatically pull the
     * poster from the target video service when the source URL points to a video from
     * a Web provider such as YouTube.
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
     * Array of captions sources for the media element to provide.
     *
     * @var CaptionSource[]|null
     * @since 1.6
     */
    public ?array $captionSources = null;

    /**
     * Create a "Media" instance in a single call
     *
     * @param MediaSource[] $sources
     * @param CaptionSource[]|null $captionSources
     */
    public function __construct(
        array $sources,
        ?string $poster = null,
        ?string $altText = null,
        ?array $captionSources = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ) {
        $this->sources = $sources;
        $this->poster = $poster;
        $this->altText = $altText;
        $this->captionSources = $captionSources;
        $this->fallback = $fallback;
        $this->height = $height;
        $this->separator = $separator;
        $this->spacing = $spacing;
    }

    /**
     * Make a "Media" instance in a single call
     *
     * @psalm-api
     *
     * @param MediaSource[] $sources
     * @param CaptionSource[]|null $captionSources
     */
    public static function make(
        array $sources,
        ?string $poster = null,
        ?string $altText = null,
        ?array $captionSources = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ): self {
        return new self(
            $sources,
            $poster,
            $altText,
            $captionSources,
            $fallback,
            $height,
            $separator,
            $spacing,
        );
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
                    'captionSources' => $this->captionSources,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
