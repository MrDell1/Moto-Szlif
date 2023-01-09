-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Sty 2023, 21:15
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `m-s`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customer`
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

--
-- Zrzut danych tabeli `customer`
--

INSERT INTO `customer` (`Id_Usr`, `Fname`, `Lname`, `Email`, `Number`, `Country`, `State`, `City`, `Adress`, `Code`, `Company`, `NIP`, `Date`) VALUES
(1, 'Marysia', 'Kaczka', 'mail@gmail.com', '667967907', 'Polska', 'łódzkie', 'Łódź', 'Niezapominajki 37', '91-358', '', '', '2022-11-07 22:04:17'),
(20, 'Marcin', 'Kaczka', 'leszczu63@gmail.com', '23', 'Polska', 'świętokrzyskie', 'Łódź', '0x17ff', '91-358', 'xd', '5416', '2023-01-08 22:05:39'),
(21, 'Marcin', 'Kaczka', 'leszczu63@gmail.com', '23', 'Polska', 'dolnośląskie', 'Łódź', '0x17ff', '91-358', 'xd', '5416', '2023-01-08 22:07:05'),
(22, 'Marcin', 'Kaczka', 'leszczu63@gmail.com', '23', 'Polska', 'łódzkie', 'Łódź', '0x17ff', '91-358', 'xd', '5416', '2023-01-09 17:25:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `head_data`
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

--
-- Zrzut danych tabeli `head_data`
--

INSERT INTO `head_data` (`Id_head`, `Mark`, `Model`, `Year`, `Capacity`, `Fuel`, `Eng_num`, `Valve`, `Date`) VALUES
(10, 'Audi', 'XYZa', 2000, 2, 'Benzyna', 0, 16, '2022-11-07 22:04:17'),
(11, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 12:08:07'),
(12, 'Audi', 'XYZ', 2, 2, 'Benzyna', 0, 16, '2023-01-08 13:18:31'),
(13, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 13:23:16'),
(14, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:01:32'),
(15, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:06:20'),
(16, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:06:58'),
(17, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:26:07'),
(18, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:29:35'),
(19, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:29:53'),
(20, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:31:01'),
(21, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:43:42'),
(22, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:44:59'),
(23, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:45:11'),
(24, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:46:33'),
(25, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:46:46'),
(26, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:47:12'),
(27, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:47:41'),
(28, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:48:14'),
(29, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:48:59'),
(30, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:49:02'),
(31, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:49:26'),
(32, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:50:08'),
(33, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:50:54'),
(34, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:50:56'),
(35, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:51:34'),
(36, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:51:47'),
(37, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:51:57'),
(38, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:52:11'),
(39, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:52:18'),
(40, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:52:37'),
(41, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:52:48'),
(42, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:54:02'),
(43, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:54:40'),
(44, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:54:51'),
(45, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:55:02'),
(46, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:56:07'),
(47, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:57:19'),
(48, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:57:39'),
(49, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:58:09'),
(50, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 16:59:05'),
(51, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 22:05:39'),
(52, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-08 22:07:06'),
(53, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-09 17:25:00'),
(54, 'Audi', 'XYZ', 2, 2, 'Diseal', 3, 16, '2023-01-09 18:09:36'),
(55, 'Audi', 'XYZ', 2, 2, 'Benzyna', 3, 16, '2023-01-09 18:11:31'),
(56, 'Audi', 'XYZ', 2, 2, 'Diseal', 3, 16, '2023-01-09 18:12:15'),
(57, 'Audi', 'XYZ', 2, 2, 'Diseal', 3, 16, '2023-01-09 18:12:44'),
(58, 'Audi', 'XYZ', 2, 2, 'Diseal', 3, 16, '2023-01-09 18:25:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `Id_order` int(124) NOT NULL,
  `Id_Usr` int(124) NOT NULL,
  `Id_head` int(124) NOT NULL,
  `Name_parts` varchar(1024) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `Name_services` varchar(1024) COLLATE utf8mb4_polish_ci NOT NULL,
  `State` enum('Gotowe','W trakcie','Oczekujące','Zakończone') COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'Oczekujące',
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`Id_order`, `Id_Usr`, `Id_head`, `Name_parts`, `Name_services`, `State`, `Date`) VALUES
(56, 1, 51, '\'Zawory\'. \'Uszczelniacze\'. \'Popychacze\'', '\'Weryfikacja\'. \'Demontaż\'. \'Czyszczenie\'. \'Wymiana gniazd zaworowych\'. \'Wymiana komór wirowych\'. \'Wymiana popychaczy\'', 'Oczekujące', '2023-01-08 22:05:39'),
(57, 1, 52, '\'Zawory\'. \'Uszczelniacze\'. \'Popychacze\'', '\'Weryfikacja\'. \'Demontaż\'. \'Czyszczenie\'. \'Wymiana gniazd zaworowych\'. \'Wymiana komór wirowych\'. \'Wymiana popychaczy\'', 'Gotowe', '2023-01-08 22:07:06'),
(58, 1, 53, '\'Zawory\'. \'Uszczelniacze\'. \'Popychacze\'', '\'Demontaż\'. \'Mycie\'. \'Czyszczenie\'. \'Wymiana gniazd zaworowych\'. \'Wymiana komór wirowych\'. \'Mycie na gotowo\'. \'Wymiana popychaczy\'', 'Oczekujące', '2023-01-09 17:25:00'),
(59, 1, 54, '\'Zawory\'. \'Uszczelniacze\'. \'Popychacze\'', '\'Demontaż\'. \'Mycie\'. \'Czyszczenie\'. \'Wymiana gniazd zaworowych\'. \'Wymiana komór wirowych\'. \'Mycie na gotowo\'. \'Wymiana popychaczy\'', 'Oczekujące', '2023-01-09 18:09:36'),
(60, 1, 55, '\'Zawory\'. \'Uszczelniacze\'. \'Popychacze\'', '\'Demontaż\'. \'Mycie\'. \'Czyszczenie\'. \'Wymiana gniazd zaworowych\'. \'Wymiana komór wirowych\'. \'Mycie na gotowo\'. \'Wymiana popychaczy\'', 'Oczekujące', '2023-01-09 18:11:31'),
(61, 1, 56, '\'Zawory\'. \'Uszczelniacze\'. \'Popychacze\'', '\'Demontaż\'. \'Mycie\'. \'Czyszczenie\'. \'Wymiana gniazd zaworowych\'. \'Wymiana komór wirowych\'. \'Mycie na gotowo\'. \'Wymiana popychaczy\'', 'Oczekujące', '2023-01-09 18:12:15'),
(62, 1, 57, '\'Zawory\'. \'Uszczelniacze\'. \'Popychacze\'', '\'Demontaż\'. \'Mycie\'. \'Czyszczenie\'. \'Wymiana gniazd zaworowych\'. \'Wymiana komór wirowych\'. \'Mycie na gotowo\'. \'Wymiana popychaczy\'', 'Oczekujące', '2023-01-09 18:12:44'),
(63, 1, 58, '\'Zawory\'. \'Uszczelniacze\'. \'Popychacze\'', '\'Demontaż\'. \'Mycie\'. \'Czyszczenie\'. \'Wymiana gniazd zaworowych\'. \'Wymiana komór wirowych\'. \'Mycie na gotowo\'. \'Wymiana popychaczy\'', 'Oczekujące', '2023-01-09 18:25:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parts`
--

