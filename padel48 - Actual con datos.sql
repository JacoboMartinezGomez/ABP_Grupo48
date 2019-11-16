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
(1, '2019-12-01', '2019-12-10'),
(2, '2019-11-17', '2019-11-27'),
(3, '2020-01-01', '2020-01-05'),
(4, '2019-12-20', '2019-12-25'),
(5, '2020-02-01', '2020-02-08'),
(6, '2020-03-01', '2020-03-16'),
(7, '2020-04-01', '2020-04-16'),
(8, '2020-07-01', '2020-07-06'),
(9, '2020-08-05', '2020-08-10'),
(10, '2019-11-17', '2020-02-01'),
(11, '2019-12-20', '2020-05-20'),
(12, '2020-01-01', '2020-06-01');

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
(0, 1, 'MASC', 1),
(0, 2, 'MASC', 1),
(0, 3, 'MASC', 1),
(0, 4, 'MASC', 1),
(0, 5, 'MASC', 1),
(0, 6, 'MASC', 1),
(0, 7, 'MASC', 1),
(0, 8, 'MASC', 1),
(0, 9, 'MASC', 1),
(0, 10, 'MASC', 1),
(0, 11, 'MASC', 1),
(0, 12, 'MASC', 1),
(1, 1, 'FEM', 1),
(1, 2, 'FEM', 1),
(1, 3, 'FEM', 1),
(1, 4, 'FEM', 1),
(1, 5, 'FEM', 1),
(1, 6, 'FEM', 1),
(1, 7, 'FEM', 1),
(1, 8, 'FEM', 1),
(1, 9, 'FEM', 1),
(1, 10, 'FEM', 1),
(1, 11, 'FEM', 1),
(1, 12, 'FEM', 1),
(2, 1, 'MIXTO', 1),
(2, 2, 'MIXTO', 1),
(2, 3, 'MIXTO', 1),
(2, 4, 'MIXTO', 1),
(2, 5, 'MIXTO', 1),
(2, 6, 'MIXTO', 1),
(2, 7, 'MIXTO', 1),
(2, 8, 'MIXTO', 1),
(2, 9, 'MIXTO', 1),
(2, 10, 'MIXTO', 1),
(2, 11, 'MIXTO', 1),
(2, 12, 'MIXTO', 1),
(3, 1, 'MASC', 2),
(3, 2, 'MASC', 2),
(3, 3, 'MASC', 2),
(3, 4, 'MASC', 2),
(3, 5, 'MASC', 2),
(3, 6, 'MASC', 2),
(3, 7, 'MASC', 2),
(3, 8, 'MASC', 2),
(3, 9, 'MASC', 2),
(3, 10, 'MASC', 2),
(3, 11, 'MASC', 2),
(3, 12, 'MASC', 2),
(4, 1, 'FEM', 2),
(4, 2, 'FEM', 2),
(4, 3, 'FEM', 2),
(4, 4, 'FEM', 2),
(4, 5, 'FEM', 2),
(4, 6, 'FEM', 2),
(4, 7, 'FEM', 2),
(4, 8, 'FEM', 2),
(4, 9, 'FEM', 2),
(4, 10, 'FEM', 2),
(4, 11, 'FEM', 2),
(4, 12, 'FEM', 2),
(5, 1, 'MIXTO', 2),
(5, 2, 'MIXTO', 2),
(5, 3, 'MIXTO', 2),
(5, 4, 'MIXTO', 2),
(5, 5, 'MIXTO', 2),
(5, 6, 'MIXTO', 2),
(5, 7, 'MIXTO', 2),
(5, 8, 'MIXTO', 2),
(5, 9, 'MIXTO', 2),
(5, 10, 'MIXTO', 2),
(5, 11, 'MIXTO', 2),
(5, 12, 'MIXTO', 2),
(6, 1, 'MASC', 3),
(6, 2, 'MASC', 3),
(6, 3, 'MASC', 3),
(6, 4, 'MASC', 3),
(6, 5, 'MASC', 3),
(6, 6, 'MASC', 3),
(6, 7, 'MASC', 3),
(6, 8, 'MASC', 3),
(6, 9, 'MASC', 3),
(6, 10, 'MASC', 3),
(6, 11, 'MASC', 3),
(6, 12, 'MASC', 3),
(7, 1, 'FEM', 3),
(7, 2, 'FEM', 3),
(7, 3, 'FEM', 3),
(7, 4, 'FEM', 3),
(7, 5, 'FEM', 3),
(7, 6, 'FEM', 3),
(7, 7, 'FEM', 3),
(7, 8, 'FEM', 3),
(7, 9, 'FEM', 3),
(7, 10, 'FEM', 3),
(7, 11, 'FEM', 3),
(7, 12, 'FEM', 3),
(8, 1, 'MIXTO', 3),
(8, 2, 'MIXTO', 3),
(8, 3, 'MIXTO', 3),
(8, 4, 'MIXTO', 3),
(8, 5, 'MIXTO', 3),
(8, 6, 'MIXTO', 3),
(8, 7, 'MIXTO', 3),
(8, 8, 'MIXTO', 3),
(8, 9, 'MIXTO', 3),
(8, 10, 'MIXTO', 3),
(8, 11, 'MIXTO', 3),
(8, 12, 'MIXTO', 3);

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
(1, '571299656', '183280131', 1, NULL, 1, 4, 0),
(2, '668407418', '146787380', 3, NULL, 3, 79, 0),
(3, '147606049', '147606049', 9, NULL, 4, 22, 0),
(4, '409886497', '54868519H', 9, NULL, 2, 79, 0),
(5, '946543576', '428940719', 3, NULL, 8, 78, 0),
(6, '973648673', '796118626', 5, NULL, 8, 13, 0),
(7, '992566787', '557961050', 8, NULL, 0, 38, 0),
(8, '672601318', '853891162', 12, NULL, 6, 51, 0),
(9, '345702350', '470885540', 4, NULL, 4, 82, 0),
(10, '137337399', '984999228', 2, NULL, 0, 84, 0),
(11, '349859675', '959589423', 3, NULL, 0, 46, 0),
(12, '669923112', '532118235', 9, NULL, 7, 60, 0),
(13, '714448291', '349859675', 6, NULL, 4, 58, 0),
(14, '215612411', '148223561', 8, NULL, 1, 67, 0),
(15, '271561675', '215612411', 9, NULL, 5, 37, 0),
(16, '283607945', '357255194', 12, NULL, 2, 47, 0),
(17, '462386523', '500346539', 7, NULL, 8, 74, 0),
(18, '288966606', '714448291', 1, NULL, 4, 29, 0),
(19, '196784309', '984999228', 8, NULL, 2, 59, 0),
(20, '117098874', '831909214', 9, NULL, 3, 72, 0),
(21, '215612411', '853891162', 2, NULL, 2, 29, 0),
(22, '739972759', '399613160', 9, NULL, 8, 38, 0),
(23, '758538918', '307220929', 5, NULL, 0, 75, 0),
(24, '300365146', '227109220', 12, NULL, 7, 57, 0),
(25, '147195149', '632611342', 12, NULL, 4, 97, 0),
(26, '853891162', '23173074E', 5, NULL, 7, 57, 0),
(27, '409218805', '906878768', 11, NULL, 2, 34, 0),
(28, '571299656', '388867929', 1, NULL, 2, 2, 0),
(29, '23173074E', '422928503', 4, NULL, 4, 85, 0),
(30, '462386523', '878935908', 10, NULL, 6, 81, 0),
(31, '165415664', '462386523', 5, NULL, 7, 59, 0),
(32, '345702350', '283607945', 12, NULL, 5, 72, 0),
(33, '388867929', '271561675', 5, NULL, 4, 21, 0),
(34, '924310634', '878935908', 1, NULL, 8, 91, 0),
(35, '797684934', '340442984', 11, NULL, 2, 24, 0),
(36, '183280131', '669923112', 3, NULL, 3, 7, 0),
(37, '906878768', '908041404', 9, NULL, 4, 64, 0),
(38, '878935908', '183280131', 9, NULL, 4, 68, 0),
(39, '294154625', '908041404', 6, NULL, 7, 19, 0),
(40, '959589423', '532118235', 10, NULL, 0, 13, 0),
(41, '358556547', '117098874', 12, NULL, 0, 20, 0),
(42, '422928503', '199440432', 3, NULL, 5, 56, 0),
(43, '739972759', '415083124', 7, NULL, 0, 87, 0),
(44, '451067658', '680192903', 2, NULL, 8, 94, 0),
(45, '774675403', '416546301', 8, NULL, 0, 10, 0),
(46, '774675403', '324467712', 9, NULL, 3, 53, 0),
(47, '571299656', '680192903', 5, NULL, 5, 57, 0),
(48, '306843557', '946543576', 1, NULL, 1, 28, 0),
(49, '797684934', '87012353H', 7, NULL, 7, 69, 0),
(50, '358556547', '451067658', 9, NULL, 6, 48, 0),
(51, '230980999', '666655821', 8, NULL, 3, 30, 0),
(52, '831909214', '557961050', 11, NULL, 7, 30, 0),
(53, '514158440', '557961050', 9, NULL, 1, 29, 0),
(54, '309810232', '227109220', 2, NULL, 0, 21, 0),
(55, '147195149', '199440432', 1, NULL, 1, 89, 0),
(56, '532118235', 'admin', 8, NULL, 2, 84, 0),
(57, '329510337', '978040353', 6, NULL, 5, 94, 0),
(58, '773605127', '853891162', 8, NULL, 1, 73, 0),
(59, '409886497', '973648673', 4, NULL, 5, 38, 0),
(60, '984999228', '147195149', 5, NULL, 4, 77, 0),
(61, '148223561', 'admin', 5, NULL, 1, 70, 0),
(62, '470885540', '984999228', 10, NULL, 2, 47, 0),
(63, '251043456', '620643725', 6, NULL, 2, 21, 0),
(64, '680192903', '184811271', 1, NULL, 5, 45, 0),
(65, '306843557', '117098874', 5, NULL, 3, 74, 0),
(66, '500346539', '54868519H', 5, NULL, 2, 24, 0),
(67, '251043456', '148223561', 5, NULL, 3, 12, 0),
(68, '146787380', '54868519H', 1, NULL, 1, 26, 0),
(69, '616747625', '230980999', 4, NULL, 6, 4, 0),
(70, '148223561', '666655821', 5, NULL, 1, 46, 0),
(71, '199440432', '470885540', 10, NULL, 6, 76, 0),
(72, '853891162', '831909214', 9, NULL, 5, 35, 0),
(73, '532118235', '680192903', 12, NULL, 8, 21, 0),
(74, '680192903', '557961050', 7, NULL, 6, 7, 0),
(75, '87012353H', '599144702', 1, NULL, 0, 73, 0),
(76, '978040353', '416546301', 5, NULL, 8, 9, 0),
(77, '54868519H', '984999228', 12, NULL, 5, 13, 0),
(78, '451067658', '532118235', 9, NULL, 5, 56, 0),
(79, '343133353', '116813347', 3, NULL, 0, 16, 0),
(80, '215612411', '357255194', 5, NULL, 1, 76, 0),
(81, '908041404', '428940719', 3, NULL, 1, 60, 0),
(82, '148223561', '184811271', 2, NULL, 0, 33, 0),
(83, '288966606', '234235479', 2, NULL, 8, 12, 0),
(84, '133230188', '294154625', 5, NULL, 7, 15, 0),
(85, '875000625', '306843557', 2, NULL, 6, 69, 0),
(86, '680192903', '137337399', 5, NULL, 4, 31, 0),
(87, '992566787', '853891162', 12, NULL, 3, 51, 0),
(88, '514158440', '875000625', 12, NULL, 7, 2, 0),
(89, '343133353', 'admin', 9, NULL, 7, 34, 0),
(90, '147195149', '982731002', 8, NULL, 1, 28, 0),
(91, '831909214', '853891162', 6, NULL, 7, 29, 0),
(92, '571299656', '230980999', 5, NULL, 8, 23, 0),
(93, '500346539', '616747625', 5, NULL, 0, 26, 0),
(94, '358556547', '632611342', 11, NULL, 1, 21, 0),
(95, '358556547', '345702350', 10, NULL, 3, 31, 0),
(96, '399613160', '984999228', 12, NULL, 2, 74, 0),
(97, '23173074E', '975644034', 12, NULL, 2, 16, 0),
(98, '168386241', '399613160', 6, NULL, 5, 61, 0),
(99, '68658023X', '54868519H', 3, NULL, 8, 61, 0),
(100, '669923112', '422928503', 12, NULL, 1, 15, 0),
(101, '23173074E', '982731002', 7, NULL, 8, 34, 0),
(102, '878935908', 'admin', 4, NULL, 7, 99, 0),
(103, '835428530', '984999228', 1, NULL, 0, 5, 0),
(104, '409218805', '672601318', 8, NULL, 7, 95, 0),
(105, '382690174', '982731002', 7, NULL, 8, 95, 0),
(106, '183280131', '358556547', 10, NULL, 7, 81, 0),
(107, '451067658', '227109220', 1, NULL, 6, 31, 0),
(108, '147195149', '796118626', 2, NULL, 1, 85, 0),
(109, '300365146', '669923112', 11, NULL, 8, 15, 0),
(110, '982731002', '23173074E', 2, NULL, 6, 6, 0),
(111, '856347807', '234235479', 3, NULL, 2, 64, 0),
(112, '607499242', '620643725', 10, NULL, 0, 24, 0),
(113, '486944964', '470885540', 4, NULL, 6, 22, 0),
(114, '668407418', '215612411', 7, NULL, 0, 60, 0),
(115, '599144702', '324467712', 7, NULL, 0, 85, 0),
(116, '870344358', '796118626', 9, NULL, 4, 15, 0),
(117, '133230188', '571299656', 4, NULL, 7, 48, 0),
(118, '666655821', '428940719', 3, NULL, 8, 8, 0),
(119, '973648673', '666655821', 11, NULL, 4, 48, 0),
(120, '357255194', '309810232', 3, NULL, 8, 52, 0),
(121, '856347807', '196784309', 6, NULL, 5, 57, 0),
(122, '371567247', '680192903', 3, NULL, 4, 86, 0),
(123, '358556547', '340442984', 3, NULL, 3, 70, 0),
(124, '319531321', '416546301', 1, NULL, 1, 36, 0),
(125, '23173074E', '137337399', 10, NULL, 2, 6, 0),
(126, '739972759', '215612411', 12, NULL, 1, 63, 0),
(127, '309810232', '908041404', 7, NULL, 0, 80, 0),
(128, '309810232', '148223561', 1, NULL, 1, 1, 0),
(129, '557961050', '716713376', 4, NULL, 3, 17, 0),
(130, '294154625', '982731002', 4, NULL, 6, 67, 0),
(131, '349859675', '906878768', 1, NULL, 7, 92, 0),
(132, '758538918', '307220929', 4, NULL, 4, 67, 0),
(133, '924310634', '343133353', 10, NULL, 7, 7, 0),
(134, '230980999', '117098874', 4, NULL, 6, 57, 0),
(135, '856347807', '853891162', 10, NULL, 6, 11, 0),
(136, '199440432', '782970053', 7, NULL, 7, 18, 0),
(137, '283607945', '835428530', 6, NULL, 0, 79, 0),
(138, '668407418', '184811271', 4, NULL, 7, 91, 0),
(139, '382690174', '616747625', 3, NULL, 3, 81, 0),
(140, '514158440', '294154625', 5, NULL, 3, 35, 0),
(141, '975644034', '309810232', 12, NULL, 1, 50, 0),
(142, '358556547', '329510337', 9, NULL, 7, 11, 0),
(143, '666655821', '935422929', 7, NULL, 1, 87, 0),
(144, '716713376', '416546301', 9, NULL, 8, 42, 0),
(145, '251043456', '399613160', 7, NULL, 7, 96, 0),
(146, '978040353', '54868519H', 3, NULL, 4, 53, 0),
(147, '137337399', '773605127', 2, NULL, 7, 31, 0),
(148, '230980999', '215612411', 6, NULL, 0, 43, 0),
(149, '908041404', '230980999', 9, NULL, 5, 22, 0),
(150, '992566787', '306843557', 8, NULL, 7, 62, 0);

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
('878935908', 'HQ9xYGn1Ey', 'Darsie', 'ONeill', 'doneill2j@meetup.com', 'FEM', 18182, 'DEPORTISTA', 0),
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
