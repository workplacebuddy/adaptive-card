<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * ColumnSet divides a region into Columns, allowing elements to sit side-by-side.
 *
 * @since 1.0
 */
final class ColumnSet extends Element implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `ColumnSet`
     *
     * @since 1.0
     */
    private const TYPE = 'ColumnSet';

    /**
     * The array of `Columns` to divide the region into.
     *
     * @var Column[]|null
     * @since 1.0
     */
    public ?array $columns = null;

    /**
     * An Action that will be invoked when the `ColumnSet` is tapped or selected.
     * `Action.ShowCard` is not supported.
     *
     * @since 1.1
     */
    public ?ISelectActionInterface $selectAction = null;

    /**
     * Style hint for `ColumnSet`.
     *
     * @since 1.2
     */
    public ?ContainerStyle $style = null;

    /**
     * Determines whether the element should bleed through its parent's padding.
     *
     * @since 1.2
     */
    public ?bool $bleed = null;

    /**
     * Specifies the minimum height of the column set in pixels, like `"80px"`.
     *
     * @since 1.2
     */
    public ?string $minHeight = null;

    /**
     * Controls the horizontal alignment of the ColumnSet. When not specified, the
     * value of horizontalAlignment is inherited from the parent container. If no
     * parent container has horizontalAlignment set, it defaults to Left.
     *
     * @since 1.0
     */
    public ?HorizontalAlignment $horizontalAlignment = null;

    /**
     * Create a "ColumnSet" instance in a single call
     *
     * @param Column[]|null $columns
     */
    public function __construct(
        ?array $columns = null,
        ?ISelectActionInterface $selectAction = null,
        ?ContainerStyle $style = null,
        ?bool $bleed = null,
        ?string $minHeight = null,
        ?HorizontalAlignment $horizontalAlignment = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ) {
        $this->columns = $columns;
        $this->selectAction = $selectAction;
        $this->style = $style;
        $this->bleed = $bleed;
        $this->minHeight = $minHeight;
        $this->horizontalAlignment = $horizontalAlignment;
        $this->fallback = $fallback;
        $this->height = $height;
        $this->separator = $separator;
        $this->spacing = $spacing;
    }

    /**
     * Make a "ColumnSet" instance in a single call
     *
     * @psalm-api
     *
     * @param Column[]|null $columns
     */
    public static function make(
        ?array $columns = null,
        ?ISelectActionInterface $selectAction = null,
        ?ContainerStyle $style = null,
        ?bool $bleed = null,
        ?string $minHeight = null,
        ?HorizontalAlignment $horizontalAlignment = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ): self {
        return new self(
            $columns,
            $selectAction,
            $style,
            $bleed,
            $minHeight,
            $horizontalAlignment,
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
                    'selectAction' => $this->selectAction,
                    'style' => $this->style,
                    'bleed' => $this->bleed,
                    'minHeight' => $this->minHeight,
                    'horizontalAlignment' => $this->horizontalAlignment,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
