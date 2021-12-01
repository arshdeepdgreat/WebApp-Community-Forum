-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 06:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qanda_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_users`
--

CREATE TABLE `all_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `dp_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`user_id`, `username`, `email_id`, `password`, `name`, `DOB`, `dp_image`) VALUES
(1, 'arshdeepdgreat', 'arshdeepdgreat@gmail.com', '3b900faaf1e564240995ba3e0fa578cb', 'Arshdeep Singh', '2002-02-11', 'templates\\images\\arshdeep.png');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `posted_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `author` varchar(50) NOT NULL,
  `answer` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `q_id`, `posted_timestamp`, `author`, `answer`, `user_id`) VALUES
(15, 1, '2021-11-05 15:21:43', 'Arshdeep Singh', 'The eight planets are Mercury, Venus, Earth, Mars, Jupiter, Saturn, Uranus, and Neptune. Mercury is closest to the Sun. Neptune is the farthest. Planets, asteroids, and comets also orbit our Sun', 1),
(16, 3, '2021-11-05 16:20:13', 'Anonymous', 'Union Territories of India<br>\r\nAndaman and Nicobar Islands.<br>\r\nDadra and Nagar Haveli and Daman and Diu.<br>\r\nChandigarh.<br>\r\nLakshadweep.<br>\r\nPuducherry.<br>\r\nDelhi.<br>\r\nLadakh.<br>\r\nJammu and Kashmir.<br>', 1),
(17, 4, '2021-12-01 16:36:42', 'Anonymous', 'Britain has four national dishes: Chicken Tikka Masala in England; Haggis in Scotland; Welsh Cawl in Wales; and Irish Stew in Ireland. But there’s also many other traditional meals from the UK that get mentioned among the topic of Britain’s national dish, such as the Full Breakfast, Shepherd’s Pie and Sunday Roast. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'General Knowledge', 'General questions which are commonly known to all'),
(2, 'Local cuisines', 'Some questions about the local cuisines'),
(3, 'Local Language', 'Some questions about language'),
(4, 'Tourist Places', 'Some questions about the good places to visit');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `Question` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `posted_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `cat_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `Question`, `author`, `posted_timestamp`, `cat_id`, `status`, `user_id`) VALUES
(1, 'What are the 8 planets of the solar system?', 'Anonymous', '2021-11-05 07:22:55', 1, 15, 1),
(2, 'What is the capital of India?', 'Anonymous', '2021-11-05 16:15:21', 1, NULL, 1),
(3, 'What are the union territories of India?', 'Arshdeep Singh', '2021-11-05 16:19:09', 1, 16, 1),
(4, 'What is the national food of Britain?', 'Anonymous', '2021-12-01 16:32:56', 2, 17, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_users`
--
ALTER TABLE `all_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
