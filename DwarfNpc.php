<?php

require './DwarfStatsNpc.php';

class DwarfNpc extends BaseNpc
{
    protected string $firstName;
    protected string $lastName;

    public function __construct()
    {
        parent::__construct();
    }

    public function handleFirstName(): void
    {
        $femalefirstNames = ['Kratdrolin ', 'Hukwobera', 'Webolydd'];
        $malefirstNames = ['Thrarurim', 'Darat', 'Hogheas'];

        $sex = $this->getSex();

        if ($sex === 'Homme') {
            $randomIndex = array_rand($malefirstNames);
            $this->firstName = $malefirstNames[$randomIndex];
        } elseif ($sex === 'Femme') {
            $randomIndex = array_rand($femalefirstNames);
            $this->firstName = $femalefirstNames[$randomIndex];
        }
    }
    public function handleLastName(): void
    {
        $lastNames = ['Au bras de marbre', ' Au derrière Profond', 'Faiseur des Mines'];
        $randomIndex = array_rand($lastNames);
        $this->lastName = $lastNames[$randomIndex];
    }
    public function handleStats(): void
    {
        $statsNpc = new DwarfStatsNpc();
        $this->stats = $statsNpc->getStats();
    }
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function getStats()
    {
        return $this->stats;
    }

    public function getRandomAge(): int
    {
        return rand(50, 1000);
    }
}