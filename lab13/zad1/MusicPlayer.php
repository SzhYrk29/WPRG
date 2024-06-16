<?php

class MusicPlayer implements Volume, Playable
{
    private int $volume;
    private bool $isPlaying;
    public function __construct()
    {
        $this->volume = 0;
        $this->isPlaying = false;
    }

    function increaseVolume()
    {
        if ($this->volume < 10)
            $this->volume++;
    }

    function decreaseVolume()
    {
        if (0 < $this->volume)
            $this->volume--;
    }

    function play()
    {
        $this->isPlaying = true;
    }

    function stop()
    {
        $this->isPlaying = false;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }

    public function getStatus(): bool
    {
        return $this->isPlaying;
    }

}