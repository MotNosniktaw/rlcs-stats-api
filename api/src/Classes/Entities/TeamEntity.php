<?php

namespace Api\Entities;

class TeamEntity
{
    private $name;
    private $region;

    public function __construct(string $name, string $region)
    {
        $this->name = $name;
        $this->region = $region;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRegion()
    {
        return $this->region;
    }
}