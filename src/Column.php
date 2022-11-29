<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Defines a container that is part of a ColumnSet.
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class Column extends ToggleableItem implements
    JsonSerializable,
    ItemInterface,
    ToggleableItemInterface
{
    /**
     * Must be `Column`
     *
     * @since 1.0
     */
    private const TYPE = 'Column';

    /**
     * The card elements to render inside the `Column`.
     *
     * @var ElementInterface[]|null
     * @since 1.0
     */
    public ?array $items = null;

    /**
     * Specifies the background image. Acceptable formats are PNG, JPEG, and GIF
     *
     * @since 1.2
     */
    public BackgroundImage|string|null $backgroundImage = null;

    /**
     * Determines whether the column should bleed through its parent's padding.
     *
     * @since 1.2
     */
    public ?bool $bleed = null;

    /**
     * Describes what to do when an unknown item is encountered or the requires of this
     * or any children can't be met.
     *
     * @since 1.2
     */
    public Column|FallbackOption|null $fallback = null;

    /**
     * Specifies the minimum height of the column in pixels, like `"80px"`.
     *
     * @since 1.2
     */
    public ?string $minHeight = null;

    /**
     * When `true` content in this column should be presented right to left. When
     * 'false' content in this column should be presented left to right. When unset
     * layout direction will inherit from parent container or column. If unset in all
     * ancestors, the default platform behavior will apply.
     *
     * @since 1.5
     */
    public ?bool $rtl = null;

    /**
     * When `true`, draw a separating line between this column and the previous column.
     *
     * @since 1.0
     */
    public ?bool $separator = null;

    /**
     * Controls the amount of spacing between this column and the preceding column.
     *
     * @since 1.0
     */
    public ?Spacing $spacing = null;

    /**
     * An Action that will be invoked when the `Column` is tapped or selected.
     * `Action.ShowCard` is not supported.
     *
     * @since 1.1
     */
    public ?ISelectActionInterface $selectAction = null;

    /**
     * Style hint for `Column`.
     *
     * @since 1.0
     */
    public ?ContainerStyle $style = null;

    /**
     * Defines how the content should be aligned vertically within the column. When not
     * specified, the value of verticalContentAlignment is inherited from the parent
     * container. If no parent container has verticalContentAlignment set, it defaults
     * to Top.
     *
     * @since 1.1
     */
    public ?VerticalContentAlignment $verticalContentAlignment = null;

    /**
     * `"auto"`, `"stretch"`, a number representing relative width of the column in the
     * column group, or in version 1.1 and higher, a specific pixel width, like
     * `"50px"`.
     *
     * @since 1.0
     */
    public string|int|null $width = null;

    /**
     * Make an instance in a single call
     *
     * @param ElementInterface[]|null $items
     */
    public static function make(
        ?array $items = null,
        BackgroundImage|string|null $backgroundImage = null,
        ?bool $bleed = null,
        Column|FallbackOption|null $fallback = null,
        ?string $minHeight = null,
        ?bool $rtl = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
        ?ISelectActionInterface $selectAction = null,
        ?ContainerStyle $style = null,
        ?VerticalContentAlignment $verticalContentAlignment = null,
        string|int|null $width = null,
        ?string $id = null,
        ?bool $isVisible = null,
    ): self {
        $self = new self();

        $self->items = $items;
        $self->backgroundImage = $backgroundImage;
        $self->bleed = $bleed;
        $self->fallback = $fallback;
        $self->minHeight = $minHeight;
        $self->rtl = $rtl;
        $self->separator = $separator;
        $self->spacing = $spacing;
        $self->selectAction = $selectAction;
        $self->style = $style;
        $self->verticalContentAlignment = $verticalContentAlignment;
        $self->width = $width;
        $self->id = $id;
        $self->isVisible = $isVisible;

        return $self;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            array_filter([
                'type' => self::TYPE,
                'items' => $this->items,
                'backgroundImage' => $this->backgroundImage,
                'bleed' => $this->bleed,
                'fallback' => $this->fallback,
                'minHeight' => $this->minHeight,
                'rtl' => $this->rtl,
                'separator' => $this->separator,
                'spacing' => $this->spacing,
                'selectAction' => $this->selectAction,
                'style' => $this->style,
                'verticalContentAlignment' => $this->verticalContentAlignment,
                'width' => $this->width,
            ]),
        );
    }
}
