-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2014 a las 07:21:27
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
('2014_12_19_004907_create_usuariosadmin_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'norwingc', '$2y$10$b2ixtYETW7sODUhX03QpruKTZc.SR2rtSTdzciD1ya1Oowa8qSkDS', 3, '4t5u5oSpWbG8FUICjCWIDdECaSYPvO1j0Dipb2cFCnYXxlkGTZbjkpNVWTtP', '2014-12-20 13:02:35', '2014-12-26 07:31:06'),
(2, 'norwingc1', '$2y$10$b2ixtYETW7sODUhX03QpruKTZc.SR2rtSTdzciD1ya1Oowa8qSkDS', 3, 'N5e0QsgxThMD415Jm6Lf2kuv46RPXfFWDOd8nEf1Tcqs7juKvHfhDkaO2Ixn', '2014-12-20 13:02:35', '2014-12-26 07:20:37');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuariosdatos`
--

INSERT INTO `usuariosdatos` (`id`, `nombres`, `apellidos`, `fecha_nacimiento`, `estado_civil`, `genero`, `nacionalidad`, `tipo_identificacion`, `no_identificacion`, `departamento`, `direccion`, `convencional`, `celular`, `email`, `vehiculo`, `categoria_licencia`, `disponible_viajar`, `foto`, `objetivo`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'Norwin Scott', 'Guerrero Cruz', '1992-05-19', 'Union libre', 'Masculino', 'Nicaragua', 'Cedula', '001-190592-001C', 'Managua', 'managua', '2280-6259', '8474-8716', 'norwingc_war@outlook.com', 1, 'Vehiculo liviano,Vehiculo pesado', '0', 'norwingcbullTerrierAmericano.jpeg', 'bien fasfasdf', 1, '2014-12-20 13:02:35', '2014-12-27 10:22:04'),
(2, 'Norwin Scott', 'Guerrero Cruz', '1992-05-19', 'Union libre', 'Masculino', 'Nicaragua', 'Cedula', '001-190592-001C', 'Managua', 'managua', '2280-6259', '8474-8716', 'norwingc_war@outlook.com', 1, 'Vehiculo liviano,Vehiculo pesado', '0', 'norwingcbullTerrierAmericano.jpeg', 'bien fasfasdf', 2, '2014-12-20 13:02:35', '2014-12-27 10:22:04');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarioseducacion`
--

INSERT INTO `usuarioseducacion` (`id`, `nivel_academico`, `titulo`, `instituto`, `fecha_finalizacion`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'Sin Estudios Formales', 'PhD2', 'Ave Maria University', '2014-12-06', 1, '2014-12-20 13:02:35', '2014-12-28 11:15:41'),
(2, 'Doctorado', 'Ingenieria de sistemas', 'Ave Maria University', '2014-12-06', 1, '2014-12-20 13:02:35', '2014-12-29 02:22:57'),
(3, 'Doctorado', 'Ingenieria de sistemas', 'Ave Maria University', '2014-12-06', 2, '2014-12-20 13:02:35', '2014-12-29 02:22:57');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuariosexpectativas`
--

INSERT INTO `usuariosexpectativas` (`id`, `interes_laboral`, `expectativa_salarial`, `ubicacion_laboral`, `areas_interes`, `puesto_interes`, `horario`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'Busqueda Activa', '5701-6000', 'Boaco', 'Puestos Profesionales, Administracion, Informatica|Internet', 'Promotor de Ventas|Impulsador|Display', 'Por Temporada', 1, '2014-12-20 13:02:35', '2014-12-28 10:58:09');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuariosexperiencias`
--

INSERT INTO `usuariosexperiencias` (`id`, `nombre_empresa`, `actividad_empresa`, `telefono_empresa`, `area`, `puesto`, `fecha_inicio`, `fecha_fin`, `logros`, `funciones`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'DoctorPC1', 'Aduana|Agencia Aduaneras', '6546-4654', 'Banca|Servicios Financieros', 'senior dev', '2014-12-05', '2014-12-07', 'ffffee', 'qqqqee', 1, '2014-12-20 13:02:35', '2014-12-28 11:08:53'),
(2, 'DoctorPC2', 'Aduana|Agencia Aduaneras', '6546-4654', 'Banca|Servicios Financieros', 'senior dev', '2014-12-05', '2014-12-07', 'ffffee', 'qqqqee', 1, '2014-12-20 13:02:35', '2014-12-28 11:09:35'),
(3, 'DoctorPC2', 'Aduana|Agencia Aduaneras', '6546-4654', 'Banca|Servicios Financieros', 'senior dev', '2014-12-05', '2014-12-07', 'ffffee', 'qqqqee', 2, '2014-12-20 13:02:35', '2014-12-28 11:09:35');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarioshabilidades`
--

INSERT INTO `usuarioshabilidades` (`id`, `base_datos`, `frameworks`, `lenguajes_programacion`, `programas_aplicacion`, `programas_diseno`, `sistemas_operativos`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'Access', 'Laravel', 'ASP', 'Excel', 'Flash', 'Linux', 1, '2014-12-20 13:02:35', '2014-12-20 13:02:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosotros`
--

CREATE TABLE IF NOT EXISTS `usuariosotros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idioma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_dominio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `habilidad` text COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuariosotros`
--

INSERT INTO `usuariosotros` (`id`, `idioma`, `nivel_dominio`, `habilidad`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'Aleman', 'Intermedio', 'laravel, HTML', 1, '2014-12-20 13:02:35', '2014-12-28 11:37:37'),
(2, 'Aleman', 'Intermedio', 'laravel, HTML', 2, '2014-12-20 13:02:35', '2014-12-28 11:37:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
