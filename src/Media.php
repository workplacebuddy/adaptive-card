<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\MediaExtensionInterface;
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
     * Extensions to augment this element
     *
     * @var MediaExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "Media" instance in a single call
     *
     * @param MediaSource[] $sources
     * @param CaptionSource[]|null $captionSources
     * @param MediaExtensionInterface[]|null $extensions
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
        ?array $extensions = null,
    ) {
        $this->sources = $sources;
        $this->poster = $poster;
        $this->altText = $altText;
        $this->captionSources = $captionSources;
        $this->fallback = $fallback;
        $this->height = $height;
        $this->separator = $separator;
        $this->spacing = $spacing;
        $this->extensions = $extensions;
    }

    /**
     * Make a "Media" instance in a single call
     *
     * @psalm-api
     *
     * @param MediaSource[] $sources
     * @param CaptionSource[]|null $captionSources
     * @param MediaExtensionInterface[]|null $extensions
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
        ?array $extensions = null,
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
            $extensions,
        );
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

        return array_merge(
            parent::jsonSerialize(),
            array_filter(
                [
                    'type' => self::TYPE,
                    'sources' => $this->sources,
                    'poster' => $this->poster,
                    'altText' => $this->altText,
                    'captionSources' => $this->captionSources,
                    ...$extensionProperties,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