CREATE TABLE `parts` (
  `Id_part` int(11) NOT NULL,
  `Name` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `parts`
--

INSERT INTO `parts` (`Id_part`, `Name`) VALUES
(1, 'Zawory'),
(2, 'Uszczelniacze'),
(4, 'Popychcze'),
(6, 'Prowadnice'),
(7, 'Gniazda zaworowe'),
(9, 'Komory wirowe'),
(10, 'Simering'),
(11, 'Wałek rozrządu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `services`
--

CREATE TABLE `services` (
  `Id` int(11) NOT NULL,
  `Name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Description` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Price_8` int(11) NOT NULL,
  `Price_16` int(11) NOT NULL,
  `Parts` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `services`
--

INSERT INTO `services` (`Id`, `Name`, `Description`, `Price_8`, `Price_16`, `Parts`) VALUES
(1, 'Weryfikacja', 'Jeśli weryfikacja zostanie zaznaczona inne opcje znikną a po otrzymaniu głowicy zweryfikujemy ją pod względem usług jakie trzeba wykonać. Po zakończeniu weryfikacji otrzymasz maila z listą niezbędnych usług do prawidłowego działania głowicy wraz z kosztorysem oraz listę usług która według nas jest niezbędna do prawidłowego oraz długie urzytkowania głowicy wraz z kosztorysem.', 50, 60, '0'),
(3, 'Demontaż', 'Składanie głowicy według standardów producenta.', 10, 20, '0'),
(4, 'Mycie', 'Jest to opcja wymagana przy wszystkich usługach. Polega na zmyciu pozostałości olejów smarów itp.', 10, 15, '0'),
(5, 'Czyszczenie', 'Jest to usługa polegająca na wyczyszczeniu głowicy wewnątrz jak i na zewnątrz. Dzięki temu twoja głowica odzyska dawny blask a kanały wydechowe oraz ssące będą czyste, dzięki czemu jest mniejsze prawdopodobieństwo kolejnych usterek. ', 20, 30, '0'),
(6, 'Planowanie', 'Polega na szlifowaniu górnej powierzchni głowicy, by ta była równa i gładka.', 50, 60, '0'),
(7, 'Sprawdzenie szczelności', 'Jest to sprawdzenie szczelności kanałów wodnych głowicy pod dużym ciśnieniu oraz temperaturze. Polecane szczególnie w głowicach które są po kolicji.', 50, 60, '0'),
(8, 'Wymiana zaworów', 'Wymiana zaworów wiążę się z kosztem nowych zaworów chyba, że dostarczysz je razem z głowicą.', 20, 30, 'Zawory'),
(9, 'Wymiana prowadnic', 'Wymiana prowadnic wiążę się z kosztem nowych zaworów chyba, że dostarczysz je razem z głowicą.', 20, 30, 'Prowadnice'),
(10, 'Obróbka gniazd zaworowych', 'Polega na szlifowaniu uszkodzonego gniazda zaworowego.', 10, 15, '0'),
(11, 'Wymiana gniazd zaworowych', 'Polega na wymienieniu gniazda zaworowego na nowe. ', 15, 20, 'Gniazda zaworowe'),
(12, 'Szlif zaworów', 'Polega na oszlifowaniu stożkowej części zaworu.', 5, 10, '0'),
(13, 'Wymiana komór wirowych', 'Polega na wymienieniu komór wirowych na nowe', 10, 15, 'Komory wirowe'),
(14, 'Wymiana uszczelniaczy', 'W przypadku wymiany zaworów lub prowadnic zalecamy również wymiane uszczelniaczy ponieważ często po demontażu tracą swoje właściwości', 10, 15, 'Uszczelniacze'),
(15, 'Pełna regeneracja', 'Jest to wykonanie wszystkich usług niezbędnych do przywrócenia dawnej świetności głowicy. Po otrzymaniu głowicy przeprowadzimy pełną weryfikacje której wyniki otrzymasz meilowo lub telefonicznie w skąplikowanym przypadku.', 200, 300, '0'),
(16, 'Mycie na gotowo', 'Możliwe tylko po zaznaczeniu opcji czyszczenie, polega na umyciu głowicy specjalnymi preparatami oraz konserwacje.', 30, 40, '0'),
(19, 'Spawanie', 'W przypadku pęknięcia głowicy oferujemy spawanie, jednak nie zawsze jest to możliwe ze względów technicznych np. niedostępne miejsce. ', 80, 100, '0'),
(20, 'Wymiana simeringów', 'Polega na wymianie simeringów na nowe', 20, 30, 'Simering'),
(21, 'Wymiana popychaczy', 'Polega na wymianie popychaczy na nowe, razem z tą usługą zalecamy równie regulacje luzów zaworowych', 10, 15, 'Popychacze'),
(27, 'aaa', 'sads', 2, 4, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Email` text NOT NULL,
  `Role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`Id`, `Username`, `Password`, `Email`, `Role`) VALUES
(1, 'dziala', '$2y$09$VjraWG56q0b3d/whHjxRF.Etyz6DPcnBUKQNk6VQTzee3dLgUZPeO', 'xd', 'admin'),
(5, 'mrdell3', '$2y$09$gJJ3xeAUPQaaVkbWFVR8O.aDYb3R6pxs8T.VeG1RGGW8xp6R3ij5q', 'leszczu63@gmail.com', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id_Usr`);

--
-- Indeksy dla tabeli `head_data`
--
ALTER TABLE `head_data`
  ADD PRIMARY KEY (`Id_head`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id_order`);

--
-- Indeksy dla tabeli `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`Id_part`);

--
-- Indeksy dla tabeli `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `customer`
--
ALTER TABLE `customer`
  MODIFY `Id_Usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `head_data`
--
ALTER TABLE `head_data`
  MODIFY `Id_head` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `Id_order` int(124) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT dla tabeli `parts`
--
ALTER TABLE `parts`
  MODIFY `Id_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `services`
--
ALTER TABLE `services`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
