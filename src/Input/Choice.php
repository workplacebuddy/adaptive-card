<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Input;

use JsonSerializable;

/**
 * Describes a choice for use in a ChoiceSet.
 *
 * @since 1.0
 */
final class Choice implements JsonSerializable
{
    /**
     * Must be `Input.Choice`
     *
     * @since 1.0
     */
    private const TYPE = 'Input.Choice';

    /**
     * Text to display.
     *
     * @since 1.0
     */
    public string $title;

    /**
     * The raw value for the choice. **NOTE:** do not use a `,` in the value, since a
     * `ChoiceSet` with `isMultiSelect` set to `true` returns a comma-delimited string
     * of choice values.
     *
     * @since 1.0
     */
    public string $value;

    /**
     * Create a "Choice" instance in a single call
     */
    public function __construct(string $title, string $value)
    {
        $this->title = $title;
        $this->value = $value;
    }

    /**
     * Make a "Choice" instance in a single call
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
