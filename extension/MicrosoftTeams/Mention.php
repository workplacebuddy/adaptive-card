<?php

declare(strict_types=1);

namespace AdaptiveCardExtension\MicrosoftTeams;

use AdaptiveCard\Extension\AdaptiveCardExtensionInterface;
use Override;

/**
 * Mention support within Adaptive Cards
 *
 * You can add @mentions within an Adaptive Card body for bots and message
 * extension responses. To add @mentions in cards, follow the same
 * notification logic and rendering as that of message based mentions in
 * channel and group chat conversations.
 */
class Mention implements AdaptiveCardExtensionInterface
{
    /**
     * Must be `mention`
     */
    private const TYPE = 'mention';

    /**
     * The text to be displayed for the @mention. This is required and must be in the format of `<at>display name</at>`.
     */
    private string $text;

    /**
     * The unique identifier of the entity being mentioned.
     */
    private string $id;

    /**
     * The name of the entity being mentioned.
     */
    private string $name;

    public function __construct(string $text, string $id, string $name)
    {
        $this->text = $text;
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return array<string, mixed>
     */
    #[Override]
    public function getExtensionProperties(): array
    {
        return [
            'msteams' => [
                'entities' => [
                    [
                        'type' => self::TYPE,
                        'text' => $this->text,
                        'mentioned' => [
                            'id' => $this->id,
                            'name' => $this->name,
                        ],
                    ],
                ],
            ],
        ];
    }
}
