-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 01:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techblog3`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_article`
--

CREATE TABLE `new_article` (
  `article_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_article`
--

INSERT INTO `new_article` (`article_id`, `title`, `author`, `category`, `photo`, `content`) VALUES
(1, 'Cloud Computing for Everyone!', 'Marife Diane B. Bañares', 'Cloud Computing', 'cloud.jpg', 'The delivery of various services over the Internet is known as cloud computing. These resources include data storage, servers, databases, networking, and software, among other tools and applications. Cloud-based storage allows you to save files to a remote database rather than maintaining them on a proprietary hard drive or local storage device. As long as an electronic device has internet access, it has access to the data as well as the software programs needed to run it. For a variety of reasons, including cost savings, greater productivity, speed and efficiency, performance, and security, cloud computing is a popular choice among individuals and corporations.');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` text NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `short_bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `birth_date`, `gender`, `address`, `user_name`, `email`, `password`, `photo`, `short_bio`) VALUES
(1, 'Loid', 'Forger', '2022-04-14', 'male', 'Anime', 'agent_twilight', 'loidforger@gmail.com', '$2y$10$ed.QkN7am6uYABj.SSyinOQIxGH6uLKGFxv4XBtzIA5b9MzStgkpS', 'loid.jpg', 'I\'m Loid Forger. A spy.'),
(2, 'Marife', 'Banares', '2022-05-16', 'female', 'Sto. Domingo', 'marf09', 'marife@yahoo.com', '202cb962ac59075b964b07152d234b70', '1.png', 'hi'),
(5, 'Diane', 'Ban', '2022-05-16', 'female', 'SD', 'henloo', 'henloo@gmail.com', '25d55ad283aa400af464c76d713c07ad', '4.jpg', 'hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `new_article`
--
ALTER TABLE `new_article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_article`
--
ALTER TABLE `new_article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
