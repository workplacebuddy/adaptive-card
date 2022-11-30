<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Action;

use AdaptiveCard\Action;
use AdaptiveCard\ActionInterface;
use AdaptiveCard\AssociatedInputs;
use AdaptiveCard\ISelectActionInterface;
use AdaptiveCard\ItemInterface;
use JsonSerializable;

/**
 * Gathers input fields, merges with optional data field, and sends an event to the
 * client. It is up to the client to determine how this data is processed. For
 * example: With BotFramework bots, the client would send an activity through the
 * messaging medium to the bot. The inputs that are gathered are those on the
 * current card, and in the case of a show card those on any parent cards. See
 * https://docs.microsoft.com/en-us/adaptive-cards/authoring-cards/input-validation
 * for more details.
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class Submit extends Action implements
    JsonSerializable,
    ActionInterface,
    ItemInterface,
    ISelectActionInterface
{
    /**
     * Must be `Action.Submit`
     *
     * @since 1.0
     */
    private const TYPE = 'Action.Submit';

    /**
     * Initial data that input fields will be combined with. These are essentially
     * ‘hidden’ properties.
     *
     * @since 1.0
     */
    public string|object|array|null $data = null;

    /**
     * Controls which inputs are associated with the submit action.
     *
     * @since 1.3
     */
    public ?AssociatedInputs $associatedInputs = null;

    /**
     * Make an instance in a single call
     */
    public static function make(
        string|object|array|null $data = null,
        ?AssociatedInputs $associatedInputs = null,
        ?string $title = null,
        ?string $iconUrl = null,
        ?string $id = null,
        ?\AdaptiveCard\ActionStyle $style = null,
        ActionInterface|\AdaptiveCard\FallbackOption|null $fallback = null,
        ?string $tooltip = null,
        ?bool $isEnabled = null,
        ?\AdaptiveCard\ActionMode $mode = null,
    ): self {
        $self = new self();

        $self->data = $data;
        $self->associatedInputs = $associatedInputs;
        $self->title = $title;
        $self->iconUrl = $iconUrl;
        $self->id = $id;
        $self->style = $style;
        $self->fallback = $fallback;
        $self->tooltip = $tooltip;
        $self->isEnabled = $isEnabled;
        $self->mode = $mode;

        return $self;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            array_filter([
                'type' => self::TYPE,
                'data' => $this->data,
                'associatedInputs' => $this->associatedInputs,
            ]),
        );
    }
}
