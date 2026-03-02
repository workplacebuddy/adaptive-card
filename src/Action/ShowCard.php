<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Action;

use AdaptiveCard\Action;
use AdaptiveCard\ActionInterface;
use AdaptiveCard\AdaptiveCard;
use AdaptiveCard\Extension\Action\ShowCardExtensionInterface;
use AdaptiveCard\ItemInterface;
use JsonSerializable;

/**
 * Defines an AdaptiveCard which is shown to the user when the button or link is
 * clicked.
 *
 * @since 1.0
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
     * Extensions to augment this element
     *
     * @var ShowCardExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "ShowCard" instance in a single call
     *
     * @param ShowCardExtensionInterface[]|null $extensions
     */
    public function __construct(
        ?AdaptiveCard $card = null,
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
        $this->card = $card;
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
     * Make a "ShowCard" instance in a single call
     *
     * @psalm-api
     *
     * @param ShowCardExtensionInterface[]|null $extensions
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
        ?array $extensions = null,
    ): self {
        return new self(
            $card,
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
                    'card' => $this->card,
                    ...$extensionProperties,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
