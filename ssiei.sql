-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-04-2023 a las 00:27:20
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ssiei`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

DROP TABLE IF EXISTS `activos`;
CREATE TABLE IF NOT EXISTS `activos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `codigo` varchar(25) NOT NULL,
  `serieNumero` varchar(25) NOT NULL,
  `comentario` text NOT NULL,
  `subtipo_id` int NOT NULL,
  `proveedor_id` int NOT NULL,
  `estado_id` int NOT NULL,
  `ubicacion_id` int NOT NULL,
  `modelo_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_activo_subtipo` (`subtipo_id`),
  KEY `FK_activo_proveedor` (`proveedor_id`),
  KEY `FK_activo_estado` (`estado_id`),
  KEY `FK_activo_ubicacion` (`ubicacion_id`),
  KEY `FK_activo_modelo` (`modelo_id`),
  KEY `FK_activo_responsable` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `activos`
--

INSERT INTO `activos` (`id`, `descripcion`, `fecha`, `costo`, `codigo`, `serieNumero`, `comentario`, `subtipo_id`, `proveedor_id`, `estado_id`, `ubicacion_id`, `modelo_id`, `usuario_id`) VALUES
(1, 'Monitor 20\"', '2018-11-20', '0.00', 'CDS-2011-0070', 'CNC6510MSD', 'No transferido', 1, 1, 1, 1, 1, 1),
(2, 'Monitor 25\'\'', '2019-04-20', '0.00', 'CDS-2012-0070', 'CNC6510MSD', 'Transferido', 1, 1, 1, 1, 1, 1),
(3, 'Monitor 25\'\'', '2019-04-20', '0.00', 'CDS-2012-0070', 'CNC6510MSD', 'Transferido', 1, 1, 1, 1, 1, 1),
(4, 'Monitor 25\'\'', '2019-04-20', '0.00', 'CDS-2012-0070', 'CNC6510MSD', 'Transferido', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ticket_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comentario_ticket` (`ticket_id`),
  KEY `FK_comentario_usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`) VALUES
(1, 'HP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

DROP TABLE IF EXISTS `modelos`;
CREATE TABLE IF NOT EXISTS `modelos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `marca_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_modelo_marca` (`marca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `nombre`, `marca_id`) VALUES
(1, 'ProDisplay P202', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`) VALUES
(1, 'SISTEMAS C&C, S.A. DE C.V.'),
(2, 'JEREMIAS DE JESUS ARTIGA DE PAZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

DROP TABLE IF EXISTS `sedes`;
CREATE TABLE IF NOT EXISTS `sedes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` int NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sede_usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`, `direccion`, `telefono`, `usuario_id`) VALUES
(1, 'FGK', '49 Avenida Sur, #820, San Salvador', 22222222, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtipos`
--

DROP TABLE IF EXISTS `subtipos`;
CREATE TABLE IF NOT EXISTS `subtipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `tipo_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_subtipo_tipo` (`tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `subtipos`
--

INSERT INTO `subtipos` (`id`, `nombre`, `tipo_id`) VALUES
(1, 'Monitor-Desktop', 1),
(2, 'Mesa', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketestados`
--

DROP TABLE IF EXISTS `ticketestados`;
CREATE TABLE IF NOT EXISTS `ticketestados` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activo_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `fechaRevision` date NOT NULL,
  `fechaCierre` date NOT NULL,
  `ticketestado_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ticket_activo` (`activo_id`),
  KEY `FK_ticket_responsable` (`usuario_id`),
  KEY `FK_ticket_estado` (`ticketestado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

DROP TABLE IF EXISTS `tipos`;
CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`) VALUES
(1, 'Equipo de computación'),
(2, 'Mobiliario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

DROP TABLE IF EXISTS `ubicaciones`;
CREATE TABLE IF NOT EXISTS `ubicaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `sede_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ubicacion_sede` (`sede_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`id`, `nombre`, `descripcion`, `sede_id`) VALUES
(1, 'Aula CDS SS', 'La ubicación esta en la fundación', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuarioNombre` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `estado` int NOT NULL COMMENT '0=Inactivo, 1=Activo',
  `rol_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usuario_rol` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuarioNombre`, `contrasena`, `correo`, `nombre`, `apellido`, `estado`, `rol_id`) VALUES
(1, 'Peter', '123456', 'peter@fgk.com', 'Peter', 'Rodriguez ', 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activos`
--
ALTER TABLE `activos`
  ADD CONSTRAINT `FK_activo_estado` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_activo_modelo` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_activo_proveedor` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_activo_responsable` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_activo_subtipo` FOREIGN KEY (`subtipo_id`) REFERENCES `subtipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_activo_ubicacion` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `FK_comentario_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comentario_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `FK_modelo_marca` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD CONSTRAINT `FK_sede_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subtipos`
--
ALTER TABLE `subtipos`
  ADD CONSTRAINT `FK_subtipo_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `FK_ticket_activo` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ticket_estado` FOREIGN KEY (`ticketestado_id`) REFERENCES `ticketestados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ticket_responsable` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD CONSTRAINT `FK_ubicacion_sede` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_usuario_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
