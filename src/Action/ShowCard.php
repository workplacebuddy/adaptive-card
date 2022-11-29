<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Action;

use AdaptiveCard\Action;
use AdaptiveCard\ActionInterface;
use AdaptiveCard\AdaptiveCard;
use AdaptiveCard\ItemInterface;
use JsonSerializable;

/**
 * Defines an AdaptiveCard which is shown to the user when the button or link is
 * clicked.
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class ShowCard extends Action implements
    JsonSerializable,
    ActionInterface,
    ItemInterface
{
    /**
     * Must be `Action.ShowCard`
     *
     * @since 1.0
     */
    private const TYPE = 'Action.ShowCard';

    /**
     * The Adaptive Card to show. Inputs in ShowCards will not be submitted if the
     * submit button is located on a parent card. See
     * https://docs.microsoft.com/en-us/adaptive-cards/authoring-cards/input-validation
     * for more details.
     *
     * @since 1.0
     */
    public ?AdaptiveCard $card = null;

    /**
     * Make an instance in a single call
     */
    public static function make(
        ?AdaptiveCard $card = null,
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

        $self->card = $card;
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
                'card' => $this->card,
            ]),
        );
    }
}
