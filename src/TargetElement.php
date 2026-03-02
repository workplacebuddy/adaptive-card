<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\TargetElementExtensionInterface;
use JsonSerializable;

/**
 * Represents an entry for Action.ToggleVisibility's targetElements property
 *
 * @since 1.0
 */
final class TargetElement implements JsonSerializable
{
    /**
     * Must be `TargetElement`
     *
     * @since 1.0
     */
    private const TYPE = 'TargetElement';

    /**
     * Element ID of element to toggle
     *
     * @since 1.0
     */
    public string $elementId;

    /**
     * If `true`, always show target element. If `false`, always hide target element.
     * If not supplied, toggle target element's visibility.
     *
     * @since 1.0
     */
    public ?bool $isVisible = null;

    /**
     * Extensions to augment this element
     *
     * @var TargetElementExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "TargetElement" instance in a single call
     *
     * @param TargetElementExtensionInterface[]|null $extensions
     */
    public function __construct(
        string $elementId,
        ?bool $isVisible = null,
        ?array $extensions = null,
    ) {
        $this->elementId = $elementId;
        $this->isVisible = $isVisible;
        $this->extensions = $extensions;
    }

    /**
     * Make a "TargetElement" instance in a single call
     *
     * @psalm-api
     *
     * @param TargetElementExtensionInterface[]|null $extensions
     */
    public static function make(
        string $elementId,
        ?bool $isVisible = null,
        ?array $extensions = null,
    ): self {
        return new self($elementId, $isVisible, $extensions);
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

        return array_filter(
            [
                'type' => self::TYPE,
                'elementId' => $this->elementId,
                'isVisible' => $this->isVisible,
                ...$extensionProperties,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
