-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 18/01/2020 às 11:25
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `creche26_vofilomena`
--
CREATE DATABASE IF NOT EXISTS `creche26_vofilomena` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `creche26_vofilomena`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `titulo_album` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_album` text COLLATE utf8_unicode_ci,
  `pasta_album` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create_album` datetime DEFAULT NULL,
  `alter_album` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `album`
--

INSERT INTO `album` (`id_album`, `titulo_album`, `img_album`, `pasta_album`, `create_album`, `alter_album`) VALUES
(23, 'NOSSOS EVENTOS', 'assets/img/albuns/nossos_eventos_05122019024607/capa_05122019024607.jpg', 'nossos_eventos_05122019024607', '2019-12-05 14:12:07', '2019-12-18 09:12:07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `banners`
--

CREATE TABLE `banners` (
  `id_banner` int(11) NOT NULL,
  `titulo_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_banner` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `id_contato` int(2) NOT NULL,
  `nome_contato` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_contato` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assunto_contato` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msg_contato` text COLLATE utf8_unicode_ci,
  `data_contato` date NOT NULL,
  `hora_contato` time NOT NULL,
  `create_contato` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `contatos`
--

INSERT INTO `contatos` (`id_contato`, `nome_contato`, `email_contato`, `assunto_contato`, `msg_contato`, `data_contato`, `hora_contato`, `create_contato`) VALUES
(2, 'Luciano Daniel', 'ludaniel26@hotmail.com', 'Orçamento bercário', 'Olá, bom dia.\r\n\r\nGostaria de ter acesso as informações sobre as disponibilidades para bercário (horários, custos, vagas...). Tenha uma filha de 4 meses.\r\n\r\nObrigado.\r\n\r\nLuciano Daniel', '2020-01-14', '11:01:06', '2020-01-14 11:01:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos_album`
--

CREATE TABLE `fotos_album` (
  `id_foto` int(11) NOT NULL,
  `fk_id_album` int(11) DEFAULT '0',
  `img_foto` text COLLATE utf8_unicode_ci,
  `create_foto` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `fotos_album`
--

INSERT INTO `fotos_album` (`id_foto`, `fk_id_album`, `img_foto`, `create_foto`) VALUES
(46, 23, 'assets/img/albuns/nossos_eventos_05122019024607/foto5_23_05122019024616.jpg', '2019-12-05 14:12:16'),
(45, 23, 'assets/img/albuns/nossos_eventos_05122019024607/foto4_23_05122019024616.jpg', '2019-12-05 14:12:16'),
(44, 23, 'assets/img/albuns/nossos_eventos_05122019024607/foto3_23_05122019024616.jpg', '2019-12-05 14:12:16'),
(43, 23, 'assets/img/albuns/nossos_eventos_05122019024607/foto2_23_05122019024616.jpg', '2019-12-05 14:12:16'),
(42, 23, 'assets/img/albuns/nossos_eventos_05122019024607/foto1_23_05122019024616.jpg', '2019-12-05 14:12:16'),
(41, 23, 'assets/img/albuns/nossos_eventos_05122019024607/foto0_23_05122019024616.jpg', '2019-12-05 14:12:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `texto_noticia` text COLLATE utf8_unicode_ci,
  `img_noticia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_noticia` date DEFAULT NULL,
  `create_noticia` datetime DEFAULT NULL,
  `alter_noticia` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo_noticia`, `texto_noticia`, `img_noticia`, `data_noticia`, `create_noticia`, `alter_noticia`) VALUES
(1, 'Teste', 'asdsd asd asd asda asdasdasd asdaasd asd ', 'assets/img/noticias/teste_25122019085716.jpg', '2019-12-25', '2019-12-25 20:12:16', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `quem_somos`
--

CREATE TABLE `quem_somos` (
  `id_quemsomos` int(11) NOT NULL,
  `titulo_quemsomos` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `texto_quemsomos` text COLLATE utf8_unicode_ci,
  `img_quemsomos` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_quemsomos` datetime DEFAULT NULL,
  `alter_quemsomos` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `quem_somos`
--

INSERT INTO `quem_somos` (`id_quemsomos`, `titulo_quemsomos`, `texto_quemsomos`, `img_quemsomos`, `create_quemsomos`, `alter_quemsomos`) VALUES
(2, 'CRECHE NÚCLEO BANDEIRANTE VÓ FILOMENA', 'A Creche Núcleo Bandeirante Vó Filomena busca proporcionar uma integração constante entre aluno-família-escola, fortalecendo os vínculos familiares, por considerar a comunidade parte integrante e fundamental do processo educacional.', 'assets/img/capa_12122019102141.jpg', '2019-11-18 01:11:49', '2019-11-22 10:11:49');

-- --------------------------------------------------------

--
-- Estrutura para tabela `resposta_contato`
--

CREATE TABLE `resposta_contato` (
  `id_resposta` int(11) NOT NULL,
  `fk_id_contato` int(11) NOT NULL,
  `msg_resposta` text COLLATE utf8_unicode_ci,
  `data_resposta` date NOT NULL,
  `hora_resposta` time NOT NULL,
  `create_resposta` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf_usuario` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_usuario` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha_usuario` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_usuario` datetime DEFAULT NULL,
  `alter_usuario` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `cpf_usuario`, `login_usuario`, `senha_usuario`, `create_usuario`, `alter_usuario`) VALUES
(1, 'Administrador do Sistema', 'crechevofilomena1962@gmail.com', '000.000.000-00', 'administrador', 'af79a8227f6f020dac98afce2a06d061', '2019-11-17 10:22:32', '2019-12-18 09:12:32'),
(11, 'Elizângela Meneses', 'ebsm19@gmail.com', '', 'eliz', '53ee8dee22fcfa3736e2e8508180f7cb', '2019-11-22 00:11:59', NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_album` (`id_album`);

--
-- Índices de tabela `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id_banner`);

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id_contato`);

--
-- Índices de tabela `fotos_album`
--
ALTER TABLE `fotos_album`
  ADD PRIMARY KEY (`id_foto`);

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Índices de tabela `quem_somos`
--
ALTER TABLE `quem_somos`
  ADD PRIMARY KEY (`id_quemsomos`);

--
-- Índices de tabela `resposta_contato`
--
ALTER TABLE `resposta_contato`
  ADD PRIMARY KEY (`id_resposta`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `banners`
--
ALTER TABLE `banners`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id_contato` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fotos_album`
--
ALTER TABLE `fotos_album`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `quem_somos`
--
ALTER TABLE `quem_somos`
  MODIFY `id_quemsomos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `resposta_contato`
--
ALTER TABLE `resposta_contato`
  MODIFY `id_resposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
