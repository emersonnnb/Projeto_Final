-- Database: `bd_pdv2`

drop DATABASE if EXISTS bd_pdv2;

CREATE DATABASE IF NOT EXISTS `bd_pdv2`;

USE `bd_pdv2`;

-- Estrutura da tabela `empresa`

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(1) NOT NULL primary key,
  `nome_empresa` varchar(100) NOT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `endereco_empresa` varchar(255) NOT NULL,
  `bairro_empresa` varchar(100) NOT NULL,
  `cidade_empresa` varchar(100) NOT NULL,
  `uf_empresa` varchar(2) NOT NULL,
  `contato_empresa` varchar(20) NOT NULL
);
INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `cpf_cnpj`, `endereco_empresa`, `bairro_empresa`, `cidade_empresa`, `uf_empresa`, `contato_empresa`) VALUES
(1, 'AugustoAraujo.net', '69196222204', 'Av. Antonio picanço da silva, 2041', 'Novo Horizonte', 'Macapá', 'AP', '991161893');

-- Estrutura da tabela `categoria`

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(25) NOT NULL AUTO_INCREMENT primary key,
  `nome` varchar(255) NOT NULL  
);
INSERT INTO `categoria` (`idCategoria`, `nome`) VALUES
(1, 'Massas'),
(2, 'Cereias');

-- Estrutura da tabela `sub_categoria`

CREATE TABLE IF NOT EXISTS `sub_categoria` (
  `idSubcategoria` int(25) NOT NULL AUTO_INCREMENT primary key,
  `id_categoria` int(11) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,

foreign key  (id_categoria) references categoria (idCategoria)
);
INSERT INTO `sub_categoria` (`idSubcategoria`, `id_categoria`, `nome`) VALUES
(1, 1, 'Macarr?o'),
(2, 2, 'Arroz');

-- Estrutura da tabela `forma_pagamento`

CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `idPagamento` int(25) NOT NULL AUTO_INCREMENT primary key,
  `descricao` varchar(255) NOT NULL,
  `dataCadastro` date NOT NULL,
  `usuarioCad` int(1) NOT NULL  
);

-- Estrutura da tabela `logs`

CREATE TABLE IF NOT EXISTS `logs` (
  `idLogs` int(255) NOT NULL AUTO_INCREMENT primary key,
  `nome_user` varchar(255) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `tabela` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `datatime` datetime NOT NULL,
  `pc` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL
);
INSERT INTO `logs` (`idLogs`, `nome_user`, `tipo`, `tabela`, `descricao`, `datatime`, `pc`, `ip`) VALUES
(1, '', 'Saiu', 'Usuï¿½rio', ' saiu do sistema', '2020-01-13 21:27:00', '37DE150590.senacrjedu.local', '::1'),
(2, 'Emerson Oliveira', 'Entrou', 'Usuario', 'Usurio entrou no sistema', '2020-01-13 21:27:06', '37DE150590.senacrjedu.local', '::1'),
(3, 'Emerson Oliveira', 'Saiu', 'Usuï¿½rio', 'Emerson Oliveira saiu do sistema', '2020-01-13 21:47:50', '37DE150590.senacrjedu.local', '::1');

-- Estrutura da tabela `pdv`

CREATE TABLE IF NOT EXISTS `pdv` (
  `idPdv` int(25) NOT NULL AUTO_INCREMENT primary key,
  `nome` varchar(10) NOT NULL,
  `dataCad` date NOT NULL,
  `usuarioCad` varchar(50) DEFAULT NULL,
  `statusPdv` int(1) NOT NULL
);
INSERT INTO `pdv` (`idPdv`, `nome`, `dataCad`, `usuarioCad`, `statusPdv`) VALUES
(1, '01', '2020-01-13', NULL, 1),
(2, '02', '2020-01-13', NULL, 1);

-- Estrutura da tabela `permissoes`

CREATE TABLE IF NOT EXISTS `permissoes` (
  `idPermissao` int(25) NOT NULL AUTO_INCREMENT primary key,
  `id_usuario` varchar(25) DEFAULT NULL,
  `tipo` varchar(255) NOT NULL,
  `situacao` varchar(25) NOT NULL  
);

INSERT INTO `permissoes` (`idPermissao`, `id_usuario`, `tipo`, `situacao`) VALUES
(1, 1, 'permissoes', 'ativo'),
(2, 1, 'usuarios', 'ativo'),
(3, 1, 'pdv', 'ativo'),
(4, 1, 'vendas', 'ativo'),
(5, 1, 'vencimentos', 'ativo'),
(6, 1, 'estoqueminimo', 'ativo'),
(7, 1, 'estoque', 'ativo'),
(8, 1, 'dados-empresa', 'ativo');

-- Estrutura da tabela `produto`


CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int(25) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `id_unidade` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) DEFAULT NULL,
  `precoCusto` decimal(10,2) NOT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `codigoBarra` int(15) DEFAULT NULL,
  `dataCad` date NOT NULL,
  `usuarioCad` varchar(50) DEFAULT NULL,
  `statusProduto` int(1) NOT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `id_unidade` (`id_unidade`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_subcategoria` (`id_subcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `codigo`, `nome`, `id_unidade`, `id_categoria`, `id_subcategoria`, `precoCusto`, `precoVenda`, `codigoBarra`, `dataCad`, `usuarioCad`, `statusProduto`) VALUES
(1, '12', 'Arroz', 2, 2, 2, '5.50', '8.50', NULL, '2020-01-13', NULL, 0);

-- --------------------------------------------------------



--
-- Estrutura da tabela `unidade_medida`
--

DROP TABLE IF EXISTS `unidade_medida`;
CREATE TABLE IF NOT EXISTS `unidade_medida` (
  `idUnidade` int(25) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUnidade`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidade_medida`
--

INSERT INTO `unidade_medida` (`idUnidade`, `nome`) VALUES
(1, 'Unidade'),
(2, 'Kg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(25) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `id_pdv` int(25) DEFAULT NULL,
  `situacao` int(1) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `id_pdv` (`id_pdv`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `cpf`, `senha`, `id_pdv`, `situacao`) VALUES
(1, 'Emerson Oliveira', '059099', 'e10adc3949ba59abbe56e057f20f883e', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `idVenda` int(25) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) DEFAULT NULL,
  `id_pdv` int(11) DEFAULT NULL,
  `codigoProd` varchar(255) DEFAULT NULL,
  `nomeProd` varchar(255) NOT NULL,
  `qtdProduto` decimal(10,2) NOT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `desconto` decimal(10,2) NOT NULL,
  `acrescimento` decimal(10,2) NOT NULL,
  `valorTotal` decimal(10,2) NOT NULL,
  `dataVenda` datetime NOT NULL,
  `nome_pdv` varchar(10) DEFAULT NULL,
  `statusVenda` int(1) NOT NULL,
  `usuarioCad` int(1) NOT NULL,
  PRIMARY KEY (`idVenda`),
  KEY `id_produto` (`id_produto`),
  KEY `id_pdv` (`id_pdv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD CONSTRAINT `permissoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_unidade`) REFERENCES `unidade_medida` (`idUnidade`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`id_subcategoria`) REFERENCES `sub_categoria` (`idSubcategoria`);

--
-- Limitadores para a tabela `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD CONSTRAINT `sub_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_pdv`) REFERENCES `pdv` (`idPdv`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`id_pdv`) REFERENCES `pdv` (`idPdv`);
COMMIT;
