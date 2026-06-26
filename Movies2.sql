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
-- Table structure for table `Movies2`
--

CREATE TABLE `Movies2` (
  `ID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Stock` int(11) NOT NULL,
  `Age_rating` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Movies2`
--

INSERT INTO `Movies2` (`ID`, `Title`, `Stock`, `Age_rating`, `Description`, `Image`) VALUES
(4, 'Chainsaw Man - The Movie: Reze Arc', 16649, 15, 'Denji’s life as the Chainsaw Man is full of blood, chaos, and unexpected alliances, but nothing prepares him for the Reze Arc. Facing enemies more dangerous than ever, Denji must confront the darker sides of his own humanity. As friendships are tested and betrayals loom, every decision could be his last. Fans of the anime will be drawn into a high-octane mix of horror, action, and emotion that pushes the boundaries of his world.', 'csm.jpg'),
(5, 'Zootropolis 2', 2818, 8, 'The vibrant city of Zootropolis is full of secrets, and when a mysterious threat emerges, Judy Hopps and Nick Wilde are called back into action. Their investigation uncovers hidden plots, unexpected allies, and challenges that put their trust—and courage—to the test. With humor, heart, and thrilling adventures around every corner, this sequel brings the city to life like never before. The stakes are higher, the mysteries deeper, and the chase more exciting than ever.', 'zootropolis2.jpg'),
(6, 'Five Nights at Freddy', 973, 15, 'Step into the terrifying world of Freddy Fazbear’s Pizza, where the animatronics are alive… and hunting. As night falls, a lone security guard must survive against relentless, horrifying machines with sinister secrets. Every creak, shadow, and flicker of light could be the difference between life and death. This adaptation brings the fear of the game to the big screen with relentless suspense, jump scares, and a haunting atmosphere. Are you brave enough to face the night?', 'fnaf2.jpg'),
(7, 'The Running Man', 22, 15, 'In a dystopian future where entertainment comes at the cost of human life, a man is forced into a deadly game show, hunted for sport by an obsessed audience. Armed only with his wits and courage, he must survive the brutal challenges while uncovering the dark truths behind the spectacle. Action-packed and intense, this story explores survival, resistance, and the fight against oppression. Every chase, trap, and confrontation ramps up the tension, keeping audiences on the edge of their seats.', 'trm.jpg'),
(8, 'Jujutsu Kaisen: Execution - Shibuya Incident x The Culling Game Begins', 55555, 15, 'After the devastating events of the Shibuya Incident, the world of sorcerers faces a new, deadly threat. The Culling Game begins, testing the limits of courage, strategy, and raw power as young sorcerers confront curses stronger than ever before. Alliances are tested, secrets are revealed, and battles escalate to unimaginable heights. This chapter is darker, more intense, and more emotionally charged, promising fans epic fight sequences and gripping drama.', 'jjk.jpg'),
(9, 'Nurembergg', 85, 15, 'Step inside the historic Nuremberg Trials, where prosecutors faced the architects of one of history’s darkest regimes. This gripping drama explores the tension, moral dilemmas, and courage of those who pursued justice against overwhelming odds. With every courtroom revelation, the film probes questions of guilt, responsibility, and humanity. A story of reckoning and resilience, it brings history to life with riveting performances and powerful storytelling.', 'nuremberg.jpg'),
(10, 'The Thing With Feathers\r\n', 132, 15, 'A mysterious creature appears, changing the lives of those it encounters in unexpected ways. This moving tale explores themes of hope, resilience, and the transformative power of connection. Characters are challenged to confront their fears, embrace change, and discover that even the smallest beings can have the biggest impact. Heartfelt and visually striking, the film weaves wonder with deep emotional resonance.', 'the_thing_with_feathers.jpeg'),
(11, 'Pillion', 34, 18, 'Two strangers meet by chance and embark on a journey that will alter their lives forever. As they navigate personal struggles and hidden pasts, they discover the healing power of companionship and understanding. With moments of tenderness, tension, and self-discovery, Pillion explores how human connections can spark courage and transformation. A moving story about love, destiny, and the roads we take to find ourselves.', 'pillion.jpg'),
(12, 'Now You See Me: Now You Don’t\r\n', 331, 12, 'The Four Horsemen return with even more audacious heists, mind-bending illusions, and a web of intrigue that keeps authorities—and audiences—guessing. Each trick is bigger, bolder, and more daring than the last, blurring the line between reality and deception. As secrets unravel and stakes rise, the team must outwit both enemies and each other. Full of twists, spectacle, and thrilling suspense, the film is a masterclass in entertainment and illusion.', 'nwysm_nwydnt.jpg'),
(13, 'A Paw Patrol Christmas', 1585, 0, 'Join the Paw Patrol on a magical holiday adventure as Adventure Bay prepares for Christmas. When unexpected challenges arise, the pups must work together, using courage, cleverness, and heart to save the day. Filled with laughter, festive cheer, and lessons about friendship and giving, this family-friendly special captures the true spirit of the season. A perfect treat for young audiences and fans of the beloved series.', 'paw_patrol.jpg'),
(14, 'Desperate Journey\r\n', 50, 15, 'Thrown into a perilous journey full of danger, betrayal, and high stakes, one hero must navigate a treacherous world to save those he loves. With every twist, obstacle, and confrontation, the tension rises as time runs out. Desperate Journey combines heart-pounding action with emotional depth, showing the lengths one will go for courage, loyalty, and hope. A thrilling ride that keeps audiences gripped from start to finish.', 'desperate_journey.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Movies2`
--
ALTER TABLE `Movies2`
  ADD UNIQUE KEY `Title` (`Title`) USING HASH,
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Movies2`
--
ALTER TABLE `Movies2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
