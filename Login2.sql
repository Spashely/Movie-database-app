-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2026 at 01:23 AM
-- Server version: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HNCWEBMR18`
--

-- --------------------------------------------------------

--
-- Table structure for table `Login2`
--

CREATE TABLE `Login2` (
  `Name` text NOT NULL,
  `Password` text NOT NULL,
  `Email` varchar(25) NOT NULL,
  `DoB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Login2`
--

INSERT INTO `Login2` (`Name`, `Password`, `Email`, `DoB`) VALUES
('123123213', 'aaaa123', '123123123123@gmail.com', '2033-02-10'),
('usernewtest', '1111', 'try@email.com', '2005-09-15'),
('ialol', '123', '333', '2001-02-22'),
('ttttt', 'tttt', 'tttttt', '1999-11-11'),
('Nathan', 'changeme23052007', 'nathanwhite208@gamil.com', '2025-12-12'),
('newuser', 'result', 'new@email.com', '1998-06-12'),
('2222', '22222', '22222', '1995-05-10'),
('child', 'child', 'child', '2015-10-10'),
('testir', 'testirR', 'testir', '2011-01-07'),
('childd', 'child', 'child@gmail.com', '2013-10-10'),
('adulttt', 'adult', 'adult@email.com', '2001-02-18'),
('childUser', 'childUser', 'childUser@childUser.co.uk', '2025-12-16'),
('Sandra', 'blink28', 'Sandra@email.com', '1995-10-11'),
('guy', 'raz', 'guy@email.co.uk', '2030-03-31'),
('microtan', 'juice', 'mighty@email.com', '1995-10-11'),
('new', 'result', 'new@email.com', '1999-10-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Login2`
--
ALTER TABLE `Login2`
  ADD UNIQUE KEY `Name` (`Name`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
