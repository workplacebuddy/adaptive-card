<?php

declare(strict_types=1);

namespace AdaptiveCardTests;

use AdaptiveCard\Action\Execute;
use AdaptiveCard\Action\OpenUrl;
use AdaptiveCard\Action\ShowCard;
use AdaptiveCard\Action\Submit;
use AdaptiveCard\AdaptiveCard;
use AdaptiveCard\Column;
use AdaptiveCard\ColumnSet;
use AdaptiveCard\Fact;
use AdaptiveCard\FactSet;
use AdaptiveCard\FontSize;
use AdaptiveCard\FontWeight;
use AdaptiveCard\Image;
use AdaptiveCard\ImageSize;
use AdaptiveCard\ImageStyle;
use AdaptiveCard\Input\Date;
use AdaptiveCard\Input\Text;
use AdaptiveCard\Spacing;
use AdaptiveCard\TextBlock;
use AdaptiveCard\Version;
use AdaptiveCard\VerticalContentAlignment;
use PHPUnit\Framework\TestCase;

final class AdaptiveCardTest extends TestCase
{
    /**
     * @covers AdaptiveCard
     */
    public function testEmptyCard(): void
    {
        $card = new AdaptiveCard();

        $this->assertJsonStructure(
            [
                'type' => 'AdaptiveCard',
                '$schema' =>
                    'http://adaptivecards.io/schemas/adaptive-card.json',
                'version' => '1.0',
            ],
            $card,
        );
    }

    /**
     * @covers AdaptiveCard
     * @covers TextBlock
     */
    public function testSimpleTextBlockCard(): void
    {
        $card = new AdaptiveCard();

        $card->body = [TextBlock::make(text: 'Hello world!')];

        $this->assertJsonStructure(
            [
                'type' => 'AdaptiveCard',
                '$schema' =>
                    'http://adaptivecards.io/schemas/adaptive-card.json',
                'version' => '1.0',
                'body' => [['type' => 'TextBlock', 'text' => 'Hello world!']],
            ],
            $card,
        );
    }

    /**
     * @covers AdaptiveCard
     * @covers TextBlock
     */
    public function testSimpleTextBlockCardWithConstructor(): void
    {
        $card = new AdaptiveCard();

        $card->body = [new TextBlock(text: 'Hello world!')];

        $this->assertJsonStructure(
            [
                'type' => 'AdaptiveCard',
                '$schema' =>
                    'http://adaptivecards.io/schemas/adaptive-card.json',
                'version' => '1.0',
                'body' => [['type' => 'TextBlock', 'text' => 'Hello world!']],
            ],
            $card,
        );
    }

    /**
     * @covers AdaptiveCard
     */
    public function testSimpleEnumValueCard(): void
    {
        $card = AdaptiveCard::make(
            verticalContentAlignment: VerticalContentAlignment::Center,
        );

        $this->assertJsonStructure(
            [
                'type' => 'AdaptiveCard',
                '$schema' =>
                    'http://adaptivecards.io/schemas/adaptive-card.json',
                'version' => '1.0',
                'verticalContentAlignment' => 'center',
            ],
            $card,
        );
    }

    /**
     * @covers AdaptiveCard
     */
    public function testSimpleEnumValueCardWithConstructor(): void
    {
        $card = new AdaptiveCard(
            verticalContentAlignment: VerticalContentAlignment::Center,
        );

        $this->assertJsonStructure(
            [
                'type' => 'AdaptiveCard',
                '$schema' =>
                    'http://adaptivecards.io/schemas/adaptive-card.json',
                'version' => '1.0',
                'verticalContentAlignment' => 'center',
            ],
            $card,
        );
    }

