<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use AdaptiveCard\Extension\AdaptiveCardExtensionInterface;
use JsonSerializable;

/**
 * An Adaptive Card, containing a free-form body of card elements, and an optional
 * set of actions.
 *
 * @since 1.0
 */
final class AdaptiveCard implements JsonSerializable
{
    /**
     * Must be `AdaptiveCard`
     *
     * @since 1.0
     */
    private const TYPE = 'AdaptiveCard';

    /**
     * The Adaptive Card schema.
     */
    private const SCHEMA = 'http://adaptivecards.io/schemas/adaptive-card.json';

    /**
     * Schema version that this card requires. If a client is **lower** than this
     * version, the `fallbackText` will be rendered. NOTE: Version is not required for
     * cards within an `Action.ShowCard`. However, it *is* required for the top-level
     * card.
     *
     * @since 1.0
     */
    public Version $version = Version::Version10;

    /**
     * Defines how the card can be refreshed by making a request to the target Bot.
     *
     * @since 1.4
     */
    public ?Refresh $refresh = null;

    /**
     * Defines authentication information to enable on-behalf-of single sign on or
     * just-in-time OAuth.
     *
     * @since 1.4
     */
    public ?Authentication $authentication = null;

    /**
     * The card elements to show in the primary card region.
     *
     * @var ElementInterface[]|null
     * @since 1.0
     */
    public ?array $body = null;

    /**
     * The Actions to show in the card's action bar.
     *
     * @var ActionInterface[]|null
     * @since 1.0
     */
    public ?array $actions = null;

    /**
     * An Action that will be invoked when the card is tapped or selected.
     * `Action.ShowCard` is not supported.
     *
     * @since 1.1
     */
    public ?ISelectActionInterface $selectAction = null;

    /**
     * Text shown when the client doesn't support the version specified (may contain
     * markdown).
     *
     * @since 1.0
     */
    public ?string $fallbackText = null;

    /**
     * Specifies the background image of the card.
     *
     * @since 1.2
     */
    public BackgroundImage|string|null $backgroundImage = null;

    /**
     * Defines various metadata properties typically not used for rendering the card
     *
     * @since 1.6
     */
    public ?Metadata $metadata = null;

    /**
     * Specifies the minimum height of the card.
     *
     * @since 1.2
     */
    public ?string $minHeight = null;

    /**
     * When `true` content in this Adaptive Card should be presented right to left.
     * When 'false' content in this Adaptive Card should be presented left to right. If
     * unset, the default platform behavior will apply.
     *
     * @since 1.5
     */
    public ?bool $rtl = null;

    /**
     * Specifies what should be spoken for this entire card. This is simple text or
     * SSML fragment.
     *
     * @since 1.0
     */
    public ?string $speak = null;

    /**
     * The 2-letter ISO-639-1 language used in the card. Used to localize any date/time
     * functions.
     *
     * @since 1.0
     */
    public ?string $lang = null;

    /**
     * Defines how the content should be aligned vertically within the container. Only
     * relevant for fixed-height cards, or cards with a `minHeight` specified.
     *
     * @since 1.1
     */
    public ?VerticalContentAlignment $verticalContentAlignment = null;

    /**
     * Extensions to augment this element
     *
     * @var AdaptiveCardExtensionInterface[]|null
     */
    public ?array $extensions;

    /**
     * Create a "AdaptiveCard" instance in a single call
     *
     * @param ElementInterface[]|null $body
     * @param ActionInterface[]|null $actions
     * @param AdaptiveCardExtensionInterface[]|null $extensions
     */
    public function __construct(
        Version $version = Version::Version10,
        ?Refresh $refresh = null,
        ?Authentication $authentication = null,
        ?array $body = null,
        ?array $actions = null,
        ?ISelectActionInterface $selectAction = null,
        ?string $fallbackText = null,
        BackgroundImage|string|null $backgroundImage = null,
        ?Metadata $metadata = null,
        ?string $minHeight = null,
        ?bool $rtl = null,
        ?string $speak = null,
        ?string $lang = null,
        ?VerticalContentAlignment $verticalContentAlignment = null,
        ?array $extensions = null,
    ) {
        $this->version = $version;
        $this->refresh = $refresh;
        $this->authentication = $authentication;
        $this->body = $body;
        $this->actions = $actions;
        $this->selectAction = $selectAction;
        $this->fallbackText = $fallbackText;
        $this->backgroundImage = $backgroundImage;
        $this->metadata = $metadata;
        $this->minHeight = $minHeight;
        $this->rtl = $rtl;
        $this->speak = $speak;
        $this->lang = $lang;
        $this->verticalContentAlignment = $verticalContentAlignment;
        $this->extensions = $extensions;
    }

    /**
     * Make a "AdaptiveCard" instance in a single call
     *
     * @psalm-api
     *
     * @param ElementInterface[]|null $body
     * @param ActionInterface[]|null $actions
     * @param AdaptiveCardExtensionInterface[]|null $extensions
     */
    public static function make(
        Version $version = Version::Version10,
        ?Refresh $refresh = null,
        ?Authentication $authentication = null,
        ?array $body = null,
        ?array $actions = null,
        ?ISelectActionInterface $selectAction = null,
        ?string $fallbackText = null,
        BackgroundImage|string|null $backgroundImage = null,
        ?Metadata $metadata = null,
        ?string $minHeight = null,
        ?bool $rtl = null,
        ?string $speak = null,
        ?string $lang = null,
        ?VerticalContentAlignment $verticalContentAlignment = null,
        ?array $extensions = null,
    ): self {
        return new self(
            $version,
            $refresh,
            $authentication,
            $body,
            $actions,
            $selectAction,
            $fallbackText,
            $backgroundImage,
            $metadata,
            $minHeight,
            $rtl,
            $speak,
            $lang,
            $verticalContentAlignment,
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

        return array_filter(
            [
                'type' => self::TYPE,
                '$schema' => self::SCHEMA,
                'version' => $this->version,
                'refresh' => $this->refresh,
                'authentication' => $this->authentication,
                'body' => $this->body,
                'actions' => $this->actions,
                'selectAction' => $this->selectAction,
                'fallbackText' => $this->fallbackText,
                'backgroundImage' => $this->backgroundImage,
                'metadata' => $this->metadata,
                'minHeight' => $this->minHeight,
                'rtl' => $this->rtl,
                'speak' => $this->speak,
                'lang' => $this->lang,
                'verticalContentAlignment' => $this->verticalContentAlignment,
                ...$extensionProperties,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
