<?php

/**
 * This is a generated file, do not modify this by hand.
 */

declare(strict_types=1);

namespace AdaptiveCard\Data;

use JsonSerializable;

/**
 * The data populated in the event payload for fetching dynamic choices, sent to
 * the card-author to help identify the dataset from which choices might be fetched
 * to be displayed in the dropdown. It might contain auxillary data to limit the
 * maximum number of choices that can be sent and to support pagination.
 *
 * @since 1.0
 */
final class Query implements JsonSerializable
{
    /**
     * Must be `Data.Query`
     *
     * @since 1.0
     */
    private const TYPE = 'Data.Query';

    /**
     * The dataset to be queried to get the choices.
     *
     * @since 1.6
     */
    public string $dataset;

    /**
     * The maximum number of choices that should be returned by the query. It can be
     * ignored if the card-author wants to send a different number.
     *
     * @since 1.6
     */
    public ?int $count = null;

    /**
     * The number of choices to be skipped in the list of choices returned by the
     * query. It can be ignored if the card-author does not want pagination.
     *
     * @since 1.6
     */
    public ?int $skip = null;

    /**
     * Create a "Query" instance in a single call
     */
    public function __construct(
        string $dataset,
        ?int $count = null,
        ?int $skip = null,
    ) {
        $this->dataset = $dataset;
        $this->count = $count;
        $this->skip = $skip;
    }

    /**
     * Make a "Query" instance in a single call
     *
     * @psalm-api
     */
    public static function make(
        string $dataset,
        ?int $count = null,
        ?int $skip = null,
    ): self {
        return new self($dataset, $count, $skip);
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'type' => self::TYPE,
                'dataset' => $this->dataset,
                'count' => $this->count,
                'skip' => $this->skip,
            ],
            /** @psalm-suppress RedundantConditionGivenDocblockType */
            fn(mixed $value): bool => $value !== null,
        );
    }
}
