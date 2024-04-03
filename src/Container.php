<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Containers group items together.
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class Container extends Element implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `Container`
     *
     * @since 1.0
     */
    private const TYPE = 'Container';

    /**
     * The card elements to render inside the `Container`.
     *
     * @var ElementInterface[]
     * @since 1.0
     */
    public array $items;

    /**
     * An Action that will be invoked when the `Container` is tapped or selected.
     * `Action.ShowCard` is not supported.
     *
     * @since 1.1
     */
    public ?ISelectActionInterface $selectAction = null;

    /**
     * Style hint for `Container`.
     *
     * @since 1.0
     */
    public ?ContainerStyle $style = null;

    /**
     * Defines how the content should be aligned vertically within the container. When
     * not specified, the value of verticalContentAlignment is inherited from the
     * parent container. If no parent container has verticalContentAlignment set, it
     * defaults to Top.
     *
     * @since 1.1
     */
    public ?VerticalContentAlignment $verticalContentAlignment = null;

    /**
     * Determines whether the element should bleed through its parent's padding.
     *
     * @since 1.2
     */
    public ?bool $bleed = null;

    /**
     * Specifies the background image. Acceptable formats are PNG, JPEG, and GIF
     *
     * @since 1.2
     */
    public BackgroundImage|string|null $backgroundImage = null;

    /**
     * Specifies the minimum height of the container in pixels, like `"80px"`.
     *
     * @since 1.2
     */
    public ?string $minHeight = null;

    /**
     * When `true` content in this container should be presented right to left. When
     * 'false' content in this container should be presented left to right. When unset
     * layout direction will inherit from parent container or column. If unset in all
     * ancestors, the default platform behavior will apply.
     *
     * @since 1.5
     */
    public ?bool $rtl = null;

    /**
     * Make an instance in a single call
     *
     * @psalm-api
     * @param ElementInterface[] $items
     */
    public static function make(
        array $items,
        ?ISelectActionInterface $selectAction = null,
        ?ContainerStyle $style = null,
        ?VerticalContentAlignment $verticalContentAlignment = null,
        ?bool $bleed = null,
        BackgroundImage|string|null $backgroundImage = null,
        ?string $minHeight = null,
        ?bool $rtl = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ): self {
        $self = new self();

        $self->items = $items;
        $self->selectAction = $selectAction;
        $self->style = $style;
        $self->verticalContentAlignment = $verticalContentAlignment;
        $self->bleed = $bleed;
        $self->backgroundImage = $backgroundImage;
        $self->minHeight = $minHeight;
        $self->rtl = $rtl;
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
                    'items' => $this->items,
                    'selectAction' => $this->selectAction,
                    'style' => $this->style,
                    'verticalContentAlignment' =>
                        $this->verticalContentAlignment,
                    'bleed' => $this->bleed,
                    'backgroundImage' => $this->backgroundImage,
                    'minHeight' => $this->minHeight,
                    'rtl' => $this->rtl,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
