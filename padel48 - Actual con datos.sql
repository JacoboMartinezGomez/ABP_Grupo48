-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2019 a las 11:10:00
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

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
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeonatos`
--
DROP TABLE IF EXISTS `campeonatos`;
CREATE TABLE `campeonatos` (
  `id_campeonato` int(4) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`id_campeonato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `campeonatos`
--

INSERT INTO `campeonatos` (`id_campeonato`, `fecha_inicio`, `fecha_fin`) VALUES
(1, '2019-12-15', '2019-06-16'),
(2, '2019-12-04', '2019-07-05'),
(3, '2019-11-05', '2020-06-12'),
(4, '2019-12-20', '2019-10-26'),
(5, '2019-12-13', '2020-05-03'),
(6, '2019-12-09', '2019-05-15'),
(7, '2019-11-19', '2020-05-13'),
(8, '2019-11-20', '2019-07-26'),
(9, '2019-11-17', '2020-02-18'),
(10, '2019-10-29', '2019-10-08'),
(11, '2019-12-12', '2020-03-29'),
(12, '2019-11-07', '2020-05-17'),
(13, '2019-12-24', '2019-10-17'),
(14, '2019-11-09', '2019-03-18'),
(15, '2019-12-11', '2020-01-07'),
(16, '2019-11-05', '2019-06-21'),
(17, '2019-11-01', '2020-01-07'),
(18, '2019-11-06', '2020-01-20'),
(19, '2019-11-05', '2019-03-09'),
(20, '2019-11-23', '2020-05-29'),
(21, '2019-11-14', '2019-11-09'),
(22, '2019-11-27', '2019-12-03'),
(23, '2019-10-28', '2019-04-09'),
(24, '2019-11-11', '2019-06-26'),
(25, '2019-11-21', '2019-04-09'),
(26, '2019-11-16', '2019-02-22'),
(27, '2019-11-29', '2020-02-16'),
(28, '2019-12-11', '2019-10-10'),
(29, '2019-11-04', '2019-05-17'),
(30, '2019-11-13', '2019-10-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id_categoria` int(4) NOT NULL,
  `campeonato_id` int(4) NOT NULL,
  `tipo` enum('MASC','FEM','MIXTO') NOT NULL,
  `nivel` int(2) NOT NULL,
  PRIMARY KEY (`id_categoria`, `campeonato_id`),
  FOREIGN KEY (`campeonato_id`) REFERENCES campeonatos(`id_campeonato`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `campeonato_id`, `tipo`, `nivel`) VALUES
(1, 1, 'MASC', 49),
(2, 2, 'FEM', 41),
(3, 3, 'FEM', 21),
(4, 3, 'FEM', 82),
(5, 6, 'MASC', 17),
(6, 6, 'FEM', 73),
(7, 8, 'MASC', 50),
(8, 8, 'FEM', 62),
(9, 9, 'MASC', 15),
(10, 10, 'MASC', 88),
(11, 11, 'MASC', 3),
(12, 11, 'MASC', 10),
(13, 11, 'MASC', 62),
(14, 11, 'FEM', 8),
(15, 12, 'MASC', 34),
(16, 12, 'FEM', 20),
(17, 12, 'FEM', 64),
(18, 14, 'FEM', 78),
(19, 15, 'FEM', 41),
(20, 16, 'FEM', 44),
(21, 17, 'FEM', 36),
(22, 17, 'FEM', 59),
(23, 19, 'FEM', 90),
(24, 20, 'MASC', 4),
(25, 20, 'MASC', 10),
(26, 22, 'MASC', 28),
(27, 22, 'MASC', 74),
(28, 22, 'MASC', 86),
(29, 23, 'FEM', 93),
(30, 25, 'MASC', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfrentamientos`
--
DROP TABLE IF EXISTS `enfrentamientos`;
CREATE TABLE `enfrentamientos` (
  `id_enfrentamiento` int(6) NOT NULL,
  `grupo_id` int(4) NOT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fase` int(1) NOT NULL,
  PRIMARY KEY (`id_enfrentamiento`),
  FOREIGN KEY (`grupo_id`) REFERENCES grupos(`id_grupo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enfrentamientos`
--

INSERT INTO `enfrentamientos` (`id_enfrentamiento`, `grupo_id`, `hora`, `fecha`, `fase`) VALUES
(1, 5, '19:30:00', '2019-03-12', 2),
(2, 4, '18:00:00', '2019-10-17', 1),
(3, 5, '19:30:00', '2019-07-16', 1),
(4, 11, '12:00:00', '2019-07-18', 1),
(5, 14, '21:00:00', '2019-05-19', 2),
(6, 20, '09:00:00', '2019-09-22', 1),
(7, 6, '19:30:00', '2019-08-28', 1),
(8, 22, '18:00:00', '2019-06-24', 2),
(9, 24, '18:00:00', '2019-08-30', 2),
(10, 14, '12:00:00', '2019-06-08', 2),
(11, 15, '15:00:00', '2019-02-28', 1),
(12, 20, '13:30:00', '2019-01-01', 2),
(13, 16, '15:00:00', '2019-01-30', 1),
(14, 19, '15:00:00', '2019-05-16', 2),
(15, 9, '12:00:00', '2019-10-04', 1),
(16, 14, '12:00:00', '2019-01-01', 2),
(17, 22, '13:30:00', '2019-02-15', 1),
(18, 8, '21:00:00', '2018-12-06', 2),
(19, 4, '13:30:00', '2019-08-15', 1),
(20, 15, '12:00:00', '2019-01-29', 1),
(21, 20, '21:00:00', '2019-03-12', 1),
(22, 20, '10:30:00', '2018-12-28', 1),
(23, 2, '09:00:00', '2019-10-04', 1),
(24, 19, '12:00:00', '2019-10-01', 2),
(25, 13, '19:30:00', '2019-09-08', 2),
(26, 8, '18:00:00', '2019-01-29', 2),
(27, 17, '19:30:00', '2019-02-26', 1),
(28, 24, '15:00:00', '2019-02-16', 1),
(29, 21, '19:30:00', '2019-04-07', 1),
(30, 22, '13:30:00', '2018-12-13', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas_propuestas`
--
DROP TABLE IF EXISTS `fechas_propuestas`;
CREATE TABLE `fechas_propuestas` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `enfrentamiento_id` int(6) NOT NULL,
  `creador` varchar(9) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`enfrentamiento_id`) REFERENCES enfrentamientos(`id_enfrentamiento`) ON DELETE CASCADE ,
  FOREIGN KEY (`creador`) REFERENCES parejas(`id_capitan`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fechas_propuestas`
--

INSERT INTO `fechas_propuestas` (`id`, `enfrentamiento_id`, `creador`, `hora`, `fecha`) VALUES
(1, 22, '999782009', '13:30:00', '2020-06-15'),
(2, 17, '54868519H', '10:30:00', '2019-10-13'),
(3, 21, '415083124', '10:30:00', '2018-12-22'),
(4, 7, '415083124', '15:00:00', '2020-03-20'),
(5, 24, '853891162', '19:30:00', '2018-12-13'),
(6, 24, '306843557', '09:00:00', '2019-01-10'),
(7, 10, '283607945', '12:00:00', '2019-02-15'),
(8, 2, '415083124', '21:00:00', '2019-05-11'),
(9, 11, '271561675', '12:00:00', '2020-04-16'),
(10, 17, '672601318', '10:30:00', '2020-04-06'),
(11, 22, '875000625', '19:30:00', '2019-11-19'),
(12, 6, '992566787', '15:00:00', '2018-12-03'),
(13, 8, '230980999', '21:00:00', '2020-09-30'),
(14, 9, '774675403', '19:30:00', '2020-07-01'),
(15, 7, '599144702', '13:30:00', '2020-11-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--
DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos` (
  `id_grupo` int(4) NOT NULL,
  `campeonato_id` int(4) NOT NULL,
  `categoria_id` int(4) NOT NULL,
  PRIMARY KEY (`id_grupo`, `campeonato_id`,`categoria_id`),
  FOREIGN KEY (`campeonato_id`) REFERENCES categorias(`campeonato_id`) ON DELETE CASCADE,
  FOREIGN KEY (`categoria_id`) REFERENCES categorias(`id_categoria`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `campeonato_id`, `categoria_id`) VALUES
(1, 3, 16),
(2, 25, 11),
(3, 22, 12),
(4, 29, 20),
(5, 23, 14),
(6, 10, 15),
(7, 23, 10),
(8, 29, 3),
(9, 24, 19),
(10, 25, 17),
(11, 22, 12),
(12, 24, 8),
(13, 24, 3),
(14, 23, 10),
(15, 23, 23),
(16, 2, 22),
(17, 23, 6),
(18, 23, 3),
(19, 11, 9),
(20, 24, 12),
(21, 25, 2),
(22, 11, 8),
(23, 27, 8),
(24, 16, 17),
(25, 17, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--
DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios` (
  `id_horario` int(2) NOT NULL,
  `pista_id` int(2) NOT NULL,
  `hora_inicio` time NOT NULL,
  PRIMARY KEY (`id_horario`),
  FOREIGN KEY (`pista_id`) REFERENCES pistas(`num_pista`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(25, 3, '18:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--
DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `id_noticia` int(100) NOT NULL AUTO_INCREMENT,
  `usuario_id` varchar(9) DEFAULT NULL,
  `titulo` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `contenido` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id_noticia`),
  FOREIGN KEY (`usuario_id`) REFERENCES usuarios(`dni`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(80, '634130401', 'Excel', 'Extirpation of Matter from Perineum Muscle, Open Approach');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas`
--
DROP TABLE IF EXISTS `parejas`;
CREATE TABLE `parejas` (
  `id` int(6) NOT NULL,
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
  FOREIGN KEY (`grupo_id`) REFERENCES grupos(`id_grupo`) ON DELETE CASCADE,
  FOREIGN KEY (`campeonato_id`) REFERENCES categorias(`campeonato_id`) ON DELETE CASCADE,
  FOREIGN KEY (`categoria_id`) REFERENCES categorias(`id_categoria`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas`
--

INSERT INTO `parejas` (`id`, `id_capitan`, `id_pareja`, `campeonato_id`, `grupo_id`, `categoria_id`, `puntuacion`, `clasificado`) VALUES
(2, '271561675', '309810232', 9, 3, 11, 88, 0),
(3, '146787380', '975644034', 4, 10, 9, 12, 0),
(4, '196784309', '875000625', 3, 9, 23, 25, 0),
(5, '616747625', '271561675', 7, 24, 19, 13, 0),
(6, '309810232', '300365146', 13, 23, 17, 17, 0),
(7, '183280131', '416546301', 13, 20, 15, 55, 0),
(8, '924310634', '462386523', 16, 14, 25, 50, 0),
(9, '358556547', '442647708', 11, 16, 20, 62, 0),
(10, '906878768', '853891162', 15, 2, 12, 19, 0),
(11, '251043456', '309810232', 25, 13, 11, 84, 0),
(12, '319531321', '168386241', 18, 11, 20, 17, 0),
(13, '307220929', '382690174', 8, 5, 23, 75, 0),
(14, '371567247', '668407418', 5, 13, 12, 91, 0),
(15, '669923112', '908041404', 11, 20, 8, 4, 0),
(16, '349859675', '300365146', 30, 16, 15, 30, 0),
(17, '324467712', '935422929', 10, 24, 8, 86, 0),
(19, '294154625', '148223561', 24, 21, 20, 15, 0),
(20, '856347807', '116813347', 17, 21, 14, 30, 0),
(21, '973648673', '607499242', 26, 8, 14, 28, 0),
(22, '340442984', '251043456', 25, 18, 20, 25, 0),
(23, '959589423', '340442984', 4, 4, 11, 82, 0),
(24, '116813347', '357255194', 28, 11, 19, 74, 0),
(25, '345702350', '227109220', 2, 11, 25, 88, 0),
(26, '309810232', '422928503', 7, 3, 11, 14, 0),
(27, '196784309', '319531321', 9, 6, 11, 82, 0),
(28, '875000625', '908041404', 28, 10, 6, 30, 0),
(29, '959589423', '486944964', 22, 6, 3, 88, 0),
(30, '184811271', '442647708', 4, 14, 11, 43, 0),
(31, '227109220', '451067658', 10, 14, 19, 28, 0),
(32, '680192903', '116813347', 11, 21, 22, 29, 0),
(33, '283607945', '992566787', 18, 4, 3, 8, 0),
(34, '382690174', '199440432', 11, 3, 11, 43, 0),
(35, '557961050', '773605127', 23, 8, 20, 27, 0),
(36, '774675403', '978040353', 19, 10, 22, 15, 0),
(37, '184811271', '288966606', 19, 18, 8, 11, 0),
(38, '773605127', '199440432', 19, 18, 17, 9, 0),
(39, '416546301', '782970053', 2, 4, 9, 37, 0),
(41, '714448291', '207933559', 6, 17, 15, 98, 0),
(42, '288966606', '831909214', 5, 12, 22, 34, 0),
(43, '999782009', '607499242', 26, 19, 11, 64, 0),
(44, '984999228', '345702350', 16, 18, 16, 87, 0),
(45, '415083124', '184811271', 26, 20, 14, 94, 0),
(46, '215612411', '294154625', 29, 10, 12, 27, 0),
(47, '87012353H', '409218805', 16, 9, 17, 43, 0),
(48, '399613160', '514158440', 30, 2, 17, 77, 0),
(49, '870344358', '283607945', 28, 14, 9, 94, 0),
(50, '324467712', '147606049', 6, 22, 8, 14, 0),
-- parejas de campeonato 0, grupo1, categoria 0 `
(51, 'usuario1', 'usuario2', 0, 1, 0, 0, 0),
(52, 'usuario3', 'usuario4', 0, 1, 0, 0, 0),
(53, 'usuario5', 'usuario6', 0, 1, 0, 0, 0),
(54, 'usuario7', 'usuario8', 0, 1, 0, 0, 0),
(55, 'usuario9', 'usuario10', 0, 1, 0, 0, 0),
(56, 'usuario11', 'usuario12', 0, 1, 0, 0, 0),
(57, 'usuario13', 'usuario14', 0, 1, 0, 0, 0),
(58, 'usuario15', 'usuario16', 0, 1, 0, 0, 0);



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parejas_disputan_enfrentamiento`
--
DROP TABLE IF EXISTS `parejas_disputan_enfrentamiento`;
CREATE TABLE `parejas_disputan_enfrentamiento` (
  `id_pareja1` int(6) NOT NULL,
  `id_pareja2` int(6) NOT NULL,
  `enfrentamiento_id` int(6) NOT NULL,
  `resultado` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_pareja1`,`id_pareja2`,`enfrentamiento_id`),
  FOREIGN KEY (`id_pareja1`) REFERENCES parejas(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`id_pareja2`) REFERENCES parejas(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`enfrentamiento_id`) REFERENCES enfrentamientos(`id_enfrentamiento`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parejas_disputan_enfrentamiento`
--

INSERT INTO `parejas_disputan_enfrentamiento` (`id_pareja1`, `id_pareja2`, `enfrentamiento_id`, `resultado`) VALUES
(54868519, 324467712, 30, ''),
(87012353, 409218805, 10, ''),
(87012353, 409218805, 15, ''),
(116813347, 357255194, 5, ''),
(116813347, 357255194, 25, ''),
(116813347, 357255194, 28, ''),
(183280131, 416546301, 12, ''),
(184811271, 288966606, 2, ''),
(184811271, 288966606, 5, ''),
(184811271, 288966606, 24, ''),
(184811271, 288966606, 26, ''),
(184811271, 442647708, 7, ''),
(196784309, 319531321, 2, ''),
(196784309, 319531321, 22, ''),
(196784309, 319531321, 24, ''),
(196784309, 875000625, 2, ''),
(196784309, 875000625, 23, ''),
(215612411, 294154625, 8, ''),
(215612411, 294154625, 22, ''),
(215612411, 294154625, 24, ''),
(227109220, 451067658, 15, ''),
(251043456, 309810232, 5, ''),
(251043456, 309810232, 15, ''),
(251043456, 309810232, 16, ''),
(271561675, 309810232, 24, ''),
(283607945, 992566787, 2, ''),
(283607945, 992566787, 4, ''),
(288966606, 831909214, 14, ''),
(307220929, 382690174, 4, ''),
(307220929, 382690174, 16, ''),
(309810232, 300365146, 3, ''),
(309810232, 300365146, 4, ''),
(309810232, 300365146, 9, ''),
(309810232, 300365146, 16, ''),
(309810232, 422928503, 14, ''),
(319531321, 168386241, 22, ''),
(319531321, 168386241, 25, ''),
(319531321, 168386241, 27, ''),
(324467712, 147606049, 28, ''),
(324467712, 935422929, 4, ''),
(340442984, 251043456, 21, ''),
(345702350, 227109220, 29, ''),
(349859675, 300365146, 2, ''),
(349859675, 300365146, 21, ''),
(349859675, 300365146, 27, ''),
(358556547, 442647708, 15, ''),
(358556547, 442647708, 16, ''),
(371567247, 668407418, 10, ''),
(371567247, 668407418, 18, ''),
(371567247, 668407418, 28, ''),
(382690174, 199440432, 15, ''),
(415083124, 184811271, 30, ''),
(557961050, 773605127, 9, ''),
(557961050, 773605127, 30, ''),
(669923112, 908041404, 3, ''),
(680192903, 116813347, 14, ''),
(680192903, 116813347, 16, ''),
(680192903, 116813347, 27, ''),
(773605127, 199440432, 15, ''),
(774675403, 978040353, 15, ''),
(856347807, 116813347, 9, ''),
(870344358, 283607945, 2, ''),
(870344358, 283607945, 3, ''),
(870344358, 283607945, 26, ''),
(870344358, 283607945, 30, ''),
(875000625, 908041404, 12, ''),
(875000625, 908041404, 18, ''),
(906878768, 0, 19, ''),
(959589423, 340442984, 9, ''),
(959589423, 340442984, 27, ''),
(959589423, 486944964, 4, ''),
(959589423, 486944964, 23, ''),
(973648673, 607499242, 3, ''),
(984999228, 345702350, 6, ''),
(984999228, 345702350, 21, ''),
(984999228, 345702350, 30, ''),
(999782009, 607499242, 15, ''),
(999782009, 607499242, 28, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--
DROP TABLE IF EXISTS `partidos`;
CREATE TABLE `partidos` (
  `id_partido` int(4) NOT NULL AUTO_INCREMENT,
  `usuario_id` varchar(9) DEFAULT NULL,
  `usuario_id2` varchar(9) DEFAULT NULL,
  `usuario_id3` varchar(9) DEFAULT NULL,
  `usuario_id4` varchar(9) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id_partido`),
  FOREIGN KEY (`usuario_id`) REFERENCES usuarios(`dni`) ON DELETE CASCADE,
  FOREIGN KEY (`usuario_id2`) REFERENCES usuarios(`dni`) ON DELETE CASCADE,
  FOREIGN KEY (`usuario_id3`) REFERENCES usuarios(`dni`) ON DELETE CASCADE,
  FOREIGN KEY (`usuario_id4`) REFERENCES usuarios(`dni`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id_partido`, `usuario_id`, `usuario_id2`, `usuario_id3`, `usuario_id4`, `fecha`, `hora`) VALUES
(2, '470885540', '773605127', '999782009', '835428530', '2019-09-27', '15:00:00'),
(3, '716713376', '116813347', '992566787', '774675403', '2019-05-22', '16:30:00'),
(4, '382690174', '307220929', '984999228', '283607945', '2018-11-25', '18:00:00'),
(5, '428940719', '306843557', '532118235', '183280131', '2019-09-11', '19:30:00'),
(6, '758538918', '416546301', '68658023X', '462386523', '2019-03-21', '15:00:00'),
(7, '148223561', '358556547', '271561675', '973648673', '2018-11-01', '12:00:00'),
(8, '532118235', '856347807', '409886497', '215612411', '2018-11-25', '10:30:00'),
(9, '984999228', '251043456', '409886497', '856347807', '2019-02-22', '09:00:00'),
(10, '607499242', '147195149', '371567247', '946543576', '2019-08-20', '10:30:00'),
(11, '324467712', '283607945', '227109220', '500346539', '2019-07-18', '16:30:00'),
(12, '409218805', '666655821', '532118235', '415083124', '2019-04-20', '16:30:00'),
(13, '739972759', '133230188', '607499242', '283607945', '2018-11-04', '21:00:00'),
(14, '148223561', '87012353H', '319531321', '371567247', '2019-06-12', '10:30:00'),
(15, '288966606', '283607945', '87012353H', '632611342', '2019-10-20', '12:00:00'),
(16, '357255194', '183280131', '978040353', '349859675', '2019-02-01', '10:30:00'),
(17, '973648673', '133230188', '451067658', '908041404', '2018-12-10', '13:30:00'),
(18, '782970053', '230980999', '634130401', '399613160', '2019-08-30', '18:00:00'),
(19, '758538918', '343133353', '288966606', '148223561', '2019-07-21', '13:30:00'),
(20, '340442984', '714448291', '146787380', '148223561', '2019-06-24', '18:00:00'),
(21, '227109220', '288966606', '924310634', '984999228', '2018-11-16', '16:30:00'),
(22, '117098874', '428940719', '796118626', '117098874', '2019-04-30', '09:00:00'),
(23, '999782009', '133230188', '358556547', '357255194', '2019-02-05', '21:00:00'),
(24, '168386241', '500346539', '978040353', '984999228', '2018-11-19', '13:30:00'),
(25, '230980999', '773605127', '358556547', '146787380', '2019-08-04', '10:30:00'),
(26, '251043456', '500346539', '300365146', '666655821', '2019-03-24', '12:00:00'),
(27, '500346539', '68658023X', '432192846', '620643725', '2019-06-13', '15:00:00'),
(28, '234235479', '486944964', '116813347', '634130401', '2019-04-11', '12:00:00'),
(29, '959589423', '168386241', '714448291', '870344358', '2019-08-06', '15:00:00'),
(30, '148223561', '924310634', '500346539', '856347807', '2019-07-27', '13:30:00'),
(31, '739972759', '184811271', '165415664', '462386523', '2018-10-30', '19:30:00'),
(32, '382690174', '168386241', '758538918', '196784309', '2019-04-18', '10:30:00'),
(33, '23173074E', '984999228', '148223561', '371567247', '2019-01-18', '12:00:00'),
(34, '382690174', '54868519H', '432192846', '416546301', '2019-02-26', '10:30:00'),
(35, '853891162', '148223561', '319531321', '146787380', '2019-05-15', '13:30:00'),
(36, '399613160', '875000625', '117098874', '524380062', '2018-11-12', '10:30:00'),
(37, '975644034', '451067658', '739972759', '669923112', '2018-10-31', '15:00:00'),
(38, '54868519H', '999782009', '672601318', '557961050', '2018-11-24', '12:00:00'),
(39, '924310634', '451067658', '184811271', '133230188', '2019-08-26', '13:30:00'),
(40, '669923112', '571299656', '870344358', '875000625', '2019-07-11', '10:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--
DROP TABLE IF EXISTS `pistas`;
CREATE TABLE `pistas` (
  `num_pista` int(2) NOT NULL AUTO_INCREMENT,
  `tipo` enum('PIEDRA','MOQUETA') CHARACTER SET latin1 NOT NULL,
  `lugar` enum('EXTERIOR','INTERIOR') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`num_pista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`num_pista`, `tipo`, `lugar`) VALUES
(1, 'PIEDRA', 'INTERIOR'),
(2, 'PIEDRA', 'EXTERIOR'),
(3, 'MOQUETA', 'INTERIOR'),
(4, 'PIEDRA', 'EXTERIOR'),
(5, 'MOQUETA', 'INTERIOR'),
(6, 'PIEDRA', 'EXTERIOR'),
(7, 'MOQUETA', 'INTERIOR'),
(8, 'PIEDRA', 'INTERIOR'),
(9, 'PIEDRA', 'EXTERIOR'),
(10, 'PIEDRA', 'INTERIOR'),
(11, 'MOQUETA', 'INTERIOR'),
(12, 'PIEDRA', 'INTERIOR'),
(13, 'MOQUETA', 'EXTERIOR'),
(14, 'PIEDRA', 'INTERIOR'),
(15, 'PIEDRA', 'EXTERIOR'),
(16, 'PIEDRA', 'EXTERIOR'),
(17, 'MOQUETA', 'EXTERIOR'),
(18, 'MOQUETA', 'INTERIOR'),
(19, 'MOQUETA', 'INTERIOR'),
(20, 'MOQUETA', 'EXTERIOR'),
(21, 'PIEDRA', 'EXTERIOR'),
(22, 'MOQUETA', 'EXTERIOR'),
(23, 'MOQUETA', 'INTERIOR'),
(24, 'MOQUETA', 'EXTERIOR'),
(25, 'PIEDRA', 'EXTERIOR'),
(26, 'PIEDRA', 'EXTERIOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--
DROP TABLE IF EXISTS `reservas`;
CREATE TABLE `reservas` (
  `id_usuario` varchar(9) NOT NULL,
  `pista_id` int(2) NOT NULL,
  `hora` int(2) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_usuario`,`pista_id`,`hora`,`fecha`),
  FOREIGN KEY (`pista_id`) REFERENCES pistas(`num_pista`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_usuario`, `pista_id`, `hora`, `fecha`) VALUES
('137337399', 5, 10, '2018-12-27'),
('146787380', 5, 19, '2018-10-30'),
('148223561', 21, 10, '2019-08-28'),
('184811271', 8, 13, '2019-10-01'),
('207933559', 7, 10, '2019-09-20'),
('271561675', 19, 12, '2019-04-03'),
('294154625', 6, 19, '2019-10-04'),
('309810232', 1, 9, '2019-08-12'),
('309810232', 17, 16, '2019-02-12'),
('324467712', 7, 10, '2019-07-19'),
('324467712', 12, 12, '2019-03-21'),
('343133353', 21, 18, '2019-03-10'),
('345702350', 3, 15, '2019-08-21'),
('345702350', 20, 16, '2019-05-23'),
('349859675', 24, 15, '2019-10-01'),
('357255194', 21, 18, '2019-05-22'),
('358556547', 19, 21, '2019-08-14'),
('371567247', 3, 10, '2019-03-21'),
('371567247', 10, 16, '2019-04-03'),
('388867929', 25, 18, '2019-01-15'),
('432192846', 10, 16, '2019-05-21'),
('442647708', 12, 12, '2019-06-17'),
('462386523', 22, 13, '2019-09-14'),
('500346539', 5, 12, '2019-04-02'),
('524380062', 23, 15, '2018-11-20'),
('532118235', 22, 18, '2019-03-16'),
('54868519H', 8, 12, '2019-03-26'),
('557961050', 4, 15, '2019-02-18'),
('668407418', 5, 18, '2019-07-03'),
('668407418', 22, 15, '2019-07-29'),
('669923112', 24, 15, '2019-01-14'),
('672601318', 4, 19, '2019-06-13'),
('672601318', 14, 21, '2018-11-26'),
('739972759', 19, 13, '2019-01-04'),
('758538918', 5, 13, '2019-01-07'),
('782970053', 14, 12, '2019-05-09'),
('796118626', 2, 16, '2019-04-17'),
('796118626', 20, 13, '2019-05-21'),
('853891162', 16, 21, '2018-12-22'),
('856347807', 8, 9, '2019-06-24'),
('87012353H', 14, 10, '2018-11-13'),
('875000625', 7, 13, '2019-08-16'),
('875000625', 24, 15, '2019-10-23'),
('906878768', 19, 15, '2019-08-06'),
('924310634', 22, 10, '2019-08-17'),
('946543576', 18, 18, '2019-02-07'),
('975644034', 25, 18, '2019-09-05'),
('982731002', 11, 13, '2018-12-10'),
('982731002', 24, 9, '2019-09-04'),
('982731002', 25, 13, '2019-05-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
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

--
-- Volcado de datos para la tabla `usuarios`
--
INSERT INTO `usuarios` (`dni`, `password`, `nombre`, `apellido`, `email`, `sexo`, `telefono`, `rol`, `numero_pistas`) VALUES
('115440091', 'hW2DQ9ucEnb5', 'Trenton', 'MacKintosh', 'tmackintoshp@mtv.com', 'MASC', 15152, 'PROFESOR', 0),
('116813347', 'wszgky', 'Carver', 'Aucutt', 'caucutt2a@accuweathe', 'MASC', 3317, 'ADMIN', 0),
('117098874', 'WHyQGwaZG', 'Rici', 'Corck', 'rcorck2c@nps.gov', 'FEM', 4559, 'ADMIN', 0),
('133230188', 'gBG8nE', 'Ulric', 'Opdenorth', 'uopdenorth2n@rambler', 'FEM', 8567, 'DEPORTISTA', 0),
('137337399', 'zNkiTrdk8j', 'Libbie', 'Senechell', 'lsenechell8@blogs.co', 'FEM', 25212, 'DEPORTISTA', 0),
('146787380', 'rNCmeZCeAqx', 'Matilde', 'Cockaday', 'mcockaday28@icio.us', 'MASC', 19453, 'ADMIN', 0),
('147195149', 'Sn3np4zUn', 'Sampson', 'Caberas', 'scaberasa@printfrien', 'FEM', 164173, 'ADMIN', 0),
('147606049', 'oYNFyCp', 'Flor', 'Santello', 'fsantello7@list-mana', 'FEM', 20414, 'PROFESOR', 0),
('148223561', 'slxtlZi', 'Conrade', 'Mucklow', 'cmucklow2@amazon.co.', 'MASC', 24162, 'DEPORTISTA', 0),
('165415664', 'Hgl7FY', 'Jessee', 'Bernasek', 'jbernasek4@bigcartel', 'FEM', 11377, 'ADMIN', 0),
('168386241', 'geT6gc', 'Kimmie', 'Kippen', 'kkippen2h@bbc.co.uk', 'FEM', 224162, 'DEPORTISTA', 0),
('183280131', 'xHE2oNmBb', 'Bethena', 'Brimilcome', 'bbrimilcome2b@zimbio', 'MASC', 227242, 'PROFESOR', 0),
('184811271', 'idt9bN', 'Fredra', 'Radnage', 'fradnager@free.fr', 'FEM', 237138, 'DEPORTISTA', 0),
('196784309', 'ygqQ9iQ', 'Chiquia', 'Dawdary', 'cdawdary2o@discuz.ne', 'FEM', 22920, 'DEPORTISTA', 0),
('199440432', '6RmfiOJs7tt', 'Heloise', 'Parkman', 'hparkman2l@wp.com', 'MASC', 215247, 'PROFESOR', 0),
('207933559', 'z5Kq3ww', 'Merle', 'Drew-Clifton', 'mdrewcliftone@npr.or', 'MASC', 103167, 'PROFESOR', 0),
('215612411', 'yTJpQobL', 'Corrinne', 'Ferrarello', 'cferrarellox@techcru', 'MASC', 51233, 'PROFESOR', 0),
('227109220', '9WhaCly5p', 'Mikel', 'Levicount', 'mlevicounty@usda.gov', 'FEM', 1860, 'DEPORTISTA', 0),
('230980999', 'UCP54uDB', 'Margette', 'Gaynesford', 'mgaynesford1i@zimbio', 'MASC', 21092, 'PROFESOR', 0),
('23173074E', '$2y$10$RRisaBznFF121Hzm2JcVqesY/aEYLcI8Kx6dTTJyvNRMCgPvwIIdW', 'Jacobo', 'Martinez', 'jacmar@hotmail.com', 'MASC', 654456654, 'DEPORTISTA', 0),
('234235479', 'bqvNxT', 'Matthiew', 'Hamberstone', 'mhamberstone1t@yahoo', 'MASC', 171183, 'PROFESOR', 0),
('251043456', 'b1apJXwFTn', 'Vinny', 'Joppich', 'vjoppich1g@earthlink', 'MASC', 29126, 'PROFESOR', 0),
('271561675', '3DXEqBTS', 'Meaghan', 'Dello', 'mdelloc@google.nl', 'FEM', 26156, 'PROFESOR', 0),
('283607945', 'rTcn8p', 'Marnia', 'Dysert', 'mdysert1u@mtv.com', 'FEM', 18861, 'ADMIN', 0),
('288966606', 'J1rBfxe', 'Delmer', 'Bulbrook', 'dbulbrookv@dagondesi', 'FEM', 200221, 'ADMIN', 0),
('294154625', '6CfLnv', 'Vinny', 'Borton', 'vborton1w@foxnews.co', 'MASC', 217136, 'ADMIN', 0),
('300365146', 'UkGYd12Mf', 'Anestassia', 'Ledur', 'aledur3@ovh.net', 'MASC', 2523, 'DEPORTISTA', 0),
('306843557', '69giWOe6Q', 'Almeda', 'Rolse', 'arolse20@cornell.edu', 'MASC', 6140, 'DEPORTISTA', 0),
('307220929', 'KtAas8t5z', 'Bo', 'Swannack', 'bswannack23@sakura.n', 'MASC', 179159, 'ADMIN', 0),
('309810232', 'FQsz4Uz4n5U', 'Concettina', 'Shropshire', 'cshropshire1s@indieg', 'FEM', 1759, 'PROFESOR', 0),
('319531321', 'FPuPm9j', 'Hortense', 'Eustanch', 'heustanchh@bloglovin', 'MASC', 20755, 'PROFESOR', 0),
('324467712', 'G4iFE5lh', 'Lyssa', 'Heaker', 'lheaker16@goo.ne.jp', 'FEM', 10835, 'ADMIN', 0),
('329510337', 'Riq0bX', 'Rochella', 'Penniell', 'rpenniell1k@yellowbo', 'MASC', 226215, 'ADMIN', 0),
('340442984', 'xROHgW1d', 'Eleanor', 'Biggs', 'ebiggs6@ca.gov', 'MASC', 24844, 'PROFESOR', 0),
('343133353', '6nUrskwztHU', 'Hogan', 'Tretwell', 'htretwell1e@dyndns.o', 'MASC', 4164, 'DEPORTISTA', 0),
('345702350', 'IUKB5FkeJB', 'Jewel', 'Mears', 'jmearsz@biblegateway', 'MASC', 33114, 'DEPORTISTA', 0),
('349859675', 'iOTkQ5', 'Lacee', 'Cardon', 'lcardon12@plala.or.j', 'FEM', 3185, 'PROFESOR', 0),
('357255194', 'yDZ3ll4G2A', 'Cyrill', 'Austin', 'caustin2d@nih.gov', 'MASC', 171140, 'DEPORTISTA', 0),
('358556547', 'EOjIQ1', 'Berty', 'Lawrenz', 'blawrenz1v@desdev.cn', 'FEM', 5196, 'DEPORTISTA', 0),
('371567247', 'qiV58w', 'Pammi', 'Evill', 'pevill1@diigo.com', 'FEM', 9982, 'DEPORTISTA', 0),
('382690174', 'hKKShvraMf', 'Gilberte', 'Danilchik', 'gdanilchik2p@comcast', 'FEM', 18799, 'ADMIN', 0),
('388867929', 'MkVRc8', 'Jannelle', 'Cumpton', 'jcumptonm@cdbaby.com', 'FEM', 4732, 'DEPORTISTA', 0),
('399613160', '6GSZzO98Mx7', 'Brand', 'Undrill', 'bundrill2i@oaic.gov.', 'FEM', 12218, 'DEPORTISTA', 0),
('409218805', '7ghNecZfDMq', 'Sherline', 'Buncombe', 'sbuncombe1q@vistapri', 'FEM', 186223, 'ADMIN', 0),
('409886497', 'PZ6VgtvjQ98z', 'Zonda', 'Giacovazzo', 'zgiacovazzo2k@prweb.', 'FEM', 251227, 'PROFESOR', 0),
('415083124', 'rD8lYen1c8', 'Selig', 'Balk', 'sbalk1r@psu.edu', 'MASC', 1089, 'DEPORTISTA', 0),
('416546301', 'ZKi2jbMV', 'Tildie', 'Blenkinsopp', 'tblenkinsopp1d@soup.', 'MASC', 126229, 'PROFESOR', 0),
('422928503', 'jIDAvbyI', 'Tildy', 'Jandac', 'tjandac19@reference.', 'FEM', 10959, 'PROFESOR', 0),
('428940719', '4QOU29Brv', 'Jdavie', 'Gait', 'jgaitt@apache.org', 'MASC', 100206, 'PROFESOR', 0),
('432192846', 'jlvPuc67', 'Ronnie', 'Stryde', 'rstryded@cmu.edu', 'MASC', 101158, 'PROFESOR', 0),
('442647708', '5zQqsqTF', 'Rozamond', 'Bridson', 'rbridsono@soup.io', 'MASC', 112190, 'DEPORTISTA', 0),
('451067658', 'ol9ZYwgv9Q8', 'Haroun', 'Freestone', 'hfreestone24@naver.c', 'FEM', 5561, 'PROFESOR', 0),
('462386523', 'EUxZNWz', 'Ode', 'Mullin', 'omullin0@rambler.ru', 'MASC', 4661, 'ADMIN', 0),
('470885540', 'ToOi5RSqp', 'Noelyn', 'Puckham', 'npuckhamn@deliciousd', 'FEM', 61244, 'PROFESOR', 0),
('486944964', '1fGqyh9KdPe', 'Tawsha', 'Viney', 'tviney13@goo.gl', 'FEM', 17951, 'PROFESOR', 0),
('500346539', 'SoduwMubL', 'Wally', 'Canete', 'wcanete21@uiuc.edu', 'MASC', 4392, 'DEPORTISTA', 0),
('514158440', 'S3isIsm1TfaS', 'Vonnie', 'Leap', 'vleap1h@google.ru', 'FEM', 237156, 'PROFESOR', 0),
('524380062', 'f5qb5T', 'Alyse', 'Luigi', 'aluigi1c@statcounter', 'MASC', 87148, 'DEPORTISTA', 0),
('532118235', 'AN9yc71uS', 'Audrie', 'Hartington', 'ahartingtoni@printfr', 'MASC', 156155, 'DEPORTISTA', 0),
('54868519H', '$2y$10$gW3NuLxQMedESrRx3hx5uujLgKaVa8rKqpnK8ikxkFIE7AsnjTfvG', 'Fernando', 'Rodriguez', 'ferrod@hotmail.com', 'MASC', 654789654, 'DEPORTISTA', 0),
('557961050', 'UhlsMPGv2', 'Elianore', 'Lochran', 'elochran2q@bbb.org', 'MASC', 194119, 'PROFESOR', 0),
('571299656', 'MDvMVepFyp7', 'Josee', 'Verney', 'jverney2g@mtv.com', 'MASC', 986, 'PROFESOR', 0),
('599144702', 'agrIPletd4k', 'Auguste', 'Jessopp', 'ajessopp17@cdbaby.co', 'MASC', 205140, 'DEPORTISTA', 0),
('607499242', 'hNqb2Ku', 'Paule', 'Greschik', 'pgreschik1p@soup.io', 'MASC', 188166, 'DEPORTISTA', 0),
('616747625', '2ciYxR', 'Constantin', 'Boribal', 'cboribalu@myspace.co', 'FEM', 1469, 'ADMIN', 0),
('620643725', 'wH36PwU', 'Valery', 'Tenwick', 'vtenwick1n@ehow.com', 'MASC', 38140, 'PROFESOR', 0),
('632611342', 'zIEbwYf', 'Kelwin', 'Swannell', 'kswannell18@mayoclin', 'FEM', 155118, 'ADMIN', 0),
('634130401', '55P5rwJEJxkk', 'Alistair', 'Osmon', 'aosmon11@nps.gov', 'FEM', 2586, 'DEPORTISTA', 0),
('666655821', 't0SE3gXiuxW', 'Gusella', 'Simants', 'gsimants1l@over-blog', 'FEM', 240137, 'DEPORTISTA', 0),
('668407418', 'kTYg8bBS', 'Ailina', 'Dossantos', 'adossantos25@xinhuan', 'MASC', 15253, 'DEPORTISTA', 0),
('669923112', '1U2qUCYhzci', 'Bobbee', 'Kleinerman', 'bkleinermang@typepad', 'MASC', 222160, 'PROFESOR', 0),
('672601318', 'dewuJO9DxU6', 'Sibylle', 'Stolworthy', 'sstolworthyf@goodrea', 'MASC', 18297, 'ADMIN', 0),
('680192903', '7uFW2P8', 'Bernhard', 'Yurenev', 'byurenev10@studiopre', 'MASC', 199128, 'DEPORTISTA', 0),
('68658023X', '$2y$10$C2QPhV4Yf0EpgGAXSak0/eJYDqlHvGbc8prHzajPUvg.icWZJTtDO', 'David', 'Vila', 'davidvila@hotmail.co', 'MASC', 654123654, 'DEPORTISTA', 0),
('714448291', 'tg4tutMp', 'Cordula', 'Brenneke', 'cbrenneke22@comcast.', 'FEM', 183152, 'DEPORTISTA', 0),
('716713376', 'lCzFItvB56q', 'Essa', 'Pattemore', 'epattemore2m@domainm', 'MASC', 126240, 'ADMIN', 0),
('739972759', 'GVVfAvqDLH9', 'Chuck', 'Alvarado', 'calvarado26@topsy.co', 'MASC', 163105, 'ADMIN', 0),
('758538918', 'N0CLJjfYn', 'Dud', 'Pearn', 'dpearn1a@rambler.ru', 'FEM', 29128, 'PROFESOR', 0),
('773605127', '33VlDkC', 'Bowie', 'Cownden', 'bcowndenw@marriott.c', 'FEM', 62211, 'PROFESOR', 0),
('774675403', 'Tbk5ql1Fhh', 'Coral', 'Kears', 'ckearss@dell.com', 'FEM', 11359, 'DEPORTISTA', 0),
('782970053', '8hJT7g3s8', 'Evonne', 'Doyland', 'edoyland1m@webnode.c', 'MASC', 24538, 'DEPORTISTA', 0),
('796118626', 'aMuHK5uGT', 'Ellie', 'Madill', 'emadill29@huffington', 'FEM', 255137, 'PROFESOR', 0),
('797684934', '1gRGNR3g3ccZ', 'Theodore', 'Harroll', 'tharroll2e@census.go', 'MASC', 192181, 'DEPORTISTA', 0),
('831909214', '6RwxEea', 'Sela', 'Keady', 'skeadyb@parallels.co', 'FEM', 234253, 'ADMIN', 0),
('835428530', 'shLEAyh', 'Berny', 'Santos', 'bsantos1y@posterous.', 'MASC', 1991, 'ADMIN', 0),
('853891162', 'igRLJagI', 'Bogey', 'Eacott', 'beacott1b@mail.ru', 'MASC', 216166, 'PROFESOR', 0),
('856347807', 'IpYDOgU', 'Kimmy', 'Hubbis', 'khubbisl@google.co.u', 'MASC', 196197, 'DEPORTISTA', 0),
('87012353H', '$2y$10$KQqlYlx1KcnX4TRSkBbyKexLePxTuQMpgjp8vkBULGCgZkX7FGhD.', 'Iria', 'Fernandez', 'ifer@hotmail.com', 'FEM', 547854785, 'DEPORTISTA', 0),
('870344358', '9ey4bo', 'Corrianne', 'Winfield', 'cwinfield1x@nbcnews.', 'MASC', 70183, 'ADMIN', 0),
('875000625', 'rmIpwOO0Ckv1', 'Cristina', 'Tudhope', 'ctudhope1o@miitbeian', 'FEM', 24672, 'DEPORTISTA', 0),
('878935908', 'HQ9xYGn1Ey', 'Darsie', 'O\'Neill', 'doneill2j@meetup.com', 'FEM', 18182, 'DEPORTISTA', 0),
('906878768', 'ISjCVZdkPuHn', 'Zed', 'Fishpoole', 'zfishpoole15@123-reg', 'FEM', 227122, 'PROFESOR', 0),
('908041404', 'fs7FJA9uOQA', 'Beverlee', 'Sydry', 'bsydry5@google.com', 'FEM', 1031, 'DEPORTISTA', 0),
('924310634', 'sIcEpz5', 'Barbette', 'Keen', 'bkeenq@adobe.com', 'FEM', 2742, 'ADMIN', 0),
('935422929', 'G7CDis', 'Guenevere', 'Karolovsky', 'gkarolovsky2r@over-b', 'MASC', 649, 'DEPORTISTA', 0),
('946543576', 'VfeNAg5', 'Billy', 'Casserley', 'bcasserley1j@marketw', 'MASC', 56173, 'ADMIN', 0),
('959589423', 'S70liU', 'Danella', 'Tapsfield', 'dtapsfield1f@chronoe', 'FEM', 2106, 'PROFESOR', 0),
('973648673', 'zfneGK', 'Drew', 'Rolf', 'drolf1z@unesco.org', 'MASC', 10038, 'DEPORTISTA', 0),
('975644034', 'LAwUPYmY06', 'Trixi', 'Yven', 'tyven14@people.com.c', 'MASC', 14581, 'DEPORTISTA', 0),
('978040353', 'WF8EQKYy8HF', 'Iseabal', 'MacDaid', 'imacdaidj@forbes.com', 'FEM', 2119, 'ADMIN', 0),
('982731002', 'XavFaJ', 'Nikkie', 'Jepensen', 'njepensen2f@storify.', 'MASC', 164114, 'PROFESOR', 0),
('984999228', 'bqhV8SoK', 'Orion', 'Hartgill', 'ohartgillk@51.la', 'FEM', 21632, 'PROFESOR', 0),
('992566787', 'bSYXJCI', 'Jannelle', 'Kneafsey', 'jkneafsey9@china.com', 'MASC', 21652, 'DEPORTISTA', 0),
('999782009', 'LmSQUUbc', 'Kirby', 'Ruffy', 'kruffy27@shareasale.', 'MASC', 19372, 'PROFESOR', 0),
('admin', '$2y$10$6idiWmDBiDAugd1agodgd.deDp3gOB/isEDcESMnu7WYbbn4oTPUC', 'Admin', 'Admin', 'esei@esei.es', 'MASC', 123456789, 'DEPORTISTA', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
