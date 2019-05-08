-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 May 2019, 22:20:39
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sqa_v1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `administrator`
--

CREATE TABLE `administrator` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `administrator`
--

INSERT INTO `administrator` (`Email`, `Password`) VALUES
('administrator@gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `attachment`
--

CREATE TABLE `attachment` (
  `Id` int(11) NOT NULL,
  `Link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_manager`
--

CREATE TABLE `category_manager` (
  `user_id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Admin` varchar(50) NOT NULL,
  `Category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `category_manager`
--

INSERT INTO `category_manager` (`user_id`, `Email`, `Password`, `Name`, `Surname`, `Admin`, `Category`) VALUES
(1, 'linda.crider@gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'Linda', 'Crider', 'administrator@gau.edu.tr', 4),
(9, 'qwe@qwe.com', '7815696ecbf1c96e6894b779456d330e', 'qwe', 'q', 'administrator@gau.edu.tr', 1),
(2, 'rachel.thompson@gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'Rachel', 'Thompson', 'administrator@gau.edu.tr', 3),
(10, 'Testing@gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'Testing', 'E', 'administrator@gau.edu.tr', 4),
(3, 'vin.gasoline@gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'Vin', 'Gasoline', 'administrator@gau.edu.tr', 1),
(4, 'will.ashley@gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'Will', 'Ashley', 'administrator@gau.edu.tr', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_problem`
--

CREATE TABLE `category_problem` (
  `Id` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  `Problem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `problem`
--

CREATE TABLE `problem` (
  `Student` varchar(50) NOT NULL,
  `Date_Time` datetime NOT NULL,
  `Id` int(11) NOT NULL,
  `Body` varchar(1000) NOT NULL,
  `Attachment` int(11) DEFAULT NULL,
  `Status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `problem_category`
--

CREATE TABLE `problem_category` (
  `Id` int(11) NOT NULL,
  `Category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `problem_category`
--

INSERT INTO `problem_category` (`Id`, `Category`) VALUES
(1, 'Equipment'),
(2, 'Discipline'),
(3, 'Education'),
(4, 'Student Clubs');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reply`
--

CREATE TABLE `reply` (
  `Problem` int(11) NOT NULL,
  `Date_Time` datetime NOT NULL,
  `Id` int(11) NOT NULL,
  `Body` varchar(1000) NOT NULL,
  `Attachment` int(11) DEFAULT NULL,
  `Replier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student`
--

CREATE TABLE `student` (
  `user_id` int(58) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `student`
--

INSERT INTO `student` (`user_id`, `Email`, `Password`, `Name`, `Surname`) VALUES
(1, 'gwen.wolfe@std.gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'Gwen', 'Wolfe'),
(2, 'hot.pepper@std.gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'Hot', 'Pepper'),
(4, 'jack.lumber@std.gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'Jack', 'Lumber'),
(7, 'linda.crider@gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'qwe', 'qwq'),
(5, 'rose.wilson@std.gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'Rose', 'Wilson'),
(6, 'sandy.mctrevor@std.gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'Sandy', 'McTrevor'),
(3, 'tony.bridgers@std.gau.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', 'Tony', 'Bridgers');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`Email`);

--
-- Tablo için indeksler `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `category_manager`
--
ALTER TABLE `category_manager`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `Admin` (`Admin`),
  ADD KEY `Category` (`Category`);

--
-- Tablo için indeksler `category_problem`
--
ALTER TABLE `category_problem`
  ADD PRIMARY KEY (`Id`,`Category`,`Problem`),
  ADD KEY `Category` (`Category`),
  ADD KEY `Problem` (`Problem`);

--
-- Tablo için indeksler `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`Id`,`Student`,`Date_Time`),
  ADD KEY `Student` (`Student`),
  ADD KEY `Attachment` (`Attachment`);

--
-- Tablo için indeksler `problem_category`
--
ALTER TABLE `problem_category`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`Id`,`Problem`,`Date_Time`),
  ADD KEY `Problem` (`Problem`),
  ADD KEY `Attachment` (`Attachment`);

--
-- Tablo için indeksler `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `attachment`
--
ALTER TABLE `attachment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `category_manager`
--
ALTER TABLE `category_manager`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `category_problem`
--
ALTER TABLE `category_problem`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `problem`
--
ALTER TABLE `problem`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `problem_category`
--
ALTER TABLE `problem_category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `reply`
--
ALTER TABLE `reply`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `student`
--
ALTER TABLE `student`
  MODIFY `user_id` int(58) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `category_manager`
--
ALTER TABLE `category_manager`
  ADD CONSTRAINT `category_manager_ibfk_1` FOREIGN KEY (`Admin`) REFERENCES `administrator` (`Email`),
  ADD CONSTRAINT `category_manager_ibfk_2` FOREIGN KEY (`Category`) REFERENCES `problem_category` (`Id`);

--
-- Tablo kısıtlamaları `category_problem`
--
ALTER TABLE `category_problem`
  ADD CONSTRAINT `category_problem_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `problem_category` (`Id`),
  ADD CONSTRAINT `category_problem_ibfk_2` FOREIGN KEY (`Problem`) REFERENCES `problem` (`Id`);

--
-- Tablo kısıtlamaları `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `problem_ibfk_1` FOREIGN KEY (`Student`) REFERENCES `student` (`Email`),
  ADD CONSTRAINT `problem_ibfk_2` FOREIGN KEY (`Attachment`) REFERENCES `attachment` (`Id`);

--
-- Tablo kısıtlamaları `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`Problem`) REFERENCES `problem` (`Id`),
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`Attachment`) REFERENCES `attachment` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
