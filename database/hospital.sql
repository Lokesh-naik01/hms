-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 03:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `aid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `did` int(10) NOT NULL,
  `dname` varchar(30) NOT NULL,
  `adate` date NOT NULL,
  `bdate` date NOT NULL,
  `Remarks` varchar(50) NOT NULL DEFAULT 'None',
  `Status` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

-- INSERT INTO `appointment` (`aid`, `pid`, `pname`, `did`, `dname`, `adate`, `bdate`, `Remarks`, `Status`) VALUES
-- (10001, 10001, 'Patient 1', 1001, 'doc 1', '2021-02-28', '2021-02-26', 'Rest', 'Yes'),
-- (10002, 10002, 'patient 2', 1002, 'doc 2', '2021-02-26', '2021-02-26', 'Rest', 'Yes'),
-- (10003, 10002, 'patient 2', 1002, 'doc 2', '2021-02-27', '2021-02-26', 'Rest', 'Yes'),
-- (10004, 10003, 'pat1', 1004, 'ncvng', '2021-02-28', '2021-02-27', 'Rest', 'Yes'),
-- (10006, 10001, 'Patient 1', 1003, 'rtdgf', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10008, 10002, 'patient 2', 1001, 'doc 1', '2021-02-28', '2021-02-27', 'Rest', 'Yes'),
-- (10009, 10007, 'oihkg', 1001, 'doc 1', '2021-03-18', '2021-02-27', 'None', 'No'),
-- (10010, 10005, 'yhgfbvc', 1001, 'doc 1', '2021-03-28', '2021-02-27', 'None', 'No'),
-- (10011, 10006, 'ytjg', 1001, 'doc 1', '2021-04-14', '2021-02-27', 'None', 'No'),
-- (10012, 10001, 'Patient 1', 1002, 'doc 2', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10013, 10002, 'patient 2', 1001, 'doc 1', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10014, 10003, 'pat1', 1001, 'doc 1', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10015, 10004, 'hkjb', 1001, 'doc 1', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10016, 10005, 'yhgfbvc', 1001, 'doc 1', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10017, 10006, 'ytjg', 1001, 'doc 1', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10018, 10007, 'oihkg', 1001, 'doc 1', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10019, 10008, 'rtfvc ', 1001, 'doc 1', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10020, 10009, 'rtfvc 54rweda', 1001, 'doc 1', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10021, 10010, 'wqedfg', 1001, 'doc 1', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10022, 10011, 'yugjhfgb', 1001, 'doc 1', '2021-02-27', '2021-02-27', 'Rest', 'Yes'),
-- (10023, 10005, 'yhgfbvc', 1001, 'doc 1', '2021-02-28', '2021-02-28', 'Rest', 'Yes'),
-- (10024, 10003, 'pat1', 1001, 'doc 1', '2021-02-28', '2021-02-28', 'Rest', 'Yes'),
-- (10025, 10008, 'rtfvc ', 1001, 'doc 1', '2021-02-28', '2021-02-28', 'Rest', 'Yes'),
-- (10026, 10002, 'patient 2', 1001, 'doc 1', '2021-02-28', '2021-02-28', 'Rest', 'Yes'),
-- (10027, 10006, 'ytjg', 1001, 'doc 1', '2021-02-28', '2021-02-28', 'Rest', 'Yes'),
-- (10028, 10003, 'pat1', 1001, 'doc 1', '2021-02-28', '2021-02-28', 'Rest', 'Yes'),
-- (10029, 10009, 'rtfvc 54rweda', 1001, 'doc 1', '2021-02-28', '2021-02-28', 'Rest', 'Yes'),
-- (10030, 10010, 'wqedfg', 1001, 'doc 1', '2021-02-28', '2021-02-28', 'Rest', 'Yes'),
-- (10031, 10011, 'yugjhfgb', 1001, 'doc 1', '2021-02-28', '2021-02-28', 'Rest', 'Yes'),
-- (10032, 10004, 'hkjb', 1001, 'doc 1', '2021-03-02', '2021-03-02', 'None', 'Yes'),
-- (10033, 10008, 'rtfvc ', 1001, 'doc 1', '2021-03-02', '2021-03-02', 'Need Bed Rest For 5 days', 'Yes'),
-- (10034, 10009, 'rtfvc 54rweda', 1001, 'doc 1', '2021-03-04', '2021-03-04', 'None', 'Yes'),
-- (10035, 10005, 'yhgfbvc', 1001, 'doc 1', '2021-03-05', '2021-03-05', 'fgcvx', 'Yes'),
-- (10036, 10005, 'yhgfbvc', 1001, 'doc 1', '2021-03-06', '2021-03-05', 'hghg\r\n', 'Yes'),
-- (10037, 10004, 'hkjb', 1001, 'doc 1', '2021-03-06', '2021-03-06', 'gvc', 'Yes'),
-- (10038, 10001, 'Patient 1', 1001, 'doc 1', '2021-03-07', '2021-03-07', 'None', 'No'),
-- (10039, 10006, 'ytjg', 1001, 'doc 1', '2021-03-07', '2021-03-07', 'None', 'No'),
-- (10041, 10001, 'Patient 1', 1001, 'doc 1', '2021-03-09', '2021-03-09', 'check', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(10) NOT NULL,
  `dname` varchar(30) NOT NULL,
  `ddob` date NOT NULL,
  `dgender` varchar(10) NOT NULL,
  `dspec` varchar(30) NOT NULL,
  `dphone` bigint(12) NOT NULL,
  `dmail` varchar(50) NOT NULL,
  `daddress` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

-- INSERT INTO `doctor` (`did`, `dname`, `ddob`, `dgender`, `dspec`, `dphone`, `dmail`, `daddress`) VALUES
-- (1001, 'doc 1', '0056-12-31', 'Female', 'kjhgf', 1234567, 'doc1@gmail.com', 'ghfds'),
-- (1002, 'doc 2', '5678-12-31', 'Female', 'ghfd', 7654, 'doc2@gmail.com', 'asdfg'),
-- (1003, 'rtdgf', '0056-12-31', 'Male', 'ygv', 123456, 'yhgf@sdfg', 'hgf'),
-- (1004, 'ncvng', '0056-12-31', 'Male', 'uhgv', 987654, 'sdfg@efbn', 'jhgfd');

-- --------------------------------------------------------

--
-- Table structure for table `doctorlogin`
--

CREATE TABLE `doctorlogin` (
  `did` int(10) NOT NULL,
  `dmail` varchar(40) NOT NULL,
  `dpass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorlogin`
--

-- INSERT INTO `doctorlogin` (`did`, `dmail`, `dpass`) VALUES
-- (1001, 'doc1@gmail.com', 'doc1'),
-- (1002, 'doc2@gmail.com', 'doc 2'),
-- (1003, 'yhgf@sdfg', 'rtdgf'),
-- (1004, 'sdfg@efbn', 'ncvng');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `mid` int(10) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `mcost` float NOT NULL,
  `mnum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

