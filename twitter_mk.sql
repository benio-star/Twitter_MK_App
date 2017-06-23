-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2017 at 06:45 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

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
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `tweet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tweet` varchar(140) DEFAULT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
(48, 'marecki18&amp;lt;p&amp;gt;@marecki.pl', 'Marek18_updated', '$2y$11$nw9cJ6Zgtjq2wTQl6TJ3tOLmeEaZuIBgE/Zc5NDu2TAXKHPCXleOe'),
(51, 'marecki17@marecki.pl', 'Marek_new_17', '$2y$11$QHJsgRYSGIUX/nKEfU/WBeRtkx3hPD7HQaT9vuPktrJNPpN0RGRFa'),
(59, 'marecki25@marecki.pl', 'Marek25', '$2y$11$ruK2BP8ETVHsySUy24OKB.Q7xzt/pmFjJI2dF38994jAiyGgj6/CO'),
(60, 'marecki24@marecki.pl', 'Marek24', '$2y$11$mdoavxT97Lm2vQjzm2ofz.5wEfO9Z./zfMxP4kqRt.tleJXMyvlLG'),
(62, 'marecki26@marecki.pl', 'Marek26', '$2y$11$HPl5fl6t4L2i8uTrogd3DuXLA7iKdd4gFoGbk1jNC6CN1OlHXNlOi'),
(63, 'marecki26@mar&amp;lt;p&amp;gt;ecki.pl', 'Marek27&lt;html&gt;', '$2y$11$Yk4buysQBL/qHibVEwAh5O7n1Ao4wDvm12ZzmuPlnzUwqRy5UVfIC'),
(64, 'marecki28@mar&amp;lt;p&amp;gt;ecki.pl', 'Marek28<html>', '$2y$11$TD.iSVViJtzAXwvyecCZyed2TaZMdB498H1atsG8EeZgOYZdDLp5O'),
(66, 'marecki29@mareck&amp;lt;p&amp;gt;i.pl', 'Marek29&amp;lt;html&amp;gt;', '$2y$11$W/.PaxKj7YI5zQBntM6rc.fUZwnxfogtVMIkwTsqTyVlT1JgamOu6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`tweet_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `tweet_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
