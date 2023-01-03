<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Defines authentication information associated with a card. This maps to the
 * OAuthCard type defined by the Bot Framework
 * (https://docs.microsoft.com/dotnet/api/microsoft.bot.schema.oauthcard)
 *
 * @since 1.4
 * @psalm-suppress MissingConstructor
 */
final class Authentication implements JsonSerializable
{
    /**
     * Must be `Authentication`
     *
     * @since 1.4
     */
    private const TYPE = 'Authentication';

    /**
     * Text that can be displayed to the end user when prompting them to authenticate.
     *
     * @since 1.4
     */
    public ?string $text = null;

    /**
     * The identifier for registered OAuth connection setting information.
     *
     * @since 1.4
     */
    public ?string $connectionName = null;

    /**
     * Provides information required to enable on-behalf-of single sign-on user
     * authentication.
     *
     * @since 1.4
     */
    public ?TokenExchangeResource $tokenExchangeResource = null;

    /**
     * Buttons that should be displayed to the user when prompting for authentication.
     * The array MUST contain one button of type "signin". Other button types are not
     * currently supported.
     *
     * @var AuthCardButton[]|null
     * @since 1.4
     */
    public ?array $buttons = null;

    /**
     * Make an instance in a single call
     *
     * @param AuthCardButton[]|null $buttons
     */
    public static function make(
        ?string $text = null,
        ?string $connectionName = null,
        ?TokenExchangeResource $tokenExchangeResource = null,
        ?array $buttons = null,
    ): self {
        $self = new self();

        $self->text = $text;
        $self->connectionName = $connectionName;
        $self->tokenExchangeResource = $tokenExchangeResource;
        $self->buttons = $buttons;

        return $self;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'text' => $this->text,
            'connectionName' => $this->connectionName,
            'tokenExchangeResource' => $this->tokenExchangeResource,
            'buttons' => $this->buttons,
        ]);
    }
}
