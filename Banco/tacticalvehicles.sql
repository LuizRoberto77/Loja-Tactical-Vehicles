-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Mar-2018 às 00:43
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tacticalvehicles`
--
CREATE DATABASE `tacticalvehicles`;
USE `tacticalvehicles`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `codigousuario` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cpf` bigint(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`codigousuario`, `nome`, `email`, `senha`, `endereco`, `cpf`) VALUES
(2, 'Luiz', 'roberto-hero@hotmail.com', '123', 'whnfiowhnfionf', 11111111111),
(3, 'teste', 'teste@teste', '1234', 'Rua Teste', 33333333333),
(4, 'teste1', 'teste1@teste1', '123', 'rua.Teste', 44444444444),
(5, 'teste2', 'teste1@teste3', '1', 'rua.Teste', 34154564564),
(7, 'teste3', 'teste3@teste3', '12', 'Rua.Teste', 21541545456);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `codigoprod` int(10) UNSIGNED NOT NULL,
  `nomeprod` varchar(50) NOT NULL,
  `imagemprod` varchar(100) NOT NULL,
  `precoprod` decimal(15,2) NOT NULL,
  `quantidadeprod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codigoprod`, `nomeprod`, `imagemprod`, `precoprod`, `quantidadeprod`) VALUES
(1, 'Tanque personalizado Metal Slug', 'imagens/tank-ms.jpg', '50000000.00', 0),
(2, 'Tanque M1 Abrams', 'imagens/tank-ma.jpg', '30000000.00', 4),
(3, 'M1116 Humvee Up-Armored', 'imagens/vehicle-ha.jpg', '5000000.00', 20),
(4, 'Tanque HVY APC', 'imagens/tank-ha.jpg', '20000000.00', 10),
(5, 'MH-6/AH-6 Little Bird Marine', 'imagens/air-lb.jpg', '60000000.00', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `codigovenda` int(10) UNSIGNED NOT NULL,
  `datavenda` datetime NOT NULL,
  `quantidadevenda` int(10) UNSIGNED NOT NULL,
  `codigoprod` int(10) UNSIGNED NOT NULL,
  `cpf` bigint(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`codigovenda`, `datavenda`, `quantidadevenda`, `codigoprod`, `cpf`) VALUES
(0, '2018-03-27 19:43:27', 1, 1, 11111111111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigousuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `nome` (`nome`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codigoprod`),
  ADD KEY `nomeprod` (`nomeprod`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD KEY `cpf` (`cpf`) USING BTREE,
  ADD KEY `codigoprod` (`codigoprod`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codigousuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codigoprod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`codigoprod`) REFERENCES `produtos` (`codigoprod`),
  ADD CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`cpf`) REFERENCES `clientes` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
