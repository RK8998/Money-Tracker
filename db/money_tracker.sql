-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 04:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(10) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `type`, `status`, `u_id`) VALUES
(30, 'petrol', 'Expense', 'Inactive', 1),
(31, 'gift', 'Income', 'Inactive', 1),
(32, 'Mobile', 'Expense', 'Active', 1),
(33, 'Electronics', 'Expense', 'Active', 1),
(36, 'bank balance', 'Income', 'Active', 1),
(49, 'salary', 'Income', 'Active', 16),
(50, 'petrol', 'Expense', 'Active', 16),
(51, 'bonus', 'Income', 'Active', 16),
(52, 'salary', 'Income', 'Active', 17),
(53, 'petrol', 'Expense', 'Active', 17),
(54, 'school fees', 'Expense', 'Active', 17),
(55, 'Gift', 'Income', 'Active', 17),
(56, 'tution fees', 'Expense', 'Inactive', 17),
(57, 'salary', 'Income', 'Active', 20),
(58, 'petrol', 'Expense', 'Active', 20),
(59, 'test', 'Income', 'Active', 20),
(60, 'demo', 'Income', 'Inactive', 20);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cid` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cid`, `name`, `mobile`, `address`, `u_id`) VALUES
(9, 'ketan', 8686987, 'amoli ma', 1),
(10, 'ketika', 868765, 'no any thekana', 1),
(13, 'kiran ', 86876876, 'kataragam', 1),
(23, 'kushang', 987895420, 'katargam', 1),
(28, 'client 1', 70875680, 'baroda ', 16),
(29, 'client 2', 686987008, 'ahemdabad', 16),
(30, 'ramesh bhai', 708065879, 'dhanmora', 17),
(32, 'ramji bhai', 98977, 'fulpada', 20),
(33, 'kushang', 9879854706, 'nilkanth appartment', 20);

-- --------------------------------------------------------

--
-- Table structure for table `close_deal`
--

CREATE TABLE `close_deal` (
  `close_id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` bigint(50) NOT NULL,
  `date` date NOT NULL,
  `int_per` float NOT NULL,
  `duration` varchar(30) NOT NULL,
  `int_type` varchar(30) NOT NULL,
  `return_date` date NOT NULL,
  `storage` int(10) NOT NULL,
  `close_amount` bigint(50) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `close_deal`
--

INSERT INTO `close_deal` (`close_id`, `cid`, `name`, `amount`, `date`, `int_per`, `duration`, `int_type`, `return_date`, `storage`, `close_amount`, `u_id`) VALUES
(31, 8, 'nipa', 5000, '2021-04-01', 2, 'monthly', 'Compound', '2021-07-01', 13, 5306, 1),
(38, 28, 'client 1', 5000, '2021-05-01', 2, 'monthly', 'Simple', '2021-06-01', 40, 5013, 16),
(40, 32, 'ramji bhai', 10000, '2021-05-01', 2, 'monthly', 'Compound', '2021-07-01', 44, 10404, 20),
(41, 32, 'ramji bhai', 10000, '2021-05-13', 2, 'monthly', 'Simple', '2021-05-01', 44, 10000, 20),
(42, 30, 'ramesh bhai', 1000, '2021-05-01', 1, 'monthly', 'Simple', '2021-06-01', 42, 1004, 17);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `eid` int(10) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(100) NOT NULL,
  `storage` int(10) NOT NULL,
  `storage_name` varchar(100) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`eid`, `amount`, `category`, `date`, `detail`, `storage`, `storage_name`, `u_id`) VALUES
(19, 2500, 'petrol', '2021-04-26', 'bike petrol', 13, '', 1),
(20, 300, 'petrol', '2021-04-26', 'car', 13, '', 1),
(21, 200, 'petrol', '2021-04-26', 'my birthday', 13, '', 1),
(22, 300, 'Mobile', '2021-04-26', 'mobile recharge', 13, '', 1),
(23, 100, 'petrol', '2021-04-27', 'bike petrol', 13, '', 1),
(24, 100, 'petrol', '2021-04-27', 'bike', 13, '', 1),
(25, 1400, 'Electronics', '2021-04-30', 'home light bill', 32, '', 1),
(26, 100, 'Mobile', '2021-05-01', 'mobilerecharge', 34, '', 1),
(32, 100, 'petrol', '2021-05-05', 'in bike', 40, 'Bank', 16),
(33, 250, 'petrol', '2021-05-08', 'petrol in car', 40, 'Bank', 16),
(34, 10000, 'school fees', '2021-05-07', 'son school fees', 42, 'cash', 17),
(35, 100, 'petrol', '2021-05-08', 'bike', 42, 'cash ', 17),
(36, 2000, 'petrol', '2021-05-08', 'test', 42, 'cash ', 17),
(37, 5150, 'tution fees', '2021-05-15', 'son tution fees of april', 43, 'kotak bank', 17),
(38, 100, 'petrol', '2021-05-13', 'bike', 44, 'SBI', 20),
(39, 100, 'petrol', '2021-05-13', 'test', 44, 'SBI', 20);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `iid` int(10) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(100) NOT NULL,
  `storage` int(10) NOT NULL,
  `storage_name` varchar(100) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`iid`, `amount`, `category`, `date`, `detail`, `storage`, `storage_name`, `u_id`) VALUES
