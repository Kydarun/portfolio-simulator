<?php

namespace App\Services\MarketData;

final class Candle
{
    public function __construct(
        public readonly \DateTimeImmutable $timestamp,
        public readonly float $open,
        public readonly float $high,
        public readonly float $low,
        public readonly float $close,
        public readonly float $volume,
    ) {
    }
}