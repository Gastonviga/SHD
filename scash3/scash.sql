-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 14:30:55
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scash`
--
	CREATE DATABASE scash;
	USE scash;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
CREATE TABLE `administrador` (
  `DNI` int(8) NOT NULL,
  `NombreYApellido` varchar(20) NOT NULL,
  `Puesto` varchar(15) NOT NULL,
  `Usuario` varchar(15) NOT NULL,
  `Contra` varchar(450) NOT NULL,
  `Numero` bigint(25) NOT NULL,
  `apikey` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`DNI`, `NombreYApellido`, `Puesto`, `Usuario`, `Contra`, `Numero`, `apikey`) VALUES
(111111, 'Pepe', 'Profesor', 'asd', 'asd', 0, 0),
(46117940, 'mau', 'pepe', '123', '123', 5491134103601, 1013185);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `DNI` int(8) NOT NULL,
  `NombreYApellido` varchar(40) NOT NULL,
  `IDCurso` int(11) NOT NULL,
  `DatoHuella` int(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`DNI`, `NombreYApellido`, `IDCurso`, `DatoHuella`) VALUES
(46117940, 'Mauricio Santillan', 123, 723),
(46117941, 'Mauricio Santillano', 62, 123),
(46117942, 'Mauricio Santillana', 63, 123),
(46117943, 'Mauricio Santillane', 64, 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `IdCurso` int(5) NOT NULL,
  `AñoYDivision` varchar(22) NOT NULL,
  `Turno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`IdCurso`, `AñoYDivision`, `Turno`) VALUES
(61, 'sexto primera', 'tarde'),
(62, 'sexto segunda', 'mañana'),
(63, 'sexto tercera', 'tarde'),
(64, 'sexto cuarta', 'mañana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroasistencia`
--

CREATE TABLE `registroasistencia` (
  `Fecha` date NOT NULL,
  `HoraEntrada` time(6) NOT NULL,
  `HoraSalida` time(6) NOT NULL,
  `DNI` int(8) NOT NULL,
  `DiaClase` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registroasistencia`
--

INSERT INTO `registroasistencia` (`Fecha`, `HoraEntrada`, `HoraSalida`, `DNI`, `DiaClase`) VALUES
('2023-11-06', '00:00:00.000000', '00:00:00.000000', 46117940, 1),
('2023-11-07', '00:00:00.000000', '00:00:00.000000', 46117940, 1),
('2023-11-08', '00:00:00.000000', '00:00:00.000000', 46117940, 1),
('2023-11-09', '07:45:00.000000', '12:10:00.000000', 46117940, 1),
('2023-11-10', '07:45:00.000000', '12:10:00.000000', 46117940, 1),
('2023-11-11', '00:00:00.000000', '00:00:00.000000', 46117940, 0),
('2023-11-12', '00:00:00.000000', '00:00:00.000000', 46117940, 0),
('2023-11-13', '07:45:00.000000', '12:10:00.000000', 46117940, 1),
('2023-11-06', '07:45:00.000000', '12:10:00.000000', 46117941, 1),
('2023-11-07', '07:45:00.000000', '12:10:00.000000', 46117941, 1),
('2023-11-08', '07:45:00.000000', '12:10:00.000000', 46117941, 1),
('2023-11-09', '07:45:00.000000', '12:10:00.000000', 46117941, 1),
('2023-11-10', '07:45:00.000000', '12:10:00.000000', 46117941, 1),
('2023-11-11', '00:00:00.000000', '00:00:00.000000', 46117941, 0),
('2023-11-12', '00:00:00.000000', '00:00:00.000000', 46117941, 0),
('2023-11-13', '07:45:00.000000', '12:10:00.000000', 46117941, 1),
('2023-11-06', '07:45:00.000000', '12:10:00.000000', 46117942, 1),
('2023-11-07', '07:45:00.000000', '12:10:00.000000', 46117942, 1),
('2023-11-08', '07:45:00.000000', '12:10:00.000000', 46117942, 1),
('2023-11-09', '07:45:00.000000', '12:10:00.000000', 46117942, 1),
('2023-11-10', '07:45:00.000000', '12:10:00.000000', 46117942, 1),
('2023-11-11', '00:00:00.000000', '00:00:00.000000', 46117942, 0),
('2023-11-12', '00:00:00.000000', '00:00:00.000000', 46117942, 0),
('2023-11-13', '07:45:00.000000', '12:10:00.000000', 46117942, 1),
('2023-11-06', '07:45:00.000000', '12:10:00.000000', 46117943, 1),
('2023-11-07', '07:45:00.000000', '12:10:00.000000', 46117943, 1),
('2023-11-08', '07:45:00.000000', '12:10:00.000000', 46117943, 1),
('2023-11-09', '07:45:00.000000', '12:10:00.000000', 46117943, 1),
('2023-11-10', '07:45:00.000000', '12:10:00.000000', 46117943, 1),
('2023-11-11', '00:00:00.000000', '00:00:00.000000', 46117943, 0),
('2023-11-12', '00:00:00.000000', '00:00:00.000000', 46117943, 0),
('2023-11-13', '07:45:00.000000', '12:10:00.000000', 46117943, 1),
('2023-12-15', '01:21:41.000000', '01:36:19.000000', 46117940, 1),
('2023-12-17', '19:11:21.000000', '19:12:02.000000', 46117940, 0),
('2023-12-20', '07:58:37.000000', '00:00:00.000000', 46117940, 1),
('2023-12-20', '09:54:36.000000', '00:00:00.000000', 111, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`IdCurso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
