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
     * Create a "Text" instance in a single call
     */
    public function __construct(
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
        ?\AdaptiveCard\InputLabelPosition $labelPosition = null,
        string|int|null $labelWidth = null,
        ?\AdaptiveCard\InputStyle $inputStyle = null,
        ElementInterface|\AdaptiveCard\FallbackOption|null $fallback = null,
        ?\AdaptiveCard\BlockElementHeight $height = null,
        ?bool $separator = null,
        ?\AdaptiveCard\Spacing $spacing = null,
        ?bool $isVisible = null,
        object|array|null $requires = null,
    ) {
        $this->id = $id;
        $this->isMultiline = $isMultiline;
        $this->maxLength = $maxLength;
        $this->placeholder = $placeholder;
        $this->regex = $regex;
        $this->style = $style;
        $this->inlineAction = $inlineAction;
        $this->value = $value;
        $this->errorMessage = $errorMessage;
        $this->isRequired = $isRequired;
        $this->label = $label;
        $this->labelPosition = $labelPosition;
        $this->labelWidth = $labelWidth;
        $this->inputStyle = $inputStyle;
        $this->fallback = $fallback;
        $this->height = $height;
        $this->separator = $separator;
        $this->spacing = $spacing;
        $this->isVisible = $isVisible;
        $this->requires = $requires;
    }

    /**
     * Make a "Text" instance in a single call
     *
     * @psalm-api
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
        return new self(
            $id,
            $isMultiline,
            $maxLength,
            $placeholder,
            $regex,
            $style,
            $inlineAction,
            $value,
            $errorMessage,
            $isRequired,
            $label,
            $labelPosition,
            $labelWidth,
            $inputStyle,
            $fallback,
            $height,
            $separator,
            $spacing,
            $isVisible,
            $requires,
        );
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
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
