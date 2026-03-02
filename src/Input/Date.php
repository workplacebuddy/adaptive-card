<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Input;

use AdaptiveCard\ElementInterface;
use AdaptiveCard\Extension\Input\DateExtensionInterface;
use AdaptiveCard\Input;
use AdaptiveCard\InputInterface;
use AdaptiveCard\ItemInterface;
use AdaptiveCard\ToggleableItemInterface;
use JsonSerializable;

/**
 * Lets a user choose a date.
 *
 * @since 1.0
 */
final class Date extends Input implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface,
    InputInterface
{
    /**
     * Must be `Input.Date`
     *
     * @since 1.0
     */
    private const TYPE = 'Input.Date';

    /**
     * Hint of maximum value expressed in YYYY-MM-DD(may be ignored by some clients).
     *
     * @since 1.0
     */
    public ?string $max = null;

    /**
     * Hint of minimum value expressed in YYYY-MM-DD(may be ignored by some clients).
     *
     * @since 1.0
     */
    public ?string $min = null;

    /**
     * Description of the input desired. Displayed when no selection has been made.
     *
     * @since 1.0
     */
    public ?string $placeholder = null;

    /**
     * The initial value for this field expressed in YYYY-MM-DD.
     *
     * @since 1.0
     */
    public ?string $value = null;

    /**
     * Extensions to augment this element
     *
     * @var DateExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "Date" instance in a single call
     *
     * @param DateExtensionInterface[]|null $extensions
     */
    public function __construct(
        string $id,
        ?string $max = null,
        ?string $min = null,
        ?string $placeholder = null,
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
        ?array $extensions = null,
    ) {
        $this->id = $id;
        $this->max = $max;
        $this->min = $min;
        $this->placeholder = $placeholder;
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
        $this->extensions = $extensions;
    }

    /**
     * Make a "Date" instance in a single call
     *
     * @psalm-api
     *
     * @param DateExtensionInterface[]|null $extensions
     */
    public static function make(
        string $id,
        ?string $max = null,
        ?string $min = null,
        ?string $placeholder = null,
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
        ?array $extensions = null,
    ): self {
        return new self(
            $id,
            $max,
            $min,
            $placeholder,
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
                    'max' => $this->max,
                    'min' => $this->min,
                    'placeholder' => $this->placeholder,
                    'value' => $this->value,
                    ...$extensionProperties,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
