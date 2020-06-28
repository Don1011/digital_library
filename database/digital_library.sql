-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 03:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL,
  `isbn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `status`, `isbn`) VALUES
(1, 'Environmental Biotechnology', 'T.Srinivas', 'available', '978-2-06-051640-5'),
(2, 'Basics Environmental chemistry', 'E.W NSI', 'available', '978-2-05-051640-5'),
(3, 'Slavery, commerce and production 	', 'paul E.Lovejoy', 'available', '978-2-05-071640-5'),
(4, 'Environmental pollution and hazard 	', 'L.R.Patro', 'available', '978-2-05-054640-5'),
(5, 'Automata and theory', 'Adesh K.Pandey', 'available', '978-2-05-054640-7'),
(6, 'Facility change management', 'Wiley Blackwwell', 'available', '978-2-05-094650-5'),
(7, 'Theory of Automata', 'Adesh Pandey', 'available', '978-2-05-094651-5'),
(8, 'Introduction to advance Control Systems', 'O.C. Orege', 'available', '998-2-06-051640-5');

-- --------------------------------------------------------

--
-- Table structure for table `book_requests`
--

CREATE TABLE `book_requests` (
  `id` int(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_requests`
--

INSERT INTO `book_requests` (`id`, `title`, `author`, `date`) VALUES
(1, 'Biotechnology 4', 'S. Mahesh', '17-05-2020'),
(2, 'Biotechnology exploration', 'Judith Schepple', '17-05-2020'),
(3, 'Producing literature televisio', 'unknown', '17-05-2020'),
(4, 'Start your new life today', 'Joyce Meyer', '17-05-2020'),
(5, 'Photojournalism', 'UNKNOWN', '17-05-2020'),
(6, 'Understanding food and nutrition', 'James Ajaja', '17-05-2020');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_outs`
--

CREATE TABLE `borrow_outs` (
  `id` int(255) NOT NULL,
  `book_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `matric_number` varchar(25) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_outs`
--

INSERT INTO `borrow_outs` (`id`, `book_id`, `user_id`, `matric_number`, `date`) VALUES
(2, 4, 1, 'kasu/22/csc/2221', '16-05-2020'),
(4, 3, 2, 'kasu/22/csc/2222', '16-05-2020');

-- --------------------------------------------------------

--
-- Table structure for table `requested_books`
--

CREATE TABLE `requested_books` (
  `id` int(255) NOT NULL,
  `name` varchar(55) NOT NULL,
  `author` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(233) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `matric_number` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `matric_number`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', 'johndoe', 'kasu/22/csc/2221'),
(2, 'Jane Doe', 'janedoe@gmail.com', 'janedoe', 'kasu/22/csc/2222'),
(3, 'Kevin Doe', 'kevindoe@gmail.com', 'kevindoe', 'kasu/22/csc/2223');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_outs`
--
ALTER TABLE `borrow_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requested_books`
--
ALTER TABLE `requested_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `borrow_outs`
--
ALTER TABLE `borrow_outs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `requested_books`
--
ALTER TABLE `requested_books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(233) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
