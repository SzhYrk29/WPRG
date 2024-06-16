<?php
require_once 'Speed.php';
class Car
{
    use Speed;
    public function start()
    {
        $this->speed = 0;
        $this->increaseSpeed(10);
    }
}