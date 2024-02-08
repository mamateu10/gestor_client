-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2024 a las 20:13:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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
  `nombre_cliente` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` char(9) NOT NULL,
  `poblacion` varchar(30) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dni`, `nombre_cliente`, `apellidos`, `telefono`, `poblacion`, `observaciones`) VALUES
('123456789', 'Marta', 'Mateu Muñoz', '123456789', 'Inca', ''),
('41661952M', 'Itiel', 'Rocha Aranalde', '601982699', 'Maria de la Salut', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `nombre_servicio` varchar(20) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`nombre_servicio`, `precio`) VALUES
('primero', 87.50),
('segundo', 78.90),
('tercero', 45.90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `fecha` datetime NOT NULL,
  `dni` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`fecha`, `dni`) VALUES
('2024-02-09 23:22:00', '123456789'),
('2024-02-19 20:51:00', '123456789'),
('2024-02-08 20:19:00', '41661952M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita_servicio`
--

CREATE TABLE `visita_servicio` (
  `fecha` datetime NOT NULL,
  `nombre_servicio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `visita_servicio`
--

INSERT INTO `visita_servicio` (`fecha`, `nombre_servicio`) VALUES
('2024-02-08 20:19:00', 'primero'),
('2024-02-08 20:19:00', 'segundo'),
('2024-02-09 23:22:00', 'segundo'),
('2024-02-09 23:22:00', 'tercero'),
('2024-02-19 20:51:00', 'primero'),
('2024-02-19 20:51:00', 'tercero');

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
  ADD PRIMARY KEY (`nombre_servicio`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`fecha`),
  ADD KEY `visita_cliente` (`dni`);

--
-- Indices de la tabla `visita_servicio`
--
ALTER TABLE `visita_servicio`
  ADD KEY `visita` (`fecha`),
  ADD KEY `servicio` (`nombre_servicio`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_cliente` FOREIGN KEY (`dni`) REFERENCES `cliente` (`dni`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `visita_servicio`
--
ALTER TABLE `visita_servicio`
  ADD CONSTRAINT `servicio` FOREIGN KEY (`nombre_servicio`) REFERENCES `servicio` (`nombre_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `visita` FOREIGN KEY (`fecha`) REFERENCES `visita` (`fecha`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
