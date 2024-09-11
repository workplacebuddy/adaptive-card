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
-   `AdapticeCard\Input\Text` to ask for some text
-   Etc..

All elements can be found here: https://adaptivecards.io/explorer/, everything
should be available -- the elements are generated directly from the
manifest/schema.

All elements also have a static method to quickly create a single element:
`make`.

### For example

```php
$card = new AdaptiveCard\AdapticeCard();

$card->body = [AdaptiveCard\TextBlock::make(text: 'Hello world!')];

$card->actions = [
    AdapticeCard\Action\OpenUrl::make(
        title: 'Website',
        url: 'https://www.workplacebuddy.com/',
    ),
];
```

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
