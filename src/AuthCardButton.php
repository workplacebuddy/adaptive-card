<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\AuthCardButtonExtensionInterface;
use JsonSerializable;

/**
 * Defines a button as displayed when prompting a user to authenticate. This maps
 * to the cardAction type defined by the Bot Framework
 * (https://docs.microsoft.com/dotnet/api/microsoft.bot.schema.cardaction).
 *
 * @since 1.4
 */
final class AuthCardButton implements JsonSerializable
{
    /**
     * The type of the button.
     *
     * @since 1.4
     */
    private const TYPE = 'AuthCardButton';

    /**
     * The caption of the button.
     *
     * @since 1.4
     */
    public ?string $title = null;

    /**
     * A URL to an image to display alongside the button's caption.
     *
     * @since 1.4
     */
    public ?string $image = null;

    /**
     * The value associated with the button. The meaning of value depends on the
     * button's type.
     *
     * @since 1.4
     */
    public string $value;

    /**
     * Extensions to augment this element
     *
     * @var AuthCardButtonExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "AuthCardButton" instance in a single call
     *
     * @param AuthCardButtonExtensionInterface[]|null $extensions
     */
    public function __construct(
        string $value,
        ?string $title = null,
        ?string $image = null,
        ?array $extensions = null,
    ) {
        $this->value = $value;
        $this->title = $title;
        $this->image = $image;
        $this->extensions = $extensions;
    }

    /**
     * Make a "AuthCardButton" instance in a single call
     *
     * @psalm-api
     *
     * @param AuthCardButtonExtensionInterface[]|null $extensions
     */
    public static function make(
        string $value,
        ?string $title = null,
        ?string $image = null,
        ?array $extensions = null,
    ): self {
        return new self($value, $title, $image, $extensions);
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
                'image' => $this->image,
                'value' => $this->value,
                ...$extensionProperties,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
