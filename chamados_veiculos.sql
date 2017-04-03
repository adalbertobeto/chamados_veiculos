-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Abr-2017 às 19:14
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chamados_veiculos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado`
--

CREATE TABLE `chamado` (
  `cha_id` int(10) UNSIGNED NOT NULL,
  `cha_dpto` varchar(45) NOT NULL,
  `cha_nomeusuario` varchar(90) NOT NULL,
  `cha_ramal` varchar(20) NOT NULL,
  `cha_datacriacao` datetime NOT NULL,
  `cha_inicio` datetime DEFAULT NULL,
  `cha_termino` datetime DEFAULT NULL,
  `cha_email` varchar(90) DEFAULT NULL,
  `tec_id` int(10) UNSIGNED DEFAULT NULL,
  `sit_id` int(10) UNSIGNED DEFAULT NULL,
  `cha_descricao` varchar(200) NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `uni_id` int(10) UNSIGNED NOT NULL,
  `cha_solucao` longtext,
  `cha_numCP` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `cha_naosolucao` longtext,
  `cha_tipo` varchar(80) DEFAULT NULL,
  `cha_dtvolta` datetime DEFAULT NULL,
  `cha_dtsaida` datetime DEFAULT NULL,
  `mun_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `dep_id` int(10) UNSIGNED NOT NULL,
  `dep_nome` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`dep_id`, `dep_nome`) VALUES
