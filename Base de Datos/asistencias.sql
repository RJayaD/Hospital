-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2024 a las 05:35:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencias`
--
CREATE DATABASE IF NOT EXISTS `asistencias` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `asistencias`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asist_entrada`
--

CREATE TABLE `asist_entrada` (
  `id` int(11) NOT NULL,
  `empleadoId` int(11) NOT NULL,
  `tipoId` int(11) NOT NULL,
  `fecha` date DEFAULT current_timestamp(),
  `hora` time DEFAULT current_timestamp(),
  `id_estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asist_entrada`
--

INSERT INTO `asist_entrada` (`id`, `empleadoId`, `tipoId`, `fecha`, `hora`, `id_estado`) VALUES
(2, 1, 1, '2024-02-23', '09:56:40', 1),
(3, 2, 2, '2024-02-23', '08:56:49', 1),
(4, 3, 2, '2024-02-23', '09:56:54', 1),
(5, 4, 1, '2024-02-23', '08:56:58', 1),
(6, 1, 1, '2024-02-26', '09:53:57', 1),
(7, 2, 1, '2024-02-26', '09:53:57', 1),
(8, 3, 1, '2024-02-26', '09:53:57', 1),
(9, 4, 1, '2024-02-26', '09:53:57', 1),
(10, 1, 3, '2024-02-27', '10:03:58', 1),
(11, 2, 3, '2024-02-27', '10:03:58', 1),
(12, 3, 2, '2024-02-27', '10:03:58', 1),
(13, 4, 3, '2024-02-27', '10:03:58', 1),
(14, 1, 2, '2024-02-28', '10:06:02', 1),
(15, 2, 3, '2024-02-28', '10:06:02', 1),
(16, 3, 1, '2024-02-28', '10:06:02', 1),
(17, 4, 3, '2024-02-28', '10:06:02', 1),
(18, 1, 2, '2024-02-29', '10:06:20', 1),
(19, 2, 2, '2024-02-29', '10:06:20', 1),
(20, 3, 2, '2024-02-29', '10:06:20', 1),
(21, 4, 2, '2024-02-29', '10:06:20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asist_salida`
--

CREATE TABLE `asist_salida` (
  `id` int(11) NOT NULL,
  `empleadoId` int(11) NOT NULL,
  `tipoId` int(11) NOT NULL,
  `fecha` date DEFAULT current_timestamp(),
  `hora` time DEFAULT current_timestamp(),
  `id_estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `primerNombre` varchar(40) NOT NULL,
  `segundoNombre` varchar(40) NOT NULL,
  `primerApellido` varchar(40) NOT NULL,
  `segundoApellido` varchar(40) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `cedula`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `correo`, `fecha_nac`, `telefono`, `direccion`, `id_estado`) VALUES
(1, '0924826482', 'Fernando', 'Dionicio', 'Reyes', 'Noboa', 'fersland@outlook', '2024-03-14', '0981071130', 'Guasmo', 2),
(2, '0828281919', 'Mia', 'Love', 'Land', 'Luna', 'luna@gmail.com', '2012-06-15', '0292818277', 'Gye', 1),
(3, '0928928199', 'Leo', 'Bark', 'Harlem', 'Humorista', 'leoharlem@gmail.com', '2015-02-04', '0999281818', 'España', 1),
(4, '0282781289', 'David', 'Daniel', 'Guapo', 'Guapin', 'davidguapo@outlook.com', '2016-03-11', '0292818199', 'Italia', 1),
(5, '2350107484', 'Ruben', 'Dario', 'Jaya', 'Puruncaja', 'rubenjaya2@gmail.com', '1997-04-10', '0989794366', 'Santo Domingo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `fecha_registro`, `id_estado`) VALUES
(1, 'ADMINISTRADOR', '2024-03-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_llegada`
--

CREATE TABLE `tipo_llegada` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_llegada`
--

INSERT INTO `tipo_llegada` (`id`, `nombre`) VALUES
(1, 'PUNTUAL'),
(2, 'ATRASO'),
(3, 'NO ASISTIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_salida`
--

CREATE TABLE `tipo_salida` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_salida`
--

INSERT INTO `tipo_salida` (`id`, `nombre`) VALUES
(1, 'PUNTUAL'),
(2, 'TARDE'),
(3, 'ANTES DE HORA CON PERMISO'),
(4, 'ANTES DE HORA SIN PERMISO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `rolesId` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `rolesId`, `usuario`, `clave`, `correo`, `id_estado`) VALUES
(1, 1, 'rjaya', '12345', 'rjaya@outlook.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asist_entrada`
--
ALTER TABLE `asist_entrada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asistenciaentrada_empleado` (`empleadoId`),
  ADD KEY `fk_asistenciaentrada_tipo` (`tipoId`),
  ADD KEY `fk_asistenciaentrada_estado` (`id_estado`);

--
-- Indices de la tabla `asist_salida`
--
ALTER TABLE `asist_salida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asistenciasalida_empleado` (`empleadoId`),
  ADD KEY `fk_asistenciasalida_tipo` (`tipoId`),
  ADD KEY `fk_asistencia_estado` (`id_estado`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empleados_estado` (`id_estado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_llegada`
--
ALTER TABLE `tipo_llegada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_salida`
--
ALTER TABLE `tipo_salida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_estados` (`id_estado`),
  ADD KEY `fk_usuarios_roles` (`rolesId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asist_entrada`
--
ALTER TABLE `asist_entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `asist_salida`
--
ALTER TABLE `asist_salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_llegada`
--
ALTER TABLE `tipo_llegada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_salida`
--
ALTER TABLE `tipo_salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asist_entrada`
--
ALTER TABLE `asist_entrada`
  ADD CONSTRAINT `fk_asistenciaentrada_empleado` FOREIGN KEY (`empleadoId`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `fk_asistenciaentrada_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`),
  ADD CONSTRAINT `fk_asistenciaentrada_tipo` FOREIGN KEY (`tipoId`) REFERENCES `tipo_llegada` (`id`);

--
-- Filtros para la tabla `asist_salida`
--
ALTER TABLE `asist_salida`
  ADD CONSTRAINT `fk_asistencia_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`),
  ADD CONSTRAINT `fk_asistenciasalida_empleado` FOREIGN KEY (`empleadoId`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `fk_asistenciasalida_tipo` FOREIGN KEY (`tipoId`) REFERENCES `tipo_salida` (`id`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_empleados_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_estados` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`rolesId`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
