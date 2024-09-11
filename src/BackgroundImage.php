<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

use JsonSerializable;

/**
 * Specifies a background image. Acceptable formats are PNG, JPEG, and GIF
 *
 * @since 1.2
 */
final class BackgroundImage implements JsonSerializable
{
    /**
     * Must be `BackgroundImage`
     *
     * @since 1.2
     */
    private const TYPE = 'BackgroundImage';

    /**
     * The URL (or data url) of the image. Acceptable formats are PNG, JPEG, and GIF
     *
     * @since 1.2
     */
    public string $url;

    /**
     * Describes how the image should fill the area.
     *
     * @since 1.2
     */
    public ?ImageFillMode $fillMode = null;

    /**
     * Describes how the image should be aligned if it must be cropped or if using
     * repeat fill mode.
     *
     * @since 1.2
     */
    public ?HorizontalAlignment $horizontalAlignment = null;

    /**
     * Describes how the image should be aligned if it must be cropped or if using
     * repeat fill mode.
     *
     * @since 1.2
     */
    public ?VerticalAlignment $verticalAlignment = null;

    /**
     * Create a "BackgroundImage" instance in a single call
     */
    public function __construct(
        string $url,
        ?ImageFillMode $fillMode = null,
        ?HorizontalAlignment $horizontalAlignment = null,
        ?VerticalAlignment $verticalAlignment = null,
    ) {
        $this->url = $url;
        $this->fillMode = $fillMode;
        $this->horizontalAlignment = $horizontalAlignment;
        $this->verticalAlignment = $verticalAlignment;
    }

    /**
     * Make a "BackgroundImage" instance in a single call
     *
     * @psalm-api
     */
    public static function make(
        string $url,
        ?ImageFillMode $fillMode = null,
        ?HorizontalAlignment $horizontalAlignment = null,
        ?VerticalAlignment $verticalAlignment = null,
    ): self {
        return new self(
            $url,
            $fillMode,
            $horizontalAlignment,
            $verticalAlignment,
        );
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'type' => self::TYPE,
                'url' => $this->url,
                'fillMode' => $this->fillMode,
                'horizontalAlignment' => $this->horizontalAlignment,
                'verticalAlignment' => $this->verticalAlignment,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
