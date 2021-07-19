-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2021 a las 05:39:13
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
(5001, 'Medellin'),
(8001, 'Barranquilla'),
(11001, 'Bogotá'),
(13001, 'Cartagena'),
(15001, 'Tunja'),
(19001, 'Popayán'),
(25758, 'Sopó'),
(41001, 'Neiva'),
(41551, 'Pitalito'),
(50001, 'Villavicencio'),
(52001, 'Pasto'),
(52356, 'Ipiales'),
(54001, 'Cúcuta'),
(66001, 'Pereira'),
(68001, 'Bugaramanga'),
(73001, 'Ibagué'),
(76001, 'Cali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cod` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `city` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cod`, `name`, `city`) VALUES
(900824185, 'Hewlett Packard', 11001),
(8000207069, 'Totto', 73001),
(8001539937, 'Claro', 76001),
(8002457950, 'Parmalat', 11001),
(8600259002, 'Alpina', 25758),
(8605168065, 'Koaj', 66001),
(8999991158, 'ETB', 11001),
(9000305383, 'Lenovo', 11001),
(9004208145, 'Hitss', 11001),
(9005504472, 'TPLink', 5001),
(9005607272, 'CocaCola', 5001);

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
(78375, 'Romina', 'Bello', 'EMVTm3HN6Jyfa5sW', 'Romina.Bello@gmail.com'),
(102034, 'Arvey', 'Pena', 'abc1523', 'arvpen@hotmail.com'),
(1020322, 'Carmen', 'Pena', 'password00', 'carpen@hotmail.com'),
(1058453, 'Jorge', 'Cifuentes', 'hjz6sZu48frDTKQJ', 'Jorge.Cifuentes@gmail.com'),
(1205404, 'Adri?n', 'Sanchez', 'EHk7MbWqdmX3wFTy', 'Adri?n.Sanchez@gmail.com'),
(5820124, '?lvaro', 'Castro', 'b57nYgMHa2S39xQZ', '?lvaro.Castro@gmail.com'),
(7524124, 'Alba', 'Hernandez', 'qFQxhyd7aPrfv9N3', 'Alba.Hernandez@gmail.com'),
(10757853, 'Pablo', 'Romero', 'W6EXvP2TywMuFYmj', 'Pablo.Romero@gmail.com'),
(18072021, 'Diana', 'Suarez', 'pass2021', 'diana.suarez@gmail.com'),
(25827482, 'Andrea', 'Rodriguez', 'Ad7w6ZgcvyGrX2zt', 'Andrea.Rodriguez@gmail.com'),
(78637527, 'Irene', 'Chara', 'WrUu5YKxjPnGtBRg', 'Irene.Chara@gmail.com'),
(104534523, 'Miguel', 'Ortiz', 'SpxjaJUf8tK2eTC6', 'Miguel.Ortiz@gmail.com'),
(105865424, 'Nicol?s', 'Fresneda', 'B92frhHdEbSxvajT', 'Nicol?s.Fresneda@gmail.com'),
(651823168, 'Laura', 'Villamil', 'XbrLUfC9tH2jmJ4d', 'laura.villamil@gmail.com'),
(786745324, 'Daniela', 'Rodriguez', 'D58TRP3Bmq7XsLpY', 'Daniela.Rodriguez@gmail.com'),
(789375275, 'Isabella', 'Martinez', 'QZkm9AjBa5NpC8FR', 'Isabella.Martinez@gmail.com'),
(1048534325, 'Lucas', 'Santos', 'cFCfV7ZuDe8NjqpL', 'Lucas.Santos@gmail.com'),
(1205412234, 'Manuel', 'Sanabria', 'F2d48artHhgXZN9m', 'Manuel.Sanabria@gmail.com'),
(1210450540, 'Mario', 'Romero', 'kZhq4Aw3B9aDP2Fp', 'Mario.Romero@gmail.com'),
(1233494730, 'Diego', 'Cifuentes', '2020', 'diegocifuentes98@hotmail.com'),
(2147483647, 'Emma', 'Villamil', 'LzH4FXhQxS9sR72k', 'Emma.Villamil@gmail.com');

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
