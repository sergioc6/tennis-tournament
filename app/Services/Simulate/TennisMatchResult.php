<?php

namespace App\Services\Simulate;

final class TennisMatchResult
{
    private string $result;

    private const RESULTS_BEST_OF_3 = [
        '6-0 6-2',
        '4-6 6-1 6-3',
        '6-2 6-2',
        '7-6 6-7 7-6',
        '6-0 6-0',
        '6-1 1-6 6-0',
        '6-2 6-2'
    ];

    private const RESULTS_BEST_OF_5 = [
        '6-0 6-2 6-2',
        '4-6 6-1 6-3 6-0',
        '6-2 6-2 6-2',
        '7-6 6-7 7-6 6-0',
        '6-0 6-0 6-0',
        '6-1 1-6 6-0 6-4',
    ];

    private function __construct(string $result)
    {
        $this->result = $result;
    }

    public static function random(bool $bestOf5 = false): self
    {
        $results = $bestOf5 ? self::RESULTS_BEST_OF_5 : self::RESULTS_BEST_OF_3;
        $randomResult = $results[array_rand($results)];

        return new self($randomResult);
    }

    public static function all(bool $bestOf5 = false): array
    {
        $results = $bestOf5 ? self::RESULTS_BEST_OF_5 : self::RESULTS_BEST_OF_3;
        return array_map(fn($res) => new self($res), $results);
    }

    public function value(): string
    {
        return $this->result;
    }

    public function __toString(): string
    {
        return $this->result;
    }

}