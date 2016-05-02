-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-05-2016 a las 22:56:02
-- Versión del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `arte_cristal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dh_extras`
--

CREATE TABLE IF NOT EXISTS `dh_extras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personal_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `n_day` int(11) DEFAULT NULL,
  `n_hour` int(11) DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `payment_day` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personals`
--

CREATE TABLE IF NOT EXISTS `personals` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `date_reg` date NOT NULL,
  `dni` int(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `born_date` date NOT NULL,
  `sex` int(1) NOT NULL,
  `age` int(3) NOT NULL,
  `cell_phone` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `personals`
--

INSERT INTO `personals` (`id`, `position_id`, `date_reg`, `dni`, `name`, `last_name`, `born_date`, `sex`, `age`, `cell_phone`, `phone`, `email`, `address`) VALUES
(1, 1, '2016-05-01', 18971787, 'Emanuel', 'Torres', '1996-07-01', 0, 25, '04165615973', '02464315404', 'emanueljtc@gmail.com', 'Las Palmas'),
(2, 1, '2016-05-01', 123213245, 'Pedro', 'Perez', '2016-05-01', 0, 34, '0412234567', '02164315404', 'j@h.com', 'Peralta'),
(3, 1, '0000-00-00', 19221592, 'Luis', 'Mendez', '1989-04-12', 0, 27, '04120486034', '0246000888', 'luismedezinfomatica@gmail.com', 'Pariapan Bloque 2'),
(4, 1, '0000-00-00', 123213245, 'Emelina', 'Perez', '2016-05-01', 0, 34, '0412234567', '02164315404', 'j@h.com', 'Peralta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) NOT NULL,
  `hour_worked` decimal(10,0) NOT NULL,
  `time_value` decimal(10,0) NOT NULL,
  `daily_salary` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `positions`
--

INSERT INTO `positions` (`id`, `position`, `hour_worked`, `time_value`, `daily_salary`) VALUES
(1, 'Gerente', 8, 125, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wakes`
--

CREATE TABLE IF NOT EXISTS `wakes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personal_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `dh_extra_id` int(11) NOT NULL,
  `payment_day` date NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
