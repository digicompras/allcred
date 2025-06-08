-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mar 11, 2011 as 01:05 PM
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
-- Estrutura da tabela `tipos_residencias`
--

CREATE TABLE IF NOT EXISTS `tipos_residencias` (
  `codigo` int(11) NOT NULL auto_increment,
  `tipo_residencia` varchar(50) NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tipos_residencias`
--

INSERT INTO `tipos_residencias` (`codigo`, `tipo_residencia`) VALUES
(1, 'Própria'),
(2, 'Alugada'),
(3, 'Com os Pais'),
(4, 'Financiada'),
(5, 'Funcional-Outros');
