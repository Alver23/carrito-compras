-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-10-2017 a las 15:23:06
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito_compras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) UNSIGNED NOT NULL,
  `categoria_padre_id` int(11) UNSIGNED DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `owner_user_id` int(11) UNSIGNED DEFAULT NULL,
  `updater_user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria_padre_id`, `nombre`, `ip_address`, `owner_user_id`, `updater_user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Tipo de cliente', NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Persona Juridica', NULL, NULL, NULL, NULL, NULL),
(3, 1, 'Persona Normal', NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'Tipo de Producto', NULL, NULL, NULL, NULL, NULL),
(5, 4, 'Red', NULL, NULL, NULL, NULL, NULL),
(6, 4, 'Equipos', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) UNSIGNED NOT NULL,
  `usuario_id` int(11) UNSIGNED NOT NULL,
  `tipo_cliente_id` int(11) UNSIGNED NOT NULL,
  `identificacion` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ip_address` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `owner_user_id` int(11) UNSIGNED DEFAULT NULL,
  `updater_user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `usuario_id`, `tipo_cliente_id`, `identificacion`, `direccion`, `celular`, `telefono`, `ip_address`, `owner_user_id`, `updater_user_id`, `created_at`, `updated_at`) VALUES
(3, 8, 3, 1143836518, '', '0', '0', NULL, NULL, NULL, '2017-10-07 18:45:48', '2017-10-07 18:45:48'),
(4, 9, 3, 1234, '', '0', '0', NULL, NULL, NULL, '2017-10-12 22:43:36', '2017-10-12 22:43:36'),
(5, 10, 3, 123, '', '0', '0', NULL, NULL, NULL, '2017-10-12 22:51:41', '2017-10-12 22:51:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(11) UNSIGNED NOT NULL,
  `cliente_id` int(11) UNSIGNED NOT NULL,
  `total` decimal(12,4) NOT NULL,
  `fecha` date NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `owner_user_id` int(11) UNSIGNED DEFAULT NULL,
  `updater_user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_has_detalle`
--

CREATE TABLE `cotizacion_has_detalle` (
  `id` int(11) UNSIGNED NOT NULL,
  `producto_id` int(11) UNSIGNED NOT NULL,
  `cotizacion_id` int(11) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` decimal(12,4) NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `owner_user_id` int(11) UNSIGNED DEFAULT NULL,
  `updater_user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tamano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_menu_id` int(11) UNSIGNED DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` tinyint(5) NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `owner_user_id` int(11) UNSIGNED DEFAULT NULL,
  `updater_user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `parent_menu_id`, `nombre`, `url`, `orden`, `ip_address`, `owner_user_id`, `updater_user_id`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Gestion Clientes', NULL, 1, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'Gestion Usuarios', NULL, 2, NULL, NULL, NULL, NULL, NULL),
