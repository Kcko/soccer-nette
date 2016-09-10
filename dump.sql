-- --------------------------------------------------------
-- Hostitel:                     127.0.0.1
-- Verze serveru:                5.7.11 - MySQL Community Server (GPL)
-- OS serveru:                   Win64
-- HeidiSQL Verze:               9.3.0.5111
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Exportování struktury pro tabulka soccer.competition
CREATE TABLE IF NOT EXISTS `competition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- Exportování dat pro tabulku soccer.competition: ~2 rows (přibližně)
/*!40000 ALTER TABLE `competition` DISABLE KEYS */;
INSERT INTO `competition` (`id`, `name`) VALUES
	(1, 'Mistrovství světa'),
	(2, 'Gold Tournament');
/*!40000 ALTER TABLE `competition` ENABLE KEYS */;

-- Exportování struktury pro tabulka soccer.competition_season
CREATE TABLE IF NOT EXISTS `competition_season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `competition_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `slug` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `competition_id_season_id` (`competition_id`,`season_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- Exportování dat pro tabulku soccer.competition_season: ~0 rows (přibližně)
/*!40000 ALTER TABLE `competition_season` DISABLE KEYS */;
INSERT INTO `competition_season` (`id`, `competition_id`, `season_id`, `slug`) VALUES
	(1, 1, 1, 'MS2014');
/*!40000 ALTER TABLE `competition_season` ENABLE KEYS */;

