-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `padel48`
--
CREATE DATABASE IF NOT EXISTS `padel48`;
USE `padel48`;

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
    `dni` varchar(9) NOT NULL,
    `password` varchar(255) NOT NULL,
    `nombre` varchar(10) NOT NULL,
    `apellido` varchar(20) NOT NULL,
    `email` varchar(20) NOT NULL,
    `sexo` enum('MASC','FEM') NOT NULL,
    `telefono` int(12) NOT NULL,
    `rol` enum('ADMIN','DEPORTISTA','PROFESOR') NOT NULL,
    `numero_pistas` int(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
    `id_noticia` int(100) NOT NULL AUTO_INCREMENT,
    `usuario_id` varchar(9),
    `titulo` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
    `contenido` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
    PRIMARY KEY (`id_noticia`),
    FOREIGN KEY (`usuario_id`) REFERENCES usuarios(`dni`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

DROP TABLE IF EXISTS `pistas`;
CREATE TABLE IF NOT EXISTS `pistas` (
    `num_pista` int(2) NOT NULL AUTO_INCREMENT,
    `tipo` enum('PIEDRA','MOQUETA') CHARACTER SET latin1 NOT NULL,
    `lugar` enum('EXTERIOR','INTERIOR') CHARACTER SET latin1 NOT NULL,
    PRIMARY KEY (`num_pista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

DROP TABLE IF EXISTS `horarios`;
CREATE TABLE IF NOT EXISTS `horarios` (
    `id_horario` int(2) NOT NULL,
    `pista_id` int(2) NOT NULL,
    `hora_inicio` time NOT NULL,
    PRIMARY KEY (`id_horario`),
    FOREIGN KEY (`pista_id`) REFERENCES pistas(`num_pista`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

DROP TABLE IF EXISTS `partidos`;
CREATE TABLE IF NOT EXISTS `partidos` (
    `usuario_id` varchar(9) NOT NULL,
    `usuario_id2` varchar(9) NOT NULL,
    `usuario_id3` varchar(9) NOT NULL,
    `usuario_id4` varchar(9) NOT NULL,
    `hora` time NOT NULL,
    PRIMARY KEY (`usuario_id`,`usuario_id2`,`usuario_id3`,`usuario_id4`),

    FOREIGN KEY (`usuario_id2`) REFERENCES usuarios(`dni`) ON DELETE CASCADE,
    FOREIGN KEY (`usuario_id3`) REFERENCES usuarios(`dni`) ON DELETE CASCADE,
    FOREIGN KEY (`usuario_id4`) REFERENCES usuarios(`dni`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
    `id_usuario` varchar(9) NOT NULL,
    `pista_id` int(2) NOT NULL,
    `hora` int(2) NOT NULL,
    `fecha` date NOT NULL,
    PRIMARY KEY (`id_usuario`,`pista_id`,`hora`,`fecha`),
    FOREIGN KEY (`pista_id`) REFERENCES pistas(`num_pista`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeonatos`
--

DROP TABLE IF EXISTS `campeonatos`;
CREATE TABLE IF NOT EXISTS `campeonatos` (
    `id_campeonato` int(4) NOT NULL AUTO_INCREMENT,
    `fecha_inicio` date NOT NULL,
    `fecha_fin` date NOT NULL,
    PRIMARY KEY (`id_campeonato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
    `id_categoria` int(4) NOT NULL,
    `campeonato_id` int(4) NOT NULL,
    `tipo` enum('MASC','FEM','MIXTO') NOT NULL,
    `nivel` int(2) NOT NULL,
    PRIMARY KEY (`id_categoria`, `campeonato_id`),
    FOREIGN KEY (`campeonato_id`) REFERENCES campeonatos(`id_campeonato`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
    `id_grupo` int(4) NOT NULL AUTO_INCREMENT,
    `campeonato_id` int(4) NOT NULL,
    `categoria_id` int(4) NOT NULL,

    PRIMARY KEY (`id_grupo`),
    FOREIGN KEY (`campeonato_id`) REFERENCES categorias(`campeonato_id`) ON DELETE CASCADE,
    FOREIGN KEY (`categoria_id`) REFERENCES categorias(`id_categoria`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfrentamientos`
--

DROP TABLE IF EXISTS `enfrentamientos`;
CREATE TABLE IF NOT EXISTS `enfrentamientos` (
    `id_enfrentamiento` int(6) NOT NULL AUTO_INCREMENT,
    `grupo_id` int(4) NOT NULL,
    `hora` time DEFAULT NULL,
    `fecha` date DEFAULT NULL,
    `fase` int(1) NOT NULL,
    PRIMARY KEY (`id_enfrentamiento`),
    FOREIGN KEY (`grupo_id`) REFERENCES grupos(`id_grupo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas`
--

DROP TABLE IF EXISTS `parejas`;
CREATE TABLE IF NOT EXISTS `parejas` (
    `id` int(6) NOT NULL AUTO_INCREMENT,
    `id_capitan` varchar(9) NOT NULL,
    `id_pareja` varchar(9) NOT NULL,
    `campeonato_id` int(4) NOT NULL,
    `grupo_id` int(4) DEFAULT NULL,
    `categoria_id` int(4) NOT NULL,
    `puntuacion` int(2) NOT NULL,
    `clasificado` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`),

    FOREIGN KEY (`id_capitan`) REFERENCES usuarios(`dni`) ON DELETE CASCADE,
    FOREIGN KEY (`id_pareja`) REFERENCES usuarios(`dni`) ON DELETE CASCADE,
    FOREIGN KEY (`campeonato_id`) REFERENCES categorias(`id_categoria`) ON DELETE CASCADE,
    FOREIGN KEY (`grupo_id`) REFERENCES enfrentamientos(`grupo_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas_disputan_enfrentamiento`
--

DROP TABLE IF EXISTS `parejas_disputan_enfrentamiento`;
CREATE TABLE IF NOT EXISTS `parejas_disputan_enfrentamiento` (
    `id_capitan1` varchar(9) NOT NULL,
    `id_capitan2` varchar(9) NOT NULL,
    `enfrentamiento_id` int(6) NOT NULL,
    `resultado` varchar(9) DEFAULT NULL,
    PRIMARY KEY (`id_capitan1`,`id_capitan2`,`enfrentamiento_id`),

    FOREIGN KEY (`id_capitan1`) REFERENCES parejas(`id_capitan`) ON DELETE CASCADE,
    FOREIGN KEY (`id_capitan2`) REFERENCES parejas(`id_capitan`) ON DELETE CASCADE,
    FOREIGN KEY (`enfrentamiento_id`) REFERENCES enfrentamientos(`id_enfrentamiento`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas_propuestas`
--

DROP TABLE IF EXISTS `fechas_propuestas`;
CREATE TABLE IF NOT EXISTS `fechas_propuestas` (
    `id` int(6) NOT NULL AUTO_INCREMENT,
    `enfrentamiento_id` int(6) NOT NULL,
    `creador` varchar(9) NOT NULL,
    `hora` time NOT NULL,
    `fecha` date NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`enfrentamiento_id`) REFERENCES enfrentamientos(`id_enfrentamiento`) ON DELETE CASCADE ,
    FOREIGN KEY (`creador`) REFERENCES parejas(`id_capitan`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
