-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 21/11/2019 às 22:23
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `titulo_album` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_album` text COLLATE utf8_unicode_ci,
  `pasta_album` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create_album` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `album`
--

INSERT INTO `album` (`id_album`, `titulo_album`, `img_album`, `pasta_album`, `create_album`) VALUES
(8, 'Teste do album 2', 'http://localhost/vofilomena/assets/img/albuns/Teste_do_album_2/banner_19112019114140.jpg', '', '2019-11-19 23:11:40'),
(7, 'Testando novo album', 'http://localhost/vofilomena/assets/img/albuns/Testando_novo_album/banner_19112019113957.jpg', '', '2019-11-19 23:11:57');

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

--
-- Fazendo dump de dados para tabela `banners`
--

INSERT INTO `banners` (`id_banner`, `titulo_banner`, `img_banner`, `create_banner`) VALUES
(1, 'teste', 'banner_19112019091702.jpg', '2019-11-19 21:11:02'),
(2, 'tessteeee', 'banner_19112019092042.jpg', '2019-11-19 21:11:42'),
(4, 'teste6', 'banner_19112019093507.jpg', '2019-11-19 21:11:07');

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
  `create_noticia` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos_album`
--

CREATE TABLE `fotos_album` (
  `id_foto` int(11) NOT NULL,
  `fk_id_album` int(11) DEFAULT '0',
  `img_foto` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_foto` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(2, 'CRECHE NÚCLEO BANDEIRANTE VÓ FILOMENA', 'A Bem-Me-Quer busca proporcionar uma integração constante entre aluno-família-escola, fortalecendo os vínculos familiares, por considerar a comunidade parte integrante e fundamental do processo educacional.', NULL, '2019-11-18 01:11:49', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `resposta_contato`
--

CREATE TABLE `resposta_contato` (
  `id_resposta` int(11) NOT NULL,
  `fk_id_resposta` int(11) NOT NULL,
  `msg_resposta` text COLLATE utf8_unicode_ci,
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
(1, 'Administrador do Sistema', 'raphael1989@gmail.com', '023.486.491-52', 'administrador', 'af79a8227f6f020dac98afce2a06d061', '2019-11-17 10:22:32', '2019-11-17 22:11:59');

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
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `banners`
--
ALTER TABLE `banners`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id_contato` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fotos_album`
--
ALTER TABLE `fotos_album`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `quem_somos`
--
ALTER TABLE `quem_somos`
  MODIFY `id_quemsomos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `resposta_contato`
--
ALTER TABLE `resposta_contato`
  MODIFY `id_resposta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
