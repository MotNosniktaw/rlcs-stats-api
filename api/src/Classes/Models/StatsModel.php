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
        $sql = 'SELECT `players`.`player_id`, `players`.`player_name`,`teams`.`team_id`, `teams`.`team_name` FROM `players`
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

    public function getTeamInfo(int $id)
    {
        $query = $this->db->prepare('SELECT * FROM `teams` WHERE `team_id` =:id;');
        $query->bindParam('id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }

    public function getPlayersByTeam(int $id)
    {
        $query = $this->db->prepare('SELECT `player_id`, `player_name` FROM `players` WHERE `team` =:id;');
        $query->bindParam('id', $id, \PDO::PARAM_INT);
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
        $sql = 'SELECT `seasons`.`id`, `seasons`.`season`,
        `goals_na`.`player_name` AS `top_scorer_na`,
        `goals_na`.`player_id` AS `top_scorer_na_id`,
        `saves_na`.`player_name` AS `golden_goalie_na`,
        `saves_na`.`player_id` AS `golden_goalie_na_id`,
        `assists_na`.`player_name` AS `playmaker_na`,
        `assists_na`.`player_id` AS `playmaker_na_id`,
        `mvp_na`.`player_name` AS `mvp_na`,
        `mvp_na`.`player_id`AS `mvp_na_id`,
        `goals_eu`.`player_name` AS `top_scorer_eu`,
        `goals_eu`.`player_id` AS `top_scorer_eu_id`,
        `saves_eu`.`player_name` AS `golden_goalie_eu`,
        `saves_eu`.`player_id` AS `golden_goalie_eu_id`,
        `assists_eu`.`player_name` AS `playmaker_eu`,
        `assists_eu`.`player_id` AS `playmaker_eu_id`,
        `mvp_eu`.`player_name` AS `mvp_eu`,
        `mvp_eu`.`player_id`AS `mvp_eu_id`,
        `na_champ`.`team_name` AS `na_champ`,
        `na_champ`.`team_id` AS `na_champ_id`,
        `eu_champ`.`team_name` AS `eu_champ`,
        `eu_champ`.`team_id` AS `eu_champ_id`,
        `lan_champ`.`team_name` AS `lan_champ`,
        `lan_champ`.`team_id` AS `lan_champ_id`
    FROM `seasons`
    LEFT JOIN (SELECT `player_name`,`players`.`player_id` FROM `players`) AS `goals_na`
    ON `goals_na`.`player_id` = `seasons`.`most_goals_na`
    LEFT JOIN (SELECT `player_name`,`players`.`player_id` FROM `players`) AS `saves_na`
    ON `saves_na`.`player_id` = `seasons`.`most_saves_na`
    LEFT JOIN (SELECT `player_name`,`player_id` FROM `players`) AS `assists_na`
    ON `assists_na`.`player_id` = `seasons`.`most_assists_na`
    LEFT JOIN (SELECT `player_name`,`player_id` FROM `players`) AS `mvp_na`
    ON `mvp_na`.`player_id` = `seasons`.`mvp_na`
    LEFT JOIN (SELECT `player_name`,`players`.`player_id` FROM `players`) AS `goals_eu`
    ON `goals_eu`.`player_id` = `seasons`.`most_goals_eu`
    LEFT JOIN (SELECT `player_name`,`players`.`player_id` FROM `players`) AS `saves_eu`
    ON `saves_eu`.`player_id` = `seasons`.`most_saves_eu`
    LEFT JOIN (SELECT `player_name`,`player_id` FROM `players`) AS `assists_eu`
    ON `assists_eu`.`player_id` = `seasons`.`most_assists_eu`
    LEFT JOIN (SELECT `player_name`,`player_id` FROM `players`) AS `mvp_eu`
    ON `mvp_eu`.`player_id` = `seasons`.`mvp_eu`
    LEFT JOIN (SELECT `team_name`,`team_id` FROM `teams`) AS `na_champ`
    ON `na_champ`.`team_id` = `seasons`.`na_champ`
    LEFT JOIN (SELECT `team_name`,`team_id` FROM `teams`) AS `eu_champ`
    ON `eu_champ`.`team_id` = `seasons`.`eu_champ`
    LEFT JOIN (SELECT `team_name`,`team_id` FROM `teams`) AS `lan_champ`
    ON `lan_champ`.`team_id` = `seasons`.`lan_champ`
    ;';
        $query = $this->db->query($sql);
        $query->execute();

        return $query->fetchAll();
    }


}
