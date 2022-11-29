<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
abstract class Element extends ToggleableItem implements JsonSerializable
{
    /**
     * Describes what to do when an unknown element is encountered or the requires of
     * this or any children can't be met.
     *
     * @since 1.2
     */
    public ElementInterface|FallbackOption|null $fallback = null;

    /**
     * Specifies the height of the element.
     *
     * @since 1.1
     */
    public ?BlockElementHeight $height = null;

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
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            array_filter([
                'fallback' => $this->fallback,
                'height' => $this->height,
                'separator' => $this->separator,
                'spacing' => $this->spacing,
            ]),
        );
    }
}
