-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 02:19 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter_mk`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hashed_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `hashed_password`) VALUES
(1, 'Marek', '\'sss\', ', 'marecki@marecki.pl'),
(2, 'marecki@marecki.pl', 'Marek', '$2y$11$1LC2q9V3vJeWADBxOz99iOIOq26Dh0uJt8gqF5TrVaig3WYxrTHom'),
(3, 'marecki2@marecki.pl', 'Marek2', '$2y$11$WZ4Gt82InO0UYwKYUt825eOzZRqUhZ04tSYY1G2gaNzzJ4RHsQC1m'),
(5, 'marecki3@marecki.pl', 'Marek3', '$2y$11$hVKQgMDRkRnkp7UAoZTJJ.XD00UDzMtY.MAcqLCmos/u8SNPgCeh2'),
(8, 'marecki4@marecki.pl', 'Marek4', '$2y$11$SAXA53C9ka6lzcAIxYLDpejnaNAzzt8aLBJXtqBI5RYAJctpXu4oC'),
(12, 'marecki5@marecki.pl', 'Marek5', '$2y$11$xEd8lyrzQzUa1UYld2KQQuL8jdqXsBgtoVbf24yOuBlNXWNW1F1HG'),
(14, 'marecki6@marecki.pl', 'Marek6', '$2y$11$Qs3WW5v0p1Go1zf6kJ5BL.2sCZyefIiObmi0NZUcb4Q0hJJlg0u66'),
(23, 'marecki7@marecki.pl', 'Marek7', '$2y$11$gYuWdB90h9S59Gqcm2xameIi4.TYAlJ6YHYLsiJ.rfJmIAOpkr58.'),
(29, 'marecki8@marecki.pl', 'Marek8', '$2y$11$jal3ZUmO5qOS7gW1u9fjAePdyzPKT29pjcwMM90S0bn31xjU6JOmO'),
(36, 'marecki9@marecki.pl', 'Marek9', '$2y$11$dlfvLZ6cgzvxXNVj9N.uJOTD74/QIpBWRMh0jLeR/wCwHyfesmY7y'),
(37, 'marecki10@marecki.pl', 'Marek10', '$2y$11$bohKfKtjgZc8vKNu2kDh4OnzImuTMPTQpJT2nniW86fsSEqL6HtGK'),
(38, 'marecki11@marecki.pl', 'Marek11', '$2y$11$YNy7hsJCqOYyjVpRb1tsqOlO.FN1XBzyHPAZsS6N6QwOqEC6RojXe'),
(40, 'marecki12@marecki.pl', 'Marek12', '$2y$11$/mfXBrRkz8W15ThjdVUlfOFHSIe4.Vwe09zkk3AjM8n6AxuhqV6sS'),
(41, 'marecki13&lt;p&gt;@marecki.pl', '&lt;html&gt;Marek13', '$2y$11$TDMRJRcuuUmGpqUobZ3cVeIOErlLn.V/TQkwuYG8zCVhI9B3xJjrW'),
(42, 'marecki14&lt;p&gt;@marecki.pl', '&lt;html&gt;Marek14', '$2y$11$7gLmy36E4fgkrmdAxpx7huV9FiBlunHHyiV0Y2F7Oh39LbcJnRWbi'),
(43, 'marecki15&lt;p&gt;@marecki.pl', '&amp;lt;html&amp;gt;Marek15', '$2y$11$8My/kiV2RlHI0S6oIVCzVuDz972myxZ.rIx3ibMs9G7jPbW35WV1G'),
(44, 'marecki16&lt;p&gt;@marecki.pl', '&amp;lt;html&amp;gt;Marek16', '$2y$11$Rpi2J/1YcMV9lXFonZD/SeVe.W8e.m1.aqs7PLnDn0A8/qdPx027O'),
(45, 'marecki17&lt;p&gt;@marecki.pl', '', '$2y$11$kebBtq2xZ531UzGWvzh3nurM2dWMtAINqCmqQJfKBWBaNgl9ab4iW'),
(48, '', '&amp;lt;html&amp;gt;Marek17', '$2y$11$nw9cJ6Zgtjq2wTQl6TJ3tOLmeEaZuIBgE/Zc5NDu2TAXKHPCXleOe'),
(49, 'marecki17&amp;lt;p&amp;gt;@marecki.pl', '&amp;lt;html&amp;gt;Marek17', '$2y$11$J8k2Z.79dWPVoA48RcxKY.KMFHflYAf583Ob6j8sAEXkfB4qUam7e'),
(51, 'marecki17@marecki.pl', 'Marek_new_17', '$2y$11$QHJsgRYSGIUX/nKEfU/WBeRtkx3hPD7HQaT9vuPktrJNPpN0RGRFa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
