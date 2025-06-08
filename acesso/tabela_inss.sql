-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08-Ago-2014 às 06:50
-- Versão do servidor: 5.1.73-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `angulo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_inss`
--

CREATE TABLE IF NOT EXISTS `tabela_inss` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `de` decimal(50,2) NOT NULL,
  `ate` decimal(50,2) NOT NULL,
  `aliquota` decimal(50,2) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tabela_inss`
--

INSERT INTO `tabela_inss` (`codigo`, `de`, `ate`, `aliquota`) VALUES
(1, '0.00', '1317.07', '8.00'),
(2, '1317.08', '2195.12', '9.00'),
(3, '2195.13', '4390.24', '11.00'),
(4, '4390.25', '30000.00', '11.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
