<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Action;

use AdaptiveCard\Action;
use AdaptiveCard\ActionInterface;
use AdaptiveCard\AssociatedInputs;
use AdaptiveCard\Extension\Action\SubmitExtensionInterface;
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
     * Extensions to augment this element
     *
     * @var SubmitExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "Submit" instance in a single call
     *
     * @param SubmitExtensionInterface[]|null $extensions
     */
    public function __construct(
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
        ?array $extensions = null,
    ) {
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
        $this->extensions = $extensions;
    }

    /**
     * Make a "Submit" instance in a single call
     *
     * @psalm-api
     *
     * @param SubmitExtensionInterface[]|null $extensions
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
        ?array $extensions = null,
    ): self {
        return new self(
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

        return array_merge(
            parent::jsonSerialize(),
            array_filter(
                [
                    'type' => self::TYPE,
                    'data' => $this->data,
                    'associatedInputs' => $this->associatedInputs,
                    ...$extensionProperties,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
