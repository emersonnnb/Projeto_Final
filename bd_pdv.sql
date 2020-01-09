drop DATABASE if EXISTS bd_pdv;

  CREATE DATABASE bd_pdv;

  use bd_pdv;
  --
  -- Estrutura da tabela `empresa`
  --
  CREATE TABLE IF NOT EXISTS `empresa` (
    `id_empresa` int(1) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `nome_empresa` varchar(100) NOT NULL,
    `cpf_cnpj` varchar(20) NOT NULL,
    `endereco_empresa` varchar(255) NOT NULL,
    `bairro_empresa` varchar(100) NOT NULL,
    `cidade_empresa` varchar(100) NOT NULL,
    `uf_empresa` varchar(2) NOT NULL,
    `contato_empresa` varchar(20) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  --
  -- Inserindo dados da tabela `empresa`
  --
  INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `cpf_cnpj`, `endereco_empresa`, `bairro_empresa`, `cidade_empresa`, `uf_empresa`, `contato_empresa`) VALUES
  (1, 'AugustoAraujo.net', '69196222204', 'Av. Antonio picanÃ§o da silva, 2041', 'Novo Horizonte', 'MacapÃ¡', 'AP', '991161893');
  -- --------------------------------------------------------
  --
  -- Estrutura da tabela `logs`
  --
  CREATE TABLE IF NOT EXISTS `logs` (
    `id` int(255) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `usuario` varchar(100) NOT NULL,
    `tipo` varchar(100) NOT NULL,
    `tabela` varchar(100) NOT NULL,
    `descricao` longtext NOT NULL,
    `datatime` datetime NOT NULL,
    `pc` varchar(100) NOT NULL,
    `ip` varchar(100) NOT NULL
  );

  -- --------------------------------------------------------
  --
  -- Estrutura da tabela `produtos`
  --
  CREATE TABLE IF NOT EXISTS `produtos` (
    `id` int(255) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `descricao` varchar(100) NOT NULL,
    `fornecedor` varchar(100) NOT NULL,
    `unidade` varchar(100) NOT NULL,
    `em_Uso` int(10) NOT NULL,
    `em_Reparo` int(10) NOT NULL,
    `observacao` varchar(255) NOT NULL,  
    `datacad` date NOT NULL,
    `usuariocad` varchar(100) NOT NULL,
    `status_prod` int(2) NOT NULL,
    `codigobarra` varchar(50) NOT NULL
  );
  --
  -- Inserindo dados da tabela `Produtos`
  --
  INSERT INTO `produtos` (`id`,`descricao`,`fornecedor`,`unidade`,`em_Uso`,`em_Reparo`,`observacao`,`datacad`,`usuariocad`,`status_prod`) VALUES
  (1,'Mesa','C&C','Barra',5,15,'teste de observacao','2019-11-17','emerson',1  );
  -- --------------------------------------------------------
  --
  -- Estrutura da tabela `unidade`
  --
  CREATE TABLE IF NOT EXISTS `unidade` (
  `id_u` int(255) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `descricao_u` varchar(50) NOT NULL,
  `id_usuario` int,
  `datacad` date NOT NULL,  
  `status_uni` int(2) NOT NULL    
  ); 
  -- --------------------------------------------------------
  --
  -- Inserindo dados da tabela `unidade`
  --
  INSERT INTO `unidade` (`id_u`, `descricao_u`,`datacad`,`id_usuario`,`status_uni`) VALUES
  (1, 'Botafogo','2019-01-03', 1, 1),
  (2, 'Barra','2019-01-03', 1, 1),
  (3, 'Duque de caxias','2019-01-03', 1, 1),
  (4, 'São Cristovão','2019-01-03', 1, 1); 
 -- --------------------------------------------------------
  --
  -- Estrutura da tabela `usuario`
  --
  CREATE TABLE IF NOT EXISTS `usuario` (
    `id` int(255) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `nome` varchar(100) NOT NULL,
    `sobrenome` varchar(100) NOT NULL,
    `matricula` varchar(30) NOT NULL,
    `id_unidade` int,
    `telefone` int(100) NOT NULL,
    `ramal` int(100) NOT NULL,
    `email` varchar(255) NOT NULL,
    `senha` varchar(255) NOT NULL,
    `situacao` int(2) NOT NULL,
    `caixa` int(2) NOT NULL,


    FOREIGN KEY (`id_unidade`) REFERENCES `unidade` (`id_u`)
  );	
  
  -- --------------------------------------------------------
  --
  -- Inserindo dados da tabela `usuario`
  --
  INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `matricula`, `id_unidade`,`telefone`,`ramal`,`email`,`senha`, `situacao`, `caixa`) VALUES
  (1, 'emerson','oliveira', '059099',NULL,21213434,222,'emersonnnb@hotmail.com','e10adc3949ba59abbe56e057f20f883e', 0, 01);
  -- --------------------------------------------------------
  --
  -- Estrutura da tabela `fornecedor`
  --
  CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_f` int(255) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `descricao_f` varchar(50) NOT NULL,
  `datacad` date NOT NULL,
  `usuariocad` varchar(100) NOT NULL,
  `status_for` int(2) NOT NULL
  );
  -- --------------------------------------------------------
  --
  -- Inserindo dados da tabela `fornecedor`
  --
  INSERT INTO `fornecedor` (`id_f`, `descricao_f`) VALUES
  (1, 'Shopp. Matriz'),
  (2, 'Casa show'),
  (3, 'C&C');  
  -- --------------------------------------------------------
  --
  -- Estrutura da tabela `permissoes`
  --
  CREATE TABLE IF NOT EXISTS `permissoes` (
    `id` int(255) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_usuario` int,
    `item` varchar(50) NOT NULL,
    `valor` varchar(20) NOT NULL,
	
	FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
  );
  -- --------------------------------------------------------
  -- Inserindo dados da tabela `permissoes`
  --
  INSERT INTO `permissoes` (`id`, `id_usuario`, `item`, `valor`) VALUES
  (1, 1, 'permissoes', 'ativo'),
  (2, 1, 'usuarios', 'ativo'),
  (3, 1, 'pdv', 'ativo'),
  (4, 1, 'vendas', 'ativo'),
  (5, 1, 'vencimentos', 'ativo'),
  (6, 1, 'estoqueminimo', 'ativo'),
  (7, 1, 'estoque', 'ativo'),
  (8, 1, 'pdv', 'ativo'),
  (9, 1, 'dados-empresa', 'ativo'),
  (10,1, 'pro_uni_for', 'ativo');

  -- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
