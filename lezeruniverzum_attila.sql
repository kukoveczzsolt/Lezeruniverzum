-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 05:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `jelszo` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kNev` varchar(255) NOT NULL,
  `vNev` varchar(255) NOT NULL,
  `szamlaVaros` varchar(255) NOT NULL,
  `szamlaIranyitoszam` int(4) NOT NULL,
  `szamlaLakcim` varchar(255) DEFAULT NULL,
  `szallitVaros` varchar(255) NOT NULL,
  `szallitIranyitoszam` int(4) NOT NULL,
  `szallitLakcim` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
('Összes termék', 1);
INSERT INTO `kategoriak` (`kategoriaNev`, `ID`) VALUES
('Család', 2);
INSERT INTO `kategoriak` (`kategoriaNev`, `ID`) VALUES
('Esküvő', 3);
INSERT INTO `kategoriak` (`kategoriaNev`, `ID`) VALUES
('Pároknak', 4);
INSERT INTO `kategoriak` (`kategoriaNev`, `ID`) VALUES
('Karácsony', 5);
INSERT INTO `kategoriak` (`kategoriaNev`, `ID`) VALUES
('Kiegészítők', 6);
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
  `rendelesIdopont` date NOT NULL,
  `osszeg` double NOT NULL,
  `felhaszVnev` varchar(255) NOT NULL,
  `felhaszKnev` varchar(255) NOT NULL,
  `felhaszNev` varchar(255) NOT NULL,
  `felhaszEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `termekek`
--

CREATE TABLE `termekek` (
  `ID` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `leiras` varchar(255) NOT NULL,
  `ar` double NOT NULL, -- szükséges ez?
  `kep` varchar(255) NOT NULL,
  `kiemelt` tinyint(1) NOT NULL,
  `kategoriaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
--
-- Dumping data for table `termekek`
--
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`,`kep`,`kiemelt`,`kategoriaID`) VALUES
(1,'Otthon tábla','',4500,'assets/products/20211229_150515.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`,`kep`,`kiemelt`,`kategoriaID`) VALUES
(2,'Otthon tábla','',4500,'assets/products/20211229_150535.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`,`kep`,`kiemelt`,`kategoriaID`) VALUES
(3,'Szív alakú képkeret','',4000,'assets/products/20211229_150556.jpg',1,4);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`,`kep`,`kiemelt`,`kategoriaID`) VALUES
(4,'Fa rózsa','',4000,'assets/products/20211229_150614.jpg',1,4);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(5,'Tolltartó','',5000,'assets/products/20211229_150626.jpg',0,6);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(6,'Tolltartó','',5000,'assets/products/20211229_150703.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(7,'Alátét','',750,'assets/products/20211229_151402.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(8,'Kulcstartó','',2000,'assets/products/20211229_151521.jpg',0,4);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(9,'Kulcstartó','',2000,'assets/products/20211229_151547.jpg',0,4);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(10,'Kulcstartó','',2000,'assets/products/20211229_151600.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(11,'Kulcstartó','',2000,'assets/products/20211229_151613.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(12,'Fa formájú képkeret','',20000,'assets/products/20211229_152905.jpg',1,3);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(13,'Teatartó','',10000,'assets/products/20211229_153038.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(14,'Üdvözlőlap','',10000,'assets/products/20211229_153113.jpg',0,5);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(15,'Üdvözlőlap','',10000,'assets/products/20211229_153116.jpg',0,5);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(16,'Adventi kalendárium','',5000,'assets/products/20211229_153316.jpg',0,5);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(17,'Lámpás','',5000,'assets/products/20211229_153351.jpg',0,2);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kosar`
--
ALTER TABLE `kosar`
  ADD KEY `felhaszID` (`felhaszID`);

--
-- Indexes for table `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `felhaszID` (`felhaszID`);

--
-- Indexes for table `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `kategoriaID` (`kategoriaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rendelesek`
--
ALTER TABLE `rendelesek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `rendelesek_ibfk_1` FOREIGN KEY (`felhaszId`) REFERENCES `felhasznalok` (`ID`);

--
-- Constraints for table `termekek`
--
ALTER TABLE `termekek`
  ADD CONSTRAINT `termekek_ibfk_1` FOREIGN KEY (`kategoriaId`) REFERENCES `kategoriak` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
