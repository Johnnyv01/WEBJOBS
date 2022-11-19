-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Out-2022 às 00:32
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
-- Banco de dados: `webjobs`
--

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE cadastro (
  cdo_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  cdo_arq_id BIGINT NOT NULL,
  cdo_adm_Id BIGINT NOT NULL,
  cdo_src_id BIGINT NOT NULL,
  cdo_nomecompleto varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  cdo_profissao varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  cdo_email varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  cdo_senha varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  cdo_senhaConfirm varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  cdo_apelido varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  cdo_cpf varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  cdo_dtnsc date NOT NULL,
  cdo_telefone varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  cdo_cep varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  cdo_rua varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  cdo_bairro varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  cdo_cidade varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  cdo_uf varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  cdo_numero_casa varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  cdo_complemento varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  cdo_habilidades varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  foto_doc varchar(100) COLLATE utf8_unicode_ci NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE administradores (
  adm_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  adm_cdo_id int NOT NULL,
  adm_permissao varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  FOREIGN KEY (adm_cdo_id) REFERENCES cadastro (cdo_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE endereco (
  edc_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  edc_cdo_id int NOT NULL,
  edc_cep varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  edc_rua varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  edc_numero int(7) NOT NULL,
  edc_cidade varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  edc_bairro varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  edc_uf varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  edc_complemento varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  FOREIGN KEY (edc_cdo_id) REFERENCES cadastro (cdo_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE servicos (
  src_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  src_cdo_id int NOT NULL,
  src_skills varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  src_foto varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  src_servicos_prestados varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  src_experiencia varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  src_recomendacoes varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  FOREIGN KEY (src_cdo_id) REFERENCES cadastro (cdo_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `social`
--

CREATE TABLE social (
  src_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  src_cdo_id int NOT NULL,
  src_rede_social varchar(45) NOT NULL,
  src_link_social varchar(80) NOT NULL,
  FOREIGN KEY (src_cdo_id) REFERENCES cadastro  (cdo_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE usuarios (
  usr_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  usr_cdo_id int NOT NULL,
  usr_usuario varchar(200) NOT NULL,
  FOREIGN KEY (usr_cdo_id) REFERENCES cadastro (cdo_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tb_chat (
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  mensagem VARCHAR(100) NOT NULL,
  data  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE arquivos (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome varchar(150) NOT NULL,
  path varchar(100) NOT NULL,
  data_upload datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

