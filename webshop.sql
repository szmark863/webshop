-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Jan 16. 20:32
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webshop`
--
CREATE DATABASE IF NOT EXISTS `webshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `webshop`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ordered_items`
--

CREATE TABLE `ordered_items` (
  `rendel_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `termek_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `termek_name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `termek_price` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `termek_mennyiseg` int(255) NOT NULL,
  `termek_kod` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `rendel_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `item_email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `item_cim` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `item_telefon` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `item_fizetes` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `item_osszeg` int(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_conn`
--

CREATE TABLE `order_conn` (
  `id` int(255) NOT NULL,
  `rendel_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `rendelések`
-- (Lásd alább az aktuális nézetet)
--
CREATE TABLE `rendelések` (
`Rendelés ID` int(255)
,`Rendelés azonosító` varchar(255)
,`Megrendelő` varchar(255)
,`Email` varchar(255)
,`Cím` varchar(255)
,`Telefonszám` varchar(255)
,`Fizetési mód` varchar(255)
,`Rendelés teljes összege` int(255)
,`Rendelés dátuma` timestamp
,`Termék` varchar(255)
,`Termék ID` varchar(255)
,`Termékkód` varchar(255)
,`Termék ára` varchar(255)
,`Rendelt mennyiség (darabszám)` int(255)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `id` int(6) UNSIGNED NOT NULL,
  `megnevezes` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `termekkod` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `image` text COLLATE utf8_hungarian_ci NOT NULL,
  `leiras` text COLLATE utf8_hungarian_ci NOT NULL,
  `ar` int(255) UNSIGNED NOT NULL,
  `darab` int(255) UNSIGNED NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`id`, `megnevezes`, `termekkod`, `image`, `leiras`, `ar`, `darab`, `reg_date`) VALUES
(1, 'HDD 1TB', 'HDD1TBK', 'hdd.png', '1 TB 7200rpm HDD, jó minőség, megbízható márka', 15980, 7, '2021-01-16 19:25:01'),
(2, 'SSD 512GB', 'SSD512W', 'ssd.jpg', 'Gyors 512GB-os ssd írás sebesség 700MB/s, olvasás 850 MB/s', 20450, 8, '2021-01-16 19:25:01'),
(3, 'Laptop', 'LPTP01', 'laptop.png', 'Laptop böngészéshez, filmnézésre', 124990, 10, '2021-01-16 19:23:34'),
(4, 'Monitor FullHD', 'MNTR02', 'monitor.jpg', 'Felbontás: 1920x1080, képfrissítés: 75Hz, HDMI', 35670, 9, '2021-01-16 19:25:01');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Nézet szerkezete `rendelések`
--
DROP TABLE IF EXISTS `rendelések`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rendelések`  AS  select `orders`.`id` AS `Rendelés ID`,`ordered_items`.`rendel_id` AS `Rendelés azonosító`,`orders`.`item_name` AS `Megrendelő`,`orders`.`item_email` AS `Email`,`orders`.`item_cim` AS `Cím`,`orders`.`item_telefon` AS `Telefonszám`,`orders`.`item_fizetes` AS `Fizetési mód`,`orders`.`item_osszeg` AS `Rendelés teljes összege`,`orders`.`reg_date` AS `Rendelés dátuma`,`ordered_items`.`termek_name` AS `Termék`,`ordered_items`.`termek_id` AS `Termék ID`,`ordered_items`.`termek_kod` AS `Termékkód`,`ordered_items`.`termek_price` AS `Termék ára`,`ordered_items`.`termek_mennyiseg` AS `Rendelt mennyiség (darabszám)` from (`ordered_items` left join `orders` on(`orders`.`rendel_id` = `ordered_items`.`rendel_id`)) order by `orders`.`id` ;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rendel_id` (`rendel_id`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
