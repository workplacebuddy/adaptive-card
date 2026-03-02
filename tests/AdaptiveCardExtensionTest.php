<?php

declare(strict_types=1);

namespace AdaptiveCardTests;

use AdaptiveCard\AdaptiveCard;
use AdaptiveCard\Image;
use AdaptiveCard\ImageSize;
use AdaptiveCard\ImageStyle;
use AdaptiveCard\TextBlock;
use AdaptiveCardExtension\MicrosoftTeams\AllowExpand;
use AdaptiveCardExtension\MicrosoftTeams\FullWidth;
use AdaptiveCardExtension\MicrosoftTeams\Mention;
use PHPUnit\Framework\TestCase;

final class AdaptiveCardExtensionTest extends TestCase
{
    /**
     * @covers AdaptiveCard
     * @covers FullWidth
     */
    public function testEmptyCardFullWidth(): void
    {
        $card = new AdaptiveCard(extensions: [new FullWidth()]);

        $this->assertJsonStructure(
            [
                'type' => 'AdaptiveCard',
                '$schema' =>
                    'http://adaptivecards.io/schemas/adaptive-card.json',
                'version' => '1.0',
                'msteams' => [
                    'width' => 'Full',
                ],
            ],
            $card,
        );
    }

    /**
     * @covers AdaptiveCard
     * @covers AllowExpand
     */
    public function testAllowExpand(): void
    {
        $card = new AdaptiveCard(
            body: [
                new Image(
                    style: ImageStyle::Person,
                    url: '${creator.profileImage}',
                    size: ImageSize::Small,
                    extensions: [new AllowExpand()],
                ),
            ],
        );

        $this->assertJsonStructure(
            [
                'type' => 'AdaptiveCard',
                '$schema' =>
                    'http://adaptivecards.io/schemas/adaptive-card.json',
                'version' => '1.0',
                'body' => [
                    [
                        'type' => 'Image',
                        'style' => 'person',
                        'url' => '${creator.profileImage}',
                        'size' => 'small',
                        'msteams' => [
                            'allowExpand' => true,
                        ],
                    ],
                ],
            ],
            $card,
        );
    }

    /**
     * @covers AdaptiveCard
     * @covers TextBlock
     * @covers Mention
     */
    public function testMention(): void
    {
        $card = new AdaptiveCard(
            body: [new TextBlock(text: 'Hello <at>John Doe</at>')],
            extensions: [
                new Mention(
                    text: '<at>John Doe</at>',
                    id: '29:123124124124',
                    name: 'John Doe',
                ),
            ],
        );

        $this->assertJsonStructure(
            [
                'type' => 'AdaptiveCard',
                '$schema' =>
                    'http://adaptivecards.io/schemas/adaptive-card.json',
                'version' => '1.0',
                'body' => [
                    [
                        'type' => 'TextBlock',
                        'text' => 'Hello <at>John Doe</at>',
                    ],
                ],
                'msteams' => [
                    'entities' => [
                        [
                            'type' => 'mention',
                            'text' => '<at>John Doe</at>',
                            'mentioned' => [
                                'id' => '29:123124124124',
                                'name' => 'John Doe',
                            ],
                        ],
                    ],
                ],
            ],
            $card,
        );
    }

    /**
     * @covers AdaptiveCard
     * @covers TextBlock
     * @covers Mention
     */
    public function testMultipleMentions(): void
    {
        $card = new AdaptiveCard(
            body: [
                new TextBlock(
                    text: 'Hello <at>John Doe</at> and <at>Jane Doe</at>',
                ),
            ],
            extensions: [
                new Mention(
                    text: '<at>John Doe</at>',
                    id: '29:123124124124',
                    name: 'John Doe',
                ),
                new Mention(
                    text: '<at>Jane Doe</at>',
                    id: '29:123124124125',
                    name: 'Jane Doe',
                ),
            ],
        );

        $this->assertJsonStructure(
            [
                'type' => 'AdaptiveCard',
                '$schema' =>
                    'http://adaptivecards.io/schemas/adaptive-card.json',
                'version' => '1.0',
                'body' => [
                    [
                        'type' => 'TextBlock',
                        'text' =>
                            'Hello <at>John Doe</at> and <at>Jane Doe</at>',
                    ],
                ],
                'msteams' => [
                    'entities' => [
                        [
                            'type' => 'mention',
                            'text' => '<at>John Doe</at>',
                            'mentioned' => [
                                'id' => '29:123124124124',
                                'name' => 'John Doe',
                            ],
                        ],
                        [
                            'type' => 'mention',
                            'text' => '<at>Jane Doe</at>',
                            'mentioned' => [
                                'id' => '29:123124124125',
                                'name' => 'Jane Doe',
                            ],
                        ],
                    ],
                ],
            ],
            $card,
        );
    }

    /**
     * Assert that multiple extensions with the same root property (e.g. `msteams`) are merged together correctly
     *
     * Merging is done with `array_merge_recursive`, which means that if multiple extensions define the same property, they will be merged into an array. This is the expected behavior for the `entities` property, which can contain multiple mention entities.
     */
    public function testMergeBehavior(): void
    {
        $one = [
            'msteams' => ['width' => 'Full'],
        ];

        $two = [
            'msteams' => ['allowExpand' => true],
        ];

        $three = [
            'msteams' => [
                'entities' => [
                    [
                        'type' => 'mention',
                        'text' => '<at>John Doe</at>',
                        'mentioned' => [
                            'id' => '29:123124124124',
                            'name' => 'John Doe',
                        ],
                    ],
                ],
            ],
        ];

        $four = [
            'msteams' => [
                'entities' => [
                    [
                        'type' => 'mention',
                        'text' => '<at>Jane Doe</at>',
                        'mentioned' => [
                            'id' => '29:123124124125',
                            'name' => 'Jane Doe',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals(
            [
                'msteams' => [
                    'width' => 'Full',
                    'allowExpand' => true,
                    'entities' => [
                        [
                            'type' => 'mention',
                            'text' => '<at>John Doe</at>',
                            'mentioned' => [
                                'id' => '29:123124124124',
                                'name' => 'John Doe',
                            ],
                        ],
                        [
                            'type' => 'mention',
                            'text' => '<at>Jane Doe</at>',
                            'mentioned' => [
                                'id' => '29:123124124125',
                                'name' => 'Jane Doe',
                            ],
                        ],
                    ],
                ],
            ],
            array_merge_recursive($one, $two, $three, $four),
        );
    }

    /**
     * Assert that the card has the expect (valid) JSON structure
     */
    private function assertJsonStructure(
        array $structure,
        AdaptiveCard $card,
    ): void {
        $json = json_encode($card);

        $this->assertNotFalse($json);
        $this->assertJson($json);

        /** @var array $data */
        $data = json_decode($json, true);

        $this->assertEquals($structure, $data);
    }
}
