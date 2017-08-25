-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33060
-- Tiempo de generación: 26-08-2017 a las 00:38:16
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calificaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `asig_id` int(11) NOT NULL,
  `asig_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `asig_curso` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`asig_id`, `asig_nombre`, `asig_curso`) VALUES
(1, 'Computación', '2016B'),
(2, 'Computación', '2017A'),
(3, 'Estructuras de datos', '2016B'),
(4, 'Estructuras de datos', '2017B'),
(5, 'Asignatura sin estudiantes', '2017A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asig_prof`
--

CREATE TABLE `asig_prof` (
  `ap_asig_id` int(11) NOT NULL,
  `ap_prof_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asig_prof`
--

INSERT INTO `asig_prof` (`ap_asig_id`, `ap_prof_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `asig_prof_text`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `asig_prof_text` (
`ap_asig_id` int(11)
,`ap_prof_id` int(11)
,`asig_id` int(11)
,`asig_nombre` varchar(100)
,`asig_curso` varchar(5)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `ejer_asig_id` int(11) NOT NULL,
  `ejer_numero` int(11) NOT NULL,
  `ejer_descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`ejer_asig_id`, `ejer_numero`, `ejer_descripcion`) VALUES
(1, 1, 'Examen final'),
(3, 1, 'Práctica de HTML'),
(3, 2, 'Práctica de CSS para que los estudiantes demuestren su conocimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `est_id` int(11) NOT NULL,
  `est_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `est_apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `est_asignatura` int(11) NOT NULL,
  `est_fechanac` date NOT NULL,
  `est_sexo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `est_direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `est_email` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`est_id`, `est_nombre`, `est_apellidos`, `est_asignatura`, `est_fechanac`, `est_sexo`, `est_direccion`, `est_email`) VALUES
(1, 'Pepito', 'de los Palotes', 2, '1990-03-10', 'H', 'Avda. de la República y Amazona, N34-121', ''),
(2, 'El gran Pitufo', 'Trump', 3, '1988-01-22', 'H', 'Avda. Amazonas y Naciones Unidas\r\nQuito, Ecuador', 'donald@whitehouse.com'),
(3, 'María Asunción', 'Hallo Carrasco', 3, '1993-03-02', 'M', 'Quito', 'maria@ua.es'),
(4, 'José', 'González', 1, '1995-02-01', 'H', 'Plaza Grande, Quito', 'jose@epn.edu.ec'),
(5, 'Mariano', 'Rajoy', 3, '1992-09-30', 'H', 'Guayaquil, Guayas, Ecuador', 'mariano@ua.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `nota_asig_id` int(11) NOT NULL,
  `nota_ejer_numero` int(11) NOT NULL,
  `nota_est_id` int(11) NOT NULL,
  `nota_valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`nota_asig_id`, `nota_ejer_numero`, `nota_est_id`, `nota_valor`) VALUES
(3, 1, 3, 7),
(3, 1, 5, 2),
(3, 2, 3, 9),
(3, 2, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `prof_id` int(11) NOT NULL,
  `prof_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `prof_apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `prof_email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `prof_contrasena` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`prof_id`, `prof_nombre`, `prof_apellidos`, `prof_email`, `prof_contrasena`) VALUES
(1, 'Sergio', 'Luján Mora', 'sergio', '1234'),
(2, 'María', 'Hallo', 'maria@epn.edu.ec', '0000');

-- --------------------------------------------------------

--
-- Estructura para la vista `asig_prof_text`
--
DROP TABLE IF EXISTS `asig_prof_text`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `asig_prof_text`  AS  select `asig_prof`.`ap_asig_id` AS `ap_asig_id`,`asig_prof`.`ap_prof_id` AS `ap_prof_id`,`asignaturas`.`asig_id` AS `asig_id`,`asignaturas`.`asig_nombre` AS `asig_nombre`,`asignaturas`.`asig_curso` AS `asig_curso` from (`asig_prof` join `asignaturas`) where (`asig_prof`.`ap_asig_id` = `asignaturas`.`asig_id`) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`asig_id`);

--
-- Indices de la tabla `asig_prof`
--
ALTER TABLE `asig_prof`
  ADD PRIMARY KEY (`ap_asig_id`,`ap_prof_id`),
  ADD KEY `ap_prof_id` (`ap_prof_id`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`ejer_asig_id`,`ejer_numero`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`est_id`),
  ADD KEY `est_asignatura` (`est_asignatura`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`nota_asig_id`,`nota_ejer_numero`,`nota_est_id`),
  ADD KEY `notas_ibfk_2` (`nota_est_id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`prof_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `asig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `prof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asig_prof`
--
ALTER TABLE `asig_prof`
  ADD CONSTRAINT `asig_prof_ibfk_1` FOREIGN KEY (`ap_asig_id`) REFERENCES `asignaturas` (`asig_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asig_prof_ibfk_2` FOREIGN KEY (`ap_prof_id`) REFERENCES `profesores` (`prof_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD CONSTRAINT `ejercicios_ibfk_1` FOREIGN KEY (`ejer_asig_id`) REFERENCES `asignaturas` (`asig_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`est_asignatura`) REFERENCES `asignaturas` (`asig_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`nota_asig_id`,`nota_ejer_numero`) REFERENCES `ejercicios` (`ejer_asig_id`, `ejer_numero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`nota_est_id`) REFERENCES `estudiantes` (`est_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
