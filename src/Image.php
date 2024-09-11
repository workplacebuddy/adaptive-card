<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Displays an image. Acceptable formats are PNG, JPEG, and GIF
 *
 * @since 1.0
 */
final class Image implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `Image`
     *
     * @since 1.0
     */
    private const TYPE = 'Image';

    /**
     * The URL to the image. Supports data URI in version 1.2+
     *
     * @since 1.0
     */
    public string $url;

    /**
     * Alternate text describing the image.
     *
     * @since 1.0
     */
    public ?string $altText = null;

    /**
     * Applies a background to a transparent image. This property will respect the
     * image style.
     *
     * @since 1.1
     */
    public ?string $backgroundColor = null;

    /**
     * The desired height of the image. If specified as a pixel value, ending in 'px',
     * E.g., 50px, the image will distort to fit that exact height. This overrides the
     * `size` property.
     *
     * @since 1.1
     */
    public string|BlockElementHeight|null $height = null;

    /**
     * Controls how this element is horizontally positioned within its parent. When not
     * specified, the value of horizontalAlignment is inherited from the parent
     * container. If no parent container has horizontalAlignment set, it defaults to
     * Left.
     *
     * @since 1.0
     */
    public ?HorizontalAlignment $horizontalAlignment = null;

    /**
     * An Action that will be invoked when the `Image` is tapped or selected.
     * `Action.ShowCard` is not supported.
     *
     * @since 1.1
     */
    public ?ISelectActionInterface $selectAction = null;

    /**
     * Controls the approximate size of the image. The physical dimensions will vary
     * per host.
     *
     * @since 1.0
     */
    public ?ImageSize $size = null;

    /**
     * Controls how this `Image` is displayed.
     *
     * @since 1.0
     */
    public ?ImageStyle $style = null;

    /**
     * The desired on-screen width of the image, ending in 'px'. E.g., 50px. This
     * overrides the `size` property.
     *
     * @since 1.1
     */
    public ?string $width = null;

    /**
     * Describes what to do when an unknown element is encountered or the requires of
     * this or any children can't be met.
     *
     * @since 1.2
     */
    public ElementInterface|FallbackOption|null $fallback = null;

    /**
     * When `true`, draw a separating line at the top of the element.
     *
     * @since 1.0
     */
    public ?bool $separator = null;

    /**
     * Controls the amount of spacing between this element and the preceding element.
     *
     * @since 1.0
     */
    public ?Spacing $spacing = null;

    /**
     * A unique identifier associated with the item.
     *
     * @since 1.0
     */
    public ?string $id = null;

    /**
     * If `false`, this item will be removed from the visual tree.
     *
     * @since 1.2
     */
    public ?bool $isVisible = null;

    /**
     * A series of key/value pairs indicating features that the item requires with
     * corresponding minimum version. When a feature is missing or of insufficient
     * version, fallback is triggered.
     *
     * @since 1.2
     */
    public object|array|null $requires = null;

    /**
     * Create a "Image" instance in a single call
     */
    public function __construct(
        string $url,
        ?string $altText = null,
        ?string $backgroundColor = null,
        string|BlockElementHeight|null $height = null,
        ?HorizontalAlignment $horizontalAlignment = null,
        ?ISelectActionInterface $selectAction = null,
        ?ImageSize $size = null,
        ?ImageStyle $style = null,
        ?string $width = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
        ?string $id = null,
        ?bool $isVisible = null,
        object|array|null $requires = null,
    ) {
        $this->url = $url;
        $this->altText = $altText;
        $this->backgroundColor = $backgroundColor;
        $this->height = $height;
        $this->horizontalAlignment = $horizontalAlignment;
        $this->selectAction = $selectAction;
        $this->size = $size;
        $this->style = $style;
        $this->width = $width;
        $this->fallback = $fallback;
        $this->separator = $separator;
        $this->spacing = $spacing;
        $this->id = $id;
        $this->isVisible = $isVisible;
        $this->requires = $requires;
    }

    /**
     * Make a "Image" instance in a single call
     *
     * @psalm-api
     */
    public static function make(
        string $url,
        ?string $altText = null,
        ?string $backgroundColor = null,
        string|BlockElementHeight|null $height = null,
        ?HorizontalAlignment $horizontalAlignment = null,
        ?ISelectActionInterface $selectAction = null,
        ?ImageSize $size = null,
        ?ImageStyle $style = null,
        ?string $width = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
        ?string $id = null,
        ?bool $isVisible = null,
        object|array|null $requires = null,
    ): self {
        return new self(
            $url,
            $altText,
            $backgroundColor,
            $height,
            $horizontalAlignment,
            $selectAction,
            $size,
            $style,
            $width,
            $fallback,
            $separator,
            $spacing,
            $id,
            $isVisible,
            $requires,
        );
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'type' => self::TYPE,
                'url' => $this->url,
                'altText' => $this->altText,
                'backgroundColor' => $this->backgroundColor,
                'height' => $this->height,
                'horizontalAlignment' => $this->horizontalAlignment,
                'selectAction' => $this->selectAction,
                'size' => $this->size,
                'style' => $this->style,
                'width' => $this->width,
                'fallback' => $this->fallback,
                'separator' => $this->separator,
                'spacing' => $this->spacing,
                'id' => $this->id,
                'isVisible' => $this->isVisible,
                'requires' => $this->requires,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
