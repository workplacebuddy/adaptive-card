<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Provides a way to display data in a tabular form.
 *
 * @since 1.5
 */
final class Table extends Element implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `Table`
     *
     * @since 1.5
     */
    private const TYPE = 'Table';

    /**
     * Defines the number of columns in the table, their sizes, and more.
     *
     * @var TableColumnDefinition[]|null
     * @since 1.5
     */
    public ?array $columns = null;

    /**
     * Defines the rows of the table.
     *
     * @var TableRow[]|null
     * @since 1.5
     */
    public ?array $rows = null;

    /**
     * Specifies whether the first row of the table should be treated as a header row,
     * and be announced as such by accessibility software.
     *
     * @since 1.5
     */
    public ?bool $firstRowAsHeader = null;

    /**
     * Specifies whether grid lines should be displayed.
     *
     * @since 1.5
     */
    public ?bool $showGridLines = null;

    /**
     * Defines the style of the grid. This property currently only controls the grid's
     * color.
     *
     * @since 1.5
     */
    public ?ContainerStyle $gridStyle = null;

    /**
     * Controls how the content of all cells is horizontally aligned by default. When
     * not specified, horizontal alignment is defined on a per-cell basis.
     *
     * @since 1.5
     */
    public ?HorizontalAlignment $horizontalCellContentAlignment = null;

    /**
     * Controls how the content of all cells is vertically aligned by default. When not
     * specified, vertical alignment is defined on a per-cell basis.
     *
     * @since 1.5
     */
    public ?VerticalAlignment $verticalCellContentAlignment = null;

    /**
     * Create a "Table" instance in a single call
     *
     * @param TableColumnDefinition[]|null $columns
     * @param TableRow[]|null $rows
     */
    public function __construct(
        ?array $columns = null,
        ?array $rows = null,
        ?bool $firstRowAsHeader = null,
        ?bool $showGridLines = null,
        ?ContainerStyle $gridStyle = null,
        ?HorizontalAlignment $horizontalCellContentAlignment = null,
        ?VerticalAlignment $verticalCellContentAlignment = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ) {
        $this->columns = $columns;
        $this->rows = $rows;
        $this->firstRowAsHeader = $firstRowAsHeader;
        $this->showGridLines = $showGridLines;
        $this->gridStyle = $gridStyle;
        $this->horizontalCellContentAlignment = $horizontalCellContentAlignment;
        $this->verticalCellContentAlignment = $verticalCellContentAlignment;
        $this->fallback = $fallback;
        $this->height = $height;
        $this->separator = $separator;
        $this->spacing = $spacing;
    }

    /**
     * Make a "Table" instance in a single call
     *
     * @psalm-api
     *
     * @param TableColumnDefinition[]|null $columns
     * @param TableRow[]|null $rows
     */
    public static function make(
        ?array $columns = null,
        ?array $rows = null,
        ?bool $firstRowAsHeader = null,
        ?bool $showGridLines = null,
        ?ContainerStyle $gridStyle = null,
        ?HorizontalAlignment $horizontalCellContentAlignment = null,
        ?VerticalAlignment $verticalCellContentAlignment = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ): self {
        return new self(
            $columns,
            $rows,
            $firstRowAsHeader,
            $showGridLines,
            $gridStyle,
            $horizontalCellContentAlignment,
            $verticalCellContentAlignment,
            $fallback,
            $height,
            $separator,
            $spacing,
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
                    'columns' => $this->columns,
                    'rows' => $this->rows,
                    'firstRowAsHeader' => $this->firstRowAsHeader,
                    'showGridLines' => $this->showGridLines,
                    'gridStyle' => $this->gridStyle,
                    'horizontalCellContentAlignment' =>
                        $this->horizontalCellContentAlignment,
                    'verticalCellContentAlignment' =>
                        $this->verticalCellContentAlignment,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
