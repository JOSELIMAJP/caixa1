-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16-Nov-2020 às 23:23
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id11247117_sisfinanceiro`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`id11247117_root2`@`%` PROCEDURE `SaldoEventos` ()  BEGIN




insert into eventos_saldo (SELECT `movimentos_evento` as evento, SUM(movimentos_db-movimentos_cr) as saldo FROM movimentos_saldo group by `movimentos_evento` order by saldo desc);


    
END$$

--
-- Funções
--
CREATE DEFINER=`id11247117_root2`@`%` FUNCTION `resumo_saldo` () RETURNS VARCHAR(50) CHARSET utf8 COLLATE utf8_unicode_ci return evento$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `evento_id` int(11) NOT NULL,
  `evento_nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `evento_tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `observacao` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`evento_id`, `evento_nome`, `evento_tipo`, `observacao`) VALUES
(62, 'Terreno', 'Investimento', ''),
(64, 'Advogado', 'Despesa', ''),
(88, 'Dinheiro', 'Caixa', ''),
(90, 'Moto', 'Despesa', ''),
(91, 'Salario', 'Receita', ''),
(92, 'Mastercard', 'Cartao', 'Cartão itau'),
(93, 'Conta corrente ', 'Banco', ''),
(96, 'Pipa', 'Investimento', ''),
(97, 'Prestação carro', 'Despesa', 'Fiesta'),
(102, 'Notebook', 'Receita', 'obs');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos_saldo`
--

CREATE TABLE `eventos_saldo` (
  `evento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `saldo` float(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `eventos_saldo`
--

INSERT INTO `eventos_saldo` (`evento`, `saldo`) VALUES
('Caixa-Dinheiro', 8100),
('Banco-Conta corrente', -100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorecidos`
--

CREATE TABLE `favorecidos` (
  `favorecido_id` int(11) NOT NULL,
  `favorecido_nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `favorecido_cpf` decimal(13,0) NOT NULL,
  `favorecido_rg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `favorecido_obs` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentos`
--

CREATE TABLE `movimentos` (
  `movimentos_id` int(11) NOT NULL,
  `movimentos_data` date NOT NULL,
  `movimentos_evento_d` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `movimentos_evento_c` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `movimentos_db` float NOT NULL,
  `movimentos_cr` float NOT NULL,
  `movimentos_obs` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `movimentos`
--

INSERT INTO `movimentos` (`movimentos_id`, `movimentos_data`, `movimentos_evento_d`, `movimentos_evento_c`, `movimentos_db`, `movimentos_cr`, `movimentos_obs`) VALUES
(10, '2020-10-06', 'TESTE', 'TESTE 2', 100, 200, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentos_atualizacao`
--

CREATE TABLE `movimentos_atualizacao` (
  `id` int(10) NOT NULL,
  `id_chave` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `hora` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentos_saldo`
--

CREATE TABLE `movimentos_saldo` (
  `movimentos_id` int(11) NOT NULL,
  `movimentos_id_chave` int(20) NOT NULL,
  `movimentos_data` date NOT NULL,
  `movimentos_evento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `movimentos_db` float NOT NULL,
  `movimentos_cr` float NOT NULL,
  `movimentos_obs` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `movimentos_saldo`
--

INSERT INTO `movimentos_saldo` (`movimentos_id`, `movimentos_id_chave`, `movimentos_data`, `movimentos_evento`, `movimentos_db`, `movimentos_cr`, `movimentos_obs`) VALUES
(431, 1, '2020-11-14', 'Caixa-Dinheiro', 100, 0, ''),
(432, 1, '2020-11-14', 'Banco-Conta corrente', 0, 100, ''),
(433, 432, '2020-11-14', 'Caixa-Dinheiro', 8000, 0, ''),
(434, 432, '2020-11-14', 'Banco-Conta corrente', 0, 8000, '');

--
-- Acionadores `movimentos_saldo`
--
DELIMITER $$
CREATE TRIGGER `carrega_fc_calculo_custo` BEFORE INSERT ON `movimentos_saldo` FOR EACH ROW BEGIN


DELETE from eventos_saldo where saldo BETWEEN -99999999999999 and 99999999999999;


call SaldoEventos;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario`, `senha`) VALUES
(2, 'pedrinho', '202cb962ac59075b964b07152d234b70'),
(4, 'fabio', '202cb962ac59075b964b07152d234b70'),
(5, 'carlos', '250cf8b51c773f3f8dc8b4be867a9a02'),
(9, 'juca', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'joao', '202cb962ac59075b964b07152d234b70'),
(12, 'nada', 'dbc4d84bfcfe2284ba11beffb853a8c4'),
(18, 'fabio', '202cb962ac59075b964b07152d234b70'),
(19, 'josefabio', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`evento_id`);

--
-- Índices para tabela `favorecidos`
--
ALTER TABLE `favorecidos`
  ADD PRIMARY KEY (`favorecido_id`);

--
-- Índices para tabela `movimentos`
--
ALTER TABLE `movimentos`
  ADD PRIMARY KEY (`movimentos_id`);

--
-- Índices para tabela `movimentos_atualizacao`
--
ALTER TABLE `movimentos_atualizacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movimentos_saldo`
--
ALTER TABLE `movimentos_saldo`
  ADD PRIMARY KEY (`movimentos_id`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `evento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de tabela `favorecidos`
--
ALTER TABLE `favorecidos`
  MODIFY `favorecido_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentos`
--
ALTER TABLE `movimentos`
  MODIFY `movimentos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT de tabela `movimentos_atualizacao`
--
ALTER TABLE `movimentos_atualizacao`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentos_saldo`
--
ALTER TABLE `movimentos_saldo`
  MODIFY `movimentos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
