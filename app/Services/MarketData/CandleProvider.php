<?php

namespace App\Services\MarketData;

interface CandleProvider
{
    /**
     * Stream candles in strict ascending time order.
     *
     * @return iterable<Candle>
     */
    public function stream(
        string $symbol,
        string $resolution,
        \DateTimeImmutable $from,
        \DateTimeImmutable $to,
        string $dataVersion
    ): iterable;
}