<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * @since 1.0
 * @psalm-suppress MissingConstructor
 */
abstract class Action extends Item implements JsonSerializable
{
    /**
     * Label for button or link that represents this action.
     *
     * @since 1.0
     */
    public ?string $title = null;

    /**
     * Optional icon to be shown on the action in conjunction with the title. Supports
     * data URI in version 1.2+
     *
     * @since 1.1
     */
    public ?string $iconUrl = null;

    /**
     * A unique identifier associated with this Action.
     *
     * @since 1.0
     */
    public ?string $id = null;

    /**
     * Controls the style of an Action, which influences how the action is displayed,
     * spoken, etc.
     *
     * @since 1.2
     */
    public ?ActionStyle $style = null;

    /**
     * Describes what to do when an unknown element is encountered or the requires of
     * this or any children can't be met.
     *
     * @since 1.2
     */
    public ActionInterface|FallbackOption|null $fallback = null;

    /**
     * Defines text that should be displayed to the end user as they hover the mouse
     * over the action, and read when using narration software.
     *
     * @since 1.5
     */
    public ?string $tooltip = null;

    /**
     * Determines whether the action should be enabled.
     *
     * @since 1.5
     */
    public ?bool $isEnabled = null;

    /**
     * Determines whether the action should be displayed as a button or in the overflow
     * menu.
     *
     * @since 1.5
     */
    public ?ActionMode $mode = null;

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_merge(
            parent::jsonSerialize(),
            array_filter(
                [
                    'title' => $this->title,
                    'iconUrl' => $this->iconUrl,
                    'id' => $this->id,
                    'style' => $this->style,
                    'fallback' => $this->fallback,
                    'tooltip' => $this->tooltip,
                    'isEnabled' => $this->isEnabled,
                    'mode' => $this->mode,
                ],
                /** @psalm-suppress RedundantConditionGivenDocblockType */
                fn(mixed $value): bool => $value !== null,
            ),
        );
    }
}
