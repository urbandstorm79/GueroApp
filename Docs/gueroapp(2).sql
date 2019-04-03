-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2019 a las 04:56:34
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gueroapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidas`
--

CREATE TABLE `bebidas` (
  `idbebidas` int(11) NOT NULL,
  `nombre_bebidas` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `precio_bebidas` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comidas`
--

CREATE TABLE `comidas` (
  `idcomidas` int(11) NOT NULL,
  `nombre_comidas` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `precio_comidas` float DEFAULT NULL,
  `img_comidas` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `comidas`
--

INSERT INTO `comidas` (`idcomidas`, `nombre_comidas`, `precio_comidas`, `img_comidas`) VALUES
(1, 'Orden de tacos', 30, '../../GueroApp/img/tacos1.jpg'),
(2, 'Torta de guevito', 25, '../../GueroApp/img/tortas.jpg'),
(3, 'Hamburguesas: pollo/res', 45, NULL),
(4, 'Orden de enchiladas', 35, NULL),
(5, 'Enchiladas suizas', 40, NULL),
(6, 'Burritos: adobada/asada/mixto', 45, NULL),
(7, 'Chimichangas', 50, NULL),
(8, 'Orden sopes', 30, NULL),
(9, 'Espagueti alfredo', 50, NULL),
(10, 'Ensalada pollo', 50, NULL),
(11, 'Baguets de pollo', 45, NULL),
(12, 'Orden quesadillas sencillas', 20, NULL),
(13, 'Orden quesadillas con carne', 30, NULL),
(14, 'Sandwich: pollo/jamon/panela', 30, NULL),
(15, 'Sandwich pan artesanal: pollo/jamon/panela', 39, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedidos` int(11) NOT NULL,
  `usuarios_idUsuario` int(11) NOT NULL,
  `comidas_idcomidas` int(11) NOT NULL,
  `bebidas_idbebidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombreUsuario` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `contra` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `telefono` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nombre`, `apellido`, `correo`, `nombreUsuario`, `contra`, `fecha`, `telefono`) VALUES
(1, 'Jose', 'Rosas', 'jos58@mail.com', 'Jos23', '1234', '1998-03-05', ''),
(2, 'Jose', 'Perez', NULL, 'Jos23', '1234', NULL, ''),
(3, 'Urbano', 'Gonzalez', NULL, 'urbandstorm79', '12345', NULL, '013171040706'),
(4, 'Ger', 'Gonzalez', NULL, 'rocky23', '12345', NULL, '013171040706'),
(5, 'Ricardo', 'Milos', NULL, 'Broly55', '12456', NULL, '3181502654'),
(6, 'Paco', 'Chato', NULL, 'Ranchero254', '12345', NULL, '013171040776'),
(7, 'Numero5', 'Hargreves', 'sadf@455.com', 'theBoy', '12345', '1998-08-25', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  ADD PRIMARY KEY (`idbebidas`);

--
-- Indices de la tabla `comidas`
--
ALTER TABLE `comidas`
  ADD PRIMARY KEY (`idcomidas`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedidos`),
  ADD KEY `usuarios_idUsuario` (`usuarios_idUsuario`),
  ADD KEY `comidas_idcomidas` (`comidas_idcomidas`),
  ADD KEY `bebidas_idbebidas` (`bebidas_idbebidas`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  MODIFY `idbebidas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comidas`
--
ALTER TABLE `comidas`
  MODIFY `idcomidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedidos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `Bebida` FOREIGN KEY (`bebidas_idbebidas`) REFERENCES `bebidas` (`idbebidas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Comida` FOREIGN KEY (`comidas_idcomidas`) REFERENCES `comidas` (`idcomidas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Usuario` FOREIGN KEY (`usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
