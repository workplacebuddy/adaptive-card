<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * The ImageSet displays a collection of Images similar to a gallery. Acceptable
 * formats are PNG, JPEG, and GIF
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class ImageSet extends Element implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `ImageSet`
     *
     * @since 1.0
     */
    private const TYPE = 'ImageSet';

    /**
     * The array of `Image` elements to show.
     *
     * @var Image[]
     * @since 1.0
     */
    public array $images;

    /**
     * Controls the approximate size of each image. The physical dimensions will vary
     * per host. Auto and stretch are not supported for ImageSet. The size will default
     * to medium if those values are set.
     *
     * @since 1.0
     */
    public ?ImageSize $imageSize = null;

    /**
     * Make an instance in a single call
     *
     * @param Image[] $images
     */
    public static function make(
        array $images,
        ?ImageSize $imageSize = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ): self {
        $self = new self();

        $self->images = $images;
        $self->imageSize = $imageSize;
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
            array_filter([
                'type' => self::TYPE,
                'images' => $this->images,
                'imageSize' => $this->imageSize,
            ]),
        );
    }
}
