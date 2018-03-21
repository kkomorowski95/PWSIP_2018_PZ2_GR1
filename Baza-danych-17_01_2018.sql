-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: 178.32.219.12
-- Czas wygenerowania: 17 Sty 2018, 22:04
-- Wersja serwera: 5.6.12
-- Wersja PHP: 5.6.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `716915_IgA`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Attack`
--

CREATE TABLE IF NOT EXISTS `Attack` (
  `id` int(16) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `damage` int(4) DEFAULT NULL,
  `element_id` int(4) DEFAULT NULL,
  `Element_req` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `element_id` (`element_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Attack`
--

INSERT INTO `Attack` (`id`, `name`, `description`, `damage`, `element_id`, `Element_req`) VALUES
(1, 'Drapanie', '', 10, 0, 0),
(2, 'Desperacka szarża', '', 10, 0, 0),
(3, 'Ugryzienie', '', 30, 0, 1),
(4, 'Dziobanie', '', 10, 4, 1),
(5, 'Pikowanie', '', 30, 4, 2),
(6, 'Nurkowanie', '', 40, 2, 3),
(7, 'Zionięcie ogniem', '', 40, 1, 4),
(8, 'Konsumpcja', '', 30, 3, 5),
(9, 'Bezmyślne natarcie', '', 10, 0, 0),
(10, 'Cięcie', '', 30, 0, 1),
(12, 'Bohaterska Szarża', '', 40, 0, 6),
(14, 'Jaszczurze Szpony', '', 30, 0, 1),
(15, 'Jaszczurze Ugryzienie', '', 50, 0, 6),
(16, 'Siarkowy Oddech', '', 20, 0, 1),
(0, '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Attack_Ids`
--

