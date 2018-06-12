-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 12-Jun-2018 às 05:21
-- Versão do servidor: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bancopa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `bairro` varchar(25) NOT NULL,
  `complemento` varchar(40) NOT NULL,
  `numero` int(5) NOT NULL,
  `cidade` varchar(15) NOT NULL,
  `uf` int(2) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `excluido` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `sobrenome`, `endereco`, `bairro`, `complemento`, `numero`, `cidade`, `uf`, `cep`, `senha`, `telefone`, `excluido`) VALUES
(2, 'Douglas', 'douglas@douglas.com.br', 'Prudente', 'asd', 'asd', '10', 0, 'asd', 0, 'as', '21232f297a57a5a743894a0e4a801fc3', '19979990999', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `C_CONTATO`
--

CREATE TABLE IF NOT EXISTS `C_CONTATO` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contato` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `C_CONTATO`
--

INSERT INTO `C_CONTATO` (`id`, `nome`, `email`, `contato`) VALUES
(1, '', '', ''),
(2, '', '', ''),
(3, '', '', ''),
(4, '', '', ''),
(5, 'Igor asd', 'igor_ftraders@hotmail.com', 'qwdasda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

CREATE TABLE IF NOT EXISTS `encomendas` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente` int(11) NOT NULL,
  `peso` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `encomendas`
--

INSERT INTO `encomendas` (`id`, `data`, `cliente`, `peso`, `nome`) VALUES
(1, '2018-06-12 03:02:44', 0, '20', 'Teste'),
(2, '2018-06-12 03:04:31', 0, '20', 'Teste'),
(3, '2018-06-12 03:11:33', 0, '12', 'Igor'),
(4, '2018-06-12 03:11:55', 0, '12', 'Igor'),
(5, '2018-06-12 03:29:52', 0, '52', 'Douglas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportadoras`
--

CREATE TABLE IF NOT EXISTS `transportadoras` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `excluido` int(11) NOT NULL DEFAULT '0',
  `peso` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `transportadoras`
--

INSERT INTO `transportadoras` (`id`, `nome`, `link`, `telefone`, `valor`, `excluido`, `peso`) VALUES
(1, 'BrasPress', 'https://www.braspress.com.br/home', '19 9999-9999', '20,00', 0, 501),
(2, 'Local Transporte', 'http://localtrasporte.com.br', '(19) 9979-8798', '50,00', 0, 499),
(3, 'San Transportadora', 'http://san.com.br', '(19) 9797-4198', '10,00', 0, 499),
(4, 'Lev Transp', 'http://lev.com.br', '(14) 7181-9165', '90,00', 0, 3000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `excluido` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `excluido`) VALUES
(1, 'Igor', 'igor@igor.com.br', '2927bd9dd74ffb98b3a751d7f289e92a', 0),
(2, 'Douglas', 'douglas@douglas.com.br', '3b16dc694c38d04f7d7451cc37d3c654', 0),
(3, 'Bruno', 'bruno@bruno.com.br', 'e3928a3bc4be46516aa33a79bbdfdb08', 0),
(4, 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `C_CONTATO`
--
ALTER TABLE `C_CONTATO`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `encomendas`
--
ALTER TABLE `encomendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportadoras`
--
ALTER TABLE `transportadoras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `C_CONTATO`
--
ALTER TABLE `C_CONTATO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `encomendas`
--
ALTER TABLE `encomendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transportadoras`
--
ALTER TABLE `transportadoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
