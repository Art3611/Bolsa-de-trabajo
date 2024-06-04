-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2024 at 01:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolsa_trabajo`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplicaciones`
--

CREATE TABLE `aplicaciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `oferta_id` int(11) NOT NULL,
  `fecha_aplicacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aplicaciones`
--

INSERT INTO `aplicaciones` (`id`, `usuario_id`, `estado`, `oferta_id`, `fecha_aplicacion`, `empresa_id`) VALUES
(10, 30, 'pendiente', 6, '2024-06-05 07:44:01', 21),
(11, 30, 'pendiente', 7, '2024-06-05 07:44:25', 23),
(12, 30, 'pendiente', 8, '2024-06-05 07:44:38', 23),
(13, 30, 'pendiente', 9, '2024-06-05 07:45:41', 22),
(14, 32, 'pendiente', 7, '2024-06-05 07:47:46', 23);

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre_empresa` varchar(255) NOT NULL,
  `industria` varchar(255) NOT NULL,
  `locacion` varchar(255) NOT NULL,
  `nif` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nombre_empresa`, `industria`, `locacion`, `nif`, `descripcion`, `telefono`, `email`, `password`, `rol_id`) VALUES
(21, 'Code Verse', 'Tecnologia', 'Madrid, España', '1231243312', 'Code verse es la empresa de desarrollo mas grande de madrid', '+34809300102', 'codeverse@gmail.com', '$2y$10$R75by3M7obBVTDaZ7FQvaOguqH1Wa2oUslTtDHJGHK40EBGSIHqNi', 2),
(22, 'Google ', 'Tecnologia', 'Estados Unidos', '2354622342', 'Empresa de desarrollo e inovaciones tecnologicas mas grande de la industria', '902782393943', 'google@gmail.com', '$2y$10$78NLRk8JUrCphGtw8a1jKupMxasLk8H4vIUmNFnGDo5iNh9aMzb1u', 2),
(23, 'Tesla', 'Tecnologia', 'Estados Unidos', '02938452', 'Empresa en la cual se busca talento de personas para poder desarrollar los productos de tesla y poder dar un experiencia a nuestros clientes unica', '789 300 2439', 'tesla@gmail.com', '$2y$10$fuJ.D0F71PF5JrHiZsQvieGzySx1Brpjuk4f2RqlZWrRHpCVvKVrG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ofertas_trabajo`
--

CREATE TABLE `ofertas_trabajo` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `nombre_trabajo` varchar(510) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `requisitos` varchar(255) NOT NULL,
  `salario` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `duracion` varchar(255) NOT NULL,
  `contrato` varchar(255) NOT NULL,
  `fecha_publicacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ofertas_trabajo`
--

INSERT INTO `ofertas_trabajo` (`id`, `empresa_id`, `nombre_trabajo`, `descripcion`, `requisitos`, `salario`, `ubicacion`, `duracion`, `contrato`, `fecha_publicacion`) VALUES
(6, 21, 'Desarrollador junior React', 'Se busca un desarrollador junior para trabajar en la empresa Code verse en donde se require tener un minimo de experiencia de 2 años comprobables trabajando con esta tecnologia', 'Saber desarrollar con react y aplicar patrones de diseño en la libreria\r\n', '$300 / 400 quincenales', 'Madrid,  España', '3 meses', 'Contrato de 3 meses', '2024-05-29 14:55:08'),
(7, 23, 'Desarrollador mobil', 'Se necesita de un desarrollador mobil para trabajar en el software para la nueva cyber truck de Tesla', 'Saber desarrollar en Java, Experiencia en desarrollo mobil, Saber usar SQL', '$4000/$5000 mensuales', 'Estados unidos', '3 meses', 'Contrato de 3 meses', '2024-06-04 17:38:09'),
(8, 23, 'Desarrollador senior Backend', 'Se necesita de un desarrollador backend para mantenimiento y refactorizacion del codigo servidor de la empresa', 'Tener experiencia desarrollando en python , Saber utilizar spring, Presentarse a una prueba tecnica', '$8000 mensuales', 'En remoto', '9 meses', '6 meses', '2024-06-04 17:40:21'),
(9, 22, 'Desarrollador Frontend', 'La empresa de google esta buscando un desarrollador frontend para darle mantenimiento a los servicios de la plataforma google drive ', 'Saber utilizar react con experiencia comprobable. Trabajo en equipo, Conocimiento en el framework Angular, Experiencia con Vue js', '$200 / $500 mesuales', 'Madrid,  España', ' 5 meses', '5 meses', '2024-06-04 17:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rol_name`) VALUES
(1, 'usuario'),
(2, 'empresa'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `nif` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `telefono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `direccion`, `nif`, `descripcion`, `rol_id`, `fecha_creacion`, `telefono`) VALUES
(30, 'Arthur', 'Lopez', 'arthur@gmail.com', '$2y$10$xK0fTq3gP1Sh.1KSywpZNuDS4X2A5qYDellK5jUNUfoYYdEER.rpm', 'Madrid, España', '6226691\r\n', 'Soy un desarrollador backend con experiencia trabajando en PHP y desarrollo para paginas web ', 1, '2024-05-25 03:36:46', '622 66 91 43'),
(31, 'Juan', 'Bartolo', 'juan@gmail.com', '$2y$10$n2xYxbq154MbdFPklvpZJeLfSKMMQJNPmqCro7.PMLVFJB9ydmlQ2', 'Barcelona, España', '019209034', 'Desarrollador senior full stack con experiencia trabajando con tecnologias como nodejs, js, python', 1, '2024-05-24 19:41:26', '0129372181'),
(32, 'Jose', 'Perez', 'jose@gmail.com', '$2y$10$SWa7/v6dJB7XtelLVs962.JztejIu48629it6lmTxazdkIX3T/a/S', 'Madrid, España', '12924895', 'Soy un desarrollador mobile con experiencia en desarrollar  aplicacion con Java, Swift , Kotlin', 1, '2024-06-04 17:47:37', '89076583455');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplicaciones`
--
ALTER TABLE `aplicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `oferta_id` (`oferta_id`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ofertas_trabajo`
--
ALTER TABLE `ofertas_trabajo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplicaciones`
--
ALTER TABLE `aplicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ofertas_trabajo`
--
ALTER TABLE `ofertas_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aplicaciones`
--
ALTER TABLE `aplicaciones`
  ADD CONSTRAINT `aplicaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aplicaciones_ibfk_2` FOREIGN KEY (`oferta_id`) REFERENCES `ofertas_trabajo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ofertas_trabajo`
--
ALTER TABLE `ofertas_trabajo`
  ADD CONSTRAINT `ofertas_trabajo_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
