<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\FactSetExtensionInterface;
use JsonSerializable;

/**
 * The FactSet element displays a series of facts (i.e. name/value pairs) in a
 * tabular form.
 *
 * @since 1.0
 */
final class FactSet extends Element implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `FactSet`
     *
     * @since 1.0
     */
    private const TYPE = 'FactSet';

    /**
     * The array of `Fact`'s.
     *
     * @var Fact[]
     * @since 1.0
     */
    public array $facts;

    /**
     * Extensions to augment this element
     *
     * @var FactSetExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "FactSet" instance in a single call
     *
     * @param Fact[] $facts
     * @param FactSetExtensionInterface[]|null $extensions
     */
    public function __construct(
        array $facts,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
        ?array $extensions = null,
    ) {
        $this->facts = $facts;
        $this->fallback = $fallback;
        $this->height = $height;
        $this->separator = $separator;
        $this->spacing = $spacing;
        $this->extensions = $extensions;
    }

    /**
     * Make a "FactSet" instance in a single call
     *
     * @psalm-api
     *
     * @param Fact[] $facts
     * @param FactSetExtensionInterface[]|null $extensions
     */
    public static function make(
        array $facts,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
        ?array $extensions = null,
    ): self {
        return new self(
            $facts,
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
                    'facts' => $this->facts,
                    ...$extensionProperties,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
