<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Defines the characteristics of a column in a Table element.
 *
 * @since 1.5
 * @psalm-suppress MissingConstructor
 */
final class TableColumnDefinition implements JsonSerializable
{
    /**
     * Must be `TableColumnDefinition`
     *
     * @since 1.5
     */
    private const TYPE = 'TableColumnDefinition';

    /**
     * Specifies the width of the column. If expressed as a number, width represents
     * the weight a the column relative to the other columns in the table. If expressed
     * as a string, width must by in the format "<number>px" (for instance, "50px") and
     * represents an explicit number of pixels.
     *
     * @since 1.5
     */
    public string|int|null $width = null;

    /**
     * Controls how the content of all cells in the column is horizontally aligned by
     * default. When specified, this value overrides the setting at the table level.
     * When not specified, horizontal alignment is defined at the table, row or cell
     * level.
     *
     * @since 1.5
     */
    public ?HorizontalAlignment $horizontalCellContentAlignment = null;

    /**
     * Controls how the content of all cells in the column is vertically aligned by
     * default. When specified, this value overrides the setting at the table level.
     * When not specified, vertical alignment is defined at the table, row or cell
     * level.
     *
     * @since 1.5
     */
    public ?VerticalAlignment $verticalCellContentAlignment = null;

    /**
     * Make an instance in a single call
     *
     * @psalm-api
     */
    public static function make(
        string|int|null $width = null,
        ?HorizontalAlignment $horizontalCellContentAlignment = null,
        ?VerticalAlignment $verticalCellContentAlignment = null,
    ): self {
        $self = new self();

        $self->width = $width;
        $self->horizontalCellContentAlignment = $horizontalCellContentAlignment;
        $self->verticalCellContentAlignment = $verticalCellContentAlignment;

        return $self;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'type' => self::TYPE,
                'width' => $this->width,
                'horizontalCellContentAlignment' =>
                    $this->horizontalCellContentAlignment,
                'verticalCellContentAlignment' =>
                    $this->verticalCellContentAlignment,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
