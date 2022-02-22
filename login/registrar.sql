-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307:3307
-- Tiempo de generación: 13-10-2021 a las 23:35:31
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registrar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `username`, `password`) VALUES
(12, 'ale', '51eac6b471a284d3341d8c0c63d0f1a286262a18'),
(13, 'test11', '100c4e57374fc998e57164d4c0453bd3a4876a58'),
(14, 'NaniVerde', '132728ac2e47b0dffb8da0a07f1a23a994198f97'),
(15, 'jnamoblamientosrosario', 'ff764c396faf21762df385668bbad33c3e6f71f3'),
(16, '1234', '1234'),
(17, 'naniCraft4', '06644692603f80eda60a1763c4e76a484171c798'),
(18, 'katy', 'ec138f2b3fa55cd7ce41231cbbacf3bd6377c432');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `numero` int(5) NOT NULL,
  `descripcion` varchar(19) NOT NULL,
  `Precio` double NOT NULL,
  `CantidadEnStock` int(5) NOT NULL,
  `NroProveedor` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`numero`, `descripcion`, `Precio`, `CantidadEnStock`, `NroProveedor`) VALUES
(2, 'Escritorio Juvenil', 150, 10, 1002),
(3, 'Cómoda de pino', 80, 20, 1003),
(4, 'cabecera de cama', 210, 2, 1004),
(5, 'cuna bebé', 110, 10, 1001),
(6, 'ser de 4 sillas de ', 450, 6, 1002),
(1, 'Mesa de Roble', 450, 20, 1001),
(7, 'Estanteria de pino', 50, 50, 1002),
(8, 'Estante flotante', 15, 1500, 1005),
(9, 'reloj', 18, 2000, 1005),
(10, 'armario ', 500, 3000, 1001),
(11, 'antena', 10, 2500, 1006),
(13, 'planta', 10, 50, 1007);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
