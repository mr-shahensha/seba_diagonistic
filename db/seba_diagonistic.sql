-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 01:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seba_diagonistic`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `sl` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `doctor_id` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `total_price` int(11) NOT NULL,
  `entry_by` varchar(255) NOT NULL,
  `entry_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`sl`, `bill_no`, `doctor_id`, `customer_name`, `date`, `total_price`, `entry_by`, `entry_date`) VALUES
(1, 's2307000', ' john milon', 'rima', '2023-07-21', 25, 'admin2', '21/07/2023 02:36:35 pm'),
(2, 's2307001', ' aman gupta', 'i am user', '2023-07-21', 10, 'admin2', '21/07/2023 02:46:57 pm');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `sl` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `medicine_id` varchar(255) NOT NULL,
  `per_p` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `entry_by` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `entry_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`sl`, `bill_no`, `medicine_id`, `per_p`, `quantity`, `total_price`, `entry_by`, `date`, `entry_date`) VALUES
(1, 's2307000', 'med0', 5, 5, 25, 'admin2', '2023-07-21', '21/07/2023 02:36:17 pm'),
(2, 's2307001', 'med1', 2, 5, 10, 'admin2', '2023-07-21', '21/07/2023 02:46:54 pm'),
(9, '0', 'med1', 2, 1, 2, 'admin1', '2023-07-21', '21/07/2023 03:43:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `sl` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `action` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`sl`, `user_name`, `password`, `level`, `action`) VALUES
(1, 'admin1', 'admin1', 0, 0),
(2, 'admin2', 'admin2', 0, 0),
(3, 'user', 'user', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `sl` int(11) NOT NULL,
  `medicine_id` varchar(255) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `single_price` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`sl`, `medicine_id`, `medicine_name`, `single_price`, `price`) VALUES
(1, 'med0', 'paracitamol', 5, 90),
(2, 'med1', 'Antibiotics', 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_master`
--

CREATE TABLE `medicine_master` (
  `sl` int(11) NOT NULL,
  `medicine_master_id` varchar(255) NOT NULL,
  `medicine_master_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_master`
--

INSERT INTO `medicine_master` (`sl`, `medicine_master_id`, `medicine_master_name`) VALUES
(1, 'med0', 'paracitamol'),
(2, 'med1', 'Antibiotics');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `sl` int(11) NOT NULL,
  `purchase_id` varchar(255) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `purchase_by` varchar(255) NOT NULL,
  `total_purchase` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `purchase_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`sl`, `purchase_id`, `seller_name`, `purchase_by`, `total_purchase`, `date`, `purchase_date`) VALUES
(1, 'p2307000', 'we', 'admin2', 90, '2023-07-21', '21/07/2023 01:11:48 pm'),
(2, 'p2307002', 'ere', 'admin1', 360, '2023-07-21', '21/07/2023 04:44:57 pm');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `sl` int(11) NOT NULL,
  `purchase_id` varchar(255) NOT NULL,
  `medicine_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `original_price` int(11) NOT NULL,
  `sum_of_purchase` int(11) NOT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `purchase_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`sl`, `purchase_id`, `medicine_id`, `quantity`, `original_price`, `sum_of_purchase`, `purchase_date`, `date`, `purchase_by`) VALUES
(1, 'p2307000', 'med1', 9, 10, 90, '21/07/2023 01:11:45 pm', '2023-07-21', 'admin2'),
(2, 'p2307002', 'med0', 40, 9, 360, '21/07/2023 04:44:54 pm', '2023-07-21', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `sl` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `product_id` varchar(255) NOT NULL,
  `in` int(11) NOT NULL,
  `out` int(11) NOT NULL,
  `purchase_id` varchar(255) NOT NULL,
  `sale_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`sl`, `date`, `product_id`, `in`, `out`, `purchase_id`, `sale_id`) VALUES
(1, '2023-07-21', 'med1', 9, 0, 'p2307000', ''),
(2, '2023-07-21', 'med0', 0, 5, '', 's2307000'),
(3, '2023-07-21', 'med1', 0, 5, '', 's2307001'),
(4, '2023-07-21', 'med0', 40, 0, 'p2307002', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `medicine_master`
--
ALTER TABLE `medicine_master`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_master`
--
ALTER TABLE `medicine_master`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
