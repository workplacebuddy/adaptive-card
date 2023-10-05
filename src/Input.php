<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Base input class
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
abstract class Input implements JsonSerializable
{
    /**
     * Unique identifier for the value. Used to identify collected input when the
     * Submit action is performed.
     *
     * @since 1.0
     */
    public string $id;

    /**
     * Error message to display when entered input is invalid
     *
     * @since 1.3
     */
    public ?string $errorMessage = null;

    /**
     * Whether or not this input is required
     *
     * @since 1.3
     */
    public ?bool $isRequired = null;

    /**
     * Label for this input
     *
     * @since 1.3
     */
    public ?string $label = null;

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
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'id' => $this->id,
                'errorMessage' => $this->errorMessage,
                'isRequired' => $this->isRequired,
                'label' => $this->label,
                'fallback' => $this->fallback,
                'height' => $this->height,
                'separator' => $this->separator,
                'spacing' => $this->spacing,
                'isVisible' => $this->isVisible,
                'requires' => $this->requires,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
