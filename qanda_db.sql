-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 08:01 PM
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
(1, 'arshdeepdgreat', 'arshdeepdgreat@gmail.com', '3b900faaf1e564240995ba3e0fa578cb', 'Arshdeep Singh Bhatia', '2002-02-11', 'templates\\images\\arshdeep.png'),
(5, 'whhtwa', 'arshdeepdgreat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Arshdeep', '2002-02-11', 'sample'),
(6, 'gogurleen', 'gurleendgreat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Gurleen Kaur', '2001-10-03', 'sample'),
(7, 'arpit', 'arshdeepdgreat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Arpit', '2002-02-11', 'templates/images/arshdeep dp.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_users`
--
ALTER TABLE `all_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
