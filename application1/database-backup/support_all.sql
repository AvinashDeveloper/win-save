-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 05:19 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `win_and_save`
--

-- --------------------------------------------------------

--
-- Table structure for table `support_all`
--

CREATE TABLE `support_all` (
  `support_id` int(11) NOT NULL,
  `support_type` enum('help','find_us','contact_us','rules','about_us','vendor_support') NOT NULL COMMENT '''help'',''find_us'',''contact_us'',''rules'',''about_us'',''vendor_support''',
  `title` text COMMENT 'as Question, Title',
  `description` text NOT NULL COMMENT 'as Answer, Description, Info',
  `link` text,
  `status` enum('Active','Deactive') NOT NULL,
  `priority` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support_all`
--

INSERT INTO `support_all` (`support_id`, `support_type`, `title`, `description`, `link`, `status`, `priority`, `create_date`) VALUES
(2, 'rules', 'rule first 1', 'first rule define here ..', NULL, 'Active', 1, '2020-04-24 00:00:00'),
(3, 'rules', 'rule second', 'applied second rule', NULL, 'Active', 2, '2020-04-24 00:00:00'),
(4, 'rules', 'rule third', 'follow rule third', NULL, 'Active', 3, '2020-04-24 00:00:00'),
(5, 'help', 'what is mean of win & save?', 'win and save is the shopping center where use offer and get offer....', NULL, 'Active', 1, '2020-04-24 00:00:00'),
(8, 'find_us', 'website', '', 'http://www.win&save.com', 'Active', 1, '2020-04-24 00:00:00'),
(9, 'contact_us', 'E-mail', 'win&save@gmail.com', NULL, 'Active', 1, '2020-04-24 00:00:00'),
(11, 'vendor_support', 'E-mail us', 'sales@winsave.in', NULL, 'Active', 1, '2020-04-24 00:00:00'),
(12, 'about_us', '', 'Here write about us text.............', '', 'Active', 0, '2020-04-24 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `support_all`
--
ALTER TABLE `support_all`
  ADD PRIMARY KEY (`support_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `support_all`
--
ALTER TABLE `support_all`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
