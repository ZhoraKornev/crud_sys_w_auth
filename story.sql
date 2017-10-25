-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 23 2017 г., 10:58
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
-- Структура таблицы `story`
--

CREATE TABLE `story` (
  `id` int(10) NOT NULL COMMENT 'уникальный номер записи - берется из БД.',
  `id_item` int(10) NOT NULL,
  `owner` varchar(40) NOT NULL DEFAULT 'Старт журнала' COMMENT 'где установлен картридж или кому он принадлежит по инвентарной базе',
  `weight_before` int(10) NOT NULL COMMENT 'вес до отправки в сервисный центр',
  `weight_after` int(10) NOT NULL COMMENT 'вес после заправки 	',
  `date_outcome` date NOT NULL COMMENT 'когда был отправлен в сервисный центр 	',
  `date_income` date NOT NULL COMMENT 'когда был получен из сервисного центра 		',
  `servicename` varchar(50) NOT NULL DEFAULT 'Старт журнала' COMMENT 'сервисный центр производивший ремонт/заправку/восстановление',
  `technical_life` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'техническое сотояние картриджа в работе или выведен из работы',
  `log` text NOT NULL COMMENT '- содержит краткую историю основных изменений: а именно пишет только ключи и информацию которая в этих ключах менялась',
  `log_full` text NOT NULL COMMENT 'При каждом редактировании и смене данных пишет все данные до редактирования с данными которые получились после редактирования.',
  `date_of_changes` date NOT NULL COMMENT 'Дата внесения изменений'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `story`
--
ALTER TABLE `story`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'уникальный номер записи - берется из БД.';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
