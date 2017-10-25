-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 23 2017 г., 10:54
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cartridge`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cartridgedb`
--

CREATE TABLE `cartridgedb` (
  `id` int(11) NOT NULL COMMENT 'уникальный номер элемента - берется из БД.',
  `owner` varchar(50) NOT NULL COMMENT 'где установлен картридж или кому он принадлежит по инвентарной базе',
  `brand` varchar(50) NOT NULL COMMENT 'фирма изготовитель картриджа',
  `marks` varchar(50) NOT NULL COMMENT 'марка картриджа присвоенная производителем',
  `weight_before` int(10) NOT NULL COMMENT 'вес до отправки в сервисный центр',
  `weight_after` int(10) NOT NULL COMMENT 'вес после заправки 	',
  `date_outcome` date NOT NULL COMMENT 'когда был отправлен в сервисный центр',
  `date_income` date NOT NULL COMMENT 'когда был получен из сервисного центра',
  `servicename` varchar(30) NOT NULL COMMENT 'сервисный центр производивший ремонт/заправку/восстановление',
  `comments` varchar(50) NOT NULL COMMENT 'коментарии которые объясняют ту или иную ситуацию с картриджем',
  `technical_life` tinyint(4) NOT NULL COMMENT 'техническое сотояние картриджа в работе или выведен из работы',
  `code` varchar(30) NOT NULL COMMENT 'уникальный код картриджа//инвентраный номер',
  `inservice` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'в сервисе(1) или нет(0) рассчитывается автоматически когда поле Дата прихода меньше поля Дата ухода тогда присваивается значение 1 - в сервисе.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cartridgedb`
--
ALTER TABLE `cartridgedb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cartridgedb`
--
ALTER TABLE `cartridgedb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'уникальный номер элемента - берется из БД.';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
