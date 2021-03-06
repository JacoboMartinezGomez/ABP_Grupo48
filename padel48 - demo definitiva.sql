-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2020 a las 12:56:18
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

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
CREATE DATABASE IF NOT EXISTS `padel48` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `padel48`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeonatos`
--

DROP TABLE IF EXISTS `campeonatos`;
CREATE TABLE IF NOT EXISTS `campeonatos` (
  `id_campeonato` int(4) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `precio` int(3) NOT NULL,
  PRIMARY KEY (`id_campeonato`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `campeonatos`
--

INSERT INTO `campeonatos` (`id_campeonato`, `fecha_inicio`, `fecha_fin`, `precio`) VALUES
(31, '2020-01-25', '2020-02-22', 0),
(32, '2020-01-29', '2020-03-22', 0);

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
  PRIMARY KEY (`id_categoria`,`campeonato_id`),
  KEY `campeonato_id` (`campeonato_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `campeonato_id`, `tipo`, `nivel`) VALUES
(0, 31, 'MASC', 1),
(0, 32, 'MASC', 1),
(1, 31, 'FEM', 1),
(1, 32, 'FEM', 1),
(2, 31, 'MIXTO', 1),
(2, 32, 'MIXTO', 1),
(3, 31, 'MASC', 2),
(3, 32, 'MASC', 2),
(4, 31, 'FEM', 2),
(4, 32, 'FEM', 2),
(5, 31, 'MIXTO', 2),
(5, 32, 'MIXTO', 2),
(6, 31, 'MASC', 3),
(6, 32, 'MASC', 3),
(7, 31, 'FEM', 3),
(7, 32, 'FEM', 3),
(8, 31, 'MIXTO', 3),
(8, 32, 'MIXTO', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_grupales`
--

DROP TABLE IF EXISTS `clases_grupales`;
CREATE TABLE IF NOT EXISTS `clases_grupales` (
  `id_claseGrupal` int(4) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `hora` time NOT NULL,
  `usuario_id` varchar(9) CHARACTER SET utf8 NOT NULL,
  `num_max_apuntados` int(2) NOT NULL,
  `num_actual_apuntados` int(2) NOT NULL,
  `precio` int(3) NOT NULL,
  `pista_reserva` int(2) NOT NULL,
  `hora_reserva` int(2) NOT NULL,
  `fecha_reserva` date NOT NULL,
  PRIMARY KEY (`id_claseGrupal`),
  KEY `clases_ibfk_1` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clases_grupales`
--

INSERT INTO `clases_grupales` (`id_claseGrupal`, `fecha_inicio`, `hora`, `usuario_id`, `num_max_apuntados`, `num_actual_apuntados`, `precio`, `pista_reserva`, `hora_reserva`, `fecha_reserva`) VALUES
(16, '2020-01-24', '09:00:00', '785027203', 10, 2, 20, 1, 1, '2020-01-24'),
(17, '2020-01-28', '09:00:00', '527941097', 18, 0, 30, 1, 1, '2020-01-28');

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
  KEY `grupo_id` (`grupo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enfrentamientos`
--

INSERT INTO `enfrentamientos` (`id_enfrentamiento`, `grupo_id`, `hora`, `fecha`, `fase`) VALUES
(37, 1, NULL, NULL, 1),
(38, 1, NULL, NULL, 1),
(39, 1, NULL, NULL, 1),
(40, 1, NULL, NULL, 1),
(41, 1, NULL, NULL, 1),
(42, 1, NULL, NULL, 1),
(43, 1, NULL, NULL, 1),
(44, 1, NULL, NULL, 1),
(45, 1, NULL, NULL, 1),
(46, 1, NULL, NULL, 1),
(47, 1, NULL, NULL, 1),
(48, 1, NULL, NULL, 1),
(49, 1, NULL, NULL, 1),
(50, 1, NULL, NULL, 1),
(51, 1, NULL, NULL, 1),
(52, 1, NULL, NULL, 1),
(53, 1, NULL, NULL, 1),
(54, 1, NULL, NULL, 1),
(55, 1, NULL, NULL, 1),
(56, 1, NULL, NULL, 1),
(57, 1, NULL, NULL, 1),
(58, 1, NULL, NULL, 1),
(59, 1, NULL, NULL, 1),
(60, 1, NULL, NULL, 1),
(61, 1, NULL, NULL, 1),
(62, 1, NULL, NULL, 1),
(63, 1, NULL, NULL, 1),
(64, 1, NULL, NULL, 1);

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
  KEY `enfrentamiento_id` (`enfrentamiento_id`),
  KEY `creador` (`creador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupo` int(4) NOT NULL,
  `campeonato_id` int(4) NOT NULL,
  `categoria_id` int(4) NOT NULL,
  PRIMARY KEY (`id_grupo`,`campeonato_id`,`categoria_id`),
  KEY `campeonato_id` (`campeonato_id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `campeonato_id`, `categoria_id`) VALUES
(1, 32, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

DROP TABLE IF EXISTS `horarios`;
CREATE TABLE IF NOT EXISTS `horarios` (
  `id_horario` int(2) NOT NULL AUTO_INCREMENT,
  `pista_id` int(2) NOT NULL,
  `hora_inicio` time NOT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `pista_id` (`pista_id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `pista_id`, `hora_inicio`) VALUES
(1, 1, '09:00:00'),
(2, 1, '10:30:00'),
(3, 1, '12:00:00'),
(4, 1, '13:30:00'),
(5, 1, '15:00:00'),
(6, 1, '16:30:00'),
(7, 1, '18:00:00'),
(8, 1, '19:30:00'),
(9, 1, '21:00:00'),
(10, 2, '09:00:00'),
(11, 2, '10:30:00'),
(12, 2, '12:00:00'),
(13, 2, '13:30:00'),
(14, 2, '15:00:00'),
(15, 2, '16:30:00'),
(16, 2, '18:00:00'),
(17, 2, '19:30:00'),
(18, 2, '21:00:00'),
(19, 3, '09:00:00'),
(20, 3, '10:30:00'),
(21, 3, '12:00:00'),
(22, 3, '13:30:00'),
(23, 3, '15:00:00'),
(24, 3, '16:30:00'),
(25, 3, '18:00:00'),
(26, 3, '19:30:00'),
(27, 3, '21:00:00'),
(28, 4, '09:00:00'),
(29, 4, '10:30:00'),
(30, 4, '12:00:00'),
(31, 4, '13:30:00'),
(32, 4, '15:00:00'),
(33, 4, '16:30:00'),
(34, 4, '18:00:00'),
(35, 4, '19:30:00'),
(36, 4, '21:00:00'),
(37, 5, '09:00:00'),
(38, 5, '10:30:00'),
(39, 5, '12:00:00'),
(40, 5, '13:30:00'),
(41, 5, '15:00:00'),
(42, 5, '16:30:00'),
(43, 5, '18:00:00'),
(44, 5, '19:30:00'),
(45, 5, '21:00:00'),
(46, 6, '09:00:00'),
(47, 6, '10:30:00'),
(48, 6, '12:00:00'),
(49, 6, '13:30:00'),
(50, 6, '15:00:00'),
(51, 6, '16:30:00'),
(52, 6, '18:00:00'),
(53, 6, '19:30:00'),
(54, 6, '21:00:00'),
(55, 7, '09:00:00'),
(56, 7, '10:30:00'),
(57, 7, '12:00:00'),
(58, 7, '13:30:00'),
(59, 7, '15:00:00'),
(60, 7, '16:30:00'),
(61, 7, '18:00:00'),
(62, 7, '19:30:00'),
(63, 7, '21:00:00'),
(64, 8, '09:00:00'),
(65, 8, '10:30:00'),
(66, 8, '12:00:00'),
(67, 8, '13:30:00'),
(68, 8, '15:00:00'),
(69, 8, '16:30:00'),
(70, 8, '18:00:00'),
(71, 8, '19:30:00'),
(72, 8, '21:00:00'),
(73, 9, '09:00:00'),
(74, 9, '10:30:00'),
(75, 9, '12:00:00'),
(76, 9, '13:30:00'),
(77, 9, '15:00:00'),
(78, 9, '16:30:00'),
(79, 9, '18:00:00'),
(80, 9, '19:30:00'),
(81, 9, '21:00:00'),
(82, 10, '09:00:00'),
(83, 10, '10:30:00'),
(84, 10, '12:00:00'),
(85, 10, '13:30:00'),
(86, 10, '15:00:00'),
(87, 10, '16:30:00'),
(88, 10, '18:00:00'),
(89, 10, '19:30:00'),
(90, 10, '21:00:00'),
(91, 11, '09:00:00'),
(92, 11, '10:30:00'),
(93, 11, '12:00:00'),
(94, 11, '13:30:00'),
(95, 11, '15:00:00'),
(96, 11, '16:30:00'),
(97, 11, '18:00:00'),
(98, 11, '19:30:00'),
(99, 11, '21:00:00'),
(100, 12, '09:00:00'),
(101, 12, '10:30:00'),
(102, 12, '12:00:00'),
(103, 12, '13:30:00'),
(104, 12, '15:00:00'),
(105, 12, '16:30:00'),
(106, 12, '18:00:00'),
(107, 12, '19:30:00'),
(108, 12, '21:00:00'),
(109, 13, '09:00:00'),
(110, 13, '10:30:00'),
(111, 13, '12:00:00'),
(112, 13, '13:30:00'),
(113, 13, '15:00:00'),
(114, 13, '16:30:00'),
(115, 13, '18:00:00'),
(116, 13, '19:30:00'),
(117, 13, '21:00:00'),
(118, 14, '09:00:00'),
(119, 14, '10:30:00'),
(120, 14, '12:00:00'),
(121, 14, '13:30:00'),
(122, 14, '15:00:00'),
(123, 14, '16:30:00'),
(124, 14, '18:00:00'),
(125, 14, '19:30:00'),
(126, 14, '21:00:00'),
(127, 15, '09:00:00'),
(128, 15, '10:30:00'),
(129, 15, '12:00:00'),
(130, 15, '13:30:00'),
(131, 15, '15:00:00'),
(132, 15, '16:30:00'),
(133, 15, '18:00:00'),
(134, 15, '19:30:00'),
(135, 15, '21:00:00'),
(136, 16, '09:00:00'),
(137, 16, '10:30:00'),
(138, 16, '12:00:00'),
(139, 16, '13:30:00'),
(140, 16, '15:00:00'),
(141, 16, '16:30:00'),
(142, 16, '18:00:00'),
(143, 16, '19:30:00'),
(144, 16, '21:00:00'),
(145, 17, '09:00:00'),
(146, 17, '10:30:00'),
(147, 17, '12:00:00'),
(148, 17, '13:30:00'),
(149, 17, '15:00:00'),
(150, 17, '16:30:00'),
(151, 17, '18:00:00'),
(152, 17, '19:30:00'),
(153, 17, '21:00:00'),
(154, 18, '09:00:00'),
(155, 18, '10:30:00'),
(156, 18, '12:00:00'),
(157, 18, '13:30:00'),
(158, 18, '15:00:00'),
(159, 18, '16:30:00'),
(160, 18, '18:00:00'),
(161, 18, '19:30:00'),
(162, 18, '21:00:00'),
(163, 19, '09:00:00'),
(164, 19, '10:30:00'),
(165, 19, '12:00:00'),
(166, 19, '13:30:00'),
(167, 19, '15:00:00'),
(168, 19, '16:30:00'),
(169, 19, '18:00:00'),
(170, 19, '19:30:00'),
(171, 19, '21:00:00'),
(172, 20, '09:00:00'),
(173, 20, '10:30:00'),
(174, 20, '12:00:00'),
(175, 20, '13:30:00'),
(176, 20, '15:00:00'),
(177, 20, '16:30:00'),
(178, 20, '18:00:00'),
(179, 20, '19:30:00'),
(180, 20, '21:00:00'),
(181, 21, '09:00:00'),
(182, 21, '10:30:00'),
(183, 21, '12:00:00'),
(184, 21, '13:30:00'),
(185, 21, '15:00:00'),
(186, 21, '16:30:00'),
(187, 21, '18:00:00'),
(188, 21, '19:30:00'),
(189, 21, '21:00:00'),
(190, 22, '09:00:00'),
(191, 22, '10:30:00'),
(192, 22, '12:00:00'),
(193, 22, '13:30:00'),
(194, 22, '15:00:00'),
(195, 22, '16:30:00'),
(196, 22, '18:00:00'),
(197, 22, '19:30:00'),
(198, 22, '21:00:00'),
(199, 23, '09:00:00'),
(200, 23, '10:30:00'),
(201, 23, '12:00:00'),
(202, 23, '13:30:00'),
(203, 23, '15:00:00'),
(204, 23, '16:30:00'),
(205, 23, '18:00:00'),
(206, 23, '19:30:00'),
(207, 23, '21:00:00'),
(208, 24, '09:00:00'),
(209, 24, '10:30:00'),
(210, 24, '12:00:00'),
(211, 24, '13:30:00'),
(212, 24, '15:00:00'),
(213, 24, '16:30:00'),
(214, 24, '18:00:00'),
(215, 24, '19:30:00'),
(216, 24, '21:00:00'),
(217, 25, '09:00:00'),
(218, 25, '10:30:00'),
(219, 25, '12:00:00'),
(220, 25, '13:30:00'),
(221, 25, '15:00:00'),
(222, 25, '16:30:00'),
(223, 25, '18:00:00'),
(224, 25, '19:30:00'),
(225, 25, '21:00:00'),
(226, 26, '09:00:00'),
(227, 26, '10:30:00'),
(228, 26, '12:00:00'),
(229, 26, '13:30:00'),
(230, 26, '15:00:00'),
(231, 26, '16:30:00'),
(232, 26, '18:00:00'),
(233, 26, '19:30:00'),
(234, 26, '21:00:00'),
(235, 27, '09:00:00'),
(236, 27, '10:30:00'),
(237, 27, '12:00:00'),
(238, 27, '13:30:00'),
(239, 27, '15:00:00'),
(240, 27, '16:30:00'),
(241, 27, '18:00:00'),
(242, 27, '19:30:00'),
(243, 27, '21:00:00'),
(244, 28, '09:00:00'),
(245, 28, '10:30:00'),
(246, 28, '12:00:00'),
(247, 28, '13:30:00'),
(248, 28, '15:00:00'),
(249, 28, '16:30:00'),
(250, 28, '18:00:00'),
(251, 28, '19:30:00'),
(252, 28, '21:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id_noticia` int(100) NOT NULL AUTO_INCREMENT,
  `usuario_id` varchar(9) DEFAULT NULL,
  `titulo` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `contenido` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id_noticia`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `usuario_id`, `titulo`, `contenido`) VALUES
(2, '607499242', '928', 'Drainage of Left Vertebral Artery, Open Approach'),
(3, '357255194', 'GTI', 'Fluoroscopy of Inferior Vena Cava using Other Contrast, Guidance'),
(4, '117098874', 'G-Class', 'Dilation of Hepatic Artery with Four or More Drug-eluting Intraluminal Devices, Open Approach'),
(5, '853891162', 'Charger', 'Dilation of Left Colic Artery, Bifurcation, with Drug-eluting Intraluminal Device, Percutaneous Approach'),
(6, '227109220', 'Voyager', 'Occlusion of Right Anterior Tibial Artery with Extraluminal Device, Percutaneous Endoscopic Approach'),
(7, '23173074E', 'Elantra', 'Dilation of Cystic Duct with Intraluminal Device, Open Approach'),
(8, '382690174', 'Sierra 2500', 'Revision of Autologous Tissue Substitute in Uterus and Cervix, Open Approach'),
(9, '984999228', 'Swift', 'Bypass Right Pleural Cavity to Pelvic Cavity with Synthetic Substitute, Percutaneous Endoscopic Approach'),
(10, '797684934', 'Millenia', 'Computerized Tomography (CT Scan) of Head using Other Contrast, Unenhanced and Enhanced'),
(11, '557961050', 'Somerset', 'Drainage of Right Internal Mammary Artery, Percutaneous Approach'),
(12, '831909214', 'Spectra', 'Extirpation of Matter from Left Lower Arm and Wrist Muscle, Percutaneous Approach'),
(13, '716713376', 'Tucson', 'Beam Radiation of Sinuses using Photons <1 MeV'),
(14, '388867929', 'Ram Van 1500', 'Inspection of Left Metacarpophalangeal Joint, Percutaneous Approach'),
(15, '227109220', 'RX', 'Insertion of Tissue Expander into Right Lower Leg Subcutaneous Tissue and Fascia, Open Approach'),
(16, '230980999', 'Ram 3500', 'Revision of Radioactive Element in Respiratory Tract, External Approach'),
(17, '669923112', 'Acclaim', 'Division of Left Abdomen Tendon, Percutaneous Approach'),
(18, '856347807', 'MKT', 'Release Right Axillary Lymphatic, Percutaneous Endoscopic Approach'),
(19, '616747625', 'Explorer', 'Release Left Clavicle, Open Approach'),
(20, '739972759', 'Camry', 'Excision of Esophagus, Via Natural or Artificial Opening Endoscopic, Diagnostic'),
(21, '133230188', 'Mirage', 'Fragmentation in Common Bile Duct, External Approach'),
(22, '415083124', 'Outlook', 'Removal of Drainage Device from Endocrine Gland, External Approach'),
(23, '669923112', '3 Series', 'Drainage of Left External Jugular Vein, Open Approach, Diagnostic'),
(24, '739972759', 'TT', 'Excision of Left Wrist Region, Percutaneous Approach, Diagnostic'),
(25, '666655821', 'XC90', 'Bypass Left Atrium to Right Pulmonary Artery with Nonautologous Tissue Substitute, Open Approach'),
(26, '782970053', 'Town & Country', 'Restriction of Urethra with Intraluminal Device, Open Approach'),
(27, '870344358', 'Spirit', 'Irrigation of Female Reproductive using Irrigating Substance, Percutaneous Approach, Diagnostic'),
(28, '147195149', 'Grand Caravan', 'Supplement Pelvis Lymphatic with Nonautologous Tissue Substitute, Open Approach'),
(29, '68658023X', 'Monaco', 'Extirpation of Matter from Left Temporal Artery, Open Approach'),
(30, '462386523', 'EX', 'Introduction of Other Anti-infective into Epidural Space, Percutaneous Approach'),
(31, '634130401', 'LS', 'Removal of Synthetic Substitute from Cervical Vertebral Disc, Percutaneous Approach'),
(32, '999782009', 'Liberty', 'Destruction of Esophagus, Open Approach'),
(33, '672601318', 'Grand Prix', 'Replacement of Splenic Artery with Autologous Tissue Substitute, Percutaneous Endoscopic Approach'),
(34, '117098874', 'Cobalt', 'Repair Right Foot, External Approach'),
(35, '432192846', 'xB', 'Drainage of Right Epididymis, Open Approach, Diagnostic'),
(36, '532118235', '88', 'Drainage of Cisterna Chyli, Percutaneous Endoscopic Approach, Diagnostic'),
(37, '306843557', 'Mazda6', 'Measurement of Products of Conception, Nervous Conductivity, Via Natural or Artificial Opening Endoscopic'),
(38, '716713376', 'STS', 'Dilation of Vagina, Percutaneous Approach'),
(39, '666655821', 'Escalade EXT', 'Drainage of Thoracic Vertebra, Open Approach'),
(40, '797684934', 'DeVille', 'Removal of Infusion Device from Great Vessel, Percutaneous Endoscopic Approach'),
(41, '68658023X', 'Amigo', 'Supplement Right Upper Femur with Nonautologous Tissue Substitute, Open Approach'),
(42, '199440432', 'Pilot', 'Low Dose Rate (LDR) Brachytherapy of Nasopharynx using Iodine 125 (I-125)'),
(43, '557961050', 'Altima', 'Dilation of Abdominal Aorta, Bifurcation, with Intraluminal Device, Percutaneous Approach'),
(44, '234235479', 'Aspire', 'Removal of External Fixation Device from Right Humeral Head, Percutaneous Approach'),
(45, '959589423', 'Grand Am', 'Extirpation of Matter from Celiac Artery, Percutaneous Approach'),
(46, '935422929', 'Ram Van 3500', 'Beam Radiation of Sinuses using Heavy Particles (Protons,Ions)'),
(47, '319531321', 'S-Series', 'Drainage of Right Elbow Joint, Percutaneous Approach, Diagnostic'),
(48, '137337399', 'XC90', 'Drainage of Right Lower Femur with Drainage Device, Percutaneous Approach'),
(49, '999782009', 'Verona', 'Drainage of Neck Skin with Drainage Device, External Approach'),
(50, '959589423', 'GS', 'Removal of Radioactive Element from Respiratory Tract, Via Natural or Artificial Opening'),
(51, '486944964', 'SLK-Class', 'Extirpation of Matter from Left Sacroiliac Joint, Percutaneous Endoscopic Approach'),
(52, '428940719', 'S90', 'Dilation of Stomach, Pylorus, Percutaneous Endoscopic Approach'),
(53, '388867929', 'CLS-Class', 'Drainage of Left Foot Artery, Open Approach'),
(54, '409886497', '7 Series', 'Repair Right 3rd Toe, External Approach'),
(55, '54868519H', 'Monte Carlo', 'Repair Right Elbow Joint, Percutaneous Approach'),
(56, '409218805', 'Quattroporte', 'Measurement of Urinary Contractility, Via Natural or Artificial Opening'),
(57, '599144702', 'XC70', 'Restriction of Left Internal Iliac Artery, Open Approach'),
(58, '137337399', 'E-Series', 'Bypass Jejunum to Descending Colon with Autologous Tissue Substitute, Via Natural or Artificial Opening Endoscopic'),
(59, '797684934', 'Rally Wagon 3500', 'Monitoring of Venous Flow, Peripheral, External Approach'),
(60, '935422929', 'Quest', 'Excision of Right Lower Extremity Bursa and Ligament, Percutaneous Endoscopic Approach, Diagnostic'),
(61, '432192846', 'Mirage', 'Fusion of Left Metatarsal-Tarsal Joint, Percutaneous Approach'),
(62, '409218805', 'Outback', 'Dilation of Middle Colic Artery with Four or More Intraluminal Devices, Percutaneous Endoscopic Approach'),
(63, '137337399', 'Caravan', 'Drainage of Cranial Cavity, Open Approach, Diagnostic'),
(64, '451067658', 'Sentra', 'Repair Left Thorax Bursa and Ligament, Open Approach'),
(65, '599144702', 'XL-7', 'Revision of Autologous Tissue Substitute in Mediastinum, Open Approach'),
(66, '382690174', 'Maxima', 'Revision of Synthetic Substitute in Cranial Cavity, Open Approach'),
(67, '183280131', 'Laser', 'Drainage of Left Lens with Drainage Device, Percutaneous Approach'),
(68, '557961050', '760', 'Restriction of Ductus Arteriosus, Percutaneous Approach'),
(69, '147195149', 'Dakota', 'Resection of Lower Tooth, Single, Open Approach'),
(70, '319531321', 'Yukon XL 1500', 'Reposition Lumbar Vertebra with Internal Fixation Device, Percutaneous Endoscopic Approach'),
(71, '207933559', 'Land Cruiser', 'Occlusion of Left Brachial Vein with Intraluminal Device, Percutaneous Approach'),
(72, '116813347', 'Fleetwood', 'Repair Bilateral Femoral Region, External Approach'),
(73, '357255194', 'New Beetle', 'Destruction of Bilateral Lungs, Percutaneous Approach'),
(74, '669923112', 'SJ', 'Occlusion of Right Middle Lobe Bronchus with Intraluminal Device, Percutaneous Endoscopic Approach'),
(75, '165415664', 'Ion', 'Beam Radiation of Mediastinum using Photons >10 MeV'),
(76, '148223561', 'Murciélago', 'High Dose Rate (HDR) Brachytherapy of Ileum using Iridium 192 (Ir-192)'),
(77, '234235479', 'MKT', 'Computerized Tomography (CT Scan) of Right Upper Arm using Other Contrast'),
(78, '620643725', 'Discovery', 'Replacement of Right Lower Arm Skin with Autologous Tissue Substitute, Partial Thickness, External Approach'),
(79, '500346539', 'S10', 'Revision of Synthetic Substitute in Cervicothoracic Vertebral Disc, External Approach'),
(80, '634130401', 'Excel', 'Extirpation of Matter from Perineum Muscle, Open Approach'),
(81, 'admin', 'titulo', 'asdfasdfoahsidu');

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
  KEY `id_capitan` (`id_capitan`),
  KEY `id_pareja` (`id_pareja`),
  KEY `grupo_id` (`grupo_id`),
  KEY `campeonato_id` (`campeonato_id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas`
--

INSERT INTO `parejas` (`id`, `id_capitan`, `id_pareja`, `campeonato_id`, `grupo_id`, `categoria_id`, `puntuacion`, `clasificado`) VALUES
(200, '845704775', '422200526', 31, NULL, 0, 0, 0),
(201, '327890293', '783587732', 31, NULL, 0, 0, 0),
(202, '348760570', '549642597', 31, NULL, 0, 0, 0),
(203, '417870092', '712518104', 31, NULL, 0, 0, 0),
(204, '319663035', '604237026', 31, NULL, 0, 0, 0),
(205, '349464848', '624790894', 31, NULL, 0, 0, 0),
(206, '388864730', '578136150', 31, NULL, 0, 0, 0),
(207, '907083843', '529501301', 31, NULL, 0, 0, 0),
(208, '845704775', '422200526', 32, 1, 0, 7, 0),
(209, '327890293', '783587732', 32, 1, 0, 9, 0),
(210, '348760570', '549642597', 32, 1, 0, 11, 0),
(211, '417870092', '712518104', 32, 1, 0, 13, 0),
(212, '319663035', '604237026', 32, 1, 0, 15, 0),
(213, '349464848', '624790894', 32, 1, 0, 17, 0),
(214, '388864730', '578136150', 32, 1, 0, 19, 0),
(215, '907083843', '529501301', 32, 1, 0, 21, 0),
(216, '165499594', '140163440', 31, NULL, 0, 0, 0),
(217, '754858179', '527091935', 31, NULL, 0, 0, 0),
(218, '781676647', '458724818', 31, NULL, 0, 0, 0),
(219, '197169394', '748453943', 31, NULL, 0, 0, 0),
(220, '694340944', '515577380', 31, NULL, 0, 0, 0),
(221, '145325752', '234434987', 31, NULL, 0, 0, 0),
(222, '185355764', '701665373', 31, NULL, 0, 0, 0),
(223, '209480627', '671283975', 31, NULL, 0, 0, 0),
(224, '769373116', '931939170', 31, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas_disputan_enfrentamiento`
--

DROP TABLE IF EXISTS `parejas_disputan_enfrentamiento`;
CREATE TABLE IF NOT EXISTS `parejas_disputan_enfrentamiento` (
  `id_pareja1` int(6) NOT NULL,
  `id_pareja2` int(6) NOT NULL,
  `enfrentamiento_id` int(6) NOT NULL,
  `resultado` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_pareja1`,`id_pareja2`,`enfrentamiento_id`),
  KEY `id_pareja2` (`id_pareja2`),
  KEY `enfrentamiento_id` (`enfrentamiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas_disputan_enfrentamiento`
--

INSERT INTO `parejas_disputan_enfrentamiento` (`id_pareja1`, `id_pareja2`, `enfrentamiento_id`, `resultado`) VALUES
(208, 209, 37, '208'),
(208, 210, 38, '208'),
(208, 211, 39, '208'),
(208, 212, 40, '212'),
(208, 213, 41, '213'),
(208, 214, 42, '214'),
(208, 215, 43, '208'),
(209, 210, 44, '209'),
(209, 211, 45, '209'),
(209, 212, 46, '209'),
(209, 213, 47, '209'),
(209, 214, 48, '209'),
(209, 215, 49, '215'),
(210, 211, 50, '211'),
(210, 212, 51, '212'),
(210, 213, 52, '213'),
(210, 214, 53, '210'),
(210, 215, 54, '210'),
(211, 212, 55, '212'),
(211, 213, 56, '211'),
(211, 214, 57, '211'),
(211, 215, 58, '211'),
(212, 213, 59, '212'),
(212, 214, 60, '212'),
(212, 215, 61, '212'),
(213, 214, 62, '213'),
(213, 215, 63, '213'),
(214, 215, 64, '215');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

DROP TABLE IF EXISTS `partidos`;
CREATE TABLE IF NOT EXISTS `partidos` (
  `id_partido` int(4) NOT NULL AUTO_INCREMENT,
  `usuario_id` varchar(9) DEFAULT NULL,
  `usuario_id2` varchar(9) DEFAULT NULL,
  `usuario_id3` varchar(9) DEFAULT NULL,
  `usuario_id4` varchar(9) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id_partido`),
  KEY `usuario_id` (`usuario_id`),
  KEY `usuario_id2` (`usuario_id2`),
  KEY `usuario_id3` (`usuario_id3`),
  KEY `usuario_id4` (`usuario_id4`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id_partido`, `usuario_id`, `usuario_id2`, `usuario_id3`, `usuario_id4`, `fecha`, `hora`) VALUES
(1, '897274192', '682382518', '421398410', '954872192', '2019-02-08', '13:30:00'),
(2, '560625390', '829508263', '918904416', 'admin', '2018-12-31', '15:00:00'),
(3, '785027203', '23173074E', '87012353H', NULL, '2019-11-20', '16:30:00'),
(4, '983303347', '906453410', '849126036', '463368241', '2019-03-30', '12:00:00'),
(5, '483492276', '712518104', '562103086', '809548872', '2019-06-27', '10:30:00'),
(6, '939248022', '477315580', '791204906', '816795252', '2019-02-03', '13:30:00'),
(7, '463368241', '299261579', '223456723', '419627295', '2019-09-29', '15:00:00'),
(8, '740261968', '907556725', '386710740', '829508263', '2019-01-04', '09:00:00'),
(9, '241527664', '845704775', '857470295', '699894354', '2019-06-30', '15:00:00'),
(10, '183797558', '619317241', '458933236', '774349152', '2019-04-07', '15:00:00'),
(11, '295906648', '54868519H', '422192973', '223456723', '2019-06-24', '09:00:00'),
(12, '682382518', '422192973', '355325012', '244679514', '2018-12-09', '15:00:00'),
(13, '412524503', '906453410', '684110055', '799597330', '2019-06-09', '10:30:00'),
(14, '857470295', '937893966', '349594428', '937031468', '2019-10-15', '09:00:00'),
(15, '748453943', '333255698', '624790894', '527091935', '2019-06-09', '19:30:00'),
(16, '624790894', '873398154', '595857773', '810740968', '2019-09-12', '18:00:00'),
(17, '590846091', '700966658', '177453879', '996166113', '2019-05-05', '12:00:00'),
(18, '551526909', '299261579', '906453410', '618710196', '2019-05-20', '15:00:00'),
(19, '984109351', '446286889', '562103086', '634832667', '2019-03-19', '12:00:00'),
(20, '354980908', '806542927', '221437146', '966286687', '2018-12-09', '16:30:00'),
(21, '354526622', '511483961', '974842403', '849126036', '2019-06-23', '21:00:00'),
(22, '263286644', '809126528', '511483961', '916189750', '2019-09-16', '10:30:00'),
(23, '961516230', '595857773', '147337045', '132442519', '2019-07-30', '16:30:00'),
(24, '782925669', '244109413', '788931551', '458933236', '2019-09-03', '09:00:00'),
(25, '768861630', '314543459', '140163440', '234434987', '2018-12-30', '16:30:00'),
(26, '878014762', '515577380', '121816858', '319663035', '2019-10-20', '16:30:00'),
(27, '788487512', '785027203', '961154090', '463368241', '2019-05-04', '15:00:00'),
(28, '320280522', '386710740', '527941097', '791204906', '2019-08-08', '21:00:00'),
(29, '502006982', '852477668', '578136150', '195284462', '2019-08-27', '21:00:00'),
(30, '355325012', '418936316', '194420568', '682382518', '2019-06-14', '21:00:00'),
(31, '529501301', '828801768', '319663035', '140163440', '2018-12-27', '12:00:00'),
(32, '898321723', '319663035', '419627295', '700879716', '2019-03-17', '13:30:00'),
(33, '578272115', '23173074E', '772204462', '363851645', '2018-11-28', '15:00:00'),
(34, '241527664', '972802913', '666504713', '906453410', '2019-02-04', '13:30:00'),
(35, '300307537', '873398154', '828801768', '879085790', '2018-11-18', '09:00:00'),
(36, '754826287', '782027074', '852477668', '670344302', '2019-10-07', '09:00:00'),
(37, '916189750', '221437146', '237757359', '732548621', '2019-03-25', '12:00:00'),
(38, '954872192', '961516230', '947770696', '624790894', '2019-02-28', '13:30:00'),
(39, '463368241', '258506071', '176277610', '961154090', '2019-09-21', '15:00:00'),
(40, '173013347', '604031280', '145325752', '147600003', '2019-10-03', '21:00:00'),
(41, '849126036', '311775851', '769373116', '759627847', '2019-09-17', '10:30:00'),
(42, '849126036', '950062291', '393347737', '748453943', '2019-02-01', '15:00:00'),
(43, '320280522', '673072233', '529501301', '612823218', '2018-11-08', '12:00:00'),
(44, '354526622', '241527664', '386710740', '634481846', '2019-05-01', '09:00:00'),
(45, '308579399', '779850697', '716813258', '612823218', '2019-03-21', '18:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

DROP TABLE IF EXISTS `pistas`;
CREATE TABLE IF NOT EXISTS `pistas` (
  `num_pista` int(2) NOT NULL AUTO_INCREMENT,
  `tipo` enum('PIEDRA','MOQUETA') CHARACTER SET latin1 NOT NULL,
  `lugar` enum('EXTERIOR','INTERIOR') CHARACTER SET latin1 NOT NULL,
  `precio` int(3) NOT NULL,
  PRIMARY KEY (`num_pista`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`num_pista`, `tipo`, `lugar`, `precio`) VALUES
(1, 'PIEDRA', 'INTERIOR', 24),
(2, 'PIEDRA', 'EXTERIOR', 24),
(3, 'MOQUETA', 'INTERIOR', 24),
(4, 'PIEDRA', 'EXTERIOR', 24),
(5, 'MOQUETA', 'INTERIOR', 24),
(6, 'PIEDRA', 'EXTERIOR', 24),
(7, 'MOQUETA', 'INTERIOR', 24),
(8, 'PIEDRA', 'INTERIOR', 24),
(9, 'PIEDRA', 'EXTERIOR', 24),
(10, 'PIEDRA', 'INTERIOR', 24),
(11, 'MOQUETA', 'INTERIOR', 24),
(12, 'PIEDRA', 'INTERIOR', 24),
(13, 'MOQUETA', 'EXTERIOR', 24),
(14, 'PIEDRA', 'INTERIOR', 24),
(15, 'PIEDRA', 'EXTERIOR', 24),
(16, 'PIEDRA', 'EXTERIOR', 24),
(17, 'MOQUETA', 'EXTERIOR', 24),
(18, 'MOQUETA', 'INTERIOR', 24),
(19, 'MOQUETA', 'INTERIOR', 24),
(20, 'MOQUETA', 'EXTERIOR', 24),
(21, 'PIEDRA', 'EXTERIOR', 24),
(22, 'MOQUETA', 'EXTERIOR', 24),
(23, 'MOQUETA', 'INTERIOR', 24),
(24, 'MOQUETA', 'EXTERIOR', 24),
(25, 'PIEDRA', 'EXTERIOR', 24),
(26, 'PIEDRA', 'EXTERIOR', 24),
(27, 'PIEDRA', 'INTERIOR', 24),
(28, 'PIEDRA', 'EXTERIOR', 24);

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
  KEY `pista_id` (`pista_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_usuario`, `pista_id`, `hora`, `fecha`) VALUES
('527941097', 1, 1, '2020-01-28'),
('785027203', 1, 1, '2020-01-24'),
('785027203', 1, 4, '2019-11-20'),
('785027203', 1, 5, '2019-11-21');

-- --------------------------------------------------------

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
  `socio` tinyint(1) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `password`, `nombre`, `apellido`, `email`, `sexo`, `telefono`, `rol`, `numero_pistas`, `socio`) VALUES
('113555660', '2qkPphQtdF6', 'Carlene', 'Mustarde', 'cmustarde3a@i2i.jp', 'FEM', 1140, 'DEPORTISTA', 0, 0),
('114129773', '1xzuj635', 'Eleanore', 'Bartalot', 'ebartalotv@umn.edu', 'FEM', 29184, 'DEPORTISTA', 0, 0),
('119311774', 'kB60XIRWQNz', 'Francis', 'Lannon', 'flannon43@oaic.gov.a', 'FEM', 158187, 'DEPORTISTA', 0, 0),
('120689957', 'Wm9NLnQ4RLNw', 'Virgil', 'Beldam', 'vbeldam41@mozilla.or', 'FEM', 17159, 'PROFESOR', 0, 0),
('121816858', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Siouxie', 'MacUchadair', 'smacuchadair5n@micro', 'MASC', 5239, 'DEPORTISTA', 0, 0),
('122076799', 'Engqv5iU7', 'Val', 'Panther', 'vpanther38@about.com', 'FEM', 23347, 'DEPORTISTA', 0, 0),
('124453680', 'fZaTsbD7Ezw', 'Meagan', 'Dmitrievski', 'mdmitrievski1x@amazo', 'MASC', 24146, 'ADMIN', 0, 0),
('129138487', 'FHJY4C7h', 'Shea', 'Dutteridge', 'sdutteridge50@ucoz.c', 'MASC', 3261, 'PROFESOR', 0, 0),
('132442519', 'UVupKzix', 'Dolph', 'Vellden', 'dvellden1d@exblog.jp', 'FEM', 15760, 'ADMIN', 0, 0),
('133850283', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Herbie', 'Brecknock', 'hbrecknock6b@webeden', 'MASC', 253150, 'DEPORTISTA', 0, 0),
('139373019', 'wn5Q3C', 'Cordy', 'Lilion', 'clilion25@time.com', 'FEM', 82, 'DEPORTISTA', 0, 0),
('140163440', 'M3Snn93s', 'Stafani', 'Nordass', 'snordass7v@163.com', 'MASC', 105117, 'DEPORTISTA', 0, 0),
('145325752', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Umeko', 'Klugman', 'uklugman5j@i2i.jp', 'MASC', 249156, 'DEPORTISTA', 0, 0),
('147337045', 'H2XYD4h3svDT', 'Winslow', 'Flori', 'wflori3b@redcross.or', 'MASC', 26205, 'ADMIN', 0, 0),
('147600003', 'GCZHperg5rss', 'Katine', 'Vannar', 'kvannar86@aol.com', 'FEM', 255252, 'ADMIN', 0, 0),
('148233803', 'Bxniw2Mc7S', 'Jemmy', 'Zorzutti', 'jzorzutti2o@linkedin', 'FEM', 1200, 'DEPORTISTA', 0, 0),
('148300863', 'Bxd09U', 'Angelina', 'Hattrick', 'ahattrick2y@hao123.c', 'MASC', 1231, 'ADMIN', 0, 0),
('159276698', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Hamilton', 'Bartrum', 'hbartrum61@behance.n', 'MASC', 23499, 'DEPORTISTA', 0, 0),
('165499594', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Montague', 'Van Ross', 'mvanrossp@edublogs.o', 'MASC', 909, 'DEPORTISTA', 0, 0),
('171893952', '7ZjrYuhArP', 'Bobbette', 'Unger', 'bunger4x@topsy.com', 'MASC', 774, 'PROFESOR', 0, 0),
('172687261', 'DXm6xp3Yxa', 'Lucille', 'Kirke', 'lkirke5c@tmall.com', 'FEM', 14148, 'ADMIN', 0, 0),
('173013347', 'MkqSjK6os', 'Nessie', 'Cureton', 'ncureton7o@istockpho', 'FEM', 176149, 'ADMIN', 0, 0),
('173494815', '08ozePQeBAQ', 'Amye', 'Jean', 'ajean15@facebook.com', 'FEM', 166211, 'ADMIN', 0, 0),
('176277610', 'hePJs7n3vD5S', 'Gaile', 'Hubery', 'ghubery47@reuters.co', 'FEM', 23231, 'ADMIN', 0, 0),
('176820851', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Hyacinthia', 'Daviddi', 'hdaviddi37@4shared.c', 'MASC', 56190, 'DEPORTISTA', 0, 0),
('177453879', 'tpcYqENz', 'Lion', 'Ollington', 'lollington26@t.co', 'FEM', 76143, 'ADMIN', 0, 0),
('178363375', 'ubasmUMHjkP', 'Auguste', 'Circuitt', 'acircuitt2v@noaa.gov', 'MASC', 19717, 'PROFESOR', 0, 0),
('179274787', 'AiUxv4XXLERB', 'Arnold', 'Cavee', 'acavee7i@goodreads.c', 'MASC', 167218, 'ADMIN', 0, 0),
('183797558', 'rjRnJomU', 'Cherri', 'McGibbon', 'cmcgibbon3q@amazon.d', 'MASC', 233245, 'ADMIN', 0, 0),
('185224768', 'yXn9sr7En8H', 'Hedwiga', 'Neward', 'hnewardw@hud.gov', 'MASC', 16198, 'DEPORTISTA', 0, 0),
('185355764', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Michele', 'Yankin', 'myankink@netlog.com', 'MASC', 175203, 'DEPORTISTA', 0, 0),
('189033366', '03jFr0C4', 'Starla', 'Ganter', 'sganter2z@intel.com', 'MASC', 16899, 'ADMIN', 0, 0),
('194420568', 'DovBUx1', 'Arabele', 'Lockley', 'alockley3r@wundergro', 'MASC', 90238, 'PROFESOR', 0, 0),
('195284462', 's3ZNXr', 'Agretha', 'Tearny', 'atearny82@mtv.com', 'FEM', 17716, 'DEPORTISTA', 0, 0),
('195762015', 'tf0AYy', 'Ameline', 'Bockin', 'abockin51@cbsnews.co', 'FEM', 814, 'ADMIN', 0, 0),
('197169394', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Tamqrah', 'Cockerham', 'tcockerham4m@busines', 'MASC', 164254, 'DEPORTISTA', 0, 0),
('200347733', 'XMdnXsQD', 'Ase', 'Mence', 'amence3@fotki.com', 'FEM', 89158, 'DEPORTISTA', 0, 0),
('205023227', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Elene', 'Dosdill', 'edosdill3o@cdbaby.co', 'MASC', 17430, 'DEPORTISTA', 0, 0),
('209480627', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Magdalena', 'Dragoe', 'mdragoe4b@ustream.tv', 'MASC', 239197, 'DEPORTISTA', 0, 0),
('220182586', 'ZOt1pZ2TkV', 'Simon', 'Eldrid', 'seldrid5w@livejourna', 'FEM', 46133, 'DEPORTISTA', 0, 0),
('221437146', 'HwMuThZTV', 'Dixie', 'Larking', 'dlarking59@oaic.gov.', 'FEM', 81214, 'ADMIN', 0, 0),
('223456723', 'MBDcTu', 'Morgan', 'Unthank', 'munthank3p@technorat', 'MASC', 11843, 'ADMIN', 0, 0),
('227634277', 'jcCa2uFdR', 'Gilburt', 'Murrigans', 'gmurrigans56@skyrock', 'MASC', 70, 'ADMIN', 0, 0),
('23173074E', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Jacobo', 'Martinez', 'jacmar@hotmail.com', 'MASC', 654456654, 'DEPORTISTA', 0, 0),
('234434987', 'UkrJPf6FAk', 'Fran', 'Paprotny', 'fpaprotny1o@macromed', 'MASC', 7175, 'DEPORTISTA', 0, 0),
('235078881', 'lGOuwRPNwkr', 'Rutherford', 'Doore', 'rdoore7j@psu.edu', 'FEM', 208145, 'ADMIN', 0, 0),
('235552322', 'bojDY2H8pmbv', 'Gene', 'Corby', 'gcorby88@upenn.edu', 'FEM', 16131, 'DEPORTISTA', 0, 0),
('237757359', 'FkdpGYd', 'Olin', 'Lipscombe', 'olipscombe7k@ft.com', 'MASC', 31231, 'PROFESOR', 0, 0),
('241141314', 'xWEw15B3DdY', 'Tori', 'Brailsford', 'tbrailsford2a@jimdo.', 'MASC', 223167, 'DEPORTISTA', 0, 0),
('241527664', 'lBEDljOIx', 'Donetta', 'Trask', 'dtrask3f@dmoz.org', 'FEM', 38177, 'DEPORTISTA', 0, 0),
('244109413', 'Edh0ytYE', 'Danny', 'Lackham', 'dlackham18@bluehost.', 'MASC', 117179, 'ADMIN', 0, 0),
('244679514', 'z0ybn3kAG', 'Leonora', 'Breese', 'lbreese40@gmpg.org', 'MASC', 20182, 'DEPORTISTA', 0, 0),
('255261390', 's2fWEN', 'Tris', 'Boatright', 'tboatright1k@yolasit', 'MASC', 78128, 'PROFESOR', 0, 0),
('258506071', 'f1k9BsS', 'Thaddus', 'Warlow', 'twarlow42@topsy.com', 'MASC', 241105, 'ADMIN', 0, 0),
('263286644', 'Gv5wtsPPNKd', 'Aeriel', 'Wolton', 'awolton3d@gizmodo.co', 'FEM', 22542, 'DEPORTISTA', 0, 0),
('267569310', 'OnGrHORtTG8', 'April', 'Garfirth', 'agarfirth73@washingt', 'FEM', 10976, 'ADMIN', 0, 0),
('275308779', '3RuRTp', 'Phil', 'Mullany', 'pmullany28@unc.edu', 'FEM', 24140, 'DEPORTISTA', 0, 0),
('291259873', 'oQh3JKFE', 'Teriann', 'Fateley', 'tfateley5b@forbes.co', 'FEM', 146210, 'ADMIN', 0, 0),
('292645810', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Gerda', 'Forcade', 'gforcade14@mac.com', 'MASC', 114141, 'DEPORTISTA', 0, 0),
('295906648', 'jpr2lCHfIQDW', 'Melissa', 'Robrose', 'mrobrose44@rakuten.c', 'MASC', 222208, 'ADMIN', 0, 0),
('299261579', 'cdse0c', 'Malissia', 'Goldsby', 'mgoldsby4o@symantec.', 'FEM', 11126, 'ADMIN', 0, 0),
('300307537', 'Rkmszy2GCA', 'Chadd', 'Sowter', 'csowter6w@fastcompan', 'MASC', 386, 'ADMIN', 0, 0),
('305439121', '7EZQGKmAIA', 'Shell', 'Cottey', 'scottey5a@geocities.', 'FEM', 43187, 'DEPORTISTA', 0, 0),
('308579399', '7fB3lAt1v4', 'Hadlee', 'McDougald', 'hmcdougald4y@mozilla', 'FEM', 138247, 'PROFESOR', 0, 0),
('311775851', 'lWoJ7kJgeWXu', 'Gilli', 'Hamsher', 'ghamsher64@simplemac', 'FEM', 34155, 'PROFESOR', 0, 0),
('314543459', 'yiDW7GWgNof', 'Aymer', 'Milbourn', 'amilbourn4p@usnews.c', 'FEM', 67120, 'DEPORTISTA', 0, 0),
('319663035', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Ivar', 'Meus', 'imeusy@shinystat.com', 'MASC', 18649, 'DEPORTISTA', 0, 0),
('319869676', 'qvrXWRQBoJs', 'Nanni', 'Richardot', 'nrichardot4z@stumble', 'FEM', 12231, 'PROFESOR', 0, 0),
('320280522', 'GW3DKyU', 'Schuyler', 'Margery', 'smargery6q@1und1.de', 'MASC', 36201, 'ADMIN', 0, 0),
('323410374', 'iNUnaW', 'Keenan', 'Bushen', 'kbushen5y@blinklist.', 'FEM', 177150, 'ADMIN', 0, 0),
('325953794', 'TvCaVCnmpZx', 'Karena', 'Cheetham', 'kcheetham16@example.', 'MASC', 114253, 'ADMIN', 0, 0),
('327890293', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Elena', 'Gostyke', 'egostyke76@ucoz.com', 'MASC', 121150, 'DEPORTISTA', 0, 0),
('330209061', 'MaRVpYOvo0k', 'Rustin', 'Sille', 'rsille2x@hugedomains', 'FEM', 241195, 'PROFESOR', 0, 0),
('333255698', 'xyndGECXFV6l', 'Carlynn', 'OSpillane', 'cospillane77@mapy.cz', 'FEM', 22580, 'DEPORTISTA', 0, 0),
('343315509', 'vfqTUL4aA', 'Reinhold', 'Barkworth', 'rbarkworth6g@studiop', 'FEM', 1267, 'ADMIN', 0, 0),
('345921743', 'dKxYF66URJJE', 'Patrizia', 'Hindrick', 'phindrick4f@gravatar', 'MASC', 61184, 'PROFESOR', 0, 0),
('346753742', '42Lkog', 'Monika', 'MacCook', 'mmaccook49@google.co', 'FEM', 116252, 'PROFESOR', 0, 0),
('347007434', 'NFQHGrFBH', 'Wayland', 'Ambrogio', 'wambrogio1g@home.pl', 'FEM', 68249, 'ADMIN', 0, 0),
('348760570', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Roxanne', 'Burgum', 'rburgumn@imageshack.', 'MASC', 297, 'DEPORTISTA', 0, 0),
('349464848', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Penn', 'Faiers', 'pfaiers5@arizona.edu', 'MASC', 24193, 'DEPORTISTA', 0, 0),
('349594428', 'NE5Po4', 'Daryn', 'Barnes', 'dbarnes57@accuweathe', 'FEM', 75169, 'DEPORTISTA', 0, 0),
('354526622', 'ubz7XKQ', 'Dewie', 'Jaquin', 'djaquin6u@bandcamp.c', 'MASC', 63156, 'ADMIN', 0, 0),
('354980908', 'huKYbNRJ', 'Drucie', 'Sawley', 'dsawley3l@columbia.e', 'FEM', 249157, 'PROFESOR', 0, 0),
('355325012', 'q9ckGgG5', 'Vin', 'Evert', 'vevertq@washingtonpo', 'FEM', 22564, 'ADMIN', 0, 0),
('363851645', '0b76VbYZG', 'Oren', 'Bangiard', 'obangiard74@java.com', 'MASC', 110208, 'ADMIN', 0, 0),
('386710740', 'w8H0mGe9m', 'Brod', 'ODaly', 'bodaly7t@photobucket', 'FEM', 5245, 'DEPORTISTA', 0, 0),
('388864730', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Nowell', 'Guittet', 'nguittetf@github.com', 'MASC', 16432, 'DEPORTISTA', 0, 0),
('393347737', 'XCNToUj', 'Lonni', 'Schimonek', 'lschimonek84@tinypic', 'MASC', 216199, 'PROFESOR', 0, 0),
('398938159', 'tWztzJSM', 'Tildie', 'Dawdary', 'tdawdaryg@globo.com', 'FEM', 198189, 'DEPORTISTA', 0, 0),
('399559272', '27cgJ1C', 'Cherilynn', 'Codner', 'ccodner2f@ihg.com', 'FEM', 170132, 'DEPORTISTA', 0, 0),
('399795969', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Becki', 'Kuhle', 'bkuhle2m@jiathis.com', 'MASC', 98237, 'DEPORTISTA', 0, 0),
('412524503', 'TM295sp', 'Jaimie', 'Battrum', 'jbattrum1u@comsenz.c', 'MASC', 5241, 'ADMIN', 0, 0),
('416871073', '2wyT1GmCI', 'Aubine', 'Wyburn', 'awyburn3m@dedecms.co', 'FEM', 27192, 'DEPORTISTA', 0, 0),
('417870092', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Michele', 'Denness', 'mdenness5d@is.gd', 'MASC', 158233, 'DEPORTISTA', 0, 0),
('418936316', 'npUOrU', 'Silvanus', 'Beetles', 'sbeetles2s@seattleti', 'FEM', 234101, 'ADMIN', 0, 0),
('419627295', 'QaeRhAUUgbvA', 'Avrit', 'Messiter', 'amessiter5v@free.fr', 'MASC', 8651, 'ADMIN', 0, 0),
('421398410', 'NVSL0yTg', 'Xylia', 'Hardaway', 'xhardaway6o@studiopr', 'FEM', 21826, 'DEPORTISTA', 0, 0),
('422192973', 'x55EozH1b', 'Judye', 'Tuckie', 'jtuckie71@over-blog.', 'FEM', 11049, 'PROFESOR', 0, 0),
('422200526', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Brier', 'Chippindale', 'bchippindale17@nba.c', 'MASC', 243142, 'DEPORTISTA', 0, 0),
('425065728', 'BJP7lShn6a', 'Guy', 'Dictus', 'gdictus3v@nba.com', 'FEM', 238138, 'ADMIN', 0, 0),
('430564238', 'LpDmCg', 'Mackenzie', 'Flatt', 'mflatt2b@jigsy.com', 'FEM', 23233, 'ADMIN', 0, 0),
('431939279', '0zqmZxuuBhD', 'Giorgio', 'Vaisey', 'gvaisey7s@nasa.gov', 'MASC', 22209, 'ADMIN', 0, 0),
('432615749', 'DBWuet', 'Brad', 'Roome', 'broome7b@seesaa.net', 'FEM', 223255, 'ADMIN', 0, 0),
('434822079', 'x3fJJlL', 'Quentin', 'Blue', 'qblue33@360.cn', 'FEM', 73111, 'PROFESOR', 0, 0),
('435103505', 'HRGOXx', 'Matilde', 'Trasler', 'mtrasler6y@networkso', 'FEM', 2141, 'ADMIN', 0, 0),
('437275211', '2GGkQJL', 'Adrien', 'Bewick', 'abewick6t@reddit.com', 'FEM', 14622, 'PROFESOR', 0, 0),
('444696177', 'Bz5kHHE09', 'Garv', 'Konert', 'gkonert3w@wufoo.com', 'MASC', 7537, 'PROFESOR', 0, 0),
('446286889', 'F1XwAtC', 'Ajay', 'Cooksley', 'acooksley5e@salon.co', 'FEM', 89244, 'PROFESOR', 0, 0),
('446757879', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Ray', 'Keddle', 'rkeddle52@wordpress.', 'MASC', 917, 'DEPORTISTA', 0, 0),
('458724818', 'o7Bf8Efxk', 'Shelton', 'Mayow', 'smayow72@furl.net', 'MASC', 38251, 'DEPORTISTA', 0, 0),
('458933236', 'bDOyl00rlxS', 'Parker', 'Gudgen', 'pgudgen6d@ebay.com', 'MASC', 200190, 'PROFESOR', 0, 0),
('459218822', 'ZQw74bUTt', 'Bevin', 'Swindlehurst', 'bswindlehurst6@imdb.', 'MASC', 170228, 'ADMIN', 0, 0),
('463368241', 'yuxVr3', 'Beale', 'Petrollo', 'bpetrollo4v@fema.gov', 'MASC', 10680, 'PROFESOR', 0, 0),
('465744431', 'FPYDsz', 'Loraine', 'Terram', 'lterram12@cbc.ca', 'FEM', 175198, 'ADMIN', 0, 0),
('474225915', '2lo1rqB', 'Jania', 'Pietron', 'jpietron87@telegraph', 'FEM', 14486, 'ADMIN', 0, 0),
('477315580', 'Tx6KLm', 'Meris', 'Bleackley', 'mbleackley7m@creativ', 'FEM', 46124, 'PROFESOR', 0, 0),
('481437264', 'WDb7X0wUsT', 'Estevan', 'Kinman', 'ekinman7p@addtoany.c', 'MASC', 41114, 'DEPORTISTA', 0, 0),
('482952280', '4Zm7ttxm50', 'Carver', 'Laible', 'claible4r@irs.gov', 'MASC', 25231, 'ADMIN', 0, 0),
('483492276', 'u57lXOe7d3IS', 'Jaquenetta', 'Pepon', 'jpepon80@ycombinator', 'MASC', 13661, 'ADMIN', 0, 0),
('485423674', 'PQAhe4', 'Mariya', 'Yetton', 'myetton5x@cbslocal.c', 'FEM', 215106, 'PROFESOR', 0, 0),
('489154777', 'bXEariUexEo', 'Leanor', 'Breslauer', 'lbreslauerd@google.n', 'MASC', 18162, 'PROFESOR', 0, 0),
('489443261', '8D0yvHTc24', 'Sammie', 'McGucken', 'smcgucken1v@china.co', 'MASC', 17867, 'ADMIN', 0, 0),
('491578144', 'iQphybv', 'Reese', 'Aharoni', 'raharoni6v@house.gov', 'FEM', 20517, 'DEPORTISTA', 0, 0),
('495027049', '67hwHN', 'Dotty', 'Medcalfe', 'dmedcalfe7l@cocolog-', 'MASC', 60175, 'ADMIN', 0, 0),
('501399313', '3ZCo9oYtjA', 'Fawn', 'Fandrey', 'ffandrey4w@posterous', 'FEM', 214103, 'PROFESOR', 0, 0),
('502006982', '5v4PcC4q', 'Tibold', 'Kealy', 'tkealyj@sogou.com', 'MASC', 237145, 'ADMIN', 0, 0),
('508305437', 'kcNybrGpD', 'Garreth', 'Parr', 'gparr4k@harvard.edu', 'FEM', 13124, 'PROFESOR', 0, 0),
('511483961', 'R1Jqdo6OxML', 'Aurie', 'Ingry', 'aingry78@imgur.com', 'MASC', 124124, 'PROFESOR', 0, 0),
('515577380', 'tj7HrIRFGUNR', 'Grantham', 'Marco', 'gmarco3c@reddit.com', 'MASC', 222107, 'DEPORTISTA', 0, 0),
('523850357', 'wc73IKomS', 'Norman', 'Worcester', 'nworcester2k@taobao.', 'MASC', 18228, 'ADMIN', 0, 0),
('527091935', 'My6u5oXbs', 'Ty', 'Branchflower', 'tbranchflowerb@webmd', 'MASC', 853, 'DEPORTISTA', 0, 0),
('527119692', 'ubX80bkeM732', 'Laney', 'Sumers', 'lsumers65@sbwire.com', 'MASC', 17441, 'PROFESOR', 0, 0),
('527941097', 'd9COeFAqD', 'Pammy', 'Bridywater', 'pbridywater19@flavor', 'FEM', 109145, 'PROFESOR', 0, 0),
('529501301', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Issi', 'Notton', 'inottoni@imageshack.', 'MASC', 247187, 'DEPORTISTA', 0, 0),
('530361131', '4SEqznEvh', 'Danika', 'Runcie', 'druncie4t@indiatimes', 'FEM', 229178, 'DEPORTISTA', 0, 0),
('533991472', 'S3laKJJhH', 'Hersh', 'Slader', 'hslader4e@rambler.ru', 'MASC', 4239, 'ADMIN', 0, 0),
('534168772', 'ivVpsO6MD', 'Heywood', 'Sarginson', 'hsarginson6h@yandex.', 'FEM', 23618, 'DEPORTISTA', 0, 0),
('537481943', 'ure9nJgq', 'Agosto', 'Lusgdin', 'alusgdin1h@imgur.com', 'FEM', 53148, 'ADMIN', 0, 0),
('538961531', '88bE0Mi8bWPQ', 'Nissa', 'Shaylor', 'nshaylor7x@tiny.cc', 'MASC', 55209, 'PROFESOR', 0, 0),
('540657889', 'ptJV0e4dBp8p', 'Gilly', 'Gibbard', 'ggibbard5l@ow.ly', 'FEM', 85129, 'ADMIN', 0, 0),
('545444753', 'T9mP0s0qf', 'Abey', 'Cockerill', 'acockerill5f@tinypic', 'MASC', 24489, 'ADMIN', 0, 0),
('546453962', 'oaQw4yW', 'Margalo', 'Tattersdill', 'mtattersdill5z@fotki', 'FEM', 248110, 'ADMIN', 0, 0),
('54868519H', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Fernando', 'Rodriguez', 'ferrod@hotmail.com', 'MASC', 654789654, 'DEPORTISTA', 0, 0),
('549642597', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Herman', 'Boriston', 'hboriston10@is.gd', 'MASC', 167232, 'DEPORTISTA', 0, 0),
('550245555', 'eDiqueA5ln7L', 'Goldarina', 'Immins', 'gimmins2w@reuters.co', 'FEM', 20480, 'DEPORTISTA', 0, 0),
('551526909', 'ZWH2EG', 'Darbie', 'Lorraine', 'dlorraine4s@w3.org', 'FEM', 212235, 'ADMIN', 0, 0),
('552987906', 'cjicSSID', 'Zandra', 'Weddell', 'zweddell58@cam.ac.uk', 'FEM', 14628, 'ADMIN', 0, 0),
('560625390', 'WubtQUdJ0ik', 'Abbott', 'Sokale', 'asokale7n@mac.com', 'FEM', 5945, 'DEPORTISTA', 0, 0),
('562103086', 'TydCF4xRkaU', 'Hamish', 'Ascroft', 'hascroft5k@tumblr.co', 'FEM', 187158, 'ADMIN', 0, 0),
('562710334', 'HJCKKdlx', 'Brooke', 'Shailer', 'bshailer7z@skyrock.c', 'FEM', 2672, 'ADMIN', 0, 0),
('564503306', 'XsoJaHdA6', 'Wyatt', 'McGillreich', 'wmcgillreich85@pen.i', 'MASC', 18749, 'ADMIN', 0, 0),
('564968247', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Nedda', 'Kerin', 'nkerin1l@fastcompany', 'MASC', 130200, 'DEPORTISTA', 0, 0),
('578136150', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Allison', 'Curmi', 'acurmi2e@ovh.net', 'MASC', 64124, 'DEPORTISTA', 0, 0),
('578272115', 'xPffKk', 'Cameron', 'Petrazzi', 'cpetrazzi55@independ', 'MASC', 156119, 'ADMIN', 0, 0),
('583133603', 'wSuyby0', 'Melosa', 'Gardener', 'mgardener2d@elpais.c', 'FEM', 1939, 'ADMIN', 0, 0),
('583763849', '7KjrGioW3', 'Dougie', 'Craster', 'dcraster5g@upenn.edu', 'MASC', 5131, 'PROFESOR', 0, 0),
('587653699', 'v7lmwv5ui', 'Waylen', 'Ladley', 'wladley5p@abc.net.au', 'MASC', 140100, 'PROFESOR', 0, 0),
('590846091', 'tZfpOFa', 'Morley', 'Guisot', 'mguisot1i@alexa.com', 'MASC', 147174, 'ADMIN', 0, 0),
('595857773', 'eJ9EiB', 'Hildy', 'Ferentz', 'hferentz4j@washingto', 'FEM', 72187, 'ADMIN', 0, 0),
('601900543', '2jwUnI5vzAW', 'Niccolo', 'Dilke', 'ndilke4i@a8.net', 'MASC', 142237, 'PROFESOR', 0, 0),
('604030623', 'DFccf0', 'Royal', 'Surgey', 'rsurgey7d@godaddy.co', 'MASC', 193219, 'ADMIN', 0, 0),
('604031280', 'wtc034i1', 'Herman', 'Incogna', 'hincogna75@blog.com', 'FEM', 9534, 'DEPORTISTA', 0, 0),
('604237026', 'VvJFJKWIi', 'Queenie', 'Grace', 'qgrace3j@goodreads.c', 'MASC', 87178, 'DEPORTISTA', 0, 0),
('606445047', '0GWJdpPpa', 'Remington', 'Cheeld', 'rcheeld7a@ehow.com', 'MASC', 36189, 'PROFESOR', 0, 0),
('612823218', 'ZC4Hq6Vvxh', 'Sascha', 'Walbridge', 'swalbridgel@usgs.gov', 'FEM', 159179, 'ADMIN', 0, 0),
('618710196', '7Utw4Z', 'Bone', 'Stenett', 'bstenett2i@ftc.gov', 'FEM', 22516, 'ADMIN', 0, 0),
('619317241', 'gC3hi1wsz', 'Elyse', 'Fassan', 'efassan2p@de.vu', 'MASC', 119174, 'ADMIN', 0, 0),
('619495161', 'pQLlI6i', 'Ladonna', 'Harback', 'lharback4@twitter.co', 'FEM', 2034, 'PROFESOR', 0, 0),
('619969879', 'M9UbuBmH5i', 'Birgitta', 'Ebsworth', 'bebsworth3e@baidu.co', 'FEM', 2336, 'DEPORTISTA', 0, 0),
('624790894', 'pjAzfXv2', 'Marilyn', 'Hampshire', 'mhampshire35@network', 'MASC', 231219, 'DEPORTISTA', 0, 0),
('634481846', 'luJR9wifzvc', 'Zora', 'Chatband', 'zchatband2r@mtv.com', 'MASC', 130229, 'PROFESOR', 0, 0),
('634832667', 'Eun6hL', 'Chadwick', 'Meers', 'cmeers1c@myspace.com', 'FEM', 168124, 'ADMIN', 0, 0),
('648877287', '52G24n7', 'Karyl', 'Lockery', 'klockeryr@howstuffwo', 'FEM', 42217, 'DEPORTISTA', 0, 0),
('665931038', 'oucXCuVZl0R', 'Pen', 'Tattersfield', 'ptattersfield6m@i2i.', 'FEM', 20677, 'PROFESOR', 0, 0),
('666504713', 'zIVp1hdzpeg', 'Christal', 'Martignoni', 'cmartignoni5m@europa', 'FEM', 178228, 'ADMIN', 0, 0),
('670344302', 'I0kucD', 'Emmet', 'Jonson', 'ejonson3n@aol.com', 'FEM', 51161, 'PROFESOR', 0, 0),
('670653818', 'hxq0cqwUH4bm', 'Drugi', 'Clapston', 'dclapston48@biblegat', 'FEM', 2677, 'ADMIN', 0, 0),
('671283975', 'W3MbZUto', 'Maurizia', 'Cartman', 'mcartmans@wikia.com', 'MASC', 128255, 'DEPORTISTA', 0, 0),
('673072233', 'M6ENll', 'Edgardo', 'Bend', 'ebend29@boston.com', 'FEM', 24572, 'ADMIN', 0, 0),
('674072025', '62EhDur', 'Lauryn', 'Beig', 'lbeig68@goo.gl', 'FEM', 1730, 'DEPORTISTA', 0, 0),
('675062137', 'efx87wp3o7Uz', 'Sib', 'Parsisson', 'sparsisson3u@taobao.', 'FEM', 19068, 'DEPORTISTA', 0, 0),
('678424484', 'wkJEiTG4v', 'Clevie', 'Stapels', 'cstapels1q@engadget.', 'FEM', 3873, 'ADMIN', 0, 0),
('682382518', '10xX4kx3pRF', 'Gwenny', 'Ridett', 'gridett6a@pinterest.', 'MASC', 98113, 'PROFESOR', 0, 0),
('684110055', 'z3GE5zLG', 'Leann', 'Pucker', 'lpucker7r@ucoz.com', 'FEM', 24178, 'PROFESOR', 0, 0),
('68658023X', '$2y$10$C2QPhV4Yf0EpgGAXSak0/eJYDqlHvGbc8prHzajPUvg.icWZJTtDO', 'David', 'Vila', 'davidvila@hotmail.co', 'MASC', 654123654, 'DEPORTISTA', 0, 0),
('693523847', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Marnie', 'Rooper', 'mrooper36@google.fr', 'MASC', 52235, 'DEPORTISTA', 0, 0),
('694340944', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Baird', 'Steers', 'bsteers32@i2i.jp', 'MASC', 27122, 'DEPORTISTA', 0, 0),
('699767062', '9Nzi4oELnzHk', 'Rosa', 'Sidary', 'rsidarye@yahoo.co.jp', 'FEM', 18116, 'PROFESOR', 0, 0),
('699894354', 'I3k95nPpd', 'Bettina', 'Bruty', 'bbruty27@topsy.com', 'FEM', 30140, 'PROFESOR', 0, 0),
('700879716', 'JBibiLZ', 'Westbrooke', 'Speir', 'wspeirm@netvibes.com', 'FEM', 51219, 'PROFESOR', 0, 0),
('700966658', 'VOZ5fNyu', 'Nolan', 'Reboulet', 'nreboulet7q@aol.com', 'FEM', 196221, 'ADMIN', 0, 0),
('701665373', 'uzys9oRQXVT', 'Demetrius', 'Blewett', 'dblewett6c@fda.gov', 'MASC', 7899, 'DEPORTISTA', 0, 0),
('704050414', 'Tz0J56gEoXL', 'Didi', 'Luff', 'dluff4q@rambler.ru', 'MASC', 56230, 'ADMIN', 0, 0),
('712518104', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Bill', 'Flaverty', 'bflaverty4l@com.com', 'MASC', 1834, 'DEPORTISTA', 0, 0),
('715278884', 'lMKNOSGju', 'Paolina', 'Penkethman', 'ppenkethman3g@techcr', 'FEM', 25128, 'DEPORTISTA', 0, 0),
('716151798', 'bl54baMj2cK', 'Harlie', 'Conor', 'hconor21@oaic.gov.au', 'MASC', 3133, 'ADMIN', 0, 0),
('716813258', 'V74a5DaYcT', 'Gabrielle', 'Ruprecht', 'gruprecht4c@washingt', 'MASC', 92184, 'ADMIN', 0, 0),
('719782858', 'oegdc8pViPZ8', 'Elsa', 'Albrighton', 'ealbrighton1p@weathe', 'MASC', 111144, 'ADMIN', 0, 0),
('724200532', 'yHVK1KhNamh', 'Kirsti', 'Looney', 'klooney7h@army.mil', 'MASC', 17060, 'ADMIN', 0, 0),
('732548621', 'AnbUCQAgrbEs', 'Rosanne', 'Fortune', 'rfortune3x@mozilla.c', 'MASC', 8573, 'ADMIN', 0, 0),
('734292625', 'LXQhqdoc', 'Tremain', 'Chinge', 'tchinge8a@earthlink.', 'FEM', 26186, 'DEPORTISTA', 0, 0),
('740261968', 'Ssujt9', 'Daile', 'Hasnney', 'dhasnney2t@unblog.fr', 'FEM', 618, 'ADMIN', 0, 0),
('741623114', 'K2MG1o5292uV', 'Mariel', 'Lawrenceson', 'mlawrenceson5s@theti', 'FEM', 3949, 'PROFESOR', 0, 0),
('748405103', '6E1Q7x4awC4d', 'Pernell', 'Gooderson', 'pgooderson1a@opera.c', 'MASC', 155169, 'ADMIN', 0, 0),
('748453943', 'rge7a7uCR4', 'Stormy', 'Brantzen', 'sbrantzen60@shinysta', 'MASC', 122201, 'DEPORTISTA', 0, 0),
('754826287', '2pFfeQDc', 'Doreen', 'Unworth', 'dunworth0@sfgate.com', 'MASC', 98250, 'PROFESOR', 0, 0),
('754858179', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Bunny', 'Beagles', 'bbeagles89@mit.edu', 'MASC', 230234, 'DEPORTISTA', 0, 0),
('759627847', '3iquuXbZWE29', 'Carlyle', 'Scates', 'cscates3z@prlog.org', 'FEM', 41240, 'PROFESOR', 0, 0),
('768861630', '1yngR96', 'Boycie', 'Wyman', 'bwyman1t@gmpg.org', 'MASC', 134225, 'ADMIN', 0, 0),
('769373116', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Afton', 'Trazzi', 'atrazzi39@thetimes.c', 'MASC', 116118, 'DEPORTISTA', 0, 0),
('771211924', 'gXeelu', 'Kanya', 'Reilinger', 'kreilinger1n@usatoda', 'MASC', 173236, 'PROFESOR', 0, 0),
('772204462', '3OonwK2av', 'Gibbie', 'Alabastar', 'galabastar7g@prnewsw', 'FEM', 1416, 'DEPORTISTA', 0, 0),
('773793700', 'qv382jKOmq', 'Daphna', 'Knox', 'dknox3y@bigcartel.co', 'FEM', 111216, 'PROFESOR', 0, 0),
('774349152', 'Z70Wc9RX8bWr', 'Kirsteni', 'McTrustie', 'kmctrustie1z@etsy.co', 'FEM', 19138, 'PROFESOR', 0, 0),
('779850697', '6qPELI', 'Harmony', 'McGiffin', 'hmcgiffin5h@toplist.', 'MASC', 5357, 'ADMIN', 0, 0),
('781676647', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Kalil', 'Du Plantier', 'kduplantier1r@indiat', 'MASC', 9255, 'DEPORTISTA', 0, 0),
('782027074', 'ASCqXKQsv', 'Cary', 'Halbord', 'chalbord81@economist', 'FEM', 74136, 'ADMIN', 0, 0),
('782925669', 'MWFC9kjuGx', 'Kissiah', 'Billsberry', 'kbillsberry3t@canalb', 'MASC', 202254, 'PROFESOR', 0, 0),
('783587732', 'S9UcJVf', 'Dieter', 'Sergent', 'dsergent3s@yolasite.', 'MASC', 15059, 'DEPORTISTA', 0, 0),
('783924950', 'l4frrUeWpab', 'Filippo', 'Fetter', 'ffetter45@bbb.org', 'FEM', 114212, 'PROFESOR', 0, 0),
('785027203', '$2y$10$6idiWmDBiDAugd1agodgd.deDp3gOB/isEDcESMnu7WYbbn4oTPUC', 'Steffi', 'Addionizio', 'saddionizio4g@about.', 'MASC', 37211, 'PROFESOR', 2, 0),
('786154245', 'nPYTdUn', 'Talbert', 'Rosenqvist', 'trosenqvist2h@jigsy.', 'MASC', 187100, 'PROFESOR', 0, 0),
('788487512', 'nnJUwqayDv', 'Tresa', 'Foynes', 'tfoynes2c@virginia.e', 'FEM', 180195, 'ADMIN', 0, 0),
('788931551', 'IxrQRivdfcZ', 'Bethany', 'Tort', 'btort2@surveymonkey.', 'MASC', 176138, 'ADMIN', 0, 0),
('791204906', '39LRMVhj49', 'Tam', 'Loxston', 'tloxstono@weebly.com', 'FEM', 207231, 'DEPORTISTA', 0, 0),
('799129492', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Tommy', 'Beckmann', 'tbeckmann20@spiegel.', 'MASC', 193104, 'DEPORTISTA', 0, 0),
('799597330', 'PqinWtJf7', 'Cory', 'Maycock', 'cmaycock7u@privacy.g', 'FEM', 24398, 'DEPORTISTA', 0, 0),
('800035867', 'cXLktBMw', 'Sanford', 'Le-Good', 'slegood2q@telegraph.', 'FEM', 133135, 'ADMIN', 0, 0),
('801092627', 'em0ZzWIbH', 'Kania', 'Daniellot', 'kdaniellota@sphinn.c', 'FEM', 24161, 'DEPORTISTA', 0, 0),
('802963338', '7MITxTaOfUz', 'Benson', 'Heibel', 'bheibel6i@opera.com', 'MASC', 193245, 'ADMIN', 0, 0),
('806542927', '1nn9kODV7Sj', 'Gerta', 'Kamall', 'gkamall6e@alibaba.co', 'FEM', 20034, 'DEPORTISTA', 0, 0),
('809126528', '2GDWSX6419', 'Michale', 'Matyukon', 'mmatyukon7e@bbb.org', 'MASC', 296, 'ADMIN', 0, 0),
('809548872', 'va6BZT46Aw', 'Maryellen', 'Creavan', 'mcreavan11@youtu.be', 'FEM', 180119, 'DEPORTISTA', 0, 0),
('810740968', 'mMoBqvJvhrG7', 'Cari', 'Rubel', 'crubel7w@qq.com', 'FEM', 19132, 'PROFESOR', 0, 0),
('816795252', 'BqqCV1nMdQ7', 'Devin', 'Bourbon', 'dbourbon13@comcast.n', 'FEM', 78192, 'ADMIN', 0, 0),
('821523993', 'yGoGAmGCo5', 'Francklin', 'Shawl', 'fshawl9@intel.com', 'FEM', 6163, 'DEPORTISTA', 0, 0),
('825160912', '3taNsdKvjz', 'Oren', 'Muggach', 'omuggach2j@economist', 'FEM', 8955, 'PROFESOR', 0, 0),
('826105958', 'FAmQKsA', 'Tara', 'McCrillis', 'tmccrillisz@wikia.co', 'MASC', 137159, 'ADMIN', 0, 0),
('828801768', 'Dbwu8QUEmqAd', 'Zach', 'Carvill', 'zcarvill54@histats.c', 'FEM', 237160, 'DEPORTISTA', 0, 0),
('829508263', 'atGM82M', 'Waldon', 'Piddick', 'wpiddick6n@discovery', 'MASC', 242194, 'PROFESOR', 0, 0),
('837078114', 'KCm6drO', 'Hubie', 'Kenn', 'hkenn69@tamu.edu', 'MASC', 161127, 'ADMIN', 0, 0),
('838782107', 'JTW9f6J8vi', 'Patricia', 'Reicharz', 'preicharz7f@lycos.co', 'MASC', 1047, 'ADMIN', 0, 0),
('839812319', 'befytMwFl', 'Zelig', 'Papes', 'zpapes2u@admin.ch', 'MASC', 9399, 'ADMIN', 0, 0),
('843841162', 'ib4xhffUM', 'Asher', 'McAusland', 'amcausland5t@meetup.', 'MASC', 194179, 'ADMIN', 0, 0),
('845704775', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Kellen', 'Eads', 'keads8@goodreads.com', 'MASC', 8758, 'DEPORTISTA', 0, 0),
('846767783', '8ArKwF', 'Laura', 'Couvert', 'lcouvert6z@narod.ru', 'FEM', 24421, 'ADMIN', 0, 0),
('849108776', '8ao4hl', 'Delly', 'Kelway', 'dkelway6s@unblog.fr', 'FEM', 1345, 'PROFESOR', 0, 0),
('849126036', 'xDAed1', 'Farley', 'Rushton', 'frushton1e@census.go', 'FEM', 129148, 'PROFESOR', 0, 0),
('852403613', 'zyUviBe6KyhX', 'Godart', 'Hankin', 'ghankinh@ezinearticl', 'FEM', 61236, 'ADMIN', 0, 0),
('852477668', 'pD8Qw5Ls', 'Farica', 'Reimers', 'freimers53@ucsd.edu', 'MASC', 99173, 'PROFESOR', 0, 0),
('857470295', '95LEvgxqz', 'Tomkin', 'Medwell', 'tmedwellt@dyndns.org', 'FEM', 25234, 'ADMIN', 0, 0),
('858865934', 'WExHVATka', 'Nona', 'Hayer', 'nhayer63@washington.', 'MASC', 7392, 'ADMIN', 0, 0),
('860607597', 'GUImKP2eSYIQ', 'Sapphira', 'Pikett', 'spikett1b@un.org', 'MASC', 785, 'ADMIN', 0, 0),
('863717397', 'BT4IWM1', 'Romeo', 'Melbury', 'rmelbury22@wufoo.com', 'MASC', 158231, 'PROFESOR', 0, 0),
('865313192', 'PQvDeGSp', 'Shirline', 'Haffard', 'shaffard1w@uol.com.b', 'FEM', 65103, 'PROFESOR', 0, 0),
('87012353H', '$2y$10$KQqlYlx1KcnX4TRSkBbyKexLePxTuQMpgjp8vkBULGCgZkX7FGhD.', 'Iria', 'Fernandez', 'ifer@hotmail.com', 'FEM', 547854785, 'DEPORTISTA', 0, 0),
('873134831', 'AfZztS', 'Avrit', 'Pickard', 'apickard5q@goo.ne.jp', 'MASC', 2279, 'PROFESOR', 0, 0),
('873398154', 'IJER3Fmb', 'Rutger', 'Canfield', 'rcanfield6l@tamu.edu', 'FEM', 15298, 'ADMIN', 0, 0),
('877852624', 'zpO7hkVbk', 'Leyla', 'Hukin', 'lhukin6p@google.fr', 'FEM', 3825, 'ADMIN', 0, 0),
('878014762', 'thUufD8ayKIn', 'Deloris', 'Burchall', 'dburchall6r@freewebs', 'FEM', 2048, 'ADMIN', 0, 0),
('879085790', 'sI2LrtxaGsC', 'Delinda', 'Fevers', 'dfevers34@clickbank.', 'FEM', 146110, 'DEPORTISTA', 0, 0),
('897274192', 'I59rSlLTnp', 'Darb', 'Spera', 'dsperac@goodreads.co', 'MASC', 20262, 'PROFESOR', 0, 0),
('897416540', '28ssg0niKM5B', 'Laurianne', 'Langmuir', 'llangmuir24@ca.gov', 'MASC', 22678, 'ADMIN', 0, 0),
('898321723', 'q8rh3NTo', 'Garreth', 'Healing', 'ghealing1f@google.es', 'MASC', 234234, 'PROFESOR', 0, 0),
('898927473', 'kRwaS04', 'Antonetta', 'Barthelemy', 'abarthelemy4a@gnu.or', 'FEM', 104153, 'DEPORTISTA', 0, 0),
('906453410', '4yhVgoeCW', 'Delano', 'Nye', 'dnye5o@google.com.br', 'FEM', 190176, 'ADMIN', 0, 0),
('907083843', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Charil', 'Tuther', 'ctuther5u@t.co', 'MASC', 160195, 'DEPORTISTA', 0, 0),
('907294954', 'F5Tynbuz', 'Marie-ann', 'Tomenson', 'mtomenson1j@mtv.com', 'MASC', 89100, 'ADMIN', 0, 0),
('907556725', 'Zwwlht6qLV', 'Malcolm', 'Cordet', 'mcordet2g@squidoo.co', 'FEM', 174206, 'ADMIN', 0, 0),
('910355518', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Perl', 'Finicj', 'pfinicj30@cnet.com', 'MASC', 7847, 'DEPORTISTA', 0, 0),
('916189750', 'us9sdd', 'Trstram', 'Chartre', 'tchartre6f@uol.com.b', 'FEM', 235208, 'ADMIN', 0, 0),
('918904416', 'knnOpk6OI', 'Othella', 'Duddin', 'oduddin1s@columbia.e', 'FEM', 14092, 'PROFESOR', 0, 0),
('931939170', 'xmCCs2pf1NSi', 'Ophelie', 'Siege', 'osiege6x@tuttocitta.', 'MASC', 16717, 'DEPORTISTA', 0, 0),
('933037203', 'wnLAlx7kT', 'Eduard', 'Domney', 'edomney4h@oaic.gov.a', 'MASC', 158226, 'PROFESOR', 0, 0),
('936325938', 'wj3yXFt', 'Floria', 'Milby', 'fmilby7c@google.it', 'FEM', 85230, 'DEPORTISTA', 0, 0),
('936462655', 'YmG7kD', 'Guilbert', 'Woodham', 'gwoodham67@hubpages.', 'MASC', 10471, 'ADMIN', 0, 0),
('937031468', 'x4SQlpCD', 'Adelice', 'Oventon', 'aoventonu@yandex.ru', 'FEM', 252209, 'DEPORTISTA', 0, 0),
('937893966', 'tRCFJg1Qqxl', 'Willabella', 'Ramel', 'wramel83@studiopress', 'MASC', 75213, 'PROFESOR', 0, 0),
('939248022', 'gUzLNmuZD', 'Stanleigh', 'Vlasov', 'svlasov4n@yahoo.com', 'MASC', 5938, 'ADMIN', 0, 0),
('941044986', 'JKFihr', 'Timotheus', 'Durante', 'tdurante66@ftc.gov', 'FEM', 9212, 'DEPORTISTA', 0, 0),
('944018068', 'Ba8yY09FTuOQ', 'Bathsheba', 'Peasey', 'bpeasey23@reddit.com', 'MASC', 25390, 'ADMIN', 0, 0),
('946761391', 'saB58AGOUjdT', 'Esma', 'Quelch', 'equelch5i@hhs.gov', 'MASC', 1403, 'ADMIN', 0, 0),
('947770696', 'pN1FiENurxq3', 'Price', 'Jory', 'pjory4u@nbcnews.com', 'MASC', 22614, 'PROFESOR', 0, 0),
('948343774', '046pBRT', 'Pierre', 'MacInerney', 'pmacinerney7@newyork', 'MASC', 151201, 'ADMIN', 0, 0),
('950062291', '9x1jgqjcjjCu', 'Renard', 'Bratchell', 'rbratchell3k@topsy.c', 'FEM', 113182, 'DEPORTISTA', 0, 0),
('953738350', 'VKP0gGYXc', 'Mitchell', 'Ivakhnov', 'mivakhnov3h@reddit.c', 'FEM', 9207, 'PROFESOR', 0, 0),
('954872192', 'P0iiXj7jiy', 'Dorris', 'Giacomoni', 'dgiacomoni31@oracle.', 'MASC', 22533, 'PROFESOR', 0, 0),
('959058610', 'O5U4jeR1l', 'Erin', 'Dunsire', 'edunsire6k@bbc.co.uk', 'FEM', 186159, 'PROFESOR', 0, 0),
('961154090', 'bAUgFM', 'Beverlie', 'Praton', 'bpratonx@wundergroun', 'FEM', 100250, 'ADMIN', 0, 0),
('961158840', 'HfJfwuqOR05h', 'Colan', 'Raithbie', 'craithbie62@wundergr', 'MASC', 198115, 'ADMIN', 0, 0),
('961516230', 'RRRMHbpz9tL5', 'Giustino', 'Astill', 'gastill6j@ebay.co.uk', 'FEM', 174107, 'PROFESOR', 0, 0),
('966286687', 'HvBQIwT3yoDv', 'Larina', 'Shergold', 'lshergold70@scientif', 'FEM', 113208, 'ADMIN', 0, 0),
('972802913', 'M3iMBEm', 'Wyn', 'Angelini', 'wangelini5r@washingt', 'FEM', 23944, 'DEPORTISTA', 0, 0),
('973902082', 'YexDRepVh6', 'Arlyn', 'Sworder', 'asworder2l@springer.', 'MASC', 16423, 'PROFESOR', 0, 0),
('974842403', 'LGwcExK1I', 'Cully', 'Igoe', 'cigoe4d@yahoo.com', 'FEM', 25422, 'PROFESOR', 0, 0),
('977339140', '01n0fBwXhNLv', 'Sidney', 'Carmody', 'scarmody1@amazonaws.', 'FEM', 116113, 'PROFESOR', 0, 0),
('979780286', 'dIDqvvl4Wa', 'Cherri', 'Playfair', 'cplayfair7y@symantec', 'FEM', 241225, 'PROFESOR', 0, 0),
('982305790', 'PCEQGwTA1w', 'Quintin', 'Graalmans', 'qgraalmans1y@ted.com', 'FEM', 166183, 'ADMIN', 0, 0),
('983303347', 'xY9DeCT', 'Ali', 'Redmille', 'aredmille46@lycos.co', 'FEM', 199207, 'ADMIN', 0, 0),
('984109351', '5D2u9q72Ou', 'Lucien', 'Platts', 'lplatts1m@1und1.de', 'FEM', 7797, 'DEPORTISTA', 0, 0),
('991637844', '$2y$10$6idiWmDBiDAugd1agodgd.deDp3gOB/isEDcESMnu7WYbbn4oTPUC', 'Gardy', 'Matovic', 'gmatovic8b@mtv.com', 'FEM', 15359, 'DEPORTISTA', 0, 1),
('996166113', '1wSI4mK', 'Mano', 'Lidbetter', 'mlidbetter2n@bandcam', 'MASC', 24890, 'ADMIN', 0, 0),
('997051482', '1Lnl6xpU', 'Pearline', 'Troyes', 'ptroyes79@unicef.org', 'FEM', 19537, 'ADMIN', 0, 0),
('998700419', 'gQIynm', 'Korney', 'Ubee', 'kubee3i@angelfire.co', 'MASC', 6557, 'ADMIN', 0, 0),
('admin', '$2y$10$6idiWmDBiDAugd1agodgd.deDp3gOB/isEDcESMnu7WYbbn4oTPUC', 'Admin', 'Admin', 'esei@esei.es', 'MASC', 123456789, 'ADMIN', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_inscritos_clase`
--

DROP TABLE IF EXISTS `usuarios_inscritos_clase`;
CREATE TABLE IF NOT EXISTS `usuarios_inscritos_clase` (
  `claseGrupal_id` int(4) NOT NULL,
  `usuario_id` varchar(9) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`claseGrupal_id`,`usuario_id`),
  KEY `inscritos_ibfk_1` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_inscritos_clase`
--

INSERT INTO `usuarios_inscritos_clase` (`claseGrupal_id`, `usuario_id`) VALUES
(16, '991637844'),
(16, 'admin');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`campeonato_id`) REFERENCES `campeonatos` (`id_campeonato`) ON DELETE CASCADE;

--
-- Filtros para la tabla `clases_grupales`
--
ALTER TABLE `clases_grupales`
  ADD CONSTRAINT `clases_grupales_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`dni`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `enfrentamientos`
--
ALTER TABLE `enfrentamientos`
  ADD CONSTRAINT `enfrentamientos_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id_grupo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `fechas_propuestas`
--
ALTER TABLE `fechas_propuestas`
  ADD CONSTRAINT `fechas_propuestas_ibfk_1` FOREIGN KEY (`enfrentamiento_id`) REFERENCES `enfrentamientos` (`id_enfrentamiento`) ON DELETE CASCADE,
  ADD CONSTRAINT `fechas_propuestas_ibfk_2` FOREIGN KEY (`creador`) REFERENCES `parejas` (`id_capitan`) ON DELETE CASCADE;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`campeonato_id`) REFERENCES `categorias` (`campeonato_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grupos_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`pista_id`) REFERENCES `pistas` (`num_pista`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`dni`) ON DELETE SET NULL;

--
-- Filtros para la tabla `parejas`
--
ALTER TABLE `parejas`
  ADD CONSTRAINT `parejas_ibfk_1` FOREIGN KEY (`id_capitan`) REFERENCES `usuarios` (`dni`) ON DELETE CASCADE,
  ADD CONSTRAINT `parejas_ibfk_2` FOREIGN KEY (`id_pareja`) REFERENCES `usuarios` (`dni`) ON DELETE CASCADE,
  ADD CONSTRAINT `parejas_ibfk_3` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id_grupo`) ON DELETE CASCADE,
  ADD CONSTRAINT `parejas_ibfk_4` FOREIGN KEY (`campeonato_id`) REFERENCES `categorias` (`campeonato_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parejas_ibfk_5` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE;

--
-- Filtros para la tabla `parejas_disputan_enfrentamiento`
--
ALTER TABLE `parejas_disputan_enfrentamiento`
  ADD CONSTRAINT `parejas_disputan_enfrentamiento_ibfk_1` FOREIGN KEY (`id_pareja1`) REFERENCES `parejas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parejas_disputan_enfrentamiento_ibfk_2` FOREIGN KEY (`id_pareja2`) REFERENCES `parejas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parejas_disputan_enfrentamiento_ibfk_3` FOREIGN KEY (`enfrentamiento_id`) REFERENCES `enfrentamientos` (`id_enfrentamiento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`dni`) ON DELETE CASCADE,
  ADD CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`usuario_id2`) REFERENCES `usuarios` (`dni`) ON DELETE CASCADE,
  ADD CONSTRAINT `partidos_ibfk_3` FOREIGN KEY (`usuario_id3`) REFERENCES `usuarios` (`dni`) ON DELETE CASCADE,
  ADD CONSTRAINT `partidos_ibfk_4` FOREIGN KEY (`usuario_id4`) REFERENCES `usuarios` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`pista_id`) REFERENCES `pistas` (`num_pista`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios_inscritos_clase`
--
ALTER TABLE `usuarios_inscritos_clase`
  ADD CONSTRAINT `inscritos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`dni`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inscritos_ibfk_2` FOREIGN KEY (`claseGrupal_id`) REFERENCES `clases_grupales` (`id_claseGrupal`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
