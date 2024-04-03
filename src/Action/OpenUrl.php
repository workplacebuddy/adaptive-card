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
use JsonSerializable;

/**
 * When invoked, show the given url either by launching it in an external web
 * browser or showing within an embedded web browser.
 *
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
final class OpenUrl extends Action implements
    JsonSerializable,
    ActionInterface,
    ItemInterface,
    ISelectActionInterface
{
    /**
     * Must be `Action.OpenUrl`
     *
     * @since 1.0
     */
    private const TYPE = 'Action.OpenUrl';

    /**
     * The URL to open.
     *
     * @since 1.0
     */
    public string $url;

    /**
     * Make an instance in a single call
     *
     * @psalm-api
     */
    public static function make(
        string $url,
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

        $self->url = $url;
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
                    'url' => $this->url,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
