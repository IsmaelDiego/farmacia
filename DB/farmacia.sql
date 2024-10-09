-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-01-2024 a las 02:38:51
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
-- Base de datos: `farmacia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `det_cantidad` int(11) NOT NULL,
  `det_venta` int(11) NOT NULL,
  `det_vencimiento` date NOT NULL,
  `id_det_lote` int(11) NOT NULL,
  `id_det_producto` int(11) NOT NULL,
  `id_det_prov` int(11) NOT NULL,
  `id_det_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id_laboratorio` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `avatar_lab` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`id_laboratorio`, `nombre`, `avatar_lab`) VALUES
(1, 'Sizma', 'lab-default.png'),
(2, 'Sizma2', 'lab-default.png'),
(3, 'Sizma3', 'lab-default.png'),
(4, 'peryu', 'lab-default.png'),
(5, ',{consulta,funcion},(response)=>', 'lab-default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id_lote` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `vencimineto` date NOT NULL,
  `lote_id_prod` int(11) NOT NULL,
  `lote_id_prov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `id_presentacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `concentracion` varchar(250) DEFAULT NULL,
  `adicional` varchar(250) DEFAULT NULL,
  `precio` float NOT NULL,
  `prod_lab` int(11) NOT NULL,
  `prod_tipo` int(11) NOT NULL,
  `prod_pre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_us`
--

CREATE TABLE `tipo_us` (
  `id_tipo_us` int(11) NOT NULL,
  `nombre_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_us`
--

INSERT INTO `tipo_us` (`id_tipo_us`, `nombre_tipo`) VALUES
(1, 'Administrador'),
(2, 'Técnico'),
(3, 'Root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_us` varchar(50) NOT NULL,
  `apellido_us` varchar(50) NOT NULL,
  `dni_us` varchar(8) NOT NULL,
  `edad_us` date DEFAULT NULL,
  `contrasena_us` varchar(255) NOT NULL,
  `telefono_us` varchar(9) DEFAULT NULL,
  `residencia_us` varchar(60) DEFAULT NULL,
  `correo_us` varchar(60) DEFAULT NULL,
  `sexo_us` varchar(20) DEFAULT NULL,
  `adicional_us` varchar(250) DEFAULT NULL,
  `avatar_us` varchar(255) DEFAULT NULL,
  `us_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_us`, `apellido_us`, `dni_us`, `edad_us`, `contrasena_us`, `telefono_us`, `residencia_us`, `correo_us`, `sexo_us`, `adicional_us`, `avatar_us`, `us_tipo`) VALUES
(2, 'Ismael Diego', 'Quispe Mendoza', '75692933', '2003-08-12', 'root', '985632587', 'Jr. mi casa', 'diegoismaelquispemendioza@outlook.com', 'Masculino', 'Ingeniero d', '6594b88905c32-Captura de pantalla 2023-10-11 152238.png', 3),
(3, 'Jordi Kevin', 'Reymundo Mendoza', '75698412', '2015-12-23', 'admin', '985642153', 'Jr. su casa', 'jordyreymundomendoza@gamil.com', 'Masculino', 'Estudiante 1', '65982b2037403-Captura de pantalla 2023-04-28 184311.png', 1),
(4, 'Joel ', 'Ceras Mendoza', '78952145', '1997-11-20', 'joel', '985654789', 'Jr. Su casa8', 'joelcerasmendoza20@gmail.com', 'Masculino', 'Ingeniero Civil', '6594b8daa0aa0-Captura de pantalla 2023-10-07 202459.png', 1),
(5, 'Ana Maria', 'Mendoza Rupay', '65869532', '1986-08-21', 'anamaria', '985652321', 'Jr. Su casa jejejejjejjee', 'anamariamendozarupay@gmail.com', 'Femenino', 'Madre de familia', '6594b6fdc5c31-js.png', 1),
(6, 'Joan Niki', 'Reymundo Mendoza', '78965421', '2016-12-14', 'adminjoan', '985623214', 'Jr. Su casa', 'joannikireymundomendoza@gmail.com', 'Masculino', 'Estudiante', '6594b7fb59062-Captura de pantalla 2023-10-07 173156.png', 1),
(7, '354', '38345', '3453453', '2016-02-26', '45343', NULL, NULL, NULL, NULL, NULL, 'default.png', 2),
(8, '46348483', '43483483', '483483', '2024-01-09', '48348343', NULL, NULL, NULL, NULL, NULL, 'default.png', 2),
(9, '786786767', '786786', '77867', '2024-01-11', '87678676', NULL, NULL, NULL, NULL, NULL, 'default.png', 2),
(10, '48334', '345345', '45343', '2024-03-06', '345345', NULL, NULL, NULL, NULL, NULL, 'default.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `dni` int(11) NOT NULL,
  `total` float NOT NULL,
  `vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_producto`
--

CREATE TABLE `venta_producto` (
  `id_ventaproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `producto_id_producto` int(11) NOT NULL,
  `venta_id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`det_cantidad`),
  ADD KEY `id_det_venta` (`id_det_venta`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id_laboratorio`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id_lote`),
  ADD KEY `lote_id_prod` (`lote_id_prod`,`lote_id_prov`),
  ADD KEY `lote_id_prov` (`lote_id_prov`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`id_presentacion`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `prod_lab` (`prod_lab`,`prod_tipo`,`prod_pre`),
  ADD KEY `prod_tipo` (`prod_tipo`),
  ADD KEY `prod_pre` (`prod_pre`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tipo_us`
--
ALTER TABLE `tipo_us`
  ADD PRIMARY KEY (`id_tipo_us`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `us_tipo` (`us_tipo`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `vendedor` (`vendedor`);

--
-- Indices de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD PRIMARY KEY (`id_ventaproducto`),
  ADD KEY `producto_id_producto` (`producto_id_producto`,`venta_id_venta`),
  ADD KEY `venta_id_venta` (`venta_id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `det_cantidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id_laboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id_lote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id_presentacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_us`
--
ALTER TABLE `tipo_us`
  MODIFY `id_tipo_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  MODIFY `id_ventaproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_det_venta`) REFERENCES `venta` (`id_venta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`lote_id_prod`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lote_ibfk_2` FOREIGN KEY (`lote_id_prov`) REFERENCES `proveedor` (`id_proveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`prod_lab`) REFERENCES `laboratorio` (`id_laboratorio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`prod_tipo`) REFERENCES `tipo_producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`prod_pre`) REFERENCES `presentacion` (`id_presentacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`us_tipo`) REFERENCES `tipo_us` (`id_tipo_us`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD CONSTRAINT `venta_producto_ibfk_1` FOREIGN KEY (`producto_id_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_producto_ibfk_2` FOREIGN KEY (`venta_id_venta`) REFERENCES `venta` (`id_venta`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
