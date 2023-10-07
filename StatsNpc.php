<?php

class StatsNpc
{
    private array $stats;

    public function __construct()
    {
        $this->generateStats();
    }

    private function generateStats(): void
    {
        $this->stats = [
            'for' => rand(1, 10),
            'dex' => rand(1, 10),
            'vig' => rand(1, 10),
            'int' => rand(1, 10),
            'sag' => rand(1, 10),
            'cha' => rand(1, 10),
        ];
    }

    public function getStats(): array
    {
        return $this->stats;
    }
}
