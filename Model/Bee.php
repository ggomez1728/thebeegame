<?php

 class Bee {

    protected $lifespan ;
    protected $hit;
    protected $typeBee;

     function getLifespan()
     {
         return $this->lifespan;
     }

     public function getTypeBee()
     {
         return $this->typeBee;
     }

     public function hit()
     {
         $this->lifespan -= $this->hit;
     }

     public function itIsHit()
     {
         $this->hit();
         if ($this->getLifespan() <= 0) {
             __destruct();
         }
     }

     public function __destruct() {

     }
/*
    public function __construct($id = null)
    {
        $this->id = $id;
        $this->currentHP = static::$MAX_HP;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCurrentHP()
    {
        return $this->currentHP;
    }
    /**
     * return child class
     *
     * @return string
     */


    /**
     *
     * @return bool if hit point lowered
     */

}