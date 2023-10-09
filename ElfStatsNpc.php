<?php

class ElfStatsNpc extends StatsNpc
{
    private array $stats;

    public function __construct()
    {
        $this->generateStats();
    }

    private function generateStats(): void
    {
        $this->stats = [
            'for' => rand(1, 6),
            'dex' => rand(3, 10),
            'vig' => rand(1, 6),
            'int' => rand(1, 8),
            'sag' => rand(3, 10),
            'cha' => rand(3, 10),
        ];
    }

    public function getStats(): array
    {
        return $this->stats;
    }
}
