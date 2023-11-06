-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 04:17 PM
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
-- Database: `db_abis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_form`
--

CREATE DATABASE IF NOT EXISTS `db_abis`;
USE `db_abis`;
CREATE TABLE `tb_form` (
  `id` int(11) NOT NULL,
  `schoolyear` varchar(100) DEFAULT NULL,
  `gradelevel` varchar(100) NOT NULL,
  `withlrn` varchar(100) NOT NULL,
  `returning` varchar(100) NOT NULL,
  `psa` varchar(100) NOT NULL,
  `lrn` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `extname` varchar(100) NOT NULL,
  `placeofbirth` varchar(100) NOT NULL,
  `mothertongue` varchar(100) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `indegenous` varchar(100) NOT NULL,
  `ipspecify` varchar(100) NOT NULL,
  `4ps` varchar(100) NOT NULL,
  `4psID` varchar(100) NOT NULL,
  `Chousenum` varchar(100) NOT NULL,
  `Cstreet` varchar(100) NOT NULL,
  `Cbrgy` varchar(100) NOT NULL,
  `Ccity` varchar(100) NOT NULL,
  `Cprovince` varchar(100) NOT NULL,
  `Ccountry` varchar(100) NOT NULL,
  `Czipcode` varchar(100) NOT NULL,
  `perma` varchar(100) NOT NULL,
  `Phousenum` varchar(100) NOT NULL,
  `Pstreet` varchar(100) NOT NULL,
  `Pbrgy` varchar(100) NOT NULL,
  `Pcity` varchar(100) NOT NULL,
  `Pprovince` varchar(100) NOT NULL,
  `Pcountry` varchar(100) NOT NULL,
  `Pzipcode` varchar(100) NOT NULL,
  `Flastname` varchar(100) NOT NULL,
  `Ffirstname` varchar(100) NOT NULL,
  `Fmiddlename` varchar(100) NOT NULL,
  `Fcontact` varchar(100) NOT NULL,
  `Mlastname` varchar(100) NOT NULL,
  `Mfirstname` varchar(100) NOT NULL,
  `Mmiddlename` varchar(100) NOT NULL,
  `Mcontact` varchar(100) NOT NULL,
  `Glastname` varchar(100) NOT NULL,
  `Gfirstname` varchar(100) NOT NULL,
  `Gmiddlename` varchar(100) NOT NULL,
  `Gcontact` varchar(100) NOT NULL,
  `lastgrdlvl` varchar(100) NOT NULL,
  `lastschoolyr` varchar(100) NOT NULL,
  `lastschool` varchar(100) NOT NULL,
  `schoolid` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `track` varchar(100) NOT NULL,
  `strand` varchar(100) NOT NULL,
  `modularprint` varchar(100) NOT NULL,
  `online` varchar(100) NOT NULL,
  `radio` varchar(100) NOT NULL,
  `blended` varchar(100) NOT NULL,
  `modulardigital` varchar(100) NOT NULL,
  `eductv` varchar(100) NOT NULL,
  `homeschool` varchar(100) NOT NULL,
  `facetoface` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_form`
--

INSERT INTO `tb_form` (`id`, `schoolyear`, `gradelevel`, `withlrn`, `returning`, `psa`, `lrn`, `lastname`, `firstname`, `middlename`, `extname`, `placeofbirth`, `mothertongue`, `birthdate`, `sex`, `age`, `indegenous`, `ipspecify`, `4ps`, `4psID`, `Chousenum`, `Cstreet`, `Cbrgy`, `Ccity`, `Cprovince`, `Ccountry`, `Czipcode`, `perma`, `Phousenum`, `Pstreet`, `Pbrgy`, `Pcity`, `Pprovince`, `Pcountry`, `Pzipcode`, `Flastname`, `Ffirstname`, `Fmiddlename`, `Fcontact`, `Mlastname`, `Mfirstname`, `Mmiddlename`, `Mcontact`, `Glastname`, `Gfirstname`, `Gmiddlename`, `Gcontact`, `lastgrdlvl`, `lastschoolyr`, `lastschool`, `schoolid`, `semester`, `track`, `strand`, `modularprint`, `online`, `radio`, `blended`, `modulardigital`, `eductv`, `homeschool`, `facetoface`) VALUES
(1, '132456', '12', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, NULL, '11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(3, NULL, '11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', 'yes', '', '', 'yes', '', '', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_form`
--
ALTER TABLE `tb_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_form`
--
ALTER TABLE `tb_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
