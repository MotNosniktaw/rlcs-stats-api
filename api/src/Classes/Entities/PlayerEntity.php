<?php

namespace Api\Entities;

class PlayerEntity
{
    private $name;
    private $team;

    public function __construct(string $name, int $team)
    {
        $this->name = $name;
        $this->team = $team;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTeam()
    {
        return $this->team;
    }
}
