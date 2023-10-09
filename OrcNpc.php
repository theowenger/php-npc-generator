<?php

require './OrcStatsNpc.php';

class OrcNpc extends BaseNpc
{
    protected string $firstName;
    protected string $lastName;

    public function __construct()
    {
        parent::__construct();
    }

    public function setFirstName(): void
    {
        $femalefirstNames = ['Gomoku', 'Mughragh', 'Hagu '];
        $malefirstNames = ['Morlag', 'Uloth', 'Rulfim'];

        $sex = $this->getSex();

        if ($sex === 'Homme') {
            $randomIndex = array_rand($malefirstNames);
            $this->firstName = $malefirstNames[$randomIndex];
        } elseif ($sex === 'Femme') {
            $randomIndex = array_rand($femalefirstNames);
            $this->firstName = $femalefirstNames[$randomIndex];
        }
    }
    public function setLastName(): void
    {
        $lastNames = ['Kuul', 'Zrag', 'Gourga'];
        $randomIndex = array_rand($lastNames);
        $this->lastName = $lastNames[$randomIndex];
    }
    public function setStats(): void
    {
        $statsNpc = new OrcStatsNpc();
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
        return rand(12, 60);
    }
}
