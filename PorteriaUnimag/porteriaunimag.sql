-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2018 a las 14:43:52
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `porteriaunimag`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadovehiculo`
--

CREATE TABLE `estadovehiculo` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infraccion`
--

CREATE TABLE `infraccion` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_registro` int(10) UNSIGNED NOT NULL,
  `tipo_infraccion` int(10) UNSIGNED NOT NULL,
  `estado_pago` varchar(45) NOT NULL,
  `comentarios` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `id_vehiculo` int(10) UNSIGNED NOT NULL,
  `zona_asignada` int(10) UNSIGNED NOT NULL,
  `documento_vigilante` int(10) UNSIGNED NOT NULL,
  `documento_cliente` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinfraccion`
--

CREATE TABLE `tipoinfraccion` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `nombre`) VALUES
(1, 'estudiante'),
(2, 'funcionario'),
(3, 'vigilante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `documento` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `contrasenia` varchar(300) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `genero` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `tipo_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento`, `nombre`, `apellido`, `fecha_nacimiento`, `email`, `celular`, `contrasenia`, `direccion`, `genero`, `tipo_documento`, `foto`, `tipo_usuario`) VALUES
(2015214132, 'hallel', 'vargas', '1997-11-24', 'hallel@gmail.com', '123123', '123123', 'sdsad', 1, 1, NULL, 3),
(2015214136, 'Cristian', 'Vergel', '2018-11-13', 'cristianvergel@gmail.com', '3003393659', '9805', '11 de noviembre', 1, 1, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(10) UNSIGNED NOT NULL,
  `placa` varchar(45) NOT NULL,
  `id_estado` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `capacidad` int(10) UNSIGNED NOT NULL,
  `capacidad_utilizada` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `habilitada` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estadovehiculo`
--
ALTER TABLE `estadovehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `infraccion`
--
ALTER TABLE `infraccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Infracciones_Registros1_idx` (`id_registro`),
  ADD KEY `fk_Infracciones_Tipos_Infracciones1_idx` (`tipo_infraccion`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Registros_Zonas_idx` (`zona_asignada`),
  ADD KEY `fk_Registros_Vehiculos1_idx` (`id_vehiculo`),
  ADD KEY `fk_Registro_Persona1_idx` (`documento_vigilante`),
  ADD KEY `fk_Registro_Persona2_idx` (`documento_cliente`);

--
-- Indices de la tabla `tipoinfraccion`
--
ALTER TABLE `tipoinfraccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`documento`),
  ADD UNIQUE KEY `email_usuario_UNIQUE` (`email`),
  ADD KEY `fk_Usuario_TipoUsuario1_idx` (`tipo_usuario`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Vehiculos_Estados_idx` (`id_estado`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estadovehiculo`
--
ALTER TABLE `estadovehiculo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `infraccion`
--
ALTER TABLE `infraccion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoinfraccion`
--
ALTER TABLE `tipoinfraccion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `infraccion`
--
ALTER TABLE `infraccion`
  ADD CONSTRAINT `FKc10q788my7xr86rc6bacv2eng` FOREIGN KEY (`id`) REFERENCES `registro` (`id`),
  ADD CONSTRAINT `fk_Infracciones_Registros1` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`),
  ADD CONSTRAINT `fk_Infracciones_Tipos_Infracciones1` FOREIGN KEY (`tipo_infraccion`) REFERENCES `tipoinfraccion` (`id`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `fk_Registro_Persona1` FOREIGN KEY (`documento_vigilante`) REFERENCES `usuario` (`documento`),
  ADD CONSTRAINT `fk_Registro_Persona2` FOREIGN KEY (`documento_cliente`) REFERENCES `usuario` (`documento`),
  ADD CONSTRAINT `fk_Registro_Vehiculo` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id`),
  ADD CONSTRAINT `fk_Registro_Zona` FOREIGN KEY (`zona_asignada`) REFERENCES `zona` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_TipoUsuario1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipousuario` (`id`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `fk_Vehiculo_Estado` FOREIGN KEY (`id_estado`) REFERENCES `estadovehiculo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
