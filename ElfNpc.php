<?php

class ElfNpc extends BaseNpc
{
    private string $firstName;

    public function __construct()
    {
        parent::__construct();
        $this->generateElfName();
    }

    protected function generateElfName(): void
    {
        $elfNames = ['Legolas', 'Arwen', 'Galadriel'];
        $randomIndex = array_rand($elfNames);
        $this->firstName = $elfNames[$randomIndex];
    }
}
