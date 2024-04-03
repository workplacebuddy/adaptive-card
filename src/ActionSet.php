<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Displays a set of actions.
 *
 * @since 1.2
 * @psalm-suppress MissingConstructor
 */
final class ActionSet extends Element implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `ActionSet`
     *
     * @since 1.2
     */
    private const TYPE = 'ActionSet';

    /**
     * The array of `Action` elements to show.
     *
     * @var ActionInterface[]
     * @since 1.2
     */
    public array $actions;

    /**
     * Make an instance in a single call
     *
     * @psalm-api
     * @param ActionInterface[] $actions
     */
    public static function make(
        array $actions,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ): self {
        $self = new self();

        $self->actions = $actions;
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
                    'actions' => $this->actions,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
