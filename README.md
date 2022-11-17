###Criar o banco do dados

CREATE DATABASE IF NOT EXISTS `republica`;

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rendimento` double NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `despesas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `valor` double NOT NULL,
  `data_despesa` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `categorias`
ADD PRIMARY KEY (`id`);

ALTER TABLE `despesas`
ADD PRIMARY KEY (`id`),
ADD KEY `id_categoria` (`id_categoria`);

ALTER TABLE `pessoas`
ADD PRIMARY KEY (`id`);

ALTER TABLE `despesas`
ADD CONSTRAINT `despesas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;