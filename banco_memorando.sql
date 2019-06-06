-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Jun-2019 às 16:46
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco_memorando`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sobrenome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `endereco` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `telefone` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `cpf` varchar(13) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `id_usuario`, `nome`, `sobrenome`, `endereco`, `email`, `telefone`, `cpf`) VALUES
(10, 3, 'Jardesson', 'Ribeiro', 'Centro', 'jardesson@gmail.com', '996556666', '323235655'),
(11, 4, 'Jardesson', 'Santos', 'Leste', 'nada@gmail.com', '8845222', '000000000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_memorando`
--

CREATE TABLE `tab_memorando` (
  `id_memorando` int(11) NOT NULL,
  `nome_receptor` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `justificativa` varchar(700) COLLATE latin1_general_ci NOT NULL,
  `data_memorando` date NOT NULL,
  `local` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `emissor` varchar(70) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `tab_memorando`
--

INSERT INTO `tab_memorando` (`id_memorando`, `nome_receptor`, `justificativa`, `data_memorando`, `local`, `id_funcionario`, `emissor`) VALUES
(23, 'dfgdg', '<p>sdfsdfsdf</p>', '2019-06-06', 'dfgdgdfg', 11, 'fdgdg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `iduser` int(11) NOT NULL,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `user` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `dataCaptura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`iduser`, `nome`, `user`, `email`, `senha`, `dataCaptura`) VALUES
(3, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2019-06-05'),
(4, 'teste', 'teste', 'teste', '2e6f9b0d5885b6010f9167787445617f553a735f', '2019-06-05'),
(5, 'asdfsdf', 'asdfasf', 'sdfasdf', '2968a25409736660cf2e638cadbf234259fda63e', '2019-06-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indexes for table `tab_memorando`
--
ALTER TABLE `tab_memorando`
  ADD PRIMARY KEY (`id_memorando`),
  ADD KEY `fk_memo` (`id_funcionario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tab_memorando`
--
ALTER TABLE `tab_memorando`
  MODIFY `id_memorando` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tab_memorando`
--
ALTER TABLE `tab_memorando`
  ADD CONSTRAINT `fk_memo` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id_funcionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
