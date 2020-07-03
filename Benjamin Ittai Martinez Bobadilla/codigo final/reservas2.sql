-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2020 a las 05:39:36
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `id_habitacion`, `fecha_ingreso`, `fecha_salida`) VALUES
(1, 1, '2019-05-29 18:00:00', '2019-05-29 19:00:00'),
(2, 2, '2019-05-29 18:00:00', '2019-05-29 19:00:00'),
(3, 3, '2019-05-29 18:00:00', '2019-05-29 19:00:00'),
(4, 4, '2019-04-29 18:00:00', '2019-04-29 19:00:00'),
(5, 5, '2019-05-29 18:00:00', '2019-05-29 19:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `img`, `fecha`) VALUES
(1, 'vistas/img/banner/banner01.jpg', '2020-06-21 18:18:09'),
(2, 'vistas/img/banner/banner02.jpg', '2020-06-21 18:18:18'),
(3, 'vistas/img/banner/banner03.jpg', '2020-06-21 18:18:31'),
(4, 'vistas/img/banner/banner04.jpg', '2020-06-21 18:18:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `color` text NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `incluye` text NOT NULL,
  `continental_alta` float NOT NULL,
  `continental_baja` float NOT NULL,
  `americano_alta` float NOT NULL,
  `americano_baja` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `ruta`, `color`, `tipo`, `img`, `descripcion`, `incluye`, `continental_alta`, `continental_baja`, `americano_alta`, `americano_baja`, `fecha`) VALUES
(1, 'habitacion-tipo-suite', '#847059', 'Negro', 'vistas/img/suite/portada.jpg', 'Lorem ipsum dolor sit amet', '[ { \"item\": \"1 TATTO\", \"icono\": \"far fa-image\"}, { \"item\": \"1 KIT DE RECUPERACIÓN\", \"icono\": \"fas fa-briefcase-medical\"}]', 2000, 1200, 420000, 200, '2020-06-24 23:22:06'),
(2, 'habitacion-tipo-especial', '#197DB1', 'Blanco y negro', 'vistas/img/especial/portada.png', 'Lorem ipsum dolor sit amet', '[ { \"item\": \"1 TATTO\", \"icono\": \"far fa-image\"}, { \"item\": \"1 KIT DE RECUPERACIÓN\", \"icono\": \"fas fa-briefcase-medical\"}]', 2500, 1600, 380000, 350, '2020-06-24 23:22:13'),
(3, 'habitacion-tipo-standar', '#2F7D84', 'cromatico', 'vistas/img/standar/portada.png', 'Lorem ipsum dolor sit amet', '[ { \"item\": \"1 TATTO\", \"icono\": \"far fa-image\"}, { \"item\": \"1 KIT DE RECUPERACIÓN\", \"icono\": \"fas fa-briefcase-medical\"}]', 3000, 2000, 350000, 450, '2020-06-24 23:22:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id_h` int(11) NOT NULL,
  `tipo_h` int(11) NOT NULL,
  `estilo` text NOT NULL,
  `galeria` text NOT NULL,
  `video` text NOT NULL,
  `recorrido_virtual` text NOT NULL,
  `descripcion_h` text NOT NULL,
  `fecha_h` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `preciott` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id_h`, `tipo_h`, `estilo`, `galeria`, `video`, `recorrido_virtual`, `descripcion_h`, `fecha_h`, `preciott`) VALUES
(1, 1, 'Mini', '[\"vistas/img/suite/mini1.jpg\", \"vistas/img/suite/mini2.jpg\", \"vistas/img/suite/mini3.jpg\",\"vistas/img/suite/mini4.jpg\"]\r\n', 'Pgs0qT4wbVY', 'vistas/img/suite/mini1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 10 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 21:04:05', 200),
(2, 1, 'Pequeño', '[\"vistas/img/suite/peque1.jpg\", \"vistas/img/suite/peque2.jpg\"]\r\n\r\n\r\n', 'Pgs0qT4wbVY', 'vistas/img/suite/peque1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 15 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:02:04', 300),
(3, 1, 'Mediano', '[\"vistas/img/suite/mediano1.jpg\", \"vistas/img/suite/mediano2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/suite/mediano1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 25 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:03:48', 500),
(4, 1, 'grande', '[\"vistas/img/suite/grande1.jpg\", \"vistas/img/suite/grande2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/suite/grande1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 30 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:04:32', 800),
(5, 1, 'Extra grande', '[\"vistas/img/suite/extragrande1.jpg\", \"vistas/img/suite/extragrande2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/suite/extragrande1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 55 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:29:31', 1150),
(6, 2, 'mini', '[\"vistas/img/especial/mini1.jpg\", \"vistas/img/especial/mini2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/especial/mini1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 10 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:30:05', 350),
(7, 2, 'Pequeña', '[\"vistas/img/especial/peque1.jpg\", \"vistas/img/especial/peque2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/especial/peque2.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 15 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:30:38', 500),
(8, 2, 'Mediana', '[\"vistas/img/especial/mediano1.jpg\", \"vistas/img/especial/mediano2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/especial/mediano1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 25 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:31:19', 750),
(9, 2, 'Grande', '[\"vistas/img/especial/grande1.jpg\", \"vistas/img/especial/grande2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/especial/grande1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 35 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:31:54', 1000),
(10, 2, 'Extra grande', '[\"vistas/img/especial/extragrande1.jpg\", \"vistas/img/especial/extragrande2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/especial/extragrande1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 55 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:32:24', 1300),
(11, 3, 'Mini', '[\"vistas/img/standar/mini1.jpg\", \"vistas/img/standar/mini2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/standar/mini1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 10 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:32:53', 450),
(12, 3, 'Pequeño', '[\"vistas/img/standar/peque1.jpg\", \"vistas/img/standar/peque2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/standar/peque1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 15 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:34:00', 650),
(13, 3, 'Mediano', '[\"vistas/img/standar/mediano1.jpg\", \"vistas/img/standar/mediano2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/standar/mediano1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 25 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:33:28', 950),
(14, 3, 'Grande', '[\"vistas/img/standar/grande1.jpg\", \"vistas/img/standar/grande2.jpg\"]', 'Pgs0qT4wbVY', 'vistas/img/standar/grande1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 35 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:35:43', 1300),
(15, 3, 'Extra grande', '[\"vistas/img/standar/extragrande1.jpg\", \"vistas/img/standar/extragrande2.jpg\"]\r\n', 'Pgs0qT4wbVY', 'vistas/img/standar/extragrande1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>MEDIDA A CUBRIR POR EL TATUAJE</h3>\r\n\r\n					<p><br>\r\n					UN ÁREA DE 55 CENTÍMETROS CUADRADOS <br>\r\n					</p>	\r\n\r\n					\r\n					<p>Hora de entrada  1:00 pm | Hora de salida  3:00 pm</p>', '2020-06-24 22:38:12', 1600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio_alta` float NOT NULL,
  `precio_baja` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `tipo`, `img`, `descripcion`, `precio_alta`, `precio_baja`, `fecha`) VALUES
(1, 'Romántico', 'vistas/img/planes/plan-romantico.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas suscipit quis eligendi voluptatibus dolore libero quasi delectus odit impedit optio eius corporis cumque numquam aliquid repudiandae quisquam dolor explicabo, totam.', 50000, 40000, '2019-04-09 17:07:21'),
(2, 'Amigos', 'vistas/img/planes/paquete-amigos.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat dicta fugiat nihil amet officiis, atque molestiae velit, quod repudiandae asperiores illum accusantium ullam, necessitatibus excepturi inventore, mollitia est vitae impedit.', 60000, 50000, '2020-06-21 21:31:16'),
(3, 'Hasta que el cuerpo aguante', 'vistas/img/planes/hasta-aguante.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt blanditiis nulla expedita nostrum vero. Laborum repudiandae numquam mollitia earum natus ut delectus quas, iste unde doloribus suscipit qui, voluptate perspiciatis.', 40000, 30000, '2020-06-21 21:33:41'),
(4, 'Sección ', 'vistas/img/planes/seccion.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quibusdam magni atque provident, quaerat libero harum possimus. Illum iure magni voluptate, quos amet! Ipsam, sit, sapiente. Cumque est officiis in!', 55000, 45000, '2020-06-21 21:37:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recorrido`
--

CREATE TABLE `recorrido` (
  `id` int(11) NOT NULL,
  `foto_peq` text NOT NULL,
  `foto_grande` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recorrido`
--

INSERT INTO `recorrido` (`id`, `foto_peq`, `foto_grande`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 'vistas/img/recorrido/studioprt.png', 'vistas/img/recorrido/interior1.png', 'LOREM IPSUM', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo velit quis iusto magnam cupiditate dolorum repudiandae tempore cum minus eos a iure, officiis, eius, consequuntur unde nulla, enim quibusdam beatae.', '2020-06-21 21:55:53'),
(2, 'vistas/img/recorrido/studioprt2.png', 'vistas/img/recorrido/interior2.png', 'LOREM IPSUM', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo velit quis iusto magnam cupiditate dolorum repudiandae tempore cum minus eos a iure, officiis, eius, consequuntur unde nulla, enim quibusdam beatae.', '2020-06-21 22:05:48'),
(3, 'vistas/img/recorrido/studioprt3.png', 'vistas/img/recorrido/interior3.png', 'LOREM IPSUM', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo velit quis iusto magnam cupiditate dolorum repudiandae tempore cum minus eos a iure, officiis, eius, consequuntur unde nulla, enim quibusdam beatae.', '2020-06-21 22:12:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pago_reserva` float NOT NULL,
  `numero_transaccion` text NOT NULL,
  `codigo_reserva` text NOT NULL,
  `descripcion_reserva` text NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_habitacion`, `id_usuario`, `pago_reserva`, `numero_transaccion`, `codigo_reserva`, `descripcion_reserva`, `fecha_ingreso`, `fecha_salida`, `fecha_reserva`) VALUES
(8, 1, 12, 900000, '19680828', '6NJS06V8L', '', '2019-05-17', '2019-05-17', '2020-06-26 00:38:50'),
(9, 2, 12, 760000, '19680844', 'M1UHK6R50', '', '2021-05-22', '2021-05-22', '2020-06-26 00:38:43'),
(10, 3, 12, 420000, '19680849', 'YK51N1HAQ', '', '2019-05-30', '2019-05-30', '2020-06-26 00:38:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas2`
--

CREATE TABLE `reservas2` (
  `id` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas2`
--

INSERT INTO `reservas2` (`id`, `id_habitacion`, `fecha_ingreso`, `fecha_salida`) VALUES
(1, 1, '2019-05-03', '2019-05-05'),
(2, 2, '2019-05-02', '2019-05-05'),
(3, 3, '2019-05-03', '2019-05-05'),
(4, 4, '2019-05-05', '2019-05-07'),
(5, 5, '2019-05-03', '2019-05-05'),
(6, 1, '2019-05-06', '2019-05-07'),
(7, 2, '2019-05-06', '2019-05-08'),
(8, 3, '2019-05-05', '2019-05-05'),
(9, 4, '2019-05-08', '2019-05-10'),
(10, 5, '2019-05-06', '2019-05-07'),
(11, 1, '2019-05-09', '2019-05-12'),
(12, 2, '2019-05-09', '2019-05-13'),
(13, 3, '2019-05-05', '2019-05-10'),
(15, 5, '2019-05-07', '2019-05-09'),
(16, 1, '2019-05-16', '2019-05-17'),
(17, 2, '2019-05-15', '2019-05-16'),
(18, 3, '2019-05-19', '2019-05-21'),
(19, 4, '2019-05-18', '2019-05-19'),
(20, 5, '2019-05-11', '2019-05-15'),
(21, 1, '2019-05-26', '2019-05-28'),
(22, 2, '2019-05-26', '2019-05-28'),
(23, 3, '2019-05-26', '2019-05-28'),
(24, 4, '2019-05-26', '2019-05-28'),
(25, 5, '2019-05-26', '2019-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE `restaurante` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `restaurante`
--

INSERT INTO `restaurante` (`id`, `img`, `descripcion`, `fecha`) VALUES
(1, 'vistas/img/galeria/tt1.jpg', 'Lorem ipsum dolor sit amet consectetur', '2020-06-21 22:38:42'),
(2, 'vistas/img/galeria/tt2.jpg', 'Lorem ipsum dolor sit amet consectetur', '2020-06-21 22:39:17'),
(3, 'vistas/img/galeria/tt3.jpg', 'Lorem ipsum dolor sit amet consectetur', '2020-06-21 22:39:35'),
(4, 'vistas/img/galeria/tt4.jpg', 'Lorem ipsum dolor sit amet consectetur', '2020-06-21 22:39:51'),
(5, 'vistas/img/galeria/tt5.jpg', 'Lorem ipsum dolor sit amet consectetur', '2020-06-21 22:40:08'),
(6, 'vistas/img/galeria/tt6.jpg', 'Lorem ipsum dolor sit amet consectetur', '2020-06-21 22:40:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id_testimonio` int(11) NOT NULL,
  `id_res` int(11) NOT NULL,
  `id_us` int(11) NOT NULL,
  `id_hab` int(11) NOT NULL,
  `testimonio` text NOT NULL,
  `aprobado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id_testimonio`, `id_res`, `id_us`, `id_hab`, `testimonio`, `aprobado`, `fecha`) VALUES
(5, 8, 8, 1, 'LINDO', 1, '2020-06-26 00:46:39'),
(6, 9, 8, 2, 'LO ESPERO ', 1, '2020-06-26 00:46:19'),
(7, 10, 8, 3, 'ME ENCANTO ', 1, '2020-06-26 00:45:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_u` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `foto` text NOT NULL,
  `modo` text NOT NULL,
  `verificacion` int(11) NOT NULL,
  `email_encriptado` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_u`, `nombre`, `password`, `email`, `foto`, `modo`, `verificacion`, `email_encriptado`, `fecha`) VALUES
(4, 'Felipe Trujillo', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'felipe@hotmail.com', '', 'directo', 1, '8fe863573a42ae1ec12c4d3c1d591c6d', '2019-05-14 17:16:14'),
(8, 'Juan Fernando Urrego Alvarez', 'null', 'juanustudio@hotmail.com', 'http://graph.facebook.com/10219668435251136/picture?type=large', 'facebook', 1, 'null', '2019-05-14 17:05:28'),
(12, 'benjamin', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'ittaidas@jdj.com', 'vistas/img/usuarios/12/628.png', 'directo', 1, '526319cc2128e04b8e4e4753a3519030', '2020-06-26 01:01:38'),
(13, 'bobi', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'bobi1@hotmail.com', '', 'directo', 1, '7e229273f08f4b80e43c2c4f8d498ea5', '2020-06-25 01:39:57'),
(14, 'bobib', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'bobi2@hotmail.com', 'vistas/img/usuarios/14/881.jpg', 'directo', 1, '1cf68597f5fd509d1483abe33d4f1548', '2020-06-26 01:13:12'),
(15, 'benjamin', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'benmsss@yahoo.com', '', 'directo', 1, '8fec66a680e6cefd2c25ecf914e6dcb1', '2020-06-25 02:22:05'),
(16, 'nnn', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'nnn@hot.com', '', 'directo', 1, 'e3d4c07ec6af92cdc29219b8f3b1a13e', '2020-06-25 15:31:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id_h`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recorrido`
--
ALTER TABLE `recorrido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `reservas2`
--
ALTER TABLE `reservas2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id_testimonio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id_h` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `recorrido`
--
ALTER TABLE `recorrido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `reservas2`
--
ALTER TABLE `reservas2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id_testimonio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
