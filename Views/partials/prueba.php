-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2016 a las 12:30:11
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12
 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
 
 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
 
--
-- Base de datos: `test_shop`
--
 
-- --------------------------------------------------------
 
--
-- Estructura de tabla para la tabla `cart_items`
--
 
CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 
-- --------------------------------------------------------
 
--
-- Estructura de tabla para la tabla `products`
--
 
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='productos';
 
--
-- Volcado de datos para la tabla `products`
--
 
INSERT INTO `products` (`id`, `name`, `description`, `price`, `created`, `modified`) VALUES
(1, 'Monitor LED 22 PLG S22F350FHU', 'Prueba de descripcion', 199, '2015-03-18 18:05:15', '2016-09-03 16:05:15'),
(2, 'Monitor LED Curvo 24 PLG C24F390FHU', '<ul><li><span style="font-size: 1em;">Printed</span></li><li><span style="font-size: 1em;">100% Silk</span></li><li><span style="font-size: 1em;">Dry Clean Only</span></li><li><span style="font-size: 1em;">Unlined</span></li><li><span style="font-size: 1em;">3.5" inseam</span></li><li><span style="font-size: 1em;">Model is 5''10"&nbsp;</span></li><li><span style="font-size: 1em;">Wearing a size Small</span></li></ul>', 229, '2016-03-18 23:42:04', '2016-03-18 21:42:04'),
(3, 'Monitor LED Curvo 32PLG C32F391FWU', '<ol><li><span style="font-size: 1em;">Brand: Abercrombie &amp; Fitch</span></li><li><span style="font-size: 1em;">Muscle fit</span></li><li><span style="font-size: 1em;">Composition:100% cotton,exclusive of decoration</span></li><li><span style="font-size: 1em;">Made in Vietnam.</span></li></ol>', 100, '2016-03-18 23:59:07', '2016-03-18 21:59:07'),
(4, 'Galaxy S7', 'Hemos realizado progresos importantes, superando barreras y avanzando en todo momento, escuchando los que nos tienes que decir y combinando función y forma. Hemos introducido funciones nunca vistas hasta ahora en los smartphones. ', 599, '2016-03-19 00:04:03', '2016-03-18 22:04:03'),
(5, 'Rat&oacute;n inal&aacute;mbrico l&aacute;ser Lenovo', '', 30, '2016-03-19 00:08:03', '2016-03-18 22:08:03'),
(6, 'Auriculares para juegos Lenovo Y: ROW', '', 45, '2016-03-19 09:02:16', '2016-03-19 07:02:16'),
(7, 'Altavoz Bluetooth ThinkPad Stack\r\nModelo:  4XD0H34183', '', 102, '2016-03-04 09:06:53', '2016-03-19 07:06:53'),
(8, 'ThinkStation NVIDIA Quadro K1200 (LP)', '', 399, '2016-03-19 09:18:06', '2016-03-19 07:18:06'),
(9, 'Teclado USB Lenovo ', '', 37, '2016-03-19 15:38:09', '2016-03-19 13:38:09'),
(10, 'Mouse inal&aacute;mbrico ThinkPad Precision - rojo onda de calor', '', 50, '2016-03-19 15:44:02', '2016-03-19 13:44:02');
 
--
-- Índices para tablas volcadas
--
 
--
-- Indices de la tabla `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);
 
--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
 
--
-- AUTO_INCREMENT de las tablas volcadas
--
 
--
-- AUTO_INCREMENT de la tabla `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;