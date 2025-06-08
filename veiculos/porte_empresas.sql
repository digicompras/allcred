-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mar 11, 2011 as 01:07 PM
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
-- Estrutura da tabela `porte_empresas`
--

CREATE TABLE IF NOT EXISTS `porte_empresas` (
  `codigo` int(11) NOT NULL auto_increment,
  `porte_empresa` varchar(50) NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `porte_empresas`
--

INSERT INTO `porte_empresas` (`codigo`, `porte_empresa`) VALUES
(1, 'Grande'),
(2, 'Médio'),
(3, 'Pequeno'),
(4, 'Micro');
