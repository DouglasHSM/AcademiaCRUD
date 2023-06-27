-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Jun-2023 às 18:53
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `academia`
--
CREATE DATABASE IF NOT EXISTS `academia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `academia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `telefone` int(20) NOT NULL,
  `dataCliente` date NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`codigo`, `nome`, `telefone`, `dataCliente`) VALUES
(1, 'Douglas', 7777, '2004-07-16'),
(2, '', 0, '2023-06-27'),
(3, '', 0, '2023-06-27'),
(4, 'Mussarela', 2734, '2000-06-17'),
(5, '', 0, '2023-06-27'),
(6, '', 0, '2023-06-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE IF NOT EXISTS `pagamento` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `valor` int(11) NOT NULL,
  `dataPagamento` date NOT NULL,
  `codigoCliente` int(11) DEFAULT NULL,
  `nomeCliente` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_codigoCliente` (`codigoCliente`),
  KEY `fk_nomeCliente` (`nomeCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`codigo`, `valor`, `dataPagamento`, `codigoCliente`, `nomeCliente`) VALUES
(9, 1000, '2023-06-14', 4, 'Mussarela'),
(8, 0, '2023-06-27', 1, 'Douglas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
