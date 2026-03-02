# Adaptive Cards for PHP

> Classes and enums to generate [Adaptive Card] elements

Definitions are generated from the [schema].

## Usage

Most of the classes are available in the `AdaptiveCard` namespace:

-   `AdaptiveCard/AdaptiveCard` for the main card
-   `AdaptiveCard/Colors` to fiddle with some colors
-   Etc..

Some more specific elements are in their own namespaces, like
the actions and the inputs:

-   `AdaptiveCard\Action\OpenUrl` to open an URL when clicked
-   `AdaptiveCard\Input\Text` to ask for some text
-   Etc..

All elements can be found here: https://adaptivecards.io/explorer/, everything
should be available -- the elements are generated directly from the
manifest/schema.

All elements also have a constructor to quickly create a single element:

### For example

```php
$card = new AdaptiveCard\AdaptiveCard();

$card->body = [new AdaptiveCard\TextBlock(text: 'Hello world!')];

$card->actions = [
    new AdaptiveCard\Action\OpenUrl(
        title: 'Website',
        url: 'https://www.workplacebuddy.com/',
    ),
];
```

## Extensions

All elements have an extensions property to inject custom properties into the
elements; for every element there is an unique interface, so injecting
extensions for the wrong element is not possible.

The extensions exist as a stopgap for missing properties in the schema. There
is currently no up-to-date schema available.

Merging is done with `array_merge_recursive`:

> If the input arrays have the same string keys, then the values for these keys
> are merged together into an array, and this is done recursively, so that if
> one of the values is an array itself, the function will merge it with a
> corresponding entry in another array too. If, however, the arrays have the
> same numeric key, the later value will not overwrite the original value, but
> will be appended.

### Shipped extensions

-   `AdaptiveCardExtension\MicrosoftTeams\FullWidth`
    You can use the `msteams` property to expand the width of an Adaptive Card
    and make use of extra canvas space. The next section provides information
    on how to use the property.
-   `AdaptiveCardExtension\MicrosoftTeams\AllowExpand`
    In an Adaptive Card, you can use the `msteams` property to add the ability
    to display images in Stageview selectively. When users hover over the
    images, they can see an expand icon, for which the allowExpand attribute is
    set to 'true`.
-   `AdaptiveCardExtension\MicrosoftTeams\Mention`
    You can add @mentions within an Adaptive Card body for bots and message
    extension responses. To add @mentions in cards, follow the same
    notification logic and rendering as that of message based mentions in
    channel and group chat conversations.

### Create your own extensions

-   Find the interface for the element you want to extend
-   Create a class that implements that interface
-   Add the extension to the constructor of the element

## How to generate

-   Clone this repo
-   Install the dependencies, both from [Packagist] and [NPM]
    -   `composer install`
    -   `npm install`
    -   Prettier is used to format the end result
-   Optionally run `composer run fetch-schema` to fetch a fresh schema
-   Run `composer run generate` to generate a new version of classes/enums

[adaptive card]: https://adaptivecards.io/
[schema]: https://raw.githubusercontent.com/microsoft/AdaptiveCards/main/schemas/1.6.0/adaptive-card.json
[packagist]: https://packagist.org/packages/workplacebuddy/adaptive-card
[npm]: https://www.npmjs.com/
