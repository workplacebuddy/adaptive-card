<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\RichTextBlockExtensionInterface;
use JsonSerializable;

/**
 * Defines an array of inlines, allowing for inline text formatting.
 *
 * @since 1.2
 */
final class RichTextBlock extends Element implements
    JsonSerializable,
    ItemInterface,
    ElementInterface,
    ToggleableItemInterface
{
    /**
     * Must be `RichTextBlock`
     *
     * @since 1.2
     */
    private const TYPE = 'RichTextBlock';

    /**
     * The array of inlines.
     *
     * @var InlineInterface[]
     * @since 1.2
     */
    public array $inlines;

    /**
     * Controls the horizontal text alignment. When not specified, the value of
     * horizontalAlignment is inherited from the parent container. If no parent
     * container has horizontalAlignment set, it defaults to Left.
     *
     * @since 1.2
     */
    public ?HorizontalAlignment $horizontalAlignment = null;

    /**
     * Extensions to augment this element
     *
     * @var RichTextBlockExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "RichTextBlock" instance in a single call
     *
     * @param InlineInterface[] $inlines
     * @param RichTextBlockExtensionInterface[]|null $extensions
     */
    public function __construct(
        array $inlines,
        ?HorizontalAlignment $horizontalAlignment = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
        ?array $extensions = null,
    ) {
        $this->inlines = $inlines;
        $this->horizontalAlignment = $horizontalAlignment;
        $this->fallback = $fallback;
        $this->height = $height;
        $this->separator = $separator;
        $this->spacing = $spacing;
        $this->extensions = $extensions;
    }

    /**
     * Make a "RichTextBlock" instance in a single call
     *
     * @psalm-api
     *
     * @param InlineInterface[] $inlines
     * @param RichTextBlockExtensionInterface[]|null $extensions
     */
    public static function make(
        array $inlines,
        ?HorizontalAlignment $horizontalAlignment = null,
        ElementInterface|FallbackOption|null $fallback = null,
        ?BlockElementHeight $height = null,
        ?bool $separator = null,
        ?Spacing $spacing = null,
        ?array $extensions = null,
    ): self {
        return new self(
            $inlines,
            $horizontalAlignment,
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
                    'inlines' => $this->inlines,
                    'horizontalAlignment' => $this->horizontalAlignment,
                    ...$extensionProperties,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
