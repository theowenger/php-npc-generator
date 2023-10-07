<?php

class BaseNpc
{
    private array $firstNames = ['john', 'jack', 'bruno'];
    private array $lastNames = ['barbouz', 'madala', 'gravel'];
    private string $firstName;
    private string $lastName;
    private string $behavior;
    private string $race;
    private int $age;
    private string $sex;
    private array $stats;
    private string $agressivite;
    private string $honor;

    public function __construct()
    {
    }

    public static function getInstance(array $data): self
    {
        $npc = new self(); // Crée une nouvelle instance de BaseNpc

        // Utilisez les méthodes internes pour initialiser les propriétés
        $npc->setFirstName();
        $npc->setLastName();
        $npc->setBehavior($data['behavior']);
        $npc->setRace($data['race']);
        $npc->setSex($data['sex']);
        $npc->setStats();
        $npc->setAgressivite();
        $npc->setHonnor();
        $npc->setAge($npc->getRandomAge());

        // var_dump($npc);
        return $npc;
    }

    public function setFirstName(): void
    {
        $randomIndex = array_rand($this->firstNames);
        $this->firstName = $this->firstNames[$randomIndex];
    }

    public function setLastName(): void
    {
        $randomIndex = array_rand($this->lastNames);
        $this->lastName = $this->lastNames[$randomIndex];
    }
    public function setBehavior(string $behavior): void
    {
        $behaviors = ['friendly', 'hostile'];
        if ($behavior === "random") {
            $randomIndex = array_rand($behaviors);
            $behavior = $behaviors[$randomIndex];
        }

        $this->behavior = $behavior;
    }
    public function setRace(string $race): void
    {
        require './ElfNpc.php';
        $races = ['human', 'elf', 'dwarf', 'orc'];
        switch ($race) {
            case 'random':
                $randomIndex = array_rand($races);
                $race = $races[$randomIndex];
                break;
            case 'human':
                $race = 'Humain';
                break;
            case 'elf':
                $race = 'Elfe';
                $elfNpc = new ElfNpc();
                var_dump($elfNpc);
                break;
            case 'dwarf':
                $race = 'Nain';
                break;
            case 'orc':
                $race = 'Orc';
                break;
        }
        $this->race = $race;
    }
    public function setSex(string $sex): void
    {
        $sexs = ['Homme', 'Femme'];
        switch ($sex) {
            case 'random':
                $randomIndex = array_rand($sexs);
                $sex = $sexs[$randomIndex];
                break;
            case 'man':
                $sex = 'Homme';
                break;
            case 'woman':
                $sex = 'Femme';
                break;
        }
        $this->sex = $sex;
    }
    public function setStats(): void
    {
        require './StatsNpc.php';
        $statsNpc = new StatsNpc();
        $this->stats = $statsNpc->getStats();
    }
    public function setAgressivite(): void
    {
        $this->agressivite = 'mechant';
    }
    public function setHonnor(): void
    {
        $this->honor = 'vertueux';
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }
    public function getRandomAge(): int
    {
        return rand(15, 100);
    }

    public function getFirstName()
    {
        return '<p>Prenom : ' .  $this->firstName . '</p>';
    }
    public function getLastName()
    {
        return '<p>Nom : ' .  $this->lastName . '</p>';
    }
    public function getAge()
    {
        return '<p>Age : ' .  $this->age . '</p>';
    }
    public function getBehavior()
    {
        return '<p>Attitude : ' .  $this->behavior . '</p>';
    }
    public function getRace()
    {
        return '<p>Race : ' .  $this->race . '</p>';
    }
    public function getSex()
    {
        return '<p>Sexe : ' .  $this->sex . '</p>';
    }
    public function getStats()
    {
        $result = '<p>Statistiques : </p>';

        foreach ($this->stats as $statName => $statValue) {
            $result .= '<p>' . $statName . ': ' . $statValue . '</p>';
        }

        return $result;
    }
    public function getAgressivite()
    {
        return '<p>Agressivité : ' .  $this->agressivite . '</p>';
    }
    public function getHonor()
    {
        return '<p>Honneur : ' .  $this->honor . '</p>';
    }
    public function getAll()
    {
        $info = $this->getFirstName();
        $info .= $this->getLastName();
        $info .= $this->getAge();
        $info .= $this->getBehavior();
        $info .= $this->getRace();
        $info .= $this->getSex();
        $info .= $this->getAgressivite();
        $info .= $this->getHonor();
        $info .= $this->getStats();
        return  $info;
    }
}
