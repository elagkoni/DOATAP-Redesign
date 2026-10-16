-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 03:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdi1800073`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `APPLICATION_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `STATE` enum('ΕΓΚΕΚΡΙΜΕΝΗ','ΑΠΟΡΡΙΦΘΕΙΣΑ','ΕΚΚΡΕΜΗΣ','ΠΡΟΧΕΙΡΗ') NOT NULL,
  `CREATION_DATE` date NOT NULL,
  `DEGREE` enum('ΒΑΣΙΚΟ','ΜΕΤΑΠΤΥΧΙΑΚΟ','ΔΙΔΑΚΤΟΡΙΚΟ') DEFAULT NULL,
  `COUNTRY` varchar(100) DEFAULT NULL,
  `UNIVERSITY` varchar(100) DEFAULT NULL,
  `DEPARTMENT` varchar(100) DEFAULT NULL,
  `DATE_START` date DEFAULT NULL,
  `DATE_END` date DEFAULT NULL,
  `REASON_OF_DENIAL` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`APPLICATION_ID`, `USER_ID`, `STATE`, `CREATION_DATE`, `DEGREE`, `COUNTRY`, `UNIVERSITY`, `DEPARTMENT`, `DATE_START`, `DATE_END`, `REASON_OF_DENIAL`) VALUES
(53, 8, 'ΕΚΚΡΕΜΗΣ', '2022-01-19', 'ΒΑΣΙΚΟ', 'ΗΠΑ', 'Harvard University', 'DIVISION OF ENGINEERING', '2012-06-28', '2016-02-24', NULL),
(57, 8, 'ΕΚΚΡΕΜΗΣ', '2022-01-20', 'ΒΑΣΙΚΟ', 'ΗΠΑ', 'Harvard University', 'Engineering', '2009-12-28', '2016-02-03', NULL),
(58, 8, 'ΠΡΟΧΕΙΡΗ', '2022-01-19', NULL, NULL, 'Harvard University', '12345', NULL, NULL, NULL),
(59, 9, 'ΕΓΚΕΚΡΙΜΕΝΗ', '2022-01-19', 'ΔΙΔΑΚΤΟΡΙΚΟ', 'Ηνωμένο Βασίλειο', 'University of Oxford', 'Department of Psychology', '2015-02-22', '2020-03-01', NULL),
(60, 9, 'ΑΠΟΡΡΙΦΘΕΙΣΑ', '2022-01-19', 'ΔΙΔΑΚΤΟΡΙΚΟ', 'Ηνωμένο Βασίλειο', 'University of Oxford', 'Department of Psychology', '2016-02-02', '2020-03-01', 'Δεν έχουν επισυναπτεί τα απαραίτητα δικαιολογητικά. ');

-- --------------------------------------------------------

--
-- Table structure for table `approved`
--

CREATE TABLE `approved` (
  `APPROVED_ID` int(11) NOT NULL,
  `APPLICATION_ID` int(11) NOT NULL,
  `UNIVERSITY` text NOT NULL,
  `DEPARTMENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approved`
--

INSERT INTO `approved` (`APPROVED_ID`, `APPLICATION_ID`, `UNIVERSITY`, `DEPARTMENT`) VALUES
(1, 59, 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών', 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών'),
(2, 59, 'Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης', 'Τμήμα Κτηνιατρικής');

-- --------------------------------------------------------

--
-- Table structure for table `default_user`
--

CREATE TABLE `default_user` (
  `USER_ID` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` text DEFAULT NULL,
  `lastname` text DEFAULT NULL,
  `fathername` text DEFAULT NULL,
  `mothername` text DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `telephone` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `ADMIN` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `default_user`
--

INSERT INTO `default_user` (`USER_ID`, `username`, `email`, `password`, `firstname`, `lastname`, `fathername`, `mothername`, `birthdate`, `telephone`, `phone`, `ADMIN`) VALUES
(6, 'user1', 'user1@doatap.gr', '12345678', 'Μαρία', 'Παπαδοπούλου', 'Γιώργος', 'Αλεξάνδρα', '1998-12-08', '', '6901230321', 1),
(8, 'lykos', 'sdi1800073@di.uoa.gr', '12345678', 'Sergios', 'Kefalidis', 'Andreas', 'Paraskevi', '2000-02-24', '', '+30 6996699666', 0),
(9, 'meow', 'sdi1800088@doatap.gr', '12345678', 'Μαρία', 'Παπαδοπούλου', 'Γιώργος', 'Αλεξάνδρα', '1998-12-08', '', '6901230321', 0),
(10, 'aristos', 'aristos@fake-mail.com', '12345678', 'Aristotelis', 'Rigas', 'Takis', 'Manto', '1980-01-01', '210 100 50 70', '6552525100', 0);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `DOC_ID` int(11) NOT NULL,
  `APPLICATION_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `FILENAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`DOC_ID`, `APPLICATION_ID`, `USER_ID`, `FILENAME`) VALUES
(5, 53, 8, 'Screenshot from 2021-12-26 20-18-03.png'),
(6, 53, 8, 'Screenshot from 2022-01-04 18-26-11.png'),
(7, 53, 8, 'Screenshot from 2022-01-08 12-44-27.png'),
(8, 59, 9, 'doapat_color_full.png'),
(9, 59, 9, 'Screenshot from 2021-12-26 20-18-03.png');

-- --------------------------------------------------------

--
-- Table structure for table `suggested`
--

CREATE TABLE `suggested` (
  `SUGGESTED_ID` int(11) NOT NULL,
  `APPLICATION_ID` int(11) NOT NULL,
  `UNIVERSITY` text NOT NULL,
  `DEPARTMENT` text NOT NULL,
  `SUBJECT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggested`
--

INSERT INTO `suggested` (`SUGGESTED_ID`, `APPLICATION_ID`, `UNIVERSITY`, `DEPARTMENT`, `SUBJECT`) VALUES
(6, 53, 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών', 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Λειτουργικά Συστήματα');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`APPLICATION_ID`),
  ADD KEY `APPLICATION_ID` (`APPLICATION_ID`);

--
-- Indexes for table `approved`
--
ALTER TABLE `approved`
  ADD PRIMARY KEY (`APPROVED_ID`);

--
-- Indexes for table `default_user`
--
ALTER TABLE `default_user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`DOC_ID`);

--
-- Indexes for table `suggested`
--
ALTER TABLE `suggested`
  ADD PRIMARY KEY (`SUGGESTED_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `APPLICATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `approved`
--
ALTER TABLE `approved`
  MODIFY `APPROVED_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `default_user`
--
ALTER TABLE `default_user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `DOC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `suggested`
--
ALTER TABLE `suggested`
  MODIFY `SUGGESTED_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
