-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2020 a las 16:29:51
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'aretes'),
(2, 'pulseras'),
(3, 'bicicletas'),
(4, 'camisas'),
(5, 'pantalones'),
(6, 'bolsas'),
(7, 'zapatos'),
(8, 'tenis'),
(9, 'coches'),
(10, 'motos'),
(11, 'estufas'),
(12, 'libros'),
(13, 'bocinas'),
(14, 'carteras'),
(15, 'cinturones'),
(16, 'arte'),
(17, 'otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `nombre_imagen` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `nombre_imagen`, `id_usuario`) VALUES
(8, 'enrique.jpg', 25),
(9, 'luisa.jpg', 26),
(10, 'jesica.jpg', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id_publicacion` int(11) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `precio` float NOT NULL,
  `fecha_actual` date DEFAULT NULL,
  `imagen` varchar(500) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id_publicacion`, `nombre_producto`, `descripcion`, `precio`, `fecha_actual`, `imagen`, `id_categoria`, `id_usuario`) VALUES
(44, 'camisa', 'camisa de vestir azul marca boga con 6 botones seminueva', 400, '2020-07-05', 'camisa.jpg', 4, 25),
(45, 'anillo', 'anillo de oro de 14 kilates nuevo en buen estado', 3000, '2020-07-05', 'aretes_oro.jpg', 17, 26),
(46, 'refrigerador', 'refrigerador en buen estado  , 1 año de uso sin ninguna reparacion ni haberia', 2500, '2020-07-05', 'refrigerador.jpg', 17, 27),
(47, 'camisa de vestir rosa ', 'talla grande , marca boga , somos distruibuidores', 650, '2020-07-05', 'camisa_rosa.jpg', 4, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(25) DEFAULT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `municipio` varchar(25) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(150) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `clave` varchar(5) DEFAULT NULL,
  `correo` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido`, `edad`, `estado`, `municipio`, `usuario`, `contrasenia`, `telefono`, `clave`, `correo`) VALUES
(25, 'enrique', 'ovalle', 20, 'mexico', 'chapultepec', 'enrique123', '$2y$04$HWQ1H1Ywrgjnwzlkg5AU8.JZnwZuX2Nt4Ohr60lB/DBw779uNufxO', '72723645', 'ipl', 'correo@correo.com'),
(26, 'maria', 'peres', 21, 'Michoacana', 'Metepec', 'maria', '$2y$04$RJ.NNr/bpCyNJhae9pLgPeCHy0HTFXIneOylB7rFkL1X7eikkEB/O', '722271127', 'ipq', 'correo@correo.com'),
(27, 'angelica', 'gonzalez', 23, 'estado de mexico', 'Toluca', 'angelica Gonz', '$2y$04$DGEr5noZGF4cgu79GhDz/eipiJHkCa3HMFoCpJPDIzfD1E93j8ES.', '7222382387', 'ipq', 'correo@correo.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD UNIQUE KEY `imagen` (`imagen`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `publicacion_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
