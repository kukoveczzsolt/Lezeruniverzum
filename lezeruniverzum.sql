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
-- Table structure for table `rendelesek`
--

CREATE TABLE `rendelesek` (
  `ID` int(11) NOT NULL,
  `felhaszID` int(11) NOT NULL,
  `rendlesIdopont` date NOT NULL DEFAULT current_timestamp(),
  `osszeg` double DEFAULT NULL,
  `szamlaVaros` varchar(255) NOT NULL,
  `szamlaIranyitoszam` int(4) NOT NULL,
  `szamlaLakcim` varchar(255) DEFAULT NULL,
  `szallitVaros` varchar(255) NOT NULL,
  `szallitIranyitoszam` int(4) NOT NULL,
  `szallitLakcim` varchar(255) DEFAULT NULL,
  `szallitMod` int(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rendelesek`
--

-- --------------------------------------------------------

--
-- Table structure for table `rendeles_reszlet`
--

CREATE TABLE `rendeles_reszlet` (
  `rendelesID` int(11) NOT NULL,
  `termekID` int(11) NOT NULL,
  `darabszam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rendeles_reszlet`
--

-- --------------------------------------------------------

--
-- Table structure for table `termekek`
--

CREATE TABLE `termekek` (
  `ID` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `leiras` varchar(255) NOT NULL,
  `ar` double NOT NULL,
  `kep` varchar(255) NOT NULL,
  `kiemelt` tinyint(1) NOT NULL,
  `kategoriaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `termekek`
--
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`,`kep`,`kiemelt`,`kategoriaID`) VALUES
(1,'Otthon tábla','Tedd hangulatosabbá nappalidat ezzel a teljes mértékben fából készült, pácolt táblával.',4500,'assets/products/20211229_150515.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`,`kep`,`kiemelt`,`kategoriaID`) VALUES
(2,'Otthon tábla','Tedd hangulatosabbá nappalidat ezzel a teljes mértékben fából készült, pácolt táblával.',4500,'assets/products/20211229_150535.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`,`kep`,`kiemelt`,`kategoriaID`) VALUES
(3,'Szív alakú képkeret','Lepd meg Szerelmedet ezzel a teljes mértékben fából készült fényképtartóval.',4000,'assets/products/20211229_150556.jpg',1,4);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`,`kep`,`kiemelt`,`kategoriaID`) VALUES
(4,'Fa rózsa','Lepd meg Szerelmedet ezzel a teljes mértékben fából készült rózsával.',4000,'assets/products/20211229_150614.jpg',1,4);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(5,'Tolltartó','Lepd meg gyermekedet ezzel a teljes mértékben fából készült rózsával.',5000,'assets/products/20211229_150626.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(6,'Tolltartó','Lepd meg gyermekedet ezzel a teljes mértékben fából készült rózsával.',5000,'assets/products/20211229_150703.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(7,'Alátét','Lepd meg szerettedet ezzel a teljes mértékben fából készült, életfa mintájú poháralátéttel.',750,'assets/products/20211229_151402.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(8,'Kulcstartó','Lepd meg Szerelmedet ezzel a fából készült kulcstartóval.',2000,'assets/products/20211229_151521.jpg',0,4);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(9,'Kulcstartó','Lepd meg Szerelmedet ezzel a fából készült kulcstartóval.',2000,'assets/products/20211229_151547.jpg',0,4);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(10,'Kulcstartó','Lepd meg Szerelmedet ezzel a fából készült kulcstartóval.',2000,'assets/products/20211229_151600.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(11,'Kulcstartó','Lepd meg Szerelmedet ezzel a fából készült kulcstartóval.',2000,'assets/products/20211229_151613.jpg',0,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(12,'Fa formájú képkeret','Lepd meg Szerelmedet ezzel a teljes mértékben fából készült fényképtartóval.',20000,'assets/products/20211229_152905.jpg',1,3);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(13,'Teatartó','Lepd meg szerettedet ezzel a teljes mértékben fából készült teatartóval.',10000,'assets/products/20211229_153038.jpg',1,2);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(14,'Üdvözlőlap','Lepd meg szeretteidet ezzel a teljes mértékben fából készült karácsonyi üdvözlőlappal.',10000,'assets/products/20211229_153113.jpg',0,5);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(15,'Üdvözlőlap','Lepd meg szeretteidet ezzel a teljes mértékben fából készült karácsonyi üdvözlőlappal.',10000,'assets/products/20211229_153116.jpg',0,5);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(16,'Adventi kalendárium','Lepd meg gyermekedet ezzel a teljes mértékben fából készült adventi kalendáriummal.',5000,'assets/products/20211229_153316.jpg',0,5);
INSERT INTO `termekek` (`ID`,`nev`,`leiras`,`ar`, `kep`,`kiemelt`,`kategoriaID`) VALUES
(17,'Lámpás','Tedd hangulatosabbá hálószobádat ezzel a fából készült lámpással.',5000,'assets/products/20211229_153351.jpg',0,2);
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
-- AUTO_INCREMENT for table `termekek`
--
ALTER TABLE `termekek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
