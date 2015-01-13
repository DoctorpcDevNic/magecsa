-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2015 a las 05:32:23
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `magecsa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actividad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pagina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `puestos` text COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `razon`, `email`, `telefono`, `mensaje`, `created_at`, `updated_at`) VALUES
(1, 'Norwin Guerrero ', 'DoctorPC', 'norwingc_war@outlook.com', '5461-3213', 'este es un msj', '2015-01-13 01:52:10', '2015-01-13 01:52:10'),
(2, 'Norwin Guerrero ', 'DoctorPC', 'norwingc_war@outlook.com', '3213-2132', 'este es un msjs', '2015-01-13 08:59:36', '2015-01-13 08:59:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_12_15_180250_create_usuarios_table', 1),
('2014_12_15_180722_create_usuariosdatos_table', 1),
('2014_12_15_182102_create_usuariosexpectativas_table', 1),
('2014_12_15_182842_create_usuariosexperiencias_table', 1),
('2014_12_15_183300_create_usuarioscontactos_table', 1),
('2014_12_15_184737_create_usuarioseducacion_table', 1),
('2014_12_15_184906_create_usuariosotros_table', 1),
('2014_12_15_185121_create_usuarioshabilidades_table', 1),
('2014_12_19_004907_create_usuariosadmin_table', 1),
('2015_01_02_214151_create_empresas_table', 1),
('2015_01_03_013831_create_vacantes_table', 2),
('2015_01_05_185616_create_vacantesusuarios_table', 2),
('2015_01_12_181242_create_mensajes_table', 3),
('2015_01_13_022430_create_slider_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `imagen`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, '0emprendedores.jpg', '"Tu oportunidad de crecer profesionalmente es hoy, bienvenido a nuestro equipo"', '2015-01-13 08:54:43', '2015-01-13 08:54:43'),
(2, '1emprendedores.jpg', '"Tu oportunidad de crecer"', '2015-01-13 08:56:06', '2015-01-13 08:56:06'),
(3, '2emprendedores.jpg', '"Tu oportunidad de crecer profesionalmente es hoy, bienvenido a nuestro equipo"', '2015-01-13 08:56:57', '2015-01-13 08:56:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `remember_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `role_id`, `enable`, `remember_pass`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$xg650ljBlnnzqHSjeSIjuudxdE.oKdTvw2UGh8m8fhT.0zMEJRcEq', 0, 1, 'z7J7OnDIDD$sMTUDVdgsrn3wcROAUMCyJqduAqD$', 'U9vNVZJ1wXGUbSX2V9xIpyNpvtaR8O8KptyAyFNLp28uM0O9qgraQ85axg75', '0000-00-00 00:00:00', '2015-01-13 10:04:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosadmin`
--

CREATE TABLE IF NOT EXISTS `usuariosadmin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuariosadmin`
--

INSERT INTO `usuariosadmin` (`id`, `nombres`, `apellidos`, `email`, `cargo`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'Gerente', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioscontactos`
--

CREATE TABLE IF NOT EXISTS `usuarioscontactos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_contacto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_contacto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_contacto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_experiencia_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosdatos`
--

CREATE TABLE IF NOT EXISTS `usuariosdatos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nacionalidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_identificacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_identificacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `convencional` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vehiculo` tinyint(1) NOT NULL,
  `categoria_licencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disponible_viajar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `objetivo` text COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioseducacion`
--

CREATE TABLE IF NOT EXISTS `usuarioseducacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nivel_academico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instituto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_finalizacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosexpectativas`
--

CREATE TABLE IF NOT EXISTS `usuariosexpectativas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `interes_laboral` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expectativa_salarial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion_laboral` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `areas_interes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `puesto_interes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosexperiencias`
--

CREATE TABLE IF NOT EXISTS `usuariosexperiencias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actividad_empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `puesto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_fin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logros` text COLLATE utf8_unicode_ci NOT NULL,
  `funciones` text COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioshabilidades`
--

CREATE TABLE IF NOT EXISTS `usuarioshabilidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `base_datos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frameworks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lenguajes_programacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `programas_aplicacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `programas_diseno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sistemas_operativos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosotros`
--

CREATE TABLE IF NOT EXISTS `usuariosotros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idioma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_dominio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `habilidad1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_dominio1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `habilidad2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_dominio2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `habilidad3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_dominio3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacantes`
--

CREATE TABLE IF NOT EXISTS `vacantes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` text COLLATE utf8_unicode_ci NOT NULL,
  `requisitos` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `area_interes` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `vacantes`
--

INSERT INTO `vacantes` (`id`, `titulo`, `fecha`, `departamento`, `requisitos`, `descripcion`, `area_interes`, `logo`, `enable`, `created_at`, `updated_at`) VALUES
(1, 'Programador', '2015-01-07', 'Managua', 'PHP, HTML, CSS', 'que sepa programar, tener amplios conocimientos en HTML y CSS. Buenas pracitcas en programacion', 'Informatica|Internet', 'Programadorlogo.png', 1, '2015-01-08 10:17:22', '2015-01-08 10:54:54'),
(2, 'Prueba', '2015-01-12', 'Managua', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, magni nisi. Aut voluptas maiores, excepturi in ipsam fuga, exercitationem incidunt fugiat fugit aliquam expedita illum! Sit maiores, delectus temporibus porro!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, magni nisi. Aut voluptas maiores, excepturi in ipsam fuga, exercitationem incidunt fugiat fugit aliquam expedita illum! Sit maiores, delectus temporibus porro!', 'Administracion', 'Pruebalogo.png', 1, '2015-01-13 06:34:10', '2015-01-13 06:35:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacantesusuarios`
--

CREATE TABLE IF NOT EXISTS `vacantesusuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vacante_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
