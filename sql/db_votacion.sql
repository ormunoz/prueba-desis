-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2023 a las 05:53:52
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_votacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidato`
--

CREATE TABLE `candidato` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `candidato`
--

INSERT INTO `candidato` (`id`, `name`) VALUES
(1, 'candidato 1'),
(2, 'candidato 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id`, `nombre`, `region_id`) VALUES
(1, 'Arica', 15),
(2, 'Camarones', 15),
(3, 'Putre', 15),
(4, 'General Lagos', 15),
(5, 'Alto Hospicio', 1),
(6, 'Pozo Almonte', 1),
(7, 'Camiña', 1),
(8, 'Huara', 1),
(9, 'Iquique', 1),
(10, 'Mejillones', 2),
(11, 'Sierra Gorda', 2),
(12, 'Taltal', 2),
(13, 'Calama', 2),
(14, 'Ollagüe', 2),
(15, 'San Pedro de Atacama', 2),
(16, 'Antofagasta', 2),
(17, 'Mejillones', 2),
(18, 'Sierra Gorda', 2),
(19, 'Taltal', 2),
(20, 'Calama', 2),
(21, 'Ollagüe', 2),
(22, 'San Pedro de Atacama', 2),
(23, 'Copiapó', 3),
(24, 'Caldera', 3),
(25, 'Tierra Amarilla', 3),
(26, 'Chañaral', 3),
(27, 'Diego de Almagro', 3),
(28, 'Vallenar', 3),
(29, 'Alto del Carmen', 3),
(30, 'Freirina', 3),
(31, 'La Serena', 4),
(32, 'Coquimbo', 4),
(33, 'Andacollo', 4),
(34, 'La Higuera', 4),
(35, 'Vicuña', 4),
(36, 'Paihuano', 4),
(37, 'Ovalle', 4),
(38, 'Combarbalá', 4),
(39, 'Valparaíso', 5),
(40, 'Viña del Mar', 5),
(41, 'Concón', 5),
(42, 'Quilpué', 5),
(43, 'Villa Alemana', 5),
(44, 'Quillota', 5),
(45, 'La Calera', 5),
(46, 'La Cruz', 5),
(47, 'Santiago', 13),
(48, 'Independencia', 13),
(49, 'Providencia', 13),
(50, 'Las Condes', 13),
(51, 'Vitacura', 13),
(52, 'Lo Barnechea', 13),
(53, 'Peñalolén', 13),
(54, 'La Reina', 13),
(55, 'Rancagua', 6),
(56, 'Machalí', 6),
(57, 'Codegua', 6),
(58, 'Graneros', 6),
(59, 'Doñihue', 6),
(60, 'Mostazal', 6),
(61, 'Rengo', 6),
(62, 'Requínoa', 6),
(63, 'Talca', 7),
(64, 'San Clemente', 7),
(65, 'Pelarco', 7),
(66, 'Maule', 7),
(67, 'Pencahue', 7),
(68, 'San Rafael', 7),
(69, 'Cauquenes', 7),
(70, 'Chanco', 7),
(71, 'Chillán', 16),
(72, 'Chillán Viejo', 16),
(73, 'Pemuco', 16),
(74, 'Yungay', 16),
(75, 'Quirihue', 16),
(76, 'Ninhue', 16),
(77, 'San Carlos', 16),
(78, 'San Fabián', 16),
(79, 'Concepción', 8),
(80, 'Coronel', 8),
(81, 'Chiguayante', 8),
(82, 'Penco', 8),
(83, 'Talcahuano', 8),
(84, 'Hualpén', 8),
(85, 'San Pedro de la Paz', 8),
(86, 'Santa Juana', 8),
(87, 'Temuco', 9),
(88, 'Padre Las Casas', 9),
(89, 'Freire', 9),
(90, 'Pitrufquén', 9),
(91, 'Villarrica', 9),
(92, 'Pucón', 9),
(93, 'Cunco', 9),
(94, 'Melipeuco', 9),
(95, 'Valdivia', 14),
(96, 'Corral', 14),
(97, 'Máfil', 14),
(98, 'Mariquina', 14),
(99, 'Lanco', 14),
(100, 'Los Lagos', 14),
(101, 'Paillaco', 14),
(102, 'La Unión', 14),
(103, 'Puerto Montt', 10),
(104, 'Puerto Varas', 10),
(105, 'Calbuco', 10),
(106, 'Maullín', 10),
(107, 'Los Muermos', 10),
(108, 'Fresia', 10),
(109, 'Llanquihue', 10),
(110, 'Cochamó', 10),
(111, 'Coyhaique', 11),
(112, 'Lago Verde', 11),
(113, 'Aysén', 11),
(114, 'Cisnes', 11),
(115, 'Guaitecas', 11),
(116, 'Cochrane', 11),
(117, 'O Higgins', 11),
(118, 'Tortel', 11),
(119, 'Punta Arenas', 12),
(120, 'Laguna Blanca', 12),
(121, 'Río Verde', 12),
(122, 'San Gregorio', 12),
(123, 'Cabo de Hornos', 12),
(124, 'Antártica', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id`, `description`) VALUES
(1, 'Web'),
(2, 'TV'),
(3, 'Redes Sociales'),
(4, 'Amigos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id`, `nombre`) VALUES
(1, 'Tarapacá'),
(2, 'Antofagasta'),
(3, 'Atacama'),
(4, 'Coquimbo'),
(5, 'Valparaíso'),
(6, 'O\'Higgins'),
(7, 'Maule'),
(8, 'Biobío'),
(9, 'La Araucanía'),
(10, 'Los Lagos'),
(11, 'Aysén del General Carlos Ibáñez del Campo'),
(12, 'Magallanes y de la Antártica Chilena'),
(13, 'Metropolitana de Santiago'),
(14, 'Los Ríos'),
(15, 'Arica y Parinacota'),
(16, 'Ñuble');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votante`
--

CREATE TABLE `votante` (
  `id` int(11) NOT NULL,
  `nombre_apellido` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `rut` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comuna_id` int(11) NOT NULL,
  `candidato_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votante_encuesta`
--

CREATE TABLE `votante_encuesta` (
  `id` int(11) NOT NULL,
  `votante_id` int(11) NOT NULL,
  `encuesta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `votante`
--
ALTER TABLE `votante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rut` (`rut`),
  ADD KEY `comuna_id` (`comuna_id`),
  ADD KEY `canditato_id` (`candidato_id`);

--
-- Indices de la tabla `votante_encuesta`
--
ALTER TABLE `votante_encuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votante_id` (`votante_id`),
  ADD KEY `encuesta_id` (`encuesta_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `votante`
--
ALTER TABLE `votante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `votante_encuesta`
--
ALTER TABLE `votante_encuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `comuna_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `votante`
--
ALTER TABLE `votante`
  ADD CONSTRAINT `votante_ibfk_1` FOREIGN KEY (`comuna_id`) REFERENCES `comuna` (`id`),
  ADD CONSTRAINT `votante_ibfk_2` FOREIGN KEY (`candidato_id`) REFERENCES `candidato` (`id`);

--
-- Filtros para la tabla `votante_encuesta`
--
ALTER TABLE `votante_encuesta`
  ADD CONSTRAINT `votante_encuesta_ibfk_1` FOREIGN KEY (`votante_id`) REFERENCES `votante` (`id`),
  ADD CONSTRAINT `votante_encuesta_ibfk_2` FOREIGN KEY (`encuesta_id`) REFERENCES `encuesta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
