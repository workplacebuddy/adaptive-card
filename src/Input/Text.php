<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Input;

use AdaptiveCard\ElementInterface;
use AdaptiveCard\ISelectActionInterface;
use AdaptiveCard\Input;
use AdaptiveCard\InputInterface;
use AdaptiveCard\ItemInterface;
use AdaptiveCard\TextInputStyle;
use AdaptiveCard\ToggleableItemInterface;
use JsonSerializable;

/**
 * Lets a user enter text.
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class Text extends Input implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface,
    InputInterface
{
    /**
     * Must be `Input.Text`
     *
     * @since 1.0
     */
    private const TYPE = 'Input.Text';

    /**
     * If `true`, allow multiple lines of input.
     *
     * @since 1.0
     */
    public ?bool $isMultiline = null;

    /**
     * Hint of maximum length characters to collect (may be ignored by some clients).
     *
     * @since 1.0
     */
    public ?int $maxLength = null;

    /**
     * Description of the input desired. Displayed when no text has been input.
     *
     * @since 1.0
     */
    public ?string $placeholder = null;

    /**
     * Regular expression indicating the required format of this text input.
     *
     * @since 1.3
     */
    public ?string $regex = null;

    /**
     * Style hint for text input.
     *
     * @since 1.0
     */
    public ?TextInputStyle $style = null;

    /**
     * The inline action for the input. Typically displayed to the right of the input.
     * It is strongly recommended to provide an icon on the action (which will be
     * displayed instead of the title of the action).
     *
     * @since 1.2
     */
    public ?ISelectActionInterface $inlineAction = null;

    /**
     * The initial value for this field.
     *
     * @since 1.0
     */
    public ?string $value = null;

    /**
     * Make an instance in a single call
     */
    public static function make(
        string $id,
        ?bool $isMultiline = null,
        ?int $maxLength = null,
        ?string $placeholder = null,
        ?string $regex = null,
        ?TextInputStyle $style = null,
        ?ISelectActionInterface $inlineAction = null,
        ?string $value = null,
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
        $self->isMultiline = $isMultiline;
        $self->maxLength = $maxLength;
        $self->placeholder = $placeholder;
        $self->regex = $regex;
        $self->style = $style;
        $self->inlineAction = $inlineAction;
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
            array_filter(
                [
                    'type' => self::TYPE,
                    'isMultiline' => $this->isMultiline,
                    'maxLength' => $this->maxLength,
                    'placeholder' => $this->placeholder,
                    'regex' => $this->regex,
                    'style' => $this->style,
                    'inlineAction' => $this->inlineAction,
                    'value' => $this->value,
                ],
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
