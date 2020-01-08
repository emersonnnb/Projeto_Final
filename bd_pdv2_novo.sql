drop DATABASE if EXISTS bd_pdv2;

  CREATE DATABASE bd_pdv2;

  use bd_pdv2;
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
    `status_prod` int(2) NOT NULL
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

    FOREIGN KEY (`id_unidade`) REFERENCES `unidade` (`id_u`)
  );	
  
  -- --------------------------------------------------------
  --
  -- Inserindo dados da tabela `usuario`
  --
  INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `matricula`, `id_unidade`,`telefone`,`ramal`,`email`,`senha`, `situacao`) VALUES
  (1, 'emerson','oliveira', '059099',NULL,21213434,222,'emersonnnb@hotmail.com','e10adc3949ba59abbe56e057f20f883e', 0);
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
