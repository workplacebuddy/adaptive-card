<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Defines a single run of formatted text. A TextRun with no properties set can be
 * represented in the json as string containing the text as a shorthand for the
 * json object. These two representations are equivalent.
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class TextRun implements JsonSerializable, InlineInterface
{
    /**
     * Must be `TextRun`
     *
     * @since 1.0
     */
    private const TYPE = 'TextRun';

    /**
     * Text to display. Markdown is not supported.
     *
     * @since 1.0
     */
    public string $text;

    /**
     * Controls the color of the text.
     *
     * @since 1.0
     */
    public ?Colors $color = null;

    /**
     * The type of font to use
     *
     * @since 1.0
     */
    public ?FontType $fontType = null;

    /**
     * If `true`, displays the text highlighted.
     *
     * @since 1.0
     */
    public ?bool $highlight = null;

    /**
     * If `true`, displays text slightly toned down to appear less prominent.
     *
     * @since 1.0
     */
    public ?bool $isSubtle = null;

    /**
     * If `true`, displays the text using italic font.
     *
     * @since 1.0
     */
    public ?bool $italic = null;

    /**
     * Action to invoke when this text run is clicked. Visually changes the text run
     * into a hyperlink. `Action.ShowCard` is not supported.
     *
     * @since 1.0
     */
    public ?ISelectActionInterface $selectAction = null;

    /**
     * Controls size of text.
     *
     * @since 1.0
     */
    public ?FontSize $size = null;

    /**
     * If `true`, displays the text with strikethrough.
     *
     * @since 1.0
     */
    public ?bool $strikethrough = null;

    /**
     * If `true`, displays the text with an underline.
     *
     * @since 1.3
     */
    public ?bool $underline = null;

    /**
     * Controls the weight of the text.
     *
     * @since 1.0
     */
    public ?FontWeight $weight = null;

    /**
     * Make an instance in a single call
     */
    public static function make(
        string $text,
        ?Colors $color = null,
        ?FontType $fontType = null,
        ?bool $highlight = null,
        ?bool $isSubtle = null,
        ?bool $italic = null,
        ?ISelectActionInterface $selectAction = null,
        ?FontSize $size = null,
        ?bool $strikethrough = null,
        ?bool $underline = null,
        ?FontWeight $weight = null,
    ): self {
        $self = new self();

        $self->text = $text;
        $self->color = $color;
        $self->fontType = $fontType;
        $self->highlight = $highlight;
        $self->isSubtle = $isSubtle;
        $self->italic = $italic;
        $self->selectAction = $selectAction;
        $self->size = $size;
        $self->strikethrough = $strikethrough;
        $self->underline = $underline;
        $self->weight = $weight;

        return $self;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'text' => $this->text,
            'color' => $this->color,
            'fontType' => $this->fontType,
            'highlight' => $this->highlight,
            'isSubtle' => $this->isSubtle,
            'italic' => $this->italic,
            'selectAction' => $this->selectAction,
            'size' => $this->size,
            'strikethrough' => $this->strikethrough,
            'underline' => $this->underline,
            'weight' => $this->weight,
        ]);
    }
}
