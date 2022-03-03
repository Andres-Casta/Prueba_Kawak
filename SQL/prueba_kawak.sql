-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2022 a las 16:50:17
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_kawak`
--
CREATE DATABASE IF NOT EXISTS `prueba_kawak` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prueba_kawak`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `DOC_ID` int(11) NOT NULL,
  `DOC_NOMBRE` varchar(60) NOT NULL,
  `DOC_CODIGO` varchar(60) NOT NULL,
  `DOC_CONTENIDO` varchar(4000) NOT NULL,
  `DOC_ID_TIPO` int(11) NOT NULL,
  `DOC_ID_PROCESO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`DOC_ID`, `DOC_NOMBRE`, `DOC_CODIGO`, `DOC_CONTENIDO`, `DOC_ID_TIPO`, `DOC_ID_PROCESO`) VALUES
(2, 'prueba', 'REV-MEC-0', 'docuemntos de prueba', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20220303023937, 'CreateUsers', '2022-03-03 07:39:53', '2022-03-03 07:39:53', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `PRO_ID` int(11) NOT NULL,
  `PRO_NOMBRE` varchar(20) NOT NULL,
  `PRO_PREFIJO` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`PRO_ID`, `PRO_NOMBRE`, `PRO_PREFIJO`) VALUES
(1, 'Ingenieria', 'ING'),
(2, 'Licenciatura', 'LIC'),
(3, 'Mecanica', 'MEC'),
(4, 'Quimica', 'QUI'),
(5, 'Fisica', 'FIS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocs`
--

CREATE TABLE `tipodocs` (
  `TIP_ID` int(11) NOT NULL,
  `TIP_NOMBRE` varchar(60) NOT NULL,
  `TIP_PREFIJO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodocs`
--

INSERT INTO `tipodocs` (`TIP_ID`, `TIP_NOMBRE`, `TIP_PREFIJO`) VALUES
(1, 'Instructivo', 'INS'),
(2, 'Guia', 'GUI'),
(3, 'Revista', 'REV'),
(4, 'Informe', 'INF'),
(5, 'Novela', 'Nov');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`) VALUES
(1, 'kawak@outlook.com', '$2y$10$m14IpHksEdcCrdOrXxEeAO7zd5CMBMazhs/yadn6uNCjXh7TOR/Mi', '2022-03-03 02:44:12', '2022-03-03 03:00:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`DOC_ID`),
  ADD KEY `DOC_ID_TIPO` (`DOC_ID_TIPO`),
  ADD KEY `DOC_ID_PROCESO` (`DOC_ID_PROCESO`);

--
-- Indices de la tabla `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`PRO_ID`);

--
-- Indices de la tabla `tipodocs`
--
ALTER TABLE `tipodocs`
  ADD PRIMARY KEY (`TIP_ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_EMAIL` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `DOC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipodocs`
--
ALTER TABLE `tipodocs`
  MODIFY `TIP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`DOC_ID_TIPO`) REFERENCES `tipodocs` (`TIP_ID`),
  ADD CONSTRAINT `documentos_ibfk_2` FOREIGN KEY (`DOC_ID_PROCESO`) REFERENCES `procesos` (`PRO_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
