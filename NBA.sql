
--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int NOT NULL,
  `home_team_id` int NOT NULL,
  `away_team_id` int NOT NULL,
  `score_home` int NOT NULL,
  `score_away` int NOT NULL,
  `date` date NOT NULL COMMENT 'Date of the game'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `home_team_id`, `away_team_id`, `score_home`, `score_away`, `date`) VALUES
(1, 1, 2, 10, 20, '2020-06-09'),
(2, 1, 2, 50, 30, '2020-06-18'),
(3, 2, 1, 50, 80, '2020-06-12'),
(4, 2, 1, 70, 60, '2020-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `game_leaders`
--

CREATE TABLE `game_leaders` (
  `id` int NOT NULL,
  `game_id` int NOT NULL,
  `team_id` int NOT NULL,
  `player_id` int NOT NULL COMMENT 'This player is top scorer',
  `score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `game_leaders`
--

INSERT INTO `game_leaders` (`id`, `game_id`, `team_id`, `player_id`, `score`) VALUES
(1, 1, 1, 1, 20),
(2, 2, 1, 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int NOT NULL,
  `first_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `team_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `first_name`, `last_name`, `team_id`) VALUES
(1, 'Taylor', 'smith', 1),
(2, 'John', 'doe', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int NOT NULL,
  `team_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`) VALUES
(1, 'abc'),
(2, 'xyz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_team_id` (`home_team_id`,`away_team_id`,`date`);

--
-- Indexes for table `game_leaders`
--
ALTER TABLE `game_leaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_name` (`team_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game_leaders`
--
ALTER TABLE `game_leaders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;



---------
------ QUERYS-------

---SELECT T.team_name,G.score_home,G.score_away FROM games G , teams T WHERE T.team_name = 'abc' AND G.date = '2020-06-12'
---SELECT * from players P , games G WHERE P.team_id = G.home_team_id OR P.team_id = G.away_team_id AND P.first_name = 'john'

----------