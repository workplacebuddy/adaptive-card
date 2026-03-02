<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\AuthenticationExtensionInterface;
use JsonSerializable;

/**
 * Defines authentication information associated with a card. This maps to the
 * OAuthCard type defined by the Bot Framework
 * (https://docs.microsoft.com/dotnet/api/microsoft.bot.schema.oauthcard)
 *
 * @since 1.4
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
     * Extensions to augment this element
     *
     * @var AuthenticationExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "Authentication" instance in a single call
     *
     * @param AuthCardButton[]|null $buttons
     * @param AuthenticationExtensionInterface[]|null $extensions
     */
    public function __construct(
        ?string $text = null,
        ?string $connectionName = null,
        ?TokenExchangeResource $tokenExchangeResource = null,
        ?array $buttons = null,
        ?array $extensions = null,
    ) {
        $this->text = $text;
        $this->connectionName = $connectionName;
        $this->tokenExchangeResource = $tokenExchangeResource;
        $this->buttons = $buttons;
        $this->extensions = $extensions;
    }

    /**
     * Make a "Authentication" instance in a single call
     *
     * @psalm-api
     *
     * @param AuthCardButton[]|null $buttons
     * @param AuthenticationExtensionInterface[]|null $extensions
     */
    public static function make(
        ?string $text = null,
        ?string $connectionName = null,
        ?TokenExchangeResource $tokenExchangeResource = null,
        ?array $buttons = null,
        ?array $extensions = null,
    ): self {
        return new self(
            $text,
            $connectionName,
            $tokenExchangeResource,
            $buttons,
            $extensions,
        );
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
                'text' => $this->text,
                'connectionName' => $this->connectionName,
                'tokenExchangeResource' => $this->tokenExchangeResource,
                'buttons' => $this->buttons,
                ...$extensionProperties,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
