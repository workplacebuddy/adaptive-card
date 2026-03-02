<?php

declare(strict_types=1);

namespace AdaptiveCardExtension\MicrosoftTeams;

use AdaptiveCard\Extension\AdaptiveCardExtensionInterface;
use Override;

/**
 * Full width Adaptive Card
 *
 * You can use the `msteams` property to expand the width of an Adaptive Card
 * and make use of extra canvas space. The next section provides information
 * on how to use the property.
 */
class FullWidth implements AdaptiveCardExtensionInterface
{
    /**
     * @return array<string, mixed>
     */
    #[Override]
    public function getExtensionProperties(): array
    {
        return [
            'msteams' => [
                'width' => 'Full',
            ],
        ];
    }
}
