-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2018 a las 02:36:20
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contacts`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `surnames` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `email` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `sexo` varchar(150) NOT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id_contact`, `name`, `surnames`, `address`, `tel`, `email`, `city`, `sexo`, `notes`, `id_user`) VALUES
(5, 'Marty ', 'McFly', '89 norte No. 1302', '473282798', 'marty@gmail.com', 'New York', 'Masculino', 'Amigo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `surnames` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `access` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name`, `surnames`, `email`, `password`, `access`) VALUES
(1, 'Alex', 'Valera', 'alex@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(2, 'mercer', 'slayer', 'slayer@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0),
(3, 'Jhon', 'Martin', 'jhon@hotmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0),
(4, 'destroyer', 'sss', 'des@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contact`),
  ADD KEY `fk_contacts_users_idx` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `fk_contacts_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
