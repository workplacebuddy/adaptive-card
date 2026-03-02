<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Input;

use AdaptiveCard\Extension\Input\ChoiceExtensionInterface;
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
     * Extensions to augment this element
     *
     * @var ChoiceExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "Choice" instance in a single call
     *
     * @param ChoiceExtensionInterface[]|null $extensions
     */
    public function __construct(
        string $title,
        string $value,
        ?array $extensions = null,
    ) {
        $this->title = $title;
        $this->value = $value;
        $this->extensions = $extensions;
    }

    /**
     * Make a "Choice" instance in a single call
     *
     * @psalm-api
     *
     * @param ChoiceExtensionInterface[]|null $extensions
     */
    public static function make(
        string $title,
        string $value,
        ?array $extensions = null,
    ): self {
        return new self($title, $value, $extensions);
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
                'title' => $this->title,
                'value' => $this->value,
                ...$extensionProperties,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
