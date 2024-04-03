<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Displays text, allowing control over font sizes, weight, and color.
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class TextBlock extends Element implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `TextBlock`
     *
     * @since 1.0
     */
    private const TYPE = 'TextBlock';

    /**
     * Text to display. A subset of markdown is supported
     * (https://aka.ms/ACTextFeatures)
     *
     * @since 1.0
     */
    public string $text;

    /**
     * Controls the color of `TextBlock` elements.
     *
     * @since 1.0
     */
    public ?Colors $color = null;

    /**
     * Type of font to use for rendering
     *
     * @since 1.2
     */
    public ?FontType $fontType = null;

    /**
     * Controls the horizontal text alignment. When not specified, the value of
     * horizontalAlignment is inherited from the parent container. If no parent
     * container has horizontalAlignment set, it defaults to Left.
     *
     * @since 1.0
     */
    public ?HorizontalAlignment $horizontalAlignment = null;

    /**
     * If `true`, displays text slightly toned down to appear less prominent.
     *
     * @since 1.0
     */
    public ?bool $isSubtle = null;

    /**
     * Specifies the maximum number of lines to display.
     *
     * @since 1.0
     */
    public ?int $maxLines = null;

    /**
     * Controls size of text.
     *
     * @since 1.0
     */
    public ?FontSize $size = null;

    /**
     * Controls the weight of `TextBlock` elements.
     *
     * @since 1.0
     */
    public ?FontWeight $weight = null;

    /**
     * If `true`, allow text to wrap. Otherwise, text is clipped.
     *
     * @since 1.0
     */
    public ?bool $wrap = null;

    /**
     * The style of this TextBlock for accessibility purposes.
     *
     * @since 1.0
     */
    public ?TextBlockStyle $style = null;

    /**
     * Make an instance in a single call
     *
     * @psalm-api
     */
    public static function make(
        string $text,
        ?Colors $color = null,
        ?FontType $fontType = null,
        ?HorizontalAlignment $horizontalAlignment = null,
        ?bool $isSubtle = null,
        ?int $maxLines = null,
        ?FontSize $size = null,
        ?FontWeight $weight = null,
        ?bool $wrap = null,
        ?TextBlockStyle $style = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ): self {
        $self = new self();

        $self->text = $text;
        $self->color = $color;
        $self->fontType = $fontType;
        $self->horizontalAlignment = $horizontalAlignment;
        $self->isSubtle = $isSubtle;
        $self->maxLines = $maxLines;
        $self->size = $size;
        $self->weight = $weight;
        $self->wrap = $wrap;
        $self->style = $style;
        $self->fallback = $fallback;
        $self->height = $height;
        $self->separator = $separator;
        $self->spacing = $spacing;

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
                    'text' => $this->text,
                    'color' => $this->color,
                    'fontType' => $this->fontType,
                    'horizontalAlignment' => $this->horizontalAlignment,
                    'isSubtle' => $this->isSubtle,
                    'maxLines' => $this->maxLines,
                    'size' => $this->size,
                    'weight' => $this->weight,
                    'wrap' => $this->wrap,
                    'style' => $this->style,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
