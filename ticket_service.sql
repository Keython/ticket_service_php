-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 04:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `price`, `date`) VALUES
(1, '\"Caurums žogā\" izdevuma 2.zīna \"Paģiras\" atklāšana.', 'Sākums - 19:00.\r\n19:30 - grupa \"ExPosei\"\r\n20:30 - grupa \"KALOPSIA\"\r\n21:30 - grupa \"Skala Bunte\".\r\n\r\nNorises vieta: bārs \"Objekts\" Sporta iela 2-k3.', 5.00, '2025-01-05 00:00:00'),
(2, '\"Zilonis\" festivāls.', 'Ikkgadējais vasaras festivāls Rendā, TEV TUR JĀBŪT! \r\nApstirpinātās grupas:\r\nInokentijs Mārpls,\r\nOranžās brīvdienas,\r\nGrēcīgie partizāni,\r\nTrencheard. \r\n\r\nTālākā informācija sekos drīzumā!', 25.00, '2025-08-08 13:00:00'),
(3, '\"BATRA\", \"KASTETE\" un \"DISRESPEKTS\" Atmodā.', 'Piektdiena, 13. nav iedomājama bez nešķīstas žļergas hardkōra!\r\nĶecerīgajā vakara gaitā pozitīvismu samaitās un Sauli aizsegs:\r\nKASTETE - punk hardcore\r\nBATRA - bumcore powerviolence\r\nDISRESPEKTS - caveman crust punk\r\nBūs smagi, lai nākamajā rītā būtu vēl smagāk!', 10.00, '2024-12-30 20:00:00'),
(4, 'Mūzikas vakars ar Sniedzi Prauliņu.', 'Aicinām 11. decembrī plkst. 19.00 piedzīvot radošās un brīnišķīgās balss īpašnieces Sniedzes Prauliņas solo koncertu Aristida Briāna ielā.\r\nMūziķe, komponiste un dziedātāja Sniedze Prauliņa izceļas ar pārlaicīgo balsi un aizraujošajām melodijām, ievekot klausītājus savā skaņu kosmosā un stāstos. \r\n', 2.50, '2025-01-09 19:00:00'),
(5, '\"Krāsa\" atgriežas Aleponijā!', 'Sens ticējums vēsta, ka skaļi sākts gads bārā Aleponija, ir labs gads. Krāsa aicina nopurināt Janvāra sniegu no mēteļiem, pacelt glāzes un samierināties. Varbūt pasmaidīt? Varbūt padejot? Varbūt visu reizē.\r\nBiļešu skaits ierobežots!', 8.00, '2025-01-11 21:00:35'),
(6, 'Solīds Pasākums ar \"Čipsis un Dullais\" un viesiem.', 'Kā jau katru gadu pirms Ziemassvētkiem svinēsim kopā ar\r\nČipsis un Dullais  20:00\r\nGRĒCĪGIE PARTIZĀNI 21:00\r\n+ swing, jazz, old time pop ballīte\r\nKlubā \"Depo\".\r\nIerašanās Vakartērpos!', 8.00, '2024-12-23 20:00:00'),
(7, '\"20 minūtes slavas\".', 'Piedāvājam iespēju jaunajām grupām tikt sadzidētām uz skatuves! Ja vēlies piedalīties, sūti ziņu uz depo@klubsdepo.lv vai DEPO FB lapai\r\nNorises vieta: klubs \"DEPO\".\r\n16+ (-18 drīkst uzturēties klubā līdz 23.00)', 3.00, '2025-01-08 19:00:00'),
(8, 'Ārprāta improvizācijas izrāde.', 'Šī būs izrāde, kuru iespējams noskatīties tikai vienu reizi - tā ir improvizācija!  Pievienojies mums, lai kopā piedzīvotu jautrus mirkļus un stāstus. Smieklīgi joki un amizantas situācijas notiks ainās ar Taviem ieteikumiem, tas padarīs šo vakaru perfektu! \r\nAdrese: Willa teātris Stabu ielā 18c', 7.00, '2024-12-28 20:00:00'),
(9, '\"Sprechen zie Deutsch?\"', 'Grupa - spēlējam visu, bet pārsvarā smago metālu. Grupā 4 no 5 dalībniekiem ir autiskā spektra traucējumi. Tas jāņem vērā, lai nerodas lieki pārpratumi. Šobrīd režisore Lāsma Bērtule ar studiju \"Melnā mute\" par grupu veido dokumentālo filmu.\r\nErnesta Birznieka-Upīša iela, 22, Riga, Latvia-LV-1050.', 1.00, '2025-01-08 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `event_id`, `purchase_date`) VALUES
(4, 1, 2, '2024-12-12 10:22:28'),
(5, 1, 6, '2024-12-30 19:52:42'),
(6, 1, 3, '2024-12-30 20:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'tosteris1', '$2y$10$XMxuu6gDV4art5wq/RJ5HOqco8eDq08IHUE.GFYEPi6RFOKEud/VS', 'tost@eris.com', 'user'),
(2, 'sisadmins4', '$2y$10$TVefUJ1JxFi0bQ0Bzz.Sm.cJASHCXh5.6iTYiuG1TSSiMBQjb7HY.', 'sis@admins.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