(51, 1000, 'gift', '2021-04-26', 'my birthday', 13, '', 1),
(52, 1500000, 'bank balance', '2021-04-01', 'bank balance', 13, '', 1),
(53, 1000, 'test', '2021-04-29', 'test', 32, '', 1),
(54, 1500, 'bank balance', '2021-04-30', 'car', 32, '', 1),
(55, 1000, 'bonus', '2021-05-01', 'bonus', 34, '', 1),
(67, 15000, 'salary', '2021-05-05', 'my job salary of april month', 40, 'Bank', 16),
(68, 25000, 'salary', '2021-05-01', 'my job salary of april', 42, 'cash', 17),
(69, 100, 'salary', '2021-05-07', 'test', 42, 'cash', 17),
(70, 100, 'Gift', '2021-05-08', 'birth day', 42, 'cash ', 17),
(71, 10000, 'salary', '2021-05-01', 'april salary', 43, 'kotak bank', 17),
(72, 1000, 'salary', '2021-05-13', 'my birthday', 42, 'cash ', 17),
(73, 15000, 'salary', '2021-05-01', 'salary of march month', 44, 'SBI', 20),
(74, 1000, 'salary', '2021-05-13', 'twst', 44, 'SBI', 20),
(75, 100, 'salary', '2021-05-13', 'demo', 44, 'SBI', 20),
(76, 10000, 'salary', '2021-05-13', 'demo', 44, 'SBI', 20),
(77, 100, 'test', '2021-05-01', 'test', 44, 'SBI', 20);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `lid` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` bigint(50) NOT NULL,
  `date` date NOT NULL,
  `int_per` float NOT NULL,
  `duration` varchar(30) NOT NULL,
  `int_type` varchar(30) NOT NULL,
  `return_date` date NOT NULL,
  `storage` int(10) NOT NULL,
  `close_amount` bigint(50) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`lid`, `cid`, `name`, `amount`, `date`, `int_per`, `duration`, `int_type`, `return_date`, `storage`, `close_amount`, `u_id`) VALUES
(33, 9, 'ketan', 10000, '2021-04-01', 5, 'yearly', 'Compound', '2024-04-01', 13, 11576, 1),
(39, 29, 'client 2', 1000, '2021-05-01', 3, 'yearly', 'Compound', '2022-05-01', 40, 1030, 16);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `u_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`u_id`, `username`, `password`, `type`, `status`) VALUES
(1, 'admin@gmail.com', 'admin', '1', 'active'),
(16, 'User@gmail.com', 'user', '2', 'active'),
(17, 'kushang8998@gmail.com', 'kushang', '2', 'active'),
(18, 'niparaninga345@gmail.com', 'nipa@123', '2', 'active'),
(20, 'ketan.prajapati1901@gmail.com', 'ketan@123', '2', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `sid` int(10) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`sid`, `sname`, `amount`, `detail`, `u_id`) VALUES
(13, 'kotak bank', 1604066, 'This account for net banking', 20),
(32, 'test', 1100, 'test', 1),
(34, 'rk', 900, 'its my bank account', 1),
(40, 'Bank ', 13663, 'My bank wallet', 16),
(41, 'cash', 0, 'it\'s my cash wallet', 16),
(42, 'cash ', 13104, 'it\'s my cash money', 17),
(43, 'kotak bank', 10000, 'its my personla bank account', 17),
(44, 'SBI', 11404, 'bank account', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `category` (`u_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `client` (`u_id`);

--
-- Indexes for table `close_deal`
--
ALTER TABLE `close_deal`
  ADD PRIMARY KEY (`close_id`),
  ADD KEY `close_deal` (`u_id`),
  ADD KEY `close deal str` (`storage`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `expense` (`u_id`),
  ADD KEY `expense str` (`storage`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `income` (`u_id`),
  ADD KEY `income str` (`storage`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `loan` (`u_id`),
  ADD KEY `loan str` (`storage`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `storage` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `eid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `iid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `lid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category` FOREIGN KEY (`u_id`) REFERENCES `login` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client` FOREIGN KEY (`u_id`) REFERENCES `login` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `close_deal`
--
ALTER TABLE `close_deal`
  ADD CONSTRAINT `close deal str` FOREIGN KEY (`storage`) REFERENCES `storage` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `close_deal` FOREIGN KEY (`u_id`) REFERENCES `login` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense` FOREIGN KEY (`u_id`) REFERENCES `login` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense str` FOREIGN KEY (`storage`) REFERENCES `storage` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income` FOREIGN KEY (`u_id`) REFERENCES `login` (`u_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `income str` FOREIGN KEY (`storage`) REFERENCES `storage` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan` FOREIGN KEY (`u_id`) REFERENCES `login` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan str` FOREIGN KEY (`storage`) REFERENCES `storage` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage` FOREIGN KEY (`u_id`) REFERENCES `login` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
