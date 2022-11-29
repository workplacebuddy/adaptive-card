<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard;

/**
 * Controls the approximate size of the image. The physical dimensions will vary
 * per host. Every option preserves aspect ratio.
 *
 * @since 1.0
 */
enum ImageSize: string
{
    case Auto = 'auto';
    case Stretch = 'stretch';
    case Small = 'small';
    case Medium = 'medium';
    case Large = 'large';
}
