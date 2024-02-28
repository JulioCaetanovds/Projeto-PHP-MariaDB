-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/11/2023 às 00:40
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lavagem`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda`
--

CREATE TABLE `agenda` (
  `cod_agenda` int(11) NOT NULL,
  `cod_lavagem` int(11) DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `data_agendamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agenda`
--

INSERT INTO `agenda` (`cod_agenda`, `cod_lavagem`, `placa`, `data_agendamento`) VALUES
(6, 1234, 'ITA-0361', '2024-01-01'),
(7, 4321, 'EZE-G530', '2023-12-04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `nome`, `telefone`) VALUES
('05398431056', 'Júlio', '54991587307'),
('73592609068', 'Leandro', '54996089990');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lavagem`
--

CREATE TABLE `lavagem` (
  `cod_lavagem` int(11) NOT NULL,
  `cpf_cliente` varchar(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lavagem`
--

INSERT INTO `lavagem` (`cod_lavagem`, `cpf_cliente`, `valor`) VALUES
(111, NULL, NULL),
(1111, NULL, NULL),
(1222, NULL, NULL),
(1234, NULL, NULL),
(4321, NULL, NULL),
(12414, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `placa` varchar(10) NOT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `cpf_cliente` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculo`
--

INSERT INTO `veiculo` (`placa`, `cor`, `modelo`, `tipo`, `cpf_cliente`) VALUES
('EZE-G530', 'Branco', 'Ferrari ', 'Carro', '73592609068'),
('ITA-0361', 'Branco', 'Celta 2003', 'Carro', '05398431056');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculolav`
--

CREATE TABLE `veiculolav` (
  `cod_lavagem` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `data_agendamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculolav`
--

INSERT INTO `veiculolav` (`cod_lavagem`, `placa`, `data_agendamento`) VALUES
(1234, 'ITA-0361', '2023-02-23'),
(4321, 'EZE-G530', '2023-12-05');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`cod_agenda`),
  ADD KEY `cod_lavagem` (`cod_lavagem`,`placa`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `lavagem`
--
ALTER TABLE `lavagem`
  ADD PRIMARY KEY (`cod_lavagem`),
  ADD KEY `cpf_cliente` (`cpf_cliente`);

--
-- Índices de tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `cpf_cliente` (`cpf_cliente`);

--
-- Índices de tabela `veiculolav`
--
ALTER TABLE `veiculolav`
  ADD PRIMARY KEY (`cod_lavagem`,`placa`),
  ADD KEY `placa` (`placa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `cod_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `lavagem`
--
ALTER TABLE `lavagem`
  MODIFY `cod_lavagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12415;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`cod_lavagem`,`placa`) REFERENCES `veiculolav` (`cod_lavagem`, `placa`);

--
-- Restrições para tabelas `lavagem`
--
ALTER TABLE `lavagem`
  ADD CONSTRAINT `lavagem_ibfk_1` FOREIGN KEY (`cpf_cliente`) REFERENCES `cliente` (`cpf`);

--
-- Restrições para tabelas `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`cpf_cliente`) REFERENCES `cliente` (`cpf`);

--
-- Restrições para tabelas `veiculolav`
--
ALTER TABLE `veiculolav`
  ADD CONSTRAINT `veiculolav_ibfk_1` FOREIGN KEY (`cod_lavagem`) REFERENCES `lavagem` (`cod_lavagem`),
  ADD CONSTRAINT `veiculolav_ibfk_2` FOREIGN KEY (`placa`) REFERENCES `veiculo` (`placa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
