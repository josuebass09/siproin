-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-11-2017 a las 22:14:14
-- Versión del servidor: 10.1.26-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simple_stock`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `cedula` int(10) NOT NULL,
  `email` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `id_role` int(10) NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`cedula`, `email`, `id_role`, `contrasena`) VALUES
(206860797, 'admin@gmail.com', 0, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `date_added`) VALUES
(11, 'IngenierÃ­a en sistemas', 'Proyecto para ingenierÃ­a en sistemas', '2017-11-07 03:03:11'),
(10, 'PPS', 'Proyecto para la PPS', '2017-11-07 03:02:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empresas`
--

CREATE TABLE `Empresas` (
  `id_empresa` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(10) NOT NULL,
  `id_role` int(10) NOT NULL,
  `tel_secundario` int(20) NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Empresas`
--

INSERT INTO `Empresas` (`id_empresa`, `nombre`, `direccion`, `email`, `descripcion`, `telefono`, `id_role`, `tel_secundario`, `contrasena`) VALUES
(40, 'Intel', 'aaffff', 'aa@gmail.com', 'aayy', 88, 1, 99, 'root'),
(48, 'IBM', 'Heredia', 'hfhf@gamil.com', 'Soprte en redes', 52, 1, 43, 'ibm'),
(49, 'Amazon', 'ALajuela', 'amazon@gmail.com', 'afrfrf', 8889, 1, 21, 'amazon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estudiantes`
--

CREATE TABLE `Estudiantes` (
  `nombre` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(10) NOT NULL,
  `email` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(20) NOT NULL,
  `tel_casa` int(20) NOT NULL,
  `id_role` int(10) NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Estudiantes`
--

INSERT INTO `Estudiantes` (`nombre`, `cedula`, `email`, `telefono`, `tel_casa`, `id_role`, `contrasena`, `Apellidos`) VALUES
('a', 1, 'a', 2, 3, 2, '1', 'a'),
('eff', 8, 'gg@gmail.com', 4554, 466, 2, 'root', 'gdfdfd'),
('tggt', 123, 'khkj@gmail.com', 876, 444, 2, 'root', 'tgt'),
('vvvv', 322, 'edd', 222, 223, 2, 'qq', 'cddc'),
('er', 454, 'rgrgr', 22, 444, 2, '21', 'rrf'),
('ggg', 551, 'sdsdsd@gmail.com', 87453024, 88, 2, 'root', 'edsd'),
('dde', 558, 'edede@gmail.com', 433, 23, 2, 'root', 'edede'),
('wdwd', 2111, 'tggtt', 333, 4343, 2, 'tr', 'wsws'),
('juan', 2125, 'juan43@gmail.com', 87452101, 42145, 2, '', 'juanaa'),
('Jordy', 12345, 'jordy45@gamil.com', 874545, 21, 2, 'root', 'shhshss'),
('juaneferf', 44444, 'mas43@gmail.com', 54, 87, 2, '12', 'jhhhhhh'),
('juanws', 212522, 'luisassss43@gmail.com', 444, 888, 2, 'root', 'juanaawsws'),
('Josué', 206860797, 'josuebass09@gmail.com', 87453025, 24941764, 2, 'root', 'Hidalgo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `urlPhoto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `urlPhoto`) VALUES
(1, 'imagenes/check.png'),
(2, 'imagenes/imgHeader.j'),
(3, 'imagenes/check.png'),
(4, 'imagenes/check.png'),
(5, 'imagenes/Selección_0'),
(6, 'imagenes/Selección_0'),
(7, 'imagenes/Selección_0'),
(8, 'imagenes/Selección_0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `nota` varchar(255) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `user_id`, `fecha`, `nota`, `referencia`, `cantidad`) VALUES
(1, 1, 1, '2017-11-07 03:04:37', 'Obed agregÃ³ 6 producto(s) al inventario', 'T1', 6),
(2, 2, 1, '2017-11-07 03:25:23', 'Obed agregÃ³ 1 producto(s) al inventario', 'T2', 1),
(3, 3, 0, '2017-11-14 22:13:41', ' agregó 10 producto(s) al inventario', '112', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Historial`
--

CREATE TABLE `Historial` (
  `id_historial` int(10) NOT NULL,
  `id_proyecto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Postulados`
--

CREATE TABLE `Postulados` (
  `id_proyecto` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Postulados`
--

INSERT INTO `Postulados` (`id_proyecto`, `id_estudiante`, `estado`) VALUES
(2, 206860797, 2),
(25, 206860797, 0),
(11, 206860797, 2),
(2, 44444, 2),
(12, 206860797, 1),
(12, 206860797, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_producto` int(11) NOT NULL,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `precio_producto` double NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_producto`, `codigo_producto`, `nombre_producto`, `date_added`, `precio_producto`, `stock`, `id_categoria`) VALUES
(1, 'T1', 'Desarrollador Backend(PHP)', '2017-11-07 03:04:37', 1, 6, 10),
(2, 'T2', 'Desarrollador fronend(PHP)', '2017-11-07 03:25:23', 1, 1, 11),
(3, '112', 'ASP DEVELOPER', '2017-11-14 22:13:41', 12, 10, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proyectos`
--

CREATE TABLE `Proyectos` (
  `id_proyecto` int(10) NOT NULL,
  `id_contrato` int(10) NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `vacantes` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Proyectos`
--

INSERT INTO `Proyectos` (`id_proyecto`, `id_contrato`, `id_empresa`, `descripcion`, `fecha`, `vacantes`) VALUES
(2, 0, 48, 'Desarrolladores wordpress que quieran mejorar el ministerio de salud', '0000-00-00 00:00:00', 0),
(11, 1, 48, 'Se necesita un proyecto para la gestion de riesgos', '0000-00-00 00:00:00', 0),
(12, 1, 32, 'RUBY DEVELOPER', '0000-00-00 00:00:00', 20),
(25, 0, 40, 'Desarrolador PHP', '0000-00-00 00:00:00', 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Roles`
--

CREATE TABLE `Roles` (
  `id_role` int(10) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Roles`
--

INSERT INTO `Roles` (`id_role`, `descripcion`) VALUES
(0, 'admin'),
(1, 'empresa'),
(2, 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `id_contrato` int(10) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_contrato`
--

INSERT INTO `tipo_contrato` (`id_contrato`, `descripcion`) VALUES
(0, 'ingenieria'),
(1, 'pps');

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
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`) VALUES
(1, 'Obed', 'Alvarado', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-12-19 15:06:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`cedula`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `Empresas`
--
ALTER TABLE `Empresas`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- Indices de la tabla `Estudiantes`
--
ALTER TABLE `Estudiantes`
  ADD PRIMARY KEY (`cedula`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD KEY `id_role` (`id_role`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `Historial`
--
ALTER TABLE `Historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `Proyectos`
--
ALTER TABLE `Proyectos`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `id_contrato` (`id_contrato`),
  ADD KEY `id_contrato_2` (`id_contrato`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `id_role` (`id_role`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`id_contrato`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `Empresas`
--
ALTER TABLE `Empresas`
  MODIFY `id_empresa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Proyectos`
--
ALTER TABLE `Proyectos`
  MODIFY `id_proyecto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Estudiantes`
--
ALTER TABLE `Estudiantes`
  ADD CONSTRAINT `Estudiantes_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `Roles` (`id_role`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `products` (`id_producto`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
