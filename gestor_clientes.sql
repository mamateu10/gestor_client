-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2024 a las 13:22:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_clientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `dni` char(9) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` char(9) NOT NULL,
  `poblacion` varchar(30) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dni`, `nombre`, `apellidos`, `telefono`, `poblacion`, `observaciones`) VALUES
('123456789', 'Marta', 'Mateu Muñoz', '123456789', 'Inca', 'llesta'),
('41661952M', 'Itiel', 'Rocha Aranalde', '601982699', 'Mari de la Salut', 'tonto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `abreviatura` char(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `fecha` datetime NOT NULL,
  `cliente` char(9) NOT NULL,
  `servicios` char(3) NOT NULL,
  `precio_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`abreviatura`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`fecha`),
  ADD KEY `visita_cliente` (`cliente`),
  ADD KEY `visita_servicio` (`servicios`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_cliente` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`dni`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `visita_servicio` FOREIGN KEY (`servicios`) REFERENCES `servicio` (`abreviatura`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
