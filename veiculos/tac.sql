-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mar 11, 2011 as 01:06 PM
-- Versão do Servidor: 5.0.91
-- Versão do PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `gbancred_loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tac`
--

CREATE TABLE IF NOT EXISTS `tac` (
  `codigo` int(11) NOT NULL auto_increment,
  `categoria_veiculo` varchar(50) NOT NULL,
  `valor_tac` varchar(50) NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tac`
--

INSERT INTO `tac` (`codigo`, `categoria_veiculo`, `valor_tac`) VALUES
(1, 'Leves', '855.00'),
(2, 'Utilitários', '855.00'),
(3, 'Pesados', '855.00'),
(4, 'Motos', '605.00');
