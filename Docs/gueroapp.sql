-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2019 a las 22:35:57
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

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
  `precio_bebidas` float DEFAULT NULL,
  `img_bebidas` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `bebidas`
--

INSERT INTO `bebidas` (`idbebidas`, `nombre_bebidas`, `precio_bebidas`, `img_bebidas`) VALUES
(1, 'Coca-Cola', 17, '../../GueroApp/img/bebidas/coca.jpg'),
(2, 'Sprite', 15, '../../GueroApp/img/bebidas/sprite.jfif'),
(3, 'Fanta', 15, '../../GueroApp/img/bebidas/fanta.jpg'),
(4, 'Manzanita', 15, '../../GueroApp/img/bebidas/manzanita.jpg'),
(5, 'Pepsi', 17, '../../GueroApp/img/bebidas/pepsi.png'),
(6, 'Zup', 15, '../../GueroApp/img/bebidas/zup.jfif'),
(7, 'Mirinda', 15, '../../GueroApp/img/bebidas/mirinda.png'),
(8, 'Agua de Jamaica', 13, '../../GueroApp/img/bebidas/aguaj.jpg'),
(9, 'Agua de Horchata', 13, '../../GueroApp/img/bebidas/aguah.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidasa`
--

CREATE TABLE `bebidasa` (
  `idbebidasA` int(11) NOT NULL,
  `nombre_bebidasA` varchar(50) DEFAULT NULL,
  `precio_bebidasA` float DEFAULT NULL,
  `img_bebidasA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bebidasa`
--

INSERT INTO `bebidasa` (`idbebidasA`, `nombre_bebidasA`, `precio_bebidasA`, `img_bebidasA`) VALUES
(1, 'Corona', 23, '../../GueroApp/img/bebidasA/corona.png'),
(2, 'Heineken', 25, '../../GueroApp/img/bebidasA/heineken.jpg'),
(3, 'Indio', 23, '../../GueroApp/img/bebidasA/indio.jpg'),
(4, 'Modelo', 25, '../../GueroApp/img/bebidasA/Modelo.jpg'),
(5, 'Pacifico', 23, '../../GueroApp/img/bebidasA/pacifico.png'),
(6, 'Victoria', 23, '../../GueroApp/img/bebidasA/victoria.jpg'),
(7, 'XX Laguer', 23, '../../GueroApp/img/bebidasA/xxlaguer.jpg');

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
(1, 'Orden de tacos', 30, '../../GueroApp/img/comidas/tacos1.jpg'),
(2, 'Torta: pierna/lomo/jamon/cubana', 25, '../../GueroApp/img/comidas/tortas.jpg'),
(3, 'Hamburguesas: pollo/res', 45, '../../GueroApp/img/comidas/Hpollo1.png'),
(4, 'Orden de enchiladas', 35, '../../GueroApp/img/comidas/enchi1.jpg'),
(5, 'Enchiladas suizas', 40, '../../GueroApp/img/comidas/suizas.jpg'),
(6, 'Burritos: adobada/asada/mixto', 45, '../../GueroApp/img/comidas/Bado1.png'),
(7, 'Chimichangas', 50, '../../GueroApp/img/comidas/chimi1.jpeg'),
(8, 'Orden sopes', 30, '../../GueroApp/img/comidas/sope1.png'),
(9, 'Espagueti alfredo', 50, '../../GueroApp/img/comidas/alfredo1.png'),
(10, 'Ensalada pollo', 50, '../../GueroApp/img/comidas/Ensapollo1.jpg'),
(11, 'Baguets de pollo', 45, '../../GueroApp/img/comidas/baguepollo1.jpg'),
(12, 'Orden quesadillas sencillas', 20, '../../GueroApp/img/comidas/quesadillaSen1.png'),
(13, 'Orden quesadillas con carne', 30, '../../GueroApp/img/comidas/queadobada1.jpg'),
(14, 'Sandwich: pollo/jamon/panela', 30, '../../GueroApp/img/comidas/Sandtradicional.jpg'),
(15, 'Chilaquiles Rojos', 39, '../../GueroApp/img/comidas/chilaquiles.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedidos` int(11) NOT NULL,
  `usuarios_idUsuario` int(11) NOT NULL,
  `comidas_idcomidas` int(11) NOT NULL,
  `bebidas_idbebidas` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedidos`, `usuarios_idUsuario`, `comidas_idcomidas`, `bebidas_idbebidas`, `fecha`) VALUES
(1, 1, 3, 1, '2019-04-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postres`
--

CREATE TABLE `postres` (
  `idpostres` int(11) NOT NULL,
  `nombre_postres` varchar(50) DEFAULT NULL,
  `precio_postres` float DEFAULT NULL,
  `img_postres` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `postres`
--

INSERT INTO `postres` (`idpostres`, `nombre_postres`, `precio_postres`, `img_postres`) VALUES
(1, 'Carlota de limón', 30, '../../GueroApp/img/postres/carlota.jpg'),
(2, 'Banana', 35, '../../GueroApp/img/postres/banana.jpg'),
(3, 'Brownie con Helado', 35, '../../GueroApp/img/postres/brownie.jpg'),
(4, 'Limón y Arandanos', 30, '../../GueroApp/img/postres/limonyarandanos.jpeg'),
(5, 'Gelatina de Mosaico', 20, '../../GueroApp/img/postres/mosaico.jpg'),
(6, 'Flan Napolitano', 35, '../../GueroApp/img/postres/napolitano.jpg'),
(7, 'Pay de Limón', 30, '../../GueroApp/img/postres/paydelimon.jfif'),
(8, 'Pay de Queso con Moras', 40, '../../GueroApp/img/postres/paydequeso.jpg');

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
(1, 'Jose', 'Rosas', NULL, 'Jos23', '1234', NULL, ''),
(2, 'Jose', 'Rosas', NULL, 'Jos23', '1234', NULL, ''),
(3, 'Urbano', 'Gonzalez', NULL, 'urbandstorm79', '12345', NULL, '013171040706'),
(4, 'Ger', 'Gonzalez', NULL, 'rocky23', '12345', NULL, '013171040706'),
(5, 'Ricardo', 'Milos', NULL, 'Broly55', '12456', NULL, '3181502654'),
(6, 'Paco', 'Chato', NULL, 'Ranchero254', '12345', NULL, '013171040776'),
(7, 'Numero5', 'Hargreves', 'sadf@455.com', 'theBoy', '12345', '1998-08-25', ''),
(8, 'Manuel', 'Rojas Machuca', 'manuel@hotmail.com', 'Machuking95', '123', '1995-10-06', '3171146880'),
(9, 'ernesto', 'cedillo', 'lamafiadelpoder@hotmail.com', 'presi', '123', '1995-12-12', '3171095381'),
(10, 'Manuel', 'Rojas Machuca', 'manuel@hotmail.com', 'admin', 'admin', '1995-10-06', '3171146880');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