-- INSERT INTO `medicine` (`mid`, `mname`, `mcost`, `mnum`) VALUES
-- (101, 'coldstop', 27.07, 10),
-- (102, 'tegrital', 654, 20);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(10) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pdob` date NOT NULL,
  `pgender` varchar(10) NOT NULL,
  `pphone` bigint(12) NOT NULL,
  `pmail` varchar(50) NOT NULL,
  `paddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

-- INSERT INTO `patient` (`pid`, `pname`, `pdob`, `pgender`, `pphone`, `pmail`, `paddress`) VALUES
-- (10001, 'Patient 1', '1989-12-31', 'Male', 98765, 'pat1@gmail.com', 'ghfd'),
-- (10002, 'patient 2', '0567-12-31', 'Male', 9876543, 'pat2@gmail.com', 'kjhgfd'),
-- (10003, 'pat1', '0003-12-31', 'Female', 6543, 'asd@hgfd', 'sdfg'),
-- (10004, 'hkjb', '0235-08-07', 'Male', 98765, 'hgf@asdfg', 'jhgf'),
-- (10005, 'yhgfbvc', '0005-12-31', 'Female', 87654, 'hgbfvc@sddfg', 'jhgfd'),
-- (10006, 'ytjg', '0043-06-05', 'Male', 34567, 'jhgf@werfghj', 'kijnbv'),
-- (10007, 'oihkg', '0006-08-07', 'Male', 76543, 'sdf@wsdfg', 'hgfvc'),
-- (10008, 'rtfvc ', '0056-12-31', 'Male', 76543, 'erty@asxcv', 'yhtgfv'),
-- (10009, 'rtfvc 54rweda', '0056-12-31', 'Male', 76543, 'erty@asxcv', 'yhtgfvyutrseaw'),
-- (10010, 'wqedfg', '0056-02-04', 'Male', 76543, 'sdefrg@sdfg', 'gfd'),
-- (10011, 'yugjhfgb', '0056-12-31', 'Male', 7654, 'wedrt@qwsdf', 'ijuhbv');

-- --------------------------------------------------------

--
-- Table structure for table `prescribe`
--

CREATE TABLE `prescribe` (
  `prid` int(10) NOT NULL,
  `aid` int(10) NOT NULL,
  `mid` int(10) NOT NULL,
  `mname` varchar(40) NOT NULL,
  `mquan` float NOT NULL,
  `mmrng` float NOT NULL,
  `maft` float NOT NULL,
  `mevng` float NOT NULL,
  `remarks` varchar(40) NOT NULL,
  `pid` int(10) NOT NULL,
  `did` int(10) NOT NULL,
  `ndays` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescribe`
--

-- INSERT INTO `prescribe` (`prid`, `aid`, `mid`, `mname`, `mquan`, `mmrng`, `maft`, `mevng`, `remarks`, `pid`, `did`, `ndays`) VALUES
-- (10001, 10035, 102, 'tegrital', 22, 2, 2, 3, 'after lunch', 10009, 1001, 5),
-- (10002, 10035, 101, 'coldstop', 25, 5, 5, 3, 'Use cold water', 10010, 1001, 12),
-- (10003, 10037, 101, 'coldstop', 23, 12, 12, 123, '213', 10004, 1001, 123),
-- (10004, 10037, 102, 'tegrital', 54, 213, 123, 123, 'gdf', 10004, 1001, 123),
-- (10009, 10041, 101, 'coldstop', 13, 1, 2, 1, 'ed', 10001, 1001, 43);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `doctorlogin`
--
ALTER TABLE `doctorlogin`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `prescribe`
--
ALTER TABLE `prescribe`
  ADD PRIMARY KEY (`prid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `doctorlogin`
--
ALTER TABLE `doctorlogin`
  MODIFY `did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `mid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;

--
-- AUTO_INCREMENT for table `prescribe`
--
ALTER TABLE `prescribe`
  MODIFY `prid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
