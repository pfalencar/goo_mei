-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2019 às 03:14
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gomei`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `cel` varchar(20) NOT NULL,
  `sexo` char(1) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `nome_mae` varchar(200) NOT NULL,
  `nome_pai` varchar(200) DEFAULT NULL,
  `cep` varchar(20) NOT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_usuario`, `nome`, `cpf`, `email`, `tel`, `cel`, `sexo`, `rg`, `nome_mae`, `nome_pai`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `uf`) VALUES
(1, 1, 'LucrÃ©cia', '357159789-00', 'lucrecia@gmail.com', '11 2678-7894', '11 9 7845-7845', 'F', '789435498-3', 'Dona LucrÃ©cia', 'Seu SebastiÃ£o', '06812-154', 'Rua Boituva', '456', 'BrÃ¡s', 'Porto RincÃ£o', 'RJ'),
(2, 1, 'SebastiÃ£o', '123456789-01', 'sebastiao@gmail.com', '11 2678-7894', '11 9 7845-7845', 'M', '789435498-1', 'Dona Maria', 'JosÃ© Roberto', '06812-154', 'Rua Barata Ribeiro', '45', 'Jd. ArtrÃ³podes', 'Bauru', 'SP'),
(4, 1, 'Zenaide Silva e Silva', '546789123-48', 'zenaide@gmail.com', '11 4567 7894', '11 97875 4587', 'F', '45789135-7', 'Raquel Silva', 'JosÃ© Silva', '054789-789', 'Rua Van Gogh', '789', 'Jd. dos Artistas', 'SÃ£o Paulo', 'AC'),
(5, 1, 'MarÃ­lia', '357159789-03', 'marilia@gmail.com', '11 4250-7894', '11 9 9978-7845', 'F', '32.455.674-3', 'JanaÃ­na', 'Felisberto', '02540000', 'Rua Mardoqueu', '458', 'Vl. Nova Iorque', 'MarÃ­lia', 'SP'),
(6, 2, 'Astrovaldo', '357159789-03', 'astro@gmail.com', '11 2678-7894', '11 9 7845-7845', 'M', '37.843.367-2', 'Maria Joana', 'Marcos', '06812-100', 'Rua AraucÃ¡ria', '123', 'Pq.. Bristol', 'SÃ£o Paulo', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_mei` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fornecedor` varchar(200) NOT NULL,
  `descricaocompra` varchar(200) NOT NULL,
  `dtcompra` datetime NOT NULL,
  `valorcompra` decimal(7,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id_compra`, `id_fornecedor`, `id_mei`, `id_usuario`, `fornecedor`, `descricaocompra`, `dtcompra`, `valorcompra`) VALUES
(12, 2, 2, 2, 'NestlÃ¨', 'Chocolate meio amargo 1kg', '2019-12-03 17:03:50', '49.99'),
(9, 10, 1, 1, 'HP', 'Mouse Ã³ptico sem fio', '2019-12-03 16:30:44', '100.00'),
(4, 4, 1, 1, 'Limpe mais - itens de limpeza', 'Ãgua SanitÃ¡ria 1L', '2019-11-29 16:35:18', '15.00'),
(5, 8, 1, 1, 'Bonafonte', 'Fardo de 6L de Ã¡gua', '2019-11-29 16:36:01', '15.99'),
(8, 12, 1, 1, 'Microsoft', 'Mouse e teclado sem fio em Ãºnico USB', '2019-12-02 13:46:01', '149.90'),
(10, 9, 1, 1, 'Lenovo', 'Notebook Intel Core i3-6006U, 4GB RAM, HD 500 GB', '2019-12-03 16:32:26', '1500.00'),
(11, 11, 1, 1, 'AutenticaÃ§Ã£o Digital', 'autenticaÃ§Ã£o para site', '2019-12-03 16:38:15', '200.00'),
(13, 3, 2, 2, 'Rafaela Embalagens para alimentos', 'Embalagens de trufa pacote com 10', '2019-12-03 17:05:14', '5.00'),
(14, 13, 2, 2, 'Brastemp', 'Freezer Vertical 400 litros', '2019-12-03 17:07:28', '2000.00'),
(15, 13, 2, 2, 'Brastemp', 'Geladeira 400 litros', '2019-12-03 17:08:28', '2089.90'),
(16, 2, 2, 2, 'NestlÃ¨', 'Chocolate ao leite 1kg', '2019-12-03 17:09:26', '45.50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `id_contrato` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_mei` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `nomefuncionario` varchar(200) NOT NULL,
  `iniciocontrato` date NOT NULL,
  `fimcontrato` date DEFAULT NULL,
  `horarioservico` varchar(200) NOT NULL,
  `valorhora` varchar(20) DEFAULT NULL,
  `dtpagamento` varchar(20) NOT NULL,
  `valorpagamento` decimal(7,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`id_contrato`, `id_usuario`, `id_mei`, `id_funcionario`, `nomefuncionario`, `iniciocontrato`, `fimcontrato`, `horarioservico`, `valorhora`, `dtpagamento`, `valorpagamento`) VALUES
(2, 2, 2, 1, 'MÃ¡rcio Lucca Baptista', '2018-06-06', '2019-05-31', '8h - 18h', '5.42', '05', '954.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id_estoque` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descricaoEstoque` varchar(200) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `quantidade` decimal(7,2) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id_estoque`, `id_usuario`, `descricaoEstoque`, `preco`, `quantidade`, `dt`) VALUES
(1, 1, 'ERP', '5000.00', '1.00', '2019-11-30 16:40:09'),
(2, 1, 'E-commerce', '1000.00', '1.00', '2019-11-30 16:40:41'),
(3, 1, 'Site', '500.00', '1.00', '2019-12-02 03:13:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_razaosocial` varchar(200) NOT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `inscricaoestadual` varchar(20) NOT NULL,
  `inscricaomunicipal` varchar(32) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `cel` varchar(20) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `nome_mae` varchar(200) DEFAULT NULL,
  `nome_pai` varchar(200) DEFAULT NULL,
  `cep` varchar(20) NOT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `id_usuario`, `nome_razaosocial`, `cpf_cnpj`, `inscricaoestadual`, `inscricaomunicipal`, `email`, `tel`, `cel`, `sexo`, `rg`, `nome_mae`, `nome_pai`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `uf`) VALUES
(4, 1, 'Limpe mais - itens de limpeza', '753159/0001', '753159/0001SP', '753159/0001-78', 'queijomolico@gmail.com', '11 4678-7894', '11 9 4545-7841', '', '', '', '', '05489-158', '', '1234', '', '', 'SP'),
(2, 2, 'NestlÃ¨', '12348979/0001-25', '1234589/0001-25SP', '1234100/000-25SP', 'nestle@gmail.com', '11 2678-7812', '11 9 7845-7812', '', '', '', '', '02548-458', 'Rua CipÃ³', '98', 'Jd. Floresta', 'SÃ£o Caetano do Sul', 'SP'),
(12, 1, 'Microsoft', '12348979/0001', '123456100/0001', '21234567890SP', 'microsoft@gmail.com', '11 4578-7894', '11 9 7845-2312', '', '', '', '', '04789-480', 'Av. Brigadeiro LuÃ­s AntÃ´nio', '5784', 'Pinheiros', 'SÃ£o Paulo', 'SP'),
(6, 3, 'Forn de farinha de trigo', '12348979/0001', '123456782100', '123456782100SP', 'farinhadetrigo@gmail.com', '11 2678-7894', '11 9 7845-7845', 'F', '21.600.091-9', 'Dona Josefa', 'Seu Marinho', '06812-154', 'Rua BavÃ¡ria', '458', 'Jd. dos Perfumes', 'Porto Alegre', 'RS'),
(7, 3, 'Forn de aÃ§Ãºcar cristal', '12348979/0001-25', '1234561000/0001', '123456100/0001SP', 'acucarcristal@gmail.com', '11 2678-0094', '11 97898-7894', 'M', '789435498-1', 'Maria Doce', 'JoÃ£o das Claras Neve', '02598-741', 'Rua Sancho PanÃ§a', '789', 'Jd. Gaivotas', 'SÃ£o Paulo', 'SP'),
(8, 1, 'Bonafonte', '12348979/0001-25', '123456782100', '123456100/0001SP', 'chocoembarra@gmail.com', '11 2678-7894', '21 97898-7894', '', '', '', '', '06812-154', 'Av. AlcÃ¢ntara Machado', '5054', '', 'SÃ£o Paulo', 'SP'),
(9, 1, 'Lenovo', '12348979/0001-25', '123456782100', '123456789/0001SP', 'lenovo@gmail.com', '11 6578-7894', '11 92678-5555', '', '', '', '', '06812-710', 'Rua Brasil', '45678', 'Jd. Planalto', 'Cotia', 'SP'),
(10, 1, 'HP', '7894654/0001', '654987001', '646798321SP', 'hpbrasil@gmial.com', '11 4878-1579', '11 92678-5555', '', '', '', '', '04589-780', 'Rua GroenlÃ¢ndia', '4578', 'Jd. da Paz', 'SÃ£o Paulo', 'SP'),
(11, 1, 'AutenticaÃ§Ã£o Digital', '4679871/0001', '564873130001', '164987321SP', 'autenticacaodigital@gmail.com', '11 6887-7894', '11 98745-7894', '', '', '', '', '07546-789', 'Rua Bela Cintra', '458', 'Bela Vista', 'SÃ£o Paulo', 'SP'),
(13, 2, 'Brastemp', '12348979/0001-25', '123456100/0001', '123456789/0001SP', 'baste', '11 2678-7894', '11 9 7845-7845', '', '', '', '', '04579-702', 'Rua ConcÃ³rdia', '124', 'Jd. VitÃ³ria', 'SÃ£o Bernardo do Campo', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `cel` varchar(20) NOT NULL,
  `sexo` char(1) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `nome_mae` varchar(200) NOT NULL,
  `nome_pai` varchar(200) DEFAULT NULL,
  `cep` varchar(20) NOT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `ctps` varchar(20) DEFAULT NULL,
  `pispasep` varchar(20) DEFAULT NULL,
  `numeroconta` varchar(20) DEFAULT NULL,
  `tipoconta` varchar(50) DEFAULT NULL,
  `nomebanco` varchar(50) DEFAULT NULL,
  `agenciabancaria` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `id_usuario`, `nome`, `cpf`, `email`, `tel`, `cel`, `sexo`, `rg`, `nome_mae`, `nome_pai`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `uf`, `ctps`, `pispasep`, `numeroconta`, `tipoconta`, `nomebanco`, `agenciabancaria`) VALUES
(1, 2, 'MÃ¡rcio Lucca Baptista', '341.596.988-67', 'marciobaptista@gmail.com.br', '(11) 3921-8376', '(11) 99769-3550', 'M', '37.425.037-6', 'Heloise Malu Silvana', 'Roberto Felipe Bryan Baptista', '02677-020', 'Rua ClÃ¡udio Gonzaga de Souza', '325', 'Jardim Peri', 'SÃ£o Paulo', 'SP', '4567-789', '478.47217.76-7', '13242729-6', 'Corrente', 'ItaÃº', '0640'),
(3, 2, 'LetÃ­cia Gabriela Paes', '848.681.318-26', 'leticiagabrielapaes@gmail.com.br', '(11) 2596-5371', '(11) 98482-5660', 'F', '34.652.388-6', 'Alessandra Raimunda', 'Oliver CÃ©sar Ian Paes', '08452-290', 'Rua Lopes de Cascais', '263', 'Jardim Augusta', 'SÃ£o Paulo', 'SP', '45678-70', '756.75066.19-2', '09344145-7', 'Corrente', 'Santander', '4728');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mei`
--

CREATE TABLE `mei` (
  `id_mei` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nomecompleto` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `razaosocial` varchar(200) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `ocupacaoprincipal` varchar(200) NOT NULL,
  `ocupacaosecundaria` varchar(200) DEFAULT NULL,
  `cpf` varchar(15) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `cel` varchar(20) NOT NULL,
  `sexo` char(1) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `nome_mae` varchar(200) NOT NULL,
  `nome_pai` varchar(200) DEFAULT NULL,
  `cep` varchar(20) NOT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mei`
--

INSERT INTO `mei` (`id_mei`, `id_usuario`, `nomecompleto`, `email`, `razaosocial`, `cnpj`, `ocupacaoprincipal`, `ocupacaosecundaria`, `cpf`, `tel`, `cel`, `sexo`, `rg`, `nome_mae`, `nome_pai`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `uf`) VALUES
(1, 1, 'Paloma dos Santos Almeida', '', 'Paloma Startup', '18.373.051/0001-24', 'Programadora Independente', 'Professora', '073.445.390-63', '(11) 2823-4952', '(11) 99159-1445', 'F', '37.843.367-2', 'LaÃ­s Liz', 'Joaquim Levi Augusto Lopes', '03590-170', 'Rua IrmÃ£o Nicolau da Fonseca', '741', 'Conjunto Habitacional Padre Manoel da NÃ³brega', 'SÃ£o Paulo', 'SP'),
(2, 2, 'Joana Carolina Peixoto', 'joana@gmail.com', 'Joana Chocolates', '49.052.020/0001-03', 'Vendedora de trufas', 'Fabricante de trufas', '631.681.828-93', '(11) 3537-4750', '(11) 98142-3188', 'F', '32.455.674-3', 'TÃ¢nia Mirella Carolina', 'ClÃ¡udio Igor Theo Peixoto', '02129-001', 'Rua Sargento Agostinho Ferreira', '539', 'Vila Maria', 'SÃ£o Paulo', 'SP'),
(5, 4, 'Sirlei da Silva Sauro', '', 'Sirlei LTDA.', '4678979812/0001', 'Vendedora de trufas', '', '123465897-45', '11 2678-5555', '11 9 7845-7841', 'F', '15.915.720-1', 'Izabel', 'JosÃ©', '03680000', 'Rua JosÃ©', '377', 'BrÃ¡s', 'SÃ£o Paulo', 'uf'),
(4, 3, 'Patricia F. Barbosa', 'p@gmail.com', 'Barbosa Ltda.', '86.258.499/0001-78', 'Confeiteira', 'Cozinheira Independente', '357159789-03', '21 4567-7894', '21 97898-7894', 'F', '789435498-3', 'Lais', 'LuÃ­s', '06812-100', 'Av. Ataliba', '456', 'Jd. Leonel', 'VitÃ³ria', 'ES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descricaoservico` varchar(200) NOT NULL,
  `precoservico` decimal(7,2) NOT NULL,
  `quantidadeservico` decimal(7,2) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `id_usuario`, `descricaoservico`, `precoservico`, `quantidadeservico`, `dt`) VALUES
(1, 1, 'Cortar grama', '20.00', '1.00', '2019-12-02 02:32:38'),
(2, 1, 'Cortar cabelo', '20.00', '1.00', '2019-12-02 02:33:46'),
(5, 1, 'ManutenÃ§Ã£o grande do Sistema ERP', '1000.00', '1.00', '2019-12-03 16:16:27'),
(4, 1, 'ManutenÃ§Ã£o pequena do Sistema ERP', '100.00', '1.00', '2019-12-03 16:13:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(200) NOT NULL,
  `email_usuario` varchar(200) NOT NULL,
  `senha_usuario` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`) VALUES
(1, 'Paloma', 'paloma@gmail.com', 'f27f6f1c7c5cbf4e3e192e0a47b85300'),
(2, 'Joana', 'joana@gmail.com', '2af54305f183778d87de0c70c591fae4'),
(3, 'Patricia Fernandes', 'patricia@gmail.com', 'f27f6f1c7c5cbf4e3e192e0a47b85300'),
(4, 'Sirlei', 'sirlei@gmail.com', '9f6e6800cfae7749eb6c486619254b9c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendaservico`
--

CREATE TABLE `vendaservico` (
  `id_venda_servico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_mei` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  `descricaoservico` varchar(200) NOT NULL,
  `valorunitario` decimal(7,2) NOT NULL,
  `qtd` decimal(7,2) NOT NULL,
  `nomecliente` varchar(200) NOT NULL,
  `formapgto` varchar(50) NOT NULL,
  `dtvenda` datetime NOT NULL,
  `valortotal` decimal(7,2) NOT NULL,
  `situacao` varchar(12) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendaservico`
--

INSERT INTO `vendaservico` (`id_venda_servico`, `id_usuario`, `id_mei`, `id_cliente`, `id_servico`, `descricaoservico`, `valorunitario`, `qtd`, `nomecliente`, `formapgto`, `dtvenda`, `valortotal`, `situacao`) VALUES
(1, 1, 1, 2, 2, 'Cortar cabelo', '20.00', '2.00', 'Sebastião', 'Dinheiro', '2019-12-02 17:33:29', '40.00', 'CANCELADA'),
(2, 1, 1, 1, 2, 'Cortar cabelo', '20.00', '5.00', 'LucrÃ©cia', 'dinheiro', '2019-12-02 18:34:33', '100.00', 'CANCELADA'),
(3, 1, 1, 5, 1, 'Cortar grama', '20.00', '5.00', 'MarÃ­lia', 'dinheiro', '2019-12-03 22:38:56', '100.00', 'REALIZADA'),
(4, 1, 1, 1, 2, 'Cortar cabelo', '20.00', '4.00', 'LucrÃ©cia', 'dinheiro', '2019-12-03 22:58:30', '80.00', 'REALIZADA'),
(5, 1, 1, 1, 2, 'Cortar cabelo', '20.00', '5.00', 'LucrÃ©cia', 'cartao', '2019-12-03 23:33:27', '100.00', 'REALIZADA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_fornecedor` (`id_fornecedor`),
  ADD KEY `id_mei` (`id_mei`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id_contrato`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_mei` (`id_mei`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id_estoque`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `mei`
--
ALTER TABLE `mei`
  ADD PRIMARY KEY (`id_mei`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `vendaservico`
--
ALTER TABLE `vendaservico`
  ADD PRIMARY KEY (`id_venda_servico`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_mei` (`id_mei`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_servico` (`id_servico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mei`
--
ALTER TABLE `mei`
  MODIFY `id_mei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vendaservico`
--
ALTER TABLE `vendaservico`
  MODIFY `id_venda_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
