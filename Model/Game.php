<?php
require_once 'QueenBee.php';
require_once 'WorkerBee.php';
require_once 'DroneBee.php';

class Game {

    private $swarmId;

    /**
     * @var array
     */
    private $bees = [];

    /**
     * Current non-achieved round
     * @var int
     */
    private $round = 1;

    /**
     * @var array
     */
    private $hitLogs = [];


    /**
     * max number of QueenBee objects
     * @ar int
     */
    private $maxQueens;

    /**
     * @var int
     */
    private $maxWorkers;

    /**
     * @var int
     */
    private $maxDrones;



    /**
     * @param int $maxWorkers
     * @param int $maxDrones
     * @param int $maxQueens
     */
    public function __construct($swarmId = 'Rogue', $maxWorkers = 5, $maxDrones = 8, $maxQueens = 1)
    {
        $this->swarmId = $swarmId;
        /* Configurable swarm size */
        if (!is_null($maxWorkers)) $this->maxWorkers = $maxWorkers;
        if (!is_null($maxDrones)) $this->maxDrones = $maxDrones;
        if (!is_null($maxQueens)) $this->maxQueens = $maxQueens;


        for ($i = 0; $i < $this->maxQueens;$i++) {
            $this->bees[] = new QueenBee($this->swarmId.'-'.($this->getCountBees()+1));
        }
        for ($i = 0; $i < $this->maxWorkers;$i++) {
            $this->bees[] = new WorkerBee($this->swarmId.'-'.($this->getCountBees()+1));
        }
        for ($i = 0; $i < $this->maxDrones;$i++) {
            $this->bees[] = new DroneBee($this->swarmId.'-'.($this->getCountBees()+1));
        }
    }


    public function getSwarmId()
    {
        return $this->swarmId;
    }

    public function getRound()
    {
        return $this->round;
    }

    public function getHitLogs()
    {
        return $this->hitLogs;
    }

    public function getBees()
    {
        return $this->bees;
    }

    public function getCountBees()
    {
        return count($this->bees);
    }

    public function isDead()
    {
        return !(bool)$this->getCountBees();
    }

    /**
     * @param int $position - if null, random bee hitted
     * @return string story
     */
    public function play($position = null)
    {
        $story = '';

        if (is_null($position)) {
            $position = rand(0, $this->getCountBees()-1);
        }

        if (!isset($this->bees[$position])) {
            throw new Exception("Bee position $position undefined");
        }

        $bee = $this->bees[$position];

        if ($bee->hit()) {

            $story.= $bee->getClass().' '.$bee->getId().' hitted ! '
                . $bee::$DPH.' damage points taken. Current HP : '
                . $bee->getCurrentHP().' / '
                . $bee::$MAX_HP
                . '.'.PHP_EOL;

            if ($bee->isKilled()) {
                if (is_a($bee, 'QueenBee')) {
                    $this->bees = array();

                    $story.= 'Queen killed ! All bees are dying ! '
                        . '.'.PHP_EOL;
                } else {
                    unset($this->bees[$position]);
                    $this->bees = array_values(array_filter($this->bees));

                    $story.= $bee->getId().' killed ! Bees remaining : '
                        . $this->getCountBees()
                        . '.'.PHP_EOL;
                }
            }
        }

        $this->round++;
        $this->hitLogs[] = $story;
        return $story;
    }




} 