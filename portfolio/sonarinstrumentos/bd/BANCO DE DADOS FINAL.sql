-- phpMyAdmin SQL Dump
-- version 2.9.0.2
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Jul 05, 2007 as 06:28 PM
-- Versão do Servidor: 5.0.24
-- Versão do PHP: 4.4.2
-- 
-- Banco de Dados: `tcc_fatec`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `categoria`
-- 

CREATE TABLE `categoria` (
  `id_categoria` int(11) unsigned NOT NULL auto_increment,
  `nome` varchar(30) NOT NULL default '',
  `ordem` int(11) unsigned NOT NULL default '0',
  KEY `id_categoria` (`id_categoria`,`ordem`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Extraindo dados da tabela `categoria`
-- 

INSERT INTO `categoria` VALUES (1, 'Cordas', 1);
INSERT INTO `categoria` VALUES (2, 'Teclados', 2);
INSERT INTO `categoria` VALUES (3, 'Sopro', 3);
INSERT INTO `categoria` VALUES (4, 'Percussão', 4);
INSERT INTO `categoria` VALUES (5, 'Audio', 5);
INSERT INTO `categoria` VALUES (6, 'Acessórios', 6);
INSERT INTO `categoria` VALUES (7, 'Livros', 7);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `grava_log`
-- 

CREATE TABLE `grava_log` (
  `usuario` varchar(25) NOT NULL default '',
  `data_entrada` datetime NOT NULL default '0000-00-00 00:00:00',
  `ip` varchar(15) default '0',
  `perm` int(11) NOT NULL default '0',
  KEY `usuario` (`usuario`,`data_entrada`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `grava_log`
-- 

INSERT INTO `grava_log` VALUES ('admin', '2007-06-25 14:22:13', '200.228.16.229', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-22 17:19:40', '201.6.105.227', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-20 13:25:10', '201.6.255.136', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-17 16:41:55', '201.69.134.87', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-17 16:41:55', '201.69.134.87', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-17 15:41:06', '201.69.134.87', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-17 15:35:30', '201.69.134.87', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-16 18:01:17', '201.26.173.60', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-14 16:20:42', '201.6.255.136', 0);
INSERT INTO `grava_log` VALUES ('adriano', '2007-06-13 17:49:09', '201.95.184.230', 1);
INSERT INTO `grava_log` VALUES ('ADMIN', '2007-06-13 17:48:58', '201.95.184.230', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-13 17:27:01', '201.6.255.136', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-13 17:27:00', '201.6.255.136', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-10 00:54:09', '201.69.51.161', 0);
INSERT INTO `grava_log` VALUES ('usuario', '2007-06-10 00:22:57', '201.69.51.161', 1);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-10 00:09:37', '201.69.51.161', 0);
INSERT INTO `grava_log` VALUES ('adriano', '2007-06-09 21:11:13', '201.47.133.40', 1);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-09 20:27:02', '201.47.133.40', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-09 20:23:13', '201.69.51.161', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-09 17:54:02', '201.47.133.40', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-06 11:54:30', '201.95.121.244', 0);
INSERT INTO `grava_log` VALUES ('adriano', '2007-06-06 12:20:28', '201.95.121.244', 1);
INSERT INTO `grava_log` VALUES ('andrews', '2007-06-06 17:08:02', '201.6.255.136', 1);
INSERT INTO `grava_log` VALUES ('gilvan', '2007-06-06 14:23:24', '200.228.16.230', 1);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-08 10:08:35', '201.6.255.136', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-07 22:24:02', '201.69.229.213', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-07 21:59:23', '200.226.169.104', 0);
INSERT INTO `grava_log` VALUES ('adriano', '2007-06-06 21:05:04', '200.204.198.249', 1);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-06 20:14:08', '200.204.198.249', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-06 18:16:10', '201.6.255.136', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-06 17:31:50', '201.6.255.136', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-06 17:20:47', '201.6.255.136', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-06 17:19:23', '201.6.255.136', 0);
INSERT INTO `grava_log` VALUES ('admin', '2007-06-06 17:05:57', '201.6.255.136', 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `login`
-- 

CREATE TABLE `login` (
  `id` int(3) NOT NULL auto_increment,
  `usuario` varchar(12) NOT NULL default '',
  `senha` varchar(12) NOT NULL default '',
  `perm` int(3) NOT NULL default '0',
  `status` int(1) NOT NULL default '0',
  `email` varchar(150) NOT NULL default '',
  `endereco` varchar(150) default NULL,
  `endereco_num` int(8) unsigned default NULL,
  `cep` varchar(20) default NULL,
  `cidade` varchar(100) default NULL,
  `estado` char(2) default NULL,
  `tel_ddd` char(3) default NULL,
  `telefone` varchar(12) default NULL,
  `nome` varchar(150) NOT NULL default '',
  KEY `id` (`id`,`usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

-- 
-- Extraindo dados da tabela `login`
-- 

INSERT INTO `login` VALUES (41, 'andrews', 'vedito', 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');
INSERT INTO `login` VALUES (40, 'Adriano', '123456', 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');
INSERT INTO `login` VALUES (39, 'usuario', '123456', 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');
INSERT INTO `login` VALUES (38, 'admin', '123456', 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');
INSERT INTO `login` VALUES (44, 'squall', 'scph7001', 1, 0, 'andrewsfg@gmail.com', 'Rua Das caralhas', 145, '08235530', 'São Paulo', 'SP', '11', '61556974', 'Andrews Ferreira Guedis');
INSERT INTO `login` VALUES (45, 'Gilvan', 'tcctcc', 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');
INSERT INTO `login` VALUES (48, 'web', 'webweb', 1, 0, 'web', 'web', 3, '123123', 'web', 'ww', '11', '123123', 'web');
INSERT INTO `login` VALUES (49, 'teste', '123', 1, 0, 'teste', 'we', 1, '111111', 'qqqqq', 'qq', 'qq', '111111111', 'teste');
INSERT INTO `login` VALUES (47, 'gilvan', 'gilvan', 1, 0, 'van@gil.com', 'R. sem saida', 11, '0888-000', 'São Paulo', 'SP', '11', '65655656', 'gilvan');
INSERT INTO `login` VALUES (50, 'teste', '123', 1, 0, 'dgdfgdgf', 'asdasd', 0, 'asdasd', 'awdasda', 'as', 'as', 'asdasdasd', 'dgfdgfdfg');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `pedido`
-- 

CREATE TABLE `pedido` (
  `pedido_id` int(11) unsigned zerofill NOT NULL auto_increment,
  `pedido_data` date default NULL,
  `usuario` varchar(12) NOT NULL default '',
  `pedido_valor` decimal(9,3) default NULL,
  PRIMARY KEY  (`pedido_id`),
  KEY `pedido_id` (`pedido_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

-- 
-- Extraindo dados da tabela `pedido`
-- 

INSERT INTO `pedido` VALUES (00000000047, '2007-06-17', 'admin', '2249.000');
INSERT INTO `pedido` VALUES (00000000046, '2007-06-14', 'teste', '1478.000');
INSERT INTO `pedido` VALUES (00000000045, '2007-06-10', 'usuario', '669.000');
INSERT INTO `pedido` VALUES (00000000044, '2007-06-10', 'admin', '928.000');
INSERT INTO `pedido` VALUES (00000000043, '2007-06-09', 'Adriano', '739.000');
INSERT INTO `pedido` VALUES (00000000042, '2007-06-09', 'admin', '669.000');
INSERT INTO `pedido` VALUES (00000000041, '2007-06-06', 'admin', '1528.000');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `pedido_item`
-- 

CREATE TABLE `pedido_item` (
  `pedido_id` int(10) unsigned zerofill NOT NULL default '0000000000',
  `produto_id` int(10) unsigned zerofill NOT NULL default '0000000000',
  `pedido_item_qtde` int(3) default '1',
  `pedido_item_valor` decimal(9,3) default '0.000',
  KEY `pedido_id` (`pedido_id`,`produto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `pedido_item`
-- 

INSERT INTO `pedido_item` VALUES (0000000041, 0000000049, 1, '859.000');
INSERT INTO `pedido_item` VALUES (0000000041, 0000000036, 1, '669.000');
INSERT INTO `pedido_item` VALUES (0000000047, 0000000057, 1, '2249.000');
INSERT INTO `pedido_item` VALUES (0000000046, 0000000060, 2, '1478.000');
INSERT INTO `pedido_item` VALUES (0000000045, 0000000036, 1, '669.000');
INSERT INTO `pedido_item` VALUES (0000000044, 0000000058, 1, '369.000');
INSERT INTO `pedido_item` VALUES (0000000044, 0000000040, 1, '559.000');
INSERT INTO `pedido_item` VALUES (0000000043, 0000000060, 1, '739.000');
INSERT INTO `pedido_item` VALUES (0000000042, 0000000036, 1, '669.000');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `prod_img`
-- 

CREATE TABLE `prod_img` (
  `id_imagem` int(11) unsigned zerofill NOT NULL auto_increment,
  `nome` varchar(30) NOT NULL default '0',
  `caminho` varchar(50) default '0',
  `id_produto` int(2) unsigned NOT NULL default '0',
  `tipo` tinyint(1) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned default '0',
  PRIMARY KEY  (`id_imagem`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

-- 
-- Extraindo dados da tabela `prod_img`
-- 

INSERT INTO `prod_img` VALUES (00000000036, 'det_42.jpg', 'imgs/42/', 42, 1, 0);
INSERT INTO `prod_img` VALUES (00000000035, 'vit_42.jpg', 'imgs/42/', 42, 0, 0);
INSERT INTO `prod_img` VALUES (00000000030, 'thumb_36.jpg', 'imgs/36/', 36, 1, 1);
INSERT INTO `prod_img` VALUES (00000000020, 'vit_36.jpg', 'imgs/36/', 36, 0, 0);
INSERT INTO `prod_img` VALUES (00000000071, 'det_57.gif', 'imgs/57/', 57, 1, 0);
INSERT INTO `prod_img` VALUES (00000000070, 'vit_57.gif', 'imgs/57/', 57, 0, 0);
INSERT INTO `prod_img` VALUES (00000000031, 'ampli_37.jpg', 'imgs/37/', 37, 0, 0);
INSERT INTO `prod_img` VALUES (00000000032, 'thumb_37.jpg', 'imgs/37/', 37, 1, 1);
INSERT INTO `prod_img` VALUES (00000000024, 'vit_38.jpg', 'imgs/38/', 38, 0, 0);
INSERT INTO `prod_img` VALUES (00000000025, 'det_38.jpg', 'imgs/38/', 38, 1, 0);
INSERT INTO `prod_img` VALUES (00000000028, 'vit_40.jpg', 'imgs/40/', 40, 0, 0);
INSERT INTO `prod_img` VALUES (00000000029, 'det_40.jpg', 'imgs/40/', 40, 1, 0);
INSERT INTO `prod_img` VALUES (00000000058, 'thumb_50.jpg', 'imgs/50/', 50, 1, 1);
INSERT INTO `prod_img` VALUES (00000000057, 'ampli_50.jpg', 'imgs/50/', 50, 0, 0);
INSERT INTO `prod_img` VALUES (00000000037, 'vit_43.jpg', 'imgs/43/', 43, 0, 0);
INSERT INTO `prod_img` VALUES (00000000038, 'det_43.jpg', 'imgs/43/', 43, 1, 0);
INSERT INTO `prod_img` VALUES (00000000039, 'vit_44.jpg', 'imgs/44/', 44, 0, 0);
INSERT INTO `prod_img` VALUES (00000000040, 'det_44.jpg', 'imgs/44/', 44, 1, 0);
INSERT INTO `prod_img` VALUES (00000000041, 'vit_45.jpg', 'imgs/45/', 45, 0, 0);
INSERT INTO `prod_img` VALUES (00000000042, 'det_45.jpg', 'imgs/45/', 45, 1, 0);
INSERT INTO `prod_img` VALUES (00000000043, 'vit_46.jpg', 'imgs/46/', 46, 0, 0);
INSERT INTO `prod_img` VALUES (00000000044, 'det_46.jpg', 'imgs/46/', 46, 1, 0);
INSERT INTO `prod_img` VALUES (00000000045, 'vit_47.jpg', 'imgs/47/', 47, 0, 0);
INSERT INTO `prod_img` VALUES (00000000046, 'det_47.jpg', 'imgs/47/', 47, 1, 0);
INSERT INTO `prod_img` VALUES (00000000047, 'vit_48.jpg', 'imgs/48/', 48, 0, 0);
INSERT INTO `prod_img` VALUES (00000000048, 'det_48.jpg', 'imgs/48/', 48, 1, 0);
INSERT INTO `prod_img` VALUES (00000000049, 'vit_49.jpg', 'imgs/49/', 49, 0, 0);
INSERT INTO `prod_img` VALUES (00000000050, 'det_49.jpg', 'imgs/49/', 49, 1, 0);
INSERT INTO `prod_img` VALUES (00000000059, 'vit_51.jpg', 'imgs/51/', 51, 0, 0);
INSERT INTO `prod_img` VALUES (00000000060, 'det_51.gif', 'imgs/51/', 51, 1, 0);
INSERT INTO `prod_img` VALUES (00000000062, 'vit_53.jpg', 'imgs/53/', 53, 0, 0);
INSERT INTO `prod_img` VALUES (00000000063, 'det_53.gif', 'imgs/53/', 53, 1, 0);
INSERT INTO `prod_img` VALUES (00000000064, 'vit_54.jpg', 'imgs/54/', 54, 0, 0);
INSERT INTO `prod_img` VALUES (00000000065, 'det_54.gif', 'imgs/54/', 54, 1, 0);
INSERT INTO `prod_img` VALUES (00000000066, 'vit_55.jpg', 'imgs/55/', 55, 0, 0);
INSERT INTO `prod_img` VALUES (00000000067, 'det_55.gif', 'imgs/55/', 55, 1, 0);
INSERT INTO `prod_img` VALUES (00000000068, 'vit_56.jpg', 'imgs/56/', 56, 0, 0);
INSERT INTO `prod_img` VALUES (00000000069, 'det_56.jpg', 'imgs/56/', 56, 1, 0);
INSERT INTO `prod_img` VALUES (00000000072, 'vit_58.jpg', 'imgs/58/', 58, 0, 0);
INSERT INTO `prod_img` VALUES (00000000073, 'det_58.jpg', 'imgs/58/', 58, 1, 0);
INSERT INTO `prod_img` VALUES (00000000074, 'vit_59.gif', 'imgs/59/', 59, 0, 0);
INSERT INTO `prod_img` VALUES (00000000075, 'det_59.gif', 'imgs/59/', 59, 1, 0);
INSERT INTO `prod_img` VALUES (00000000076, 'vit_60.jpg', 'imgs/60/', 60, 0, 0);
INSERT INTO `prod_img` VALUES (00000000077, 'det_60.gif', 'imgs/60/', 60, 1, 0);
INSERT INTO `prod_img` VALUES (00000000078, 'vit_61.gif', 'imgs/61/', 61, 0, 0);
INSERT INTO `prod_img` VALUES (00000000079, 'det_61.gif', 'imgs/61/', 61, 1, 0);
INSERT INTO `prod_img` VALUES (00000000080, 'vit_62.gif', 'imgs/62/', 62, 0, 0);
INSERT INTO `prod_img` VALUES (00000000081, 'det_62.gif', 'imgs/62/', 62, 1, 0);
INSERT INTO `prod_img` VALUES (00000000082, 'vit_63.gif', 'imgs/63/', 63, 0, 0);
INSERT INTO `prod_img` VALUES (00000000083, 'det_63.gif', 'imgs/63/', 63, 1, 0);
INSERT INTO `prod_img` VALUES (00000000084, 'vit_64.gif', 'imgs/64/', 64, 0, 0);
INSERT INTO `prod_img` VALUES (00000000085, 'det_64.gif', 'imgs/64/', 64, 1, 0);
INSERT INTO `prod_img` VALUES (00000000086, 'vit_65.gif', 'imgs/65/', 65, 0, 0);
INSERT INTO `prod_img` VALUES (00000000087, 'det_65.gif', 'imgs/65/', 65, 1, 0);
INSERT INTO `prod_img` VALUES (00000000090, 'ampli_66.gif', 'imgs/66/', 66, 0, 0);
INSERT INTO `prod_img` VALUES (00000000091, 'thumb_66.gif', 'imgs/66/', 66, 1, 1);
INSERT INTO `prod_img` VALUES (00000000092, 'vit_67.jpg', 'imgs/67/', 67, 0, 0);
INSERT INTO `prod_img` VALUES (00000000093, 'det_67.gif', 'imgs/67/', 67, 1, 0);
INSERT INTO `prod_img` VALUES (00000000094, 'vit_68.jpg', 'imgs/68/', 68, 0, 0);
INSERT INTO `prod_img` VALUES (00000000095, 'det_68.jpg', 'imgs/68/', 68, 1, 0);
INSERT INTO `prod_img` VALUES (00000000096, 'vit_69.jpg', 'imgs/69/', 69, 0, 0);
INSERT INTO `prod_img` VALUES (00000000097, 'det_69.jpg', 'imgs/69/', 69, 1, 0);
INSERT INTO `prod_img` VALUES (00000000098, 'vit_70.jpg', 'imgs/70/', 70, 0, 0);
INSERT INTO `prod_img` VALUES (00000000099, 'det_70.jpg', 'imgs/70/', 70, 1, 0);
INSERT INTO `prod_img` VALUES (00000000100, 'vit_71.jpg', 'imgs/71/', 71, 0, 0);
INSERT INTO `prod_img` VALUES (00000000101, 'det_71.jpg', 'imgs/71/', 71, 1, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `produtos`
-- 

CREATE TABLE `produtos` (
  `id_produto` int(11) unsigned NOT NULL auto_increment,
  `nome` varchar(50) NOT NULL default '',
  `desc_curta` varchar(100) default NULL,
  `desc_longa` text NOT NULL,
  `preco` decimal(9,2) NOT NULL default '0.00',
  `peso` decimal(9,3) default '0.000',
  `estoque` int(11) unsigned NOT NULL default '0',
  `estoque_min` int(11) unsigned default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  `categoria_id` int(11) NOT NULL default '0',
  `subcat_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_produto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

-- 
-- Extraindo dados da tabela `produtos`
-- 

INSERT INTO `produtos` VALUES (42, 'Baixo Washburn XB-125NM', 'Baixo de 5 cordas com circuito ativo', 'Baixo de 5 cordas com circuito ativo para uso profissional ou por iniciantes. Design avançado e exclusivo oferece timbres realçados pela variedade tonal do circuito de equalização tornando-se um excelente instrumento com um ótimo custo benefício.', '1000.00', '10.000', 10, 1, 1, 1, 2);
INSERT INTO `produtos` VALUES (57, 'Bateria Q Series c/ caixa de madeira', 'Q5254ABL - Mapex', 'Bateria Q Series com caixa de madeira Mapex.\r\n-Q Séries\r\n-5 Peças sendo:\r\nBumbo 22" x 16"\r\nSurdo 16" x 16"\r\nTons 13" x 10" e 12" x 9"\r\nCaixa de Metal14" x 5,5"\r\n\r\n-Ferragem dupla\r\n-Canoa curta\r\n-Caixa de Madeira\r\n-Aro de bumbo de Madeira\r\n-Pele Remo\r\n-Revestida na cor: Preto', '2249.00', '18.000', 25, 1, 3, 4, 13);
INSERT INTO `produtos` VALUES (36, 'Guitarra Epiphone SG Special', 'Modelo SG Special - 22 trastes', 'Corpo em Lamined Alder\r\nEscala em Jacarandá (22 trastes)\r\nHardware Cromático\r\n2 humbucker cromático\r\nGrátis capa e camiseta da Epiphone', '669.00', '10.000', 10, 1, 3, 1, 1);
INSERT INTO `produtos` VALUES (37, 'Guitarra Fender Squier', 'California Stratocaster', 'Corpo em Basswood (sólido); braço em maple; escala em rosewood; tarraxas "Squier" blindadas std cast; 3 pickups single coil; ponte trêmolo std., escudo sandwich de 3 camadas; MV/T/T; chave de 5 posições; equipada com encordoamento Fender (U.S.A.)', '669.00', '10.000', 10, 1, 2, 1, 1);
INSERT INTO `produtos` VALUES (38, 'Guitarra Epiphone Les Paul Special HS', 'A Les Paul mais vendida do Mundo !!!', 'A Les Paul mais vendida do Mundo !!! Corpo laminado em Alder/ Maple, escala em Jacarandá (22 trastes). Equipada com 2 captadores Open-Coil, hardware cromada, PREÇO EXCELENTE!!! Acompanha Bag e Camiseta Epiphone.\r\n\r\n# Cor HS (Heritage Cherry Sunburst)\r\n# Corpo Laminado em Alder/ Maple.\r\n# Escala Jacarandá\r\n# Marcação Dot\r\n# Captadores 2 Open-Coil\r\n# Ferragens Cromadas\r\n# Bag Bag Epiphone\r\n\r\nItens Inclusos:\r\n# Certificado de Garantia\r\n# Bag\r\n# Camiseta.\r\n\r\n	\r\n\r\nDimensões: 350 x 99 x 990 mm\r\nGarantia: 3 Meses\r\nOrigem: Importado\r\nPara mais informações ou dúvidas sobre o produto ligue para: 11 6971 1641\r\n', '899.00', '14.000', 10, 1, 2, 1, 1);
INSERT INTO `produtos` VALUES (53, 'Teclado p/ Iniciante c/ 61 Teclas -Ref CK60 - Feni', 'ideal para iniciantes', 'Características:\r\n-Teclado com 61 teclas, 12 sons de polifonia\r\n-20 timbres PCM dos mais variados instrumentos\r\n-5 sons de percussão;\r\n-Controle de Sustain e Vibratro;\r\n-Teclado com controles Single e Multi finger chord;\r\n-20 Acompanhamentos;\r\n-8 músicas de demonstração;\r\n-Gravação e reprodução digital Real-time;\r\n-Saída para fone de ouvido\r\n-Display de LED.', '399.00', '5.000', 35, 2, 2, 2, 3);
INSERT INTO `produtos` VALUES (51, 'Amplificador p/ Guitarra: GT 40 40 Watts - Leac''s ', 'Excelente custo benefício.', 'Características:\r\n-Potência: 40 WATTS RMS com estágio de saída à Mosfet\r\n-Saída de linha\r\n-Red Drive (distorção)\r\n-Saída para fone de ouvido\r\n-Sensibilidade de entrada = 70mV\r\n-Pré amplificador com 3 equalizações\r\n-Estágio de pré amplificador com tecnologia Solid Tube\r\n-SPL máximo de 122dB\r\n-Máximo consumo de 60W\r\n-Dimensões aproximadas: 41x40x21cm (AxLxP)', '389.00', '3.000', 20, 1, 3, 5, 18);
INSERT INTO `produtos` VALUES (40, 'Guitarra Washburn X-10PTBL', '3 captadores, sendo 1duplo e 2 simples', 'Fundada a mais de cem anos, a Washburn vem fazendo história como fabricante de instrumentos de cordas. As guitarras e baixos Wahsburn já passaram pelas mãos de alguns dos mais importantes músicos do mundo.\r\nNão é à toa, que grandes artistas, como Roger Waters, Nuno Bettencourt, Jennifer Baten, Jon Anderson, Bootsy Collins e Sammy Hagar, entre muitos outros, preferem Washburn. Guitarra versátil com excelente construção e acabamento.\r\nIdeal para os mais variados estilos musicais, tanto por iniciantes como por profissionais.', '559.00', '10.000', 10, 1, 3, 1, 1);
INSERT INTO `produtos` VALUES (50, 'Guitarra - Classic Player 50s Stratocaster', 'Exclusividade Fender', '5-Position Blade:\r\nPosition 1. Bridge Pickup\r\nPosition 2. Bridge and Middle Pickup\r\nPosition 3. Middle Pickup\r\nPosition 4. Neck and Bridge Pickup\r\nPosition 5. Neck Pickup', '689.00', '10.000', 10, 1, 3, 1, 1);
INSERT INTO `produtos` VALUES (43, 'Contrabaixo Squier - California Precision Bass SB', 'SQUIER by FENDER', 'Todo músico sabe que os contrabaixos Fender(Squier by Fender), são os instrumentos elétricos mais aclamados e imitados do mundo.\r\nPor mais de meio século a Fender molda o estilo dos instrumentos musicais modernos, dedicando-se a conservar a herança musical de sua marca e presenteando com boa música as gerações futuras.\r\n\r\n	\r\n \r\n# Corpo em Basswood (sólido)\r\n# Braço em maple\r\n# Escala em rosewood\r\n# 1 pickup split coil\r\n# Escudo sandwich de 3 camadas\r\n# MV/T\r\n# Equipada com encordoamento Fender (U.S.A.)\r\n# Acompanha cabo\r\n# Cor: Vintage Sunburst\r\n\r\n	\r\n\r\nDimensões: 1220 x 410 x 80 mm\r\nGarantia: 3 Meses\r\nOrigem: Importado\r\nPara mais informações ou dúvidas sobre o produto ligue para: service@cesetec.com.br ', '859.00', '10.000', 10, 1, 3, 1, 2);
INSERT INTO `produtos` VALUES (44, 'Baixo B4 - Tagima - LA MATT - HF', 'Corpo em Marupá', 'Frutos de muita pesquisa e paciência, com qualidade internacional, os baixos Tagima não ficam devendo nada às melhores marcas do mercado, além, é claro, do preço muito mais atrativo. Se você toca contrabaixo e procura um parceiro de confiança, faça como os melhores baixistas do Brasil, que já deram seu aval aos nossos produtos: escolha Tagima!\r\n\r\n	\r\n \r\n# Corpo em Marupá\r\n# Escala rosewood\r\n# Marcação Abalone Pearl\r\n# Captadores ? 2 single coil c/ circuito ativo;\r\n# Controles: 1 vol / 1 balanço / 1 grave / 1 agudo\r\n# Ponte tradicional\r\n# Tarrachas blindadas\r\n# Rebaixo no corpo\r\n# Cor: La Matt\r\n\r\n	\r\n\r\nDimensões: 440 x 1280 x 100 mm\r\nGarantia: 3 Meses\r\nOrigem: Nacional', '1000.00', '12.000', 10, 1, 2, 1, 2);
INSERT INTO `produtos` VALUES (45, 'Baixo B5 - Tagima - BK Preta', '(Para Canhoto) ', 'Frutos de muita pesquisa e paciência, com qualidade internacional, os baixos Tagima não ficam devendo nada às melhores marcas do mercado, além, é claro, do preço muito mais atrativo. Se você toca contrabaixo e procura um parceiro de confiança, faça como os melhores baixistas do Brasil, que já deram seu aval aos nossos produtos: escolha Tagima!\r\n\r\n	\r\n \r\n# 5 cordas\r\n# 24 trastes\r\n# Escala Rosewood Joint Neck\r\n# Circuito ativo\r\n# Ponte 68 mm\r\n# 2 controles de volume e 1 de tom\r\n# Cor: Preta\r\n\r\n	\r\n\r\nDimensões: 440 x 1280 x 100 mm\r\nGarantia: 3 Meses\r\nOrigem: Nacional\r\n', '1300.00', '12.000', 10, 1, 2, 1, 2);
INSERT INTO `produtos` VALUES (46, 'Contrabaixo Fender - Standard Jazz Bass SB', 'escala em rosewood com 20 trastes', 'Corpo em Alder; braço em maple C-shape; escala em rosewood com 20 trastes MJ; tarraxas std; 2 pickup Single coil (J); nova perte elétrica completamente blindada, para reduzir o "HUM"; escudo sanduiche; controles de V/V/MT; ponte std vintage.\r\n\r\n	\r\n\r\nDimensões: 1320 x 380 x 100 mm\r\nGarantia: 3 Meses\r\nOrigem: Importado\r\nPara mais informações ou dúvidas sobre o produto ligue para: sac2@pridemusic.com.br', '4000.00', '12.000', 5, 1, 2, 1, 2);
INSERT INTO `produtos` VALUES (47, 'Contrabaixo - Shelter 4 Cordas TB605BLK Preto', '4 cordas Passivo ', 'Captação dupla em "P" e em "J" permite a fidelidade do seu som com esse baixo.\r\n<br />\r\n#  4 cordas Passivo\r\n# 24 Trastes\r\n# Corpo em Basswood\r\n# Braço em Maple\r\n# Escala em Rosewood\r\n# Captação P e J\r\n# 2 controles de volume\r\n# 1 controle de tonalidade\r\n# Ferragens cromadas\r\n# Marcação bolinha\r\n# Tarraxas blindadas\r\n# Cor: Preto\r\n# Modelo: TB605BLK ', '600.00', '10.000', 10, 1, 1, 1, 2);
INSERT INTO `produtos` VALUES (48, 'Baixo Tagima - B5 - MB Azul Metálico', '5 cordas ', 'Frutos de muita pesquisa e paciência, com qualidade internacional, os baixos Tagima não ficam devendo nada às melhores marcas do mercado, além, é claro, do preço muito mais atrativo. Se você toca contrabaixo e procura um parceiro de confiança, faça como os melhores baixistas do Brasil, que já deram seu aval aos nossos produtos: escolha Tagima!\r\n\r\n	\r\n \r\n# 5 cordas\r\n# 24 trastes\r\n# Escala Rosewood Joint Neck\r\n# Circuito ativo\r\n# Ponte 68 mm\r\n# 2 controles de volume e 1 de tom\r\n# Cor: Azul metálico\r\n\r\n	\r\n\r\nDimensões: 440 x 1280 x 100 mm\r\nGarantia: 3 Meses\r\nOrigem: Nacional', '1500.00', '13.000', 4, 1, 1, 1, 2);
INSERT INTO `produtos` VALUES (49, 'Pedaleira - Guitarra - Digitech RP200A', 'Até 11 efeitos simultâneos e totalmente programável', 'Pedaleira para guitarra com modelagem de amplificadores. Até 11 efeitos simultâneos e totalmente programável, a RP200 possui conversão A/D e D/A 24 Bits; Rhythm Trainer (ritmo de acompanhamento), entrada para CD; afinador cromático; pedal de expressão.', '859.00', '8.000', 5, 1, 3, 1, 6);
INSERT INTO `produtos` VALUES (54, 'Flauta Doce Estilo Alemão - SRG-420 - Suzuki ', 'Construída para os dedos infantis', 'Construída para os dedos infantis, o que permite o fechamento perfeito dos furos, ocasionando melhor desempenho e conseqüente afinação. É afinada e ajustada para atingir a perfeita execução de graves e agudos.Suzuki, uma marca presente em todas as fases da vida.', '59.00', '0.000', 15, 1, 2, 3, 9);
INSERT INTO `produtos` VALUES (55, 'Prato Semi Profissional', 'Liga B8 Extreme Power Hi Hat 14" - Octagon', 'Prato Semi Profissional Liga B8 Extreme Power Hi Hat 14" - Octagon   | Cód. do item: 287500\r\nPrato Semi Profissional Liga B8 Extreme Power Hi Hat 14\r\nSonoridade brilhante e decai rápido.\r\nA linha Extreme é indicada para profissionais e semi-profissionais.Liga de Bronze (Martelado)', '429.00', '3.000', 10, 1, 3, 4, 14);
INSERT INTO `produtos` VALUES (69, 'Violão Eletro Acústico 12 Cordas LA45E12 NM', '- Lyon by Washburn', 'Construídos com a tecnologia Washburn, os violões Lyon são ideais para quem quer um produto de alta qualidade, que caiba dentro do bolso. Fundada a mais de cem anos, a Washburn vem fazendo história como fabricante de instrumentos de cordas. As guitarras, violões e baixos Wahsburn já passaram pelas mãos de alguns dos mais importantes músicos do mundo. Não é à toa, que grandes artistas, como Roger Waters, Nuno Bettencourt, Jennifer Baten, Jon Anderson, Bootsy Collins e Sammy Hagar, entre muitos outros, preferem Washburn.\r\n# Violão eletro-acústico de 12 cordas; Cordas de aço;\r\n# Equalizador ativo com 4 bandas;\r\n# Volume e presence;\r\n# Cutaway;\r\n# Tarrachas blindadas;\r\n# Acabamento laqueado de alto brilho;\r\n# Captação: piezzo;\r\n# Equalizador:ativo 4 bandas;·\r\n# Lateral e traseira:Linden Wood c/friso nas laterais;\r\n# Trastes: 20;\r\n# Ponte: jacarandá;\r\n# Braço: Linden Wood;\r\n# Escala: Rosewood c/friso;\r\n# Dimensões do produto s/embalagem: 98X38X9 cm (PxLxA);\r\n# Peso: 1,6 kg.\r\n\r\n	\r\n \r\n# Cor Natural\r\n# Acústico ou Elétrico Eletro acústico\r\n# Faixa e Fundo Linden wood\r\n# Braço Linden wood\r\n# Escala Rosewood\r\n# Trastes 20\r\n# Tarraxas Blindadas\r\n# Encordoamentos Aço\r\n# Bag Não\r\n# Pré-Eq 4 Bandas Ativo Sim\r\n\r\nNível\r\n# Intermediário: Sim\r\n# Profissional: Sim\r\n\r\nItens Inclusos:\r\n# Violão Eletro Acústico 12 Cordas LA45E12 BK - Lyon by Washburn ', '499.00', '8.000', 5, 1, 1, 1, 4);
INSERT INTO `produtos` VALUES (56, 'Cabo Ultraflex P10-P10 (6m) - Ernie Ball ', 'Tecnologia Ultraflex', 'Cabo com exclusiva tecnologia Ultraflex e conectores P10 - P10 Switchcraft, 20 pés.\r\nDimensões aprox. da embalagem: 4x21x27cm (AxLxP)\r\nPeso aproximado: 10g\r\nGarantia do Fornecedor: 3 meses\r\nref.: 8063 Cabo Ultraflex P10-P10 (6m)\r\nFornecedor - Royal\r\n', '47.00', '0.000', 35, 1, 2, 6, 25);
INSERT INTO `produtos` VALUES (58, 'Violão Estudante 18 - Di Giorgio', 'Excelente para iniciantes', 'Um violão para quem dedilha as primeiras notas!\r\nA Di Giorgio fabrica violões há mais de 100 anos: sinônimo de qualidade, tradição e confiança.\r\n-Caixa de ressonância em tamanho normal, confeccionado em Pau-Ferro com tampo em Oregon Pine importado.\r\n-Escala com 19 trastes em alpaca importado.\r\n-Comprimento de escala: 640mm\r\n-Largura de Pestana: 50mm\r\n-Trastes arredondados que facilitam o contato dos dedos com as cordas.\r\n-Cordas: naylon importadas.', '369.00', '1.000', 30, 2, 2, 1, 4);
INSERT INTO `produtos` VALUES (59, '2 Microfones s/ fio PRO 1200 - CSR', 'Com receiver.', 'Características:\r\n-Freqüência de operação: 109 ~ 120MHz (VHF/ F3E)\r\n-Freqüência de resposta: 100Hz ~ 15kHz, +/-3dB\r\n-Faixa de mobilidade: 80dB\r\n-Razão Sinal/Ruído: 80dB\r\n-Temperatura de operação: 0 ~ 45ºC\r\n-Distância máxima: 30m (em condições ideais)\r\n-Faixa de desvio: 30kHz\r\n-Potência de saída: 8mW\r\n-Impedância: 600 Ohms não-Balanceado\r\n-Sensibilidade: 30dBuV\r\n-Alimentação (receptor): 110/220V 50/60Hz\r\n-Alimentação (transmissor): bateria 9V\r\n-Duração da bateria: 10 ~ 30 Horas', '2.20', '2.000', 10, 1, 2, 5, 20);
INSERT INTO `produtos` VALUES (60, 'Pedal Phase 90 Van Halen EVH090 Ref.4231 - Dunlop', '', 'Pedal Dunlop Phase Van Halen!\r\nFornecedor - Izzo Instrumentos Musicais', '739.00', '2.000', 10, 1, 2, 1, 6);
INSERT INTO `produtos` VALUES (61, 'Caixa Acústica: VIP 400 Frontal Passivo 330 Watts ', '', 'Caixa acústica com desing futurista, em perfil trapezoidal e frente em raio, indicado para sistema suspenso(fly) com excelente desempenho com custo e benefício e ainda garantido pela leac''s!\r\n\r\nVoltada para o desenvolvimento e produção, a Leac''s conta com mais de 400 modelos de gabinetes com diversas aplicações para P.A.''s, estádios, teatros, cinemas, igrejas, eventos abertos ou fechados, casas de espetáculos, entre outros. O sucesso da Leac''s está baseado no desenvolvimento de um vibrante espírito empreeendedor, cuja qualidade dos produtos é o espelho dos valores incorporados a organização.\r\n\r\nEspecificações Técnicas:\r\n-Impedância Nominal: 8 OHMS\r\n-Potência Musical: 660 WATTS\r\n-Potência RMS: 330 Watts\r\n-Resposta de Frequência: 50 HZ a 20 KHZ\r\n-Alimentação: 120/ 240V', '1.15', '18.000', 10, 1, 2, 5, 21);
INSERT INTO `produtos` VALUES (62, 'Controlador MIDI c/ 88 Teclas - UF8 - CME', '', 'Controlador MIDI profissional com 88 teclas.\r\n\r\nCaracterísticas:\r\n-Corpo metálico com teclas plásticas\r\n-88 teclas sensitivas\r\n-Porta USB\r\n-Saída MIDI compatível com Windows 2000/XP e MAC\r\n-Mudança de oitava\r\n-Pedal de volume\r\n-8 knobs e 9 faders', '2949.00', '49.000', 8, 1, 2, 2, 3);
INSERT INTO `produtos` VALUES (63, 'Teclado c/ Teclas Iluminadas LK-80 KT- Prata/Cinza', '', 'Teclado com teclas iluminadas para aprendizagem. Possui 73 teclas sensitivas, efeitos digitais e conexão General Midi.\r\n\r\nCaracterísticas\r\n-73 teclas sensitivas e iluminadas (ativadas ou não)\r\n-Sistema de iluminação das teclas para aprendisado musical (conforme toca-se as teclas que estão iluminadas) e em 3 níneis de dificuldade\r\n-Conexão General Midi\r\n-24 notas de polifonia\r\n-137 sons\r\n-100 ritmos\r\n-100 músicas demonstrativas\r\n-Função de metrônomo para estudo\r\n-3 efeitos digitais\r\n-Memória para gravação (2 pistas x 2 canções)\r\n-Sistema de informação musical pela tela de LCD\r\n\r\nItens Inclusos\r\n-1 fonte de 12V bivolt\r\n-Manual em português\r\n\r\nDimensões aprox. da embalagem: 13,5x42,1x116,1cm (AxLxP)\r\nPeso aprox. com embalagem: 8,8kg\r\nGarantia do Fornecedor: 12 meses', '2229.00', '9.000', 8, 1, 2, 2, 3);
INSERT INTO `produtos` VALUES (64, 'Teclado Semi-Profissional - ref. CTK-800 KT - Casi', '', 'Características:\r\n-61 teclas sensitivas (cinco oitavas).\r\n-500 sons.\r\n-120 ritmos.\r\n-100 músicas de demonstração.\r\n-Tela de cristal líquido.\r\n-Conexão General Midi.\r\n-Memória de gravação até 12000 notas.\r\n-Entrada para microfone.\r\n-USB driver.\r\n-Saída para caixa e fone de ouvido.\r\n-8 efeitos digitais.\r\n\r\nAlimentação: adaptador de 9V (incluso) ou 6 pilhas grandes (não inclusas)\r\nCor: prata\r\nDimensões aprox. da embalagem: 19x45x105cm (AxLxP)\r\nPeso aproximado: 6,3kg\r\nGarantia do Fornecedor: 1 ano', '969.00', '7.000', 10, 1, 2, 2, 3);
INSERT INTO `produtos` VALUES (65, 'Gaita Diatônica Free Blues (Afinação D) Corpo Plás', 'Profissional', 'Torne-se um profissional com a Gaita Diatônica Free Blues.\r\n-Cor: cromada\r\n-Corpo: plástico\r\n-Afinação: D\r\n*Este produto acompanha 1 estojo\r\nDimensões aproximadas: 1,9x2,5x10cm (AxLxP)\r\nPeso aproximado: 0,80Kg\r\nGarantia do Fornecedor: 3 meses\r\nref.: 7020D\r\nFornecedor - Hunter', '39.90', '1.000', 10, 1, 2, 3, 12);
INSERT INTO `produtos` VALUES (66, 'Gaita Oitavada Seductora (96 Vozes Afinação C ) Cr', '', 'Beleza e qualidade juntas? Você só encontra na Gaita Oitavada Seductora.\r\n-Cor: cromada\r\n-Corpo: madeira\r\n-Afinação C\r\n-96 Vozes\r\n*Este produto acompanha 1 estojo\r\nDimensões aproximadas: 2,4x7,1x18cm (AxLxP)\r\nPeso aproximado: 0,250Kg\r\nGarantia do Fornecedor: 3 meses\r\nFornecedor - Hunter', '119.90', '0.000', 10, 1, 2, 3, 12);
INSERT INTO `produtos` VALUES (67, 'Bateria Baby - Vermelha - DOLPHIN   ', '', 'Bateria Dolphin Baby,Pratos e baqueta,Acompanha banco,Cor: Vermelha,Dimensões: 80X64X54 ', '379.90', '18.000', 10, 1, 2, 4, 13);
INSERT INTO `produtos` VALUES (68, 'Kiko Loureiro: Técnica e Versatilidade', 'Com Video-aulas de guitarra', 'Neste livro com dvd você encontrará uma incrível aula de guitarra, que vai mudar seus conceitos sobre técnica. Durante aproximadamente 60 minutos, o estudante vai poder observar todo o virtuosismo de Kiko Loureiro sendo demonstrado de forma didática, ágil e moderna. Passo a passo Kiko exemplifica os exercícios que, através dos anos, o levaram a atingir uma técnica invejável. Mas esta aula não se limita apenas a exercícios e conceitos sobre técnica. Kiko traz á tona sua forma peculiar de utilização de tríades, harmonia em bloco, levadas, e música brasileira. Relacionando o rock ao chorinho o artista mostra como o swing brasileiro e o estilo pesado podem conviver e se integrar.', '49.00', '1.000', 20, 2, 2, 7, 30);
INSERT INTO `produtos` VALUES (70, 'Violão Tradicional: MG011 - KASHIMA', 'Para o estudante.', '# Código: MG-011\r\n# Modelo: Tradicional\r\n# Cor: Natural\r\n# Tamanho: 38"\r\n# Cordas: Nylon\r\n# Tampo: "Linden Plywood"\r\n# Lado e Fundo: "Linden Plywood"\r\n# Braço: "Maple Wood"\r\n# Os encordoamentos não possuem garantia do fabricante.', '149.00', '5.000', 10, 1, 1, 1, 4);
INSERT INTO `produtos` VALUES (71, 'Modulo Sintetizador Kawai K1M', 'Yamaha Semelhante', 'VISOR DIGITAL NA COR VERDE ILUMINADO<br />\r\n\r\nCOM 64 PATCHES DE MEMÓRIA INTERNA<br />\r\n\r\nBRINDE 1: 2 CARTUCHOS RAM DE 32 MB ADICIONAIS', '500.00', '4.000', 10, 1, 1, 2, 7);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `subcategoria`
-- 

CREATE TABLE `subcategoria` (
  `id_subcat` int(11) unsigned NOT NULL auto_increment,
  `nome` varchar(30) NOT NULL default '',
  `ordem` int(11) unsigned NOT NULL default '0',
  `id_categoria` int(11) unsigned NOT NULL default '0',
  KEY `id_categoria` (`id_subcat`,`ordem`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- 
-- Extraindo dados da tabela `subcategoria`
-- 

INSERT INTO `subcategoria` VALUES (1, 'Guitarra', 1, 1);
INSERT INTO `subcategoria` VALUES (2, 'Baixo', 2, 1);
INSERT INTO `subcategoria` VALUES (3, 'Teclados', 1, 2);
INSERT INTO `subcategoria` VALUES (4, 'Violão', 3, 1);
INSERT INTO `subcategoria` VALUES (5, 'Cavaquinho', 4, 1);
INSERT INTO `subcategoria` VALUES (6, 'Outros', 5, 1);
INSERT INTO `subcategoria` VALUES (7, 'Sintetizadores', 2, 2);
INSERT INTO `subcategoria` VALUES (8, 'Outros', 3, 2);
INSERT INTO `subcategoria` VALUES (9, 'Flauta', 1, 3);
INSERT INTO `subcategoria` VALUES (10, 'Saxofone', 2, 3);
INSERT INTO `subcategoria` VALUES (11, 'Trompete', 3, 3);
INSERT INTO `subcategoria` VALUES (12, 'Gaita', 4, 3);
INSERT INTO `subcategoria` VALUES (13, 'Bateria', 1, 4);
INSERT INTO `subcategoria` VALUES (14, 'Pratos', 2, 4);
INSERT INTO `subcategoria` VALUES (15, 'Caixas', 3, 4);
INSERT INTO `subcategoria` VALUES (16, 'Chimbal', 4, 4);
INSERT INTO `subcategoria` VALUES (17, 'Outros', 5, 4);
INSERT INTO `subcategoria` VALUES (18, 'Amplificadores', 1, 5);
INSERT INTO `subcategoria` VALUES (19, 'Mesas de Som', 2, 5);
INSERT INTO `subcategoria` VALUES (20, 'Microfones', 3, 5);
INSERT INTO `subcategoria` VALUES (21, 'Caixas', 4, 5);
INSERT INTO `subcategoria` VALUES (22, 'Potências', 5, 5);
INSERT INTO `subcategoria` VALUES (23, 'Outros', 6, 5);
INSERT INTO `subcategoria` VALUES (24, 'Capas', 1, 6);
INSERT INTO `subcategoria` VALUES (25, 'Cabos', 2, 6);
INSERT INTO `subcategoria` VALUES (30, 'Cursos', 1, 7);
INSERT INTO `subcategoria` VALUES (29, 'Correias', 3, 6);
INSERT INTO `subcategoria` VALUES (28, 'Outros', 8, 6);
INSERT INTO `subcategoria` VALUES (31, 'Partituras', 2, 7);
