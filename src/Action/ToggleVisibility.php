<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Action;

use AdaptiveCard\Action;
use AdaptiveCard\ActionInterface;
use AdaptiveCard\ISelectActionInterface;
use AdaptiveCard\ItemInterface;
use AdaptiveCard\TargetElement;
use JsonSerializable;

/**
 * An action that toggles the visibility of associated card elements.
 *
 * @since 1.2
 * @psalm-suppress MissingConstructor
 */
final class ToggleVisibility extends Action implements
    JsonSerializable,
    ActionInterface,
    ItemInterface,
    ISelectActionInterface
{
    /**
     * Must be `Action.ToggleVisibility`
     *
     * @since 1.2
     */
    private const TYPE = 'Action.ToggleVisibility';

    /**
     * The array of TargetElements. It is not recommended to include Input elements
     * with validation under Action.Toggle due to confusion that can arise from invalid
     * inputs that are not currently visible. See
     * https://docs.microsoft.com/en-us/adaptive-cards/authoring-cards/input-validation
     * for more information.
     *
     * @var TargetElement[]
     * @since 1.2
     */
    public array $targetElements;

    /**
     * Make an instance in a single call
     *
     * @param TargetElement[] $targetElements
     */
    public static function make(
        array $targetElements,
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

        $self->targetElements = $targetElements;
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
            array_filter(
                [
                    'type' => self::TYPE,
                    'targetElements' => $this->targetElements,
                ],
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
