<?php

declare(strict_types=1);

namespace AdaptiveCardExtension\MicrosoftTeams;

use AdaptiveCard\Extension\ImageExtensionInterface;
use Override;

/**
 * Stageview for images in Adaptive Cards
 *
 * In an Adaptive Card, you can use the `msteams` property to add the ability
 * to display images in Stageview selectively. When users hover over the
 * images, they can see an expand icon, for which the allowExpand attribute is
 * set to 'true`.
 */
class AllowExpand implements ImageExtensionInterface
{
    /**
     * @return array<string, mixed>
     */
    #[Override]
    public function getExtensionProperties(): array
    {
        return [
            'msteams' => [
                'allowExpand' => true,
            ],
        ];
    }
}
