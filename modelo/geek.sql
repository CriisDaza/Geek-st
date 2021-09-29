-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2021 a las 08:53:48
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `geek`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'Cristian', 'Restrepo', 'crestrepo@geek.com', 'fbf072473ff4c740fb81fceb4d84194d'),
(2, 'Jonatan', 'Torres', 'jtorres@geek.com', '7732f401380a370d9fcb6a377cd93715');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idcarrito` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `correo`, `clave`, `direccion`, `estado`) VALUES
(11, 'Juan Manuel', 'ortiz', 'JM@geek.com', '3da770cc56ed4407b6aaf10ad4e72b4d', '123', 1),
(14, 'Cristian', 'Restrepo Daza', 'cr@gmail.com', '324d8a1d3f81e730d5099a48cee0c5b6', '...', 1),
(15, 'jonatan', 'torres', 'jt@gmail.com', 'cd4d776e159510e486116827b80d0368', '...', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domiciliario`
--

CREATE TABLE `domiciliario` (
  `iddomiciliario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correol` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `idenvio` int(11) NOT NULL,
  `domiciliario_iddomiciliario1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `total` int(10) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca`, `nombre`) VALUES
(1, 'Funko'),
(2, 'Nintendo'),
(3, 'Lego'),
(4, 'Mattel'),
(5, 'DC COMICS'),
(6, 'Hot Wheels'),
(7, 'McFARLANE TOYS'),
(8, 'PlayStation'),
(9, 'Xbox');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcarrito`
--

CREATE TABLE `pcarrito` (
  `carrito_idcarrito` int(11) NOT NULL,
  `producto_idproducto` int(11) NOT NULL,
  `cantidad` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pfactura`
--

CREATE TABLE `pfactura` (
  `factura_idfactura` int(11) NOT NULL,
  `producto_idproducto` int(11) NOT NULL,
  `unidades` int(1) NOT NULL,
  `subtotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` int(10) NOT NULL,
  `cantidad` varchar(45) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `proveedor_idproveedor` int(11) NOT NULL,
  `marca_idmarca` int(11) NOT NULL,
  `tipoproducto_idtipoproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `precio`, `cantidad`, `imagen`, `proveedor_idproveedor`, `marca_idmarca`, `tipoproducto_idtipoproducto`) VALUES
(1, 'Control Inalámbrico XBOX Series Azul', 280000, '47', NULL, 1, 9, 8),
(2, 'Control Inalámbrico XBOX Series Verde', 280000, '22', NULL, 1, 9, 8),
(3, 'Control Inalámbrico XBOX Series Blanco', 280000, '29', NULL, 1, 9, 8),
(4, 'Control PS4 DS4 Azul', 340000, '23', NULL, 1, 8, 8),
(5, 'Control Inalámbrico XBOX Series Rojo', 280000, '20', NULL, 1, 9, 8),
(6, 'Cámara PS4 V2.0', 240000, '20', NULL, 1, 8, 8),
(7, 'Timón + Pedales THRUSTMASTER Xbox One|Series ', 490000, '10', NULL, 1, 9, 8),
(8, 'Control PLAYSTATION DualShock 4 Verde Camufla', 330000, '20', NULL, 1, 8, 8),
(9, 'Amiibo  Mii Cat Mario', 80000, '20', NULL, 2, 2, 2),
(10, ' Funko POP Games Fortnite Midas', 60000, '20', NULL, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `administrador_idadministrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nombre`, `apellido`, `correo`, `clave`, `estado`, `administrador_idadministrador`) VALUES
(1, 'pedro', 'gonzales', 'pg@geek.com', 'ffa51e9c09f718426c8a6e4acbc4b2c6', 1, 1),
(2, 'pepito', 'peres', 'pp@geek.com', 'a2f197f4e36495e4ada9a2a5ba1eef6c', 1, 1),
(3, 'alberto', 'style', 'asyle@geek.com', '90b05bd7455236ab8b948da39829292b', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `idtipoproducto` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`idtipoproducto`, `nombre`) VALUES
(1, 'Consola'),
(2, 'Coleccionable'),
(3, 'Videojuego'),
(4, 'Desarmable'),
(5, 'Pïsta'),
(6, 'Llavero'),
(7, 'Mini-figura'),
(8, 'Accesorio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idcarrito`,`cliente_idcliente`),
  ADD KEY `fk_carrito_cliente1_idx` (`cliente_idcliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `domiciliario`
--
ALTER TABLE `domiciliario`
  ADD PRIMARY KEY (`iddomiciliario`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`idenvio`,`domiciliario_iddomiciliario1`),
  ADD KEY `fk_envio_domiciliario1_idx` (`domiciliario_iddomiciliario1`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfactura`,`cliente_idcliente`),
  ADD KEY `fk_factura_cliente1_idx` (`cliente_idcliente`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indices de la tabla `pcarrito`
--
ALTER TABLE `pcarrito`
  ADD PRIMARY KEY (`carrito_idcarrito`,`producto_idproducto`),
  ADD KEY `fk_pcarrito_producto1_idx` (`producto_idproducto`);

--
-- Indices de la tabla `pfactura`
--
ALTER TABLE `pfactura`
  ADD PRIMARY KEY (`factura_idfactura`,`producto_idproducto`),
  ADD KEY `fk_facturaproducto_factura1_idx` (`factura_idfactura`),
  ADD KEY `fk_facturaproducto_producto1_idx` (`producto_idproducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`,`proveedor_idproveedor`,`marca_idmarca`,`tipoproducto_idtipoproducto`),
  ADD KEY `fk_producto_marca_idx` (`marca_idmarca`),
  ADD KEY `fk_producto_tipoproducto1_idx` (`tipoproducto_idtipoproducto`),
  ADD KEY `fk_producto_proveedor1_idx` (`proveedor_idproveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`,`administrador_idadministrador`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD KEY `fk_proveedor_administrador1_idx` (`administrador_idadministrador`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`idtipoproducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idcarrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `domiciliario`
--
ALTER TABLE `domiciliario`
  MODIFY `iddomiciliario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `idenvio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  MODIFY `idtipoproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_carrito_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `envio`
--
ALTER TABLE `envio`
  ADD CONSTRAINT `fk_envio_domiciliario1` FOREIGN KEY (`domiciliario_iddomiciliario1`) REFERENCES `domiciliario` (`iddomiciliario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pcarrito`
--
ALTER TABLE `pcarrito`
  ADD CONSTRAINT `fk_pcarrito_carrito1` FOREIGN KEY (`carrito_idcarrito`) REFERENCES `carrito` (`idcarrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pcarrito_producto1` FOREIGN KEY (`producto_idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pfactura`
--
ALTER TABLE `pfactura`
  ADD CONSTRAINT `fk_facturaproducto_factura1` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_facturaproducto_producto1` FOREIGN KEY (`producto_idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_marca` FOREIGN KEY (`marca_idmarca`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_proveedor1` FOREIGN KEY (`proveedor_idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_tipoproducto1` FOREIGN KEY (`tipoproducto_idtipoproducto`) REFERENCES `tipoproducto` (`idtipoproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_proveedor_administrador1` FOREIGN KEY (`administrador_idadministrador`) REFERENCES `administrador` (`idadministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
