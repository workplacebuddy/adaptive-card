<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Describes a Fact in a FactSet as a key/value pair.
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class Fact implements JsonSerializable
{
    /**
     * Must be `Fact`
     *
     * @since 1.0
     */
    private const TYPE = 'Fact';

    /**
     * The title of the fact.
     *
     * @since 1.0
     */
    public string $title;

    /**
     * The value of the fact.
     *
     * @since 1.0
     */
    public string $value;

    /**
     * Make an instance in a single call
     */
    public static function make(string $title, string $value): self
    {
        $self = new self();

        $self->title = $title;
        $self->value = $value;

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
                'title' => $this->title,
                'value' => $this->value,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
