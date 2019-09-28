<?php

namespace Api\Models;

class StatsModel
{
    protected $db;

    public function __construct(\PDO $db)
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

    public function getPlayerInfo(int $id)
    {
        $query = $this->db->prepare('SELECT * FROM `players` WHERE `player_id` = :playerID;');
        $query->bindParam('playerID', $id, \PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }

    public function getSeasons()
    {
        $sql = 'SELECT `seasons`.`season`,
        `goals`.`player_name` AS `top_scorer`,
        `saves`.`player_name` AS `golden_goalie`,
        `assists`.`player_name` AS `playmaker`,
        `na_champ`.`team_name` AS `na_champ`,
        `eu_champ`.`team_name` AS `eu_champ`,
        `lan_champ`.`team_name` AS `lan_champ`
    FROM `seasons`
    LEFT JOIN (SELECT `player_name`,`players`.`player_id` FROM `players`) AS `goals`
    ON `goals`.`player_id` = `seasons`.`most_goals`
    LEFT JOIN (SELECT `player_name`,`players`.`player_id` FROM `players`) AS `saves`
    ON `saves`.`player_id` = `seasons`.`most_saves`
    LEFT JOIN (SELECT `player_name`,`player_id` FROM `players`) AS `assists`
    ON `assists`.`player_id` = `seasons`.`most_assists`
    LEFT JOIN (SELECT `team_name`,`team_id` FROM `teams`) AS `na_champ`
    ON `na_champ`.`team_id` = `seasons`.`na_champ`
    LEFT JOIN (SELECT `team_name`,`team_id` FROM `teams`) AS `eu_champ`
    ON `eu_champ`.`team_id` = `seasons`.`eu_champ`
    LEFT JOIN (SELECT `team_name`,`team_id` FROM `teams`) AS `lan_champ`
    ON `lan_champ`.`team_id` = `seasons`.`lan_champ`;
    ;';
        $query = $this->db->query($sql);
        $query->execute();

        return $query->fetchAll();
    }


}