(1, 'PR - Presidência'),
(2, 'DG - Diretoria de Gestão'),
(3, 'DF - Diretoria Financeira '),
(4, 'DC - Diretoria Comercial'),
(5, 'DD - Diretoria de Geração Distribuída'),
(6, 'DO - Diretoria de Operação'),
(7, 'DP - Diretoria de Planejamento e Expansão'),
(8, 'CAD - Auditoria Interna'),
(9, 'PRG - Secretaria Geral'),
(10, 'PRJ - Assessoria Jurídica'),
(11, 'PRA - Assessoria de Suporte Administrativo'),
(12, 'PRC - Assessoria de Comunicação Social e Relações Institucionais'),
(13, 'PRS - Assessoria de Sustentabilidade e Responsabilidade Socioambiental'),
(14, 'PRE - Assessoria de Assuntos Regulatórios e Projetos Especiais'),
(15, 'DGP - Departamento de Gestão de Pessoas'),
(16, 'DGT - Departamento de Tecnologia da Informação e Telecomunicações'),
(17, 'DGS - Departamento de Logística e Suprimentos'),
(18, 'DFC - Departamento de Contabilidade e Gestão de Ativos'),
(19, 'DFF - Departamento de Orçamento e Gestão Financeira'),
(20, 'DCE - Departamento de Mercado e Compra de Energia'),
(21, 'DCA - Departamento de Atendimento aos Clientes'),
(22, 'DCF - Departamento de Faturamento e Recebíveis'),
(23, 'DCM - Departamento de Medição e Combate às Perdas'),
(24, 'DPL - Departamento de Universalização do Acesso à Energia'),
(25, 'DPC - Departamento de Planejamento e Controle da Expansão'),
(26, 'DOM - Departamento de Manutenção'),
(30, 'DOP - Departamento de Operação'),
(32, 'DPE - Departamento de Engenharia do Empreendimento'),
(33, 'DCE (G&T) - Departamento de Mercado e Compra de Energia'),
(34, 'DFC (G&T) - Departamento de Contabilidade e Gestão de Ativos'),
(35, 'DFF (G&T) - Departamento de Orçamento e Gestão Financeira'),
(36, 'DGP (G&T) - Departamento de Gestão de Pessoas'),
(37, 'DGS (G&T) - Departamento de Logística e Suprimentos'),
(38, 'DPE (G&T) - Departamento de Engenharia do Empreendimento'),
(39, 'DTA (G&T) - Departamento de Geração de Aparecida'),
(40, 'DTB (G&T) - Departamento de Geração de Balbina'),
(41, 'DTM (G&T) - Departamento de Geração de Mauá'),
(42, 'DTS (G&T) - Departamento de Operação do Sistema'),
(43, 'PRJ (G&T) - Assessoria Jurídica'),
(63, 'DDS - Departamento de Serviços e Contratos'),
(64, 'DDM - Departamento de Operação e Manutenção'),
(65, 'DDP - Departamento de Planejamento e Controle das Localidades'),
(66, 'DOS - Departamento de Serviços'),
(67, 'OUVI - Gerência de Ouvidoria'),
(72, 'DIS - Departamento de Serviços de Campo'),
(73, 'DIC - Departamento de Gestão de Combustível'),
(74, 'DIG - Departamento de Geração'),
(75, 'DID - Departamento de Distribuição'),
(76, 'DOA - Departamento de Manutenção de AT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE `funcao` (
  `fun_id` int(10) UNSIGNED NOT NULL,
  `fun_descricao` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Extraindo dados da tabela `funcao`
--

INSERT INTO `funcao` (`fun_id`, `fun_descricao`) VALUES
(1, 'Administrador'),
(2, 'Técnico'),
(3, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipio`
--

CREATE TABLE `municipio` (
  `mun_id` int(11) UNSIGNED NOT NULL,
  `mun_nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `municipio`
--

INSERT INTO `municipio` (`mun_id`, `mun_nome`) VALUES
(1, 'AMATURÁ'),
(2, 'ANAMÃ'),
(3, 'ANORI'),
(4, 'ANORI'),
(5, 'APUÍ'),
(6, 'ATALAIA DO NORTE'),
(7, 'AUTAZES'),
(8, 'BARCELOS'),
(9, 'BARREIRINHA'),
(10, 'BENJAMIN CONSTANT'),
(11, 'BERURI'),
(12, 'BOA VISTA DO RAMOS'),
(13, 'BOCA DO ACRE'),
(14, 'BORBA'),
(15, 'CAAPIRANGA'),
(16, 'CANUTAMA'),
(17, 'CARAUARI'),
(18, 'CAREIRO'),
(19, 'CAREIRO DA VÁRZEA'),
(20, 'COARI'),
(21, 'CODAJÁS'),
(22, 'EIRUNEPÉ'),
(23, 'ENVIRA'),
(24, 'FONTE BOA'),
(25, 'GUAJARÁ'),
(26, 'HUMAITÁ'),
(27, 'IPIXUNA'),
(28, 'IRANDUBA'),
(29, 'ITACOATIARA'),
(30, 'ITAMARATI'),
(31, 'ITAPIRANGA'),
(32, 'JAPURÁ'),
(33, 'JURUÁ'),
(34, 'JUTAÍ'),
(35, 'LÁBREA'),
(36, 'MANACAPURU'),
(37, 'MANAQUIRI'),
(38, 'MANAUS'),
(39, 'MANICORÉ'),
(40, 'MARAÃ'),
(41, 'MAUÉS'),
(42, 'NHAMUNDÁ'),
(43, 'NOVA OLINDA DO NORTE'),
(44, 'NOVO AIRÃO'),
(45, 'NOVO ARIPUANÃ'),
(46, 'PARINTINS'),
(47, 'PAUINI'),
(48, 'PRESIDENTE FIGUEIREDO'),
(49, 'RIO PRETO DA EVA'),
(50, 'SANTA ISABEL DO RIO NEGRO'),
(51, 'SANTO ANTÔNIO DO IÇÁ'),
(52, 'SÃO GABRIEL DA CACHOEIRA'),
(53, 'SÃO PAULO DE OLIVENÇA'),
(54, 'SÃO SEBASTIÃO DO UATUMÃ'),
(55, 'SILVES'),
(56, 'TABATINGA'),
(57, 'TAPAUÁ'),
(58, 'TEFÉ'),
(59, 'TONANTINS'),
(60, 'UARINI'),
(61, 'URUCARÁ'),
(62, 'URUCURITUBA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo`
--

CREATE TABLE `processo` (
  `pro_id` int(10) UNSIGNED NOT NULL,
  `pro_nome` varchar(200) NOT NULL,
  `dep_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `processo`
--

INSERT INTO `processo` (`pro_id`, `pro_nome`, `dep_id`) VALUES
(1, 'PRJC - Gerência de Contencioso', 10),
(2, 'PRAS - Gerência de Serv. Ger., Prot. e Arqu.', 11),
(3, 'PRAT - Gerência de Transportes', 11),
(4, 'PRAI - Gerência de Infraestrutura', 11),
(6, 'OUVI - Gerência da Ouvidoria', 1),
(7, 'PREP - Gerência do Escritório de Projetos', 1),
(8, 'PRRC - Gerência de Risc. Corp., Seg. e Contr.', 1),
(14, 'PRPI - Gerência de Planej. Acomp. Indicad.', 1),
(16, 'DGCP - Gerência de Correição e Proces. Trab.', 2),
(17, 'DGRS - Gerência de Relaç. Sind. Trabalh.', 2),
(18, 'DGPP - Gerência de Administração de Pessoal', 15),
(19, 'DGPB - Gerência de Benefícios e Bem Estar', 15),
(20, 'DGPD - Gerência de Desenvolvimento de Pessoas', 15),
(21, 'SESMT - Gerência de Seg. e Med. Trabalho', 2),
(22, 'DGSA - Gerência de Aquisição e Contratação', 17),
(23, 'DGSC - Gerência de Armaz. e Distribuição', 17),
(24, 'DGSP - Gerência de Planej. e Contr. Estoque', 17),
(25, 'DGTI - Gerência de Infra. e Sup. de Inform.', 16),
(26, 'DGTS - Gerência de Sist. Anál. de Neg.', 16),
(27, 'DFCA - Gerência de Gestão de Ativos ', 18),
(28, 'DFCC - Gerência de Contr. Anál. Contáb.', 18),
(29, 'DFCT - Gerência de Planej. e Gest. de Trib.', 18),
(30, 'DFFO - Gerência de Planej. e Orçamento', 19),
(31, 'DFFP - Gerência de Contas a Pagar e a Rec.', 19),
(32, 'DFFT - Gerência de Caixa e Tesouraria', 19),
(33, 'DCAA - Gerência de Atenção aos Clientes', 21),
(34, 'DCAC - Gerência de Grandes Consumid.', 21),
(35, 'DCAI - Gerência Comercial do Interior', 21),
(36, 'DCFC - Gerência de Cobrança', 22),
(37, 'DCFF - Gerência de Faturamento', 22),
(38, 'DCFL - Gerência de Cad. e Leit. Medidores', 22),
(39, 'DCMM - Gerência de Engenh. da Medição', 23),
(40, 'DCMO - Gerência de Estudos e Oper. da Mediç.', 23),
(41, 'DCMP - Gerência de Comb. às Perd. Interior', 23),
(42, 'DCMF - Gerência de Fiscalização', 23),
(43, 'DCMG - Gerência de Mediç. de Grand. Consum. ', 23),
(44, 'PRPD - Gerência de Pesq, Des, Efic. Energét.', 1),
(45, 'DPCO - Gerência de Orçamento e Controle', 25),
(46, 'DPCP - Gerência de Planej. e Estud. da Exp.', 25),
(48, 'DOME - Gerência de Eng.de Manut. de AT', 26),
(50, 'DOMC - Gerência Obr. de Manut. e Mellh. Cap.', 26),
(51, 'DOML - Gerência de Labotatórios e Ensaios', 26),
(53, 'DOMP - Gerência de Proteç. Autom. Telec. Op.', 26),
(59, 'COI - Gerência do Centr. de Op. Integrado', 30),
(60, 'DOPQ - Gerência da Qualid. Serv. e Produto', 30),
(61, 'DOPT - Gerência do Sist. Gest. Distr. e Cad.', 30),
(66, 'DPEA - Gerência de Proj. e Obras Alta Tensão', 38),
(67, 'DPER - Gerência de Projetos e Obras de RD', 38),
(68, 'DPET - Gerência de Planej. Proteç, Contr.', 32),
(117, 'DTB - Gerência de Geração de Balbina', 40),
(118, 'DTB - Processo de Operação', 40),
(119, 'DTB - Processo de Manutenção Elétrica', 40),
(120, 'DTB - Processo de Manutenção Mecânica', 40),
(121, 'DTB - Processo de Apoio à Gestão', 40),
(122, 'DTA - Gerência de Geração de Aparecida', 39),
(123, 'DTA - Processo de Operação', 39),
(124, 'DTA - Processo de Manutenção Elétrica', 39),
(125, 'DTA - Processo de Manutenção Mecânica ', 39),
(126, 'DTA - Processo de Geração da Distribuição', 39),
(127, 'DTM - Gerência de Geração de Mauá', 41),
(128, 'DTM - Processo de Operação', 41),
(129, 'DTM - Processo de Manutenção Elétrica', 41),
(130, 'DTM - Processo de Manutenção Mecânica ', 41),
(145, 'DTM - Processo do Bloco I e Electron', 41),
(146, 'DTM - Processo dos Blocos II e III', 41),
(147, 'DTM - Processo do Bloco IV', 41),
(193, 'DGQP - Gerência Qualid. Proc. e Doc. Norm.', 2),
(194, 'DGSG - Gerência de Desmp. e Gest. Contr.', 17),
(195, 'DDSI - Gerência de Serv. Téc. e Com. Interior', 63),
(196, 'DDSP - Gerência de Contr. PIES e Combust.', 63),
(197, 'DDME - Gerência de Manut. Distr. Energ. Int.', 64),
(198, 'DDMM - Gerência de Cad. Téc, Qual. Serv.', 64),
(199, 'DDMO - Gerência de Obras e Manut. Interior', 64),
(200, 'DDMD - Gerência de Oper. Distr. Energ. Inter.', 64),
(201, 'DDMG - Gerência de Obras da Geração', 64),
(202, 'DDPP - Gerência de Planej. e Contr. Ger. Int.', 65),
(203, 'DDPG - Gerência de Desemp. Gest. Contr. Ger.', 65),
(204, 'DDPL - Gerência de Gestão das Localidades', 65),
(205, 'DOSA - Gerência de Serv. Alta Tensão', 66),
(206, 'DOSC - Gerência de Serviços Comerciais', 66),
(207, 'DPLC - Gerência de Cad, Contr, e Contrataç.', 24),
(208, 'DPLP - Gerência de Planej. e Eng. de Projetos', 24),
(209, 'DPLF - Gerência de Fiscal. e Unit. de Obras', 24),
(210, 'DPLU - Gerência de Proj. Univ. Acess. Energ.', 24),
(211, 'DPLG - Gerência Governamental', 24),
(212, 'DIDL - Ger. de Acompanhamento das Localidades', 75),
(213, 'PRJT - Gerência Trabalhista', 10),
(214, 'DGCR - Gerência de Correição', 2),
(215, 'DISS - Ger. de Alto Solimões/Purus e Madeira', 72),
(216, 'DISR - Ger. do R.Negro/Juruá/M. e B. Solimões', 72),
(217, 'DISM - Ger. do Médio e Baixo Amazonas', 72),
(218, 'DICR - Gerência de Gestão dos Recursos da CCC', 73),
(219, 'DICT - Gerência de Gestão Técnica', 73),
(220, 'DIGP - Ger. de Planejamento e Obras da GET', 74),
(221, 'DIGG - Gerência de Operação da Geração', 74),
(222, 'DIGM - Gerência de Manutenção Eletromecânica', 74),
(223, 'DIGC -  Ger. de Contratos de PIEs e Locadores', 74),
(224, 'DIDM - Gerência de Manutenção de Rede', 75),
(225, 'DIDC - Ger.de Cadastro Técnico e Comercial', 75),
(227, 'DOMM - Ger. de Manut. de Rede de Distribuição', 26),
(228, 'DOMT - Ger Ges de Transformadores e Circuitos', 26),
(229, 'COD - Gerência do Centro de Operação da Dist.', 30),
(230, 'COD-AT - Operações de AT/MT/BT da Capital', 30),
(231, 'COD-BT - Operações de AT/MT/BT do Interior', 30),
(232, 'DOST - Gerência de Serviços Técnicos', 66),
(233, 'DOSF - Gerência de Fiscalização de Contratos', 66),
(234, 'DOPE - Ger. de Estudo do Sist. Elét. e Prot.', 30),
(235, 'DOPS - Ger. de Gestão dos Sistemas Técnicos', 30),
(236, 'DOPQ - Ger. Qualid. do Produto e Indicadores', 30),
(237, 'DOPP - Ger. de Pré e Pós e Normas', 30),
(238, 'DOAE - Ger. de Engenharia de Manutenção', 76),
(239, 'DOAM - Ger. Manut de Subest e Linhas de Trans', 76),
(240, 'DOAP - Ger. de Automação, Proteção e Telecom', 76),
(241, 'PRS (Gerência) - Ass. Sust. e Resp. Socioamb.', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `sit_id` int(10) UNSIGNED NOT NULL,
  `sit_descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`sit_id`, `sit_descricao`) VALUES
(1, 'ABERTO'),
(2, 'FECHADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `tec_id` int(10) UNSIGNED NOT NULL,
  `tec_nome` varchar(90) NOT NULL,
  `tec_email` varchar(90) NOT NULL,
  `tec_telefone` varchar(12) DEFAULT NULL,
  `tec_senha` varchar(45) NOT NULL,
  `fun_id` int(10) UNSIGNED NOT NULL,
  `tec_tipo` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tecnico`
--

INSERT INTO `tecnico` (`tec_id`, `tec_nome`, `tec_email`, `tec_telefone`, `tec_senha`, `fun_id`, `tec_tipo`) VALUES
(46, 'admin', 'admin@admin.com', '123', '21b72c0b7adc5c7b4a50ffcb90d92dd6', 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `uni_id` int(10) UNSIGNED NOT NULL,
  `uni_nome` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`uni_id`, `uni_nome`) VALUES
(1, 'SEDE - Av. Sete de Setembro, 2414 - Cachoeirinha'),
(2, 'PRÉDIO CENTRO - Av. Sete de Setembro, 50 - Centro'),
(3, 'COMPLEXO DE FLORES - Av. João Alfredo, s/nº - Flores'),
(4, 'UHE DE BALBINA - Rod. Mao/Caracaraí, km 122 - Balbina'),
(5, 'UTE DE MAUÁ - Av. Solimões, s/nº - Mauazinho'),
(6, 'UTE DE APARECIDA - Rua Wilkens de Matos, s/nº - Aparecida'),
(7, 'SE MANAUS I - Rua da Penetração, s/nº - Coroado'),
(8, 'SE V-8 - Estrada do Contorno, s/nº - Coroado'),
(9, 'SE DISTRITO I - Av. Açaí, s/nº - Distrito Industrial'),
(10, 'SE DISTRITO II - Av. Buriti, s/nº - Distrito Industrial'),
(11, 'SE APARECIDA - Rua Wilkens de Matos, s/nº - Aparecida'),
(12, 'SE CACHOEIRINHA - Av. Urucará c/ Tefé, nº 984 - Cachoeirinha'),
(13, 'SE/USINA SÃO JOSÉ - Av. Autaz Mirim, s/nº - São José'),
(14, 'SE CIDADE NOVA - Av. Noel Nutels, s/nº - Cidade Nova II'),
(15, 'SE PONTA NEGRA - Estr. da Ponta Negra, s/nº - Ponta Negra'),
(16, 'SE FLORES - Rua Recife, s/nº - Flores'),
(17, 'SE SERINGAL MIRIM - Av. Djalma Batista, s/nº - N. S. das Graças'),
(18, 'SE PRESIDENTE FIGUEIREDO - Ramal de Balbina, km12 - Balbina'),
(21, 'SE SANTO ANTÔNIO - Av. Torquato Tapajós, nº 5497 - Tarumã'),
(22, 'SE IRANDUBA - Rodovia BR 070, km 12 - Iranduba'),
(23, 'SE REDENÇÃO - Rua Des. João Machado, nº 1053 - Planalto'),
(24, 'SE MARAPATÁ - Rodovia BR 319, km 0, s/nº - Distrito Industrial'),
(25, 'SE PONTA DO BRITO - Porto da Balsa - Iranduba'),
(26, 'SE MAUÁ - Av. Solimões, s/nº - Mauazinho'),
(27, 'SE PONTA DO ISMAEL - Rua São João, s/nº - Compensa'),
(28, 'SE CARIRI - Estrada AM-010, km 20'),
(29, 'SE RIO PRETO DA EVA - Estrada AM-010, km 81 - Rio Preto da Eva'),
(30, 'ATENDIMENTO 10 DE JULHO - Av. 10 de Julho, nº 269 - Centro'),
(31, 'PAC SÃO JOSÉ - Alameda Cosme Ferreira, nº 8047 - São José'),
(32, 'PAC CIDADE NOVA - Av. Noel Nutels - Cidade Nova II'),
(33, 'PAC COMPENSA - Estr. da Compensa - Compensa'),
(34, 'PAC EDUCANDOS - Av. Lourenço Braga, 2000 - Educandos'),
(35, 'PAC ALVORADA - Av. Desembargador João machado, nº 4922 - Planalto'),
(36, 'COMERCIALIZAÇÃO CADASTRO - Av. Costa e Silva c/ Urucará, s/nº - Cachoeirinha'),
(44, 'TRANSPORTE - Av. Rodrigo Otávio, s/nº - Japiim'),
(47, 'DISTRIBUIÇÃO CIDADE NOVA - Av. Noel Nutels, s/nº - Cidade Nova II'),
(48, 'DISTRIBUIÇÃO APARECIDA - Rua Wilkens de Matos, s/nº - Aparecida'),
(56, 'DISTRIBUIÇÃO V-8 - Av. Efigênio Sales, nº 310 - Parque 10'),
(57, 'DEPÓSITO DA CIDADE NOVA - Rua Pe. Noronha, nº 453 - Cidade Nova'),
(58, 'ALMOXARIFADO DO JAPIIM - Estrada do Contorno, s/nº - Japiim'),
(59, 'AG. ITACOATIARA - Estrada Torquato Tapajós, nº 1604 - Bairro Iracy, Itacoatiara'),
(60, 'AG. NOVO REMANSO - Estrada Bom Jesus, s/nº - Novo Remanso'),
(61, 'AG. LINDÓIA - Rua Beira Rio, s/nº - Lindóia'),
(62, 'AG. JANUÁRIO - Rua Projetada, s/nº - Com. da Ilha do Januário'),
(63, 'AG. PRESIDENTE FIGUEIREDO - Av. Aquariquara, s/nº - Centro'),
(64, 'AG. RIO PRETO DA EVA - Rua Herculano Ferreira, s/nº - Centro'),
(65, 'AG. CAAPIRANGA - Rua Getúlio Vargas, nº 67 - Centro'),
(66, 'AG. ARARAS - Rua Couto Vale, s/nº - Vila de S. José de Araras'),
(67, 'AG. IRANDUBA - Av. Amazonas, s/nº - Centro'),
(68, 'AG. MANACAPURU - Av. Ribeiro Júnior, s/nº - Centro'),
(69, 'AG. CAMPINAS - Estrada de Campinas, s/nº - Campinas'),
(70, 'AG. SACAMBU - Rua Lago de Sacambu, s/nº - Sucunduri'),
(71, 'AG. JACARÉ - Av. Nossa Senhora do Carmo, s/nº - Jacaré'),
(72, 'AG. TUIUÊ - Av. Antonio Monteiro, s/nº - Tuiuê'),
(73, 'AG. CAVIANA - Estrada do Sindicato, s/nº - Caviana'),
(74, 'AG. VILA DE PESQUEIRO - Rua Projetada, s/nº Com. N. S. das Graças'),
(75, 'AG. RAINHA DOS APÓSTOLOS - Rua Projetada, s/nº - Com. Rainha dos Apóstolos'),
(76, 'AG. NOVO AIRÃO - Av. Presidente Vargas, s/nº - Centro'),
(77, 'AG. BERURI - Rua Castelo Branco, s/nº - Centro'),
(78, 'AG. ITAPURU - Rua Projetada, s/nº - Vila de Itapurú'),
(79, 'AG. AYAPUÁ - Rua Projetada, s/nº - Com. de Ayapuá'),
(80, 'AG. LAGO DO BERURI - Rua Projetada, s/nº - Com. do Castanheirão'),
(81, 'AG. AUTAZES - Rua Raimundo M. Cavalcante, s/nº - Centro'),
(82, 'AG. NOVO CÉU - Rua Júlio Talmaturgo Lobo, s/nº - Vila do Novo Céu'),
(83, 'AG. VILA URICURITUBA - R. Raimundo Vanderlan Sampaio, s/nº - V. Uricurituba'),
(84, 'AG. MASTRO - Rua Projetada, s/nº - Vila do Mastro'),
(85, 'AG. CAREIRO - Estrada do Careiro, s/nº - Centro'),
(86, 'AG. PARAUÁ - Estrada do Careiro, s/nº - Vila Parauá'),
(87, 'AG. CASTANHO - Av. Adail de Sá, nº 1066 - Centro'),
(88, 'AG. MANAQUIRI - Rua Francisco Jacob, nº 577 - Centro'),
(89, 'AG. BARREIRINHA - Rodovia BH 2 - Jovino Maia, s/nº - Centro'),
(90, 'AG. CAMETÁ - Estrada Cametá Candidá, s/nº - Cametá'),
(91, 'AG. PEDRAS - Travessa Manaus, s/nº - Pedras'),
(92, 'AG. BARREIRA DO ANDIRÁ - R. Projetada s/nº - Distrito de Barreira do Andirá'),
(93, 'AG. FREGUESIA DO ANDIRÁ - R. Projetada, s/nº - Distrito de Freguesia do Andirá'),
(94, 'AG. BOA VISTA DO RAMOS - Rua Miranda Leão, s/nº - Centro'),
(95, 'AG. NHAMUNDÁ - Av. Afonso de Carvalho, s/nº - Centro'),
(96, 'AG. LAGUINHO - Rua Projetada, s/nº -  Comunidade do Laguinho'),
(97, 'AG. PARINTINS - Av. Nações Unidas, nº 2846 - Centro '),
(98, 'AG. CABURI - Travessa Central, s/nº - Caburi'),
(99, 'AG. MOCAMBO - Av. São João, s/nº - Mocambo'),
(100, 'AG. VILA AMAZÔNIA - Av. Nações Unidas, nº 2846 - Vila Amazônia'),
(101, 'AG. ZÉ AÇÚ - Rua 22 de Julho, s/nº - Zé Açú'),
(102, 'AG. BARCELOS - Av. Ajuricaba, nº 63 - Centro'),
(103, 'AG. CARVOEIRO - Rua Projetada, s/nº - Vila Carvoeiro'),
(104, 'AG. MOURA - Av. Ajuricaba, nº 63 - Moura'),
(105, 'AG. BORBA - Rua Cônego Bento, nº 331 - Centro'),
(106, 'AG. AXININ - Rua José Valete de Abreu, s/nº - Axinim'),
(107, 'AG. MANICORÉ - Travessa Pedro Tinoco - s/nº - Centro'),
(108, 'AG. CACHOEIRINHA - Rua Projetada, s/nº - Comunidade Cachoeirinha'),
(109, 'AG. NOVA OLINDA DO NORTE - Rua janary, s/nº - Centro'),
(110, 'AG. NOVO ARIPUANÃ - Av. 19 de Dezembro, s/nº - Centro'),
(111, 'AG. SÃO GABRIEL DA CACHOEIRA - Av. Castelo Branco, nº 527 - Centro'),
(112, 'AG. CUCUÍ - Av. Rio Negro, s/nº - Cucuí'),
(113, 'AG. IAUARETÊ - Rua São Miguel, s/nº - Iauaretê'),
(114, 'AG. SANTA ISABEL DO RIO NEGRO - Av. D. Pedro Maser, s/nº - Centro'),
(115, 'AG. APUÍ - Estrada do Vicinal, s/nº - Centro'),
(116, 'AG. SACUNDURI - Rua Projetada, s/nº - Vila de Suncuduri'),
(117, 'AG. HUMAITÁ - Rua República Oriental, nº 893 - Centro'),
(118, 'AG. MATUPI - Rodovia BR-230, s/nº - Transamazônica'),
(119, 'AG. AUXILIADORA - Av. N. S. de Auxiliadora, s/nº - Com. N. S. Auxiliadora'),
(120, 'AG. LÁBREA - Rua Cel. Luis Gomes, nº 905 - Centro'),
(121, 'AG. ALVARÃES - Av. 7 de Setembro, nº 586 - Centro'),
(122, 'AG. ANAMÃ - Rua Álvaro Maia, s/nº - Centro'),
(123, 'AG. ARIXI - Rua Raimundo Louredo, s/nº - Arixi'),
(124, 'AG. ANORI - Rua Manoel Delfim de Moura, s/nº - Centro'),
(125, 'AG. AMBÉ - Rua Projetada, s/nº - Vila de Ambé'),
(126, 'AG. COARI - Rua Gonçalves Ledo, nº 339 - Bairro Espírito Santo'),
(127, 'AG. CODAJÁS MIRIM - Rua Projetada, s/nº - Vila de Codajás Mirim'),
(128, 'AG. JUÇARA - Rua Projetada, s/nº - Costa do Juçara'),
(129, 'AG. CODAJÁS - Rua Getúlio Vargas, s/nº - Centro'),
(130, 'AG. MURITUBA - Av. Solimões, s/nº - Murituba'),
(131, 'AG. TEFÉ - Estrada da Colônia, s/nº - Centro'),
(132, 'AG. CAIAMBÉ - Rua São Sebastião, s/nº - Caiambé'),
(133, 'AG. UARINI - Av. Brasil, nº 166 - Centro'),
(134, 'AG. AMATURÁ - Rua Frei Pio, s/nº - Centro'),
(135, 'AG. FONTE BOA - Rua Gen. Eurico Gaspar Dutra, s/nº - Centro'),
(136, 'AG. JUTAÍ - Rua 7 de Março, s/nº - Centro'),
(137, 'AG. COPATANA - Rua Nova, s/nº - Copatana'),
(138, 'AG. SÃO PAULO DE OLIVENÇA - Rua Getúlio Vargas, s/nº - Centro'),
(139, 'AG. SANTA RITA DO WEILL - Rua Projetada, s/nº - Vila Santa Rita'),
(140, 'AG. TOCANTINS - Rua N. S. de Fátima, s/nº - Centro'),
(141, 'AG. ATALAIA DO NORTE - Rua Manuel Leão, s/nº - Centro'),
(142, 'AG. BENJAMIM CONSTANT - Av. Castelo Branco, s/nº - Centro'),
(143, 'AG. FEIJOAL - Rua Romero Juca Filho, s/nº - Com. de Feijoal'),
(144, 'AG. SANTO ANTONIO DO IÇÁ - Av. Costa e Silva, s/nº - Centro'),
(145, 'AG. ALTEROSA - Rua Projetada, s/nº - Alterosa'),
(146, 'AG. BETÂNIA - Rua Projetada, s/nº - Vila Betânia'),
(147, 'AG. TABATINGA - Rua Brasília, s/nº - Centro'),
(148, 'AG. BELÉM DO SOLIMÕES - Rua Belém, s/nº - Belém do Solimões'),
(149, 'AG. BOCA DO ACRE - Av. Amazonas, nº 4049 - Centro'),
(150, 'AG. PIQUIÁ - Av. Jacinto Ale, nº 871 - Platô do Piquiá'),
(151, 'AG. CANUTAMA - Av. Floriano Peixoto, s/nº - Centro'),
(152, 'AG. BELO MONTE - Rua Projetada, s/nº - Vila de Belo Monte'),
(153, 'AG. PAUINI - Rua 19 de Março, s/nº - Centro'),
(154, 'AG. CÉU DO MAPIÁ - Rua Projetada, s/nº - Comunidade do Mapiá'),
(155, 'AG. TAPAUÁ - Rua Ângelo dos Santos, s/nº - Centro'),
(156, 'AG. CAMARUÃ - Rua Projetada, s/nº - Com. de Camaruã'),
(157, 'AG. SÃO SEBASTIÃO DO UATUMÃ - Travessa Francisco Xavier, s/nº - Centro'),
(158, 'AG. SANTANA - Rua Santana, s/nº - Bairro dos Paraenses'),
(159, 'AG. URUCARÁ - Rua Antenor Tiago de Melo, s/nº - Centro'),
(160, 'AG. CARARÁ AÇÚ - Rua Projetada, s/nº - Cara açú'),
(161, 'AG. URUCURITUBA - Rua Eduardo Ribeiro, s/nº - Centro'),
(162, 'AG. ITAPEAÇÚ - Av. Itapeaçu, s/nº - Itapeaçú'),
(163, 'AG. VILA AUG. MONTENEGRO - Av. São José, s/nº - V. Augusto Montenegro'),
(164, 'AG. JAPURÁ - Av. Leopoldo Peres, s/nº - Centro'),
(165, 'AG. LIMOEIRO - Rua Amâncio Barbosa, s/nº - Limoeiro'),
(166, 'AG. VILA BITTENCOURT - Rua Felipe Camarão, nº 44 - Vila Bittencourt'),
(167, 'AG. MARAÃ - Av. Iran Abiff, s/nº - Centro'),
(168, 'AG. CARAUARI - Rua Anastácio Cavalcante, s/nº - Centro'),
(169, 'AG. ENVIRA - Estrada Mariano, s/nº - Centro'),
(170, 'AG. EURINEPÉ - Estrada Laurentino Bonfim, s/nº - Centro'),
(171, 'AG. ITAMARATI - Rua Francisco Pereira da Silva, nº 09 - Centro'),
(172, 'AG. ITAPIRANGA - Travessa Severiano Nunes, s/nº - Centro'),
(173, 'AG. JURUÁ - Rua São Francisco, s/nº - Centro'),
(174, 'AG. TAMANIQUÁ - Rua Projetada, s/nº - Vila de Tamaniquá'),
(175, 'AG. SILVES - Rua Álvaro Maia, s/nº - Centro'),
(176, 'AG. GUARAJÁ - Estrada Nova Floresta, s/nº - Centro'),
(177, 'AG. IPIXUNA - Rua Juruá, s/nº - Centro'),
(178, 'AG. PALMEIRAS - Rua Cel. Vilagran Cabrieta, s/nº - Palmeiras'),
(179, 'AG. ESTIRÃO DO EQUADOR - Av. Santos Dumont, nº 48 - Estirão do Equador'),
(180, 'AG. IPIRANGA - Rua Gen. Costa e Silva, nº 61 - V. Militar de Ipiranga'),
(181, 'AG. MAUÉS - Rua Nova, nº 644 - Centro'),
(182, 'ESCRITÓRIO AmGT - Rua Tito Bittencourt, nº 142 - São Francisco');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`cha_id`),
  ADD KEY `FK_chamado_2` (`sit_id`),
  ADD KEY `FK_chamado_1` (`tec_id`),
  ADD KEY `FK_chamado_3` (`pro_id`),
  ADD KEY `FK_chamado_4` (`uni_id`),
  ADD KEY `cha_id` (`cha_id`),
  ADD KEY `FK_chamado_5` (`mun_id`) USING BTREE;

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`fun_id`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`mun_id`);

--
-- Indexes for table `processo`
--
ALTER TABLE `processo`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `FK_processo_1` (`dep_id`);

--
-- Indexes for table `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`sit_id`);

--
-- Indexes for table `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`tec_id`),
  ADD KEY `FK_tecnico_1` (`fun_id`);

--
-- Indexes for table `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`uni_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chamado`
--
ALTER TABLE `chamado`
  MODIFY `cha_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;
--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `dep_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `funcao`
--
ALTER TABLE `funcao`
  MODIFY `fun_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `mun_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `processo`
--
ALTER TABLE `processo`
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `situacao`
--
ALTER TABLE `situacao`
  MODIFY `sit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `tec_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `unidade`
--
ALTER TABLE `unidade`
  MODIFY `uni_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `chamado`
--
ALTER TABLE `chamado`
  ADD CONSTRAINT `FK_chamado_1` FOREIGN KEY (`tec_id`) REFERENCES `tecnico` (`tec_id`),
  ADD CONSTRAINT `FK_chamado_2` FOREIGN KEY (`sit_id`) REFERENCES `situacao` (`sit_id`),
  ADD CONSTRAINT `FK_chamado_3` FOREIGN KEY (`pro_id`) REFERENCES `processo` (`pro_id`),
  ADD CONSTRAINT `FK_chamado_4` FOREIGN KEY (`uni_id`) REFERENCES `unidade` (`uni_id`),
  ADD CONSTRAINT `FK_chamado_5` FOREIGN KEY (`mun_id`) REFERENCES `municipio` (`mun_id`);

--
-- Limitadores para a tabela `processo`
--
ALTER TABLE `processo`
  ADD CONSTRAINT `FK_processo_1` FOREIGN KEY (`dep_id`) REFERENCES `departamento` (`dep_id`);

--
-- Limitadores para a tabela `tecnico`
--
ALTER TABLE `tecnico`
  ADD CONSTRAINT `FK_tecnico_1` FOREIGN KEY (`fun_id`) REFERENCES `funcao` (`fun_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
