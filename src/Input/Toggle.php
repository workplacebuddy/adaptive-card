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
 * Lets a user choose between two options.
 *
 * @since 1.0
 */
final class Toggle extends Input implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface,
    InputInterface
{
    /**
     * Must be `Input.Toggle`
     *
     * @since 1.0
     */
    private const TYPE = 'Input.Toggle';

    /**
     * Title for the toggle
     *
     * @since 1.0
     */
    public string $title;

    /**
     * The initial selected value. If you want the toggle to be initially on, set this
     * to the value of `valueOn`'s value.
     *
     * @since 1.0
     */
    public ?string $value = null;

    /**
     * The value when toggle is off
     *
     * @since 1.0
     */
    public ?string $valueOff = null;

    /**
     * The value when toggle is on
     *
     * @since 1.0
     */
    public ?string $valueOn = null;

    /**
     * If `true`, allow text to wrap. Otherwise, text is clipped.
     *
     * @since 1.2
     */
    public ?bool $wrap = null;

    /**
     * Create a "Toggle" instance in a single call
     */
    public function __construct(
        string $title,
        string $id,
        ?string $value = null,
        ?string $valueOff = null,
        ?string $valueOn = null,
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
    ) {
        $this->title = $title;
        $this->id = $id;
        $this->value = $value;
        $this->valueOff = $valueOff;
        $this->valueOn = $valueOn;
        $this->wrap = $wrap;
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
     * Make a "Toggle" instance in a single call
     *
     * @psalm-api
     */
    public static function make(
        string $title,
        string $id,
        ?string $value = null,
        ?string $valueOff = null,
        ?string $valueOn = null,
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
        return new self(
            $title,
            $id,
            $value,
            $valueOff,
            $valueOn,
            $wrap,
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
                    'title' => $this->title,
                    'value' => $this->value,
                    'valueOff' => $this->valueOff,
                    'valueOn' => $this->valueOn,
                    'wrap' => $this->wrap,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
