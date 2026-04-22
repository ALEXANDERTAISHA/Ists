-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 31-03-2026 a las 20:14:48
-- Versión del servidor: 10.6.25-MariaDB
-- Versión de PHP: 8.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `istsucua_ists`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academic_calendar_events`
--

CREATE TABLE `academic_calendar_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academic_modalities`
--

CREATE TABLE `academic_modalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `academic_modalities`
--

INSERT INTO `academic_modalities` (`id`, `title`, `description`, `icon`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Presencial', NULL, NULL, 1, 1, '2025-12-13 03:44:08', '2025-12-13 03:44:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academic_programs`
--

CREATE TABLE `academic_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_modality_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `registration_url` varchar(255) DEFAULT NULL,
  `registration_enabled` tinyint(1) NOT NULL DEFAULT 0,
  `document` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academic_sections`
--

CREATE TABLE `academic_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoridades`
--

CREATE TABLE `autoridades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `biografia` text DEFAULT NULL,
  `foto_path` varchar(255) DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `autoridades`
--

INSERT INTO `autoridades` (`id`, `nombre`, `cargo`, `slug`, `categoria`, `biografia`, `foto_path`, `pdf_path`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'Fausto Fabian Suarez', 'Rector', 'fausto-fabian-suarez', 'ISTS', NULL, '69877c5012ddd-RECTOR.jpg', 'autoridades/pdfs/4gOZHd4VJpVj4WerwGJJXYCtfyEzSr1uF6thrvDd.pdf', 1, '2025-12-12 00:19:58', '2026-03-27 06:38:36'),
(2, 'Luis Guartasaca', 'Vocal del OCS', 'luis-guartasaca', NULL, NULL, '69877caa6ecae-LUIS GUARTSACA.jpg', 'uploads/pdfs/69877caa6ed66-PAUL TAISHA_UBUNTU.pdf', 2, '2025-12-13 03:40:13', '2026-02-07 22:55:54'),
(3, 'Mayra Gutiérrez', 'Vocal del OCS', 'mayra-gutierrez', NULL, NULL, '69877cd5e846d-MAYRITA1.jpg', 'uploads/pdfs/69877cd5e85c7-PAUL TAISHA_UBUNTU.pdf', 3, '2025-12-13 03:41:17', '2026-02-07 22:56:37'),
(4, 'Favian Cumbanama', 'Presidente Del Consejo Estudiantil', 'favian-cumbanama', NULL, NULL, '6940bdc5ae0b8-foto.jpeg', NULL, 4, '2025-12-16 07:02:45', '2026-01-10 05:57:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus_items`
--

CREATE TABLE `campus_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `is_external` tinyint(1) NOT NULL DEFAULT 0,
  `content` text DEFAULT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'servicios',
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `manager` varchar(255) DEFAULT NULL,
  `functions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`functions`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `campus_items`
--

INSERT INTO `campus_items` (`id`, `title`, `description`, `url`, `is_external`, `content`, `category`, `order`, `is_active`, `created_at`, `updated_at`, `schedule`, `location`, `phone`, `email`, `manager`, `functions`) VALUES
(1, 'BIBLIOTECA', NULL, 'https://biblioteca.istsucua.edu.ec/', 1, NULL, 'servicios', 0, 1, '2025-12-16 18:33:47', '2026-01-29 10:27:10', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'GRADUADOS', NULL, 'https://graduados.istsucua.edu.ec/login', 1, NULL, 'servicios', 1, 1, '2026-01-29 05:17:00', '2026-01-29 05:18:18', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'SIGA', NULL, 'http://siga.institutos.gob.ec:8080/siga-web/ariel.jsf', 1, NULL, 'servicios', 2, 1, '2026-01-29 05:18:58', '2026-01-29 05:18:58', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'SIAU', NULL, 'https://siau-online.senescyt.gob.ec/', 1, NULL, 'servicios', 3, 1, '2026-01-29 10:28:38', '2026-01-29 10:30:31', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'EVA INSTITUCIONAL', NULL, 'http://181.211.10.244:8080/eva/?redirect=0', 1, NULL, 'servicios', 4, 1, '2026-01-29 10:35:04', '2026-01-29 10:35:04', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus_item_contents`
--

CREATE TABLE `campus_item_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campus_item_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `external_url` varchar(255) DEFAULT NULL,
  `pdf_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `form_html` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus_item_form_submissions`
--

CREATE TABLE `campus_item_form_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campus_item_content_id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL,
  `ciclo` varchar(255) NOT NULL,
  `nivel` varchar(255) NOT NULL,
  `institucion` varchar(255) NOT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus_item_images`
--

CREATE TABLE `campus_item_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campus_item_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `full_description` text DEFAULT NULL,
  `professional_profile` text DEFAULT NULL,
  `coordinator` varchar(255) DEFAULT NULL,
  `coordinator_email` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `image_path_2` varchar(255) DEFAULT NULL,
  `curriculum_pdf` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`id`, `academic_section_id`, `name`, `slug`, `description`, `full_description`, `professional_profile`, `coordinator`, `coordinator_email`, `image_path`, `image_path_2`, `curriculum_pdf`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Desarrollo de Software', 'desarrollo-software', NULL, '<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-652ee98 wp-dark-mode-transparent\" data-block-id=\"652ee98\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Desarrollo de Software</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-76364b3 wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"76364b3\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Formar profesionales con pensamiento cr&iacute;tico, creativo y &eacute;tico; capaz de analizar, dise&ntilde;ar, codificar e implementar sistemas inform&aacute;ticos mediante la aplicaci&oacute;n de metodolog&iacute;as de software para satisfacer las necesidades del mercado; basados en la ciencia de la matem&aacute;tica aplicada, enfocada a fortalecer el sector de la tecnolog&iacute;a y sus usuarios, difundiendo los avances tecnol&oacute;gicos y resolviendo por medio de la sistematizaci&oacute;n problemas presentados en las empresas y la sociedad en general aplicando competencias profesionales mediante la formaci&oacute;n de talento humano que procese las aplicaciones de forma supervisada trabajando en equipos bajo est&aacute;ndares de codificaci&oacute;n, aportando significativamente a la transformaci&oacute;n social, dentro de los contextos enmarcados en la productividad nacional.</p>\r\n</div>', '<main id=\"content\" class=\"neve-main wp-dark-mode-transparent\">\r\n<div class=\"container single-page-container wp-dark-mode-transparent\">\r\n<div class=\"row wp-dark-mode-transparent\">\r\n<div class=\"nv-single-page-wrap col wp-dark-mode-transparent\">\r\n<div class=\"nv-content-wrap entry-content wp-dark-mode-transparent\">\r\n<div class=\"wp-block-stackable-columns stk-block-columns stk-block stk-3544645 stk-block-background stk--has-background-overlay\" data-block-id=\"3544645\">\r\n<div class=\"stk-row stk-inner-blocks stk-block-content stk-content-align stk-3544645-column wp-dark-mode-transparent\">\r\n<div class=\"wp-block-stackable-column stk-block-column stk-column stk-block stk-fd929a5 stk-block-background stk--has-background-overlay\" data-v=\"4\" data-block-id=\"fd929a5\">\r\n<div class=\"stk-column-wrapper stk-block-column__content stk-container stk-fd929a5-container stk--no-background stk--no-padding wp-dark-mode-transparent\">\r\n<div class=\"stk-block-content stk-inner-blocks stk-fd929a5-inner-blocks wp-dark-mode-transparent\">\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-b80106d wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"b80106d\">\r\n<div>\r\n<ul>\r\n<li>Aplica t&eacute;cnicas de investigaci&oacute;n en la b&uacute;squeda de nuevas formas de aplicaci&oacute;n del desarrollo de software en los sectores industriales.</li>\r\n<li>Brinda asistencia t&eacute;cnica en el dise&ntilde;o, modelamiento e ilustraci&oacute;n del proceso de base de datos.</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<ul>\r\n<li>Utiliza herramientas y tecnolog&iacute;as de programaci&oacute;n para llevar a cabo tareas espec&iacute;ficas en el campo de desarrollo de software.</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<ul>\r\n<li>Brinda asistencia t&eacute;cnica en el desarrollo de aplicaciones de software, desde el an&aacute;lisis del problema y la planificaci&oacute;n del proyecto, hasta la implementaci&oacute;n, el mantenimiento, la prueba y la documentaci&oacute;n.</li>\r\n<li>Brinda soporte t&eacute;cnico y mantenimiento de redes de computadores, equipos de computaci&oacute;n, instalaci&oacute;n y configuraci&oacute;n de software para asegurar el buen funcionamiento de las mismas.</li>\r\n<li>Brinda asistencia t&eacute;cnica en el dise&ntilde;o de bases de datos mediante procesos de control y seguimiento de las operaciones para el manejo adecuado de la informaci&oacute;n.&nbsp;</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<ul>\r\n<li>Emplea topolog&iacute;as de red de datos (Malla, Espiral, Jer&aacute;rquica, Estrella) para compartir recursos inform&aacute;ticos con entidades p&uacute;blicas o privadas. \" Determina los recursos necesarios para el desarrollo de un proyecto software, considerando el hardware, el software y las redes.</li>\r\n<li>Aplica conceptos, t&eacute;cnicas,herramientas de programaci&oacute;n, que contribuyan con la implementaci&oacute;n de soluciones de software.&nbsp;</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<ul>\r\n<li>Realiza procesos de an&aacute;lisis y verificaci&oacute;n de consistencia de datos extra&iacute;dos de diversas fuentes, que&nbsp;permitan generar reportes relevantes para una organizaci&oacute;n.</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<ul>\r\n<li>Aplica habilidades de Tics, trabajo en equipo, gesti&oacute;n de proyectos, liderazgo y creatividad, para trabajar en ambientes colaborativos conprofesionalismo y responsabilidad social.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-e9d7e2d wp-dark-mode-transparent\" data-block-id=\"e9d7e2d\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">T&iacute;tulo a obtener:</strong>&nbsp;Tecn&oacute;logo en Desarrollo de Software<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Per&iacute;odos acad&eacute;micos:&nbsp;</strong>4<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Modalidad:</strong>&nbsp;Presencial<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Horario:&nbsp;</strong>5 PM &ndash; 10 PM</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</main><footer id=\"site-footer\" class=\"site-footer wp-dark-mode-transparent\">\r\n<div class=\"hfg_footer wp-dark-mode-transparent\">\r\n<div id=\"cb-row--footer-desktop-bottom\" class=\"footer--row footer-bottom hide-on-mobile hide-on-tablet layout-full-contained\" data-row-id=\"bottom\" data-show-on=\"desktop\">\r\n<div class=\"footer--row-inner footer-bottom-inner footer-content-wrap\">\r\n<div class=\"container wp-dark-mode-transparent\">\r\n<div class=\"hfg-grid nv-footer-content hfg-grid-bottom row--wrapper row wp-dark-mode-transparent\" data-section=\"hfg_footer_layout_bottom\">\r\n<div class=\"hfg-slot left wp-dark-mode-transparent\">\r\n<div class=\"builder-item wp-dark-mode-transparent\">\r\n<div class=\"item--inner wp-dark-mode-transparent\">\r\n<div class=\"component-wrap wp-dark-mode-transparent\">\r\n<div class=\"wp-dark-mode-transparent\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</footer>', 'Ing. Paul Castillo Mgs.', 'paul.castillo@istsucua.edu.ec', 'careers/AE2S4JxMxnaQtTyFAhcCaVQYM6LQA0yv2yixk9KC.jpg', 'careers/faSp3MHV93zlTE0CbcBfoY9savHpGDTFcNWORieP.webp', '/uploads/careers/curriculum/1771519137_1. MallaCurricular_DS.pdf', 1, 1, '2025-12-12 00:28:28', '2026-03-31 06:38:22'),
(2, NULL, 'Agroecología', 'agroecologia', NULL, '<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-834c939 wp-dark-mode-transparent\" data-block-id=\"834c939\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Agroecolog&iacute;a</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-4ab54ec wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"4ab54ec\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Formar profesionales de tercer nivel superior tecnol&oacute;gico con competencias integrales para la aplicaci&oacute;n de conocimientos y experiencias sobre la ecolog&iacute;a en el dise&ntilde;o y gesti&oacute;n de agroecosistemas sostenibles de producci&oacute;n agr&iacute;cola, pecuaria y forestal aportando, de manera &eacute;tica, oportuna y eficiente, a las exigencias ambientales, culturales, econ&oacute;micas y sociales actuales del entorno.</p>\r\n</div>', '<div class=\"wp-block-stackable-text stk-block-text stk-block stk-e77c584 wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"e77c584\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Aplicar el pensamiento critico e innovador para organizar, planificar, producir y administrar unidades y sistema agropecuarios, respetando las particularidades culturales y el cuidado de la naturaleza aplicando principios ecol&oacute;gicos basados en el conocimiento cient&iacute;fico y ancestral para lograr la restauraci&oacute;n de ecosistemas degradados</p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-afe50ee wp-dark-mode-transparent\" data-block-id=\"afe50ee\">\r\n<p class=\"stk-block-text__text has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">T&iacute;tulo a obtener:</strong> Tecn&oacute;logo en Agroecolog&iacute;a<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Per&iacute;odos acad&eacute;micos:</strong> 4<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Modalidad:</strong>&nbsp;Presencial<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Horario:</strong> 17:H00 PM &ndash; 22:H00 PM</p>\r\n</div>', 'Ing. Juan Carlos Rivadeneira', 'juan.rivadeneira@istsucua.edu.ec', 'careers/DfdcVDRAHNSFtVsNh9WwVFWybV0HpH2GqbmG25Md.jpg', 'careers/ZixScRY5o26tEuPT0VZklV1FIREUg7g6sLVjj78N.jpg', '/uploads/careers/curriculum/1771519470_3. MallaCurricular_TSA-AC1.pdf', 1, 2, '2025-12-12 07:18:09', '2026-03-27 06:35:41'),
(3, NULL, 'Contabilidad y Asesoría Tributaria', 'contabilidad-y-asesoria-tributaria', NULL, '<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-7a5a315 wp-dark-mode-transparent\" data-block-id=\"7a5a315\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Contabilidad y Asesor&iacute;a Tributaria</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-919c580 wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"919c580\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">El estudio del proceso contable y las variaciones del patrimonio a trav&eacute;s del tiempo. El tecn&oacute;logo superior en Contabilidad analiza, registra, las operaciones mercantiles de los entes econ&oacute;micos, mediante las leyes tributarias, laborales y societarias, el cual da paso al movimiento patrimonial en los diferentes periodos contables. El principal m&eacute;todo relacionado al objeto definido es la manera de elaborar la informaci&oacute;n contable y consiste en un conjunto de postulados e hip&oacute;tesis que permiten someter a observaci&oacute;n la realidad econ&oacute;mica. Principio de dualidad, medici&oacute;n y valoraci&oacute;n, representaci&oacute;n y agregaci&oacute;n.</p>\r\n</div>', '<div class=\"wp-block-stackable-text stk-block-text stk-block stk-55d03c3 wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"55d03c3\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Es un profesional capaz de realizar todo proceso contable en peque&ntilde;as y medianas empresas, demostrando dominio de sus competencias profesionales, asistiendo en las &aacute;reas de contabilidad, finanzas, presupuestos, auditoria y tributaci&oacute;n; validando los resultados de un ejercicio econ&oacute;mico a trav&eacute;s de la formulaci&oacute;n de los diferentes estados financieros.</p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-2313c47 wp-dark-mode-transparent\" data-block-id=\"2313c47\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">T&iacute;tulo a obtener:</strong> Tecn&oacute;logo&nbsp; en Contabilidad<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Per&iacute;odos acad&eacute;micos:</strong>&nbsp;4<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Modalidad:</strong>&nbsp;Presencial<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Horario:</strong> 17:H00 PM &ndash; 22:H00 PM</p>\r\n</div>', 'Mgs.Edith Jara', 'edidh.jara@istsucua.edu.ec', 'careers/DtXqZbrEmtiApdMITG6apolkChA0u97kKZytkMXp.jpg', 'careers/vuNvLwhROv6YuuGUu4OdU9uhaTZVVlKgx4e0vgT0.jpg', '/uploads/careers/curriculum/1771519185_2. MallaCurricular_CAT.pdf', 1, 3, '2025-12-12 07:45:35', '2026-03-27 06:35:13'),
(4, NULL, 'Educación Inicial', 'educacion-inicial', NULL, '<p class=\"justificado\" style=\"text-align: justify;\"><strong>Educaci&oacute;n Inicial.</strong></p>\r\n<p class=\"justificado\" style=\"text-align: justify;\">El estudio de los procesos de desarrollo integral del ni&ntilde;o y la ni&ntilde;a desde la gestaci&oacute;n hasta los 5 a&ntilde;os de edad. El Tecn&oacute;logo Superior en Educaci&oacute;n Inicial planifica, ejecuta y eval&uacute;a experiencias de aprendizaje significativas, inclusivas e innovadoras, integrando metodolog&iacute;as activas y el uso estrat&eacute;gico de herramientas tecnol&oacute;gicas y did&aacute;cticas, conforme a las normativas vigentes, para garantizar el bienestar, el respeto a la diversidad y el m&aacute;ximo potencial de la primera infancia en diversos contextos.</p>', '<p class=\"justificado\" style=\"text-align: justify;\" data-path-to-node=\"9\">Es un profesional altamente competente en el dise&ntilde;o e implementaci&oacute;n de ambientes de aprendizaje seguros y estimulantes, demostrando dominio en la observaci&oacute;n, planificaci&oacute;n y evaluaci&oacute;n de los procesos de desarrollo de ni&ntilde;os y ni&ntilde;as. Est&aacute; capacitado para:</p>\r\n<ul data-path-to-node=\"10\">\r\n<li>\r\n<p class=\"justificado\" style=\"text-align: justify;\" data-path-to-node=\"10,0,0\"><strong>Dise&ntilde;ar Planificaciones Curriculares</strong> adaptadas a los distintos niveles y edades de la Educaci&oacute;n Inicial, integrando las Tecnolog&iacute;as de la Informaci&oacute;n y Comunicaci&oacute;n (TIC) para enriquecer el proceso educativo.</p>\r\n</li>\r\n<li>\r\n<p data-path-to-node=\"10,1,0\"><strong>Aplicar Estrategias de Juego y Estimulaci&oacute;n Temprana</strong> para potenciar el desarrollo psicomotriz, cognitivo y del lenguaje.</p>\r\n</li>\r\n<li>\r\n<p data-path-to-node=\"10,2,0\"><strong>Asistir en la Detecci&oacute;n Oportuna</strong> de necesidades educativas especiales (NEE) y brindar estrategias de apoyo y seguimiento inclusivo en el aula.</p>\r\n</li>\r\n<li>\r\n<p data-path-to-node=\"10,3,0\"><strong>Fomentar el V&iacute;nculo Familia-Comunidad-Instituci&oacute;n</strong>, asesorando a las familias en pr&aacute;cticas de crianza positiva y co-responsable.</p>\r\n</li>\r\n<li>\r\n<p class=\"justificado\" style=\"text-align: justify;\" data-path-to-node=\"10,4,0\"><strong>Gestionar y Coordinar</strong> programas y proyectos educativos en Centros de Desarrollo Infantil (CDI), instituciones educativas fiscales o privadas, y programas de atenci&oacute;n domiciliaria.</p>\r\n</li>\r\n</ul>', 'Mgs.Fernando Chala', 'fernando.chala@istsucua.edu.ec', 'careers/MIjykqFmLEpJNPuAd1vEjPFOo6zxW5jq8yQ3uci3.jpg', 'careers/9pJSOyy0VTiURyhpRryvPCAEwYQkcmUmSJWphsIe.jpg', '/uploads/careers/curriculum/1771519203_4. MallaCurricular_EI.pdf', 1, 4, '2025-12-13 03:34:55', '2026-03-27 06:34:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatbot_contacts`
--

CREATE TABLE `chatbot_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `carrera` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `chatbot_contacts`
--

INSERT INTO `chatbot_contacts` (`id`, `nombre`, `telefono`, `carrera`, `created_at`, `updated_at`) VALUES
(1, 'Omayra Santiak', '0998581500', 'agro', '2025-12-23 07:28:59', '2025-12-23 07:28:59'),
(2, 'Favian Cumbanama', '0983357890', 'informatica', '2025-12-23 07:33:08', '2025-12-23 07:33:08'),
(3, 'Jose Perez', '0985471568', 'agro', '2025-12-23 07:40:23', '2025-12-23 07:40:23'),
(4, 'Juan Castillo', '0956217856', 'agro', '2025-12-23 07:45:05', '2025-12-23 07:45:05'),
(5, 'Ana Lucia', '0985244552', 'conta', '2025-12-23 08:00:56', '2025-12-23 08:00:56'),
(6, 'Edwin Jara', '0985625452', 'agro', '2025-12-24 02:29:58', '2025-12-24 02:29:58'),
(7, 'Jose Agila', '0999999999', 'Desarrollo de Software', '2025-12-29 04:17:29', '2025-12-29 04:17:29'),
(8, 'Edwin Jara', '0939335214', 'Desarrollo de Software', '2026-01-08 01:48:29', '2026-01-08 01:48:29'),
(9, 'Paul Taisha', '0995216816', 'Desarrollo de Software', '2026-01-08 02:55:27', '2026-01-08 02:55:27'),
(10, 'Fausto S', '0987654332', 'Desarrollo de Software', '2026-01-21 03:25:15', '2026-01-21 03:25:15'),
(11, 'Jose Alvarado', '5867852485', 'edfgtg', '2026-01-22 03:53:38', '2026-01-22 03:53:38'),
(12, 'Paul Castillo', '0992443984', 'Desarrollo de Software', '2026-01-30 00:23:47', '2026-01-30 00:23:47'),
(13, 'Reny Chuimia', '0967995982', 'Contabilidad y Asesoría Tributaria', '2026-02-04 02:25:10', '2026-02-04 02:25:10'),
(14, 'Asdasd Adsas', '0989898989', 'Desarrollo de Software', '2026-02-10 00:28:10', '2026-02-10 00:28:10'),
(15, 'Ashley Zuñiga', '0998219118', 'Educación Inicial', '2026-02-20 02:12:16', '2026-02-20 02:12:16'),
(16, 'Widison Salinas', '0968600803', 'Agroecología', '2026-03-01 21:56:36', '2026-03-01 21:56:36'),
(17, 'Sara León', '0995782022', 'Educación Inicial', '2026-03-10 08:34:42', '2026-03-10 08:34:42'),
(18, 'Karen Yalitza Vera Japa', '0999124882', 'Minas', '2026-03-14 08:14:12', '2026-03-14 08:14:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatbot_settings`
--

CREATE TABLE `chatbot_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fallback_message` text DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_hours` varchar(255) DEFAULT NULL,
  `welcome_message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `user_message` text NOT NULL,
  `bot_response` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `sentiment` varchar(20) DEFAULT NULL,
  `unanswered` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `session_id`, `user_message`, `bot_response`, `ip_address`, `user_agent`, `sentiment`, `unanswered`, `created_at`, `updated_at`) VALUES
(1, 'chat_1766275648150_lwmrq5l0u', 'carreras', '1.- Desarrollo de software\r\n2.- Agroecologia.\r\n3.- contabilidad y Asesoria Tributaria\r\n4.- Educacion Inicial \r\n ', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-21 05:09:23', '2025-12-21 05:09:23'),
(2, 'chat_1766279130480_373l43bep', 'Carreras que ofertan', '1.- Desarrollo de software\r\n2.- Agroecologia.\r\n3.- contabilidad y Asesoria Tributaria\r\n4.- Educacion Inicial \r\n ', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-21 06:05:41', '2025-12-21 06:05:41'),
(3, 'chat_1766335813721_x2utlnhai', 'carreras', '1.- Desarrollo de software\r\n2.- Agroecologia.\r\n3.- contabilidad y Asesoria Tributaria\r\n4.- Educacion Inicial \r\n ', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-21 21:53:54', '2025-12-21 21:53:54'),
(4, 'chat_1766335813721_x2utlnhai', 'matriculas desarrollo de software', 'hola! Aun no hay fecha de matriculacion, te podemos ayudar con algo mas,', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-21 21:54:21', '2025-12-21 21:54:21'),
(5, 'chat_1766335813721_x2utlnhai', 'mas informacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-21 21:54:46', '2025-12-21 21:54:46'),
(6, 'chat_1766336558283_n9fhigdrg', 'mas informacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-21 22:35:07', '2025-12-21 22:35:07'),
(7, 'chat_1766336558283_n9fhigdrg', 'desarrollo de software', 'Carrera: Desarrollo de Software\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-652ee98 wp-dark-mode-transparent\" data-block-id=\"652ee98\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Desarrollo de Software</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-76364b3 wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"76364b3\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Formar profesionales con pensamiento crítico, creativo y ético; capaz de analizar, diseñar, codificar e implementar sistemas informáticos mediante la aplicación de metodologías de software para satisfacer las necesidades del mercado; basados en la ciencia de la matemática aplicada, enfocada a fortalecer el sector de la tecnología y sus usuarios, difundiendo los avances tecnológicos y resolviendo por medio de la sistematización problemas presentados en las empresas y la sociedad en general aplicando competencias profesionales mediante la formación de talento humano que procese las aplicaciones de forma supervisada trabajando en equipos bajo estándares de codificación, aportando significativamente a la transformación social, dentro de los contextos enmarcados en la productividad nacional.</p>\r\n</div>\nSi necesitas información específica sobre la carrera, por favor comunícate con el coordinador/a: Ing. Paul Castillo (Email: paul.castillo@istsucua.edu.ec). El horario de oficina es de 14:00 a 22:00.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-21 22:35:26', '2025-12-21 22:35:26'),
(8, 'chat_1766336558283_n9fhigdrg', 'contabilidad', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-21 22:36:33', '2025-12-21 22:36:33'),
(9, 'chat_1766336558283_n9fhigdrg', 'educacion inicial', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-21 22:37:05', '2025-12-21 22:37:05'),
(10, 'chat_1766338666809_t1q8cekid', 'carreras', '1.- Desarrollo de software\r\n2.- Agroecologia.\r\n3.- contabilidad y Asesoria Tributaria\r\n4.- Educacion Inicial \r\n ', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-21 22:37:57', '2025-12-21 22:37:57'),
(11, 'chat_1766338666809_t1q8cekid', 'mas informacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-21 22:38:07', '2025-12-21 22:38:07'),
(12, 'chat_1766338666809_t1q8cekid', 'desarrollo de software', 'Carrera: Desarrollo de Software\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-652ee98 wp-dark-mode-transparent\" data-block-id=\"652ee98\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Desarrollo de Software</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-76364b3 wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"76364b3\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Formar profesionales con pensamiento crítico, creativo y ético; capaz de analizar, diseñar, codificar e implementar sistemas informáticos mediante la aplicación de metodologías de software para satisfacer las necesidades del mercado; basados en la ciencia de la matemática aplicada, enfocada a fortalecer el sector de la tecnología y sus usuarios, difundiendo los avances tecnológicos y resolviendo por medio de la sistematización problemas presentados en las empresas y la sociedad en general aplicando competencias profesionales mediante la formación de talento humano que procese las aplicaciones de forma supervisada trabajando en equipos bajo estándares de codificación, aportando significativamente a la transformación social, dentro de los contextos enmarcados en la productividad nacional.</p>\r\n</div>\nSi necesitas información específica sobre la carrera, por favor comunícate con el coordinador/a: Ing. Paul Castillo (Email: paul.castillo@istsucua.edu.ec). El horario de oficina es de 14:00 a 22:00.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-21 22:38:26', '2025-12-21 22:38:26'),
(13, 'chat_1766338754990_1ndowtvbl', 'carreras', '1.- Desarrollo de software\r\n2.- Agroecologia.\r\n3.- contabilidad y Asesoria Tributaria\r\n4.- Educacion Inicial \r\n ', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'neutral', 0, '2025-12-21 22:39:57', '2025-12-21 22:39:57'),
(14, 'chat_1766338754990_1ndowtvbl', 'Agroecologia.', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'neutral', 1, '2025-12-21 22:40:12', '2025-12-21 22:40:12'),
(15, 'chat_1766338754990_1ndowtvbl', 'mas informacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'neutral', 1, '2025-12-21 22:40:28', '2025-12-21 22:40:28'),
(16, 'chat_1766338666809_t1q8cekid', 'mas informacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-21 22:41:59', '2025-12-21 22:41:59'),
(17, 'chat_1766339711471_sx7lgn0mp', 'mas informacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-21 22:55:23', '2025-12-21 22:55:23'),
(18, 'chat_1766339711471_sx7lgn0mp', 'informacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-21 22:55:41', '2025-12-21 22:55:41'),
(19, 'chat_1766339749179_kg8h7172w', 'mas informacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-21 22:56:01', '2025-12-21 22:56:01'),
(20, 'chat_1766339749179_kg8h7172w', 'mas información', '“Por favor, indícanos la carrera de tu interés para darte información personalizada.”', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-21 22:56:17', '2025-12-21 22:56:17'),
(21, 'chat_1766339711471_sx7lgn0mp', 'información', '“Por favor, indícanos la carrera de tu interés para darte información personalizada.”', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-21 22:56:44', '2025-12-21 22:56:44'),
(22, 'chat_1766339711471_sx7lgn0mp', 'Agroecologia', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-21 22:57:00', '2025-12-21 22:57:00'),
(23, 'chat_1766339711471_sx7lgn0mp', 'Agroecología', 'Carrera: Agroecología\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-834c939 wp-dark-mode-transparent\" data-block-id=\"834c939\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Agroecología</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-4ab54ec wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"4ab54ec\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Formar profesionales de tercer nivel superior tecnológico con competencias integrales para la aplicación de conocimientos y experiencias sobre la ecología en el diseño y gestión de agroecosistemas sostenibles de producción agrícola, pecuaria y forestal aportando, de manera ética, oportuna y eficiente, a las exigencias ambientales, culturales, económicas y sociales actuales del entorno.</p>\r\n</div>\nSi necesitas información específica sobre la carrera, por favor comunícate con el coordinador/a: Ing. Juan Carlos Rivadeneira. El horario de oficina es de 14:00 a 22:00.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-21 22:57:13', '2025-12-21 22:57:13'),
(24, 'chat_1766341097036_3gxstz8wo', 'autoridades', 'Autoridades actuales:\n- Fausto Fabian Suarez (Rector)\n- Luis Guartasaca (Vocal del OCS)\n- Mayra Gutiérrez (Vocal del OCS)\n- Favian Cumbanama (Presidente Del Consejo Estudiantil)\n', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-21 23:25:03', '2025-12-21 23:25:03'),
(25, 'chat_1766340564909_i2bqj5pag', 'mas informacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'neutral', 1, '2025-12-21 23:27:14', '2025-12-21 23:27:14'),
(26, 'chat_1766340564909_i2bqj5pag', 'carreras', '1.- Desarrollo de software\r\n2.- Agroecologia.\r\n3.- contabilidad y Asesoria Tributaria\r\n4.- Educacion Inicial \r\n ', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'neutral', 0, '2025-12-21 23:27:25', '2025-12-21 23:27:25'),
(27, 'chat_1766340564909_i2bqj5pag', 'informacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'neutral', 1, '2025-12-21 23:27:35', '2025-12-21 23:27:35'),
(28, 'chat_1766341661036_5g4u7onhh', 'informacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'neutral', 1, '2025-12-21 23:27:59', '2025-12-21 23:27:59'),
(29, 'chat_1766341661036_5g4u7onhh', 'información', '“Por favor, indícanos la carrera de tu interés para darte información personalizada.”', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'neutral', 0, '2025-12-21 23:28:19', '2025-12-21 23:28:19'),
(30, 'chat_1766341661036_5g4u7onhh', 'agoecologia', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'neutral', 1, '2025-12-21 23:28:37', '2025-12-21 23:28:37'),
(31, 'chat_1766341661036_5g4u7onhh', 'agroecología', 'Carrera: Agroecología\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-834c939 wp-dark-mode-transparent\" data-block-id=\"834c939\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Agroecología</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-4ab54ec wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"4ab54ec\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Formar profesionales de tercer nivel superior tecnológico con competencias integrales para la aplicación de conocimientos y experiencias sobre la ecología en el diseño y gestión de agroecosistemas sostenibles de producción agrícola, pecuaria y forestal aportando, de manera ética, oportuna y eficiente, a las exigencias ambientales, culturales, económicas y sociales actuales del entorno.</p>\r\n</div>\nSi necesitas información específica sobre la carrera, por favor comunícate con el coordinador/a: Ing. Juan Carlos Rivadeneira. El horario de oficina es de 14:00 a 22:00.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'neutral', 0, '2025-12-21 23:28:55', '2025-12-21 23:28:55'),
(32, 'chat_1766341097036_3gxstz8wo', 'agroecologia', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-22 00:11:43', '2025-12-22 00:11:43'),
(33, 'chat_1766341097036_3gxstz8wo', 'agroecología', 'Carrera: Agroecología\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-834c939 wp-dark-mode-transparent\" data-block-id=\"834c939\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Agroecología</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-4ab54ec wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"4ab54ec\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Formar profesionales de tercer nivel superior tecnológico con competencias integrales para la aplicación de conocimientos y experiencias sobre la ecología en el diseño y gestión de agroecosistemas sostenibles de producción agrícola, pecuaria y forestal aportando, de manera ética, oportuna y eficiente, a las exigencias ambientales, culturales, económicas y sociales actuales del entorno.</p>\r\n</div>\nSi necesitas información específica sobre la carrera, por favor comunícate con el coordinador/a: Ing. Juan Carlos Rivadeneira. El horario de oficina es de 14:00 a 22:00.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 00:11:59', '2025-12-22 00:11:59'),
(34, 'chat_1766344669754_bbn08t3em', 'agroecologia', 'Carrera: Agroecología\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-834c939 wp-dark-mode-transparent\" data-block-id=\"834c939\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Agroecología</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-4ab54ec wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"4ab54ec\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Formar profesionales de tercer nivel superior tecnológico con competencias integrales para la aplicación de conocimientos y experiencias sobre la ecología en el diseño y gestión de agroecosistemas sostenibles de producción agrícola, pecuaria y forestal aportando, de manera ética, oportuna y eficiente, a las exigencias ambientales, culturales, económicas y sociales actuales del entorno.</p>\r\n</div>\nSi necesitas información específica sobre la carrera, por favor comunícate con el coordinador/a: Ing. Juan Carlos Rivadeneira. El horario de oficina es de 14:00 a 22:00.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 00:18:01', '2025-12-22 00:18:01'),
(35, 'chat_1766348502493_vmgwt281d', 'tramites', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-22 01:21:52', '2025-12-22 01:21:52'),
(36, 'chat_1766344669754_bbn08t3em', 'tramites', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-22 01:22:15', '2025-12-22 01:22:15'),
(37, 'chat_1766348577917_7zfzmz69w', 'carreras', '1.- Desarrollo de software\r\n2.- Agroecologia.\r\n3.- contabilidad y Asesoria Tributaria\r\n4.- Educacion Inicial \r\n ', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 01:23:07', '2025-12-22 01:23:07'),
(38, 'chat_1766348577917_7zfzmz69w', 'docentes', 'Planta docente actual:\n- FAUSTO FABIAN SUAREZ QUITO (Magister. Seguridad Informatica)\n- PAUL CASTILLO (Magister)\n- EDWIN VICENTE JARA FRÍAS (Magister)\n', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 01:23:27', '2025-12-22 01:23:27'),
(39, 'chat_1766348577917_7zfzmz69w', 'servicios', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-22 01:23:50', '2025-12-22 01:23:50'),
(40, 'chat_1766349115781_0fur5v0bo', 'servicios', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-22 01:33:38', '2025-12-22 01:33:38'),
(41, 'chat_1766350642078_i175xlllh', 'documentosd', 'Información sobre trámites y procesos:\n- SIGA: \n- Formulario de Matricula: \n', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 01:57:33', '2025-12-22 01:57:33'),
(42, 'chat_1766350642078_i175xlllh', 'reglamentos', 'Contenido relacionado: Reglamentos\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-28a3fb8 wp-dark-mode-transparent\" data-block-id=\"28a3fb8\"> </div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-75593d1 wp-dark-mode-transparent\" data-block-id=\"75593d1\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\" style=\"text-align: justify;\">Conjunto de normas y directrices que regulan el comportamiento y las actividades de sus miembros. Estos reglamentos establecen derechos, deberes y procedimientos, con el fin de mantener un ambiente de trabajo o estudio ordenado, seguro y equitativo. Sirven para garantizar el cumplimiento de los objetivos institucionales, promover la convivencia y asegurar que las políticas de la institución se apliquen de manera uniforme y justa para todos los involucrados.</p>\r\n</div>', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 01:58:02', '2025-12-22 01:58:02'),
(43, 'chat_1766350642078_i175xlllh', 'rendicion de cuentas', 'Contenido relacionado: Rendición de Cuentas\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-0630ff3 wp-dark-mode-transparent\" data-block-id=\"0630ff3\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle wp-dark-mode-transparent\" style=\"text-align: center;\"><strong class=\"wp-dark-mode-transparent\">Rendición de cuentas 2025</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-b23de2c wp-dark-mode-transparent\" data-block-id=\"b23de2c\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\" style=\"text-align: justify;\">La rendición de cuentas es el proceso mediante el cual una persona o entidad tiene la obligación de informar, justificar y asumir la responsabilidad por sus acciones, decisiones y resultados ante un público o autoridad específica. En el contexto institucional, la rendición de cuentas implica transparencia y responsabilidad en el manejo de recursos, cumplimiento de objetivos y en la toma de decisiones, garantizando que las operaciones se realicen de acuerdo con las normas y expectativas establecidas.</p>\r\n</div>', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 01:58:26', '2025-12-22 01:58:26'),
(44, 'chat_1766350642078_i175xlllh', 'educacion inicial', 'Carrera: Educación Inicial\n<p class=\"justificado\" style=\"text-align: justify;\"><strong>Educación Inicial.</strong></p>\r\n<p class=\"justificado\" style=\"text-align: justify;\">El estudio de los procesos de desarrollo integral del niño y la niña desde la gestación hasta los 5 años de edad. El Tecnólogo Superior en Educación Inicial planifica, ejecuta y evalúa experiencias de aprendizaje significativas, inclusivas e innovadoras, integrando metodologías activas y el uso estratégico de herramientas tecnológicas y didácticas, conforme a las normativas vigentes, para garantizar el bienestar, el respeto a la diversidad y el máximo potencial de la primera infancia en diversos contextos.</p>\nSi necesitas información específica sobre la carrera, por favor comunícate con el coordinador/a: Deivison Velasco. El horario de oficina es de 14:00 a 22:00.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 01:58:47', '2025-12-22 01:58:47'),
(45, 'chat_1766350642078_i175xlllh', 'contabilidad', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-22 01:59:10', '2025-12-22 01:59:10'),
(46, 'chat_1766351408553_xs5ojmhre', 'autoridades', 'Autoridades actuales:\n- Fausto Fabian Suarez (Rector)\n- Luis Guartasaca (Vocal del OCS)\n- Mayra Gutiérrez (Vocal del OCS)\n- Favian Cumbanama (Presidente Del Consejo Estudiantil)\n', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 02:10:56', '2025-12-22 02:10:56'),
(47, 'chat_1766355521629_fzjn5aduf', 'carreras', '1.- Desarrollo de software\r\n2.- Agroecologia.\r\n3.- contabilidad y Asesoria Tributaria\r\n4.- Educacion Inicial \r\n ', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 03:21:03', '2025-12-22 03:21:03'),
(48, 'chat_1766355521629_fzjn5aduf', 'educacion inicial', 'Carrera: Educación Inicial\n<p class=\"justificado\" style=\"text-align: justify;\"><strong>Educación Inicial.</strong></p>\r\n<p class=\"justificado\" style=\"text-align: justify;\">El estudio de los procesos de desarrollo integral del niño y la niña desde la gestación hasta los 5 años de edad. El Tecnólogo Superior en Educación Inicial planifica, ejecuta y evalúa experiencias de aprendizaje significativas, inclusivas e innovadoras, integrando metodologías activas y el uso estratégico de herramientas tecnológicas y didácticas, conforme a las normativas vigentes, para garantizar el bienestar, el respeto a la diversidad y el máximo potencial de la primera infancia en diversos contextos.</p>\nSi necesitas información específica sobre la carrera, por favor comunícate con el coordinador/a: Deivison Velasco. El horario de oficina es de 14:00 a 22:00.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 03:21:21', '2025-12-22 03:21:21'),
(49, 'chat_1766355521629_fzjn5aduf', 'documentos', 'Información sobre trámites y procesos:\n- SIGA: \n- Formulario de Matricula: \n', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 03:21:45', '2025-12-22 03:21:45'),
(50, 'chat_1766355521629_fzjn5aduf', 'autoridades', 'Autoridades actuales:\n- Fausto Fabian Suarez (Rector)\n- Luis Guartasaca (Vocal del OCS)\n- Mayra Gutiérrez (Vocal del OCS)\n- Favian Cumbanama (Presidente Del Consejo Estudiantil)\n', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 03:22:08', '2025-12-22 03:22:08'),
(51, 'chat_1766355521629_fzjn5aduf', 'historia', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-22 03:22:18', '2025-12-22 03:22:18'),
(52, 'chat_1766355521629_fzjn5aduf', 'inscripciones', 'Información sobre trámites y procesos:\n- SIGA: \n- Formulario de Matricula: \n', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-22 03:22:37', '2025-12-22 03:22:37'),
(53, 'chat_1766958547944_wndkyk34d', 'autoridades', 'Autoridades actuales:\n- Fausto Fabian Suarez (Rector)\n- Luis Guartasaca (Vocal del OCS)\n- Mayra Gutiérrez (Vocal del OCS)\n- Favian Cumbanama (Presidente Del Consejo Estudiantil)\n', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-29 02:49:52', '2025-12-29 02:49:52'),
(54, 'chat_1766960224272_qikwefaf6', 'Horario de clases', 'Hola los Horarios de clases son de 17:00 pm - 22: 00 pm', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-29 03:19:03', '2025-12-29 03:19:03'),
(55, 'chat_1766963964693_fizyxdkax', 'informacion', '“Por favor, indícanos la carrera de tu interés para darte información personalizada.”', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-29 04:19:57', '2025-12-29 04:19:57'),
(56, 'chat_1767149191617_7q8c2ef4x', 'que carera ofreta', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '164.163.48.31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2025-12-31 07:49:09', '2025-12-31 07:49:09'),
(57, 'chat_1767148819738_5bh43ikw0', 'formulario de matricula', 'Contenido relacionado: Formulario de Matricula\n', '164.163.48.31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-31 07:51:32', '2025-12-31 07:51:32'),
(58, 'chat_1767148819738_5bh43ikw0', 'docentes', 'Planta docente actual:\n- FAUSTO FABIAN SUAREZ QUITO (Magister. Seguridad Informatica)\n- PAUL CASTILLO (Magister)\n- EDWIN VICENTE JARA FRÍAS (Magister)\n- PAUL TAISHA (Ingeniero)\n- CRISTIAN ERAZO (Ingeniero)\n- MARCO TIGRE (Magister)\n', '164.163.48.31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2025-12-31 07:51:44', '2025-12-31 07:51:44'),
(59, 'chat_1767818892512_q3q4xfw5a', 'Hola', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.211.10.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-08 01:48:34', '2026-01-08 01:48:34'),
(60, 'chat_1767818271227_zgywu5pfd', 'Saludos', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.211.10.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-08 01:48:51', '2026-01-08 01:48:51'),
(61, 'chat_1767818892512_q3q4xfw5a', 'necesito saber la malla curricular', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.211.10.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-08 01:49:05', '2026-01-08 01:49:05'),
(62, 'chat_1767818271227_zgywu5pfd', 'duracion de la carrera', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.211.10.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-08 01:49:25', '2026-01-08 01:49:25'),
(63, 'chat_1767818892512_q3q4xfw5a', 'años de duracion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.211.10.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-08 01:49:36', '2026-01-08 01:49:36'),
(64, 'chat_1767818892512_q3q4xfw5a', 'que informacion me puedes dar de la carrera', '“Por favor, indícanos la carrera de tu interés para darte información personalizada.”', '181.211.10.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-08 01:49:56', '2026-01-08 01:49:56'),
(65, 'chat_1767818271227_zgywu5pfd', 'desarrollo de software', 'Carrera: Desarrollo de Software\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-652ee98 wp-dark-mode-transparent\" data-block-id=\"652ee98\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Desarrollo de Software</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-76364b3 wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"76364b3\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Formar profesionales con pensamiento cr&iacute;tico, creativo y &eacute;tico; capaz de analizar, dise&ntilde;ar, codificar e implementar sistemas inform&aacute;ticos mediante la aplicaci&oacute;n de metodolog&iacute;as de software para satisfacer las necesidades del mercado; basados en la ciencia de la matem&aacute;tica aplicada, enfocada a fortalecer el sector de la tecnolog&iacute;a y sus usuarios, difundiendo los avances tecnol&oacute;gicos y resolviendo por medio de la sistematizaci&oacute;n problemas presentados en las empresas y la sociedad en general aplicando competencias profesionales mediante la formaci&oacute;n de talento humano que procese las aplicaciones de forma supervisada trabajando en equipos bajo est&aacute;ndares de codificaci&oacute;n, aportando significativamente a la transformaci&oacute;n social, dentro de los contextos enmarcados en la productividad nacional.</p>\r\n</div>\nSi necesitas información específica sobre la carrera, por favor comunícate con el coordinador/a: Ing. Paul Castillo (Email: paul.castillo@istsucua.edu.ec). El horario de oficina es de 14:00 a 22:00.', '181.211.10.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-08 01:50:09', '2026-01-08 01:50:09'),
(66, 'chat_1767818271227_zgywu5pfd', 'duracion de la carrera', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.211.10.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-08 01:50:20', '2026-01-08 01:50:20'),
(67, 'chat_1767822536198_hvfei8021', 'desarrollo de software', 'Carrera: Desarrollo de Software\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-652ee98 wp-dark-mode-transparent\" data-block-id=\"652ee98\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Desarrollo de Software</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-76364b3 wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"76364b3\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Formar profesionales con pensamiento cr&iacute;tico, creativo y &eacute;tico; capaz de analizar, dise&ntilde;ar, codificar e implementar sistemas inform&aacute;ticos mediante la aplicaci&oacute;n de metodolog&iacute;as de software para satisfacer las necesidades del mercado; basados en la ciencia de la matem&aacute;tica aplicada, enfocada a fortalecer el sector de la tecnolog&iacute;a y sus usuarios, difundiendo los avances tecnol&oacute;gicos y resolviendo por medio de la sistematizaci&oacute;n problemas presentados en las empresas y la sociedad en general aplicando competencias profesionales mediante la formaci&oacute;n de talento humano que procese las aplicaciones de forma supervisada trabajando en equipos bajo est&aacute;ndares de codificaci&oacute;n, aportando significativamente a la transformaci&oacute;n social, dentro de los contextos enmarcados en la productividad nacional.</p>\r\n</div>\nSi necesitas información específica sobre la carrera, por favor comunícate con el coordinador/a: Ing. Paul Castillo (Email: paul.castillo@istsucua.edu.ec). El horario de oficina es de 14:00 a 22:00.', '186.33.42.168', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-08 02:53:18', '2026-01-08 02:53:18'),
(68, 'chat_1767823226977_czh72idql', 'adsdf', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '186.33.42.168', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-08 03:01:04', '2026-01-08 03:01:04'),
(69, 'chat_1768155806732_cymzewqt2', 'software', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '164.163.48.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-11 23:23:58', '2026-01-11 23:23:58'),
(70, 'chat_1768155806732_cymzewqt2', 'software', '\r\n\r\nDescripci&oacute;n\r\n\r\n\r\nDesarrollo de Software\r\n\r\n\r\nFormar profesionales con pensamiento cr&iacute;tico, creativo y &eacute;tico; capaz de analizar, dise&ntilde;ar, codificar e implementar sistemas inform&aacute;ticos mediante la aplicaci&oacute;n de metodolog&iacute;as de software para satisfacer las necesidades del mercado; basados en la ciencia de la matem&aacute;tica aplicada, enfocada a fortalecer el sector de la tecnolog&iacute;a y sus usuarios, difundiendo los avances tecnol&oacute;gicos y resolviendo por medio de la sistematizaci&oacute;n problemas presentados en las empresas y la sociedad en general aplicando competencias profesionales mediante la formaci&oacute;n de talento humano que procese las aplicaciones de forma supervisada trabajando en equipos bajo est&aacute;ndares de codificaci&oacute;n, aportando significativamente a la transformaci&oacute;n social, dentro de los contextos enmarcados en la productividad nacional.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nPerfil Profesional\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nAnalizar los requerimientos del usuario mediante metodolog&iacute;as de desarrollo de software. Desarrollar sistemas inform&aacute;ticos de escritorio, web y aplicaciones m&oacute;viles. Codificar sistemas inform&aacute;ticos utilizando lenguajes de programaci&oacute;n de &uacute;ltima generaci&oacute;n. Implementar el software elaborado en un ambiente de trabajo.\r\n\r\n\r\nT&iacute;tulo a obtener:&nbsp;Tecn&oacute;logo Superior en Desarrollo de SoftwarePer&iacute;odos acad&eacute;micos:&nbsp;4Modalidad:&nbsp;PresencialHorario:&nbsp;5 PM &ndash; 10 PM\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n&nbsp;\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nCoordinador\r\nIng. Paul Castillo\r\nEmail:&nbsp;paul.castillo@istsucua.edu.ec\r\n\r\n\r\nMalla Curricular\r\n', '164.163.48.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-11 23:32:46', '2026-01-11 23:32:46'),
(71, 'chat_1768155806732_cymzewqt2', 'software', '\r\n\r\n\r\n\r\nDesarrollo de Software\r\n\r\n\r\nFormar profesionales con pensamiento cr&iacute;tico, creativo y &eacute;tico; capaz de analizar, dise&ntilde;ar, codificar e implementar sistemas inform&aacute;ticos mediante la aplicaci&oacute;n de metodolog&iacute;as de software para satisfacer las necesidades del mercado; basados en la ciencia de la matem&aacute;tica aplicada, enfocada a fortalecer el sector de la tecnolog&iacute;a y sus usuarios, difundiendo los avances tecnol&oacute;gicos y resolviendo por medio de la sistematizaci&oacute;n problemas presentados en las empresas y la sociedad en general aplicando competencias profesionales mediante la formaci&oacute;n de talento humano que procese las aplicaciones de forma supervisada trabajando en equipos bajo est&aacute;ndares de codificaci&oacute;n, aportando significativamente a la transformaci&oacute;n social, dentro de los contextos enmarcados en la productividad nacional.\r\n\r\n\r\n\r\n\r\n\r\n\r\nPerfil Profesional\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nAnalizar los requerimientos del usuario mediante metodolog&iacute;as de desarrollo de software. Desarrollar sistemas inform&aacute;ticos de escritorio, web y aplicaciones m&oacute;viles. Codificar sistemas inform&aacute;ticos utilizando lenguajes de programaci&oacute;n de &uacute;ltima generaci&oacute;n. Implementar el software elaborado en un ambiente de trabajo.\r\n\r\n\r\nT&iacute;tulo a obtener:&nbsp;Tecn&oacute;logo Superior en Desarrollo de SoftwarePer&iacute;odos acad&eacute;micos:&nbsp;4Modalidad:&nbsp;PresencialHorario:&nbsp;5 PM &ndash; 10 PM\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n&nbsp;\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nCoordinador\r\nIng. Paul Castillo\r\nEmail:&nbsp;paul.castillo@istsucua.edu.ec\r\n\r\n\r\n&nbsp;\r\n', '164.163.48.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-11 23:35:32', '2026-01-11 23:35:32'),
(72, 'chat_1768155806732_cymzewqt2', 'software', '\r\n\r\n\r\n\r\nDesarrollo de Software\r\n\r\n&nbsp;\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nAnalizar los requerimientos del usuario mediante metodolog&iacute;as de desarrollo de software. Desarrollar sistemas inform&aacute;ticos de escritorio, web y aplicaciones m&oacute;viles. Codificar sistemas inform&aacute;ticos utilizando lenguajes de programaci&oacute;n de &uacute;ltima generaci&oacute;n. Implementar el software elaborado en un ambiente de trabajo.\r\n* horario de clases de 1700:pm a 2200:pm\r\n\r\n\r\nT&iacute;tulo a obtener:&nbsp;Tecn&oacute;logo Superior en Desarrollo de SoftwarePer&iacute;odos acad&eacute;micos:&nbsp;4Modalidad:&nbsp;PresencialHorario:&nbsp;5 PM &ndash; 10 PM\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nM&aacute;s informaci&oacute;n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nCoordinador\r\nIng. Paul Castillo\r\nEmail:&nbsp;paul.castillo@istsucua.edu.ec\r\n', '164.163.48.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-11 23:40:31', '2026-01-11 23:40:31'),
(73, 'chat_1768172816256_i0kxcqa5s', 'horarios', 'Hola los Horarios de clases son de 17:00 pm - 22: 00 pm', '164.163.48.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-12 04:13:21', '2026-01-12 04:13:21'),
(74, 'chat_1768172811686_xncaa3sev', 'autoridades', 'Autoridades actuales:\n- Fausto Fabian Suarez (Rector)\n- Luis Guartasaca (Vocal del OCS)\n- Mayra Gutiérrez (Vocal del OCS)\n- Favian Cumbanama (Presidente Del Consejo Estudiantil)\n', '164.163.48.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-12 04:13:23', '2026-01-12 04:13:23'),
(75, 'chat_1768172807618_ncjwq763o', 'software', '\r\n\r\n\r\n\r\nDesarrollo de Software\r\n\r\n&nbsp;\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nAnalizar los requerimientos del usuario mediante metodolog&iacute;as de desarrollo de software. Desarrollar sistemas inform&aacute;ticos de escritorio, web y aplicaciones m&oacute;viles. Codificar sistemas inform&aacute;ticos utilizando lenguajes de programaci&oacute;n de &uacute;ltima generaci&oacute;n. Implementar el software elaborado en un ambiente de trabajo.\r\n* horario de clases de 1700:pm a 2200:pm\r\n\r\n\r\nT&iacute;tulo a obtener:&nbsp;Tecn&oacute;logo Superior en Desarrollo de SoftwarePer&iacute;odos acad&eacute;micos:&nbsp;4Modalidad:&nbsp;PresencialHorario:&nbsp;5 PM &ndash; 10 PM\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nM&aacute;s informaci&oacute;n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nCoordinador\r\nIng. Paul Castillo\r\nEmail:&nbsp;paul.castillo@istsucua.edu.ec\r\n', '164.163.48.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-12 04:13:26', '2026-01-12 04:13:26'),
(76, 'chat_1768172798374_s07yl8nbt', 'agroecologia', 'Carrera: Agroecología\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-834c939 wp-dark-mode-transparent\" data-block-id=\"834c939\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Agroecología</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-4ab54ec wp-dark-mode-transparent justificado\" style=\"text-align: justify;\" data-block-id=\"4ab54ec\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\">Formar profesionales de tercer nivel superior tecnológico con competencias integrales para la aplicación de conocimientos y experiencias sobre la ecología en el diseño y gestión de agroecosistemas sostenibles de producción agrícola, pecuaria y forestal aportando, de manera ética, oportuna y eficiente, a las exigencias ambientales, culturales, económicas y sociales actuales del entorno.</p>\r\n</div>\nSi necesitas información específica sobre la carrera, por favor comunícate con el coordinador/a: Ing. Juan Carlos Rivadeneira. El horario de oficina es de 14:00 a 22:00.', '164.163.48.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-12 04:13:28', '2026-01-12 04:13:28');
INSERT INTO `chat_messages` (`id`, `session_id`, `user_message`, `bot_response`, `ip_address`, `user_agent`, `sentiment`, `unanswered`, `created_at`, `updated_at`) VALUES
(77, 'chat_1768178895097_823jhw1rb', 'software', '\r\n\r\n\r\n\r\nDesarrollo de Software\r\n\r\n&nbsp;\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nAnalizar los requerimientos del usuario mediante metodolog&iacute;as de desarrollo de software. Desarrollar sistemas inform&aacute;ticos de escritorio, web y aplicaciones m&oacute;viles. Codificar sistemas inform&aacute;ticos utilizando lenguajes de programaci&oacute;n de &uacute;ltima generaci&oacute;n. Implementar el software elaborado en un ambiente de trabajo.\r\n* horario de clases de 1700:pm a 2200:pm\r\n\r\n\r\nT&iacute;tulo a obtener:&nbsp;Tecn&oacute;logo Superior en Desarrollo de SoftwarePer&iacute;odos acad&eacute;micos:&nbsp;4Modalidad:&nbsp;PresencialHorario:&nbsp;5 PM &ndash; 10 PM\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nM&aacute;s informaci&oacute;n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nCoordinador\r\nIng. Paul Castillo\r\nEmail:&nbsp;paul.castillo@istsucua.edu.ec\r\n', '164.163.48.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-12 05:48:48', '2026-01-12 05:48:48'),
(78, 'chat_1768178895097_823jhw1rb', 'desarrollo de software', '\r\n\r\n\r\n\r\nDesarrollo de Software\r\n\r\n&nbsp;\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nAnalizar los requerimientos del usuario mediante metodolog&iacute;as de desarrollo de software. Desarrollar sistemas inform&aacute;ticos de escritorio, web y aplicaciones m&oacute;viles. Codificar sistemas inform&aacute;ticos utilizando lenguajes de programaci&oacute;n de &uacute;ltima generaci&oacute;n. Implementar el software elaborado en un ambiente de trabajo.\r\n* horario de clases de 1700:pm a 2200:pm\r\n\r\n\r\nT&iacute;tulo a obtener:&nbsp;Tecn&oacute;logo Superior en Desarrollo de SoftwarePer&iacute;odos acad&eacute;micos:&nbsp;4Modalidad:&nbsp;PresencialHorario:&nbsp;5 PM &ndash; 10 PM\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nM&aacute;s informaci&oacute;n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nCoordinador\r\nIng. Paul Castillo\r\nEmail:&nbsp;paul.castillo@istsucua.edu.ec\r\n', '164.163.48.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-12 05:49:19', '2026-01-12 05:49:19'),
(79, 'chat_1768947833910_0t5w5yhek', 'Cuales son las carreras', '1.- Desarrollo de software\r\n2.- Agroecologia.\r\n3.- contabilidad y Asesoria Tributaria\r\n4.- Educacion Inicial \r\n ', '181.211.10.246', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:147.0) Gecko/20100101 Firefox/147.0', 'neutral', 0, '2026-01-21 03:25:43', '2026-01-21 03:25:43'),
(80, 'chat_1768947833910_0t5w5yhek', 'duracion de desarrollo de software', '\r\n\r\n\r\n\r\nDesarrollo de Software\r\n\r\n&nbsp;\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nAnalizar los requerimientos del usuario mediante metodolog&iacute;as de desarrollo de software. Desarrollar sistemas inform&aacute;ticos de escritorio, web y aplicaciones m&oacute;viles. Codificar sistemas inform&aacute;ticos utilizando lenguajes de programaci&oacute;n de &uacute;ltima generaci&oacute;n. Implementar el software elaborado en un ambiente de trabajo.\r\n* horario de clases de 1700:pm a 2200:pm\r\n\r\n\r\nT&iacute;tulo a obtener:&nbsp;Tecn&oacute;logo Superior en Desarrollo de SoftwarePer&iacute;odos acad&eacute;micos:&nbsp;4Modalidad:&nbsp;PresencialHorario:&nbsp;5 PM &ndash; 10 PM\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nM&aacute;s informaci&oacute;n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nCoordinador\r\nIng. Paul Castillo\r\nEmail:&nbsp;paul.castillo@istsucua.edu.ec\r\n', '181.211.10.246', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:147.0) Gecko/20100101 Firefox/147.0', 'neutral', 0, '2026-01-21 03:26:07', '2026-01-21 03:26:07'),
(81, 'chat_1769647475235_1w75ymphl', 'que carreras ofertan', 'Carreras tecnológicas disponibles:\n- Desarrollo de Software\n- Agroecología\n- Contabilidad y Asesoría Tributaria\n- Educación Inicial\n- PRUEBA\n', '164.163.48.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-29 05:45:09', '2026-01-29 05:45:09'),
(82, 'chat_1769657832948_3w2t6z7ye', 'Que carreras ofertan', 'Carreras tecnológicas disponibles:\n- Desarrollo de Software\n- Agroecología\n- Contabilidad y Asesoría Tributaria\n- Educación Inicial\n- PRUEBA\n- PRUEBA 2\n', '164.163.48.15', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', 'neutral', 0, '2026-01-29 08:37:44', '2026-01-29 08:37:44'),
(83, 'chat_1769714610452_k15lpby2e', 'Cuantos ciclos son', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.211.10.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'neutral', 1, '2026-01-30 00:23:59', '2026-01-30 00:23:59'),
(84, 'chat_1769717591098_hhpjczuhl', 'Cuantos ciclos son', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '177.234.232.40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'neutral', 1, '2026-01-30 01:13:30', '2026-01-30 01:13:30'),
(85, 'chat_1769723747780_15hqirtox', 'qq', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '177.234.232.40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-30 02:56:39', '2026-01-30 02:56:39'),
(86, 'chat_1769723747780_15hqirtox', 'desarrollo de software', '\r\n\r\n\r\n\r\nDesarrollo de Software\r\n\r\n&nbsp;\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nAnalizar los requerimientos del usuario mediante metodolog&iacute;as de desarrollo de software. Desarrollar sistemas inform&aacute;ticos de escritorio, web y aplicaciones m&oacute;viles. Codificar sistemas inform&aacute;ticos utilizando lenguajes de programaci&oacute;n de &uacute;ltima generaci&oacute;n. Implementar el software elaborado en un ambiente de trabajo.\r\n* horario de clases de 1700:pm a 2200:pm\r\n\r\n\r\nT&iacute;tulo a obtener:&nbsp;Tecn&oacute;logo Superior en Desarrollo de SoftwarePer&iacute;odos acad&eacute;micos:&nbsp;4Modalidad:&nbsp;PresencialHorario:&nbsp;5 PM &ndash; 10 PM\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nM&aacute;s informaci&oacute;n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nCoordinador\r\nIng. Paul Castillo\r\nEmail:&nbsp;paul.castillo@istsucua.edu.ec\r\n', '177.234.232.40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-30 02:56:47', '2026-01-30 02:56:47'),
(87, 'chat_1769723747780_15hqirtox', 'fecha de matricula', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '177.234.232.40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-30 02:57:01', '2026-01-30 02:57:01'),
(88, 'chat_1769728541227_1loq12yo1', 'cual es el costo de la educacion', 'La educaci&oacute;n es gratuita sin costo, salvo que se pierda la carrera o sea una segunda carrera', '181.211.10.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'neutral', 0, '2026-01-30 04:16:10', '2026-01-30 04:16:10'),
(89, 'chat_1769875968040_w7m2so0df', 'PROXIMOS EVENTOS', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '164.163.48.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-31 21:16:09', '2026-01-31 21:16:09'),
(90, 'chat_1769875968040_w7m2so0df', 'CURSOS', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '164.163.48.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 1, '2026-01-31 21:16:18', '2026-01-31 21:16:18'),
(91, 'chat_1769877717142_fjrkmc3f8', 'EVENTOS', 'Por el momento no tenemos eventos futuros registrados. Te invito a estar pendiente de nuestras redes sociales y la sección de noticias.', '164.163.48.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-31 21:42:13', '2026-01-31 21:42:13'),
(92, 'chat_1769877717142_fjrkmc3f8', 'MATRICULAS', 'hola! Aun no hay fecha de matriculacion, te podemos ayudar con algo mas,', '164.163.48.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-31 21:42:58', '2026-01-31 21:42:58'),
(93, 'chat_1769877717142_fjrkmc3f8', 'QUEQUISITOS PARA MATRICULA', 'Nosotros publicamos en redes sociales las fechas calendarizadas para el proceso', '164.163.48.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-31 21:43:19', '2026-01-31 21:43:19'),
(94, 'chat_1769878111379_i7rf1gr48', 'CUALES SON LOS PROXIMOS EVENTOS', '📅 ¡Claro! Estos son los próximos eventos programados:\n\n🔹 *CURSO DE OVINOS*\n   🗓 Fecha: 01/02/2026\n   📍 Lugar: SECAP\n\n¡Te esperamos!', '164.163.48.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-31 21:48:59', '2026-01-31 21:48:59'),
(95, 'chat_1769878221913_x7bxgn9ck', 'EVENTOS', '📅 ¡Claro! Estos son los próximos eventos programados:\n\n🔹 *CURSO DE OVINOS*\n   🗓 Fecha: 01/02/2026\n   📍 Lugar: SECAP\n\n¡Te esperamos!', '164.163.48.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-31 21:50:44', '2026-01-31 21:50:44'),
(96, 'chat_1769879213979_0jsrsemqa', 'eventos', '📅 ¡Claro! Tenemos estos eventos para ti:\n\n🔹 *CURSO DE OVINOS*\n   🗓 Fecha: 01/02/2026\n   📍 Lugar: SECAP\n   🔗 Inscripción/Info: http://siga.institutos.gob.ec:8080/siga-web/ariel.jsf\n\n¡Te esperamos!', '164.163.48.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-31 22:07:07', '2026-01-31 22:07:07'),
(97, 'chat_1769879588496_rx8eot89k', 'eventos', '📅 ¡Claro! Tenemos estos eventos para ti:\n\n🔹 *CURSO DE OVINOS*\n   🗓 Fecha: 01/02/2026\n   📍 Lugar: SECAP\n   🔗 Inscripción/Info: http://siga.institutos.gob.ec:8080/siga-web/ariel.jsf\n\n¡Te esperamos!', '164.163.48.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-01-31 22:14:08', '2026-01-31 22:14:08'),
(98, 'chat_1769889902801_4yolc1qo1', 'eventos', '📅 ¡Claro! Estos son los próximos eventos programados:\n\n🔹 *CURSO DE OVINOS*\n   🗓 Fecha: 01/02/2026\n   📍 Lugar: SECAP\n\n¡Te esperamos!', '164.163.48.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-01 01:05:20', '2026-02-01 01:05:20'),
(99, 'chat_1770076505872_3fqphw10q', 'eventos', 'Por el momento no tenemos eventos futuros registrados. Te invito a estar pendiente de nuestras redes sociales y la sección de noticias.', '164.163.48.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-03 04:55:21', '2026-02-03 04:55:21'),
(100, 'chat_1770076505872_3fqphw10q', 'docentes', 'Planta docente actual:\n- FAUSTO FABIAN SUAREZ QUITO (Magister. Seguridad Informatica)\n- PAUL CASTILLO (Magister)\n- EDWIN VICENTE JARA FRÍAS (Magister)\n- PAUL TAISHA (Ingeniero)\n- CRISTIAN ERAZO (Ingeniero)\n- MARCO TIGRE (Magister)\n- DEIVIDSON VELASCO (Licenciado)\n- MAYRA GUTIÉRREZ (Magister)\n- LUIS GUARTASACA (Ingeniero)\n- RONNAL ORT{IZ (Ingeniero)\n', '164.163.48.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-03 04:55:34', '2026-02-03 04:55:34'),
(101, 'chat_1770076505872_3fqphw10q', 'carreras', 'Carreras tecnológicas disponibles:\n- Desarrollo de Software\n- Agroecología\n- Contabilidad y Asesoría Tributaria\n- Educación Inicial\n- PRUEBA\n', '164.163.48.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-03 04:55:48', '2026-02-03 04:55:48'),
(102, 'chat_1770076505872_3fqphw10q', 'formulario de matricula', 'Nosotros publicamos en redes sociales las fechas calendarizadas para el proceso', '164.163.48.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-03 05:27:05', '2026-02-03 05:27:05'),
(103, 'chat_1770080743344_xsicrww8o', 'cuales son las carreras que ofertan en el instituto', 'Carreras tecnológicas disponibles:\n- Desarrollo de Software\n- Agroecología\n- Contabilidad y Asesoría Tributaria\n- Educación Inicial\n- PRUEBA\n', '164.163.48.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-03 06:59:41', '2026-02-03 06:59:41'),
(104, 'chat_1770153757093_6qy21n6rd', 'Para reingreso que documento se necesita', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '45.188.235.38', 'Mozilla/5.0 (Linux; Android 13; RMO-NX3 Build/HONORRMO-N23; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/144.0.7559.94 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/545.0.0.43.63;IABMV/1;]', 'neutral', 1, '2026-02-04 02:25:26', '2026-02-04 02:25:26'),
(105, 'chat_1770153757093_6qy21n6rd', 'Listo', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '45.188.235.38', 'Mozilla/5.0 (Linux; Android 13; RMO-NX3 Build/HONORRMO-N23; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/144.0.7559.94 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/545.0.0.43.63;IABMV/1;]', 'neutral', 1, '2026-02-04 02:25:38', '2026-02-04 02:25:38'),
(106, 'chat_1770422563517_pz456ockj', 'autoridades', 'Autoridades actuales:\n- Fausto Fabian Suarez (Rector)\n- Luis Guartasaca (Vocal del OCS)\n- Mayra Gutiérrez (Vocal del OCS)\n- Favian Cumbanama (Presidente Del Consejo Estudiantil)\n- nuevo (el nuevo)\n- dfsfsd (sdf)\n', '164.163.48.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-07 05:03:04', '2026-02-07 05:03:04'),
(107, 'chat_1770422563517_pz456ockj', 'docentes', 'Planta docente actual:\n- FAUSTO FABIAN SUAREZ QUITO (Magister. Seguridad Informatica)\n- PAUL CASTILLO (Magister)\n- EDWIN VICENTE JARA FRÍAS (Magister)\n- PAUL TAISHA (Ingeniero)\n- CRISTIAN ERAZO (Ingeniero)\n- MARCO TIGRE (Magister)\n- DEIVIDSON VELASCO (Licenciado)\n- MAYRA GUTIÉRREZ (Magister)\n- LUIS GUARTASACA (Ingeniero)\n- RONNAL ORTIZ (Ingeniero)\n- DIANA GUARTASACA (Magister)\n- SILVIA AUCAY (Economista)\n- EDIDH JARA (Magister)\n- JUAN CARLOS RIVADENEIRA (Magister)\n- JESSICA REYES (Magister)\n- ANITA CAGUANA (Magister)\n- DIEGO AUCAY (Magister)\n- FERNANDO CHALA (Magister)\n', '164.163.48.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-07 05:03:13', '2026-02-07 05:03:13'),
(108, 'chat_1770640596295_2dtbs9f5f', 'CONSULTA AQUÍ', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '164.163.48.30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 1, '2026-02-09 17:36:58', '2026-02-09 17:36:58'),
(109, 'chat_1770640596295_2dtbs9f5f', 'formulario de matricula', 'Nosotros publicamos en redes sociales las fechas calendarizadas para el proceso', '164.163.48.30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-09 17:37:06', '2026-02-09 17:37:06'),
(110, 'chat_1770640596295_2dtbs9f5f', 'carreras que ofertan', 'Carreras tecnológicas disponibles:\n- Desarrollo de Software\n- Agroecología\n- Contabilidad y Asesoría Tributaria\n- Educación Inicial\n- PRUEBA\n- robotica\n', '164.163.48.30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-09 17:37:21', '2026-02-09 17:37:21'),
(111, 'chat_1770665082226_ytspagcsv', 'CUALES SON LAS CARRERAS', 'Carreras tecnológicas disponibles:\n- Desarrollo de Software\n- Agroecología\n- Contabilidad y Asesoría Tributaria\n- Educación Inicial\n', '181.113.59.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-10 00:27:24', '2026-02-10 00:27:24'),
(112, 'chat_1770665082226_ytspagcsv', 'MATTRICULAS', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.113.59.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 1, '2026-02-10 00:27:52', '2026-02-10 00:27:52'),
(113, 'chat_1770665262871_yitn4z0ge', 'hola', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.211.10.246', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:147.0) Gecko/20100101 Firefox/147.0', 'neutral', 1, '2026-02-10 00:28:15', '2026-02-10 00:28:15'),
(114, 'chat_1770665082226_ytspagcsv', 'docentes', 'Planta docente actual:\n- FAUSTO FABIAN SUAREZ QUITO (Magister. Seguridad Informatica)\n- PAUL CASTILLO (Magister)\n- EDWIN VICENTE JARA FRÍAS (Magister)\n- PAUL TAISHA (Ingeniero)\n- CRISTIAN ERAZO (Ingeniero)\n- MARCO TIGRE (Magister)\n- DEIVIDSON VELASCO (Licenciado)\n- MAYRA GUTIÉRREZ (Magister)\n- LUIS GUARTASACA (Ingeniero)\n- RONNAL ORTIZ (Ingeniero)\n- DIANA GUARTASACA (Magister)\n- SILVIA AUCAY (Economista)\n- EDIDH JARA (Magister)\n- JUAN CARLOS RIVADENEIRA (Magister)\n- JESSICA REYES (Magister)\n- ANITA CAGUANA (Magister)\n- DIEGO AUCAY (Magister)\n- FERNANDO CHALA (Magister)\n', '181.113.59.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-10 00:28:18', '2026-02-10 00:28:18'),
(115, 'chat_1770665262871_yitn4z0ge', 'q careras', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.211.10.246', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:147.0) Gecko/20100101 Firefox/147.0', 'neutral', 1, '2026-02-10 00:28:32', '2026-02-10 00:28:32'),
(116, 'chat_1770665771403_28tjkpbvq', 'HOLA', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.113.59.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 1, '2026-02-10 00:41:57', '2026-02-10 00:41:57'),
(117, 'chat_1770665771403_28tjkpbvq', 'carera', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '181.113.59.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 1, '2026-02-10 00:42:18', '2026-02-10 00:42:18'),
(118, 'chat_1770666297798_m7nzzt66v', 'carera', '1.- Desarrollo de software 2.- Agroecologia. 3.- contabilidad y Asesoria Tributaria 4.- Educacion..', '181.113.59.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'neutral', 0, '2026-02-10 00:45:21', '2026-02-10 00:45:21'),
(119, 'chat_1771535382543_en8u88zcp', 'Quiero ingresar a instituto', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '45.225.47.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.3 Mobile/15E148 Safari/604.1', 'neutral', 1, '2026-02-20 02:12:41', '2026-02-20 02:12:41'),
(120, 'chat_1771535382543_en8u88zcp', 'Quiero la carrera de educación inicial', 'Carreras tecnológicas disponibles:\n- Desarrollo de Software\n- Agroecología\n- Contabilidad y Asesoría Tributaria\n- Educación Inicial\n', '45.225.47.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.3 Mobile/15E148 Safari/604.1', 'neutral', 0, '2026-02-20 02:13:10', '2026-02-20 02:13:10'),
(121, 'chat_1771535382543_en8u88zcp', 'Educación inicial', 'Educaci&oacute;n Inicial es una carrera DUAL: 8 semanas de clases presenciales y 8 semanas de Practicas preprofesionales en sitio', '45.225.47.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.3 Mobile/15E148 Safari/604.1', 'neutral', 0, '2026-02-20 02:13:24', '2026-02-20 02:13:24'),
(122, 'chat_1771535382543_en8u88zcp', 'Me interesa', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '45.225.47.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.3 Mobile/15E148 Safari/604.1', 'neutral', 1, '2026-02-20 02:13:53', '2026-02-20 02:13:53'),
(123, 'chat_1771535382543_en8u88zcp', 'Cuando empiezan las postulaciones', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '45.225.47.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.3 Mobile/15E148 Safari/604.1', 'neutral', 1, '2026-02-20 02:14:13', '2026-02-20 02:14:13'),
(124, 'chat_1772384034242_tu9mi1q41', 'Cuando empieza la postulacion', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '157.100.53.227', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', 'neutral', 1, '2026-03-01 21:57:01', '2026-03-01 21:57:01'),
(125, 'chat_1773113557464_ahf28lr2g', 'Cuando comienza las postulaciones?', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '186.43.179.77', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', 'neutral', 1, '2026-03-10 08:35:06', '2026-03-10 08:35:06'),
(126, 'chat_1773113557464_ahf28lr2g', 'En que fecha es el ingreso?', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '186.43.179.77', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', 'neutral', 1, '2026-03-10 08:35:33', '2026-03-10 08:35:33'),
(127, 'chat_1773457782024_luzl7d8zg', 'Quiero más información sobre las carreras que dan', 'Carreras tecnológicas disponibles:\n- Desarrollo de Software\n- Agroecología\n- Contabilidad y Asesoría Tributaria\n- Educación Inicial\n', '177.234.240.34', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', 'neutral', 0, '2026-03-14 08:14:45', '2026-03-14 08:14:45'),
(128, 'chat_1773457782024_luzl7d8zg', 'Alguna que se relacione con tecnólogo o técnico en minas ?', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '177.234.240.34', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', 'neutral', 1, '2026-03-14 08:15:11', '2026-03-14 08:15:11'),
(129, 'chat_1773457782024_luzl7d8zg', 'Algo relacionado en minas', 'Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.', '177.234.240.34', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', 'neutral', 1, '2026-03-14 08:15:26', '2026-03-14 08:15:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_external` tinyint(1) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'published',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contents`
--

INSERT INTO `contents` (`id`, `parent_id`, `title`, `slug`, `url`, `is_external`, `description`, `content`, `category`, `status`, `created_by`, `image_url`, `file_url`, `views`, `featured`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Autoridades', 'autoridades', NULL, 0, '', '<p>conozca nuestras autoridades</p>\r\n<p> </p>', 'about', 'published', 1, 'uploads/images/6983b3806c613-RECTOR.jpg', 'https://drive.google.com/drive/folders/1MNsYBaQO5GtiiAXOChfHkJQVzlFhC0FF', 0, 0, NULL, NULL),
(2, NULL, 'Planta Docente', 'planta-docente', NULL, 0, NULL, '<p>Conozca a los docentes de Nuestra Institucion</p>', 'about', 'published', 1, NULL, NULL, 0, 0, NULL, NULL),
(4, NULL, 'Misión Y Visión', 'mision-y-vision', NULL, 0, NULL, '<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-cdc68b0 wp-dark-mode-transparent\" data-block-id=\"cdc68b0\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Misi&oacute;n</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-bddcf7c wp-dark-mode-transparent\" data-block-id=\"bddcf7c\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\" style=\"text-align: justify;\">Formar profesionales de calidad y excelencia, competentes con pensamiento cr&iacute;tico, compromiso &eacute;tico, valores y principios, garantizando el uso racional de los recursos naturales, que les permita insertarse al mundo laboral y social, por lo que la labor diaria, es la formaci&oacute;n integral de ciudadanos, fortaleciendo la investigaci&oacute;n, desarrollo e innovaci&oacute;n, la vinculaci&oacute;n con la sociedad y la cultura ecol&oacute;gica, promoviendo la mejora continua.</p>\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\" style=\"text-align: justify;\"><strong><span class=\"wp-dark-mode-transparent\">Visi&oacute;n</span></strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-f1d8971 wp-dark-mode-transparent\" data-block-id=\"f1d8971\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\" style=\"text-align: justify;\">Ser una Instituci&oacute;n de Educaci&oacute;n Superior modelo y l&iacute;der en la Provincia, generando conocimiento innovador en base a la investigaci&oacute;n cient&iacute;fica y aplicada, desarrollando la capacidad para ser productivos, con docentes comprometidos y de excelencia, con perfiles profesionales acorde a las carreras que oferta, contando con implementaci&oacute;n tecnol&oacute;gica adecuada para garantizar la formaci&oacute;n de profesionales proactivos comprometidos para construir una sociedad equitativa libre de violencia y en equilibrio con el medio ambiente.</p>\r\n</div>', 'about', 'published', 1, 'uploads/images/69c5e0379b424-MISIONYVISION.png', NULL, 155, 0, NULL, NULL),
(6, NULL, 'Formulario de Matricula', 'formulario-de-matricula', NULL, 0, '', '', 'tramites', 'published', NULL, NULL, '/uploads/pdfs/693f18be7d09f-Formulario_Matricula_2025-II.pdf', 0, 0, NULL, NULL),
(7, NULL, 'Reglamentos', 'reglamentos', NULL, 0, '', '<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-28a3fb8 wp-dark-mode-transparent\" data-block-id=\"28a3fb8\"> </div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-75593d1 wp-dark-mode-transparent\" data-block-id=\"75593d1\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\" style=\"text-align: justify;\">Conjunto de normas y directrices que regulan el comportamiento y las actividades de sus miembros. Estos reglamentos establecen derechos, deberes y procedimientos, con el fin de mantener un ambiente de trabajo o estudio ordenado, seguro y equitativo. Sirven para garantizar el cumplimiento de los objetivos institucionales, promover la convivencia y asegurar que las políticas de la institución se apliquen de manera uniforme y justa para todos los involucrados.</p>\r\n</div>', 'transparency', 'published', NULL, '/uploads/images/contents/69cc4fd158855-REGLAMENTOS.jpeg', NULL, 0, 0, NULL, NULL),
(16, NULL, 'Rendición de Cuentas', 'rendicion-de-cuentas', NULL, 0, '', '<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-0630ff3 wp-dark-mode-transparent\" data-block-id=\"0630ff3\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle wp-dark-mode-transparent\" style=\"text-align: center;\"><strong class=\"wp-dark-mode-transparent\">Rendición de cuentas 2025</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-b23de2c wp-dark-mode-transparent\" data-block-id=\"b23de2c\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\" style=\"text-align: justify;\">La rendición de cuentas es el proceso mediante el cual una persona o entidad tiene la obligación de informar, justificar y asumir la responsabilidad por sus acciones, decisiones y resultados ante un público o autoridad específica. En el contexto institucional, la rendición de cuentas implica transparencia y responsabilidad en el manejo de recursos, cumplimiento de objetivos y en la toma de decisiones, garantizando que las operaciones se realicen de acuerdo con las normas y expectativas establecidas.</p>\r\n</div>', 'transparency', 'published', NULL, '/uploads/images/contents/69cc52e75bf22-rendiciondecuentas.jpg', NULL, 0, 0, NULL, NULL),
(17, 16, 'Informes de Rendición de Cuentas 2024', 'informes-de-rendicion-de-cuentas-2024', NULL, 0, '', '', 'transparency', 'published', NULL, NULL, '/uploads/pdfs/697ad24925dbe-LOES.pdf', 0, 0, NULL, NULL),
(22, NULL, 'Historia Sobre el ISTS', 'historia-sobre-el-ists', NULL, 0, NULL, '<ul>\r\n<li style=\"list-style-type: none;\">\r\n<ul>\r\n<li>\r\n<p style=\"text-align: justify;\" data-path-to-node=\"1,0,0\"><strong data-path-to-node=\"1,0,0\" data-index-in-node=\"0\">Fundaci&oacute;n y Primeros Pasos (1997):</strong> Nace por iniciativa de las autoridades del Colegio Nacional T&eacute;cnico \"Suc&uacute;a\". El 2 de abril de 1997 se gestion&oacute; su creaci&oacute;n y finalmente el 6 de octubre de 1997mediante Acuerdo Nro.4789&nbsp; el Ministerio de Educaci&oacute;n y Cultura crea el Instituto con las especialiades de: Contabilidad de Costos y Programacion de Sistemas.</p>\r\n</li>\r\n<li style=\"text-align: justify;\">\r\n<p data-path-to-node=\"1,2,0\"><strong data-path-to-node=\"1,2,0\" data-index-in-node=\"0\">Adecuaci&oacute;n a la LOES (2010):</strong> Con la nueva Ley Org&aacute;nica de Educaci&oacute;n Superior, el ISTS inici&oacute; un proceso de acreditaci&oacute;n y mejora de la calidad educativa, profesionalizando su planta docente y actualizando sus planes de estudio.</p>\r\n</li>\r\n<li style=\"text-align: justify;\">\r\n<p data-path-to-node=\"1,3,0\"><strong data-path-to-node=\"1,3,0\" data-index-in-node=\"0\">Diversificaci&oacute;n Acad&eacute;mica:</strong> A lo largo de los a&ntilde;os, expandi&oacute; su oferta m&aacute;s all&aacute; de la inform&aacute;tica, incluyendo carreras vitales para la regi&oacute;n como <strong data-path-to-node=\"1,3,0\" data-index-in-node=\"146\">Agroecolog&iacute;a</strong>, <strong data-path-to-node=\"1,3,0\" data-index-in-node=\"160\">Educaci&oacute;n Inicial</strong> y <strong data-path-to-node=\"1,3,0\" data-index-in-node=\"180\">Contabilidad</strong>.</p>\r\n</li>\r\n<li style=\"text-align: justify;\">\r\n<p data-path-to-node=\"1,5,0\"><strong data-path-to-node=\"1,5,0\" data-index-in-node=\"0\">Transformaci&oacute;n Digital (2023-2024):</strong> Consolid&oacute; su oferta en <strong data-path-to-node=\"1,5,0\" data-index-in-node=\"59\">Desarrollo de Software</strong> y fortaleci&oacute; su infraestructura tecnol&oacute;gica, adapt&aacute;ndose a las exigencias de la educaci&oacute;n moderna y la investigaci&oacute;n.</p>\r\n</li>\r\n<li>\r\n<p style=\"text-align: justify;\" data-path-to-node=\"1,6,0\"><strong data-path-to-node=\"1,6,0\" data-index-in-node=\"0\">Actualidad (2026):</strong> Se mantiene como el referente de educaci&oacute;n superior p&uacute;blica en el cant&oacute;n Suc&uacute;a y la provincia de Morona Santiago, enfocado en la vinculaci&oacute;n con la sociedad y el desarrollo sostenible de la Amazon&iacute;a.</p>\r\n</li>\r\n</ul>\r\n</li>\r\n</ul>', 'about', 'published', 1, 'uploads/images/69c5e0f3ac812-logo1.png', NULL, 182, 0, NULL, NULL),
(26, NULL, 'Vinculación con la Sociedad', 'vinculacion-con-la-sociedad', NULL, 0, '', '<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-6f3063e wp-dark-mode-transparent\" data-block-id=\"6f3063e\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\" style=\"text-align: center;\"><strong class=\"wp-dark-mode-transparent\">Vinculación con la Sociedad</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-30fa71b wp-dark-mode-transparent\" data-block-id=\"30fa71b\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\" style=\"text-align: justify;\">La vinculación con la sociedad es el proceso mediante el cual una institución, especialmente educativa, interactúa y colabora con la comunidad externa, con el fin de aplicar conocimientos y recursos para contribuir al desarrollo social, económico y cultural, fortaleciendo la relación entre la institución y la comunidad.</p>\r\n</div>', 'transparency', 'published', NULL, '/uploads/images/contents/697ac6828af7b-vinculacion.jpeg', NULL, 0, 0, NULL, NULL),
(27, NULL, 'Organigrama', 'organigrama', NULL, 0, NULL, NULL, 'about', 'published', 1, 'uploads/images/69c5e36815226-ORGANICOFUNCIONALISTS.jpg', NULL, 153, 0, NULL, NULL),
(28, NULL, 'Ficha Socioeconomica', 'ficha-socioeconomica', NULL, 0, '', '', 'tramites', 'published', NULL, NULL, '/uploads/pdfs/697b7be47a6e7-Ficha_Socioeconomica_2025-II.pdf', 0, 0, NULL, NULL),
(36, 7, 'ESTATUTO', 'estatuto', NULL, 0, '', '', 'transparency', 'published', NULL, NULL, '/uploads/pdfs/697aa61e3cef7-1_REGLAMENTO-DE-HIGIENE-Y-SEGURIDAD_ISTS.pdf', 0, 0, NULL, NULL),
(63, NULL, 'Formulario de Homologación y Reingreso', 'formulario-de-homologacion-y-reingreso', 'https://docs.google.com/document/d/1pGvyVFVl1MtCg7tdIah_xLJiUCR3th9c/edit?usp=sharing&ouid=109463034568053938725&rtpof=true&sd=true', 0, NULL, NULL, 'tramites', 'published', NULL, NULL, NULL, 0, 0, NULL, NULL),
(75, NULL, 'LOTAIP', 'lotaip', NULL, 0, '', '<h3 data-section-id=\"1s0mfh6\" data-start=\"22\" data-end=\"66\"><span class=\"hover:entity-accent entity-underline inline cursor-pointer align-baseline\"><span class=\"whitespace-normal\">Ley Orgánica de Transparencia y Acceso a la Información Pública</span></span></h3>\r\n<p style=\"text-align: justify;\" data-start=\"68\" data-end=\"238\">Es una normativa ecuatoriana que garantiza el <strong data-start=\"114\" data-end=\"182\">derecho de todas las personas a acceder a la información pública</strong> que generan o administran las instituciones del Estado.</p>', 'transparency', 'published', NULL, '/uploads/images/contents/69cc4ce5014d5-LOTAIP.jpg', NULL, 0, 0, NULL, NULL),
(76, 75, '2024', '2024', NULL, 0, NULL, NULL, 'transparency', 'published', NULL, NULL, NULL, 0, 0, NULL, NULL),
(77, 75, '2025', '2025', NULL, 0, NULL, NULL, 'transparency', 'published', NULL, NULL, NULL, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_images`
--

CREATE TABLE `content_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `place` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` enum('published','draft') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `category`, `description`, `date`, `place`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Feria Académica ISTS 2025 II', 'Feria Estudiantil', '<h2 style=\"text-align: center;\" data-path-to-node=\"2\">&iexcl;Te invitamos a la Feria Acad&eacute;mica ISTS 2025 - II!&nbsp;</h2>\r\n<p style=\"text-align: justify;\" data-path-to-node=\"3\">El <strong>Instituto Superior Tecnol&oacute;gico Suc&uacute;a (ISTS)</strong> te abre las puertas a la innovaci&oacute;n, el conocimiento y el futuro. Ven y descubre las oportunidades que te ofrecen nuestras cuatro carreras de vanguardia.</p>\r\n<p data-path-to-node=\"4\">Acomp&aacute;&ntilde;anos este <strong>jueves 18 de diciembre de 2025</strong> y explora c&oacute;mo el ISTS est&aacute; formando a los profesionales que liderar&aacute;n el desarrollo de la Amazon&iacute;a.</p>\r\n<h3 data-path-to-node=\"6\">Desarrollo de Software: La Era Digital en tus Manos</h3>\r\n<p style=\"text-align: justify;\" data-path-to-node=\"7,0,0\">Sum&eacute;rgete en el mundo de la tecnolog&iacute;a. Conoce c&oacute;mo nuestros estudiantes y futuros profesionales est&aacute;n creando soluciones digitales (como la nueva plataforma web y el Chatbot del ISTS, &iexcl;el futuro ya est&aacute; aqu&iacute;!) y desarrollando sistemas y aplicaciones que simplifican la vida y transforman las empresas. Aprende a programar el futuro.</p>\r\n<ul data-path-to-node=\"7\">\r\n<li>\r\n<p data-path-to-node=\"7,1,0\"><strong>Enfoque:</strong> Innovaci&oacute;n, Programaci&oacute;n, Inteligencia Artificial y Transformaci&oacute;n Digital.</p>\r\n</li>\r\n</ul>\r\n<h3 data-path-to-node=\"8\">&nbsp;Agroecolog&iacute;a: Producci&oacute;n Sostenible y Respeto Ambiental</h3>\r\n<p style=\"text-align: justify;\" data-path-to-node=\"9,0,0\">Si te apasiona la naturaleza y la producci&oacute;n responsable, este es tu espacio. Descubre m&eacute;todos de cultivo amigables con el ambiente, que garantizan la seguridad alimentaria y fomentan el desarrollo rural sostenible. Es la carrera que une la ciencia de la tierra con el bienestar social y econ&oacute;mico de la regi&oacute;n.</p>\r\n<ul data-path-to-node=\"9\">\r\n<li>\r\n<p data-path-to-node=\"9,1,0\"><strong>Enfoque:</strong> Sostenibilidad, T&eacute;cnicas de Cultivo Org&aacute;nico, Conservaci&oacute;n y Producci&oacute;n Responsable.</p>\r\n</li>\r\n</ul>\r\n<h3 data-path-to-node=\"10\">&nbsp;Educaci&oacute;n Inicial: Forjando el Ma&ntilde;ana desde Hoy</h3>\r\n<p style=\"text-align: justify;\" data-path-to-node=\"11,0,0\">Ven y mira el impacto de la educaci&oacute;n en los primeros a&ntilde;os de vida. Descubre estrategias pedag&oacute;gicas l&uacute;dicas e innovadoras dise&ntilde;adas por nuestros estudiantes para estimular el desarrollo cognitivo, social y emocional de los ni&ntilde;os. Formamos a los profesionales que siembran el conocimiento en el futuro de nuestra sociedad.</p>\r\n<ul data-path-to-node=\"11\">\r\n<li>\r\n<p data-path-to-node=\"11,1,0\"><strong>Enfoque:</strong> Desarrollo Infantil Integral, Metodolog&iacute;as L&uacute;dicas y Psicopedagog&iacute;a.</p>\r\n</li>\r\n</ul>\r\n<h3 data-path-to-node=\"12\">&nbsp;Contabilidad y Asesor&iacute;a Tributaria: Finanzas Inteligentes</h3>\r\n<p style=\"text-align: justify;\" data-path-to-node=\"13,0,0\">Conoce las herramientas esenciales para gestionar las finanzas de cualquier organizaci&oacute;n, desde la peque&ntilde;a empresa hasta grandes instituciones. Nuestros futuros tecn&oacute;logos te mostrar&aacute;n c&oacute;mo llevar una contabilidad transparente, dominar las normativas tributarias vigentes y ofrecer asesor&iacute;a experta para la toma de decisiones econ&oacute;micas.</p>\r\n<ul data-path-to-node=\"13\">\r\n<li>\r\n<p data-path-to-node=\"13,1,0\"><strong>Enfoque:</strong> Gesti&oacute;n Financiera, Legislaci&oacute;n Tributaria, Auditor&iacute;a y Transparencia Contable.</p>\r\n</li>\r\n</ul>\r\n<p data-path-to-node=\"15\"><strong>&iexcl;Te esperamos para descubrir tu camino profesional!</strong></p>\r\n<ul data-path-to-node=\"16\">\r\n<li>\r\n<p data-path-to-node=\"16,0,0\"><strong>D&iacute;a:</strong> Jueves, 18 de diciembre de 2025</p>\r\n</li>\r\n<li>\r\n<p data-path-to-node=\"16,1,0\"><strong>Hora:</strong> A partir de las 8:00 AM</p>\r\n</li>\r\n<li>\r\n<p data-path-to-node=\"16,2,0\"><strong>Lugar:</strong> Espacio Cubierto de la Institucion</p>\r\n</li>\r\n</ul>', '2025-12-18', 'Instalaciones del Ists', NULL, 'published', '2025-12-14 06:38:41', '2025-12-31 09:11:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_files`
--

CREATE TABLE `event_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_images`
--

CREATE TABLE `event_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `event_images`
--

INSERT INTO `event_images` (`id`, `event_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'events/images/oeduhyq1GkvXK2ecTZRrNKTyS2zEs1Onivszp20X.jpg', '2025-12-14 06:38:41', '2025-12-14 06:38:41'),
(2, 1, 'events/images/8AGu44T5uQxPE6O35DvNI02pzFH4f8Yc1QK6jw8L.jpg', '2025-12-14 06:38:41', '2025-12-14 06:38:41'),
(3, 1, 'events/images/d4C8cWsv88BULYrIcQpi51c9OtdhUjcZ2gWjEIOh.jpg', '2025-12-14 06:38:41', '2025-12-14 06:38:41'),
(4, 1, 'events/images/AlvJantWEJMrOdQKmP5belS5afCWZZz4QvsyZHJK.jpg', '2025-12-14 06:38:41', '2025-12-14 06:38:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_links`
--

CREATE TABLE `event_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hero_slides`
--

CREATE TABLE `hero_slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hero_slides`
--

INSERT INTO `hero_slides` (`id`, `title`, `subtitle`, `image_path`, `link`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(7, 'Bienvenidos al ISTSUCUA', 'Fortaleciendo La Educación Superior En Morona Santiago', '5_1.jpg', NULL, 3, 1, '2025-12-11 17:52:15', '2026-03-25 06:35:00'),
(8, 'Bienvenido al ISTSUCUA', 'Fortaleciendo La Educación Superior En Morona Santiago', '8.jpg', NULL, 1, 1, '2026-01-20 02:54:36', '2026-03-25 06:36:49'),
(15, 'Bienvenidos al ISTS', 'Fortaleciendo La Educación Superior En Morona Santiago', '11.jpg', NULL, 0, 1, '2026-03-25 06:36:20', '2026-03-25 07:56:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `especialidad` varchar(255) DEFAULT NULL,
  `modalidad_id` bigint(20) UNSIGNED NOT NULL,
  `programa_id` bigint(20) UNSIGNED NOT NULL,
  `observaciones` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leadership_teams`
--

CREATE TABLE `leadership_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menu_items`
--

INSERT INTO `menu_items` (`id`, `title`, `url`, `parent_id`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'ACADEMICOS', '#', NULL, 1, 1, '2025-12-10 23:36:57', '2026-01-21 14:17:01'),
(2, 'CAMPUS', '/campus', NULL, 2, 1, '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(3, 'TRANSPARENCIA', '#', NULL, 3, 1, '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(4, 'VISITAR', '/visitar', NULL, 4, 1, '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(5, 'ACERCA', '/acerca', NULL, 5, 1, '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(6, 'NOTICIAS', '/noticias', NULL, 6, 1, '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(7, 'TRÁMITES', '#', NULL, 7, 1, '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(8, 'Instalaciones', '/campus/instalaciones', 2, 1, 1, '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(9, 'Servicios', '/campus/servicios', 2, 2, 1, '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(10, 'Visitar ISTS', '/visitar', 4, 1, 1, '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(11, 'Sobre el ISTS', '/acerca', 5, 1, 1, '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(12, 'Todas las Noticias', '/noticias', 6, 1, 1, '2025-12-10 23:36:57', '2025-12-10 23:36:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_11_07_000000_add_role_to_users_table', 1),
(6, '2025_11_09_000000_create_contents_table', 1),
(7, '2025_11_09_000001_create_menus_table', 1),
(8, '2025_11_10_051919_create_content_images_table', 1),
(9, '2025_11_11_042153_create_leadership_teams_table', 1),
(10, '2025_11_11_053546_create_teachers_table', 1),
(11, '2025_11_11_151441_create_settings_table', 1),
(12, '2025_11_12_000001_create_campus_items_table', 1),
(13, '2025_11_12_000002_add_content_to_campus_items', 1),
(14, '2025_11_12_000003_create_campus_item_images_table', 1),
(15, '2025_11_12_060020_create_q_a_s_table', 1),
(16, '2025_11_12_063124_create_chat_messages_table', 1),
(17, '2025_11_13_041958_create_hero_slides_table', 1),
(18, '2025_11_13_050000_create_careers_table', 1),
(19, '2025_11_13_153515_add_professional_profile_fields_to_careers_table', 1),
(20, '2025_11_13_160850_create_academic_sections_table', 1),
(21, '2025_11_13_200000_create_news_table', 1),
(22, '2025_11_15_013849_add_curriculum_pdf_to_careers_table', 1),
(23, '2025_11_15_201804_add_academic_section_type_to_contents', 1),
(24, '2025_11_15_214007_create_updates_table', 1),
(25, '2025_11_15_220053_add_video_path_to_updates_table', 1),
(26, '2025_11_17_152926_create_visit_sections_table', 1),
(27, '2025_11_18_000001_create_campus_item_contents_table', 1),
(28, '2025_11_18_120000_add_image_video_fields_to_campus_item_contents_table', 1),
(29, '2025_11_18_130000_create_campus_item_form_submissions_table', 1),
(30, '2025_11_20_000001_create_timeline_events_table', 1),
(31, '2025_11_20_000002_create_rectors_table', 1),
(32, '2025_11_20_000003_add_position_and_academic_title_to_rectors', 1),
(33, '2025_11_21_213854_add_file_url_to_contents_table', 1),
(34, '2025_11_21_223751_add_parent_id_to_contents_table', 1),
(35, '2025_11_24_100000_add_pdf_path_to_teachers_table', 1),
(36, '2025_11_24_110000_add_parent_id_to_contents_table', 1),
(37, '2025_11_24_120000_add_url_to_contents_table', 1),
(38, '2025_11_24_182520_add_image_path_to_news_table', 1),
(40, '2025_11_24_200000_add_academic_section_id_to_careers_table', 1),
(41, '2025_11_26_060055_create_menu_items_table', 1),
(42, '2025_11_27_000001_create_abouts_table', 1),
(43, '2025_11_27_225233_create_autoridades_table', 1),
(44, '2025_11_28_140253_add_slug_to_autoridades_table', 1),
(45, '2025_11_30_000001_create_academic_modalities_table', 1),
(46, '2025_11_30_000002_create_academic_programs_table', 1),
(47, '2025_11_30_000003_add_fields_to_academic_programs_table', 1),
(48, '2025_11_30_000010_create_inscripciones_table', 1),
(49, '2025_12_04_140000_alter_category_column_on_campus_items_table', 1),
(50, '2025_12_04_150000_add_details_to_campus_items_table', 1),
(51, '2025_12_12_000001_add_order_to_news_table', 2),
(52, '2025_11_24_183307_change_image_path_to_images_in_news_table', 3),
(53, '2025_12_13_000001_create_events_table', 4),
(54, '2025_12_13_000001_create_event_images_table', 5),
(55, '2025_12_13_000002_create_event_files_table', 5),
(56, '2025_12_13_000003_create_event_links_table', 5),
(57, '2025_12_13_000004_add_category_to_events_table', 5),
(58, '2025_12_14_000001_add_unanswered_to_chat_messages_table', 6),
(59, '2025_12_14_000000_create_chatbot_settings_table', 7),
(60, '2025_12_14_000001_add_welcome_message_to_chatbot_settings', 8),
(61, '2025_12_15_000000_create_academic_calendar_events_table', 9),
(62, '2025_12_15_000001_add_status_to_users_table', 10),
(63, '2025_12_16_000000_create_social_links_table', 11),
(64, '2025_12_16_100000_add_active_icon_to_social_links', 12),
(65, '2025_12_18_000001_add_banner_to_events_table', 13),
(66, '2025_12_19_000001_create_popups_table', 14),
(67, '2025_12_19_000002_remove_banner_from_events_table', 15),
(68, '2025_12_20_230118_create_chatbot_contacts_table', 16),
(69, '2025_12_22_000001_add_carrera_and_unique_telefono_to_chatbot_contacts', 17),
(70, '2025_12_24_agg_fechas_popups', 18),
(71, '2025_12_28_000001_create_site_stats_table', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `views` int(11) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 99,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `summary`, `content`, `author`, `author_id`, `category`, `status`, `views`, `featured`, `order`, `published_at`, `created_at`, `updated_at`, `images`) VALUES
(3, '✨ 𝐄𝐥 𝐈𝐧𝐬𝐭𝐢𝐭𝐮𝐭𝐨 𝐒𝐮𝐩𝐞𝐫𝐢𝐨𝐫 𝐓𝐞𝐜𝐧𝐨𝐥𝐨́𝐠𝐢𝐜𝐨 𝐒𝐮𝐜𝐮́𝐚 𝐥𝐞𝐬 𝐝𝐞𝐬𝐞𝐚 𝐮𝐧𝐚 𝐅𝐞𝐥𝐢𝐳 𝐍𝐚𝐯𝐢𝐝𝐚𝐝 ✨🎄', '-69c3447462977', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">𝚀𝚞𝚎 𝚎𝚜𝚝𝚊 𝙽𝚊𝚟𝚒𝚍𝚊𝚍 𝚜𝚎𝚊 𝚞𝚗 𝚝𝚒𝚎𝚖𝚙𝚘 𝚍𝚎 𝚙𝚊𝚣, 𝚎𝚜𝚙𝚎𝚛𝚊𝚗𝚣𝚊 𝚢 𝚞𝚗𝚒𝚘́𝚗 𝚏𝚊𝚖𝚒𝚕𝚒𝚊𝚛. 𝚀𝚞𝚎 𝚎𝚕 𝚎𝚜𝚙𝚒́𝚛𝚒𝚝𝚞 𝚗𝚊𝚟𝚒𝚍𝚎𝚗̃𝚘 𝚒𝚕𝚞𝚖𝚒𝚗𝚎 𝚌𝚊𝚍𝚊 𝚑𝚘𝚐𝚊𝚛, 𝚏𝚘𝚛𝚝𝚊𝚕𝚎𝚌𝚒𝚎𝚗𝚍𝚘 𝚕𝚘𝚜 𝚟𝚊𝚕𝚘𝚛𝚎𝚜 𝚍𝚎 𝚜𝚘𝚕𝚒𝚍𝚊𝚛𝚒𝚍𝚊𝚍, 𝚊𝚖𝚘𝚛 𝚢 𝚐𝚛𝚊𝚝𝚒𝚝𝚞𝚍.</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\">&nbsp;</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\">&nbsp;</div>\r\n</div>', '<div dir=\"auto\">\r\n<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">𝚀𝚞𝚎 𝚎𝚜𝚝𝚊 𝙽𝚊𝚟𝚒𝚍𝚊𝚍 𝚜𝚎𝚊 𝚞𝚗 𝚝𝚒𝚎𝚖𝚙𝚘 𝚍𝚎 𝚙𝚊𝚣, 𝚎𝚜𝚙𝚎𝚛𝚊𝚗𝚣𝚊 𝚢 𝚞𝚗𝚒𝚘́𝚗 𝚏𝚊𝚖𝚒𝚕𝚒𝚊𝚛. 𝚀𝚞𝚎 𝚎𝚕 𝚎𝚜𝚙𝚒́𝚛𝚒𝚝𝚞 𝚗𝚊𝚟𝚒𝚍𝚎𝚗̃𝚘 𝚒𝚕𝚞𝚖𝚒𝚗𝚎 𝚌𝚊𝚍𝚊 𝚑𝚘𝚐𝚊𝚛, 𝚏𝚘𝚛𝚝𝚊𝚕𝚎𝚌𝚒𝚎𝚗𝚍𝚘 𝚕𝚘𝚜 𝚟𝚊𝚕𝚘𝚛𝚎𝚜 𝚍𝚎 𝚜𝚘𝚕𝚒𝚍𝚊𝚛𝚒𝚍𝚊𝚍, 𝚊𝚖𝚘𝚛 𝚢 𝚐𝚛𝚊𝚝𝚒𝚝𝚞𝚍.</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">𝙰𝚐𝚛𝚊𝚍𝚎𝚌𝚎𝚖𝚘𝚜 𝚊 𝚝𝚘𝚍𝚊 𝚗𝚞𝚎𝚜𝚝𝚛𝚊 𝚌𝚘𝚖𝚞𝚗𝚒𝚍𝚊𝚍 𝚎𝚍𝚞𝚌𝚊𝚝𝚒𝚟𝚊 𝚎𝚜𝚝𝚞𝚍𝚒𝚊𝚗𝚝𝚎𝚜, 𝚍𝚘𝚌𝚎𝚗𝚝𝚎𝚜, 𝚙𝚎𝚛𝚜𝚘𝚗𝚊𝚕 𝚊𝚍𝚖𝚒𝚗𝚒𝚜𝚝𝚛𝚊𝚝𝚒𝚟𝚘 𝚢 𝚌𝚒𝚞𝚍𝚊𝚍𝚊𝚗𝚒́𝚊 𝚎𝚗 𝚐𝚎𝚗𝚎𝚛𝚊𝚕 𝚙𝚘𝚛 𝚜𝚎𝚛 𝚙𝚊𝚛𝚝𝚎 𝚏𝚞𝚗𝚍𝚊𝚖𝚎𝚗𝚝𝚊𝚕 𝚍𝚎 𝚗𝚞𝚎𝚜𝚝𝚛𝚊 𝚒𝚗𝚜𝚝𝚒𝚝𝚞𝚌𝚒𝚘́𝚗 𝚢 𝚙𝚘𝚛 𝚌𝚊𝚖𝚒𝚗𝚊𝚛 𝚓𝚞𝚗𝚝𝚘𝚜 𝚎𝚗 𝚕𝚊 𝚌𝚘𝚗𝚜𝚝𝚛𝚞𝚌𝚌𝚒𝚘́𝚗 𝚍𝚎 𝚞𝚗 𝚖𝚎𝚓𝚘𝚛 𝚏𝚞𝚝𝚞𝚛𝚘.</div>\r\n</div>\r\n</div>\r\n<div dir=\"auto\">&nbsp;</div>\r\n<div dir=\"auto\" style=\"text-align: center;\">𝑰𝒏𝒔𝒕𝒊𝒕𝒖𝒕𝒐 𝑺𝒖𝒑𝒆𝒓𝒊𝒐𝒓 𝑻𝒆𝒄𝒏𝒐𝒍𝒐́𝒈𝒊𝒄𝒐 𝑺𝒖𝒄𝒖́𝒂</div>\r\n<div dir=\"auto\" style=\"text-align: center;\">𝑪𝒐𝒏𝒔𝒕𝒓𝒖𝒚𝒆𝒏𝒅𝒐 𝒄𝒐𝒏𝒐𝒄𝒊𝒎𝒊𝒆𝒏𝒕𝒐 𝒚 𝒇𝒖𝒕𝒖𝒓𝒐 <span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1/16/1f31f.png\" alt=\"🌟\" width=\"16\" height=\"16\"></span></div>', NULL, NULL, NULL, 'published', 0, 0, 99, '2026-02-08 00:04:41', '2026-02-08 00:04:41', '2026-03-25 07:21:18', '[\"news\\/ydls2qWgYZmEScsC9JQfzZj0aC1JNXhfsR3cDuuM.jpg\"]'),
(5, '🚀 ¿𝐐𝐮𝐢𝐞𝐫𝐞𝐬 𝐚𝐬𝐞𝐠𝐮𝐫𝐚𝐫 𝐭𝐮 𝐦𝐞𝐣𝐨𝐫 𝐝𝐞𝐬𝐞𝐦𝐩𝐞𝐧̃𝐨 𝐞𝐧 𝐥𝐚 𝐞𝐯𝐚𝐥𝐮𝐚𝐜𝐢𝐨́𝐧 𝐝𝐞𝐥 𝐩𝐫𝐨𝐜𝐞𝐬𝐨 𝐝𝐞 𝐚𝐝𝐦𝐢𝐬𝐢𝐨́𝐧 𝟐𝟎𝟐𝟔❓', '-69c3463e95656', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t49/1/16/1f4da.png\" alt=\"📚\" width=\"16\" height=\"16\"></span> 𝐈𝐦𝐩𝐮𝐥𝐬𝐚𝐓 𝚎𝚜 𝚎𝚕 𝚌𝚞𝚛𝚜𝚘 𝚍𝚎 𝚙𝚛𝚎𝚙𝚊𝚛𝚊𝚌𝚒𝚘́𝚗 𝚍𝚒𝚛𝚒𝚐𝚒𝚍𝚘 𝚊 𝚊𝚜𝚙𝚒𝚛𝚊𝚗𝚝𝚎𝚜 𝚚𝚞𝚎 𝚍𝚎𝚜𝚎𝚊𝚗 𝚘𝚋𝚝𝚎𝚗𝚎𝚛 𝚞𝚗 𝚌𝚞𝚙𝚘 𝚎𝚗 𝚎𝚕 𝙸𝚗𝚜𝚝𝚒𝚝𝚞𝚝𝚘 𝚂𝚞𝚙𝚎𝚛𝚒𝚘𝚛 𝚃𝚎𝚌𝚗𝚘𝚕𝚘́𝚐𝚒𝚌𝚘 𝚂𝚞𝚌𝚞́𝚊.</div>\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8c/1/16/1f4bb.png\" alt=\"💻\" width=\"16\" height=\"16\"></span> 𝗠𝗼𝗱𝗮𝗹𝗶𝗱𝗮𝗱: 𝚅𝚒𝚛𝚝𝚞𝚊𝚕</div>\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5c/1/16/1f5d3.png\" alt=\"🗓️\" width=\"16\" height=\"16\"></span> 𝗖𝗹𝗮𝘀𝗲𝘀: 𝚍𝚎𝚕 𝟷𝟺 𝚍𝚎 𝚎𝚗𝚎𝚛𝚘 𝚊𝚕 𝟻 𝚍𝚎 𝚏𝚎𝚋𝚛𝚎𝚛𝚘 de 2026</div>\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te2/1/16/270d.png\" alt=\"✍️\" width=\"16\" height=\"16\"></span> 𝗜𝗻𝘀𝗰𝗿𝗶𝗽𝗰𝗶𝗼𝗻𝗲𝘀: 𝚍𝚎𝚕 𝟾 𝚊𝚕 𝟷𝟼 𝚍𝚎 𝚎𝚗𝚎𝚛𝚘</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"text-align: justify;\">\r\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tac/1/16/1f4cc.png\" alt=\"📌\" width=\"16\" height=\"16\"></span> 𝗖𝗼𝗻𝘁𝗲𝗻𝗶𝗱𝗼𝘀 𝗰𝗹𝗮𝘃𝗲:</div>\r\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" alt=\"✔️\" width=\"16\" height=\"16\"></span> 𝚁𝚊𝚣𝚘𝚗𝚊𝚖𝚒𝚎𝚗𝚝𝚘 𝚟𝚎𝚛𝚋𝚊𝚕</div>\r\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" alt=\"✔️\" width=\"16\" height=\"16\"></span> 𝚁𝚊𝚣𝚘𝚗𝚊𝚖𝚒𝚎𝚗𝚝𝚘 𝚊𝚋𝚜𝚝𝚛𝚊𝚌𝚝𝚘</div>\r\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" alt=\"✔️\" width=\"16\" height=\"16\"></span> 𝚁𝚊𝚣𝚘𝚗𝚊𝚖𝚒𝚎𝚗𝚝𝚘 𝚗𝚞𝚖𝚎́𝚛𝚒𝚌𝚘</div>\r\n</div>', '<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"text-align: justify;\">&nbsp;</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1/16/1f517.png\" alt=\"🔗\" width=\"16\" height=\"16\"></span> 𝗜𝗻𝘀𝗰𝗿𝗶́𝗯𝗲𝘁𝗲 𝗲𝗻:</div>\r\n<div dir=\"auto\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"http://siga.institutos.gob.ec:8080/siga-web/ariel.xhtml?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExclFWQUVTS2lVcFozMnRtaXNydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR5zxC-3zqCfQfoie-aj1jV1yF2J2xYT0UEZmrtYj00TimZix2BgLdlBikKZ5A_aem_pIMuYKvAcKwx7GLmESZmdg\" target=\"_blank\" rel=\"nofollow noopener noreferrer\">http://siga.institutos.gob.ec:8080/siga-web/ariel.xhtml</a></span></div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\">𝚂𝚎𝚕𝚎𝚌𝚌𝚒𝚘𝚗𝚊 𝚕𝚊 𝚘𝚙𝚌𝚒𝚘́𝚗 ❞𝗥𝗲𝗴𝗶́𝘀𝘁𝗿𝗮𝘁𝗲 𝗮 𝗜𝗺𝗽𝘂𝗹𝘀𝗮𝗧❞, 𝚎𝚕𝚒𝚐𝚎 𝚎𝚕 𝙸𝚗𝚜𝚝𝚒𝚝𝚞𝚝𝚘 𝚂𝚞𝚙𝚎𝚛𝚒𝚘𝚛 𝚃𝚎𝚌𝚗𝚘𝚕𝚘́𝚐𝚒𝚌𝚘 𝚂𝚞𝚌𝚞́𝚊 𝚢 𝚌𝚘𝚖𝚙𝚕𝚎𝚝𝚊 𝚝𝚞𝚜 𝚍𝚊𝚝𝚘𝚜.</div>\r\n<div dir=\"auto\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/%F0%9D%91%BB%F0%9D%92%93%F0%9D%92%82%F0%9D%92%8F%F0%9D%92%94%F0%9D%92%87%F0%9D%92%90%F0%9D%92%93%F0%9D%92%8E%F0%9D%92%82%F0%9D%92%8E%F0%9D%92%90%F0%9D%92%94%F0%9D%91%AC%F0%9D%92%8D%F0%9D%91%AD%F0%9D%92%96%F0%9D%92%95%F0%9D%92%96%F0%9D%92%93%F0%9D%92%90?__eep__=6&amp;__cft__[0]=AZZEwytngelXsIm2bnLaN9k9hM_BBTCA3gIqbDwR4mKnLsZBP6pYFQqnlpBqXVV32gfes-i-r8GSLmAW0-21WC3Hs_AO3O6ghO38wf016a8Ot_TVbzFwIgWC5l5NOOYu3H-aR5AX9SyyjF7BsLpfDWBmW4u-scyarc2y0xkBYubLnfnA1eThHuiM2eJXXmcpTo0YMIBMTUgiBfWe-Aiw51P9&amp;__tn__=*NK-R\">#𝑻𝒓𝒂𝒏𝒔𝒇𝒐𝒓𝒎𝒂𝒎𝒐𝒔𝑬𝒍𝑭𝒖𝒕𝒖𝒓𝒐</a></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/%F0%9D%91%B0%F0%9D%91%BA%F0%9D%91%BB%F0%9D%91%BA%F0%9D%92%96%F0%9D%92%84%F0%9D%92%96%CC%81%F0%9D%92%82?__eep__=6&amp;__cft__[0]=AZZEwytngelXsIm2bnLaN9k9hM_BBTCA3gIqbDwR4mKnLsZBP6pYFQqnlpBqXVV32gfes-i-r8GSLmAW0-21WC3Hs_AO3O6ghO38wf016a8Ot_TVbzFwIgWC5l5NOOYu3H-aR5AX9SyyjF7BsLpfDWBmW4u-scyarc2y0xkBYubLnfnA1eThHuiM2eJXXmcpTo0YMIBMTUgiBfWe-Aiw51P9&amp;__tn__=*NK-R\">#𝑰𝑺𝑻𝑺𝒖𝒄𝒖́𝒂</a></span></div>\r\n</div>', NULL, NULL, NULL, 'published', 0, 0, 99, '2026-03-25 07:19:42', '2026-03-25 07:19:42', '2026-03-25 07:25:33', '[\"news\\/BCxgIeSimQEArYc5YAGJ51hDkmCA1pCTqwbhIIOd.jpg\"]'),
(6, '🌱 𝐏𝐑𝐎𝐘𝐄𝐂𝐓𝐎 𝐃𝐄 𝐕𝐈𝐍𝐂𝐔𝐋𝐀𝐂𝐈𝐎́𝐍 𝐂𝐎𝐍 𝐋𝐀 𝐒𝐎𝐂𝐈𝐄𝐃𝐀𝐃 – 𝐈𝐒𝐓𝐒 𝐒𝐔𝐂𝐔́𝐀', '-69c347603e783', '<p style=\"text-align: justify;\">𝙴𝚕 𝙸𝚗𝚜𝚝𝚒𝚝𝚞𝚝𝚘 𝚂𝚞𝚙𝚎𝚛𝚒𝚘𝚛 𝚃𝚎𝚌𝚗𝚘𝚕𝚘́𝚐𝚒𝚌𝚘 𝚂𝚞𝚌𝚞́𝚊, 𝚎𝚗 𝚌𝚘𝚘𝚛𝚍𝚒𝚗𝚊𝚌𝚒𝚘́𝚗 𝚌𝚘𝚗 𝚎𝚕 𝙼𝙳𝙷 &ndash; 𝙳𝚒𝚜𝚝𝚛𝚒𝚝𝚘 𝙼𝚘𝚛𝚘𝚗𝚊, 𝚍𝚎𝚜𝚊𝚛𝚛𝚘𝚕𝚕𝚘́ 𝚎𝚕 𝚙𝚛𝚘𝚢𝚎𝚌𝚝𝚘 &ldquo;𝙲𝚛𝚎𝚌𝚒𝚎𝚗𝚍𝚘, 𝙲𝚞𝚒𝚍𝚊𝚗𝚍𝚘 𝚢 𝙲𝚛𝚎𝚊𝚗𝚍𝚘 𝙹𝚞𝚗𝚝𝚘𝚜&rdquo;, 𝚙𝚊𝚛𝚊 𝚏𝚘𝚛𝚝𝚊𝚕𝚎𝚌𝚎𝚛 𝚎𝚕 𝚍𝚎𝚜𝚊𝚛𝚛𝚘𝚕𝚕𝚘 𝚒𝚗𝚝𝚎𝚐𝚛𝚊𝚕 𝚒𝚗𝚏𝚊𝚗𝚝𝚒𝚕 𝚎𝚗 𝚕𝚘𝚜 𝙲𝙳𝙸 𝚢 𝙲𝙽𝙷 𝚍𝚎 𝙼𝚘𝚛𝚘𝚗𝚊 𝚂𝚊𝚗𝚝𝚒𝚊𝚐𝚘.</p>', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">𝙴𝚕 𝙸𝚗𝚜𝚝𝚒𝚝𝚞𝚝𝚘 𝚂𝚞𝚙𝚎𝚛𝚒𝚘𝚛 𝚃𝚎𝚌𝚗𝚘𝚕𝚘́𝚐𝚒𝚌𝚘 𝚂𝚞𝚌𝚞́𝚊, 𝚎𝚗 𝚌𝚘𝚘𝚛𝚍𝚒𝚗𝚊𝚌𝚒𝚘́𝚗 𝚌𝚘𝚗 𝚎𝚕 𝙼𝙳𝙷 &ndash; 𝙳𝚒𝚜𝚝𝚛𝚒𝚝𝚘 𝙼𝚘𝚛𝚘𝚗𝚊, 𝚍𝚎𝚜𝚊𝚛𝚛𝚘𝚕𝚕𝚘́ 𝚎𝚕 𝚙𝚛𝚘𝚢𝚎𝚌𝚝𝚘 &ldquo;𝙲𝚛𝚎𝚌𝚒𝚎𝚗𝚍𝚘, 𝙲𝚞𝚒𝚍𝚊𝚗𝚍𝚘 𝚢 𝙲𝚛𝚎𝚊𝚗𝚍𝚘 𝙹𝚞𝚗𝚝𝚘𝚜&rdquo;, 𝚙𝚊𝚛𝚊 𝚏𝚘𝚛𝚝𝚊𝚕𝚎𝚌𝚎𝚛 𝚎𝚕 𝚍𝚎𝚜𝚊𝚛𝚛𝚘𝚕𝚕𝚘 𝚒𝚗𝚝𝚎𝚐𝚛𝚊𝚕 𝚒𝚗𝚏𝚊𝚗𝚝𝚒𝚕 𝚎𝚗 𝚕𝚘𝚜 𝙲𝙳𝙸 𝚢 𝙲𝙽𝙷 𝚍𝚎 𝙼𝚘𝚛𝚘𝚗𝚊 𝚂𝚊𝚗𝚝𝚒𝚊𝚐𝚘.</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"text-align: justify;\">\r\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t7e/1/16/1f4c5.png\" alt=\"📅\" width=\"16\" height=\"16\"></span> 𝟏 𝐝𝐞 𝐨𝐜𝐭𝐮𝐛𝐫𝐞 𝐝𝐞 𝟐𝟎𝟐𝟓 &ndash; 𝟏𝟒 𝐝𝐞 𝐞𝐧𝐞𝐫𝐨 𝐝𝐞 𝟐𝟎𝟐𝟔</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"text-align: justify;\">\r\n<div dir=\"auto\">𝙻𝚘𝚜 𝚎𝚜𝚝𝚞𝚍𝚒𝚊𝚗𝚝𝚎𝚜 𝚍𝚎 𝚝𝚎𝚛𝚌𝚎𝚛 𝚜𝚎𝚖𝚎𝚜𝚝𝚛𝚎 𝚍𝚎 𝙴𝚍𝚞𝚌𝚊𝚌𝚒𝚘́𝚗 𝙸𝚗𝚒𝚌𝚒𝚊𝚕 𝚍𝚎𝚕 𝙸𝚂𝚃𝚂, 𝚋𝚊𝚓𝚘 𝚕𝚊 𝚝𝚞𝚝𝚘𝚛𝚒́𝚊 𝚍𝚎𝚕 𝙿𝚜𝚒. 𝙳𝚎𝚒𝚟𝚒𝚜𝚘𝚗 𝚅𝚎𝚕𝚊𝚜𝚌𝚘, 𝚒𝚗𝚝𝚎𝚛𝚟𝚒𝚗𝚒𝚎𝚛𝚘𝚗 𝚎𝚗 𝟷𝟷 𝚍𝚎 𝚕𝚊𝚜 𝟷𝟿 𝚒𝚗𝚜𝚝𝚒𝚝𝚞𝚌𝚒𝚘𝚗𝚎𝚜 𝚙𝚕𝚊𝚗𝚒𝚏𝚒𝚌𝚊𝚍𝚊𝚜, 𝚋𝚎𝚗𝚎𝚏𝚒𝚌𝚒𝚊𝚗𝚍𝚘 𝚊 𝟺𝟷𝟷 𝚙𝚊𝚍𝚛𝚎𝚜 𝚢 𝚌𝚞𝚒𝚍𝚊𝚍𝚘𝚛𝚎𝚜 𝚢 𝟺𝟸𝟶 𝚗𝚒𝚗̃𝚘𝚜 𝚢 𝚗𝚒𝚗̃𝚊𝚜, 𝚊𝚕𝚌𝚊𝚗𝚣𝚊𝚗𝚍𝚘 𝚎𝚕 𝟷𝟶𝟶% 𝚍𝚎 𝚕𝚘𝚜 𝚘𝚋𝚓𝚎𝚝𝚒𝚟𝚘𝚜 𝚙𝚛𝚘𝚙𝚞𝚎𝚜𝚝𝚘𝚜.</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"text-align: justify;\">\r\n<div dir=\"auto\">𝙴𝚗𝚝𝚛𝚎 𝚕𝚊𝚜 𝚊𝚌𝚌𝚒𝚘𝚗𝚎𝚜 𝚍𝚎𝚜𝚝𝚊𝚌𝚊𝚍𝚊𝚜: 𝚝𝚊𝚕𝚕𝚎𝚛𝚎𝚜 𝚙𝚊𝚛𝚊 𝚙𝚊𝚍𝚛𝚎𝚜, 𝚛𝚒𝚗𝚌𝚘𝚗𝚎𝚜 𝚜𝚎𝚗𝚜𝚘𝚛𝚒𝚊𝚕𝚎𝚜, 𝚐𝚞𝚒́𝚊𝚜 𝚍𝚒𝚍𝚊́𝚌𝚝𝚒𝚌𝚊𝚜 𝚖𝚞𝚕𝚝𝚒𝚜𝚎𝚗𝚜𝚘𝚛𝚒𝚊𝚕𝚎𝚜, 𝚏𝚒𝚌𝚑𝚊𝚜 𝚐𝚛𝚊𝚏𝚘-𝚙𝚕𝚊́𝚜𝚝𝚒𝚌𝚊𝚜 𝚢 𝚖𝚊𝚗𝚞𝚊𝚕𝚎𝚜 𝚎𝚜𝚝𝚛𝚞𝚌𝚝𝚞𝚛𝚊𝚍𝚘𝚜 𝚌𝚘𝚗 𝚐𝚞𝚒́𝚊𝚜 𝚌𝚘𝚐𝚗𝚒𝚝𝚒𝚟𝚊𝚜.</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"text-align: justify;\">\r\n<div dir=\"auto\">𝙴𝚜𝚝𝚊𝚜 𝚊𝚌𝚌𝚒𝚘𝚗𝚎𝚜 𝚏𝚘𝚛𝚝𝚊𝚕𝚎𝚌𝚒𝚎𝚛𝚘𝚗 𝚕𝚊𝚜 𝚙𝚛𝚊́𝚌𝚝𝚒𝚌𝚊𝚜 𝚙𝚎𝚍𝚊𝚐𝚘́𝚐𝚒𝚌𝚊𝚜 𝚍𝚎 𝚕𝚘𝚜 𝚎𝚜𝚝𝚞𝚍𝚒𝚊𝚗𝚝𝚎𝚜, 𝚙𝚛𝚘𝚖𝚘𝚟𝚒𝚎𝚗𝚍𝚘 𝚊𝚙𝚛𝚎𝚗𝚍𝚒𝚣𝚊𝚓𝚎 𝚜𝚒𝚐𝚗𝚒𝚏𝚒𝚌𝚊𝚝𝚒𝚟𝚘, 𝚎𝚜𝚝𝚒𝚖𝚞𝚕𝚊𝚌𝚒𝚘́𝚗</div>\r\n<div dir=\"auto\">𝚖𝚞𝚕𝚝𝚒𝚜𝚎𝚗𝚜𝚘𝚛𝚒𝚊𝚕 𝚢 𝚙𝚊𝚛𝚝𝚒𝚌𝚒𝚙𝚊𝚌𝚒𝚘́𝚗 𝚏𝚊𝚖𝚒𝚕𝚒𝚊𝚛.</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tfe/1/16/1f44f.png\" alt=\"👏\" width=\"16\" height=\"16\"></span> 𝑨𝒈𝒓𝒂𝒅𝒆𝒄𝒆𝒎𝒐𝒔 𝒂𝒍 𝑴𝑫𝑯 &ndash; 𝑫𝒊𝒔𝒕𝒓𝒊𝒕𝒐 𝑴𝒐𝒓𝒐𝒏𝒂, 𝒍𝒐𝒔 𝒆𝒒𝒖𝒊𝒑𝒐𝒔 𝒅𝒆 𝒍𝒐𝒔 𝑪𝑫𝑰 𝒚 𝑪𝑵𝑯, 𝒂𝒍 𝑷𝒔𝒊. 𝑫𝒆𝒊𝒗𝒊𝒔𝒐𝒏 𝑽𝒆𝒍𝒂𝒔𝒄𝒐 𝒚 𝒂 𝒍𝒐𝒔 𝒆𝒔𝒕𝒖𝒅𝒊𝒂𝒏𝒕𝒆𝒔 𝒅𝒆𝒍 𝑰𝑺𝑻𝑺 𝒑𝒐𝒓 𝒔𝒖 𝒄𝒐𝒎𝒑𝒓𝒐𝒎𝒊𝒔𝒐 𝒚 𝒂𝒑𝒐𝒓𝒕𝒆 𝒂𝒍 𝒅𝒆𝒔𝒂𝒓𝒓𝒐𝒍𝒍𝒐 𝒅𝒆 𝒍𝒂 𝒑𝒓𝒊𝒎𝒆𝒓𝒂 𝒊𝒏𝒇𝒂𝒏𝒄𝒊𝒂 𝒆𝒏 𝑴𝒐𝒓𝒐𝒏𝒂 𝑺𝒂𝒏𝒕𝒊𝒂𝒈𝒐.</div>\r\n</div>', NULL, NULL, 'noticias', 'published', 0, 0, 99, '2026-03-25 07:24:32', '2026-03-25 07:24:32', '2026-03-25 07:24:32', '[\"news\\/HbVF86fEJqvaRa7AmchwVqzLrJDNjo6AFsPm8DuY.jpg\"]'),
(7, '📚✨ 𝗖𝘂𝗿𝘀𝗼 ❞𝗗𝗼𝗰𝗲𝗻𝘁𝗲𝘀 𝗱𝗲𝗹 𝗙𝘂𝘁𝘂𝗿𝗼: 𝗖𝗿𝗲𝗮𝗰𝗶𝗼́𝗻 𝗱𝗲 𝗥𝗲𝗰𝘂𝗿𝘀𝗼𝘀 𝗘𝗱𝘂𝗰𝗮𝘁𝗶𝘃𝗼𝘀 𝗰𝗼𝗻 𝗲𝗫𝗲𝗟𝗲𝗮𝗿𝗻𝗶𝗻𝗴 𝗲 𝗜𝗻𝘁𝗲𝗹𝗶𝗴𝗲𝗻𝗰𝗶𝗮 𝗔𝗿𝘁𝗶𝗳𝗶𝗰𝗶𝗮𝗹❞', '-69c348309f6e7', '<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">𝗘𝗹 𝗜𝗻𝘀𝘁𝗶𝘁𝘂𝘁𝗼 𝗦𝘂𝗽𝗲𝗿𝗶𝗼𝗿 𝗧𝗲𝗰𝗻𝗼𝗹𝗼́𝗴𝗶𝗰𝗼 𝗦𝘂𝗰𝘂́𝗮 𝚒𝚗𝚟𝚒𝚝𝚊 𝚊 𝚍𝚘𝚌𝚎𝚗𝚝𝚎𝚜 𝚢 𝚙𝚛𝚘𝚏𝚎𝚜𝚒𝚘𝚗𝚊𝚕𝚎𝚜 𝚍𝚎 𝚕𝚊 𝚎𝚍𝚞𝚌𝚊𝚌𝚒𝚘́𝚗 𝚊 𝚙𝚊𝚛𝚝𝚒𝚌𝚒𝚙𝚊𝚛 𝚎𝚗 𝚎𝚕 𝚌𝚞𝚛𝚜𝚘 ❞𝗗𝗼𝗰𝗲𝗻𝘁𝗲𝘀 𝗱𝗲𝗹 𝗙𝘂𝘁𝘂𝗿𝗼: 𝗖𝗿𝗲𝗮𝗰𝗶𝗼́𝗻 𝗱𝗲 𝗥𝗲𝗰𝘂𝗿𝘀𝗼𝘀 𝗘𝗱𝘂𝗰𝗮𝘁𝗶𝘃𝗼𝘀 𝗰𝗼𝗻 𝗲𝗫𝗲𝗟𝗲𝗮𝗿𝗻𝗶𝗻𝗴 𝗲 𝗜𝗔❞, 𝚞𝚗𝚊 𝚙𝚛𝚘𝚙𝚞𝚎𝚜𝚝𝚊 𝚏𝚘𝚛𝚖𝚊𝚝𝚒𝚟𝚊 𝚘𝚛𝚒𝚎𝚗𝚝𝚊𝚍𝚊 𝚊 𝚏𝚘𝚛𝚝𝚊𝚕𝚎𝚌𝚎𝚛 𝚕𝚊𝚜 𝚌𝚘𝚖𝚙𝚎𝚝𝚎𝚗𝚌𝚒𝚊𝚜 𝚍𝚒𝚐𝚒𝚝𝚊𝚕𝚎𝚜 𝚢 𝚙𝚎𝚍𝚊𝚐𝚘́𝚐𝚒𝚌𝚊𝚜 𝚎𝚗 𝚎𝚕 𝚞𝚜𝚘 𝚍𝚎 𝚑𝚎𝚛𝚛𝚊𝚖𝚒𝚎𝚗𝚝𝚊𝚜 𝚝𝚎𝚌𝚗𝚘𝚕𝚘́𝚐𝚒𝚌𝚊𝚜 𝚒𝚗𝚗𝚘𝚟𝚊𝚍𝚘𝚛𝚊𝚜 𝚊𝚙𝚕𝚒𝚌𝚊𝚍𝚊𝚜 𝚊 𝚕𝚊 𝚎𝚍𝚞𝚌𝚊𝚌𝚒𝚘́𝚗.</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">&nbsp;</div>\r\n</div>', '<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">𝗘𝗹 𝗜𝗻𝘀𝘁𝗶𝘁𝘂𝘁𝗼 𝗦𝘂𝗽𝗲𝗿𝗶𝗼𝗿 𝗧𝗲𝗰𝗻𝗼𝗹𝗼́𝗴𝗶𝗰𝗼 𝗦𝘂𝗰𝘂́𝗮 𝚒𝚗𝚟𝚒𝚝𝚊 𝚊 𝚍𝚘𝚌𝚎𝚗𝚝𝚎𝚜 𝚢 𝚙𝚛𝚘𝚏𝚎𝚜𝚒𝚘𝚗𝚊𝚕𝚎𝚜 𝚍𝚎 𝚕𝚊 𝚎𝚍𝚞𝚌𝚊𝚌𝚒𝚘́𝚗 𝚊 𝚙𝚊𝚛𝚝𝚒𝚌𝚒𝚙𝚊𝚛 𝚎𝚗 𝚎𝚕 𝚌𝚞𝚛𝚜𝚘 ❞𝗗𝗼𝗰𝗲𝗻𝘁𝗲𝘀 𝗱𝗲𝗹 𝗙𝘂𝘁𝘂𝗿𝗼: 𝗖𝗿𝗲𝗮𝗰𝗶𝗼́𝗻 𝗱𝗲 𝗥𝗲𝗰𝘂𝗿𝘀𝗼𝘀 𝗘𝗱𝘂𝗰𝗮𝘁𝗶𝘃𝗼𝘀 𝗰𝗼𝗻 𝗲𝗫𝗲𝗟𝗲𝗮𝗿𝗻𝗶𝗻𝗴 𝗲 𝗜𝗔❞, 𝚞𝚗𝚊 𝚙𝚛𝚘𝚙𝚞𝚎𝚜𝚝𝚊 𝚏𝚘𝚛𝚖𝚊𝚝𝚒𝚟𝚊 𝚘𝚛𝚒𝚎𝚗𝚝𝚊𝚍𝚊 𝚊 𝚏𝚘𝚛𝚝𝚊𝚕𝚎𝚌𝚎𝚛 𝚕𝚊𝚜 𝚌𝚘𝚖𝚙𝚎𝚝𝚎𝚗𝚌𝚒𝚊𝚜 𝚍𝚒𝚐𝚒𝚝𝚊𝚕𝚎𝚜 𝚢 𝚙𝚎𝚍𝚊𝚐𝚘́𝚐𝚒𝚌𝚊𝚜 𝚎𝚗 𝚎𝚕 𝚞𝚜𝚘 𝚍𝚎 𝚑𝚎𝚛𝚛𝚊𝚖𝚒𝚎𝚗𝚝𝚊𝚜 𝚝𝚎𝚌𝚗𝚘𝚕𝚘́𝚐𝚒𝚌𝚊𝚜 𝚒𝚗𝚗𝚘𝚟𝚊𝚍𝚘𝚛𝚊𝚜 𝚊𝚙𝚕𝚒𝚌𝚊𝚍𝚊𝚜 𝚊 𝚕𝚊 𝚎𝚍𝚞𝚌𝚊𝚌𝚒𝚘́𝚗.</div>\r\n<div dir=\"auto\" style=\"text-align: justify;\">𝙴𝚕 𝚌𝚞𝚛𝚜𝚘 𝚝𝚎𝚗𝚍𝚛𝚊́ 𝚞𝚗𝚊 𝗱𝘂𝗿𝗮𝗰𝗶𝗼́𝗻 𝗱𝗲 𝟰𝟬 𝗵𝗼𝗿𝗮𝘀 𝚢 𝚜𝚎𝚛𝚊́ 𝚍𝚒𝚌𝚝𝚊𝚍𝚘 𝚙𝚘𝚛 𝚎𝚕 𝗠𝗴𝘀. 𝗘𝗱𝘄𝗶𝗻 𝗝𝗮𝗿𝗮, 𝚍𝚘𝚌𝚎𝚗𝚝𝚎 𝚍𝚎 𝚕𝚊 𝚌𝚊𝚛𝚛𝚎𝚛𝚊 𝚍𝚎 𝗗𝗲𝘀𝗮𝗿𝗿𝗼𝗹𝗹𝗼 𝗱𝗲 𝗦𝗼𝗳𝘁𝘄𝗮𝗿𝗲, 𝚚𝚞𝚒𝚎𝚗 𝚌𝚘𝚖𝚙𝚊𝚛𝚝𝚒𝚛𝚊́ 𝚌𝚘𝚗𝚘𝚌𝚒𝚖𝚒𝚎𝚗𝚝𝚘𝚜 𝚙𝚛𝚊́𝚌𝚝𝚒𝚌𝚘𝚜 𝚜𝚘𝚋𝚛𝚎 𝚎𝚕 𝚍𝚒𝚜𝚎𝚗̃𝚘 𝚢 𝚌𝚛𝚎𝚊𝚌𝚒𝚘́𝚗 𝚍𝚎 𝚛𝚎𝚌𝚞𝚛𝚜𝚘𝚜 𝚎𝚍𝚞𝚌𝚊𝚝𝚒𝚟𝚘𝚜 𝚍𝚒𝚐𝚒𝚝𝚊𝚕𝚎𝚜 𝚊𝚙𝚘𝚢𝚊𝚍𝚘𝚜 𝚎𝚗 𝚎𝚇𝚎𝙻𝚎𝚊𝚛𝚗𝚒𝚗𝚐 𝚢 𝚎𝚕 𝚞𝚜𝚘 𝚍𝚎 𝚕𝚊 𝚒𝚗𝚝𝚎𝚕𝚒𝚐𝚎𝚗𝚌𝚒𝚊 𝚊𝚛𝚝𝚒𝚏𝚒𝚌𝚒𝚊𝚕 𝚌𝚘𝚖𝚘 𝚊𝚕𝚒𝚊𝚍𝚊 𝚍𝚎𝚕 𝚙𝚛𝚘𝚌𝚎𝚜𝚘 𝚍𝚎 𝚎𝚗𝚜𝚎𝚗̃𝚊𝚗𝚣𝚊-𝚊𝚙𝚛𝚎𝚗𝚍𝚒𝚣𝚊𝚓𝚎.</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"text-align: justify;\">\r\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t7e/1/16/1f4c5.png\" alt=\"📅\" width=\"16\" height=\"16\"></span> 𝗜𝗻𝘀𝗰𝗿𝗶𝗽𝗰𝗶𝗼𝗻𝗲𝘀: 𝚍𝚎𝚕 𝟸𝟾 𝚍𝚎 𝚎𝚗𝚎𝚛𝚘 𝚊𝚕 𝟶𝟿 𝚍𝚎 𝚏𝚎𝚋𝚛𝚎𝚛𝚘 𝚍𝚎 𝟸𝟶𝟸𝟼</div>\r\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8c/1/16/1f4bb.png\" alt=\"💻\" width=\"16\" height=\"16\"></span>𝗠𝗼𝗱𝗮𝗹𝗶𝗱𝗮𝗱: 100% 𝑉𝑖𝑟𝑡𝑢𝑎𝑙</div>\r\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1/16/1f517.png\" alt=\"🔗\" width=\"16\" height=\"16\"></span> 𝗟𝗶𝗻𝗸 𝗱𝗲 𝗶𝗻𝘀𝗰𝗿𝗶𝗽𝗰𝗶𝗼́𝗻: <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"http://siga.institutos.gob.ec:8080/siga-web/web/modulos/evaluacion/evl_0003.jsf?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExclFWQUVTS2lVcFozMnRtaXNydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR5EFN0KIjGVwIs9t8o9gNFbjL96OvvhjxTJ3WVQ2e96W-s6i3uj4JXLb2eU6g_aem_qqTSEPBe_IMcrW6qXHDf8Q\" target=\"_blank\" rel=\"nofollow noopener noreferrer\">http://siga.institutos.gob.ec:8080/.../evalu.../evl_0003.jsf</a></span></div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">𝙴𝚜𝚝𝚎 𝚌𝚞𝚛𝚜𝚘 𝚛𝚎𝚙𝚛𝚎𝚜𝚎𝚗𝚝𝚊 𝚞𝚗𝚊 𝚘𝚙𝚘𝚛𝚝𝚞𝚗𝚒𝚍𝚊𝚍 𝚙𝚊𝚛𝚊 𝚒𝚗𝚗𝚘𝚟𝚊𝚛 𝚎𝚗 𝚎𝚕 𝚊𝚞𝚕𝚊, 𝚖𝚎𝚓𝚘𝚛𝚊𝚛 𝚕𝚊 𝚌𝚊𝚕𝚒𝚍𝚊𝚍 𝚎𝚍𝚞𝚌𝚊𝚝𝚒𝚟𝚊 𝚢 𝚛𝚎𝚜𝚙𝚘𝚗𝚍𝚎𝚛 𝚊 𝚕𝚘𝚜 𝚛𝚎𝚝𝚘𝚜 𝚍𝚎 𝚕𝚊 𝚎𝚍𝚞𝚌𝚊𝚌𝚒𝚘́𝚗 𝚍𝚎𝚕 𝚏𝚞𝚝𝚞𝚛𝚘 𝚖𝚎𝚍𝚒𝚊𝚗𝚝𝚎 𝚎𝚕 𝚞𝚜𝚘 𝚎𝚜𝚝𝚛𝚊𝚝𝚎́𝚐𝚒𝚌𝚘 𝚍𝚎 𝚕𝚊 𝚝𝚎𝚌𝚗𝚘𝚕𝚘𝚐𝚒́𝚊.</div>\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" alt=\"👉\" width=\"16\" height=\"16\"></span> 𝑰𝒏𝒔𝒕𝒊𝒕𝒖𝒕𝒐 𝑺𝒖𝒑𝒆𝒓𝒊𝒐𝒓 𝑻𝒆𝒄𝒏𝒐𝒍𝒐́𝒈𝒊𝒄𝒐 𝑺𝒖𝒄𝒖́𝒂</div>\r\n<div dir=\"auto\" style=\"text-align: justify;\">𝑭𝒐𝒓𝒎𝒂𝒏𝒅𝒐 𝒅𝒐𝒄𝒆𝒏𝒕𝒆𝒔 𝒑𝒓𝒆𝒑𝒂𝒓𝒂𝒅𝒐𝒔 𝒑𝒂𝒓𝒂 𝒍𝒐𝒔 𝒅𝒆𝒔𝒂𝒇𝒊́𝒐𝒔 𝒅𝒆𝒍 𝒎𝒂𝒏̃𝒂𝒏𝒂. <span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc6/1/16/1f680.png\" alt=\"🚀\" width=\"16\" height=\"16\"></span><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t9e/1/16/1f4d6.png\" alt=\"📖\" width=\"16\" height=\"16\"></span></div>\r\n</div>', NULL, NULL, 'noticias', 'published', 0, 0, 99, '2026-03-25 07:28:00', '2026-03-25 07:28:00', '2026-03-25 07:28:00', '[\"news\\/lD2TMjS95odytlabXGc8MfqJmpUzW2SVCmTOr9FY.jpg\"]'),
(8, '𝗥𝗲𝗰𝗲𝗽𝗰𝗶𝗼́𝗻 𝗱𝗲 𝘀𝗼𝗹𝗶𝗰𝗶𝘁𝘂𝗱𝗲𝘀 𝗽𝗮𝗿𝗮 𝗛𝗼𝗺𝗼𝗹𝗼𝗴𝗮𝗰𝗶𝗼́𝗻 𝘆 𝗥𝗲𝗶𝗻𝗴𝗿𝗲𝘀𝗼𝘀 𝗘𝗹 𝗜𝗻𝘀𝘁𝗶𝘁𝘂𝘁𝗼 𝗦𝘂𝗽𝗲𝗿𝗶𝗼𝗿 𝗧𝗲𝗰𝗻𝗼𝗹𝗼́𝗴𝗶𝗰𝗼 𝗦𝘂𝗰𝘂́𝗮', '-69c348b4a5543', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">𝗥𝗲𝗰𝗲𝗽𝗰𝗶𝗼́𝗻 𝗱𝗲 𝘀𝗼𝗹𝗶𝗰𝗶𝘁𝘂𝗱𝗲𝘀 𝗽𝗮𝗿𝗮 𝗛𝗼𝗺𝗼𝗹𝗼𝗴𝗮𝗰𝗶𝗼́𝗻 𝘆 𝗥𝗲𝗶𝗻𝗴𝗿𝗲𝘀𝗼𝘀</div>\r\n<div dir=\"auto\" style=\"text-align: justify;\">𝗘𝗹 𝗜𝗻𝘀𝘁𝗶𝘁𝘂𝘁𝗼 𝗦𝘂𝗽𝗲𝗿𝗶𝗼𝗿 𝗧𝗲𝗰𝗻𝗼𝗹𝗼́𝗴𝗶𝗰𝗼 𝗦𝘂𝗰𝘂́𝗮 𝚂𝚞𝚌𝚞́𝚊 𝚒𝚗𝚏𝚘𝚛𝚖𝚊 𝚊 𝚕𝚊 𝚌𝚘𝚖𝚞𝚗𝚒𝚍𝚊𝚍 𝚎𝚜𝚝𝚞𝚍𝚒𝚊𝚗𝚝𝚒𝚕 𝚚𝚞𝚎 𝚜𝚎 𝚎𝚗𝚌𝚞𝚎𝚗𝚝𝚛𝚊 𝚑𝚊𝚋𝚒𝚕𝚒𝚝𝚊𝚍𝚊 𝚕𝚊 𝚛𝚎𝚌𝚎𝚙𝚌𝚒𝚘́𝚗 𝚍𝚎 𝚜𝚘𝚕𝚒𝚌𝚒𝚝𝚞𝚍𝚎𝚜 𝚙𝚊𝚛𝚊 𝚙𝚛𝚘𝚌𝚎𝚜𝚘𝚜 𝚍𝚎 𝚑𝚘𝚖𝚘𝚕𝚘𝚐𝚊𝚌𝚒𝚘́𝚗 𝚢 𝚛𝚎𝚒𝚗𝚐𝚛𝚎𝚜𝚘, 𝚍𝚒𝚛𝚒𝚐𝚒𝚍𝚊 𝚊 𝚎𝚜𝚝𝚞𝚍𝚒𝚊𝚗𝚝𝚎𝚜 𝚚𝚞𝚎 𝚍𝚎𝚜𝚎𝚎𝚗 𝚌𝚘𝚗𝚝𝚒𝚗𝚞𝚊𝚛 𝚘 𝚛𝚎𝚝𝚘𝚖𝚊𝚛 𝚜𝚞 𝚏𝚘𝚛𝚖𝚊𝚌𝚒𝚘́𝚗 𝚊𝚌𝚊𝚍𝚎́𝚖𝚒𝚌𝚊 𝚎𝚗 𝚗𝚞𝚎𝚜𝚝𝚛𝚊 𝚒𝚗𝚜𝚝𝚒𝚝𝚞𝚌𝚒𝚘́𝚗.</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">𝙴𝚜𝚝𝚎 𝚙𝚛𝚘𝚌𝚎𝚜𝚘 𝚝𝚒𝚎𝚗𝚎 𝚌𝚘𝚖𝚘 𝚏𝚒𝚗𝚊𝚕𝚒𝚍𝚊𝚍 𝚏𝚊𝚌𝚒𝚕𝚒𝚝𝚊𝚛 𝚕𝚊 𝚌𝚘𝚗𝚝𝚒𝚗𝚞𝚒𝚍𝚊𝚍 𝚍𝚎 𝚕𝚘𝚜 𝚎𝚜𝚝𝚞𝚍𝚒𝚘𝚜 𝚜𝚞𝚙𝚎𝚛𝚒𝚘𝚛𝚎𝚜, 𝚐𝚊𝚛𝚊𝚗𝚝𝚒𝚣𝚊𝚗𝚍𝚘 𝚎𝚕 𝚌𝚞𝚖𝚙𝚕𝚒𝚖𝚒𝚎𝚗𝚝𝚘 𝚍𝚎 𝚕𝚊 𝚗𝚘𝚛𝚖𝚊𝚝𝚒𝚟𝚊 𝚊𝚌𝚊𝚍𝚎́𝚖𝚒𝚌𝚊 𝚟𝚒𝚐𝚎𝚗𝚝𝚎 𝚢 𝚋𝚛𝚒𝚗𝚍𝚊𝚗𝚍𝚘 𝚘𝚙𝚘𝚛𝚝𝚞𝚗𝚒𝚍𝚊𝚍𝚎𝚜 𝚍𝚎 𝚛𝚎𝚒𝚗𝚜𝚎𝚛𝚌𝚒𝚘́𝚗 𝚊𝚕 𝚜𝚒𝚜𝚝𝚎𝚖𝚊 𝚎𝚍𝚞𝚌𝚊𝚝𝚒𝚟𝚘.</div>\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tfd/1/16/1f4c4.png\" alt=\"📄\" width=\"16\" height=\"16\"></span>𝙳𝚎𝚜𝚌𝚊𝚛𝚐𝚊 𝚎𝚕 𝚏𝚘𝚛𝚖𝚞𝚕𝚊𝚛𝚒𝚘 𝚎𝚗 𝚕𝚊 𝚙𝚊́𝚐𝚒𝚗𝚊 𝚒𝚗𝚜𝚝𝚒𝚝𝚞𝚌𝚒𝚘𝚗𝚊𝚕:</div>\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.istsucua.edu.ec/?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExclFWQUVTS2lVcFozMnRtaXNydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR5zxC-3zqCfQfoie-aj1jV1yF2J2xYT0UEZmrtYj00TimZix2BgLdlBikKZ5A_aem_pIMuYKvAcKwx7GLmESZmdg\" target=\"_blank\" rel=\"nofollow noopener noreferrer\">https://www.istsucua.edu.ec</a></span></div>\r\n</div>', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">\r\n<div dir=\"auto\">𝗥𝗲𝗰𝗲𝗽𝗰𝗶𝗼́𝗻 𝗱𝗲 𝘀𝗼𝗹𝗶𝗰𝗶𝘁𝘂𝗱𝗲𝘀 𝗽𝗮𝗿𝗮 𝗛𝗼𝗺𝗼𝗹𝗼𝗴𝗮𝗰𝗶𝗼́𝗻 𝘆 𝗥𝗲𝗶𝗻𝗴𝗿𝗲𝘀𝗼𝘀</div>\r\n<div dir=\"auto\">𝗘𝗹 𝗜𝗻𝘀𝘁𝗶𝘁𝘂𝘁𝗼 𝗦𝘂𝗽𝗲𝗿𝗶𝗼𝗿 𝗧𝗲𝗰𝗻𝗼𝗹𝗼́𝗴𝗶𝗰𝗼 𝗦𝘂𝗰𝘂́𝗮 𝚂𝚞𝚌𝚞́𝚊 𝚒𝚗𝚏𝚘𝚛𝚖𝚊 𝚊 𝚕𝚊 𝚌𝚘𝚖𝚞𝚗𝚒𝚍𝚊𝚍 𝚎𝚜𝚝𝚞𝚍𝚒𝚊𝚗𝚝𝚒𝚕 𝚚𝚞𝚎 𝚜𝚎 𝚎𝚗𝚌𝚞𝚎𝚗𝚝𝚛𝚊 𝚑𝚊𝚋𝚒𝚕𝚒𝚝𝚊𝚍𝚊 𝚕𝚊 𝚛𝚎𝚌𝚎𝚙𝚌𝚒𝚘́𝚗 𝚍𝚎 𝚜𝚘𝚕𝚒𝚌𝚒𝚝𝚞𝚍𝚎𝚜 𝚙𝚊𝚛𝚊 𝚙𝚛𝚘𝚌𝚎𝚜𝚘𝚜 𝚍𝚎 𝚑𝚘𝚖𝚘𝚕𝚘𝚐𝚊𝚌𝚒𝚘́𝚗 𝚢 𝚛𝚎𝚒𝚗𝚐𝚛𝚎𝚜𝚘, 𝚍𝚒𝚛𝚒𝚐𝚒𝚍𝚊 𝚊 𝚎𝚜𝚝𝚞𝚍𝚒𝚊𝚗𝚝𝚎𝚜 𝚚𝚞𝚎 𝚍𝚎𝚜𝚎𝚎𝚗 𝚌𝚘𝚗𝚝𝚒𝚗𝚞𝚊𝚛 𝚘 𝚛𝚎𝚝𝚘𝚖𝚊𝚛 𝚜𝚞 𝚏𝚘𝚛𝚖𝚊𝚌𝚒𝚘́𝚗 𝚊𝚌𝚊𝚍𝚎́𝚖𝚒𝚌𝚊 𝚎𝚗 𝚗𝚞𝚎𝚜𝚝𝚛𝚊 𝚒𝚗𝚜𝚝𝚒𝚝𝚞𝚌𝚒𝚘́𝚗.</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\">𝙴𝚜𝚝𝚎 𝚙𝚛𝚘𝚌𝚎𝚜𝚘 𝚝𝚒𝚎𝚗𝚎 𝚌𝚘𝚖𝚘 𝚏𝚒𝚗𝚊𝚕𝚒𝚍𝚊𝚍 𝚏𝚊𝚌𝚒𝚕𝚒𝚝𝚊𝚛 𝚕𝚊 𝚌𝚘𝚗𝚝𝚒𝚗𝚞𝚒𝚍𝚊𝚍 𝚍𝚎 𝚕𝚘𝚜 𝚎𝚜𝚝𝚞𝚍𝚒𝚘𝚜 𝚜𝚞𝚙𝚎𝚛𝚒𝚘𝚛𝚎𝚜, 𝚐𝚊𝚛𝚊𝚗𝚝𝚒𝚣𝚊𝚗𝚍𝚘 𝚎𝚕 𝚌𝚞𝚖𝚙𝚕𝚒𝚖𝚒𝚎𝚗𝚝𝚘 𝚍𝚎 𝚕𝚊 𝚗𝚘𝚛𝚖𝚊𝚝𝚒𝚟𝚊 𝚊𝚌𝚊𝚍𝚎́𝚖𝚒𝚌𝚊 𝚟𝚒𝚐𝚎𝚗𝚝𝚎 𝚢 𝚋𝚛𝚒𝚗𝚍𝚊𝚗𝚍𝚘 𝚘𝚙𝚘𝚛𝚝𝚞𝚗𝚒𝚍𝚊𝚍𝚎𝚜 𝚍𝚎 𝚛𝚎𝚒𝚗𝚜𝚎𝚛𝚌𝚒𝚘́𝚗 𝚊𝚕 𝚜𝚒𝚜𝚝𝚎𝚖𝚊 𝚎𝚍𝚞𝚌𝚊𝚝𝚒𝚟𝚘.</div>\r\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tfd/1/16/1f4c4.png\" alt=\"📄\" width=\"16\" height=\"16\"></span>𝙳𝚎𝚜𝚌𝚊𝚛𝚐𝚊 𝚎𝚕 𝚏𝚘𝚛𝚖𝚞𝚕𝚊𝚛𝚒𝚘 𝚎𝚗 𝚕𝚊 𝚙𝚊́𝚐𝚒𝚗𝚊 𝚒𝚗𝚜𝚝𝚒𝚝𝚞𝚌𝚒𝚘𝚗𝚊𝚕:</div>\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.istsucua.edu.ec/?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExclFWQUVTS2lVcFozMnRtaXNydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR5zxC-3zqCfQfoie-aj1jV1yF2J2xYT0UEZmrtYj00TimZix2BgLdlBikKZ5A_aem_pIMuYKvAcKwx7GLmESZmdg\" target=\"_blank\" rel=\"nofollow noopener noreferrer\">https://www.istsucua.edu.ec</a></span></div>\r\n</div>', NULL, NULL, 'noticias', 'published', 0, 0, 99, '2026-03-25 07:30:12', '2026-03-25 07:30:12', '2026-03-25 07:30:12', '[\"news\\/3STxcq6zr32hSk1tDWS9cRXW3NscPpSKKJI8hV8W.jpg\"]'),
(9, '¡Cada vez somos más!', 'cada-vez-somos-mas-69c3493f34329', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">El programa de ingl&eacute;s&nbsp;<span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/becauseheisnice?__eep__=6&amp;__cft__[0]=AZY4XVTVO9fnsBM5_0J0imaCI3RbLZp2YxOkJ5PcIrenP3lBUEpu8wt2aKfHc0T1Z838V_VRC6Vcm_snLSTD028VXGhFQfm8xUaibCefGGX6BiHZl7ctWnv-XOQ5ue3zBptrlI7k8FfomJRM94Gcutht9tZ0zA5I8zy0whBxlj0b5uSP1a_LHGbup8R4b7zv1kI3lwcr7w0VHXrQdCgG_GTVbGC2LZ_GL5-KH8DcZytFzg&amp;__tn__=*NK-R\">#BecauseHeIsNice</a></span> ya cuenta con 343.000 participantes. <span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tfd/1/16/1f64c.png\" alt=\"🙌\" width=\"16\" height=\"16\"></span></div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"text-align: justify;\">&nbsp;</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">&nbsp;</div>\r\n</div>', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t49/1/16/1f4da.png\" alt=\"📚\" width=\"16\" height=\"16\"></span><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tf4/1/16/2728.png\" alt=\"✨\" width=\"16\" height=\"16\"></span> &iexcl;Cada vez somos m&aacute;s!</div>\r\n<div dir=\"auto\" style=\"text-align: justify;\">El programa de ingl&eacute;s <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/becauseheisnice?__eep__=6&amp;__cft__[0]=AZY4XVTVO9fnsBM5_0J0imaCI3RbLZp2YxOkJ5PcIrenP3lBUEpu8wt2aKfHc0T1Z838V_VRC6Vcm_snLSTD028VXGhFQfm8xUaibCefGGX6BiHZl7ctWnv-XOQ5ue3zBptrlI7k8FfomJRM94Gcutht9tZ0zA5I8zy0whBxlj0b5uSP1a_LHGbup8R4b7zv1kI3lwcr7w0VHXrQdCgG_GTVbGC2LZ_GL5-KH8DcZytFzg&amp;__tn__=*NK-R\">#BecauseHeIsNice</a></span> ya cuenta con 343.000 participantes. <span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tfd/1/16/1f64c.png\" alt=\"🙌\" width=\"16\" height=\"16\"></span></div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"text-align: justify;\">\r\n<div dir=\"auto\">Este crecimiento refleja un proceso transparente y un sistema que sigue funcionando de manera constante. Adem&aacute;s, su modalidad virtual <span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8c/1/16/1f4bb.png\" alt=\"💻\" width=\"16\" height=\"16\"></span> permite que los estudiantes aprendan sin dejar de lado sus actividades diarias.</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\" style=\"text-align: justify;\">\r\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc6/1/16/1f680.png\" alt=\"🚀\" width=\"16\" height=\"16\"></span> &iexcl;Los resultados lo confirman, este modelo s&iacute; funciona y fortalece el proceso formativo de los estudiantes!</div>\r\n</div>\r\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\r\n<div dir=\"auto\" style=\"text-align: justify;\">&iexcl;S&eacute; parte! Postula en: <span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" alt=\"👉\" width=\"16\" height=\"16\"></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://educontinua.minedec.gob.ec/?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExclFWQUVTS2lVcFozMnRtaXNydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR6bsJGaILI4-T5sQJl9BX6P_i-4PDaNjU4bQB0XgHqc-HcnzYBK37yf31Kf8g_aem_0SP_mn4azRcTLEhoYkCi2g\" target=\"_blank\" rel=\"nofollow noopener noreferrer\">https://educontinua.minedec.gob.ec</a></span></div>\r\n<div dir=\"auto\" style=\"text-align: justify;\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/elnuevoecuador?__eep__=6&amp;__cft__[0]=AZY4XVTVO9fnsBM5_0J0imaCI3RbLZp2YxOkJ5PcIrenP3lBUEpu8wt2aKfHc0T1Z838V_VRC6Vcm_snLSTD028VXGhFQfm8xUaibCefGGX6BiHZl7ctWnv-XOQ5ue3zBptrlI7k8FfomJRM94Gcutht9tZ0zA5I8zy0whBxlj0b5uSP1a_LHGbup8R4b7zv1kI3lwcr7w0VHXrQdCgG_GTVbGC2LZ_GL5-KH8DcZytFzg&amp;__tn__=*NK-R\">#ElNuevoEcuador</a></span></div>\r\n</div>', NULL, NULL, NULL, 'published', 0, 0, 99, '2026-03-25 07:32:31', '2026-03-25 07:32:31', '2026-03-25 07:32:49', '[\"news\\/4JLE4DpZ08L1zpzEqm8FBdcitskJTyAyY6V8goEZ.jpg\"]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `popups`
--

CREATE TABLE `popups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `popups`
--

INSERT INTO `popups` (`id`, `fecha_inicio`, `fecha_fin`, `image_path`, `message`, `link`, `is_active`, `created_at`, `updated_at`) VALUES
(2, '2026-03-30', '2026-04-07', 'popups/YPcZQ4Zu0IIaG6cv3lIf7z2OGAFTiIimmtNmdnpF.jpg', 'DAR CLICK EN LA IMAGEN', 'https://www.registrounicoedusup.gob.ec/', 1, '2026-03-31 06:05:15', '2026-03-31 06:19:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `q_a_s`
--

CREATE TABLE `q_a_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `q_a_s`
--

INSERT INTO `q_a_s` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'horario de clases, horarios', '<p>Hola los Horarios de clases son de 17:00 pm - 22: 00 pm</p>', '2025-12-13 03:53:15', '2025-12-15 01:50:53'),
(2, 'Carreras, carera', '<p>1.- Desarrollo de software 2.- Agroecologia. 3.- contabilidad y Asesoria Tributaria 4.- Educacion..</p>', '2025-12-14 10:36:56', '2026-02-10 00:44:50'),
(3, 'matriculas, matriculacion, matricular', '<p>hola! Aun no hay fecha de matriculacion, te podemos ayudar con algo mas,</p>', '2025-12-15 00:36:52', '2025-12-15 01:14:17'),
(4, 'mas información, información, detalles', '<p><!--StartFragment --><span class=\"cf0\">“Por favor, indícanos la carrera de tu interés para darte información personalizada.”</span><!--EndFragment --></p>', '2025-12-21 22:53:28', '2025-12-21 22:54:12'),
(5, 'software, desarrollo, iformatica.', '<div class=\"career-row\">\r\n<div class=\"career-col-text\">\r\n<div>\r\n<div class=\"wp-block-stackable-subtitle stk-block-subtitle stk-block stk-652ee98 wp-dark-mode-transparent\" data-block-id=\"652ee98\">\r\n<p class=\"stk-block-subtitle__text stk-subtitle has-text-color wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Desarrollo de Software</strong></p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-76364b3 wp-dark-mode-transparent justificado\" data-block-id=\"76364b3\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"career-row\">\r\n<div class=\"career-col-text\"><main id=\"content\" class=\"neve-main wp-dark-mode-transparent\">\r\n<div class=\"container single-page-container wp-dark-mode-transparent\">\r\n<div class=\"row wp-dark-mode-transparent\">\r\n<div class=\"nv-single-page-wrap col wp-dark-mode-transparent\">\r\n<div class=\"nv-content-wrap entry-content wp-dark-mode-transparent\">\r\n<div class=\"wp-block-stackable-columns stk-block-columns stk-block stk-3544645 stk-block-background stk--has-background-overlay\" data-block-id=\"3544645\">\r\n<div class=\"stk-row stk-inner-blocks stk-block-content stk-content-align stk-3544645-column wp-dark-mode-transparent\">\r\n<div class=\"wp-block-stackable-column stk-block-column stk-column stk-block stk-fd929a5 stk-block-background stk--has-background-overlay\" data-v=\"4\" data-block-id=\"fd929a5\">\r\n<div class=\"stk-column-wrapper stk-block-column__content stk-container stk-fd929a5-container stk--no-background stk--no-padding wp-dark-mode-transparent\">\r\n<div class=\"stk-block-content stk-inner-blocks stk-fd929a5-inner-blocks wp-dark-mode-transparent\">\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-b80106d wp-dark-mode-transparent justificado\" data-block-id=\"b80106d\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\" style=\"text-align: justify;\">Analizar los requerimientos del usuario mediante metodolog&iacute;as de desarrollo de software. Desarrollar sistemas inform&aacute;ticos de escritorio, web y aplicaciones m&oacute;viles. Codificar sistemas inform&aacute;ticos utilizando lenguajes de programaci&oacute;n de &uacute;ltima generaci&oacute;n. Implementar el software elaborado en un ambiente de trabajo.</p>\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\" style=\"text-align: justify;\">* horario de clases de 1700:pm a 2200:pm</p>\r\n</div>\r\n<div class=\"wp-block-stackable-text stk-block-text stk-block stk-e9d7e2d wp-dark-mode-transparent\" data-block-id=\"e9d7e2d\">\r\n<p class=\"stk-block-text__text has-text-color has-text-align-justify wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">T&iacute;tulo a obtener:</strong>&nbsp;Tecn&oacute;logo Superior en Desarrollo de Software<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Per&iacute;odos acad&eacute;micos:&nbsp;</strong>4<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Modalidad:</strong>&nbsp;Presencial<br class=\"wp-dark-mode-transparent\"><strong class=\"wp-dark-mode-transparent\">Horario:&nbsp;</strong>5 PM &ndash; 10 PM</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</main><footer id=\"site-footer\" class=\"site-footer wp-dark-mode-transparent\">\r\n<div class=\"hfg_footer wp-dark-mode-transparent\">\r\n<div id=\"cb-row--footer-desktop-bottom\" class=\"footer--row footer-bottom hide-on-mobile hide-on-tablet layout-full-contained\" data-row-id=\"bottom\" data-show-on=\"desktop\">\r\n<div class=\"footer--row-inner footer-bottom-inner footer-content-wrap\">\r\n<div class=\"container wp-dark-mode-transparent\">\r\n<div class=\"hfg-grid nv-footer-content hfg-grid-bottom row--wrapper row wp-dark-mode-transparent\" data-section=\"hfg_footer_layout_bottom\">\r\n<div class=\"hfg-slot left wp-dark-mode-transparent\">\r\n<div class=\"builder-item wp-dark-mode-transparent\">\r\n<div class=\"item--inner wp-dark-mode-transparent\">\r\n<div class=\"component-wrap wp-dark-mode-transparent\">\r\n<div class=\"wp-dark-mode-transparent\"><strong>M&aacute;s informaci&oacute;n</strong></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</footer></div>\r\n</div>\r\n<div class=\"career-coordinator\">\r\n<h3>Coordinador</h3>\r\n<p><strong>Ing. Paul Castillo</strong></p>\r\n<p>Email:&nbsp;<a href=\"mailto:paul.castillo@istsucua.edu.ec\">paul.castillo@istsucua.edu.ec</a></p>\r\n</div>', '2026-01-11 23:32:26', '2026-01-11 23:40:06'),
(6, 'Ciclos', '<p>Son 4 ciclos aproximadamente 2 a&ntilde;os</p>', '2026-01-30 01:17:47', '2026-01-30 01:17:47'),
(7, 'Ubicacion, localizados, dirección, direccion', '<p>En la calle Efren Zu&ntilde;iga y Luis Sangurima, Instalaciones de la UES</p>', '2026-01-30 01:19:26', '2026-01-30 01:19:26'),
(8, 'Inscripción, matricula, registro', '<p>Nosotros publicamos en redes sociales las fechas calendarizadas para el proceso</p>', '2026-01-30 03:31:45', '2026-01-30 03:31:45'),
(9, 'virtuales, en linea', '<p>Todas las carreras actualmente son presenciales</p>', '2026-01-30 03:33:26', '2026-01-30 04:22:22'),
(10, 'precio, costo, valor', '<p>La educaci&oacute;n es gratuita sin costo, salvo que se pierda la alguna materia o sea una segunda carrera</p>', '2026-01-30 03:34:59', '2026-01-30 04:19:22'),
(11, 'Educación Inicial', '<p>Educaci&oacute;n Inicial es una carrera DUAL: 8 semanas de clases presenciales y 8 semanas de Practicas preprofesionales en sitio</p>', '2026-01-30 04:24:27', '2026-01-30 04:25:24'),
(12, 'titulo, graduo', '<p>El titulo que entregamos en nuestras carreras es TECNOLOGO de Tercer nivel en 2 a&ntilde;os (4 ciclos)</p>', '2026-01-30 04:28:08', '2026-01-30 04:28:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rectors`
--

CREATE TABLE `rectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `academic_title` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'institute_name', 'Instituto Superior Tecnológico Sucúa', '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(2, 'institute_motto', 'Formando profesionales para el futuro', '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(3, 'contact_address', 'Av. Principal 123, Sucúa - Ecuador', '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(4, 'contact_phone', '(07) 123-4567', '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(5, 'contact_email', 'info@ists.edu.ec', '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(6, 'contact_hours', 'Lun-Vie: 8:00 AM - 6:00 PM', '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(7, 'social_facebook', 'https://www.facebook.com', '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(8, 'social_twitter', 'https://www.twitter.com', '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(9, 'social_instagram', 'https://www.instagram.com', '2025-12-10 23:36:57', '2025-12-10 23:36:57'),
(10, 'social_linkedin', 'https://www.linkedin.com', '2025-12-10 23:36:57', '2025-12-10 23:36:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `site_stats`
--

CREATE TABLE `site_stats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_visits` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `site_stats`
--

INSERT INTO `site_stats` (`id`, `total_visits`, `created_at`, `updated_at`) VALUES
(1, 42249, '2025-12-28 20:12:35', '2025-12-28 20:12:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `icon_svg` varchar(2048) DEFAULT NULL,
  `bg_color` varchar(128) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `url`, `active`, `icon_svg`, `bg_color`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'https://www.facebook.com/share/14NqPxg6y5t/', 1, '<svg width=\"22\" height=\"22\" fill=\"white\" viewBox=\"0 0 24 24\"><path d=\"M22.675 0h-21.35C.595 0 0 .592 0 1.326v21.348C0 23.408.595 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.406 24 24 23.408 24 22.674V1.326C24 .592 23.406 0 22.675 0\"/></svg>', '#1877f2', '2025-12-17 03:49:53', '2025-12-18 06:43:19'),
(2, 'twitter', 'https://twitter.com/istsucua', 0, '<svg viewBox=\"0 0 24 24\" aria-hidden=\"true\" xmlns=\"http://www.w3.org/2000/svg\" width=\"100\" height=\"100\">\r\n  <path d=\"M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z\"></path>\r\n</svg>', 'negro', '2025-12-17 03:49:53', '2025-12-17 05:32:03'),
(3, 'instagram', 'https://instagram.com/istsucua', 1, '<svg width=\"22\" height=\"22\" fill=\"white\" viewBox=\"0 0 24 24\"><path d=\"M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.308.974.974 1.246 2.242 1.308 3.608.058 1.266.069 1.646.069 4.85s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.308 3.608-.974.974-2.242 1.246-3.608 1.308-1.266.058-1.646.069-4.85.069s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.308-.974-.974-1.246-2.242-1.308-3.608C2.175 15.647 2.163 15.267 2.163 12s.012-3.584.07-4.85c.062-1.366.334-2.633 1.308-3.608.974-.974 2.242-1.246 3.608-1.308C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.013 7.052.072 5.771.131 4.659.425 3.678 1.406c-.98.98-1.274 2.092-1.333 3.373C2.013 8.332 2 8.741 2 12c0 3.259.013 3.668.072 4.948.059 1.281.353 2.393 1.333 3.373.98.98 2.092 1.274 3.373 1.333C8.332 23.987 8.741 24 12 24s3.668-.013 4.948-.072c1.281-.059 2.393-.353 3.373-1.333.98-.98 1.274-2.092 1.333-3.373.059-1.28.072-1.689.072-4.948 0-3.259-.013-3.668-.072-4.948-.059-1.281-.353-2.393-1.333-3.373-.98-.98-2.092-1.274-3.373-1.333C15.668.013 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a3.999 3.999 0 1 1 0-7.998 3.999 3.999 0 0 1 0 7.998zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z\"/></svg>', 'radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%)', '2025-12-17 03:49:53', '2025-12-18 06:38:49'),
(4, 'tiktok', 'https://www.tiktok.com/@ist_sucua', 1, '<svg width=\"22\" height=\"22\" fill=\"white\" viewBox=\"0 0 24 24\"><path d=\"M12.004 2.003c-5.523 0-10 4.477-10 10s4.477 10 10 10 10-4.477 10-10-4.477-10-10-10zm3.993 10.993c-.001 1.657-1.346 3.002-3.003 3.002-1.657 0-3.002-1.345-3.002-3.002 0-1.657 1.345-3.002 3.002-3.002.553 0 1.07.151 1.513.414v1.13c-.293-.14-.617-.22-.963-.22-1.104 0-2 .896-2 2 0 1.104.896 2 2 2 1.104 0 2-.896 2-2v-5.002h1.45c.001 1.657 1.346 3.002 3.003 3.002v1.45c-1.657 0-3.002-1.345-3.002-3.002z\"/></svg>', '#000', '2025-12-17 03:49:53', '2025-12-18 06:42:27'),
(5, 'whatsapp', 'https://chat.whatsapp.com/DpBz7BKBL7sEPwXpJ1xnnb?mode=hqrc', 0, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 448 512\" fill=\"currentColor\">\r\n    <path d=\"M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.1 0-65.6-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-5.5-2.8-23.2-8.5-44.2-27.1-16.4-14.6-27.4-32.7-30.6-38.2-3.2-5.6-.3-8.6 2.4-11.3 2.5-2.4 5.5-6.5 8.3-9.7 2.8-3.3 3.7-5.6 5.5-9.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 13.2 5.8 23.5 9.2 31.5 11.8 13.3 4.2 25.4 3.6 35 2.2 10.7-1.5 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z\"/>\r\n</svg>', '#25D366', '2025-12-17 03:49:53', '2026-02-10 00:34:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `title`, `department`, `bio`, `image_path`, `pdf_path`, `order`, `created_at`, `updated_at`) VALUES
(1, 'FAUSTO FABIAN SUAREZ QUITO', 'Magister. Seguridad Informatica', 'RECTOR', NULL, 'teachers/ga3GmaYDMp2ZGXo9XJHQFv0bwieHf0VQYQNEXCHr.jpg', 'teachers_pdf/lMfbQatTiZf1nFdqA1kpnZqgNVeaAqScTgELKRVL.pdf', 1, '2025-12-13 07:40:02', '2026-03-27 03:52:58'),
(2, 'PAUL CASTILLO', 'Magister', 'COORDINADOR DE CARRERA DESARROLLO DE SOFTWARE', NULL, 'teachers/4RKkez329JrA0jlu2Evr3vwIH4pdizs3ecoBM5X6.jpg', 'teachers_pdf/xCWZsgmqfXcZVETwdc9S5HaHG8WgonUNZG0rPTmg.pdf', 6, '2025-12-17 02:20:26', '2026-03-27 03:58:39'),
(3, 'EDWIN VICENTE JARA FRÍAS', 'Magister', 'TICS', NULL, 'teachers/hJhhProYuyUWpE7vdrA6bSDkBqUjcNPgLPxmLjJe.jpg', 'teachers_pdf/ElhvQh7idDvtm6di0zbCofpjwGKtPKv93fhVqE8p.pdf', 4, '2025-12-20 22:44:03', '2026-02-05 02:36:02'),
(4, 'PAUL TAISHA', 'Ingeniero', 'COMUNICACION', NULL, 'teachers/EIKFfh17EXEmeiuVR4HUeiOthZa4OSiSa7GClWse.jpg', 'teachers_pdf/zvP2TrpMvMEICnaqjlGCuuKFqJIySkwG56CTAtDK.pdf', 5, '2025-12-22 03:40:02', '2026-03-27 03:57:48'),
(5, 'CRISTIAN ERAZO', 'Ingeniero', 'DOCENTE', NULL, 'teachers/xhhFRjrVNuBEFRN8MRkem2Ty1Nv3dNH3pKVq7rfb.jpg', NULL, 7, '2025-12-22 03:42:38', '2026-03-31 04:39:07'),
(6, 'MARCO TIGRE', 'Magister', 'DOCENTE', '<p>Ingeniero en sistemas magister en marketing</p>', 'teachers/71Yn7k9PHhBuSZsQhDkmHrwJ6YL3nkmnmIu22aLL.jpg', 'teachers_pdf/H3qZxTZ7ChC70vbaLWonAklmtv91NaDsGaklqkkK.pdf', 7, '2025-12-22 03:44:48', '2026-03-27 05:07:22'),
(7, 'DEIVIDSON VELASCO', 'Licenciado', 'BIENESTAR ESTUDIANTIL', NULL, 'teachers/Wt9n8KxH64FjR3ujfo7omkHLIryzjAclKvVQuDDd.jpg', 'teachers_pdf/dCDgptKSNbFlP8QbWWZm7iuIpozAH3ae9lyfFQSO.pdf', 7, '2026-01-23 19:57:25', '2026-03-27 04:48:51'),
(8, 'MAYRA GUTIÉRREZ', 'Magister', 'COOR. DE INVESTIGACIÓN', NULL, 'teachers/P6IDjYMGIG6sD872q7hLLxVQvy1PP4gPW93vwlGI.jpg', 'teachers_pdf/O0RnU71ZudTI4Vlq1p4Tx6U6OqWBk2HADZz2RYAt.pdf', 3, '2026-01-23 20:37:58', '2026-03-27 03:55:35'),
(9, 'LUIS GUARTASACA', 'Ingeniero', 'VINCULACIÓN CON LA SOCIEDAD', NULL, 'teachers/2cP646xIrmN5Q71QhoeiUiVKFa0B7UIV8mBK59Lr.jpg', 'teachers_pdf/vBjivjtOi3LKQnaf96TJ30QuqgsYJGirkg3DEBvQ.pdf', 2, '2026-01-23 22:04:42', '2026-03-27 03:50:41'),
(10, 'RONNAL ORTIZ', 'Ingeniero', 'DOCENTE', NULL, 'teachers/elVFFui50tutctVW9LUe5Z07dXeI33ZCL1Ad3siO.jpg', 'teachers_pdf/1naSrxmqHw36D0SKgqoEhdAPqkgkThs2EkTlPtNv.pdf', 10, '2026-01-29 07:11:20', '2026-02-05 03:41:51'),
(11, 'DIANA GUARTASACA', 'Magister', 'DOCENTE', NULL, 'teachers/3Uc13c44Bc7KzMi7PXkPJBhjhxWzMrDTv6DKUrNt.jpg', 'teachers_pdf/GIoD5u3E69cUui3tP6zAT3ItOn9vABSaEfWBv7da.pdf', 8, '2026-02-05 03:34:26', '2026-03-27 04:50:04'),
(12, 'SILVIA AUCAY', 'Economista', 'DOCENTE', NULL, 'teachers/lb3D2DzNFeUdDLaP2JCJKYT57ecGYYZM8rge7NO0.jpg', 'teachers_pdf/t0iKMtk5XnKG2D2jpbZM3PwS8d46yEG2ZoHttPlW.pdf', 8, '2026-02-05 03:41:25', '2026-03-27 04:53:55'),
(13, 'EDIDH JARA', 'Magister', 'DOCENTE', NULL, 'teachers/kVFewgHD9ILvCNk6MTRr1dEEQSHRjrjufBBln1Sg.jpg', 'teachers_pdf/oqcJX0SRMwWxIxFd0IW988GoPFlJ9rJyD7fqx3nb.pdf', 8, '2026-02-05 03:43:03', '2026-03-27 05:09:24'),
(14, 'JUAN CARLOS RIVADENEIRA', 'Magister', 'DOCENTE', NULL, 'teachers/r47Hv1v7TiW5GHIc5IWSJYpjIzqZ60Zee8cKX1FR.jpg', 'teachers_pdf/73swI5PiqPzIUiTnzWHXVKi5SM1x5pC1MPj2SErB.pdf', 9, '2026-02-05 03:44:19', '2026-03-27 06:19:34'),
(15, 'JESSICA REYES', 'Magister', 'DOCENTE', NULL, 'teachers/ChJ15oyAlaf1p8L3qdSixtN5ypxppYg4K5m58CLJ.jpg', 'teachers_pdf/VDBwz03RWaw7SYt1tfY1FRMLJJo9vcsxZOzksomd.pdf', 8, '2026-02-05 03:47:46', '2026-03-27 06:11:38'),
(16, 'ANITA CAGUANA', 'Magister', 'DOCENTE', NULL, 'teachers/wetYnruWIezSfMUVtqeAorgRU2b1zlI29LQ0bb4a.jpg', 'teachers_pdf/fejlrpx9rB4HcdMLITW1YZiOxXpfVXuA9XB65RGz.pdf', 8, '2026-02-05 03:49:22', '2026-03-31 04:22:46'),
(17, 'DIEGO AUCAY', 'Magister', 'DOCENTE', NULL, 'teachers/BInN2tTO0Su7Nda4sYOUu9UbKVwaz6R7jT9hX6l4.jpg', 'teachers_pdf/nYQ1BuH4fMILO1leZiWxR2wXjMeUVJ2SU5am4ZYm.pdf', 8, '2026-02-05 03:51:02', '2026-03-27 06:14:30'),
(18, 'FERNANDO CHALA', 'Magister', 'DOCENTE', NULL, 'teachers/5KtZJzj1KDOShHg8JG6YNQf1iCb6YkvownAlhOnw.jpg', NULL, 8, '2026-02-05 04:32:27', '2026-02-05 04:55:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timeline_events`
--

CREATE TABLE `timeline_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_public` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `updates`
--

CREATE TABLE `updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `link_text` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'comunicacion@istsucua.edu.ec', 'admin', 'active', NULL, '$2y$10$Vf63SRiiQQafY/IImVrW0eoL82V7y53a054c7BUNq1NCzLCqA5BrW', 'hWS8OkTRAmMmDyBk0sR3y8A55IkkAG2eJNDOcMrVd6W1LYflb048sespSEeR', '2025-12-10 23:36:57', '2026-01-17 01:34:32'),
(2, 'Editor', 'editor@example.com', 'editor', 'inactive', NULL, '$2y$10$0KSfC8Vr9NlO2Zzrh3UqxerB27n49iJT6G2PdyFzbju..7/klVcL.', NULL, '2025-12-10 23:36:57', '2025-12-16 06:26:32'),
(3, 'Test User', 'user@example.com', 'user', 'inactive', NULL, '$2y$10$/kX5srHyeniaM.cDvxAwROucpWUFlVF7igOkEFuPm.9FfIXfAdTJ.', NULL, '2025-12-10 23:36:57', '2025-12-16 06:26:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visit_sections`
--

CREATE TABLE `visit_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `mission` text DEFAULT NULL,
  `functions` text DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `visit_sections`
--

INSERT INTO `visit_sections` (`id`, `title`, `slug`, `mission`, `functions`, `schedule`, `location`, `phone`, `email`, `additional_info`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Secretaria General', 'secretaria-general', NULL, '[\"Gesti\\u00f3n y custodia de documentos institucionales\"]', 'Lunes a Viernes, 14:00PM - 22:00PM', 'Edificio Administrativo, Primer Piso', '(07) 2740-421', 'secretaria@istsucua.edu.ec', NULL, 0, 1, '2025-12-16 18:29:44', '2025-12-16 18:29:44'),
(2, 'Centro de Idiomas', 'centro-de-idiomas', 'El Centro de Idiomas es la unidad académica responsable de gestionar, enseñar y certificar competencias lingüísticas en lenguas extranjeras y nativas. Su propósito fundamental es eliminar las barreras de comunicación en la comunidad universitaria, dotando a los estudiantes de herramientas interculturales que les permitan acceder a mejores oportunidades laborales, becas internacionales y redes de investigación global.', '[]', NULL, NULL, NULL, NULL, NULL, 1, 1, '2026-02-08 04:59:30', '2026-02-08 05:04:50'),
(3, 'Talento Humano', 'talento-humano', NULL, '[]', NULL, NULL, NULL, NULL, NULL, 2, 1, '2026-02-08 06:50:16', '2026-02-08 06:50:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `academic_calendar_events`
--
ALTER TABLE `academic_calendar_events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `academic_modalities`
--
ALTER TABLE `academic_modalities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `academic_programs`
--
ALTER TABLE `academic_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_programs_academic_modality_id_foreign` (`academic_modality_id`);

--
-- Indices de la tabla `academic_sections`
--
ALTER TABLE `academic_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academic_sections_slug_unique` (`slug`);

--
-- Indices de la tabla `autoridades`
--
ALTER TABLE `autoridades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `autoridades_slug_unique` (`slug`);

--
-- Indices de la tabla `campus_items`
--
ALTER TABLE `campus_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `campus_item_contents`
--
ALTER TABLE `campus_item_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campus_item_contents_campus_item_id_foreign` (`campus_item_id`);

--
-- Indices de la tabla `campus_item_form_submissions`
--
ALTER TABLE `campus_item_form_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campus_item_form_submissions_campus_item_content_id_foreign` (`campus_item_content_id`);

--
-- Indices de la tabla `campus_item_images`
--
ALTER TABLE `campus_item_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campus_item_images_campus_item_id_foreign` (`campus_item_id`);

--
-- Indices de la tabla `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `careers_slug_unique` (`slug`),
  ADD KEY `careers_academic_section_id_foreign` (`academic_section_id`);

--
-- Indices de la tabla `chatbot_contacts`
--
ALTER TABLE `chatbot_contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chatbot_contacts_telefono_unique` (`telefono`);

--
-- Indices de la tabla `chatbot_settings`
--
ALTER TABLE `chatbot_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_session_id_index` (`session_id`);

--
-- Indices de la tabla `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contents_slug_unique` (`slug`),
  ADD KEY `contents_parent_id_foreign` (`parent_id`);

--
-- Indices de la tabla `content_images`
--
ALTER TABLE `content_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_images_content_id_foreign` (`content_id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `event_files`
--
ALTER TABLE `event_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_files_event_id_foreign` (`event_id`);

--
-- Indices de la tabla `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_images_event_id_foreign` (`event_id`);

--
-- Indices de la tabla `event_links`
--
ALTER TABLE `event_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_links_event_id_foreign` (`event_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `hero_slides`
--
ALTER TABLE `hero_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscripciones_modalidad_id_foreign` (`modalidad_id`),
  ADD KEY `inscripciones_programa_id_foreign` (`programa_id`);

--
-- Indices de la tabla `leadership_teams`
--
ALTER TABLE `leadership_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indices de la tabla `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_parent_id_foreign` (`parent_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`),
  ADD KEY `news_author_id_foreign` (`author_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `popups`
--
ALTER TABLE `popups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `q_a_s`
--
ALTER TABLE `q_a_s`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rectors`
--
ALTER TABLE `rectors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indices de la tabla `site_stats`
--
ALTER TABLE `site_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `timeline_events`
--
ALTER TABLE `timeline_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timeline_events_year_index` (`year`),
  ADD KEY `timeline_events_order_index` (`order`);

--
-- Indices de la tabla `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `visit_sections`
--
ALTER TABLE `visit_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visit_sections_slug_unique` (`slug`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `academic_calendar_events`
--
ALTER TABLE `academic_calendar_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `academic_modalities`
--
ALTER TABLE `academic_modalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `academic_programs`
--
ALTER TABLE `academic_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `academic_sections`
--
ALTER TABLE `academic_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autoridades`
--
ALTER TABLE `autoridades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `campus_items`
--
ALTER TABLE `campus_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `campus_item_contents`
--
ALTER TABLE `campus_item_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `campus_item_form_submissions`
--
ALTER TABLE `campus_item_form_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `campus_item_images`
--
ALTER TABLE `campus_item_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `chatbot_contacts`
--
ALTER TABLE `chatbot_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `chatbot_settings`
--
ALTER TABLE `chatbot_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `content_images`
--
ALTER TABLE `content_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `event_files`
--
ALTER TABLE `event_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `event_links`
--
ALTER TABLE `event_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hero_slides`
--
ALTER TABLE `hero_slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `leadership_teams`
--
ALTER TABLE `leadership_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `popups`
--
ALTER TABLE `popups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `q_a_s`
--
ALTER TABLE `q_a_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rectors`
--
ALTER TABLE `rectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `site_stats`
--
ALTER TABLE `site_stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `timeline_events`
--
ALTER TABLE `timeline_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `updates`
--
ALTER TABLE `updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `visit_sections`
--
ALTER TABLE `visit_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `academic_programs`
--
ALTER TABLE `academic_programs`
  ADD CONSTRAINT `academic_programs_academic_modality_id_foreign` FOREIGN KEY (`academic_modality_id`) REFERENCES `academic_modalities` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `campus_item_contents`
--
ALTER TABLE `campus_item_contents`
  ADD CONSTRAINT `campus_item_contents_campus_item_id_foreign` FOREIGN KEY (`campus_item_id`) REFERENCES `campus_items` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `campus_item_form_submissions`
--
ALTER TABLE `campus_item_form_submissions`
  ADD CONSTRAINT `campus_item_form_submissions_campus_item_content_id_foreign` FOREIGN KEY (`campus_item_content_id`) REFERENCES `campus_item_contents` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `campus_item_images`
--
ALTER TABLE `campus_item_images`
  ADD CONSTRAINT `campus_item_images_campus_item_id_foreign` FOREIGN KEY (`campus_item_id`) REFERENCES `campus_items` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `careers`
--
ALTER TABLE `careers`
  ADD CONSTRAINT `careers_academic_section_id_foreign` FOREIGN KEY (`academic_section_id`) REFERENCES `academic_sections` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `content_images`
--
ALTER TABLE `content_images`
  ADD CONSTRAINT `content_images_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `event_files`
--
ALTER TABLE `event_files`
  ADD CONSTRAINT `event_files_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `event_images`
--
ALTER TABLE `event_images`
  ADD CONSTRAINT `event_images_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `event_links`
--
ALTER TABLE `event_links`
  ADD CONSTRAINT `event_links_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_modalidad_id_foreign` FOREIGN KEY (`modalidad_id`) REFERENCES `academic_modalities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscripciones_programa_id_foreign` FOREIGN KEY (`programa_id`) REFERENCES `academic_programs` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
