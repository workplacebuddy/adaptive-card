<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Defines an array of inlines, allowing for inline text formatting.
 *
 * @since 1.2
 * @psalm-suppress MissingConstructor
 */
final class RichTextBlock extends Element implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `RichTextBlock`
     *
     * @since 1.2
     */
    private const TYPE = 'RichTextBlock';

    /**
     * The array of inlines.
     *
     * @var InlineInterface[]
     * @since 1.2
     */
    public array $inlines;

    /**
     * Controls the horizontal text alignment. When not specified, the value of
     * horizontalAlignment is inherited from the parent container. If no parent
     * container has horizontalAlignment set, it defaults to Left.
     *
     * @since 1.2
     */
    public ?HorizontalAlignment $horizontalAlignment = null;

    /**
     * Make an instance in a single call
     *
     * @param InlineInterface[] $inlines
     */
    public static function make(
        array $inlines,
        ?HorizontalAlignment $horizontalAlignment = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ): self {
        $self = new self();

        $self->inlines = $inlines;
        $self->horizontalAlignment = $horizontalAlignment;
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
                    'inlines' => $this->inlines,
                    'horizontalAlignment' => $this->horizontalAlignment,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
