<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Input;

use AdaptiveCard\ElementInterface;
use AdaptiveCard\Input;
use AdaptiveCard\InputInterface;
use AdaptiveCard\ItemInterface;
use AdaptiveCard\ToggleableItemInterface;
use JsonSerializable;

/**
 * Allows a user to enter a number.
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class Number extends Input implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface,
    InputInterface
{
    /**
     * Must be `Input.Number`
     *
     * @since 1.0
     */
    private const TYPE = 'Input.Number';

    /**
     * Hint of maximum value (may be ignored by some clients).
     *
     * @since 1.0
     */
    public ?int $max = null;

    /**
     * Hint of minimum value (may be ignored by some clients).
     *
     * @since 1.0
     */
    public ?int $min = null;

    /**
     * Description of the input desired. Displayed when no selection has been made.
     *
     * @since 1.0
     */
    public ?string $placeholder = null;

    /**
     * Initial value for this field.
     *
     * @since 1.0
     */
    public ?int $value = null;

    /**
     * Make an instance in a single call
     */
    public static function make(
        string $id,
        ?int $max = null,
        ?int $min = null,
        ?string $placeholder = null,
        ?int $value = null,
        ?string $errorMessage = null,
        ?bool $isRequired = null,
        ?string $label = null,
        ElementInterface|\AdaptiveCard\FallbackOption|null $fallback = null,
        ?\AdaptiveCard\BlockElementHeight $height = null,
        ?bool $separator = null,
        ?\AdaptiveCard\Spacing $spacing = null,
        ?bool $isVisible = null,
        object|array|null $requires = null,
    ): self {
        $self = new self();

        $self->id = $id;
        $self->max = $max;
        $self->min = $min;
        $self->placeholder = $placeholder;
        $self->value = $value;
        $self->errorMessage = $errorMessage;
        $self->isRequired = $isRequired;
        $self->label = $label;
        $self->fallback = $fallback;
        $self->height = $height;
        $self->separator = $separator;
        $self->spacing = $spacing;
        $self->isVisible = $isVisible;
        $self->requires = $requires;

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
                'max' => $this->max,
                'min' => $this->min,
                'placeholder' => $this->placeholder,
                'value' => $this->value,
            ]),
        );
    }
}
