<?php
trait Speed
{
    private int $speed;
    public function increaseSpeed($speed)
    {
        $this->speed += $speed;
    }
    public function decreaseSpeed($speed)
    {
        $this->speed -= $speed;
    }
}