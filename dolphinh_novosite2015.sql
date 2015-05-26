-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 20-Maio-2015 às 15:04
-- Versão do servidor: 5.5.42-cll
-- versão do PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `dolphinh_novosite2015`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo_quarto`
--

CREATE TABLE IF NOT EXISTS `conteudo_quarto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_QUARTO` int(11) NOT NULL,
  `DESCRICAO` text,
  PRIMARY KEY (`ID`),
  KEY `ID_QUARTO` (`ID_QUARTO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `conteudo_quarto`
--

INSERT INTO `conteudo_quarto` (`ID`, `ID_QUARTO`, `DESCRICAO`) VALUES
(1, 1, 'Apartamento com aproximadamente 18m² – localizados INTERNAMENTE no corpo principal do hotel. Não possui janelas grandes. '),
(2, 1, 'Apartamento com aproximadamente 18m² – localizados INTERNAMENTE no corpo principal do hotel. Não possui janelas grandes. '),
(3, 2, 'Apartamento com aproximadamente 16m²,  localizados na varanda do hotel próximo a piscina.'),
(4, 2, 'Apartamento com aproximadamente 16m²,  localizados na varanda do hotel próximo a piscina.\r\n'),
(5, 3, 'Apartamento com aproximadamente 20m², localizados no chalé do jardim.'),
(6, 3, 'Apartamento com aproximadamente 20m², localizados no chalé do jardim.'),
(7, 4, 'Apartamento com aproximadamente 26m²'),
(8, 4, 'Apartamento com aproximadamente 26m²'),
(9, 5, 'Apartamento com aproximadamente 50m²'),
(10, 5, 'Apartamento com aproximadamente 50m²');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dolphin`
--

CREATE TABLE IF NOT EXISTS `dolphin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` mediumtext NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `imagem_video` varchar(255) NOT NULL,
  `autoplayer` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `dolphin`
--

INSERT INTO `dolphin` (`id`, `titulo`, `descricao`, `imagem`, `video`, `imagem_video`, `autoplayer`) VALUES
(1, 'Conheça o Dolphin Hotel', 'Concebido com a filosofia de bem viver e receber, o Dolphin se localiza no refúgio ecológico mais exclusivo do Brasil: a ilha de Fernando de Noronha. Cercado por beleza estonteante, acolhido pela mata atlântica e aos pés do cartão postal mais famoso e imponente  da ilha, o Morro do Pico.', '', 'https://www.youtube.com/watch?v=ayBGGIxZIwA&feature=youtu.be', 'images/28042015170007.jpg', 0),
(2, 'Um lugar aconchegante!', 'O Dolphin é um lugar para quem procura paz e descanso. Um refúgio acolhedor onde se encontra elegância na simplicidade e na simpatia, um lugar aconchegante e intimista onde você se sentirá em sua própria casa de praia. ', 'images/17042015230300.jpg', '570', '523', 0),
(3, 'Nossa Estrutura', 'O Dolphin possui uma ampla área de lazer com piscina, sauna a vapor e jacuzzi com hidromassagem. No bar, pode experimentar um dos drinks da casa, que também conta com salão para pequenas convenções. O Dolphin ainda oferece serviços especiais aos hóspedes, como passeios privativos, jantar ou luais à beira da piscina com música ao vivo.', 'images/17042015225745.jpg', '570', '523', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dolphin_galeria`
--

CREATE TABLE IF NOT EXISTS `dolphin_galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `imagem_video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `dolphin_galeria`
--

