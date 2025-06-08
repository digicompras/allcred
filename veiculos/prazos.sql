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
-- Estrutura da tabela `prazos`
--

CREATE TABLE IF NOT EXISTS `prazos` (
  `codigo` int(11) NOT NULL auto_increment,
  `prazo` varchar(50) NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Extraindo dados da tabela `prazos`
--

INSERT INTO `prazos` (`codigo`, `prazo`) VALUES
(36, '60'),
(37, '12'),
(38, '24'),
(39, '36'),
(40, '48');
