DROP DATABASE IF EXISTS bd_pdv;

CREATE DATABASE bd_pdv;
 
USE bd_pdv;
--
-- Estrutura da tabela `usuario`
--
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
(1, 'Augusto Araujo', '69196222204', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(2, 'Emerson Oliveira', '059099', 'e10adc3949ba59abbe56e057f20f883e', 1, 0);
-- --------------------------------------------------------
--
-- Estrutura da tabela `caixa`
--
CREATE TABLE IF NOT EXISTS `caixa` (
   `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_caixa` varchar(255) NOT NULL,
  `id_venda` int(255) NOT NULL,
  `valor_cartao` decimal(10,2) NOT NULL,
  `valor_dinheiro` decimal(10,2) NOT NULL,
  `valor_recebido` decimal(10,2) NOT NULL,
  `valor_compra` decimal(10,2) NOT NULL,
  `valor_troco` decimal(10,2) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `data_caixa` datetime NOT NULL,
  `situacao` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
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
  `id_empresa` int(1) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
(1, 'AugustoAraujo.net', '69196222204', 'Av. Antonio pican�o da silva, 2041', 'Novo Horizonte', 'Macap�', 'AP', '991161893');
-- --------------------------------------------------------
--
-- Estrutura da tabela `logs`
--
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
(5, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-17 19:08:25', 'SUPORTE-DELL', '::1'),
(6, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-17 19:08:57', 'SUPORTE-DELL', '::1'),
(7, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-17 19:28:56', 'SUPORTE-DELL', '::1'),
(8, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-17 19:31:16', 'SUPORTE-DELL', '::1'),
(9, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-17 19:57:04', 'SUPORTE-DELL', '::1'),
(10, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-17 19:57:18', 'SUPORTE-DELL', '::1'),
(11, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-17 20:06:45', 'SUPORTE-DELL', '::1'),
(12, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-17 20:06:55', 'SUPORTE-DELL', '::1'),
(13, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-17 21:19:36', 'SUPORTE-DELL', '::1'),
(14, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-17 21:19:44', 'SUPORTE-DELL', '::1'),
(15, 'Augusto Ara?jo', 'Cadastrou', 'Produto', 'Usuário cadastrou Cerveja Skol', '2019-11-17 21:59:40', 'SUPORTE-DELL', '::1'),
(16, 'Augusto Ara?jo', 'Cadastrou', 'Produto', 'Usuário cadastrou Cerveja Skol', '2019-11-17 22:00:43', 'SUPORTE-DELL', '::1'),
(17, 'Augusto Ara?jo', 'Cadastrou', 'Produto', 'Usuário cadastrou Cerveja Skol', '2019-11-17 22:01:34', 'SUPORTE-DELL', '::1'),
(18, 'Augusto Ara?jo', 'Cadastrou', 'Produto', 'Usuário cadastrou Cerveja Skol', '2019-11-17 22:02:09', 'SUPORTE-DELL', '::1'),
(19, 'Augusto Ara?jo', 'Cadastrou', 'Produto', 'Usuário cadastrou 3', '2019-11-17 22:02:45', 'SUPORTE-DELL', '::1'),
(20, 'Augusto Araújo', 'Cadastrou', 'Produto', 'Usuário cadastrou ', '2019-11-17 22:49:05', 'SUPORTE-DELL', '::1'),
(21, 'Augusto Araújo', 'Cadastrou', 'Produto', 'Usuário cadastrou ', '2019-11-17 22:49:57', 'SUPORTE-DELL', '::1'),
(22, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou 22', '2019-11-17 22:52:29', 'SUPORTE-DELL', '::1'),
(23, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou Cheiro verde', '2019-11-17 22:54:20', 'SUPORTE-DELL', '::1'),
(24, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou Feijão preto', '2019-11-17 22:55:53', 'SUPORTE-DELL', '::1'),
(25, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou Pimenta cominho', '2019-11-17 23:02:03', 'SUPORTE-DELL', '::1'),
(26, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou Pimenta cominho', '2019-11-17 23:02:15', 'SUPORTE-DELL', '::1'),
(27, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou Cerveja Skol', '2019-11-17 23:10:18', 'SUPORTE-DELL', '::1'),
(28, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou Cerveja Skol', '2019-11-17 23:10:32', 'SUPORTE-DELL', '::1'),
(29, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou Cheiro verde', '2019-11-17 23:10:48', 'SUPORTE-DELL', '::1'),
(30, 'Augusto Araújo', 'Cadastrou', 'Produto', 'Usuário cadastrou Óleo', '2019-11-17 23:13:19', 'SUPORTE-DELL', '::1'),
(31, 'Augusto Araújo', 'Cadastrou', 'Produto', 'Usuário cadastrou Charque', '2019-11-17 23:17:06', 'SUPORTE-DELL', '::1'),
(32, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou Charque', '2019-11-17 23:17:31', 'SUPORTE-DELL', '::1'),
(33, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou Charque', '2019-11-17 23:18:43', 'SUPORTE-DELL', '::1'),
(34, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou Feijão preto', '2019-11-17 23:18:50', 'SUPORTE-DELL', '::1'),
(35, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou Feijão preto', '2019-11-17 23:18:56', 'SUPORTE-DELL', '::1'),
(36, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou 1, Cerveja Skol 1', '2019-11-17 23:30:00', 'SUPORTE-DELL', '::1'),
(37, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-17 23:46:54', 'SUPORTE-DELL', '::1'),
(38, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-17 23:47:02', 'SUPORTE-DELL', '::1'),
(39, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-18 10:36:39', 'SUPORTE-DELL', '::1'),
(40, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 10:36:45', 'SUPORTE-DELL', '::1'),
(41, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-18 11:42:13', 'SUPORTE-DELL', '::1'),
(42, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 11:44:14', 'SUPORTE-DELL', '::1'),
(43, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-18 11:48:41', 'SUPORTE-DELL', '::1'),
(44, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 11:58:31', 'SUPORTE-DELL', '::1'),
(45, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-18 12:06:51', 'SUPORTE-DELL', '::1'),
(46, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-18 12:06:58', 'SUPORTE-DELL', '::1'),
(47, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 12:07:03', 'SUPORTE-DELL', '::1'),
(48, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 12:07:17', 'SUPORTE-DELL', '::1'),
(49, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-18 12:07:35', 'SUPORTE-DELL', '::1'),
(50, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-18 12:12:17', 'SUPORTE-DELL', '::1'),
(51, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 12:12:23', 'SUPORTE-DELL', '::1'),
(52, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-18 12:18:22', 'SUPORTE-DELL', '::1'),
(53, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 12:18:29', 'SUPORTE-DELL', '::1'),
(54, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-18 12:19:02', 'SUPORTE-DELL', '::1'),
(55, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-18 12:20:27', 'SUPORTE-DELL', '::1'),
(56, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 12:20:33', 'SUPORTE-DELL', '::1'),
(57, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-18 12:20:42', 'SUPORTE-DELL', '::1'),
(58, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 12:20:49', 'SUPORTE-DELL', '::1'),
(59, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-18 12:21:14', 'SUPORTE-DELL', '::1'),
(60, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 12:21:21', 'SUPORTE-DELL', '::1'),
(61, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-18 12:23:18', 'SUPORTE-DELL', '::1'),
(62, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 12:23:25', 'SUPORTE-DELL', '::1'),
(63, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-18 12:35:19', 'SUPORTE-DELL', '::1'),
(64, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 12:35:26', 'SUPORTE-DELL', '::1'),
(65, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-18 13:41:54', 'SUPORTE-DELL', '::1'),
(66, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 13:42:00', 'SUPORTE-DELL', '::1'),
(67, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo1', '2019-11-18 14:17:57', 'SUPORTE-DELL', '::1'),
(68, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo11', '2019-11-18 14:18:47', 'SUPORTE-DELL', '::1'),
(69, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo111', '2019-11-18 14:19:17', 'SUPORTE-DELL', '::1'),
(70, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo111', '2019-11-18 14:19:22', 'SUPORTE-DELL', '::1'),
(71, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo111', '2019-11-18 14:19:27', 'SUPORTE-DELL', '::1'),
(72, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:22:44', 'SUPORTE-DELL', '::1'),
(73, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:23:04', 'SUPORTE-DELL', '::1'),
(74, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:23:08', 'SUPORTE-DELL', '::1'),
(75, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:23:10', 'SUPORTE-DELL', '::1'),
(76, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:23:12', 'SUPORTE-DELL', '::1'),
(77, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:23:14', 'SUPORTE-DELL', '::1'),
(78, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:23:15', 'SUPORTE-DELL', '::1'),
(79, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo111', '2019-11-18 14:24:04', 'SUPORTE-DELL', '::1'),
(80, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo111', '2019-11-18 14:24:20', 'SUPORTE-DELL', '::1'),
(81, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:24:22', 'SUPORTE-DELL', '::1'),
(82, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:24:34', 'SUPORTE-DELL', '::1'),
(83, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:24:43', 'SUPORTE-DELL', '::1'),
(84, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:24:51', 'SUPORTE-DELL', '::1'),
(85, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:24:57', 'SUPORTE-DELL', '::1'),
(86, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-11-18 14:25:17', 'SUPORTE-DELL', '::1'),
(87, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo111', '2019-11-18 14:29:14', 'SUPORTE-DELL', '::1'),
(88, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo111', '2019-11-18 14:29:21', 'SUPORTE-DELL', '::1'),
(89, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo111', '2019-11-18 14:29:42', 'SUPORTE-DELL', '::1'),
(90, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou senha do usuário: ', '2019-11-18 14:42:32', 'SUPORTE-DELL', '::1'),
(91, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou senha do usuário: $', '2019-11-18 14:44:22', 'SUPORTE-DELL', '::1'),
(92, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-18 14:44:40', 'SUPORTE-DELL', '::1'),
(93, 'Augusto Araújo111', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 14:44:53', 'SUPORTE-DELL', '::1'),
(94, 'Augusto Araújo111', 'Alterou', 'Usuarios', 'Alterou senha do usuário: Augusto Araújo111', '2019-11-18 14:45:00', 'SUPORTE-DELL', '::1'),
(95, 'Augusto Araújo111', 'Alterou', 'Usuarios', 'Alterou senha do usuário: Augusto Araújo111', '2019-11-18 14:55:39', 'SUPORTE-DELL', '::1'),
(96, 'Augusto Araújo111', 'Saiu', 'Usuário', 'Augusto Araújo111 saiu do sistema', '2019-11-18 14:55:42', 'SUPORTE-DELL', '::1'),
(97, 'Augusto Araújo111', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 14:55:54', 'SUPORTE-DELL', '::1'),
(98, 'Augusto Araújo111', 'Cadastrou', 'Usuário', 'Usuário cadastrou usuário novo ', '2019-11-18 15:18:24', 'SUPORTE-DELL', '::1'),
(99, 'Augusto Araújo111', 'Cadastrou', 'Usuário', 'Usuário cadastrou usuário novo ', '2019-11-18 15:22:07', 'SUPORTE-DELL', '::1'),
(100, 'Augusto Araújo', 'Cadastrou', 'Usuário', 'Usuário cadastrou usuário novo ', '2019-11-18 15:22:37', 'SUPORTE-DELL', '::1');
-- --------------------------------------------------------
--
-- Estrutura da tabela `permissoes`
--
CREATE TABLE IF NOT EXISTS `permissoes` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
(8, 1, 'pdv', 'ativo'),
(9, 2, 'dados-empresa', 'ativo'),
(10, 2, 'permissoes', 'ativo'),
(11, 2, 'usuarios', 'ativo'),
(12, 2, 'pdv', 'ativo'),
(13, 2, 'vendas', 'ativo'),
(14, 2, 'vencimentos', 'ativo'),
(15, 2, 'estoqueminimo', 'ativo'),
(16, 2, 'estoque', 'ativo'),
(17, 2, 'pdv', 'ativo'),
(18, 2, 'dados-empresa', 'ativo');
-- --------------------------------------------------------
--
-- Estrutura da tabela `produtos`
--
CREATE TABLE IF NOT EXISTS `produtos` (
  `idProduto` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `codigo` varchar(255),  
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `unidade` int(255),
  `precocompra` decimal(10,2) NOT NULL,
  `precovenda` decimal(10,2) NOT NULL,
  `estoqueminimo` decimal(10,2) NOT NULL,
  `estoqueatual` decimal(10,2) NOT NULL,
  `codigobarra` varchar(255),
  `vencimento1` date,
  `vencimento2` date,  
  `datacad` date NOT NULL,
  `usuariocad` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
--
-- Extraindo dados da tabela `produtos`
--
INSERT INTO produtos
(idProduto,nome,descricao,unidade,precocompra,precovenda,estoqueminimo,estoqueatual,codigobarra,vencimento1,vencimento2,datacad,usuariocad,status)
VALUES
(1,'Cerveja skol','cerveja skol lata',3,'5.50','10.00','50.00','90.00',null,'0000-00-00','0000-00-00', now(),'Emerson Oliveira',1),
(2,'Agua mineral','Agua mineral 500ml',3,'5.50','10.00','50.00','90.00',null,'0000-00-00','0000-00-00', now(),'Emerson Oliveira',1),
(3,'Agua mineral','Agua mineral 1lt',3,'5.50','10.00','50.00','90.00',null,'0000-00-00','0000-00-00', now(),'Emerson Oliveira',1),
(4,'P�o frances','P�o frances unidade',3,'5.50','10.00','50.00','90.00',null,'0000-00-00','0000-00-00', now(),'Emerson Oliveira',1),
(5,'Biscoito trakinas','biscoito trakinas morango',3,'5.50','10.00','50.00','90.00',null,'0000-00-00','0000-00-00', now(),'Emerson Oliveira',1),
(6,'Escova dental','Escova dental oral-b',3,'5.50','10.00','50.00','90.00',null,'0000-00-00','0000-00-00', now(),'Emerson Oliveira',1),
(7,'Pasta de dente','pasta de dente colgate',3,'5.50','10.00','50.00','90.00',null,'0000-00-00','0000-00-00', now(),'Emerson Oliveira',1),
(8,'Monitor LG','Monitor lh 15plg',3,'5.50','10.00','50.00','90.00',null,'0000-00-00','0000-00-00', now(),'Emerson Oliveira',1),
(9,'Ventilador Arno','Ventilador Arno 5 paletas',3,'5.50','10.00','50.00','90.00',null,'0000-00-00','0000-00-00', now(),'Emerson Oliveira',1),
(10,'Arroz carreteiro','Arroz carreteiro 5KG',3,'5.50','10.00','50.00','90.00',null,'0000-00-00','0000-00-00', now(),'Emerson Oliveira',1),
(11,'Feij�o M�ximo','Feij�o Maximo 1KG',2,'9.50','15.00','10.00','90.00',null,'0000-00-00','0000-00-00', now(),'Emerson Oliveira',1);
-- --------------------------------------------------------
--
-- Estrutura da tabela `unidade`
--

CREATE TABLE IF NOT EXISTS `unidade` (
`id_u` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
-- Estrutura da tabela `vendas`
--
CREATE TABLE IF NOT EXISTS `vendas` (
`id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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
(30, '02122019171250', '111', 'Feijão preto', '1.00', '4.50', '4.50', 1, '2019-12-02', 1, 'fechada');

ALTER TABLE `caixa` CHANGE `id` `idProduto` INT(255) NOT NULL AUTO_INCREMENT;