INSERT INTO `dolphin_galeria` (`id`, `imagem`, `video`, `imagem_video`) VALUES
(1, 'images/09042015173710.jpg', '', ''),
(2, 'images/09042015182152.jpg', '', ''),
(3, 'images/17042015224907.jpg', '', ''),
(4, 'images/09042015182527.jpg', '', ''),
(5, 'images/09042015182745.jpg', '', ''),
(6, 'images/17042015203030.jpg', '', ''),
(7, 'images/09042015183141.jpg', '', ''),
(8, 'images/17042015224720.jpg', '', ''),
(9, 'images/17042015225333.jpg', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria_quarto`
--

CREATE TABLE IF NOT EXISTS `galeria_quarto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_QUARTO` int(11) NOT NULL,
  `IMAGEM` varchar(255) NOT NULL,
  `DESTAQUE` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `imagem_video` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_QUARTO` (`ID_QUARTO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `galeria_quarto`
--

INSERT INTO `galeria_quarto` (`ID`, `ID_QUARTO`, `IMAGEM`, `DESTAQUE`, `video`, `imagem_video`) VALUES
(1, 1, 'images/08042015230255.jpg', 1, '', ''),
(2, 1, 'images/08042015230808.jpg', 1, '', ''),
(3, 1, 'images/09042015215650.jpg', 1, '', ''),
(4, 1, '', 0, '', ''),
(5, 1, '', 0, '', ''),
(6, 1, '', 0, '', ''),
(7, 2, 'images/08042015214130.jpg', 1, '', ''),
(8, 2, 'images/08042015214254.jpg', 1, '', ''),
(9, 2, 'images/09042015225308.jpg', 1, '', ''),
(10, 2, '', 0, '', ''),
(11, 2, '', 0, '', ''),
(12, 2, '', 0, '', ''),
(15, 3, 'images/08042015214522.jpg', 1, '', ''),
(16, 3, 'images/08042015214630.jpg', 1, '', ''),
(17, 3, 'images/08042015214726.jpg', 1, '', ''),
(18, 3, 'images/08042015214826.jpg', 0, '', ''),
(19, 3, 'images/08042015214951.jpg', 0, '', ''),
(20, 3, '', 0, '', ''),
(21, 4, 'images/08042015215434.jpg', 1, '', ''),
(22, 4, 'images/08042015215454.jpg', 1, '', ''),
(23, 4, 'images/08042015215508.jpg', 1, '', ''),
(24, 4, 'images/08042015215529.jpg', 0, '', ''),
(25, 4, '', 0, '', ''),
(26, 4, '', 0, '', ''),
(27, 5, 'images/08042015213942.jpg', 1, '', ''),
(28, 5, 'images/08042015213420.jpg', 1, '', ''),
(29, 5, 'images/08042015214004.jpg', 1, '', ''),
(30, 5, 'images/2804201503420.jpg', 0, '', ''),
(31, 5, 'images/08042015213740.jpg', 0, '', ''),
(32, 5, 'images/2804201503436.jpg', 0, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gastronomia`
--

CREATE TABLE IF NOT EXISTS `gastronomia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `imagem_video` varchar(255) NOT NULL,
  `autoplayer` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `gastronomia`
--

INSERT INTO `gastronomia` (`id`, `titulo`, `descricao`, `imagem`, `video`, `imagem_video`, `autoplayer`) VALUES
(25, 'Cardápio da Piscina', 'Seu dia/Sunset na piscina pode ser muito mais agradável com nosso cardápio especial de petiscos e drinks. ', 'images/17042015234559.jpg', '', '', 0),
(26, ' Jantar especial ', 'Todas as noites no Acqua Marine é servido um jantar a La carte com cardápio especialmente montado. Se você estiver comemorando seu aniversário, de alguém muito importante ou simplesmente deseja marcar aquela noite especial, um belo jantar a beira da piscina vai fazer seu momento inesquecível.', 'images/1804201500107.jpg', '', '', 0),
(27, 'Almoço ', 'O almoço no Acqua Marine possui um cardápio com pratos rápidos porém deliciosos, importante para que você continue curtindo a ilha na parte da tarde.', 'images/17042015233637.jpg', '', '', 0),
(28, 'Café da manhã', 'Cheio de deliciosas opções, muitas talvez, você pode nem ter ouvido falar (como frutas e algumas iguarias regionais). A diversidade é tanta que consegue agradar aos mais diferentes paladares.', 'images/17042015232519.jpg', '', '', 0),
(29, 'Restaurante Aqua Marine ', 'É aqui que os cheiros, cores, e astral do hotel se transformam nos sabores mais inesquecíveis. Cozinha regional, internacional e frutos do mar farão você viver o inesperado e experimentar as mais diversas delícias que Noronha tem a oferecer. Alguns pratos já se tornaram "pontos turísticos" da ilha como a Cauda de Lagosta, Paella Noronhense e o Peixe na telha, além das deliciosas sobremesas como o Danado de Bom, bananas empanadas cobertas com mel de engenho, paçocas e sorvetes. O cardápio foi elaborado especialmente pelo chef Fábio de Sanctis que caprichou nos detalhes. Aberto ao público das 07h às 22h.', '', 'https://www.youtube.com/watch?v=UVL02PDt-Eg', 'images/22042015224854.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_quarto`
--

CREATE TABLE IF NOT EXISTS `item_quarto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_QUARTO` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_QUARTO` (`ID_QUARTO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- Extraindo dados da tabela `item_quarto`
--

INSERT INTO `item_quarto` (`ID`, `ID_QUARTO`, `NOME`) VALUES
(42, 1, 'Camas de mola king size estilo box pillow top'),
(43, 1, 'Roupas de cama 200 fios'),
(44, 1, 'Toalhas de puro algodÃ£o'),
(45, 1, 'TV LCD com SKY'),
(47, 1, 'Frigobar com minibar'),
(48, 1, 'Telefone interno'),
(49, 1, 'Secador de cabelos'),
(50, 1, ' ConfortÃ¡veis roupÃµes de piquet'),
(51, 1, 'Chuveiro aquecido'),
(52, 1, 'Amenidade Natura'),
(53, 1, 'PeÃ§as do artista Isnaldo Reis'),
(54, 1, 'Wi-fi'),
(55, 1, 'Cofre digital'),
(56, 1, 'Ar condicionado'),
(57, 2, 'Camas de mola king size estilo box pillow top'),
(58, 2, 'Roupas de cama 200 fios'),
(59, 2, 'Toalhas de puro algodÃ£o'),
(60, 2, 'TV LCD com SKY'),
(61, 2, 'Frigobar com minibar'),
(62, 2, 'Telefone interno'),
(63, 2, 'Secador de cabelos'),
(64, 2, 'ConfortÃ¡veis roupÃµes de piquet'),
(65, 2, 'Chuveiro aquecido'),
(66, 2, 'Amenidade Natura'),
(67, 2, 'PeÃ§as do artista Isnaldo Reis'),
(68, 2, 'Wi-fi'),
(69, 2, 'Cofre digital'),
(70, 2, 'Ar condicionado'),
(71, 3, 'Camas de mola king size estilo box pillow top'),
(72, 3, 'Roupas de cama 200 fios'),
(73, 3, 'Toalhas de puro algodÃ£o'),
(74, 3, 'TV LCD com SKY'),
(76, 3, 'Frigobar com minibar'),
(77, 3, 'Telefone interno'),
(78, 3, 'Secador de cabelos'),
(79, 3, 'ConfortÃ¡veis roupÃµes de piquet'),
(80, 3, 'Chuveiro aquecido'),
(81, 3, 'Amenidade Natura'),
(82, 3, 'PeÃ§as do artista Isnaldo Reis'),
(83, 3, 'Wi-fi'),
(84, 3, 'Cofre digital'),
(85, 3, 'Ar condicionado'),
(86, 4, 'Camas de mola king size estilo box pillow top'),
(87, 4, 'Roupas de cama 200 fios'),
(88, 4, 'Toalhas de puro algodÃ£o'),
(89, 4, 'TV LCD com SKY'),
(90, 4, 'Frigobar com minibar'),
(91, 4, 'Telefone interno'),
(92, 4, 'Secador de cabelos'),
(93, 4, 'ConfortÃ¡veis roupÃµes de piquet'),
(94, 4, 'Chuveiro aquecido'),
(95, 4, 'Amenidade Natura'),
(96, 4, 'PeÃ§as do artista Isnaldo Reis'),
(97, 4, 'Wi-fi'),
(98, 4, 'Cofre digital'),
(99, 4, 'Ar condicionado'),
(115, 5, 'Varanda Privativa'),
(117, 5, 'Jacuzzi privativa'),
(118, 5, 'Menu de travesseiros'),
(119, 5, 'Roupas de cama 350 fios'),
(120, 5, 'Toalhas grandes em puro algodÃ£o'),
(121, 5, 'TV LCD 32'' com SKY'),
(122, 5, 'Frigobar com minibar'),
(123, 5, 'Telefone interno'),
(124, 5, 'Secador de cabelos '),
(125, 5, 'ConfortÃ¡veis roupÃµes de piquet'),
(126, 5, 'Chuveiro grande aquecido'),
(127, 5, 'Amenidades Natura'),
(128, 5, 'Mesa para cafÃ© da manhÃ£'),
(129, 5, 'PeÃ§as do artista Isnaldo Reis '),
(130, 5, 'Som com Ipod Station '),
(131, 5, 'Wi-fi '),
(132, 5, '2 camas de mola queen estilo box com pillow top'),
(133, 5, 'Ar condicionado com Split');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `nome`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `preco_quarto`
--

CREATE TABLE IF NOT EXISTS `preco_quarto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_QUARTO` int(11) NOT NULL,
  `ESTACAO_BAIXA` varchar(255) NOT NULL,
  `MES_BAIXA` varchar(255) DEFAULT NULL,
  `DBL_BAIXA` varchar(255) DEFAULT NULL,
  `TPL_BAIXA` varchar(255) DEFAULT NULL,
  `ESTACAO_ALTA` varchar(255) NOT NULL,
  `MES_ALTA` varchar(255) NOT NULL,
  `DBL_ALTA` varchar(255) NOT NULL,
  `TPL_ALTA` varchar(255) NOT NULL,
  `ESTACAO_MEDIA` varchar(255) NOT NULL,
  `MES_MEDIA` varchar(255) NOT NULL,
  `DBL_MEDIA` varchar(255) NOT NULL,
  `TPL_MEDIA` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_QUARTO` (`ID_QUARTO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `preco_quarto`
--

INSERT INTO `preco_quarto` (`ID`, `ID_QUARTO`, `ESTACAO_BAIXA`, `MES_BAIXA`, `DBL_BAIXA`, `TPL_BAIXA`, `ESTACAO_ALTA`, `MES_ALTA`, `DBL_ALTA`, `TPL_ALTA`, `ESTACAO_MEDIA`, `MES_MEDIA`, `DBL_MEDIA`, `TPL_MEDIA`) VALUES
(1, 1, 'Baixa', 'Março a Junho, Novembro e Dezembro', '499,00 ', '574,00', 'Alta', 'Janeiro e Julho ', '699,00', '804,00', 'Média', 'Fevereiro, Agosto a Outubro', '599,00', '689,00'),
(2, 2, 'Baixa', 'Março a Junho, Novembro e Dezembro ', '649,00', '746,00', 'Alta', 'Janeiro e Julho ', '849,00', '976,00', 'Média', 'Fevereiro, Agosto a Outubro', '749,00', '861,00'),
(3, 3, 'Baixa', 'Março a Junho, Novembro e Dezembro ', '749,00', '861,00', 'Alta', 'Janeiro e Julho ', '949,00', '1091,00', 'Média', 'Fevereiro, Agosto a Outubro', '849,00', '976,00'),
(4, 4, 'Baixa', 'Março a Junho, Novembro e Dezembro ', '949,00', '1091,00', 'Alta', 'Janeiro e Julho ', '1149,00', '1,206,00', 'Média', 'Fevereiro, Agosto a Outubro', '1049,00', '1321,00'),
(5, 5, 'Baixa', 'Março a Junho, Novembro e Dezembro ', '1.349', '', 'Alta', 'Janeiro e Julho ', '1.549', '', 'Média', 'Fevereiro, Agosto a Outubro', '1.449', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE IF NOT EXISTS `quarto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`ID`, `NOME`) VALUES
(1, 'Standard'),
(2, 'Compacto vista piscina'),
(3, 'Compacto externo'),
(4, 'Superior'),
(5, 'Superior hidro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `imagem_video` varchar(255) NOT NULL,
  `autoplayer` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `titulo`, `descricao`, `imagem`, `video`, `imagem_video`, `autoplayer`) VALUES
(5, 'Serviços Especiais', 'O Dolphin oferece todos os passeios e serviços disponíveis na ilha para o seu maior conforto. Você pode deixar agendado antes mesmo da sua viagem ou na recepção do Dolphin.', 'images/08042015223321.jpg', '', '', 0),
(7, 'Tour  e translado', 'Nosso translado, aeroporto > hotel > aeroporto, é oferecido aos nossos hóspedes sem nenhum custo. Todos os tours e passeios disponíveis na ilha estão disponíveis para agendamento no balcão da recepção. Ilha tour, passeio de barco, passeio de barco com almoço ou jantar, saída para pesca submarina, plana sub (prancha puxada por lancha para observação do fundo do mar), mergulhos livres, mergulhos de cilindro, Batismo submarino, mergulho para credenciados, caminhada histórica, trilhas, observação do mirante dos golfinhos etc. Ainda temos aluguel de câmeras digitais à prova d''água, buggies, motos e bicicletas e equipamento de apoio para praia.', 'images/15042015170337.png', '', '', 0),
(8, 'Eventos na Piscina', '.', 'images/08042015222306.jpg', '', '', 0),
(9, 'Massagem  e Yoga', '    ', 'images/15042015170819.png', '', '', 0),
(11, 'Noronha VIP', 'Uma Noronha vista por um ângulo exclusivo, com um roteiro preparado especialmente para você! Assista o Pôr do Sol mais inesquecível da sua vida a bordo de barco exclusivo saboreando um Peixe na Brasa, sashimis e as bebidas de sua preferência. Conheça a ilha da maneira mais confortável e exclusiva com o Ilha Tour Privado em 4×4. Temos ainda saída de barco privado para pesca oceânica , e todas as trilhas da Ilha com um guia exclusivo pra você.\r\n', 'images/15042015170644.jpg', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarifa_conteudo`
--

CREATE TABLE IF NOT EXISTS `tarifa_conteudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tarifa_conteudo`
--

INSERT INTO `tarifa_conteudo` (`id`, `texto`) VALUES
(1, '<p>1. A di&aacute;ria inclui o caf&eacute; da manh&atilde; servido&nbsp; no restaurante do hotel e translados de chegada e sa&iacute;da.</p>\r\n\r\n<p>2. Favor acrescentar&nbsp;10% sobre as tarifas referente&nbsp;&agrave;&nbsp;taxa de servi&ccedil;o.</p>\r\n\r\n<p>3. N&atilde;o est&atilde;o inclusos nas di&aacute;rias e nos pacotes, extras de car&aacute;ter pessoal, seguro de vida ou acidentes pessoais, como tamb&eacute;m taxas e/ou ingresso da ilha.</p>\r\n\r\n<p>4. As reservas ser&atilde;o confirmadas ap&oacute;s o pagamento, que dever&aacute; ser efetuado ap&oacute;s a confirma&ccedil;&atilde;o&nbsp; da reserva por parte da central de reservas do Dolphin Hotel.</p>\r\n\r\n<p>5. Forma de pagamento &gt; A vista em dep. banc&aacute;rio ou em cart&otilde;es VISA e MASTER em at&eacute; 1(dep&oacute;sito)+2.</p>\r\n\r\n<p>Os Valores acima apresentados poder&atilde;o sofrer reajustes sem pr&eacute;vio aviso, de acordo com mudan&ccedil;as na politica econ&ocirc;mica adotada no pa&iacute;s.</p>\r\n\r\n<p><strong>Pol&iacute;tica de cancelamentos:</strong></p>\r\n\r\n<p>Com at&eacute; 30 dias do Check-in ser&aacute; cobrado uma multa no valor de 1 di&aacute;ria. Entre 29 e 15 dias ser&aacute; cobrado o valor de 50% do valor pago e 14 dias ou menos ser&aacute; cobrado o valor total da reserva. Havendo valor a ser restitu&iacute;do, o mesmo ser&aacute; reembolsado em at&eacute; 30 dias da solicita&ccedil;&atilde;o por escrito.</p>\r\n\r\n<p><strong>Central de Reservas: 55 81 3366-6601</strong></p>\r\n\r\n<p><strong>email: faleconosco@dolphinhotel.tur.br</strong></p>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarifa_opcionais`
--

CREATE TABLE IF NOT EXISTS `tarifa_opcionais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tarifa_opcionais`
--

INSERT INTO `tarifa_opcionais` (`id`, `texto`) VALUES
(1, '<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Ilha Tur</strong></td>\r\n			<td>R$130</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Barco</strong></td>\r\n			<td>R$110</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Barco com peixada</strong></td>\r\n			<td>R$160</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Trilha Atalaia Curta/Longa</strong></td>\r\n			<td>&Aacute; consultar</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Aluguel Material Mergulho (di&aacute;ria)</strong></td>\r\n			<td>R$20</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Aluguel M&aacute;quina Sub/Aqua (di&aacute;ria)</strong></td>\r\n			<td>R$50</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Aluguel Buggy (di&aacute;ria)</strong></td>\r\n			<td>&Aacute; consultar</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Megulho (Batismo) (Cartao)</strong></td>\r\n			<td>R$455</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Mergulho (Batismo) (&Aacute; vista)</strong></td>\r\n			<td>R$433</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Mergulho (Credenciado) (&Aacute; vista)</strong></td>\r\n			<td>&Aacute; consultar</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Ilha Tur Privado (Guia+Buggy)</strong></td>\r\n			<td>R$500</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nave</strong></td>\r\n			<td>R$150</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<caption><strong>Aluguel 4x4</strong></caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td><strong>Baixa</strong></td>\r\n			<td><strong>M&eacute;dia</strong></td>\r\n			<td><strong>Alta</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Jimny</strong></td>\r\n			<td>R$ 300</td>\r\n			<td>R$ 350</td>\r\n			<td>R$ 400</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>TR4</strong></td>\r\n			<td>R$ 350</td>\r\n			<td>R$ 400</td>\r\n			<td>R$ 450</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarifa_pacote`
--

CREATE TABLE IF NOT EXISTS `tarifa_pacote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `imperdivel` tinyint(1) NOT NULL,
  `imagem_banner` varchar(255) NOT NULL,
  `periodo_pacote_de` varchar(255) NOT NULL,
  `periodo_pacote_ate` varchar(255) NOT NULL,
  `validade_pacote` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `tarifa_pacote`
--

INSERT INTO `tarifa_pacote` (`id`, `titulo`, `texto`, `imagem`, `imperdivel`, `imagem_banner`, `periodo_pacote_de`, `periodo_pacote_ate`, `validade_pacote`) VALUES
(13, 'Corpus Chisti', '<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" rowspan="1" scope="col">&nbsp;</th>\r\n			<th scope="col">Noites</th>\r\n			<th scope="col">DBL</th>\r\n			<th scope="col">DBL+EXT</th>\r\n			<th scope="col">Disponibilidade</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Compacto - Vista Piscina</strong></td>\r\n			<td><strong>04/06 - 07/06</strong></td>\r\n			<td>3</td>\r\n			<td><strong>2.547</strong></td>\r\n			<td><strong>2.929</strong></td>\r\n			<td><strong>1 unidade</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Superior</strong></td>\r\n			<td><strong>04/06 - 07/06</strong></td>\r\n			<td>3</td>\r\n			<td><strong>3.447</strong></td>\r\n			<td><strong>3.964</strong></td>\r\n			<td><strong>1 unidade</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:300px">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>&nbsp; &nbsp;</strong>&nbsp; &nbsp;&nbsp;<strong>* Taxa de Servi&ccedil;o de 10%&nbsp;n&atilde;o&nbsp;inclusa*</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'images/1504201503034.jpg', 1, 'images/1504201503034_1.jpg', '', '', ''),
(14, 'Dia das Crianças', '<table border="1" cellpadding="1" cellspacing="1" style="height:288px; width:662px">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" rowspan="1" scope="col">&nbsp;</th>\r\n			<th scope="col">Noites</th>\r\n			<th colspan="2" rowspan="1" scope="col">DBL</th>\r\n			<th colspan="2" rowspan="1" scope="col">DBL+EXT</th>\r\n			<th scope="col">Disponibilidade</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Standard</strong></td>\r\n			<td><strong>09/10 - 12/10</strong></td>\r\n			<td>2</td>\r\n			<td colspan="2" rowspan="1"><strong>1.398</strong></td>\r\n			<td colspan="2" rowspan="1"><strong>1.608</strong></td>\r\n			<td><strong>1 unidade</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Compacto - Vista Piscina</strong></td>\r\n			<td><strong>09/10 - 12/10</strong></td>\r\n			<td>2 ou 3</td>\r\n			<td><strong>1.698</strong></td>\r\n			<td><strong>2.547</strong></td>\r\n			<td><strong>976.3</strong></td>\r\n			<td>2.929</td>\r\n			<td><strong>3 unidades</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Compacto Externo</strong></td>\r\n			<td><strong>09/10 - 12/10</strong></td>\r\n			<td>2 ou 3</td>\r\n			<td><strong>1.898</strong></td>\r\n			<td><strong>2.847</strong></td>\r\n			<td><strong>976.3</strong></td>\r\n			<td>3.274</td>\r\n			<td><strong>3 unidades</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Superior</strong></td>\r\n			<td><strong>09/10 - 12/10</strong></td>\r\n			<td>2</td>\r\n			<td colspan="2" rowspan="1"><strong>2.298</strong></td>\r\n			<td colspan="2" rowspan="1"><strong>2.642</strong></td>\r\n			<td><strong>1 unidade</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="1" rowspan="2"><strong>Superior com Hidro</strong></td>\r\n			<td colspan="1" rowspan="2"><strong>09/10 - 12/10</strong></td>\r\n			<td colspan="1" rowspan="2">2</td>\r\n			<td colspan="4" rowspan="1"><strong>Pre&ccedil;o &uacute;nico (at&eacute; 4 pessoas)</strong></td>\r\n			<td colspan="1" rowspan="2"><strong>1 unidade</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" rowspan="1"><strong>3.098</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:300px">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;&nbsp; &nbsp; &nbsp;<strong>* Taxa de Servi&ccedil;o de 10%&nbsp;n&atilde;o&nbsp;inclusa*</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'images/1504201504051.jpg', 0, 'images/1504201504051_1.jpg', '', '', ''),
(15, 'Natal', '<table align="center" border="1" cellpadding="1" cellspacing="1" style="height:288px; width:579px">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" rowspan="1" scope="col">&nbsp;</th>\r\n			<th colspan="2" rowspan="1" scope="col">Noites</th>\r\n			<th colspan="2" rowspan="1" scope="col">DBL</th>\r\n			<th colspan="2" rowspan="1" scope="col">DBL+EXT</th>\r\n			<th scope="col">Disponibilidade</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Standard</strong></td>\r\n			<td><strong>23/12 - 26/12</strong></td>\r\n			<td colspan="2" rowspan="1">3</td>\r\n			<td colspan="2" rowspan="1"><strong>1.797</strong></td>\r\n			<td colspan="2" rowspan="1"><strong>2.067</strong></td>\r\n			<td><strong>1 unidade</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Compacto - Vista Piscina</strong></td>\r\n			<td><strong>23/12 - 26/12</strong></td>\r\n			<td colspan="2" rowspan="1">3</td>\r\n			<td colspan="2" rowspan="1"><strong>2.247</strong></td>\r\n			<td colspan="2" rowspan="1"><strong>2.584</strong></td>\r\n			<td><strong>1 unidade</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Compacto Externo</strong></td>\r\n			<td><strong>23/12 - 26/12</strong></td>\r\n			<td>2</td>\r\n			<td>3</td>\r\n			<td><strong>1.698</strong></td>\r\n			<td><strong>2.547</strong></td>\r\n			<td><strong>976.3</strong></td>\r\n			<td><strong>2.929</strong></td>\r\n			<td><strong>4 unidades</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Superior</strong></td>\r\n			<td><strong>23/12 - 26/12</strong></td>\r\n			<td colspan="2" rowspan="1">3</td>\r\n			<td colspan="2" rowspan="1"><strong>3.147</strong></td>\r\n			<td colspan="2" rowspan="1"><strong>3.619</strong></td>\r\n			<td><strong>1 unidade</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="1" rowspan="2"><strong>Superior com Hidro</strong></td>\r\n			<td colspan="1" rowspan="2"><strong>23/12 - 26/12</strong></td>\r\n			<td colspan="2" rowspan="2">2</td>\r\n			<td colspan="4" rowspan="1"><strong>Pre&ccedil;o &uacute;nico (at&eacute; 4 pessoas)</strong></td>\r\n			<td colspan="1" rowspan="2"><strong>1 unidade</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4" rowspan="1"><strong>2.898</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:300px">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp; &nbsp; &nbsp;&nbsp;<strong>* Taxa de Servi&ccedil;o de 10%&nbsp;n&atilde;o&nbsp;inclusa*</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'images/1504201505158.jpg', 0, 'images/1504201505158_1.jpg', '', '', ''),
(16, 'Reveillon', '<table align="center" border="1" cellpadding="1" cellspacing="1" style="height:132px; width:532px">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2" rowspan="1" scope="col">&nbsp;</th>\r\n			<th scope="col">Noites</th>\r\n			<th scope="col">DBL</th>\r\n			<th scope="col">DBL+EXT</th>\r\n			<th scope="col">Disponibilidade</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Standard</strong></td>\r\n			<td><strong>26/12 - 02/01</strong></td>\r\n			<td>7</td>\r\n			<td colspan="2" rowspan="1"><strong>A consultar</strong></td>\r\n			<td><strong>1 unidade</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Compacto - Vista Pisicna</strong></td>\r\n			<td><strong>26/12 - 02/01</strong></td>\r\n			<td>7</td>\r\n			<td colspan="2" rowspan="1"><strong>A consultar</strong></td>\r\n			<td><strong>1 unidade</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Compacto Externo</strong></td>\r\n			<td><strong>26/12 - 02/01</strong></td>\r\n			<td>7</td>\r\n			<td colspan="2" rowspan="1"><strong>A consultar</strong></td>\r\n			<td><strong>4 unidades</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Superior</strong></td>\r\n			<td><strong>26/12 - 02/01</strong></td>\r\n			<td>7</td>\r\n			<td colspan="2" rowspan="1"><strong>A consultar</strong></td>\r\n			<td><strong>1 unidade</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:300px">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp; &nbsp;&nbsp;<strong>* Taxa de Servi&ccedil;o de 10% n&atilde;o&nbsp;inclusa*</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'images/1504201505820.jpg', 0, 'images/1504201505820_1.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `perfil_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `perfil_id` (`perfil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `nome_completo`, `criado`, `perfil_id`, `status`) VALUES
(1, 'admin@admin.com', '123456', 'Administrador', '2015-03-05 17:44:57', 1, 1),
(13, 'fabiana.sanctis@gmail.com', '123456', 'Fabiana Sanctis', '2015-03-27 18:36:06', 1, 1),
(15, 'fabio.sanctis@gmail.com', '171100', 'Fabio De Sanctis Jr', '2015-03-27 20:12:50', 1, 1),
(16, 'eduardo@inndeia.com', '123456', 'Eduardo', '2015-04-15 12:56:47', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `conteudo_quarto`
--
ALTER TABLE `conteudo_quarto`
  ADD CONSTRAINT `conteudo_quarto_ibfk_1` FOREIGN KEY (`ID_QUARTO`) REFERENCES `quarto` (`ID`);

--
-- Limitadores para a tabela `galeria_quarto`
--
ALTER TABLE `galeria_quarto`
  ADD CONSTRAINT `galeria_quarto_ibfk_1` FOREIGN KEY (`ID_QUARTO`) REFERENCES `quarto` (`ID`);

--
-- Limitadores para a tabela `item_quarto`
--
ALTER TABLE `item_quarto`
  ADD CONSTRAINT `item_quarto_ibfk_1` FOREIGN KEY (`ID_QUARTO`) REFERENCES `quarto` (`ID`);

--
-- Limitadores para a tabela `preco_quarto`
--
ALTER TABLE `preco_quarto`
  ADD CONSTRAINT `preco_quarto_ibfk_1` FOREIGN KEY (`ID_QUARTO`) REFERENCES `quarto` (`ID`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
