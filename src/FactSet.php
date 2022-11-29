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
 * @psalm-suppress MissingConstructor
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
     * Make an instance in a single call
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
        $self = new self();

        $self->facts = $facts;
        $self->fallback = $fallback;
        $self->height = $height;
        $self->separator = $separator;
        $self->spacing = $spacing;

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
                'facts' => $this->facts,
            ]),
        );
    }
}
