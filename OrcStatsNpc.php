<?php

class OrcStatsNpc extends StatsNpc
{
    private array $stats;

    public function __construct()
    {
        $this->generateStats();
    }

    private function generateStats(): void
    {
        $this->stats = [
            'for' => rand(3, 10),
            'dex' => rand(1, 6),
            'vig' => rand(3, 10),
            'int' => rand(1, 8),
            'sag' => rand(1, 6),
            'cha' => rand(3, 10),
        ];
    }

    public function getStats(): array
    {
        return $this->stats;
    }
}
