<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * @since 1.0
 */
abstract class ToggleableItem extends Item implements JsonSerializable
{
    /**
     * A unique identifier associated with the item.
     *
     * @since 1.0
     */
    public ?string $id = null;

    /**
     * If `false`, this item will be removed from the visual tree.
     *
     * @since 1.2
     */
    public ?bool $isVisible = null;

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            array_filter(
                [
                    'id' => $this->id,
                    'isVisible' => $this->isVisible,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
