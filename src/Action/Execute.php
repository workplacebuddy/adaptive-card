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
 * client. Clients process the event by sending an Invoke activity of type
 * adaptiveCard/action to the target Bot. The inputs that are gathered are those on
 * the current card, and in the case of a show card those on any parent cards. See
 * [Universal Action
 * Model](https://docs.microsoft.com/en-us/adaptive-cards/authoring-cards/universal-action-model)
 * documentation for more details.
 *
 * @since 1.4
 */
final class Execute extends Action implements
    JsonSerializable,
    ActionInterface,
    ItemInterface,
    ISelectActionInterface
{
    /**
     * Must be `Action.Execute`
     *
     * @since 1.4
     */
    private const TYPE = 'Action.Execute';

    /**
     * The card author-defined verb associated with this action.
     *
     * @since 1.4
     */
    public ?string $verb = null;

    /**
     * Initial data that input fields will be combined with. These are essentially
     * ‘hidden’ properties.
     *
     * @since 1.4
     */
    public string|object|array|null $data = null;

    /**
     * Controls which inputs are associated with the action.
     *
     * @since 1.4
     */
    public ?AssociatedInputs $associatedInputs = null;

    /**
     * Create a "Execute" instance in a single call
     */
    public function __construct(
        ?string $verb = null,
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
    ) {
        $this->verb = $verb;
        $this->data = $data;
        $this->associatedInputs = $associatedInputs;
        $this->title = $title;
        $this->iconUrl = $iconUrl;
        $this->id = $id;
        $this->style = $style;
        $this->fallback = $fallback;
        $this->tooltip = $tooltip;
        $this->isEnabled = $isEnabled;
        $this->mode = $mode;
    }

    /**
     * Make a "Execute" instance in a single call
     *
     * @psalm-api
     */
    public static function make(
        ?string $verb = null,
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
        return new self(
            $verb,
            $data,
            $associatedInputs,
            $title,
            $iconUrl,
            $id,
            $style,
            $fallback,
            $tooltip,
            $isEnabled,
            $mode,
        );
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            array_filter(
                [
                    'type' => self::TYPE,
                    'verb' => $this->verb,
                    'data' => $this->data,
                    'associatedInputs' => $this->associatedInputs,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
