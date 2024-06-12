-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Haz 2024, 14:14:28
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `codetest`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `address`
--

CREATE TABLE `address` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `address`
--

INSERT INTO `address` (`Id`, `UserId`, `Content`, `create_at`, `update_at`, `Status`) VALUES
(1, 10, 'selamidere', '2024-06-12 10:13:35', '2024-06-12 10:13:35', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `Product` varchar(255) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Cost` float(9,2) NOT NULL DEFAULT 0.00,
  `Note` text DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`Id`, `Product`, `UserId`, `Cost`, `Note`, `create_at`, `update_at`, `Status`) VALUES
(1, 'python_development', 7, 100.00, 'selamiiiyeeeeee', '2024-06-12 11:17:48', '2024-06-12 11:17:48', '1'),
(2, 'freelance', 10, 100.00, 'selmiye', '2024-06-12 11:20:29', '2024-06-12 11:20:29', '1'),
(3, 'php_development', 5, 100.00, 'kadir name', '2024-06-12 11:21:54', '2024-06-12 11:21:54', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Age` int(11) NOT NULL DEFAULT 0,
  `Job` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`Id`, `Name`, `Mail`, `Password`, `Age`, `Job`, `create_at`, `update_at`, `Status`) VALUES
(3, 'Recep Özmen', 'Recepozmen_67@hotmail.com', '12345678', 0, NULL, '2024-06-12 02:06:08', '2024-06-12 02:06:08', '1'),
(5, 'Kadir name', 'kadircebi@hotmail.com', '12345678', 27, 'php_developer', '2024-06-12 09:23:29', '2024-06-12 09:23:29', '1'),
(6, 'Recep özmen', 'Recepozmen_67@hotmail.com', 'Query123', 25, 'php_developer', '2024-06-12 09:31:37', '2024-06-12 09:31:37', '1'),
(7, 'kadir', 'kadircbi@hotmail.com', 'Query123', 28, 'frontend_developer', '2024-06-12 09:33:28', '2024-06-12 09:33:28', '1'),
(8, 'selami', 'hakanhrdgn@gmail.com', '123456', 23, 'frontend_developer', '2024-06-12 09:43:14', '2024-06-12 09:43:14', '1'),
(9, 'selamlar', 'Recep68ozmen_67@hotmail.com', '1234567', 12, 'frontend_developer', '2024-06-12 09:45:13', '2024-06-12 09:45:13', '1'),
(10, 'serdar ünsal', 'serdarunsal@gmail.com', '1234567', 21, 'frontend_developer', '2024-06-12 10:13:35', '2024-06-12 10:13:35', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `address`
--
ALTER TABLE `address`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
