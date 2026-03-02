<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\ImageSetExtensionInterface;
use JsonSerializable;

/**
 * The ImageSet displays a collection of Images similar to a gallery. Acceptable
 * formats are PNG, JPEG, and GIF
 *
 * @since 1.0
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
     * Extensions to augment this element
     *
     * @var ImageSetExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "ImageSet" instance in a single call
     *
     * @param Image[] $images
     * @param ImageSetExtensionInterface[]|null $extensions
     */
    public function __construct(
        array $images,
        ?ImageSize $imageSize = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
        ?array $extensions = null,
    ) {
        $this->images = $images;
        $this->imageSize = $imageSize;
        $this->fallback = $fallback;
        $this->height = $height;
        $this->separator = $separator;
        $this->spacing = $spacing;
        $this->extensions = $extensions;
    }

    /**
     * Make a "ImageSet" instance in a single call
     *
     * @psalm-api
     *
     * @param Image[] $images
     * @param ImageSetExtensionInterface[]|null $extensions
     */
    public static function make(
        array $images,
        ?ImageSize $imageSize = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
        ?array $extensions = null,
    ): self {
        return new self(
            $images,
            $imageSize,
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
                    'images' => $this->images,
                    'imageSize' => $this->imageSize,
                    ...$extensionProperties,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
