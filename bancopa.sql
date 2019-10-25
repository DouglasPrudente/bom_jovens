-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2019 às 23:51
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancopa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
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
  `excluido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `sobrenome`, `endereco`, `bairro`, `complemento`, `numero`, `cidade`, `uf`, `cep`, `senha`, `telefone`, `excluido`) VALUES
(2, 'Douglas', 'douglas@douglas.com.br', 'Prudente', 'asd', 'asd', '10', 0, 'asd', 0, 'as', '21232f297a57a5a743894a0e4a801fc3', '19979990999', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_contato`
--

CREATE TABLE `c_contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contato` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_contato`
--

INSERT INTO `c_contato` (`id`, `nome`, `email`, `contato`) VALUES
(1, '', '', ''),
(2, '', '', ''),
(3, '', '', ''),
(4, '', '', ''),
(5, 'Igor asd', 'igor_ftraders@hotmail.com', 'qwdasda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

CREATE TABLE `encomendas` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `cliente` int(11) NOT NULL,
  `peso` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `encomendas`
--

INSERT INTO `encomendas` (`id`, `data`, `cliente`, `peso`, `nome`) VALUES
(1, '2018-06-12 06:02:44', 0, '20', 'Teste'),
(2, '2018-06-12 06:04:31', 0, '20', 'Teste'),
(3, '2018-06-12 06:11:33', 0, '12', 'Igor'),
(4, '2018-06-12 06:11:55', 0, '12', 'Igor'),
(5, '2018-06-12 06:29:52', 0, '52', 'Douglas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcc`
--

CREATE TABLE `tcc` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autores` varchar(255) NOT NULL,
  `palavras_chave` varchar(255) NOT NULL,
  `linha_pesquisa` varchar(255) NOT NULL,
  `resumo` text NOT NULL,
  `arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcc`
--

INSERT INTO `tcc` (`id`, `titulo`, `autores`, `palavras_chave`, `linha_pesquisa`, `resumo`, `arquivo`) VALUES
(1, 'Titulo', 'Autor', 'Palavra, Chave', 'Linha de pesquisa', 'Aqui um resumo', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportadoras`
--

CREATE TABLE `transportadoras` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `excluido` int(11) NOT NULL DEFAULT 0,
  `peso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `excluido` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `excluido`, `status`) VALUES
(1, 'Igor', 'igor@igor.com.br', '123456', 0, 1),
(2, 'Douglas', 'douglas@douglas.com.br', '123456', 0, 1),
(3, 'Bruno', 'bruno@bruno.com.br', 'e3928a3bc4be46516aa33a79bbdfdb08', 0, 0),
(4, 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `c_contato`
--
ALTER TABLE `c_contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tcc`
--
ALTER TABLE `tcc`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `transportadoras`
--
ALTER TABLE `transportadoras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `c_contato`
--
ALTER TABLE `c_contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `encomendas`
--
ALTER TABLE `encomendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tcc`
--
ALTER TABLE `tcc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `transportadoras`
--
ALTER TABLE `transportadoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
