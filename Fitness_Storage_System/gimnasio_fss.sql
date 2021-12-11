-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-12-2021 a las 03:44:05
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio_fss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `doc_admin` int NOT NULL,
  KEY `fk_admin_usuario` (`doc_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`doc_admin`) VALUES
(12345678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `doc_cliente` int NOT NULL,
  KEY `fk_cliente_usuario` (`doc_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`doc_cliente`) VALUES
(81753620),
(95847154),
(96841521),
(1005487963),
(1550748441);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

DROP TABLE IF EXISTS `entrenador`;
CREATE TABLE IF NOT EXISTS `entrenador` (
  `doc_entrenador` int NOT NULL,
  KEY `fk_entrenador_usuario` (`doc_entrenador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`doc_entrenador`) VALUES
(51487956),
(84759481),
(95847412),
(1005478451);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int NOT NULL AUTO_INCREMENT,
  `doc_cliente` int NOT NULL,
  `id_servicio` int NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_pago` date NOT NULL,
  `subtotal` varchar(10) NOT NULL,
  `iva` varchar(10) NOT NULL,
  `descuento` varchar(10) NOT NULL,
  `valor_descuento` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `estado` varchar(8) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `fk_factura_cliente` (`doc_cliente`),
  KEY `fk_factura_servicios` (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `doc_cliente`, `id_servicio`, `fecha_creacion`, `fecha_pago`, `subtotal`, `iva`, `descuento`, `valor_descuento`, `total`, `estado`) VALUES
(16, 95847154, 1, '2021-09-03', '2021-09-03', '9000', '360', '0', '0', '9360', 'Activo'),
(17, 1550748441, 2, '2021-09-04', '2021-09-04', '63000', '2520', '2%', '1310', '64210', 'Activo'),
(18, 96841521, 3, '2021-09-05', '2021-09-05', '126000', '5040', '2%', '2520', '128520', 'Activo'),
(19, 1005487963, 4, '2021-09-06', '2021-09-06', '270000', '10800', '3%', '8400', '271600', 'Activo'),
(20, 81753620, 5, '2021-09-07', '2021-09-07', '3285000', '131400', '4%', '136656', '3279744', 'Activo'),
(21, 95847154, 1, '2021-09-08', '2021-09-08', '9000', '360', '0', '0', '9360', 'Activo'),
(22, 95847154, 4, '2021-09-10', '2021-09-10', '270000', '10800', '3%', '8400', '271600', 'Activo'),
(23, 1550748441, 2, '2021-09-12', '2021-09-12', '63000', '2520', '2%', '1310', '64210', 'Activo'),
(24, 96841521, 3, '2021-09-21', '2021-09-21', '126000', '5040', '2%', '2520', '128520', 'Activo'),
(25, 1005487963, 4, '2021-10-06', '2021-10-06', '270000', '10800', '3%', '8400', '271600', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

DROP TABLE IF EXISTS `nomina`;
CREATE TABLE IF NOT EXISTS `nomina` (
  `id_nomina` int NOT NULL AUTO_INCREMENT,
  `doc_entrenador` int NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_pago` date NOT NULL,
  `subtotal_sueldo` varchar(10) NOT NULL,
  `desc_seguridad_salud` varchar(10) NOT NULL,
  `valor_descuento` varchar(10) NOT NULL,
  `descuento_arl` varchar(10) NOT NULL,
  `valor_desc_arl` varchar(10) NOT NULL,
  `subsidio_transporte` varchar(10) NOT NULL,
  `total_sueldo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_nomina`),
  KEY `fk_nomina_entrenador` (`doc_entrenador`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`id_nomina`, `doc_entrenador`, `fecha_creacion`, `fecha_pago`, `subtotal_sueldo`, `desc_seguridad_salud`, `valor_descuento`, `descuento_arl`, `valor_desc_arl`, `subsidio_transporte`, `total_sueldo`) VALUES
(1, 51487956, '2021-06-30', '2021-06-30', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240'),
(2, 84759481, '2021-06-30', '2021-06-30', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240'),
(3, 95847412, '2021-06-30', '2021-06-30', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240'),
(4, 1005478451, '2021-06-30', '2021-06-30', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240'),
(5, 51487956, '2021-07-31', '2021-07-31', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240'),
(6, 84759481, '2021-07-31', '2021-07-31', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240'),
(7, 95847412, '2021-07-31', '2021-08-31', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240'),
(8, 1005478451, '2021-07-31', '2021-08-31', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240'),
(9, 51487956, '2021-08-31', '2021-08-31', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240'),
(10, 84759481, '2021-08-31', '2021-08-31', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240'),
(11, 95847412, '2021-08-31', '2021-08-31', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240'),
(12, 1005478451, '2021-08-31', '2021-08-31', '908526', '3%', '27255', '1.044%', '9485', '106454', '978.240');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_gasto`
--

DROP TABLE IF EXISTS `pago_gasto`;
CREATE TABLE IF NOT EXISTS `pago_gasto` (
  `id_pago_gasto` int NOT NULL AUTO_INCREMENT,
  `id_tipo_gasto` int NOT NULL,
  `fecha_pago` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `subtotal` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pago_gasto`),
  KEY `fk_pago_gasto_tipo_gasto` (`id_tipo_gasto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pago_gasto`
--

INSERT INTO `pago_gasto` (`id_pago_gasto`, `id_tipo_gasto`, `fecha_pago`, `fecha_vencimiento`, `subtotal`, `total`, `estado`) VALUES
(1, 1, '2021-07-17', '2021-07-24', '70000', '70000', 'Activo'),
(2, 2, '2021-07-08', '2021-07-16', '50000', '50000', 'Activo'),
(3, 3, '2021-07-12', '2021-07-15', '60000', '60000', 'Activo'),
(4, 4, '2021-07-12', '2021-07-15', '60000', '60000', 'Activo'),
(5, 1, '2021-08-17', '2021-08-24', '70000', '70000', 'Activo'),
(6, 3, '2021-08-12', '2021-08-15', '60000', '60000', 'Activo'),
(7, 4, '2021-08-12', '2021-08-15', '60000', '60000', 'Activo'),
(8, 1, '2021-09-17', '2021-09-24', '70000', '70000', 'Activo'),
(9, 2, '2021-09-08', '2021-09-16', '50000', '50000', 'Activo'),
(10, 3, '2021-09-12', '2021-09-15', '60000', '60000', 'Activo'),
(11, 4, '2021-09-12', '2021-09-15', '60000', '60000', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(13) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Entrenador'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `costo` varchar(7) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre`, `descripcion`, `costo`) VALUES
(1, 'Diario', 'Servicio de 1 día', '9000'),
(2, 'Semanal', 'Servicio de 1 semana', '63000'),
(3, 'Quincenal', 'Servicio de 15 días', '126000'),
(4, 'Mensual', 'Servicio de 1 mes', '270000'),
(5, 'Anual', 'Servicio de 1 año', '3285000'),
(9, '455455', '852465465', '20000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_gasto`
--

DROP TABLE IF EXISTS `tipo_gasto`;
CREATE TABLE IF NOT EXISTS `tipo_gasto` (
  `id_tipo_gasto` int NOT NULL AUTO_INCREMENT,
  `doc_admin` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_gasto`),
  KEY `fk_tipo_gasto_admin` (`doc_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_gasto`
--

INSERT INTO `tipo_gasto` (`id_tipo_gasto`, `doc_admin`, `nombre`, `descripcion`) VALUES
(1, 12345678, 'Luz', 'Se paga servicio de luz'),
(2, 12345678, 'Agua', 'Se paga servicio de acueducto'),
(3, 12345678, 'Internet', 'Se paga servicio de internet'),
(4, 12345678, 'Arriendo', 'Se paga el arriendo del local');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `doc_identidad` int NOT NULL,
  `tipo_doc` varchar(2) NOT NULL,
  `nombres` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `tel_contacto` varchar(7) DEFAULT NULL,
  `cel_contacto` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `id_rol` int NOT NULL,
  `password` varchar(45) NOT NULL,
  `estado` bit(1) NOT NULL,
  PRIMARY KEY (`doc_identidad`),
  KEY `fk_usuario_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`doc_identidad`, `tipo_doc`, `nombres`, `apellidos`, `tel_contacto`, `cel_contacto`, `email`, `direccion`, `id_rol`, `password`, `estado`) VALUES
(963, '1', 'Maria', 'Perez', '313', '313', 'maria@gmail.com', 'cra 45', 1, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', b'1'),
(1234, '3', 'Marta', 'Lozano', '598', '313', 'marta@gmail.com', 'cra 84', 2, '8cb2237d0679ca88db6464eac60da96345513964', b'1'),
(15971, '2', 'Hector', 'Franco', '123333', '123', 'hector@gmail.com', 'cra 4', 3, '34a54b634453f98c8351e7a675b1e2ef9cc6f8d1', b'1'),
(88888, '2', 'Wily', 'Der', '85', '52', 'wil@gmail.com', 'craaa 3', 3, '9eab102e8f9431bb23016851d11e658e0b20b730', b'1'),
(300154, '2', 'Nancy', 'Rodriguez', '8522166', '31548899', 'nancyrodri@gmail.com', 'calle 48', 3, 'e29cc5822e6b5f2ef6ff59cdf3bf4744cb06f921', b'1'),
(12345678, '1', 'Andrea Carolina', 'Hernandez Montero', '3411348', '3154784475', 'andreahernandez@gmail.com', 'Carrera 3 # 18- 45', 1, 'd385046a59d8bfdf84bc3ddbf0ecd350784e4458', b'1'),
(51487956, '1', 'Alexander', 'Carvajal Vargas', '6918654', '3136524771', 'alexcarvajal@gmail.com', 'Carrera 7 # 84- 72', 2, 'entrenadorfss', b'1'),
(81753620, '2', 'Juliana', 'Gaviria García', '3420836', '3142669846', 'juligaviria@gmail.com', 'Calle 10 No. 5-22', 3, '0d5119459469e1b38d01bec8e11079126dd380cc', b'1'),
(84759481, '1', 'Andrea Liliana', 'Cruz García', '', '3145887414', 'andreacruz@gmail.com', 'Calle 4 No. 5 – 10', 2, 'entrenadorfss', b'1'),
(95847154, '1', 'Claudia Liliana', 'Torres Castellanos', '4505077', '3154771260', 'clautorres@gmail.com', 'Av. Ciudad de Cali No. 6C-09', 3, '0d5119459469e1b38d01bec8e11079126dd380cc', b'1'),
(95847412, '1', 'Camilo', 'Rodriguez Botero', '3430999', '3215487415', 'camilorod@gmail.com', 'Calle 11 No. 4 - 14', 2, 'entrenadorfss', b'1'),
(96841521, '1', 'Daniel', 'Gómez Delgado', '4528974', '3157542660', 'danielgomez@gmail.com', 'Avenida Cra. 60 No. 57-60', 3, 'clientefss', b'1'),
(98765432, '1', 'Claudia', 'Ramirez', '741', '963', 'clau@gmail.com', 'cra 43', 3, '69fa6513b84b61771964c90b552608300fca5914', b'0'),
(1005478451, '1', 'Carlos Andres', 'Castaño Contreras', '', '3185441025', 'carlosandres@gmail.com', 'Calle 24 N° 5-60', 2, 'entrenadorfss', b'1'),
(1005487963, '1', 'Gabriel Mauricio', 'Mendoza Castro', '3431223', '3133895470', 'gabrielmendoza@gmail.com', 'Calle 11 No. 4-21 / 93', 3, '47581d4409f7119dd3d27fdf94e0d26aa1db543c', b'1'),
(1550748441, '1', 'Elizabeth', 'Cortés Montejo', '7698734', '3169884771', 'elizabethcortes@gmail.com', 'Calle 48b sur No. 21-13', 3, '0d5119459469e1b38d01bec8e11079126dd380cc', b'0');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_usuario` FOREIGN KEY (`doc_admin`) REFERENCES `usuario` (`doc_identidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_usuario` FOREIGN KEY (`doc_cliente`) REFERENCES `usuario` (`doc_identidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD CONSTRAINT `fk_entrenador_usuario` FOREIGN KEY (`doc_entrenador`) REFERENCES `usuario` (`doc_identidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_cliente` FOREIGN KEY (`doc_cliente`) REFERENCES `cliente` (`doc_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_factura_servicios` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD CONSTRAINT `fk_nomina_entrenador` FOREIGN KEY (`doc_entrenador`) REFERENCES `entrenador` (`doc_entrenador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago_gasto`
--
ALTER TABLE `pago_gasto`
  ADD CONSTRAINT `fk_pago_gasto_tipo_gasto` FOREIGN KEY (`id_tipo_gasto`) REFERENCES `tipo_gasto` (`id_tipo_gasto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_gasto`
--
ALTER TABLE `tipo_gasto`
  ADD CONSTRAINT `fk_tipo_gasto_admin` FOREIGN KEY (`doc_admin`) REFERENCES `admin` (`doc_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
