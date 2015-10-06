<?php
define("LIFESPAN_WORKER_BEE", 75);
define("HIT_WORKER_BEE", 10);
define("TYPE_BEE", "WORKER");
require_once 'Bee.php';

/**
 * Class WorkerBee
 * use default bee values
 */
class WorkerBee extends Bee {
    public function __construct()
    {
        $this->lifespan = LIFESPANQUEENBEE;
        $this->hit = HIT_WORKER_BEE;
        $this->typeBee = TYPE_BEE;
    }
} 