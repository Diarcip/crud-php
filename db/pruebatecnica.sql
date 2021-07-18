-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2021 a las 00:59:28
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebatecnica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `cod` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`cod`, `name`) VALUES
(1, 'Bogotá'),
(2, 'Medellín'),
(3, 'Tunja'),
(4, 'Cali'),
(5, 'Barranquilla'),
(6, 'Ibagué');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cod` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `city` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cod`, `name`, `city`) VALUES
(1, 'CocaCola', 1),
(2, 'Pepsi', 3),
(3, 'Alpina', 1),
(4, 'Parmalat', 2),
(5, 'Claro', 4),
(6, 'Tigo', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `pass`, `email`) VALUES
(102030, 'Diego', 'Cifuentes', 'password1', 'diegocifuentes98@hotmail.com'),
(102031, 'Diana', 'Rodriguez', 'password2', 'siqnw@gmail.com'),
(102032, 'Carmen', 'Peña', 'password00', 'carpen@hotmail.com'),
(102033, 'Laura', 'Sanabria', '17password.', 'lausan@hotmail.com'),
(102034, 'Arvey', 'Peña', 'abc1523', 'arvpen@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `city` (`city`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `city` FOREIGN KEY (`city`) REFERENCES `cities` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


select clientes.cod as ID, clientes.name as NOMBRE, cities.name as CIUDAD from clientes, cities where clientes.city = cities.cod;
SELECT ACTIVIDADES.ID_ACTIVIDAD, ACTIVIDADES.TITULO, DEPARTAMENTO.NOMBRE, ACTIVIDADES.FECHA_REGISTRO, ACTIVIDADES.FECHA_ACTIVIDAD, ACTIVIDADES.HORA_INICIO, ACTIVIDADES.HORA_FINAL, ACTIVIDADES.DESCRIPCION FROM ACTIVIDADES, DEPARTAMENTO WHERE TITULAR='$Titular' AND ACTIVIDADES.DEPARTAMENTO=DEPARTAMENTO.ID_DEPTO ORDER BY FECHA_REGISTRO desc;
select id as ID, firstname as FirstName, lastname as LastName, pass as Password, email as Email from users ORDER BY id asc;



INSERT INTO users (id,firstname,lastname,pass,email) values ('$ID_User', '$FName_User', 'LName_User', 'PW_User', 'Email_User');