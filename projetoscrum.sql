-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2022 às 16:01
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoscrum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpfCliente` int(11) NOT NULL,
  `nomeCliente` varchar(150) COLLATE utf8_bin NOT NULL,
  `cepCliente` varchar(150) COLLATE utf8_bin NOT NULL,
  `dataNascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpfCliente`, `nomeCliente`, `cepCliente`, `dataNascimento`) VALUES
(412323232, 'Ricardo Magalhaes Pita', '13185013', '2002-05-05'),
(424283828, 'Gabriel Yamakishi', '13827323', '2000-09-23'),
(487232832, 'Samuel Verissimo', '13186703', '2001-08-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `cnpjEmpresa` int(20) NOT NULL,
  `cepEmpresa` varchar(150) COLLATE utf8_bin NOT NULL,
  `nomeEmpresa` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`cnpjEmpresa`, `cepEmpresa`, `nomeEmpresa`) VALUES
(567948520, '13172260', 'NOSSA-EMPRESA.COM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacote`
--

CREATE TABLE `pacote` (
  `idPacote` int(11) NOT NULL,
  `tipoPacote` varchar(150) COLLATE utf8_bin NOT NULL,
  `produtoPacote` varchar(150) COLLATE utf8_bin NOT NULL,
  `valorPacote` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `pacote`
--

INSERT INTO `pacote` (`idPacote`, `tipoPacote`, `produtoPacote`, `valorPacote`) VALUES
(1, 'Internet', 'Conexão de internet por fibra ótica por uma conexão de 50 Mbps', '100'),
(2, 'Internet', 'Conexão de internet por fibra ótica por uma conexão de 100 Mbps', '150'),
(3, 'Canais a cabos', 'Standard  ', '50'),
(4, 'Canais a cabos', 'Premium  ', '80'),
(5, 'Streaming  ', 'Aluguel de filme de catálogo', '5'),
(6, 'Streaming', 'Aluguel de filme em lançamento ', '7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idServico` int(11) NOT NULL,
  `fk_Cliente` int(11) NOT NULL,
  `fk_Pacote` int(11) NOT NULL,
  `data_servico` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idServico`, `fk_Cliente`, `fk_Pacote`, `data_servico`) VALUES
(1, 412323232, 4, '2022-06-14 21:35:15'),
(2, 412323232, 2, '2022-06-13 00:00:00'),
(3, 487232832, 4, '2022-06-03 00:00:00'),
(4, 487232832, 6, '2022-06-13 21:35:44'),
(6, 424283828, 6, '2022-06-15 02:54:29'),
(7, 487232832, 3, '2022-06-15 03:02:04'),
(9, 424283828, 4, '2022-06-15 03:09:18');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpfCliente`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`cnpjEmpresa`);

--
-- Índices para tabela `pacote`
--
ALTER TABLE `pacote`
  ADD PRIMARY KEY (`idPacote`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServico`),
  ADD KEY `fk_Cliente` (`fk_Cliente`),
  ADD KEY `fk_Pacote` (`fk_Pacote`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cpfCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=487232833;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `cnpjEmpresa` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567948521;

--
-- AUTO_INCREMENT de tabela `pacote`
--
ALTER TABLE `pacote`
  MODIFY `idPacote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`fk_Cliente`) REFERENCES `cliente` (`cpfCliente`),
  ADD CONSTRAINT `servico_ibfk_2` FOREIGN KEY (`fk_Pacote`) REFERENCES `pacote` (`idPacote`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
