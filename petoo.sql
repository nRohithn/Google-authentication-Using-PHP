-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 02:30 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `google`
--

-- --------------------------------------------------------

--
-- Table structure for table `petoo`
--

CREATE TABLE `petoo` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `petoo`
--

INSERT INTO `petoo` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `email`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(1, 'google', '117930729421731955075', 'Rohith', 'rohithn11@gmail.com', 'en', 'https://lh3.googleusercontent.com/a-/AOh14Gj07TR3v-1SzuUqtab1NuUaAS81noYHPMC0cOxtWA=s96-c', '', '2020-12-20 06:09:15', '2020-12-21 02:25:13'),
(2, 'google', '112429891256913119774', 'Rohith', 'nrohithn@gmail.com', 'en-GB', 'https://lh3.googleusercontent.com/a-/AOh14GgS5BIiLb0skvx3u7u5BgkdfbUe9_1JGz5ZYocCiA=s96-c', '', '2020-12-21 02:28:03', '2020-12-21 02:28:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petoo`
--
ALTER TABLE `petoo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petoo`
--
ALTER TABLE `petoo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
