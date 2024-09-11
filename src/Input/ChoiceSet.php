<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Input;

use AdaptiveCard\ChoiceInputStyle;
use AdaptiveCard\Data\Query;
use AdaptiveCard\ElementInterface;
use AdaptiveCard\Input;
use AdaptiveCard\InputInterface;
use AdaptiveCard\ItemInterface;
use AdaptiveCard\ToggleableItemInterface;
use JsonSerializable;

/**
 * Allows a user to input a Choice.
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class ChoiceSet extends Input implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface,
    InputInterface
{
    /**
     * Must be `Input.ChoiceSet`
     *
     * @since 1.0
     */
    private const TYPE = 'Input.ChoiceSet';

    /**
     * `Choice` options.
     *
     * @var Input\Choice[]|null
     * @since 1.0
     */
    public ?array $choices = null;

    /**
     * Allows dynamic fetching of choices from the bot to be displayed as suggestions
     * in the dropdown when the user types in the input field.
     *
     * @since 1.6
     */
    public ?Query $choicesData = null;

    /**
     * Allow multiple choices to be selected.
     *
     * @since 1.0
     */
    public ?bool $isMultiSelect = null;

    /** @since 1.0 */
    public ?ChoiceInputStyle $style = null;

    /**
     * The initial choice (or set of choices) that should be selected. For
     * multi-select, specify a comma-separated string of values.
     *
     * @since 1.0
     */
    public ?string $value = null;

    /**
     * Description of the input desired. Only visible when no selection has been made,
     * the `style` is `compact` and `isMultiSelect` is `false`
     *
     * @since 1.0
     */
    public ?string $placeholder = null;

    /**
     * If `true`, allow text to wrap. Otherwise, text is clipped.
     *
     * @since 1.2
     */
    public ?bool $wrap = null;

    /**
     * Make an instance in a single call
     *
     * @psalm-api
     * @param Input\Choice[]|null $choices
     */
    public static function make(
        string $id,
        ?array $choices = null,
        ?Query $choicesData = null,
        ?bool $isMultiSelect = null,
        ?ChoiceInputStyle $style = null,
        ?string $value = null,
        ?string $placeholder = null,
        ?bool $wrap = null,
        ?string $errorMessage = null,
        ?bool $isRequired = null,
        ?string $label = null,
        ?\AdaptiveCard\InputLabelPosition $labelPosition = null,
        string|int|null $labelWidth = null,
        ?\AdaptiveCard\InputStyle $inputStyle = null,
        ElementInterface|\AdaptiveCard\FallbackOption|null $fallback = null,
        ?\AdaptiveCard\BlockElementHeight $height = null,
        ?bool $separator = null,
        ?\AdaptiveCard\Spacing $spacing = null,
        ?bool $isVisible = null,
        object|array|null $requires = null,
    ): self {
        $self = new self();

        $self->id = $id;
        $self->choices = $choices;
        $self->choicesData = $choicesData;
        $self->isMultiSelect = $isMultiSelect;
        $self->style = $style;
        $self->value = $value;
        $self->placeholder = $placeholder;
        $self->wrap = $wrap;
        $self->errorMessage = $errorMessage;
        $self->isRequired = $isRequired;
        $self->label = $label;
        $self->labelPosition = $labelPosition;
        $self->labelWidth = $labelWidth;
        $self->inputStyle = $inputStyle;
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
            array_filter(
                [
                    'type' => self::TYPE,
                    'choices' => $this->choices,
                    'choices.data' => $this->choicesData,
                    'isMultiSelect' => $this->isMultiSelect,
                    'style' => $this->style,
                    'value' => $this->value,
                    'placeholder' => $this->placeholder,
                    'wrap' => $this->wrap,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
