<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\ActionSetExtensionInterface;
use JsonSerializable;

/**
 * Displays a set of actions.
 *
 * @since 1.2
 */
final class ActionSet extends Element implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `ActionSet`
     *
     * @since 1.2
     */
    private const TYPE = 'ActionSet';

    /**
     * The array of `Action` elements to show.
     *
     * @var ActionInterface[]
     * @since 1.2
     */
    public array $actions;

    /**
     * Extensions to augment this element
     *
     * @var ActionSetExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "ActionSet" instance in a single call
     *
     * @param ActionInterface[] $actions
     * @param ActionSetExtensionInterface[]|null $extensions
     */
    public function __construct(
        array $actions,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
        ?array $extensions = null,
    ) {
        $this->actions = $actions;
        $this->fallback = $fallback;
        $this->height = $height;
        $this->separator = $separator;
        $this->spacing = $spacing;
        $this->extensions = $extensions;
    }

    /**
     * Make a "ActionSet" instance in a single call
     *
     * @psalm-api
     *
     * @param ActionInterface[] $actions
     * @param ActionSetExtensionInterface[]|null $extensions
     */
    public static function make(
        array $actions,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
        ?array $extensions = null,
    ): self {
        return new self(
            $actions,
            $fallback,
            $height,
            $separator,
            $spacing,
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
                    'actions' => $this->actions,
                    ...$extensionProperties,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
