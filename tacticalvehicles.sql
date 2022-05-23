-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Mar-2018 às 05:28
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `codigousuario` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cpf` bigint(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`codigousuario`, `nome`, `endereco`, `cpf`) VALUES
(2, 'Luiz', 'whnfiowhnfionf', 11111111111);

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
(2, 'Tanque M1 Abrams', 'imagens/tank-ma.jpg', '30000000.00', 5),
(3, 'M1116 Humvee Up-Armored', 'imagens/vehicle-ha.jpg', '5000000.00', 12),
(4, 'Tanque HVY APC', 'imagens/tank-ha.jpg', '20000000.00', 10),
(5, 'MH-6/AH-6 Little Bird Marine', 'imagens/air-lb.jpg', '60000000.00', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `codigovenda` int(11) NOT NULL,
  `datavenda` datetime NOT NULL,
  `quantidadevenda` int(10) UNSIGNED NOT NULL,
  `codigoprod` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`codigovenda`, `datavenda`, `quantidadevenda`, `codigoprod`) VALUES
(1, '2018-03-18 01:18:40', 1, 3),
(2, '2018-03-18 01:18:47', 1, 3),
(3, '2018-03-18 01:24:34', 1, 3),
(4, '2018-03-18 01:24:34', 1, 3),
(5, '2018-03-18 01:24:51', 1, 3),
(6, '2018-03-18 01:25:11', 1, 3),
(7, '2018-03-18 01:26:01', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigousuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
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
  ADD PRIMARY KEY (`codigovenda`),
  ADD KEY `codigoprod` (`codigoprod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codigousuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codigoprod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `codigovenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`codigoprod`) REFERENCES `produtos` (`codigoprod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
