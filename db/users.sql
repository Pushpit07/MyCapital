-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 06:01 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MyCapital`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `row_id` text NOT NULL,
  `date` text NOT NULL,
  `purpose` text NOT NULL,
  `category` text NOT NULL,
  `sum` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `row_id`, `date`, `purpose`, `category`, `sum`) VALUES
(1, 'ghjffdzdnbs', '12/04/2020', 'Chips', 'Food', '20' ),
(2, '6dnbivsj1l5', '13/04/2020', 'Pen', 'Stationary', '30'),
(3, 'u0i4121mkd', '02/05/2020', 'Drink', 'Food', '40'),
(4, 'sz8br0v17s7', '10/05/2020', 'Shirt', 'Other', '700');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