CREATE TABLE IF NOT EXISTS `Attack_Ids` (
  `id` int(16) NOT NULL,
  `attack1` int(16) DEFAULT NULL,
  `attack2` int(16) DEFAULT NULL,
  `attack3` int(16) DEFAULT NULL,
  `attack4` int(16) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attack1` (`attack1`),
  KEY `attack2` (`attack2`),
  KEY `attack3` (`attack3`),
  KEY `attack4` (`attack4`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Attack_Ids`
--

INSERT INTO `Attack_Ids` (`id`, `attack1`, `attack2`, `attack3`, `attack4`) VALUES
(1, 1, 2, 0, 0),
(2, 1, 3, 0, 0),
(3, 4, 5, 0, 0),
(4, 1, 6, 0, 0),
(5, 1, 7, 0, 0),
(6, 3, 8, 0, 0),
(7, 9, 10, 0, 0),
(8, 10, 12, 0, 0),
(9, 14, 15, 16, 0),
(0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Card`
--

CREATE TABLE IF NOT EXISTS `Card` (
  `id` int(16) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `element_id` int(4) DEFAULT NULL,
  `attack_ids` int(16) DEFAULT NULL,
  `health` int(4) DEFAULT NULL,
  `type` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `attack_ids` (`attack_ids`),
  FULLTEXT KEY `name` (`name`),
  FULLTEXT KEY `name_2` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Card`
--

INSERT INTO `Card` (`id`, `name`, `description`, `element_id`, `attack_ids`, `health`, `type`) VALUES
(1, 'Gremlin', 'Niewielkie stworzenia zamieszkujące polany i góry północnego Alaru. Bardzo słabe, często padają ofiarą każdego innego stworzenia, jednakże każdego utraconego osobnika mogą bardzo szybko zastąpić swoim olbrzymim przyrostem naturalnym.', 0, 1, 30, 1),
(2, 'Wilk', 'Jedna z wielu dzikich bestii zamieszkujących praktycznie wszystkie krainy. Znane z bezwzględności i odwagi z jaką polują na inne istoty.', 0, 2, 50, 1),
(3, 'Orzeł Górski', 'Ten majestatyczny i dziki ptak wbrew nazwie nie żyje tylko i wyłącznie w górach. Dzięki swojemu rozmiarowi jest w stanie zabić ofiarę samą swoją masą w czasie pikowania.', 4, 3, 40, 1),
(4, 'Kappa', 'Duch opiekun rzek i jezior. Według legend każdy, nawet najmniejszy akwen wodny posiada takiego opiekuna. Zaciekle broni swojego terytorium przed zakusami innych istot.', 2, 4, 60, 1),
(5, 'Chochlik', 'Bliski krewny gremlinów mieszkający w jaskiniach na terenie gór Teara znanych z aktywności wulkanicznej. Podobnie jak gremliny są bardzo słabe lecz bardzo liczne.', 1, 5, 20, 1),
(6, 'Gremlinołówka', ' Znacznie większa siostra muchołówki, wzięła nazwę od głównego posiłku – gremlinów jednakże zdarzają się przypadki zjedzenia zamroczonego alkoholem człowieka.', 3, 6, 50, 1),
(7, 'Żołdak', NULL, 0, 7, 40, 1),
(8, 'Wędrujący rycerz', NULL, 0, 8, 90, 1),
(9, 'Jaszczur jaskiniowy', NULL, 0, 9, 120, 1),
(10, 'Energia ognia', NULL, 1, 0, 1, 2),
(11, 'Energia Wody', NULL, 2, 0, 1, 2),
(12, 'Energia Ziemii', NULL, 3, 0, 1, 2),
(13, 'Energia Powietrza', NULL, 4, 0, 1, 2),
(0, '', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `CardObject`
--

CREATE TABLE IF NOT EXISTS `CardObject` (
  `Table_ID` int(64) NOT NULL,
  `id` int(128) NOT NULL,
  `card_id` int(16) DEFAULT NULL,
  `actual_health` int(4) DEFAULT NULL,
  `actual_max_hp` int(4) DEFAULT NULL,
  `attack_boost` int(4) DEFAULT NULL,
  `energy_count` int(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `energy_count` (`energy_count`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Deck_card`
--

CREATE TABLE IF NOT EXISTS `Deck_card` (
  `Deck_ID` int(128) NOT NULL,
  `Card_ID` int(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Deck_card`
--

INSERT INTO `Deck_card` (`Deck_ID`, `Card_ID`) VALUES
(1, 1),
(1, 1),
(1, 1),
(1, 2),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 7),
(1, 7),
(1, 8),
(1, 8),
(1, 9),
(1, 10),
(1, 10),
(1, 10),
(1, 10),
(1, 10),
(1, 11),
(1, 11),
(1, 11),
(1, 11),
(1, 11),
(1, 12),
(1, 12),
(1, 12),
(1, 12),
(1, 12),
(1, 13),
(1, 13),
(1, 13),
(1, 13),
(1, 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Deck_drawn`
--

CREATE TABLE IF NOT EXISTS `Deck_drawn` (
  `ID` int(64) NOT NULL,
  `CardObject_ID` int(128) NOT NULL,
  `Slot` int(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Deck_drawn`
--

INSERT INTO `Deck_drawn` (`ID`, `CardObject_ID`, `Slot`) VALUES
(0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Element`
--

CREATE TABLE IF NOT EXISTS `Element` (
  `id` int(4) NOT NULL,
  `name` varchar(16) NOT NULL,
  `res_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `res_id` (`res_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Element`
--

INSERT INTO `Element` (`id`, `name`, `res_id`) VALUES
(0, 'Brak elementu', 0),
(1, 'Ogień', 1),
(2, 'Woda', 2),
(3, 'Ziemia', 3),
(4, 'Powietrze', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Element_Count`
--

CREATE TABLE IF NOT EXISTS `Element_Count` (
  `ID` int(128) NOT NULL,
  `El1` int(11) NOT NULL,
  `El2` int(11) NOT NULL,
  `El3` int(11) NOT NULL,
  `El4` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Element_Sum`
--

CREATE TABLE IF NOT EXISTS `Element_Sum` (
  `ID` int(4) NOT NULL,
  `El0` int(11) NOT NULL,
  `El1` int(2) NOT NULL,
  `El2` int(2) NOT NULL,
  `El3` int(2) NOT NULL,
  `El4` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Element_Sum`
--

INSERT INTO `Element_Sum` (`ID`, `El0`, `El1`, `El2`, `El3`, `El4`) VALUES
(0, 0, 0, 0, 0, 0),
(1, 1, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 1),
(3, 0, 0, 1, 0, 0),
(4, 0, 1, 0, 0, 0),
(5, 0, 0, 0, 1, 0),
(6, 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Game_Table`
--

CREATE TABLE IF NOT EXISTS `Game_Table` (
  `ID` int(64) NOT NULL,
  `Player_ID1` varchar(32) NOT NULL,
  `Player_ID2` varchar(32) NOT NULL,
  `Player_hand_ID1` int(64) NOT NULL,
  `Player_hand_ID2` int(64) NOT NULL,
  `Deck_drawn_ID1` int(64) NOT NULL,
  `Deck_drawn_ID2` int(64) NOT NULL,
  `Card_played1` int(128) NOT NULL,
  `Card_played2` int(128) NOT NULL,
  `Player1_Handshake` int(11) NOT NULL,
  `Player2_Handshake` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Game_Table`
--

INSERT INTO `Game_Table` (`ID`, `Player_ID1`, `Player_ID2`, `Player_hand_ID1`, `Player_hand_ID2`, `Deck_drawn_ID1`, `Deck_drawn_ID2`, `Card_played1`, `Card_played2`, `Player1_Handshake`, `Player2_Handshake`, `Status`) VALUES
(0, '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `MM_Quick`
--

CREATE TABLE IF NOT EXISTS `MM_Quick` (
  `Player_name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Pair_Matched`
--

CREATE TABLE IF NOT EXISTS `Pair_Matched` (
  `ID` int(64) NOT NULL,
  `Player_name1` varchar(32) NOT NULL,
  `Player_name2` varchar(32) NOT NULL,
  `respond_time` int(128) NOT NULL,
  `Handshake1` int(1) NOT NULL,
  `Handshake2` int(1) NOT NULL,
  `CreatingStarted` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Pair_Matched`
--

INSERT INTO `Pair_Matched` (`ID`, `Player_name1`, `Player_name2`, `respond_time`, `Handshake1`, `Handshake2`, `CreatingStarted`) VALUES
(1, 'test02', 'test01', 1516222387, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Player`
--

CREATE TABLE IF NOT EXISTS `Player` (
  `name` varchar(32) NOT NULL,
  `password` varchar(2048) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `player_cards` int(32) DEFAULT NULL,
  `deck_list` int(32) DEFAULT NULL,
  `game_count` int(32) DEFAULT NULL,
  `win_count` int(32) DEFAULT NULL,
  `rating` int(16) DEFAULT NULL,
  `gold` int(16) DEFAULT NULL,
  `last_connect` bigint(20) NOT NULL,
  `connect` tinyint(1) NOT NULL,
  `Avatar` int(11) NOT NULL,
  `active_deck` int(128) NOT NULL,
  PRIMARY KEY (`name`),
  KEY `player_cards` (`player_cards`),
  KEY `deck_list` (`deck_list`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Player`
--

INSERT INTO `Player` (`name`, `password`, `player_cards`, `deck_list`, `game_count`, `win_count`, `rating`, `gold`, `last_connect`, `connect`, `Avatar`, `active_deck`) VALUES
('test05', 'test', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
('test04', 'test', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
('test02', 'test', 0, 0, 0, 0, 0, 0, 1516222370, 0, 1, 1),
('test03', 'test', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
('test01', 'test', 0, 0, 0, 0, 0, 0, 1516222365, 0, 1, 1),
('test06', 'test', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
('test07', 'test', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
('test08', 'test', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
('test09', 'test', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
('test10', 'test', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Player_Cards`
--

CREATE TABLE IF NOT EXISTS `Player_Cards` (
  `id` int(32) NOT NULL,
  `cards1` int(4) DEFAULT NULL,
  `cards2` int(4) DEFAULT NULL,
  `cards3` int(4) DEFAULT NULL,
  `cards4` int(4) DEFAULT NULL,
  `cards5` int(4) DEFAULT NULL,
  `cards6` int(4) DEFAULT NULL,
  `cards7` int(4) DEFAULT NULL,
  `cards8` int(4) DEFAULT NULL,
  `cards9` int(4) DEFAULT NULL,
  `cards10` int(4) DEFAULT NULL,
  `cards11` int(4) DEFAULT NULL,
  `cards12` int(4) DEFAULT NULL,
  `cards13` int(4) DEFAULT NULL,
  `cards14` int(4) DEFAULT NULL,
  `cards15` int(4) DEFAULT NULL,
  `cards16` int(4) DEFAULT NULL,
  `cards17` int(4) DEFAULT NULL,
  `cards18` int(4) DEFAULT NULL,
  `cards19` int(4) DEFAULT NULL,
  `cards20` int(4) DEFAULT NULL,
  `cards21` int(4) DEFAULT NULL,
  `cards22` int(4) DEFAULT NULL,
  `cards23` int(4) DEFAULT NULL,
  `cards24` int(4) DEFAULT NULL,
  `cards25` int(4) DEFAULT NULL,
  `cards26` int(4) DEFAULT NULL,
  `cards27` int(4) DEFAULT NULL,
  `cards28` int(4) DEFAULT NULL,
  `cards29` int(4) DEFAULT NULL,
  `cards30` int(4) DEFAULT NULL,
  `cards31` int(4) DEFAULT NULL,
  `cards32` int(4) DEFAULT NULL,
  `cards33` int(4) DEFAULT NULL,
  `cards34` int(4) DEFAULT NULL,
  `cards35` int(4) DEFAULT NULL,
  `cards36` int(4) DEFAULT NULL,
  `cards37` int(4) DEFAULT NULL,
  `cards38` int(4) DEFAULT NULL,
  `cards39` int(4) DEFAULT NULL,
  `cards40` int(4) DEFAULT NULL,
  `cards41` int(4) DEFAULT NULL,
  `cards42` int(4) DEFAULT NULL,
  `cards43` int(4) DEFAULT NULL,
  `cards44` int(4) DEFAULT NULL,
  `cards45` int(4) DEFAULT NULL,
  `cards46` int(4) DEFAULT NULL,
  `cards47` int(4) DEFAULT NULL,
  `cards48` int(4) DEFAULT NULL,
  `cards49` int(4) DEFAULT NULL,
  `cards50` int(4) DEFAULT NULL,
  `cards51` int(4) DEFAULT NULL,
  `cards52` int(4) DEFAULT NULL,
  `cards53` int(4) DEFAULT NULL,
  `cards54` int(4) DEFAULT NULL,
  `cards55` int(4) DEFAULT NULL,
  `cards56` int(4) DEFAULT NULL,
  `cards57` int(4) DEFAULT NULL,
  `cards58` int(4) DEFAULT NULL,
  `cards59` int(4) DEFAULT NULL,
  `cards60` int(4) DEFAULT NULL,
  `cards61` int(4) DEFAULT NULL,
  `cards62` int(4) DEFAULT NULL,
  `cards63` int(4) DEFAULT NULL,
  `cards64` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Player_hand`
--

CREATE TABLE IF NOT EXISTS `Player_hand` (
  `ID` int(64) NOT NULL,
  `CardObject_ID` int(128) NOT NULL,
  `Slot` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Player_hand`
--

INSERT INTO `Player_hand` (`ID`, `CardObject_ID`, `Slot`) VALUES
(0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Resistance`
--

CREATE TABLE IF NOT EXISTS `Resistance` (
  `id` int(4) NOT NULL,
  `res1` int(4) DEFAULT NULL,
  `res2` int(4) DEFAULT NULL,
  `res3` int(4) DEFAULT NULL,
  `res4` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Resistance`
--

INSERT INTO `Resistance` (`id`, `res1`, `res2`, `res3`, `res4`) VALUES
(0, 100, 100, 100, 100),
(1, 50, 125, 100, 75),
(2, 75, 50, 125, 100),
(3, 100, 75, 50, 125),
(4, 125, 100, 75, 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
