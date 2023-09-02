-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 17:19:41
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sipen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `codigo` int(11) NOT NULL,
  `nombre_cliente` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`codigo`, `nombre_cliente`, `apellido`, `telefono`, `correo`) VALUES
(16, 'Miguel', 'Gomez', '3174131576', 'miguel@gmail.com'),
(17, 'Francisco', 'Hernandez', '43535626', 'francisco@gmail.com'),
(20, 'Wilmer', 'Espitia', '345353', 'wilmerespitia@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `id_cotizacion` int(11) NOT NULL,
  `fecha_cotizacion` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`id_cotizacion`, `fecha_cotizacion`, `id_usuario`) VALUES
(5, '2022-10-24', 1069483776);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credencial`
--

CREATE TABLE `credencial` (
  `credencial` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `credencial`
--

INSERT INTO `credencial` (`credencial`) VALUES
(1069483777);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificios`
--

CREATE TABLE `edificios` (
  `nit` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tel_edificio` int(50) NOT NULL,
  `correo_edificio` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `Cod_cliente` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edificios`
--

INSERT INTO `edificios` (`nit`, `nombre`, `tel_edificio`, `correo_edificio`, `direccion`, `Cod_cliente`) VALUES
(5472352, 'Bella suiza', 43546356, 'bellasuiza@gmail.com', 'cra 34#568', 16),
(54738235, 'Ferrara', 5635637, 'ferrara@gmail.com', 'cra 44 #65-45', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `cod_pp` int(11) NOT NULL,
  `cod_poducto` int(11) NOT NULL,
  `cod_proveedor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`cod_pp`, `cod_poducto`, `cod_proveedor`) VALUES
(8, 9807, 657748874);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Codigo` int(11) NOT NULL,
  `Referencia` varchar(30) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `caracteristicas` varchar(50) NOT NULL,
  `Cantidad` int(10) NOT NULL,
  `Precio` double NOT NULL,
  `Fecha` date NOT NULL,
  `proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Codigo`, `Referencia`, `Marca`, `Descripcion`, `caracteristicas`, `Cantidad`, `Precio`, `Fecha`, `proveedor`) VALUES
(2230, '566tr54', 'mec', 'contactor', '123', 5, 45566, '2022-11-22', 2147483647),
(3789, '5637377', 'weg', 'bomba', '220v', 12, 2309994, '2022-11-22', 2147483647),
(7258, 'y667766', 'siemens', 'contactor', '220v', 2, 345235, '2022-11-22', 2147483647),
(8316, '3423242', 'mec', 'contactor', '220v', 4, 340000, '2022-11-23', 2147483647),
(9807, '15h 7.5tw', 'Barnes', 'Bomba', '120', 1, 250000, '2022-11-24', 657748874),
(9884, '23334234', 'weg', 'motor', '220v', 3, 1232434, '2022-11-22', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `nit_proveedor` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` int(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`nit_proveedor`, `nombre`, `telefono`, `correo`, `direccion`) VALUES
(54663773, 'Jaimes', 53636536, 'jaimes@gmail.com', 'cra 677467'),
(75674766, 'Hidroval', 53663567, 'Hidroval@gmail.com', 'cra 455 4464'),
(657748874, 'Tuvalred', 6746738, 'tuvalred@gmail.com', 'cra 677467'),
(1069483777, 'Ferro Mendez', 453535, 'ferromendez@gmail.com', 'cra4536637');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_cotizacion`
--

CREATE TABLE `tmp_cotizacion` (
  `id_tmp` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tmp_cotizacion`
--

INSERT INTO `tmp_cotizacion` (`id_tmp`, `id_producto`, `cantidad_tmp`, `session_id`, `precio`) VALUES
(136, 21, 1, '', 2000000),
(135, 21, 10, '', 2000000),
(208, 9807, 1, '', 250000),
(207, 2230, 10, '', 45566),
(206, 9807, 1, '', 250000),
(198, 29, 1, '', 2500000),
(197, 31, 1, '', 300000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `date_added` datetime NOT NULL,
  `cod_user` int(11) NOT NULL,
  `credencial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`, `cod_user`, `credencial`) VALUES
(1, 'Juange', 'Gelis', 'admin', '$2y$10$8AuHAZjsoFqrW8/UCKoMlufvATmHeNHD5uUpxqeJk3ZXtxfDKZVfm', 'juan@gmail.com', '2022-11-24 00:00:00', 5, 1069483777),
(1, 'Carlos', 'Gomez', 'carlin', '$2y$10$8AuHAZjsoFqrW8/UCKoMlufvATmHeNHD5uUpxqeJk3ZXtxfDKZVfm', 'Carlos@gmail.com', '2022-11-24 00:00:00', 6, 1069483777),
(1, 'Andres', 'Gonzalez', 'admin2', '$2y$10$8AuHAZjsoFqrW8/UCKoMlufvATmHeNHD5uUpxqeJk3ZXtxfDKZVfm', 'andres@gmail.com', '2022-11-24 00:00:00', 7, 1069483777);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`id_cotizacion`);

--
-- Indices de la tabla `credencial`
--
ALTER TABLE `credencial`
  ADD PRIMARY KEY (`credencial`);

--
-- Indices de la tabla `edificios`
--
ALTER TABLE `edificios`
  ADD PRIMARY KEY (`nit`),
  ADD KEY `cliente` (`Cod_cliente`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`cod_pp`),
  ADD KEY `product` (`cod_poducto`),
  ADD KEY `prov` (`cod_proveedor`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`nit_proveedor`);

--
-- Indices de la tabla `tmp_cotizacion`
--
ALTER TABLE `tmp_cotizacion`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`cod_user`),
  ADD KEY `creden` (`credencial`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `cod_pp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tmp_cotizacion`
--
ALTER TABLE `tmp_cotizacion`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `edificios`
--
ALTER TABLE `edificios`
  ADD CONSTRAINT `cliente` FOREIGN KEY (`Cod_cliente`) REFERENCES `clientes` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `product` FOREIGN KEY (`cod_poducto`) REFERENCES `productos` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prov` FOREIGN KEY (`cod_proveedor`) REFERENCES `proveedores` (`nit_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `creden` FOREIGN KEY (`credencial`) REFERENCES `credencial` (`credencial`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
