-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2020 a las 18:39:33
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
-- Base de datos: `fiestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariocliente`
--

CREATE TABLE `comentariocliente` (
  `calificacionSalon` int(11) DEFAULT NULL,
  `comentarioCliente` varchar(254) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idSalon` int(12) NOT NULL,
  `idComentario` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentariocliente`
--

INSERT INTO `comentariocliente` (`calificacionSalon`, `comentarioCliente`, `idUsuario`, `idSalon`, `idComentario`) VALUES
(10, 'Muy buena atencion, me gusto mucho la comida en general. ', 20, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiesta`
--

CREATE TABLE `fiesta` (
  `fechaFiesta` date DEFAULT NULL,
  `numeroInvitados` char(3) DEFAULT NULL,
  `tipoFiesta` varchar(10) DEFAULT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaSalida` time DEFAULT NULL,
  `idEvento` int(11) NOT NULL,
  `idSalon` int(11) DEFAULT NULL,
  `idUsuario` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fiesta`
--

INSERT INTO `fiesta` (`fechaFiesta`, `numeroInvitados`, `tipoFiesta`, `horaInicio`, `horaSalida`, `idEvento`, `idSalon`, `idUsuario`) VALUES
('2020-05-13', '97', 'boda', '12:00:00', '17:00:00', 4, 1, 18),
('2020-05-28', '66', 'XV años', '13:00:00', '00:00:00', 8, 3, 20),
('2020-06-17', '78', 'XV años', '12:09:00', '00:00:00', 9, 3, 22),
('2020-05-09', '1', 'XV años', '05:00:00', '06:00:00', 12, 3, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotossalon`
--

CREATE TABLE `fotossalon` (
  `idImagen` int(11) NOT NULL,
  `idSalon` int(11) DEFAULT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `img` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `nombreSalon` varchar(64) DEFAULT NULL,
  `direccion` varchar(64) DEFAULT NULL,
  `capacidad` char(3) DEFAULT NULL,
  `idSalon` int(11) NOT NULL,
  `descripcionSalon` varchar(254) NOT NULL,
  `idUsuario` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`nombreSalon`, `direccion`, `capacidad`, `idSalon`, `descripcionSalon`, `idUsuario`) VALUES
('Salon las bugambilias', 'De los pinos #44', '300', 1, 'El salon de las bugambilias es un salón destinado a la convivencia de la familia, ofrece diferentes servicios así como la comodidad de las personas.\r\n', 21),
('Flypper', 'Los pinos', '700', 3, 'Flypper ofrece diferentes servicios de fiestas, banquetes, etc. ', 21),
('Jardin las delicias', 'Toluca Estado de México', '700', 4, 'Salon dedicado a la convivencia familiar. ', 24),
('Salon daniels', 'GOBERNADORES 695, LA PROVIDENCIA , METEPEC , MEX , C.P.52177', '500', 5, 'Tenemos más de 10 años de trayectoria y experiencia organizando eventos sociales. Somos uno de los mejores salones de fiestas en Metepec, pues además brindamos servicios integrales para garantizar que su celebración sea un éxito.\r\n\r\nEn Daniels Salón de F', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(50) DEFAULT NULL,
  `tipoUsuario` varchar(12) DEFAULT NULL,
  `contraseña` varchar(64) DEFAULT NULL,
  `idUsuario` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email`, `tipoUsuario`, `contraseña`, `idUsuario`) VALUES
('clarovideo@hotmail.com', 'Dueño', '$2y$10$oA2rLBPaImCpeQEaIbdbEeyniuByJto48In/Vdk/A6ubdh3nMfwD6', 18),
('zzzozzoz@lol.net', 'Anfitrion', '$2y$10$UXwOjyhh0Cf/v1DwMvI2DeRNdozlr1.o7fqF2DCOa6dgmjqrK7Cf.', 19),
('laurajimenez@gimail.com', 'Anfitrion', '$2y$10$aC/iRnJ3xoD/K7ASSqijUemnGsOSiR2HWIfg7MM4q0qNR6BPH3LTS', 20),
('diazdaniel422@gmail.com', 'Dueño', '$2y$10$.qn6Zfu3g1j6OL8hZPdfFO7YMfqg5lruAmw0.YHqH.ihhOE8CrkNu', 21),
('100dlres@jotmail.com', 'Anfitrion', '$2y$10$tUA.BLEBFPsa7pfW4hyN5uL0YoomAcNNxp8SEUVzjP4Japvdii7qK', 22),
('weirdos@aol.com', 'Anfitrion', '$2y$10$V3P7CbP7YI21ME5/YZDZf.LbZmsUbJMKSOEss9pKSmODeKM26nUPK', 23),
('zorra@whore.com', 'Dueño', '$2y$10$u5qe4kg5oPatpjRCXO9.UOF/43gEvCHHry9nF83kQp8EVinFPGVX.', 24);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentariocliente`
--
ALTER TABLE `comentariocliente`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idSalon` (`idSalon`);

--
-- Indices de la tabla `fiesta`
--
ALTER TABLE `fiesta`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idSalon` (`idSalon`);

--
-- Indices de la tabla `fotossalon`
--
ALTER TABLE `fotossalon`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `idSalon` (`idSalon`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`idSalon`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentariocliente`
--
ALTER TABLE `comentariocliente`
  MODIFY `idComentario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fiesta`
--
ALTER TABLE `fiesta`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `fotossalon`
--
ALTER TABLE `fotossalon`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salon`
--
ALTER TABLE `salon`
  MODIFY `idSalon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentariocliente`
--
ALTER TABLE `comentariocliente`
  ADD CONSTRAINT `comentariocliente_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `comentariocliente_ibfk_2` FOREIGN KEY (`idSalon`) REFERENCES `salon` (`idSalon`);

--
-- Filtros para la tabla `fiesta`
--
ALTER TABLE `fiesta`
  ADD CONSTRAINT `fiesta_ibfk_1` FOREIGN KEY (`idSalon`) REFERENCES `salon` (`idSalon`),
  ADD CONSTRAINT `fiesta_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fiesta_ibfk_3` FOREIGN KEY (`idSalon`) REFERENCES `salon` (`idSalon`);

--
-- Filtros para la tabla `fotossalon`
--
ALTER TABLE `fotossalon`
  ADD CONSTRAINT `fotossalon_ibfk_1` FOREIGN KEY (`idSalon`) REFERENCES `salon` (`idSalon`);

--
-- Filtros para la tabla `salon`
--
ALTER TABLE `salon`
  ADD CONSTRAINT `salon_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
