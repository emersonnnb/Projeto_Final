drop DATABASE if EXISTS bd_pdv;

CREATE DATABASE bd_pdv;

use bd_pdv;

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE IF NOT EXISTS `caixa` (
  `id` int(255) NOT NULL,
  `num_caixa` varchar(255) NOT NULL,
  `id_venda` int(255) NOT NULL,
  `valor_cartao` decimal(10,2) NOT NULL,
  `valor_dinheiro` decimal(10,2) NOT NULL,
  `valor_recebido` decimal(10,2) NOT NULL,
  `valor_compra` decimal(10,2) NOT NULL,
  `valor_troco` decimal(10,2) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `data_caixa` datetime NOT NULL,
  `situacao` varchar(20) NOT NULL
);

--
-- Extraindo dados da tabela `caixa`
--

INSERT INTO `caixa` (`id`, `id_caixa`, `id_venda`, `valor_cartao`, `valor_dinheiro`, `valor_recebido`, `valor_compra`, `valor_troco`, `id_usuario`, `data_caixa`, `situacao`) VALUES
(15, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-02 17:20:24', 'fechada'),
(16, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-02 17:39:15', 'fechada'),
(17, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-02 17:40:05', 'fechada'),
(18, '1', 2147483647, '0.00', '1.50', '1.50', '1.50', '0.00', 1, '2019-12-02 17:41:36', 'fechada'),
(19, '1', 2147483647, '0.00', '1.50', '1.50', '1.50', '0.00', 1, '2019-12-02 17:42:31', 'fechada'),
(20, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-05 12:06:23', 'fechada'),
(21, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-05 12:08:10', 'fechada'),
(22, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-05 12:08:29', 'fechada'),
(23, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-05 14:13:01', 'fechada'),
(24, '1', 2147483647, '0.00', '1.50', '1.50', '1.50', '0.00', 1, '2019-12-05 14:30:43', 'fechada'),
(25, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-05 14:44:09', 'fechada'),
(26, '1', 2147483647, '0.00', '9.00', '9.00', '9.00', '0.00', 1, '2019-12-05 14:44:57', 'fechada'),
(27, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-05 14:48:31', 'fechada'),
(28, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-05 15:16:43', 'fechada'),
(29, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-05 15:23:21', 'fechada'),
(30, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-05 15:26:05', 'fechada'),
(31, '1', 2147483647, '0.00', '4.50', '4.50', '4.50', '0.00', 1, '2019-12-05 16:23:21', 'fechada'),
(32, '1', 2147483647, '4.50', '0.00', '4.50', '4.50', '0.00', 1, '2019-12-05 16:31:43', 'fechada'),
(33, '1', 2147483647, '0.00', '9.00', '9.00', '9.00', '0.00', 1, '2019-12-05 16:33:16', 'fechada'),
(34, '1', 2147483647, '0.00', '6.00', '6.00', '6.00', '0.00', 1, '2019-12-05 16:35:57', 'fechada'),
(35, '1', 2147483647, '0.00', '9.00', '9.00', '9.00', '0.00', 1, '2019-12-05 17:29:17', 'fechada'),
(36, '1', 2147483647, '0.00', '50.00', '50.00', '34.00', '16.00', 1, '2019-12-14 11:11:40', 'fechada'),
(37, '1', 2147483647, '0.00', '20.00', '20.00', '18.00', '2.00', 1, '2019-12-20 19:23:22', 'fechada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(1) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `endereco_empresa` varchar(255) NOT NULL,
  `bairro_empresa` varchar(100) NOT NULL,
  `cidade_empresa` varchar(100) NOT NULL,
  `uf_empresa` varchar(2) NOT NULL,
  `contato_empresa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `cpf_cnpj`, `endereco_empresa`, `bairro_empresa`, `cidade_empresa`, `uf_empresa`, `contato_empresa`) VALUES
(1, 'AugustoAraujo.net', '69196222204', 'Av. Antonio picanço da silva, 2041', 'Novo Horizonte', 'Macapá', 'AP', '991161893');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
`id` int(255) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `tabela` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `datatime` datetime NOT NULL,
  `pc` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `logs`
--

INSERT INTO `logs` (`id`, `usuario`, `tipo`, `tabela`, `descricao`, `datatime`, `pc`, `ip`) VALUES
(1, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-17 19:00:20', 'SUPORTE-DELL', '::1'),
(2, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-17 19:03:13', 'SUPORTE-DELL', '::1'),
(3, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-17 19:05:43', 'SUPORTE-DELL', '::1'),
(4, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-17 19:05:52', 'SUPORTE-DELL', '::1'),
(355, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 20122019191225, valor total: 18.00', '2019-12-20 19:23:22', 'SUPORTE-DELL', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE IF NOT EXISTS `permissoes` (
`id` int(255) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `item` varchar(50) NOT NULL,
  `valor` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`id`, `id_usuario`, `item`, `valor`) VALUES
(1, 1, 'permissoes', 'ativo'),
(2, 1, 'usuarios', 'ativo'),
(3, 1, 'pdv', 'ativo'),
(4, 1, 'vendas', 'ativo'),
(5, 1, 'vencimentos', 'ativo'),
(6, 1, 'estoqueminimo', 'ativo'),
(7, 1, 'estoque', 'ativo'),
(8, 8, 'pdv', 'ativo'),
(9, 1, 'dados-empresa', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
`id` int(255) NOT NULL,
  `codigo` int(255) NOT NULL,
  `codigobarra` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `unidade` int(255) NOT NULL,
  `precocompra` decimal(10,2) NOT NULL,
  `precovenda` decimal(10,2) NOT NULL,
  `estoqueminimo` decimal(10,2) NOT NULL,
  `estoqueatual` decimal(10,2) NOT NULL,
  `vencimento1` date NOT NULL,
  `vencimento2` date NOT NULL,
  `vencimento3` date NOT NULL,
  `datacad` date NOT NULL,
  `usuariocad` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `codigo`, `codigobarra`, `nome`, `unidade`, `precocompra`, `precovenda`, `estoqueminimo`, `estoqueatual`, `vencimento1`, `vencimento2`, `vencimento3`, `datacad`, `usuariocad`, `status`) VALUES
(3, 45345, '123456789', 'Cerveja Skol', 3, '1.50', '2.50', '10.00', '90.00', '0000-00-00', '0000-00-00', '0000-00-00', '2019-11-17', 'Augusto Ara?jo', 1),
(5, 245, '111', 'Feijão preto', 1, '2.50', '4.50', '10.00', '40.00', '2019-12-01', '2019-11-21', '0000-00-00', '2019-11-17', 'Augusto Ara?jo', 1),
(6, 222, '123', 'Pimenta cominho', 3, '1.00', '1.50', '5.00', '0.00', '0000-00-00', '0000-00-00', '0000-00-00', '2019-11-17', 'Augusto Araújo', 1),
(7, 0, '123456', 'Cheiro verde', 3, '1.00', '1.50', '2.00', '0.00', '0000-00-00', '0000-00-00', '0000-00-00', '2019-11-17', 'Augusto Araújo', 1),
(8, 6767, '0', 'Óleo', 3, '2.00', '5.00', '10.00', '60.00', '2019-11-06', '0000-00-00', '0000-00-00', '2019-11-17', 'Augusto Araújo', 0),
(9, 676767, '7896572021610', 'Charque', 1, '2.30', '3.00', '20.00', '0.00', '2019-11-14', '2019-11-13', '0000-00-00', '2019-11-17', 'Augusto Araújo', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE IF NOT EXISTS `unidade` (
`id_u` int(255) NOT NULL,
  `nome_u` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id_u`, `nome_u`) VALUES
(1, 'quilograma'),
(2, 'litro'),
(3, 'und'),
(4, 'pacote');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `caixa` int(255) NOT NULL,
  `situacao` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `senha`, `caixa`, `situacao`) VALUES
(1, 'Emerson Oliveira', '059099', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(8, 'José', '123', 'e10adc3949ba59abbe56e057f20f883e', 0, 0);

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
(65, '20122019191225', '111', 'Feijão preto', '2.00', '4.50', '9.00', 1, '2019-12-20', 1, 'fechada');


--
-- Indexes for table `caixa`
--
ALTER TABLE `caixa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
 ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissoes`
--
ALTER TABLE `permissoes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unidade`
--
ALTER TABLE `unidade`
 ADD PRIMARY KEY (`id_u`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caixa`
--
ALTER TABLE `caixa`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=356;
--
-- AUTO_INCREMENT for table `permissoes`
--
ALTER TABLE `permissoes`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `unidade`
--
ALTER TABLE `unidade`
MODIFY `id_u` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;

ALTER TABLE `caixa` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `permissoes` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `produtos` ADD FOREIGN KEY (`unidade`) REFERENCES `unidade`(`id_u`) ON DELETE RESTRICT ON UPDATE RESTRICT;