# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.20.20 (MySQL 5.6.44)
# Database: rl-stats
# Generation Time: 2019-09-28 19:20:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table players
# ------------------------------------------------------------

DROP TABLE IF EXISTS `players`;

CREATE TABLE `players` (
  `player_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `player_name` varchar(255) NOT NULL DEFAULT '',
  `team` int(11) unsigned NOT NULL DEFAULT '1',
  `shots` int(11) NOT NULL DEFAULT '0',
  `assists` int(11) NOT NULL DEFAULT '0',
  `goals` int(11) NOT NULL DEFAULT '0',
  `saves` int(11) NOT NULL DEFAULT '0',
  `sub` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`player_id`),
  KEY `team` (`team`),
  CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team`) REFERENCES `teams` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table seasons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seasons`;

CREATE TABLE `seasons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `season` int(11) unsigned NOT NULL,
  `most_goals` int(11) unsigned NOT NULL,
  `most_saves` int(11) unsigned NOT NULL,
  `most_assists` int(11) unsigned NOT NULL,
  `lan_champ` int(11) unsigned NOT NULL,
  `na_champ` int(11) unsigned NOT NULL,
  `eu_champ` int(11) unsigned NOT NULL,
  `lan_location` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `season` (`season`),
  KEY `most_goals` (`most_goals`),
  KEY `most_saves` (`most_saves`),
  KEY `most_assists` (`most_assists`),
  KEY `lan_champ` (`lan_champ`),
  KEY `na_champ` (`na_champ`),
  KEY `eu_champ` (`eu_champ`),
  CONSTRAINT `seasons_ibfk_1` FOREIGN KEY (`most_goals`) REFERENCES `players` (`player_id`),
  CONSTRAINT `seasons_ibfk_2` FOREIGN KEY (`most_saves`) REFERENCES `players` (`player_id`),
  CONSTRAINT `seasons_ibfk_3` FOREIGN KEY (`most_assists`) REFERENCES `players` (`player_id`),
  CONSTRAINT `seasons_ibfk_4` FOREIGN KEY (`lan_champ`) REFERENCES `teams` (`team_id`),
  CONSTRAINT `seasons_ibfk_5` FOREIGN KEY (`na_champ`) REFERENCES `teams` (`team_id`),
  CONSTRAINT `seasons_ibfk_6` FOREIGN KEY (`eu_champ`) REFERENCES `teams` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `team_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) NOT NULL DEFAULT '',
  `region` enum('NA','EU','OCE','SA') NOT NULL DEFAULT 'NA',
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
