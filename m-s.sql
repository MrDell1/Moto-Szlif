-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 04:33 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m-s`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id_Usr` int(11) NOT NULL,
  `Fname` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Lname` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Email` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Number` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Country` text COLLATE utf8mb4_polish_ci NOT NULL,
  `State` text COLLATE utf8mb4_polish_ci NOT NULL,
  `City` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Adress` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Code` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Company` text COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `NIP` text COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `head_data`
--

CREATE TABLE `head_data` (
  `Id_head` int(11) NOT NULL,
  `Mark` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Model` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Year` int(11) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Fuel` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Eng_num` int(11) NOT NULL,
  `Valve` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id_order` int(124) NOT NULL,
  `Id_Usr` int(124) NOT NULL,
  `Id_head` int(124) NOT NULL,
  `Name_parts` varchar(1024) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Name_services` varchar(1024) COLLATE utf8mb4_polish_ci NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `Id_part` int(11) NOT NULL,
  `Name` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`Id_part`, `Name`) VALUES
(1, 'Zawory'),
(2, 'Uszczelniacze'),
(3, 'Popychacze'),
(4, 'Prowadnice'),
(5, 'Gniazda zaworowe'),
(6, 'Komory wirowe'),
(7, 'Simering'),
(8, 'Wałek rozrządu');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Id` int(11) NOT NULL,
  `Name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Description` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Price_8` int(11) NOT NULL,
  `Price_16` int(11) NOT NULL,
  `Description_full` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Id`, `Name`, `Description`, `Price_8`, `Price_16`, `Description_full`) VALUES
(1, 'Weryfikacja', 'Jeśli weryfikacja zostanie zaznaczona inne opcje znikną a po otrzymaniu głowicy zweryfikujemy ją pod względem usług jakie trzeba wykonać. Po zakończeniu weryfikacji otrzymasz maila z listą niezbędnych usług do prawidłowego działania głowicy wraz z kosztorysem oraz listę usług która według nas jest niezbędna do prawidłowego oraz długie urzytkowania głowicy wraz z kosztorysem.', 50, 60, ''),
(2, 'Demontaż', 'Jest niezbędną opcja przy wykonywaniu większości usług.', 10, 20, ''),
(3, 'Montaż', 'Składanie głowicy według standardów producenta.', 10, 20, ''),
(4, 'Mycie', 'Jest to opcja wymagana przy wszystkich usługach. Polega na zmyciu pozostałości olejów smarów itp.', 10, 15, ''),
(5, 'Czyszczenie', 'Jest to usługa polegająca na wyczyszczeniu głowicy wewnątrz jak i na zewnątrz. Dzięki temu twoja głowica odzyska dawny blask a kanały wydechowe oraz ssące będą czyste, dzięki czemu jest mniejsze prawdopodobieństwo kolejnych usterek. ', 20, 30, ''),
(6, 'Planowanie', 'Polega na szlifowaniu górnej powierzchni głowicy, by ta była równa i gładka.', 50, 60, ''),
(7, 'Sprawdzenie szczelności', 'Jest to sprawdzenie szczelności kanałów wodnych głowicy pod dużym ciśnieniu oraz temperaturze. Polecane szczególnie w głowicach które są po kolicji.', 50, 60, ''),
(8, 'Wymiana zaworów', 'Wymiana zaworów wiążę się z kosztem nowych zaworów chyba, że dostarczysz je razem z głowicą.', 20, 30, ''),
(9, 'Wymiana prowadnic', 'Wymiana prowadnic wiążę się z kosztem nowych zaworów chyba, że dostarczysz je razem z głowicą.', 20, 30, ''),
(10, 'Obróbka gniazd zaworowych', 'Polega na szlifowaniu uszkodzonego gniazda zaworowego.', 10, 15, ''),
(11, 'Wymiana gniazd zaworowych', 'Polega na wymienieniu gniazda zaworowego na nowe. ', 15, 20, ''),
(12, 'Szlif zaworów', 'Polega na oszlifowaniu stożkowej części zaworu.', 5, 10, ''),
(13, 'Wymiana komór wirowych', 'Polega na wymienieniu komór wirowych na nowe', 10, 15, ''),
(14, 'Wymiana uszczelniaczy', 'W przypadku wymiany zaworów lub prowadnic zalecamy również wymiane uszczelniaczy ponieważ często po demontażu tracą swoje właściwości', 10, 15, ''),
(15, 'Pełna regeneracja', 'Jest to wykonanie wszystkich usług niezbędnych do przywrócenia dawnej świetności głowicy. Po otrzymaniu głowicy przeprowadzimy pełną weryfikacje której wyniki otrzymasz meilowo lub telefonicznie w skąplikowanym przypadku.', 200, 300, ''),
(16, 'Mycie na gotowo', 'Możliwe tylko po zaznaczeniu opcji czyszczenie, polega na umyciu głowicy specjalnymi preparatami oraz konserwacje.', 30, 40, ''),
(17, 'Osiowanie', '', 100, 200, ''),
(18, 'Regulacja luzów zaworowych', 'Zalecane przy wymianie popychaczy, polega na dobraniu odpowiednich popychaczy do każdego zaworu według norm producenta', 80, 100, ''),
(19, 'Spawanie', 'W przypadku pęknięcia głowicy oferujemy spawanie, jednak nie zawsze jest to możliwe ze względów technicznych np. niedostępne miejsce. ', 80, 100, ''),
(20, 'Wymiana simeringów', 'Polega na wymianie simeringów na nowe', 20, 30, ''),
(21, 'Wymiana popychaczy', 'Polega na wymianie popychaczy na nowe, razem z tą usługą zalecamy równie regulacje luzów zaworowych', 10, 15, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id_Usr`);

--
-- Indexes for table `head_data`
--
ALTER TABLE `head_data`
  ADD PRIMARY KEY (`Id_head`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id_order`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`Id_part`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id_Usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `head_data`
--
ALTER TABLE `head_data`
  MODIFY `Id_head` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id_order` int(124) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