    /**
     * @covers AdaptiveCard
     */
    public function testExecuteActionCard(): void
    {
        $card = AdaptiveCard::make(
            version: Version::Version14,
            actions: [
                Execute::make(
                    title: 'Go!',
                    verb: 'lets-go',
                    data: ['id' => 123],
                ),
            ],
        );

        $this->assertJsonStructure(
            [
                'type' => 'AdaptiveCard',
                '$schema' =>
                    'http://adaptivecards.io/schemas/adaptive-card.json',
                'version' => '1.4',
                'actions' => [
                    [
                        'type' => 'Action.Execute',
                        'title' => 'Go!',
                        'verb' => 'lets-go',
                        'data' => [
                            'id' => 123,
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
     * @covers Image
     * @covers ImageStyle
     * @covers ColumnSet
     * @covers Column
     * @covers FontSize
     * @covers FontWeight
     * @covers FactSet
     * @covers Fact
     * @covers Date
     * @covers Text
     * @covers Submit
     * @covers ShowCard
     * @covers OpenUrl
     */
    public function testComplexCard(): void
    {
        // adopted from initial example of https://adaptivecards.io/designer/

        $card = AdaptiveCard::make(
            version: Version::Version15,
            body: [
                TextBlock::make(
                    size: FontSize::Medium,
                    weight: FontWeight::Bolder,
                    text: '${title}',
                ),
                ColumnSet::make(
                    columns: [
                        Column::make(
                            items: [
                                Image::make(
                                    style: ImageStyle::Person,
                                    url: '${creator.profileImage}',
                                    size: ImageSize::Small,
                                ),
                            ],
                            width: 'auto',
                        ),
                        Column::make(
                            items: [
                                TextBlock::make(
                                    weight: FontWeight::Bolder,
                                    text: '${creator.name}',
                                    wrap: true,
                                ),
                                TextBlock::make(
                                    spacing: Spacing::None,
                                    text: 'Created {{DATE(${createdUtc},SHORT)}}',
                                    isSubtle: true,
                                    wrap: true,
                                ),
                            ],
                            width: 'stretch',
                        ),
                    ],
                ),
                TextBlock::make(text: '${description}', wrap: true),
                FactSet::make(
                    facts: [Fact::make(title: '${key}:', value: '${value}')],
                ),
            ],
            actions: [
                ShowCard::make(
                    title: 'Set due date',
                    card: AdaptiveCard::make(
                        body: [
                            Date::make(id: 'dueDate'),
                            Text::make(
                                id: 'comment',
                                placeholder: 'Add a comment',
                                isMultiline: true,
                            ),
                        ],
                        actions: [Submit::make(title: 'OK')],
                    ),
                ),
                OpenUrl::make(title: 'View', url: '${viewUrl}'),
            ],
        );

        $this->assertJsonStructure(
            [
                'type' => 'AdaptiveCard',
                '$schema' =>
                    'http://adaptivecards.io/schemas/adaptive-card.json',
                'version' => '1.5',
                'body' => [
                    [
                        'type' => 'TextBlock',
                        'size' => 'medium',
                        'weight' => 'bolder',
                        'text' => '${title}',
                    ],
                    [
                        'type' => 'ColumnSet',
                        'columns' => [
                            [
                                'type' => 'Column',
                                'items' => [
                                    [
                                        'type' => 'Image',
                                        'style' => 'person',
                                        'url' => '${creator.profileImage}',
                                        'size' => 'small',
                                    ],
                                ],
                                'width' => 'auto',
                            ],
                            [
                                'type' => 'Column',
                                'items' => [
                                    [
                                        'type' => 'TextBlock',
                                        'weight' => 'bolder',
                                        'text' => '${creator.name}',
                                        'wrap' => true,
                                    ],
                                    [
                                        'type' => 'TextBlock',
                                        'spacing' => 'none',
                                        'text' =>
                                            'Created {{DATE(${createdUtc},SHORT)}}',
                                        'isSubtle' => true,
                                        'wrap' => true,
                                    ],
                                ],
                                'width' => 'stretch',
                            ],
                        ],
                    ],
                    [
                        'type' => 'TextBlock',
                        'text' => '${description}',
                        'wrap' => true,
                    ],
                    [
                        'type' => 'FactSet',
                        'facts' => [
                            [
                                'type' => 'Fact',
                                'title' => '${key}:',
                                'value' => '${value}',
                            ],
                        ],
                    ],
                ],
                'actions' => [
                    [
                        'type' => 'Action.ShowCard',
                        'title' => 'Set due date',
                        'card' => [
                            'type' => 'AdaptiveCard',
                            '$schema' =>
                                'http://adaptivecards.io/schemas/adaptive-card.json',
                            'version' => '1.0',
                            'body' => [
                                [
                                    'type' => 'Input.Date',
                                    'id' => 'dueDate',
                                ],
                                [
                                    'type' => 'Input.Text',
                                    'id' => 'comment',
                                    'placeholder' => 'Add a comment',
                                    'isMultiline' => true,
                                ],
                            ],
                            'actions' => [
                                [
                                    'type' => 'Action.Submit',
                                    'title' => 'OK',
                                ],
                            ],
                        ],
                    ],
                    [
                        'type' => 'Action.OpenUrl',
                        'title' => 'View',
                        'url' => '${viewUrl}',
                    ],
                ],
            ],
            $card,
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

        $this->assertJson($json);

        /** @var array $data */
        $data = json_decode($json, true);

        $this->assertEquals($structure, $data);
    }
}
