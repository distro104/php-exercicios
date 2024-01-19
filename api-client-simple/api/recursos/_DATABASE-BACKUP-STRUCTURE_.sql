-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2024 at 10:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api-client-simple`
--
CREATE DATABASE IF NOT EXISTS `api-client-simple` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `api-client-simple`;

-- --------------------------------------------------------

--
-- Table structure for table `API-PRODUCT`
--

DROP TABLE IF EXISTS `API-PRODUCT`;
CREATE TABLE `API-PRODUCT` (
  `ID` int(11) NOT NULL,
  `PRODUCT` varchar(50) NOT NULL,
  `QUANTITY` int(11) NOT NULL DEFAULT 0,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp(),
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `API-PRODUCT`
--

INSERT INTO `API-PRODUCT` (`ID`, `PRODUCT`, `QUANTITY`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 'Pimenta Malagueta', 10, '2024-01-19 17:06:35', NULL, NULL),
(2, 'Jaboticaba', 10, '2024-01-19 17:07:11', NULL, NULL),
(3, 'Limao Verde', 3, '2024-01-19 17:07:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `API-PRODUCT-USER`
--

DROP TABLE IF EXISTS `API-PRODUCT-USER`;
CREATE TABLE `API-PRODUCT-USER` (
  `ID` int(11) NOT NULL,
  `ID_PRODUCT` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `DT_SELL` datetime NOT NULL DEFAULT current_timestamp(),
  `AMOUNT` int(11) NOT NULL DEFAULT 0,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp(),
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `API-USER`
--

DROP TABLE IF EXISTS `API-USER`;
CREATE TABLE `API-USER` (
  `ID` int(11) NOT NULL,
  `FULLNAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp(),
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `API-USER`
--

INSERT INTO `API-USER` (`ID`, `FULLNAME`, `EMAIL`, `PHONE`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 'Joao Pedro', 'jpedro@fakemail.com', '11111111111', '2024-01-19 17:08:38', NULL, NULL),
(2, 'Alice Americo', 'americo@fakemail.com', '22222222222', '2024-01-19 17:09:05', NULL, NULL),
(3, 'Alice Mendes', 'amendes@fakemail.com', '1111111111', '2024-01-19 17:09:55', '2024-01-19 17:10:19', NULL),
(4, 'Otavio', 'otaviojc@fakemail.com', '3333333333', '2024-01-19 17:09:55', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `API-PRODUCT`
--
ALTER TABLE `API-PRODUCT`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `API-PRODUCT-USER`
--
ALTER TABLE `API-PRODUCT-USER`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_API-PRODUCT` (`ID_PRODUCT`),
  ADD KEY `FK_API-USER` (`ID_USER`);

--
-- Indexes for table `API-USER`
--
ALTER TABLE `API-USER`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `API-PRODUCT`
--
ALTER TABLE `API-PRODUCT`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `API-PRODUCT-USER`
--
ALTER TABLE `API-PRODUCT-USER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `API-USER`
--
ALTER TABLE `API-USER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `API-PRODUCT-USER`
--
ALTER TABLE `API-PRODUCT-USER`
  ADD CONSTRAINT `FK_API-PRODUCT` FOREIGN KEY (`ID_PRODUCT`) REFERENCES `API-PRODUCT` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_API-USER` FOREIGN KEY (`ID_USER`) REFERENCES `API-USER` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
