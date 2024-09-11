<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Defines various metadata properties
 *
 * @since 1.6
 * @psalm-suppress MissingConstructor
 */
final class Metadata implements JsonSerializable
{
    /**
     * Must be `Metadata`
     *
     * @since 1.6
     */
    private const TYPE = 'Metadata';

    /**
     * URL that uniquely identifies the card and serves as a browser fallback that can
     * be used by some hosts.
     *
     * @since 1.6
     */
    public ?string $webUrl = null;

    /**
     * Make an instance in a single call
     *
     * @psalm-api
     */
    public static function make(?string $webUrl = null): self
    {
        $self = new self();

        $self->webUrl = $webUrl;

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
                'webUrl' => $this->webUrl,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
