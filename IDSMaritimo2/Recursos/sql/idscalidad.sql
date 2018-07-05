-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2018 a las 07:05:52
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `idscalidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `razonsocial` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasocinco`
--

CREATE TABLE `pasocinco` (
  `REF` int(11) NOT NULL,
  `UNO` int(11) NOT NULL,
  `IUNO` text NOT NULL,
  `DOS` int(11) NOT NULL,
  `IDOS` text NOT NULL,
  `TRES` int(11) NOT NULL,
  `ITRES` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasocuatro`
--

CREATE TABLE `pasocuatro` (
  `REF` int(11) NOT NULL,
  `FECUNO` int(11) NOT NULL,
  `INIUNO` text NOT NULL,
  `FECDOS` int(11) NOT NULL,
  `INIDOS` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasodiez`
--

CREATE TABLE `pasodiez` (
  `REF` int(11) NOT NULL,
  `UNO` int(11) NOT NULL,
  `IUNO` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasodos`
--

CREATE TABLE `pasodos` (
  `REF` int(11) NOT NULL,
  `FEC` int(11) NOT NULL,
  `INICIAL` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasonueve`
--

CREATE TABLE `pasonueve` (
  `REF` int(11) NOT NULL,
  `UNO` int(11) NOT NULL,
  `IUNO` text NOT NULL,
  `DOS` int(11) NOT NULL,
  `IDOS` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasoocho`
--

CREATE TABLE `pasoocho` (
  `REF` int(11) NOT NULL,
  `UNO` int(11) NOT NULL,
  `IUNO` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasoonce`
--

CREATE TABLE `pasoonce` (
  `REF` int(11) NOT NULL,
  `UNO` int(11) NOT NULL,
  `IUNO` text NOT NULL,
  `DOS` int(11) NOT NULL,
  `IDOS` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasoseis`
--

CREATE TABLE `pasoseis` (
  `REF` int(11) NOT NULL,
  `UNO` int(11) NOT NULL,
  `IUNO` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasosiete`
--

CREATE TABLE `pasosiete` (
  `REF` int(11) NOT NULL,
  `UNO` int(11) NOT NULL,
  `IUNO` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasotres`
--

CREATE TABLE `pasotres` (
  `REF` int(11) NOT NULL,
  `FECUNO` int(11) NOT NULL,
  `INIUNO` text NOT NULL,
  `FECDOS` int(11) NOT NULL,
  `INIDOS` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasouno`
--

CREATE TABLE `pasouno` (
  `REF` int(11) NOT NULL,
  `FECUNO` int(11) NOT NULL,
  `INIUNO` text NOT NULL,
  `FECDOS` int(11) NOT NULL,
  `INIDOS` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias`
--

CREATE TABLE `referencias` (
  `REF` int(11) NOT NULL,
  `CLIENTE` text NOT NULL,
  `NREF` text NOT NULL,
  `EMBARQUE` text NOT NULL,
  `PEDIMENTO` text NOT NULL,
  `SUBDIVISIONES` text NOT NULL,
  `FECNUM` int(11) NOT NULL,
  `HORA` time NOT NULL,
  `PASO` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pasocuatro`
--
ALTER TABLE `pasocuatro`
  ADD PRIMARY KEY (`REF`);

--
-- Indices de la tabla `pasonueve`
--
ALTER TABLE `pasonueve`
  ADD PRIMARY KEY (`REF`);

--
-- Indices de la tabla `pasoocho`
--
ALTER TABLE `pasoocho`
  ADD PRIMARY KEY (`REF`);

--
-- Indices de la tabla `pasoonce`
--
ALTER TABLE `pasoonce`
  ADD PRIMARY KEY (`REF`);

--
-- Indices de la tabla `pasosiete`
--
ALTER TABLE `pasosiete`
  ADD PRIMARY KEY (`REF`);

--
-- Indices de la tabla `pasouno`
--
ALTER TABLE `pasouno`
  ADD PRIMARY KEY (`REF`);

--
-- Indices de la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`REF`),
  ADD UNIQUE KEY `REF` (`REF`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
