<?php

namespace App\Services\MarketData\Providers;

use App\Services\MarketData\CandleProvider;
use App\Services\MarketData\Candle;

class DuckDbCandleProvider implements CandleProvider
{
    public function stream(
        string $symbol,
        string $resolution,
        \DateTimeImmutable $from,
        \DateTimeImmutable $to,
        string $dataVersion
    ): iterable {
        $path = sprintf(
            '%s/%s/%s/%s/*.parquet',
            config('candles.path'),
            $dataVersion,
            $symbol,
            $resolution
        );

        $sql = <<<SQL
SELECT open_time as timestamp, open, high, low, close, quote_asset_volume as volume
FROM read_parquet('$path')
WHERE timestamp BETWEEN '{$from->format('Y-m-d H:i:s')}'
                    AND '{$to->format('Y-m-d H:i:s')}'
ORDER BY timestamp
SQL;

        $process = popen("duckdb -csv -noheader :memory: \"$sql\"", 'r');

        while (($row = fgetcsv($process)) !== false) {
            yield new Candle(
                new \DateTimeImmutable($row[0]),
                (float) $row[1],
                (float) $row[2],
                (float) $row[3],
                (float) $row[4],
                (float) $row[5]
            );
        }

        pclose($process);
    }
}