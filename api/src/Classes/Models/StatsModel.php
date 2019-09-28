<?php

namespace Api\Models;

class StatsModel
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPlayers()
    {
        $sql = 'SELECT `players`.`player_id`, `players`.`player_name`, `teams`.`team_name` FROM `players`
        LEFT JOIN `teams` ON `players`.`team` = `teams`.`team_id`;';
        $query = $this->db->query($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getTeams()
    {
        $sql = 'SELECT `team_id`, `team_name`, `region` FROM `teams`;';
        $query = $this->db->query($sql);
        $query->execute();

        return $query->fetchAll();
    }


}
