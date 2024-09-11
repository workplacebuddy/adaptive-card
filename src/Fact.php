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
     * Create a "Fact" instance in a single call
     */
    public function __construct(string $title, string $value)
    {
        $this->title = $title;
        $this->value = $value;
    }

    /**
     * Make a "Fact" instance in a single call
     *
     * @psalm-api
     */
    public static function make(string $title, string $value): self
    {
        return new self($title, $value);
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