(5, NULL, 'Gestion de Productos', NULL, 3, NULL, NULL, NULL, NULL, NULL),
(6, 4, 'Crear Usuarios', 'Views/home.php', 1, NULL, NULL, NULL, NULL, NULL),
(7, 4, 'Editar Usuarios', NULL, 2, NULL, NULL, NULL, NULL, NULL),
(8, 3, 'Crear Clientes', 'Views/registrarUsuarios.php', 1, NULL, NULL, NULL, NULL, NULL),
(9, 5, 'Crear Productos', 'Views/products.php', 1, NULL, NULL, NULL, NULL, NULL),
(10, NULL, 'Productos', NULL, 1, '127.0.0.1', 1, 1, '2017-09-07 00:00:00', '2017-09-07 00:00:00'),
(11, 10, 'Listar Productos', 'Views/home.php', 1, '127.0.0.1', 1, 1, '2017-09-07 00:00:00', '2017-09-07 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_has_usuarios`
--

CREATE TABLE `menu_has_usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `usuario_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `menu_has_usuarios`
--

INSERT INTO `menu_has_usuarios` (`id`, `menu_id`, `usuario_id`) VALUES
(1, 3, 1),
(8, 5, 1),
(2, 8, 1),
(9, 9, 1),
(6, 10, 2),
(7, 11, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Codigo` int(10) NOT NULL,
  `Detalle` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Proveedor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `owner_user_id` int(11) UNSIGNED NOT NULL,
  `updater_user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_has_usuarios`
--

CREATE TABLE `permisos_has_usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `usuario_id` int(11) UNSIGNED NOT NULL,
  `permiso_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) UNSIGNED NOT NULL,
  `categoria_id` int(11) UNSIGNED NOT NULL,
  `proveedor_id` int(11) UNSIGNED DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(12,4) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `owner_user_id` int(11) UNSIGNED DEFAULT NULL,
  `updater_user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_imagenes`
--

CREATE TABLE `productos_has_imagenes` (
  `id` int(11) UNSIGNED NOT NULL,
  `producto_id` int(11) UNSIGNED NOT NULL,
  `documento_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) UNSIGNED NOT NULL,
  `nit` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ip_address` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `owner_user_id` int(11) UNSIGNED DEFAULT NULL,
  `updater_user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombres` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` char(132) COLLATE utf8_spanish_ci NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `owner_user_id` int(11) UNSIGNED DEFAULT NULL,
  `updater_user_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `email`, `password`, `ip_address`, `owner_user_id`, `updater_user_id`, `created_at`, `updated_at`) VALUES
(1, 'Angela Pantoja (Admin)', 'angelal.pantogay@aunarcali.edu.co', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', NULL, NULL, NULL, NULL, NULL),
(2, 'Angela Pantoja (Cliente)', 'angela_Lorena15@hotmail.co', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', NULL, NULL, NULL, NULL, NULL),
(8, 'angela pantoja', 'angelalorenayela@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', NULL, NULL, NULL, '2017-10-07 18:48:00', '2017-10-07 18:48:00'),
(9, 'tes', 'test@test.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', NULL, NULL, NULL, '2017-10-12 22:36:00', '2017-10-12 22:36:00'),
(10, 'de', 'test1@test.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', NULL, NULL, NULL, '2017-10-12 22:41:00', '2017-10-12 22:41:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`categoria_padre_id`),
  ADD KEY `owner_user_id` (`owner_user_id`),
  ADD KEY `updater_user_id` (`updater_user_id`),
  ADD KEY `categoria_padre_id` (`categoria_padre_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id` (`usuario_id`),
  ADD KEY `owner_user_id` (`owner_user_id`),
  ADD KEY `updater_user_id` (`updater_user_id`),
  ADD KEY `tipo_cliente_id` (`tipo_cliente_id`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `owner_user_id` (`owner_user_id`),
  ADD KEY `updater_user_id` (`updater_user_id`);

--
-- Indices de la tabla `cotizacion_has_detalle`
--
ALTER TABLE `cotizacion_has_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `cotizacion_id` (`cotizacion_id`),
  ADD KEY `owner_user_id` (`owner_user_id`),
  ADD KEY `updater_user_id` (`updater_user_id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_menu_id` (`parent_menu_id`),
  ADD KEY `owner_user_id` (`owner_user_id`),
  ADD KEY `updater_user_id` (`updater_user_id`);

--
-- Indices de la tabla `menu_has_usuarios`
--
ALTER TABLE `menu_has_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_id_3` (`menu_id`,`usuario_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `menu_id_2` (`menu_id`),
  ADD KEY `usuario_id_2` (`usuario_id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_user_id` (`owner_user_id`),
  ADD KEY `updater_user_id` (`updater_user_id`);

--
-- Indices de la tabla `permisos_has_usuarios`
--
ALTER TABLE `permisos_has_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id_2` (`usuario_id`,`permiso_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `permiso_id` (`permiso_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `proveedor_id` (`proveedor_id`),
  ADD KEY `owner_user_id` (`owner_user_id`),
  ADD KEY `updater_user_id` (`updater_user_id`);

--
-- Indices de la tabla `productos_has_imagenes`
--
ALTER TABLE `productos_has_imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `documento_id` (`documento_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_user_id` (`owner_user_id`),
  ADD KEY `updater_user_id` (`updater_user_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_user_id` (`owner_user_id`),
  ADD KEY `updater_user_id` (`updater_user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizacion_has_detalle`
--
ALTER TABLE `cotizacion_has_detalle`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `menu_has_usuarios`
--
ALTER TABLE `menu_has_usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos_has_usuarios`
--
ALTER TABLE `permisos_has_usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos_has_imagenes`
--
ALTER TABLE `productos_has_imagenes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`updater_user_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `categorias_ibfk_2` FOREIGN KEY (`owner_user_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `categorias_ibfk_3` FOREIGN KEY (`categoria_padre_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`tipo_cliente_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`parent_menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu_has_usuarios`
--
ALTER TABLE `menu_has_usuarios`
  ADD CONSTRAINT `menu_has_usuarios_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `menu_has_usuarios_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`owner_user_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`updater_user_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`owner_user_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`updater_user_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_has_imagenes`
--
ALTER TABLE `productos_has_imagenes`
  ADD CONSTRAINT `productos_has_imagenes_ibfk_1` FOREIGN KEY (`documento_id`) REFERENCES `documentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `productos_has_imagenes_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
