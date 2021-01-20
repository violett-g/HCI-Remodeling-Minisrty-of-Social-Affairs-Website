-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2021 at 10:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samplelogindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `business_name` varchar(200) DEFAULT NULL,
  `business_afm` varchar(200) DEFAULT NULL,
  `employer_afm` varchar(200) DEFAULT NULL,
  `business_address` varchar(200) DEFAULT NULL,
  `business_email` varchar(200) DEFAULT NULL,
  `business_phone` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`business_name`, `business_afm`, `employer_afm`, `business_address`, `business_email`, `business_phone`) VALUES
('Black Bean O.E', '963852741', '123456789', 'Ξενίας 24', 'bb@gmail.com ', '6943075068');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `employee_afm` varchar(200) DEFAULT NULL,
  `employee_name` varchar(200) DEFAULT NULL,
  `employee_surname` varchar(200) DEFAULT NULL,
  `business_afm` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `start_date` varchar(200) DEFAULT NULL,
  `end_date` varchar(200) DEFAULT NULL,
  `kids` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`employee_afm`, `employee_name`, `employee_surname`, `business_afm`, `type`, `start_date`, `end_date`, `kids`) VALUES
('456951753', 'Οδυσσέας', 'Γαρμπής', '963852741', 'ΑΔΕΙΑ ΕΙΔΙΚΗΣ ΚΑΤΑΣΤΑΣΗΣ', '2021-01-12', '2021-01-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `afm` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `hour` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`afm`, `name`, `surname`, `phone`, `email`, `date`, `hour`) VALUES
('123456789', 'Άλκηστις', 'Διαμαντή', '6945068030', 'alDiamanti@gmail.com', '01/02/2021', '11:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `afm` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`afm`, `username`, `password`, `name`, `lastname`, `email`, `role`, `address`, `phone`) VALUES
('123456789', 'alkistis_d', '1234', 'Άλκηστις', 'Διαμαντή', 'alDiamanti@gmail.com', 'Εργοδότης', 'Ούλωφ Πάλμε', '+306943075067'),
('456951753', 'o_garbis', '3456', 'Οδυσσέας', 'Γαρμπής', 'ogarbis@gmail.com', 'Εργαζόμενος', 'Ούλωφ Πάλμε', '6943075067'),
('456852951', 'venetia25', '4567', 'Βενετία', 'Γαλάνη', 'vg115@gmail.com', 'Εργαζόμενος', 'Σμύρνης 12', '6943075000'),
('456987159', 'isid_B', '6789', 'Ισίδωρος', 'Βλαχόπουλος', 'isb89@gmail.com', 'Ελεύθερος επαγγελματίας', 'Σταδίου 32', '6958745602'),
('564897321', 'alexiou_n', 'alexiou56', 'Νεφέλη', 'Αλεξίου', 'alexiou56@gmail.com', 'Συνταξιούχος', 'Xαριλάου Tρικούπη 24', '6987845123'),
('569856981', 'blad_g', 'goumas23', 'Βλαδίμηρος', ' Γκούμας', 'blad_g@gmail.com', 'Άνεργος', 'Αγίας Κυριακής 6', '6952323568');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `afm` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `workplaces`
--

CREATE TABLE `workplaces` (
  `business_afm` varchar(200) DEFAULT NULL,
  `employee_afm` varchar(200) DEFAULT NULL,
  `employee_status` varchar(200) DEFAULT NULL,
  `start_date` varchar(200) DEFAULT NULL,
  `end_date` varchar(200) DEFAULT NULL,
  `employee_name` varchar(200) DEFAULT NULL,
  `employee_surname` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workplaces`
--

INSERT INTO `workplaces` (`business_afm`, `employee_afm`, `employee_status`, `start_date`, `end_date`, `employee_name`, `employee_surname`) VALUES
('963852741', '456951753', 'Τηλεργασία', '15/12/2020', '01/02/2021', 'Οδυσσέας', 'Γαρμπής'),
('963852741', '456852951', 'Αναστολή σύμβασης', '15/12/2020', '17/01/2021', 'Βενετία', 'Γαλάνη');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
