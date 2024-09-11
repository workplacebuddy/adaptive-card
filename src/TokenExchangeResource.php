<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Defines information required to enable on-behalf-of single sign-on user
 * authentication. Maps to the TokenExchangeResource type defined by the Bot
 * Framework
 * (https://docs.microsoft.com/dotnet/api/microsoft.bot.schema.tokenexchangeresource)
 *
 * @since 1.4
 */
final class TokenExchangeResource implements JsonSerializable
{
    /**
     * Must be `TokenExchangeResource`
     *
     * @since 1.4
     */
    private const TYPE = 'TokenExchangeResource';

    /**
     * The unique identified of this token exchange instance.
     *
     * @since 1.4
     */
    public string $id;

    /**
     * An application ID or resource identifier with which to exchange a token on
     * behalf of. This property is identity provider- and application-specific.
     *
     * @since 1.4
     */
    public string $uri;

    /**
     * An identifier for the identity provider with which to attempt a token exchange.
     *
     * @since 1.4
     */
    public string $providerId;

    /**
     * Create a "TokenExchangeResource" instance in a single call
     */
    public function __construct(string $id, string $uri, string $providerId)
    {
        $this->id = $id;
        $this->uri = $uri;
        $this->providerId = $providerId;
    }

    /**
     * Make a "TokenExchangeResource" instance in a single call
     *
     * @psalm-api
     */
    public static function make(
        string $id,
        string $uri,
        string $providerId,
    ): self {
        return new self($id, $uri, $providerId);
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'type' => self::TYPE,
                'id' => $this->id,
                'uri' => $this->uri,
                'providerId' => $this->providerId,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
