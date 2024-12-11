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
     * Create a "OpenUrl" instance in a single call
     */
    public function __construct(
        string $url,
        ?string $title = null,
        ?string $iconUrl = null,
        ?string $id = null,
        ?\AdaptiveCard\ActionStyle $style = null,
        ActionInterface|\AdaptiveCard\FallbackOption|null $fallback = null,
        ?string $tooltip = null,
        ?bool $isEnabled = null,
        ?\AdaptiveCard\ActionMode $mode = null,
    ) {
        $this->url = $url;
        $this->title = $title;
        $this->iconUrl = $iconUrl;
        $this->id = $id;
        $this->style = $style;
        $this->fallback = $fallback;
        $this->tooltip = $tooltip;
        $this->isEnabled = $isEnabled;
        $this->mode = $mode;
    }

    /**
     * Make a "OpenUrl" instance in a single call
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
        return new self(
            $url,
            $title,
            $iconUrl,
            $id,
            $style,
            $fallback,
            $tooltip,
            $isEnabled,
            $mode,
        );
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