`id` int(255) NOT NULL,
  `id_venda` varchar(255) NOT NULL,
  `codigobarra` varchar(255) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade_produto` decimal(10,2) NOT NULL,
  `valor_produto` decimal(10,2) NOT NULL,
  `valor_total_produto` decimal(10,2) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `data_venda` date NOT NULL,
  `caixa_venda` int(255) NOT NULL,
  `situacao` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `id_venda`, `codigobarra`, `nome_produto`, `quantidade_produto`, `valor_produto`, `valor_total_produto`, `id_usuario`, `data_venda`, `caixa_venda`, `situacao`) VALUES
(11, '02122019111225', '123', 'Pimenta cominho', '2.00', '1.50', '3.00', 1, '2019-12-02', 1, 'fechada'),
(12, '02122019111225', '7896572021610', 'Charque', '1.50', '3.00', '4.50', 1, '2019-12-02', 1, 'fechada'),
(13, '02122019161248', '123', 'Pimenta cominho', '1.00', '1.50', '1.50', 1, '2019-12-02', 1, 'fechada'),
(14, '02122019161248', '111', 'Feijão preto', '2.00', '4.50', '9.00', 1, '2019-12-02', 1, 'fechada'),
(15, '02122019161248', '123456', 'Cheiro verde', '3.00', '1.50', '4.50', 1, '2019-12-02', 1, 'fechada'),
(16, '02122019161230', '111', 'Feijão preto', '2.00', '4.50', '9.00', 1, '2019-12-02', 1, 'fechada'),
(17, '02122019161230', '123456', 'Cheiro verde', '3.00', '1.50', '4.50', 1, '2019-12-02', 1, 'fechada'),
(18, '02122019161230', '123456789', 'Cerveja Skol', '5.00', '2.50', '12.50', 1, '2019-12-02', 1, 'fechada'),
(19, '02122019161241', '123456789', 'Cerveja Skol', '5.00', '2.50', '12.50', 1, '2019-12-02', 1, 'fechada'),
(20, '02122019161241', '123', 'Pimenta cominho', '5.00', '1.50', '7.50', 1, '2019-12-02', 1, 'fechada'),
(21, '02122019161241', '111', 'Feijão preto', '3.00', '4.50', '13.50', 1, '2019-12-02', 1, 'fechada'),
(22, '02122019161214', '111', 'Feijão preto', '2.00', '4.50', '9.00', 1, '2019-12-02', 1, 'fechada'),
(23, '02122019161249', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-02', 1, 'fechada'),
(24, '02122019161244', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-02', 1, 'fechada'),
(25, '02122019161212', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-02', 1, 'fechada'),
(26, '02122019161219', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-02', 1, 'fechada'),
(27, '02122019171252', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-02', 1, 'fechada'),
(28, '02122019171237', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-02', 1, 'fechada'),
(29, '02122019171211', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-02', 1, 'fechada'),
(30, '02122019171250', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-02', 1, 'fechada'),
(31, '02122019171253', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-02', 1, 'fechada'),
(32, '02122019171220', '123', 'Pimenta cominho', '1.00', '1.50', '1.50', 1, '2019-12-02', 1, 'fechada'),
(33, '02122019171218', '123', 'Pimenta cominho', '1.00', '1.50', '1.50', 1, '2019-12-02', 1, 'fechada'),
(34, '05122019121211', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(35, '05122019121259', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(36, '05122019121220', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(37, '05122019141226', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(38, '05122019141232', '123', 'Pimenta cominho', '1.00', '1.50', '1.50', 1, '2019-12-05', 1, 'fechada'),
(39, '05122019141258', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(40, '05122019141248', '111', 'Feijão preto', '2.00', '4.50', '9.00', 1, '2019-12-05', 1, 'fechada'),
(41, '05122019141252', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(42, '05122019151232', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(43, '05122019151211', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(44, '05122019151238', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(45, '05122019161246', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(46, '05122019161221', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(47, '05122019161204', '111', 'Feijão preto', '2.00', '4.50', '9.00', 1, '2019-12-05', 1, 'fechada'),
(48, '05122019161245', '7896572021610', 'Charque', '2.00', '3.00', '6.00', 1, '2019-12-05', 1, 'fechada'),
(49, '05122019161201', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(50, '05122019161201', '7896572021610', 'Charque', '1.50', '3.00', '4.50', 1, '2019-12-05', 1, 'fechada'),
(51, '05122019211205', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-05', 1, 'fechada'),
(61, '05122019211205', '123456789', 'Cerveja Skol', '10.00', '2.50', '25.00', 1, '2019-12-06', 1, 'fechada'),
(62, '05122019211205', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-14', 1, 'fechada'),
(64, '20122019191225', '111', 'Feijão preto', '2.00', '4.50', '9.00', 1, '2019-12-20', 1, 'fechada'),
(65, '20122019191225', '111', 'Feijão preto', '2.00', '4.50', '9.00', 1, '2019-12-20', 1, 'fechada');

