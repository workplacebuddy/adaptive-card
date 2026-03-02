<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Action;

use AdaptiveCard\Action;
use AdaptiveCard\ActionInterface;
use AdaptiveCard\Extension\Action\ToggleVisibilityExtensionInterface;
use AdaptiveCard\ISelectActionInterface;
use AdaptiveCard\ItemInterface;
use AdaptiveCard\TargetElement;
use JsonSerializable;

/**
 * An action that toggles the visibility of associated card elements.
 *
 * @since 1.2
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
     * Extensions to augment this element
     *
     * @var ToggleVisibilityExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "ToggleVisibility" instance in a single call
     *
     * @param TargetElement[] $targetElements
     * @param ToggleVisibilityExtensionInterface[]|null $extensions
     */
    public function __construct(
        array $targetElements,
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
        $this->targetElements = $targetElements;
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
     * Make a "ToggleVisibility" instance in a single call
     *
     * @psalm-api
     *
     * @param TargetElement[] $targetElements
     * @param ToggleVisibilityExtensionInterface[]|null $extensions
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
        ?array $extensions = null,
    ): self {
        return new self(
            $targetElements,
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
                    'targetElements' => $this->targetElements,
                    ...$extensionProperties,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
