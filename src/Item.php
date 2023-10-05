<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
abstract class Item implements JsonSerializable
{
    /**
     * A series of key/value pairs indicating features that the item requires with
     * corresponding minimum version. When a feature is missing or of insufficient
     * version, fallback is triggered.
     *
     * @since 1.2
     */
    public object|array|null $requires = null;

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'requires' => $this->requires,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
