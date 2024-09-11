<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

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
     * Create a "FactSet" instance in a single call
     *
     * @param Fact[] $facts
     */
    public function __construct(
        array $facts,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ) {
        $this->facts = $facts;
        $this->fallback = $fallback;
        $this->height = $height;
        $this->separator = $separator;
        $this->spacing = $spacing;
    }

    /**
     * Make a "FactSet" instance in a single call
     *
     * @psalm-api
     *
     * @param Fact[] $facts
     */
    public static function make(
        array $facts,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
    ): self {
        return new self($facts, $fallback, $height, $separator, $spacing);
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
                    'facts' => $this->facts,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