-- Exportování struktury pro tabulka soccer.match
CREATE TABLE IF NOT EXISTS `match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `competition_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `team_home_id` int(11) NOT NULL,
  `team_away_id` int(11) NOT NULL,
  `home_result_flag` enum('NA','V','R','P','KV','KP','KK') COLLATE utf8_czech_ci NOT NULL DEFAULT 'NA',
  `away_result_flag` enum('NA','V','R','P','KV','KP','KK') COLLATE utf8_czech_ci NOT NULL DEFAULT 'NA',
  `goal_home_90` tinyint(4) NOT NULL,
  `goal_away_90` tinyint(4) NOT NULL,
  `goal_home_halftime` tinyint(4) NOT NULL,
  `goal_away_halftime` tinyint(4) NOT NULL,
  `goal_home_et` tinyint(4) NOT NULL,
  `goal_away_et` tinyint(4) NOT NULL,
  `goal_home_penalty` tinyint(4) NOT NULL,
  `goal_away_penalty` tinyint(4) NOT NULL,
  `round` tinyint(4) NOT NULL,
  `stage_list_id` int(11) NOT NULL,
  `played` tinyint(4) NOT NULL,
  `contumacy` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `soutezID` (`competition_id`,`season_id`),
  KEY `soutezID_2` (`competition_id`,`season_id`,`round`),
  KEY `domaciID` (`team_home_id`),
  KEY `hosteID` (`team_away_id`),
  KEY `soutezID_3` (`competition_id`,`season_id`),
  KEY `slozeny4` (`competition_id`,`season_id`,`team_home_id`,`team_away_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- Exportování dat pro tabulku soccer.match: ~48 rows (přibližně)
/*!40000 ALTER TABLE `match` DISABLE KEYS */;
INSERT INTO `match` (`id`, `competition_id`, `season_id`, `team_home_id`, `team_away_id`, `home_result_flag`, `away_result_flag`, `goal_home_90`, `goal_away_90`, `goal_home_halftime`, `goal_away_halftime`, `goal_home_et`, `goal_away_et`, `goal_home_penalty`, `goal_away_penalty`, `round`, `stage_list_id`, `played`, `contumacy`) VALUES
	(13, 1, 1, 3, 2, 'NA', 'NA', 3, 4, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
	(14, 1, 1, 4, 1, 'NA', 'NA', 2, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
	(15, 1, 1, 2, 1, 'NA', 'NA', 1, 2, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
	(16, 1, 1, 3, 4, 'NA', 'NA', 3, 1, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
	(17, 1, 1, 4, 2, 'NA', 'NA', 2, 3, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
	(18, 1, 1, 1, 3, 'NA', 'NA', 2, 4, 0, 0, 0, 0, 0, 0, 0, 3, 1, 0),
	(19, 1, 1, 5, 7, 'NA', 'NA', 0, 1, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0),
	(20, 1, 1, 8, 6, 'NA', 'NA', 0, 1, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0),
	(21, 1, 1, 7, 6, 'NA', 'NA', 1, 1, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0),
	(22, 1, 1, 5, 8, 'NA', 'NA', 3, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0),
	(23, 1, 1, 8, 7, 'NA', 'NA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0),
	(24, 1, 1, 6, 5, 'NA', 'NA', 1, 1, 0, 0, 0, 0, 0, 0, 0, 4, 1, 0),
	(25, 1, 1, 11, 9, 'NA', 'NA', 1, 2, 0, 0, 0, 0, 0, 0, 0, 5, 1, 0),
	(26, 1, 1, 10, 12, 'NA', 'NA', 0, 1, 0, 0, 0, 0, 0, 0, 0, 5, 1, 0),
	(27, 1, 1, 9, 12, 'NA', 'NA', 1, 1, 0, 0, 0, 0, 0, 0, 0, 5, 1, 0),
	(28, 1, 1, 11, 10, 'NA', 'NA', 5, 0, 0, 0, 0, 0, 0, 0, 0, 5, 1, 0),
	(29, 1, 1, 10, 9, 'NA', 'NA', 2, 3, 0, 0, 0, 0, 0, 0, 0, 5, 1, 0),
	(30, 1, 1, 12, 11, 'NA', 'NA', 5, 0, 0, 0, 0, 0, 0, 0, 0, 5, 1, 0),
	(31, 1, 1, 13, 14, 'NA', 'NA', 0, 1, 0, 0, 0, 0, 0, 0, 0, 6, 1, 0),
	(32, 1, 1, 16, 15, 'NA', 'NA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 1, 0),
	(33, 1, 1, 14, 15, 'NA', 'NA', 2, 0, 0, 0, 0, 0, 0, 0, 0, 6, 1, 0),
	(34, 1, 1, 13, 16, 'NA', 'NA', 2, 0, 0, 0, 0, 0, 0, 0, 0, 6, 1, 0),
	(35, 1, 1, 16, 14, 'NA', 'NA', 3, 2, 0, 0, 0, 0, 0, 0, 0, 6, 1, 0),
	(36, 1, 1, 15, 13, 'NA', 'NA', 1, 0, 0, 0, 0, 0, 0, 0, 0, 6, 1, 0),
	(37, 1, 1, 19, 18, 'NA', 'NA', 1, 1, 0, 0, 0, 0, 0, 0, 0, 7, 1, 0),
	(38, 1, 1, 20, 17, 'NA', 'NA', 3, 1, 0, 0, 0, 0, 0, 0, 0, 7, 0, 0),
	(39, 1, 1, 18, 17, 'NA', 'NA', 2, 1, 0, 0, 0, 0, 0, 0, 0, 7, 1, 0),
	(40, 1, 1, 19, 20, 'NA', 'NA', 1, 2, 0, 0, 0, 0, 0, 0, 0, 7, 1, 0),
	(41, 1, 1, 20, 18, 'NA', 'NA', 0, 4, 0, 0, 0, 0, 0, 0, 0, 7, 1, 0),
	(42, 1, 1, 17, 19, 'NA', 'NA', 3, 1, 0, 0, 0, 0, 0, 0, 0, 7, 1, 0),
	(43, 1, 1, 22, 21, 'NA', 'NA', 0, 3, 0, 0, 0, 0, 0, 0, 0, 8, 1, 0),
	(44, 1, 1, 23, 24, 'NA', 'NA', 1, 3, 0, 0, 0, 0, 0, 0, 0, 8, 1, 0),
	(45, 1, 1, 21, 24, 'NA', 'NA', 2, 0, 0, 0, 0, 0, 0, 0, 0, 8, 1, 0),
	(46, 1, 1, 22, 23, 'NA', 'NA', 3, 1, 0, 0, 0, 0, 0, 0, 0, 8, 1, 0),
	(47, 1, 1, 23, 21, 'NA', 'NA', 1, 5, 0, 0, 0, 0, 0, 0, 0, 8, 1, 0),
	(48, 1, 1, 24, 22, 'NA', 'NA', 0, 1, 0, 0, 0, 0, 0, 0, 0, 8, 1, 0),
	(49, 1, 1, 27, 25, 'NA', 'NA', 3, 3, 0, 0, 0, 0, 0, 0, 0, 9, 1, 0),
	(50, 1, 1, 26, 28, 'NA', 'NA', 2, 2, 0, 0, 0, 0, 0, 0, 0, 9, 1, 0),
	(51, 1, 1, 25, 28, 'NA', 'NA', 1, 1, 0, 0, 0, 0, 0, 0, 0, 9, 1, 0),
	(52, 1, 1, 27, 26, 'NA', 'NA', 2, 1, 0, 0, 0, 0, 0, 0, 0, 9, 1, 0),
	(53, 1, 1, 26, 25, 'NA', 'NA', 2, 3, 0, 0, 0, 0, 0, 0, 0, 9, 1, 0),
	(54, 1, 1, 28, 27, 'NA', 'NA', 1, 0, 0, 0, 0, 0, 0, 0, 0, 9, 1, 0),
	(55, 1, 1, 31, 29, 'NA', 'NA', 0, 2, 0, 0, 0, 0, 0, 0, 0, 10, 1, 0),
	(56, 1, 1, 32, 30, 'NA', 'NA', 1, 0, 0, 0, 0, 0, 0, 0, 0, 10, 1, 0),
	(57, 1, 1, 29, 30, 'NA', 'NA', 0, 1, 0, 0, 0, 0, 0, 0, 0, 10, 1, 0),
	(58, 1, 1, 31, 32, 'NA', 'NA', 3, 1, 0, 0, 0, 0, 0, 0, 0, 10, 1, 0),
	(59, 1, 1, 32, 29, 'NA', 'NA', 0, 4, 0, 0, 0, 0, 0, 0, 0, 10, 1, 0),
	(60, 1, 1, 30, 31, 'NA', 'NA', 1, 2, 0, 0, 0, 0, 0, 0, 0, 10, 1, 0);
/*!40000 ALTER TABLE `match` ENABLE KEYS */;

-- Exportování struktury pro tabulka soccer.season
CREATE TABLE IF NOT EXISTS `season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- Exportování dat pro tabulku soccer.season: ~0 rows (přibližně)
/*!40000 ALTER TABLE `season` DISABLE KEYS */;
INSERT INTO `season` (`id`, `name`) VALUES
	(1, '2014');
/*!40000 ALTER TABLE `season` ENABLE KEYS */;

-- Exportování struktury pro tabulka soccer.stage
CREATE TABLE IF NOT EXISTS `stage` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_czech_ci NOT NULL,
  `shortcut` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nazev` (`name`),
  KEY `seo` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- Exportování dat pro tabulku soccer.stage: ~144 rows (přibližně)
/*!40000 ALTER TABLE `stage` DISABLE KEYS */;
INSERT INTO `stage` (`id`, `name`, `shortcut`, `slug`) VALUES
	(1, '-celá sezóna-', '-start-', 'cela-sezona'),
	(2, 'play off', 'Pl.', 'play-off'),
	(3, '1. kolo', '1.k', '1-kolo'),
	(4, '2. kolo', '2.k', '2-kolo'),
	(5, '3. kolo', '3.k', '3-kolo'),
	(6, '4. kolo', '4.k', '4-kolo'),
	(7, '5. kolo', '5.k', '5-kolo'),
	(8, '6. kolo', '6.k', '6-kolo'),
	(9, 'osmifinále', 'OF', 'osmifinale'),
	(10, 'čtvrtfinále', 'ČF', 'ctvrtfinale'),
	(11, 'semifinále', 'SF', 'semifinale'),
	(12, 'FINÁLE', 'F', 'finale'),
	(13, '1. zápasy', '1.z', '1-zapasy'),
	(14, 'odvety', '2.z', 'odvety'),
	(15, 'předkola', '', 'predkola'),
	(16, 'předkolo', 'Př.', 'predkolo'),
	(17, '1. předkolo', '1.př', '1-predkolo'),
	(18, '2. předkolo', '2.př', '2-predkolo'),
	(19, '3. předkolo', '3.př', '3-predkolo'),
	(20, 'o 3. místo', '3M', 'o-3-misto'),
	(21, 'skupina A', 'Sk A', 'skupina-a'),
	(22, 'skupina B', 'Sk B', 'skupina-b'),
	(23, 'skupina C', 'Sk C', 'skupina-c'),
	(24, 'skupina D', 'Sk D', 'skupina-d'),
	(25, 'skupina E', 'Sk E', 'skupina-e'),
	(26, 'skupina F', 'Sk F', 'skupina-f'),
	(27, 'skupina G', 'Sk G', 'skupina-g'),
	(28, 'skupina H', 'Sk H', 'skupina-h'),
	(29, 'o titul', 'Tit.', 'o-titul'),
	(30, 'o udržení', 'Udr.', 'o-udrzeni'),
	(31, 'základní skupiny', '', 'zakladni-skupiny'),
	(32, 'Eindronde (o postup)', 'Post.', 'eindronde-o-postup'),
	(33, 'o 5. - 8. místo', '5-8M', 'o-5-8-misto'),
	(34, 'o 5. místo', '5M', 'o-5-misto'),
	(35, 'o 7. místo', '7M', 'o-7-misto'),
	(36, '2. zápasy', '2.z', '2-zapasy'),
	(37, '3. zápasy', '3.z', '3-zapasy'),
	(38, 'zlatý zápas (o titul)', 'ZZ', 'zlaty-zapas-o-titul'),
	(39, 'o Ligu mistrů', 'LM', 'o-ligu-mistru'),
	(40, 'o Pohár UEFA', 'UEFA', 'o-pohar-uefa'),
	(41, 'o Intertoto', 'Int.', 'o-intertoto'),
	(42, 'kvalifikace', 'Kv.', 'kvalifikace'),
	(43, 'závěrečný turnaj', '', 'zaverecny-turnaj'),
	(44, 'baráž', 'Bar.', 'baraz'),
	(45, 'skupina 1', 'Sk 1', 'skupina-1'),
	(46, 'skupina 2', 'Sk 2', 'skupina-2'),
	(47, 'skupina 3', 'Sk 3', 'skupina-3'),
	(48, 'skupina 4', 'Sk 4', 'skupina-4'),
	(49, 'skupina 5', 'Sk 5', 'skupina-5'),
	(50, 'skupina 6', 'Sk 6', 'skupina-6'),
	(51, 'skupina 7', 'Sk 7', 'skupina-7'),
	(52, 'skupina 8', 'Sk 8', 'skupina-8'),
	(53, 'skupina 9', 'Sk 9', 'skupina-9'),
	(54, 'skupina 10', 'Sk 10', 'skupina-10'),
	(55, 'turnaj mužů', 'M', 'turnaj-muzu'),
	(56, 'turnaj žen', 'Ž', 'turnaj-zen'),
	(57, 'zóna UEFA (Evropa)', 'Ev.', 'zona-uefa-evropa'),
	(58, 'zóna CONMEBOL (Jižní Amerika)', 'J.Am.', 'zona-conmebol-jizni-amerika'),
	(59, 'zóna CONCACAF (Severní, Střední Amerika a Karibik)', 'S.Am.', 'zona-concacaf-severni-stredni-amerika-a-karibik'),
	(60, 'zóna CAF (Afrika)', 'Af.', 'zona-caf-afrika'),
	(61, 'zóna AFC (Asie)', 'As.', 'zona-afc-asie'),
	(62, 'zóna OFC (Oceánie)', 'Oc.', 'zona-ofc-oceanie'),
	(63, 'mezikontinentální baráže', 'M.', 'mezikontinentalni-baraze'),
	(64, 'první fáze', '1.f', 'prvni-faze'),
	(65, 'druhá fáze', '2.f', 'druha-faze'),
	(66, 'finálová skupina', 'F Sk', 'finalova-skupina'),
	(67, 'skupina 11', 'Sk 11', 'skupina-11'),
	(68, 'skupina 12', 'Sk 12', 'skupina-12'),
	(69, 'hlavní fáze', 'Hl.f', 'hlavni-faze'),
	(70, 'CONMEBOL / OFC', 'Bar.', 'conmebol-ofc'),
	(71, 'AFC / CONCACAF', 'Bar.', 'afc-concacaf'),
	(72, 'o postup na olympijské hry', 'p. OH', 'o-postup-na-olympijske-hry'),
	(73, '1. kolo (opakované zápasy)', '1.k op.', '1-kolo-opakovane-zapasy'),
	(74, '2. kolo (opakované zápasy)', '2.k op.', '2-kolo-opakovane-zapasy'),
	(75, '3. kolo (opakované zápasy)', '3.k op.', '3-kolo-opakovane-zapasy'),
	(76, '1. zápas', '1.z', '1-zapas'),
	(77, 'odveta', '2.z', 'odveta'),
	(78, '4. kolo (opakované zápasy)', '4.k op.', '4-kolo-opakovane-zapasy'),
	(79, 'skupina 13', 'Sk 13', 'skupina-13'),
	(80, '5. kolo (opakované zápasy)', '5.k op.', '5-kolo-opakovane-zapasy'),
	(81, 'třetí fáze', '3.f', 'treti-faze'),
	(82, 'čtvrtá fáze', '4.f', 'ctvrta-faze'),
	(83, 'CONMEBOL / CONCACAF', 'Bar.', 'conmebol-concacaf'),
	(84, 'AFC / OFC', 'Bar.', 'afc-ofc'),
	(85, '1/16 finále', '16F', '1-16-finale'),
	(86, '1/32 finále', '32F', '1-32-finale'),
	(87, 'čtvrtfinále (opakované zápasy)', 'ČF op.', 'ctvrtfinale-opakovane-zapasy'),
	(88, 'skupinová fáze', 'Sk.', 'skupinova-faze'),
	(89, 'finále (opakovaný zápas)', 'F op.', 'finale-opakovany-zapas'),
	(90, 'opakované', 'op.', 'opakovane'),
	(91, 'předkolo (opakované zápasy)', 'Př. op.', 'predkolo-opakovane-zapasy'),
	(92, 'čtvrtfinálové skupiny', 'ČF', 'ctvrtfinalove-skupiny'),
	(93, 'semifinálové skupiny', 'SF', 'semifinalove-skupiny'),
	(94, 'turnaj útěchy', 'Út.', 'turnaj-utechy'),
	(95, 'o 3. místo (opakovaný zápas)', '3M op.', 'o-3-misto-opakovany-zapas'),
	(96, 'AFC / UEFA', 'Bar.', 'afc-uefa'),
	(97, 'oblast Karibik', '', 'oblast-karibik'),
	(98, 'oblast Střední Amerika', '', 'oblast-stredni-amerika'),
	(99, 'mezikontinentální baráž', 'M.', 'mezikontinentalni-baraz'),
	(100, 'polynéská skupina', 'P. Sk', 'polyneska-skupina'),
	(101, 'melanéská skupina', 'M. Sk', 'melaneska-skupina'),
	(102, 'play off o čtvrtfinále', 'Pl. ČF', 'play-off-o-ctvrtfinale'),
	(103, 'o umístění', 'Um.', 'o-umisteni'),
	(104, 'osmifinálové skupiny', 'OF', 'osmifinalove-skupiny'),
	(105, 'semifinále (opakované zápasy)', 'SF op.', 'semifinale-opakovane-zapasy'),
	(106, 'skupina o umístění', 'Um.', 'skupina-o-umisteni'),
	(107, 'play off o Evropskou ligu', 'Pl. EL', 'play-off-o-evropskou-ligu'),
	(108, '2. zápas', '2.z', '2-zapas'),
	(109, 'play off o titul', 'Pl. Tit.', 'play-off-o-titul'),
	(110, 'o vítěze Segunda División B', 'Vít.', 'o-viteze-segunda-division-b'),
	(111, 'o postup do Segunda División', 'Pos.', 'o-postup-do-segunda-division'),
	(112, '4. předkolo', '4.př', '4-predkolo'),
	(113, 'mistrovská část', '', 'mistrovska-cast'),
	(114, 'nemistrovská část', '', 'nemistrovska-cast'),
	(115, 'Základní část', 'zč.', 'zakladni-cast'),
	(116, '1. liga', '1.L', '1-liga'),
	(117, '2. liga', '2.L', '2-liga'),
	(118, '3. liga', '3.L', '3-liga'),
	(119, 'Ligový pohár', 'LP', 'ligovy-pohar'),
	(120, '4. liga', '4.L', '4-liga'),
	(121, '1. kvartál (říjen-prosinec)', '', '1-kvartal-rijen-prosinec'),
	(122, '2v2 zápasy', '2v2', '2v2-zapasy'),
	(123, '4. zápasy', '4.z.', '4-zapasy'),
	(124, '5. zápasy', '5.z.', '5-zapasy'),
	(125, '4. zápas', '4.z.', '4-zapas'),
	(126, '5. zápas', '5. z.', '5-zapas'),
	(127, '2v2 zápas', '2v2 ', '2v2-zapas'),
	(128, 'Pohár', 'Cup', 'pohar'),
	(129, 'Liga', 'Lig', 'liga'),
	(130, 'Ježíškova skupina', 'Jež.Sk.', 'jeziskova-skupina'),
	(131, 'Santa Clausova skupina', 'SCl.sk.', 'santa-clausova-skupina'),
	(132, 'Východní konf.', 'VK', 'vychodni-konf'),
	(133, 'Západní konf.', 'ZK', 'zapadni-konf'),
	(134, 'Konference', 'KOF', 'konference'),
	(135, 'o 9. místo', '9M', 'o-9-misto'),
	(136, '3. zápas', '3.z', '3-zapas'),
	(137, 'MLS Cup', 'Cup', 'mls-cup'),
	(138, 'Final Four', 'FF', 'final-four'),
	(139, 'Divize', 'Div', 'divize'),
	(140, 'Sever', 'S', 'sever'),
	(141, 'Jih', 'J', 'jih'),
	(142, 'Divize A', 'DivA', 'divize-a'),
	(143, 'Divize B', 'DivB', 'divize-b'),
	(144, 'Preseason', 'PS', 'preseason');
/*!40000 ALTER TABLE `stage` ENABLE KEYS */;

-- Exportování struktury pro tabulka soccer.stage_list
CREATE TABLE IF NOT EXISTS `stage_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `has_matches` tinyint(1) NOT NULL DEFAULT '0',
  `has_table` tinyint(1) NOT NULL DEFAULT '0',
  `table_config` text COLLATE utf8_czech_ci NOT NULL,
  `rank` tinyint(4) NOT NULL,
  `note` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rodicID` (`parent`),
  KEY `soutezID` (`competition_id`),
  KEY `sezonaID` (`season_id`),
  KEY `fazeID` (`stage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- Exportování dat pro tabulku soccer.stage_list: ~16 rows (přibližně)
/*!40000 ALTER TABLE `stage_list` DISABLE KEYS */;
INSERT INTO `stage_list` (`id`, `parent`, `competition_id`, `season_id`, `stage_id`, `has_matches`, `has_table`, `table_config`, `rank`, `note`) VALUES
	(1, 0, 1, 1, 1, 0, 0, '', 1, 'cela seona'),
	(2, 1, 1, 1, 31, 0, 0, '', 1, 'zakladni tabulky'),
	(3, 2, 1, 1, 21, 1, 1, '', 1, 'skupina A'),
	(4, 2, 1, 1, 22, 1, 1, '', 2, 'skupina B'),
	(5, 2, 1, 1, 23, 1, 1, '', 3, 'skupina C'),
	(6, 2, 1, 1, 24, 1, 1, '', 4, 'skupina D'),
	(7, 2, 1, 1, 25, 1, 1, '', 5, 'skupina E'),
	(8, 2, 1, 1, 26, 1, 1, '', 6, 'skupina F'),
	(9, 2, 1, 1, 27, 1, 1, '', 7, 'skupina G'),
	(10, 2, 1, 1, 28, 1, 1, '', 8, 'skupina H'),
	(13, 1, 1, 1, 2, 0, 0, '', 2, 'playoff'),
	(14, 13, 1, 1, 9, 1, 0, '', 1, 'osmifinale'),
	(15, 13, 1, 1, 10, 1, 0, '', 2, 'čtvrtfinále'),
	(16, 13, 1, 1, 11, 1, 0, '', 3, 'semifinale'),
	(17, 13, 1, 1, 20, 1, 0, '', 4, 'o 3 misto'),
	(18, 13, 1, 1, 12, 1, 0, '', 5, 'finále');
/*!40000 ALTER TABLE `stage_list` ENABLE KEYS */;

-- Exportování struktury pro tabulka soccer.team
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `logo` varchar(50) COLLATE utf8_czech_ci DEFAULT NULL,
  `strenght` varchar(50) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- Exportování dat pro tabulku soccer.team: ~33 rows (přibližně)
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` (`id`, `name`, `logo`, `strenght`) VALUES
	(1, 'Brazílie', 'Brazil.png', '3/3/3'),
	(2, 'Mexiko', 'Mexico.png', '2/1/2'),
	(3, 'Chorvatsko', 'Croatia.png', '2/1/2'),
	(4, 'Kamerun', 'Cameroon.png', '2/2/2'),
	(5, 'Nizozemsko', 'Netherlands.png', '2/3/3'),
	(6, 'Chile', 'Chile.png', '2/2/3'),
	(7, 'Španělsko', 'Spain.png', '2/3/2'),
	(8, 'Austrálie', 'Australia.png', '2/1/2'),
	(9, 'Kolumbie', 'Colombia.png', '2/2/3'),
	(10, 'Řecko', 'Greece.png', '1/2/2'),
	(11, 'Pobřeží slonoviny', 'Cote d\'Ivoire.png', '2/2/2'),
	(12, 'Japonsko', 'japan.png', '1/2/1'),
	(13, 'Uruguay', 'Uruguay.png', '2/2/2'),
	(14, 'Kostarika', 'Costa Rica.png', '1/2/2'),
	(15, 'Anglie', 'England.png', '2/2/2'),
	(16, 'Itálie', 'Italy.png', '2/2/2'),
	(17, 'Švýcarsko', 'Switzerland.png', '2/2/2'),
	(18, 'Ekvádor', 'Equador.png', '2/2/2'),
	(19, 'Francie', 'France.png', '2/2/2'),
	(20, 'Honduras', 'Honduras.png', '2/1/1'),
	(21, 'Argentina', 'Argentina.png', '3/2/3'),
	(22, 'Česká republika', 'Czech Republic.png', '2/2/1'),
	(23, 'Írán', 'Iran.png', '1/1/1'),
	(24, 'Nigérie', 'Nigeria.png', '2/1/2'),
	(25, 'Německo', 'Germany.png', '2/3/3'),
	(26, 'Portugalsko', 'Portugal.png', '3/2/2'),
	(27, 'Ghana', 'Ghana.png', '2/2/2'),
	(28, 'USA', 'United States of America(USA).png', '2/2/2'),
	(29, 'Belgie', 'Belgium.png', '2/2/1'),
	(30, 'Alžírsko', 'Algeria.png', '0/1/1'),
	(31, 'Rusko', 'Russian Federation.png', '2/2/2'),
	(32, 'Korejská republika', 'North Korea.png', '1/1/1'),
	(34, 'Slovensko', 'Slovakia.png', NULL);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
