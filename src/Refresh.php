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
 * @psalm-suppress MissingConstructor
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
     * Make an instance in a single call
     *
     * @param string[]|null $userIds
     */
    public static function make(
        ?Execute $action = null,
        ?array $userIds = null,
    ): self {
        $self = new self();

        $self->action = $action;
        $self->userIds = $userIds;

        return $self;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'action' => $this->action,
            'userIds' => $this->userIds,
        ]);
    }
}
