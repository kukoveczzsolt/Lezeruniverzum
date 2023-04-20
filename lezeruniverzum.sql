-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 02:45 PM
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
-- Database: `lezeruniverzum`
--

-- --------------------------------------------------------

--
-- Table structure for table `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `ID` int(11) NOT NULL,
  `jelszo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `knev` varchar(255) NOT NULL,
  `vnev` varchar(255) NOT NULL,
  `admin_e` tinyint(1) NOT NULL DEFAULT 0,
  `reg_ideje` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `felhasznalok`
--

INSERT INTO `felhasznalok` (`ID`, `jelszo`, `email`, `knev`, `vnev`, `admin_e`, `reg_ideje`) VALUES
(1, '$2y$10$TTojQQpK0XxEhBEgmQ7gWOdHGtrCbkhi6WJTgRcSn31tIUxEoWywK', 'kukovecz.zsolt@gmail.com', 'Zsolt', 'Kukovecz', 1, '2023-04-15 19:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriak`
--

CREATE TABLE `kategoriak` (
  `kategoriaNev` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategoriak`
--

INSERT INTO `kategoriak` (`kategoriaNev`, `ID`) VALUES
('Karácsony', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kosar`
--

CREATE TABLE `kosar` (
  `felhaszID` int(255) NOT NULL,
  `termekID` int(255) NOT NULL,
  `ar` double NOT NULL,
  `mennyiseg` int(1) NOT NULL DEFAULT 1,
  `osszesen` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rendelesek`
--

CREATE TABLE `rendelesek` (
  `ID` int(11) NOT NULL,
  `felhaszID` int(11) NOT NULL,
  `rendlesIdopont` date NOT NULL DEFAULT current_timestamp(),
  `osszeg` double DEFAULT NULL,
  `lakcim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rendelesek`
--

INSERT INTO `rendelesek` (`ID`, `felhaszID`, `rendlesIdopont`, `osszeg`, `lakcim`) VALUES
(2, 1, '2023-04-19', NULL, '1188 Buda 15');

-- --------------------------------------------------------

--
-- Table structure for table `rendeles_reszlet`
--

CREATE TABLE `rendeles_reszlet` (
  `rendelesID` int(11) NOT NULL,
  `termekID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rendeles_reszlet`
--

INSERT INTO `rendeles_reszlet` (`rendelesID`, `termekID`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `termekek`
--

CREATE TABLE `termekek` (
  `ID` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `ar` double NOT NULL,
  `kategoria` varchar(255) NOT NULL,
  `kategoriaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `termekek`
--

INSERT INTO `termekek` (`ID`, `nev`, `ar`, `kategoria`, `kategoriaID`) VALUES
(1, 'Fa kerítés', 19990, 'Karácsony', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- Indexes for table `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kosar`
--
ALTER TABLE `kosar`
  ADD KEY `ID` (`felhaszID`) USING BTREE;

--
-- Indexes for table `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`felhaszID`) USING BTREE;

--
-- Indexes for table `rendeles_reszlet`
--
ALTER TABLE `rendeles_reszlet`
  ADD KEY `rendelesID` (`rendelesID`),
  ADD KEY `termekID` (`termekID`);

--
-- Indexes for table `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`kategoriaID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rendelesek`
--
ALTER TABLE `rendelesek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `termekek`
--
ALTER TABLE `termekek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kosar`
--
ALTER TABLE `kosar`
  ADD CONSTRAINT `kosar_ibfk_1` FOREIGN KEY (`felhaszID`) REFERENCES `felhasznalok` (`ID`);

--
-- Constraints for table `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD CONSTRAINT `rendelesek_ibfk_1` FOREIGN KEY (`felhaszID`) REFERENCES `felhasznalok` (`ID`);

--
-- Constraints for table `rendeles_reszlet`
--
ALTER TABLE `rendeles_reszlet`
  ADD CONSTRAINT `rendeles_reszlet_ibfk_1` FOREIGN KEY (`rendelesID`) REFERENCES `rendelesek` (`ID`),
  ADD CONSTRAINT `rendeles_reszlet_ibfk_2` FOREIGN KEY (`termekID`) REFERENCES `termekek` (`ID`);

--
-- Constraints for table `termekek`
--
ALTER TABLE `termekek`
  ADD CONSTRAINT `termekek_ibfk_1` FOREIGN KEY (`kategoriaID`) REFERENCES `kategoriak` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
