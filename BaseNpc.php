<?php

require './StatsNpc.php';
require './ElfNpc.php';
require './OrcNpc.php';
require './DwarfNpc.php';

class BaseNpc
{
    private string $firstName;
    private string $lastName;
    private string $behavior;
    private string $race;
    private int $age;
    private string $sex;
    protected array $stats = [];
    private string $agressivite;
    private string $honor;

    public function __construct()
    {
    }

    private static function _selectRace(array &$data)
    {
        $races = ['human', 'elf', 'dwarf', 'orc'];
        $race = $data['race'];
        if ($race === 'random') {
            $randomIndex = array_rand($races);
            $data['race'] = $races[$randomIndex];
        }
    }
    private static function _selectSex(array &$data)
    {
        $sexs = ['Homme', 'Femme'];
        switch ($data['sex']) {
            case 'random':
                $randomIndex = array_rand($sexs);
                $data['sex'] = $sexs[$randomIndex];
                break;
            case 'man':
                $data['sex'] = 'Homme';
                break;
            case 'woman':
                $data['sex'] = 'Femme';
                break;
        }
    }


    public static function getInstance(array $data): self
    {
        self::_selectRace($data);
        self::_selectSex($data);

        $race = $data['race'];
        switch ($race) {
            case 'elf':
                $npc = new ElfNpc();
                break;
            case 'dwarf':
                $npc = new DwarfNpc();
                break;
            case 'orc':
                $npc = new OrcNpc();
                break;
            default:
                $npc = new BaseNpc();
        }
        $npc->setRace($data['race']);
        $npc->setSex($data['sex']);
        $npc->handleBehavior($data['behavior']);
        $npc->handleFirstName();
        $npc->handleLastName();
        $npc->handleStats();
        $npc->handleAgressivite();
        $npc->handleHonnor();
        $npc->setAge($npc->getRandomAge());

        return $npc;
    }



    public function handleLastName(): void
    {
        $lastNames = ['barbouz', 'madala', 'gravel'];
        $randomIndex = array_rand($lastNames);
        $this->lastName = $lastNames[$randomIndex];
    }
    public function handleBehavior(string $behavior): void
    {
        $behaviors = ['friendly', 'hostile'];
        if ($behavior === "random") {
            $randomIndex = array_rand($behaviors);
            $behavior = $behaviors[$randomIndex];
        }

        $this->behavior = $behavior;
    }
    public function handleFirstName(): void
    {
        $femalefirstNames = ['lucie', 'judith', 'zoé'];
        $malefirstNames = ['john', 'jack', 'bruno'];

        if ($this->sex === 'Homme') {
            $randomIndex = array_rand($malefirstNames);
            $this->firstName = $malefirstNames[$randomIndex];
        } elseif ($this->sex === 'Femme') {
            $randomIndex = array_rand($femalefirstNames);
            $this->firstName = $femalefirstNames[$randomIndex];
        }
    }
    public function setRace(string $race): void
    {
        $this->race = $race;
    }
    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }
    public function handleStats(): void
    {
        $statsNpc = new StatsNpc();
        $this->stats = $statsNpc->getStats();
    }
    public function handleAgressivite(): void
    {
        $arrayAgressivite = ['Hostile', 'Bienveillant', 'Agressif', 'Arrogant', 'Ambitieux', 'Attentioné', 'Associal', 'Desagréable', 'Blagueur', 'Timide'];
        $randomIndex = array_rand($arrayAgressivite);
        $this->agressivite = $arrayAgressivite[$randomIndex];
    }
    public function handleHonnor(): void
    {
        $arrayHonor = ['Misereux', 'Sans le sous', 'Travailleur honnete', 'Riche', 'Noble', 'Marginal'];
        $randomIndex = array_rand($arrayHonor);
        $this->honor = $arrayHonor[$randomIndex];
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
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getBehavior()
    {
        return $this->behavior;
    }
    public function getRace()
    {
        return $this->race;
    }
    public function getSex()
    {
        return $this->sex;
    }
    public function getStats()
    {
        return $this->stats;
    }
    public function getAgressivite()
    {
        return $this->agressivite;
    }
    public function getHonor()
    {
        return  $this->honor;
    }
    public function getAll()
    {
        $info = '<p>' . $this->getFirstName() . '</p>';
        $info .= '<p>' . $this->getLastName() . '</p>';
        $info .= '<p>' . $this->getAge() . '</p>';
        $info .= '<p>' . $this->getBehavior() . '</p>';
        $info .= '<p>' . $this->getRace() . '</p>';
        $info .= '<p>' . $this->getSex() . '</p>';
        $info .= '<p>' . $this->getAgressivite() . '</p>';
        $info .= '<p>' . $this->getHonor() . '</p>';
        $info .= '<p>Stats:</p>';
        foreach ($this->stats as $statName => $statValue) {
            $info .= '<p>' . $statName . ': ' . $statValue . '</p>';
        }
        return  $info;
    }
}
