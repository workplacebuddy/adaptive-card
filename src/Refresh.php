<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Action\Execute;
use JsonSerializable;

/**
 * Defines how a card can be refreshed by making a request to the target Bot.
 *
 * @since 1.4
 */
final class Refresh implements JsonSerializable
{
    /**
     * Must be `Refresh`
     *
     * @since 1.4
     */
    private const TYPE = 'Refresh';

    /**
     * The action to be executed to refresh the card. Clients can run this refresh
     * action automatically or can provide an affordance for users to trigger it
     * manually.
     *
     * @since 1.4
     */
    public ?Execute $action = null;

    /**
     * A timestamp that informs a Host when the card content has expired, and that it
     * should trigger a refresh as appropriate. The format is ISO-8601 Instant format.
     * E.g., 2022-01-01T12:00:00Z
     *
     * @since 1.6
     */
    public ?string $expires = null;

    /**
     * A list of user Ids informing the client for which users should the refresh
     * action should be run automatically. Some clients will not run the refresh action
     * automatically unless this property is specified. Some clients may ignore this
     * property and always run the refresh action automatically.
     *
     * @var string[]|null
     * @since 1.4
     */
    public ?array $userIds = null;

    /**
     * Create a "Refresh" instance in a single call
     *
     * @param string[]|null $userIds
     */
    public function __construct(
        ?Execute $action = null,
        ?string $expires = null,
        ?array $userIds = null,
    ) {
        $this->action = $action;
        $this->expires = $expires;
        $this->userIds = $userIds;
    }

    /**
     * Make a "Refresh" instance in a single call
     *
     * @psalm-api
     *
     * @param string[]|null $userIds
     */
    public static function make(
        ?Execute $action = null,
        ?string $expires = null,
        ?array $userIds = null,
    ): self {
        return new self($action, $expires, $userIds);
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'type' => self::TYPE,
                'action' => $this->action,
                'expires' => $this->expires,
                'userIds' => $this->userIds,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
