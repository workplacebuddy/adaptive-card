<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Represents an entry for Action.ToggleVisibility's targetElements property
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class TargetElement implements JsonSerializable
{
    /**
     * Must be `TargetElement`
     *
     * @since 1.0
     */
    private const TYPE = 'TargetElement';

    /**
     * Element ID of element to toggle
     *
     * @since 1.0
     */
    public string $elementId;

    /**
     * If `true`, always show target element. If `false`, always hide target element.
     * If not supplied, toggle target element's visibility.
     *
     * @since 1.0
     */
    public ?bool $isVisible = null;

    /**
     * Make an instance in a single call
     */
    public static function make(
        string $elementId,
        ?bool $isVisible = null,
    ): self {
        $self = new self();

        $self->elementId = $elementId;
        $self->isVisible = $isVisible;

        return $self;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'elementId' => $this->elementId,
            'isVisible' => $this->isVisible,
        ]);
    }
}
