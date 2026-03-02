<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\TableRowExtensionInterface;
use JsonSerializable;

/**
 * Represents a row of cells within a Table element.
 *
 * @since 1.5
 */
final class TableRow implements JsonSerializable
{
    /**
     * Must be `TableRow`
     *
     * @since 1.5
     */
    private const TYPE = 'TableRow';

    /**
     * The cells in this row. If a row contains more cells than there are columns
     * defined on the Table element, the extra cells are ignored.
     *
     * @var TableCell[]|null
     * @since 1.5
     */
    public ?array $cells = null;

    /**
     * Defines the style of the entire row.
     *
     * @since 1.5
     */
    public ?ContainerStyle $style = null;

    /**
     * Controls how the content of all cells in the row is horizontally aligned by
     * default. When specified, this value overrides both the setting at the table and
     * columns level. When not specified, horizontal alignment is defined at the table,
     * column or cell level.
     *
     * @since 1.5
     */
    public ?HorizontalAlignment $horizontalCellContentAlignment = null;

    /**
     * Controls how the content of all cells in the column is vertically aligned by
     * default. When specified, this value overrides the setting at the table and
     * column level. When not specified, vertical alignment is defined either at the
     * table, column or cell level.
     *
     * @since 1.5
     */
    public ?VerticalAlignment $verticalCellContentAlignment = null;

    /**
     * Extensions to augment this element
     *
     * @var TableRowExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "TableRow" instance in a single call
     *
     * @param TableCell[]|null $cells
     * @param TableRowExtensionInterface[]|null $extensions
     */
    public function __construct(
        ?array $cells = null,
        ?ContainerStyle $style = null,
        ?HorizontalAlignment $horizontalCellContentAlignment = null,
        ?VerticalAlignment $verticalCellContentAlignment = null,
        ?array $extensions = null,
    ) {
        $this->cells = $cells;
        $this->style = $style;
        $this->horizontalCellContentAlignment = $horizontalCellContentAlignment;
        $this->verticalCellContentAlignment = $verticalCellContentAlignment;
        $this->extensions = $extensions;
    }

    /**
     * Make a "TableRow" instance in a single call
     *
     * @psalm-api
     *
     * @param TableCell[]|null $cells
     * @param TableRowExtensionInterface[]|null $extensions
     */
    public static function make(
        ?array $cells = null,
        ?ContainerStyle $style = null,
        ?HorizontalAlignment $horizontalCellContentAlignment = null,
        ?VerticalAlignment $verticalCellContentAlignment = null,
        ?array $extensions = null,
    ): self {
        return new self(
            $cells,
            $style,
            $horizontalCellContentAlignment,
            $verticalCellContentAlignment,
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

        return array_filter(
            [
                'type' => self::TYPE,
                'cells' => $this->cells,
                'style' => $this->style,
                'horizontalCellContentAlignment' =>
                    $this->horizontalCellContentAlignment,
                'verticalCellContentAlignment' =>
                    $this->verticalCellContentAlignment,
                ...$extensionProperties,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
