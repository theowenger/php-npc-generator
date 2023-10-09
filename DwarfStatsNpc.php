<?php

class DwarfStatsNpc extends StatsNpc
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
            'dex' => rand(1, 7),
            'vig' => rand(3, 10),
            'int' => rand(3, 10),
            'sag' => rand(1, 7),
            'cha' => rand(3, 10),
        ];
    }

    public function getStats(): array
    {
        return $this->stats;
    }
}
