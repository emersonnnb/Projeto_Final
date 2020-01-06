drop DATABASE if EXISTS bd_pdv;

CREATE DATABASE bd_pdv;

use bd_pdv;

--
-- Database: `bd_pdv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE IF NOT EXISTS `caixa` (
`id` int(255) NOT NULL,
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
(100, 'Augusto Araújo', 'Cadastrou', 'Usuário', 'Usuário cadastrou usuário novo ', '2019-11-18 15:22:37', 'SUPORTE-DELL', '::1'),
(101, 'Augusto Araújo', 'Cadastrou', 'Usuário', 'Usuário cadastrou usuário novo ', '2019-11-18 15:22:51', 'SUPORTE-DELL', '::1'),
(102, 'Augusto Araújo', 'Cadastrou', 'Usuário', 'Usuário cadastrou usuário novo ', '2019-11-18 15:23:08', 'SUPORTE-DELL', '::1'),
(103, 'Augusto Araújo', 'Cadastrou', 'Usuário', 'Usuário cadastrou usuário novo ', '2019-11-18 15:23:16', 'SUPORTE-DELL', '::1'),
(104, 'Augusto Araújo', 'Cadastrou', 'Usuário', 'Usuário cadastrou usuário novo José', '2019-11-18 15:26:42', 'SUPORTE-DELL', '::1'),
(105, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 8', '2019-11-18 15:27:09', 'SUPORTE-DELL', '::1'),
(106, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-18 15:27:15', 'SUPORTE-DELL', '::1'),
(107, 'José', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 15:27:24', 'SUPORTE-DELL', '::1'),
(108, 'José', 'Alterou', 'Usuarios', 'Alterou senha do usuário: José', '2019-11-18 15:27:32', 'SUPORTE-DELL', '::1'),
(109, 'José', 'Saiu', 'Usuário', 'José saiu do sistema', '2019-11-18 15:27:38', 'SUPORTE-DELL', '::1'),
(110, 'José', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 15:27:55', 'SUPORTE-DELL', '::1'),
(111, 'José', 'Alterou', 'Usuarios', 'Alterou senha do usuário: José', '2019-11-18 15:28:00', 'SUPORTE-DELL', '::1'),
(112, 'José', 'Saiu', 'Usuário', 'José saiu do sistema', '2019-11-18 15:28:01', 'SUPORTE-DELL', '::1'),
(113, 'Augusto Araújo111', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-18 15:28:45', 'SUPORTE-DELL', '::1'),
(114, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-19 11:01:46', 'SUPORTE-DELL', '::1'),
(115, 'Augusto Araújo111', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-19 11:01:56', 'SUPORTE-DELL', '::1'),
(116, 'Augusto Araújo111', 'Alterou', 'Usuarios', 'Alterou senha do usuário: Augusto Araújo111', '2019-11-19 11:02:04', 'SUPORTE-DELL', '::1'),
(117, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-19 13:18:25', 'SUPORTE-DELL', '::1'),
(118, 'Augusto Araújo111', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-19 13:18:32', 'SUPORTE-DELL', '::1'),
(119, 'Augusto Araújo111', 'Alterou', 'Usuarios', 'Alterou senha do usuário: Augusto Araújo111', '2019-11-19 13:18:39', 'SUPORTE-DELL', '::1'),
(120, 'Augusto Araújo111', 'Saiu', 'Usuário', 'Augusto Araújo111 saiu do sistema', '2019-11-19 13:18:41', 'SUPORTE-DELL', '::1'),
(121, 'Augusto Araújo111', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-19 13:18:48', 'SUPORTE-DELL', '::1'),
(122, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-19 19:49:12', 'SUPORTE-DELL', '::1'),
(123, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-19 19:49:20', 'SUPORTE-DELL', '::1'),
(124, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-19 21:00:59', 'SUPORTE-DELL', '::1'),
(125, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-19 21:01:07', 'SUPORTE-DELL', '::1'),
(126, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-20 09:02:09', 'SUPORTE-DELL', '::1'),
(127, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-20 10:39:50', 'SUPORTE-DELL', '::1'),
(128, 'Augusto Araújo111', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-20 10:40:51', 'SUPORTE-DELL', '::1'),
(129, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-23 10:19:14', 'SUPORTE-DELL', '::1'),
(130, 'Augusto Araújo111', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-23 10:19:21', 'SUPORTE-DELL', '::1'),
(131, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-26 13:00:05', 'SUPORTE-DELL', '::1'),
(132, 'Augusto Araújo111', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-26 13:00:11', 'SUPORTE-DELL', '::1'),
(133, 'Augusto Araújo111', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo', '2019-11-26 13:33:17', 'SUPORTE-DELL', '::1'),
(134, 'Augusto Araújo111', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo', '2019-11-26 13:33:22', 'SUPORTE-DELL', '::1'),
(135, 'Augusto Araújo111', 'Saiu', 'Usuário', 'Augusto Araújo111 saiu do sistema', '2019-11-26 13:34:39', 'SUPORTE-DELL', '::1'),
(136, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-26 13:34:45', 'SUPORTE-DELL', '::1'),
(137, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-26 13:37:04', 'SUPORTE-DELL', '::1'),
(138, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-26 13:37:10', 'SUPORTE-DELL', '::1'),
(139, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-26 13:37:47', 'SUPORTE-DELL', '::1'),
(140, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-26 13:38:02', 'SUPORTE-DELL', '::1'),
(141, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-26 14:41:31', 'SUPORTE-DELL', '::1'),
(142, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-26 14:41:37', 'SUPORTE-DELL', '::1'),
(143, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-26 14:43:57', 'SUPORTE-DELL', '::1'),
(144, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-26 14:44:07', 'SUPORTE-DELL', '::1'),
(145, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-26 15:07:32', 'SUPORTE-DELL', '::1'),
(146, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-26 15:08:31', 'SUPORTE-DELL', '::1'),
(147, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-26 16:12:01', 'SUPORTE-DELL', '::1'),
(148, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-26 16:12:09', 'SUPORTE-DELL', '::1'),
(149, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 5, Feijão preto', '2019-11-26 16:25:36', 'SUPORTE-DELL', '::1'),
(150, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 9, Charque', '2019-11-26 16:25:56', 'SUPORTE-DELL', '::1'),
(151, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 9, Charque', '2019-11-26 16:26:27', 'SUPORTE-DELL', '::1'),
(152, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 6, Pimenta cominho', '2019-11-26 16:27:15', 'SUPORTE-DELL', '::1'),
(153, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 7, Cheiro verde', '2019-11-26 16:27:23', 'SUPORTE-DELL', '::1'),
(154, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 3, Cerveja Skol', '2019-11-26 16:27:30', 'SUPORTE-DELL', '::1'),
(155, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 5, Feijão preto', '2019-11-26 16:27:41', 'SUPORTE-DELL', '::1'),
(156, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 9, Charque', '2019-11-26 16:27:50', 'SUPORTE-DELL', '::1'),
(157, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-26 19:50:07', 'SUPORTE-DELL', '::1'),
(158, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-26 19:50:15', 'SUPORTE-DELL', '::1'),
(159, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-26 23:09:51', 'SUPORTE-DELL', '::1'),
(160, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-26 23:10:34', 'SUPORTE-DELL', '::1'),
(161, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-27 07:58:48', 'SUPORTE-DELL', '::1'),
(162, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-27 07:58:55', 'SUPORTE-DELL', '::1'),
(163, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-27 12:12:55', 'SUPORTE-DELL', '::1'),
(164, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-27 12:13:06', 'SUPORTE-DELL', '::1'),
(165, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-27 12:17:56', 'SUPORTE-DELL', '::1'),
(166, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-27 19:02:05', 'SUPORTE-DELL', '::1'),
(167, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-27 21:52:58', 'SUPORTE-DELL', '::1'),
(168, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-27 21:53:05', 'SUPORTE-DELL', '::1'),
(169, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-27 21:58:38', 'SUPORTE-DELL', '::1'),
(170, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-27 21:58:47', 'SUPORTE-DELL', '::1'),
(171, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-27 22:13:20', 'SUPORTE-DELL', '::1'),
(172, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-27 22:33:52', 'SUPORTE-DELL', '::1'),
(173, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-27 22:41:13', 'SUPORTE-DELL', '::1'),
(174, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-27 22:41:22', 'SUPORTE-DELL', '::1'),
(175, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-11-27 22:53:01', 'SUPORTE-DELL', '::1'),
(176, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-27 22:53:09', 'SUPORTE-DELL', '::1'),
(177, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-28 14:26:24', 'SUPORTE-DELL', '::1'),
(178, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-28 14:26:30', 'SUPORTE-DELL', '::1'),
(179, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-28 14:35:49', '192.168.1.207', '192.168.1.207'),
(180, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-28 14:36:03', '192.168.1.207', '192.168.1.207'),
(181, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-28 14:36:08', '192.168.1.207', '192.168.1.207'),
(182, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-30 09:26:12', 'SUPORTE-DELL', '::1'),
(183, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-30 09:26:18', 'SUPORTE-DELL', '::1'),
(184, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-30 11:43:03', 'SUPORTE-DELL', '::1'),
(185, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-30 11:43:11', 'SUPORTE-DELL', '::1'),
(186, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-11-30 11:43:57', 'SUPORTE-DELL', '::1'),
(187, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-11-30 11:44:04', 'SUPORTE-DELL', '::1'),
(188, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-01 20:57:07', 'SUPORTE-DELL', '::1'),
(189, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-01 20:59:43', 'SUPORTE-DELL', '::1'),
(190, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-01 21:01:27', 'SUPORTE-DELL', '::1'),
(191, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-02 08:10:47', 'SUPORTE-DELL', '::1'),
(192, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 08:11:01', 'SUPORTE-DELL', '::1'),
(193, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-02 08:28:07', 'SUPORTE-DELL', '::1'),
(194, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 08:28:14', 'SUPORTE-DELL', '::1'),
(195, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-02 08:41:59', 'SUPORTE-DELL', '::1'),
(196, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 08:42:07', 'SUPORTE-DELL', '::1'),
(197, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-02 09:16:13', 'SUPORTE-DELL', '::1'),
(198, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 09:30:42', 'SUPORTE-DELL', '::1'),
(199, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-02 09:31:12', 'SUPORTE-DELL', '::1'),
(200, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 09:31:17', 'SUPORTE-DELL', '::1'),
(201, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-02 10:12:26', 'SUPORTE-DELL', '::1'),
(202, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 10:12:40', 'SUPORTE-DELL', '::1'),
(203, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-02 10:22:17', 'SUPORTE-DELL', '::1'),
(204, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 10:22:27', 'SUPORTE-DELL', '::1'),
(205, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-02 11:16:17', 'SUPORTE-DELL', '::1'),
(206, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 11:16:23', 'SUPORTE-DELL', '::1'),
(207, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-02 11:27:40', 'SUPORTE-DELL', '::1'),
(208, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 11:28:17', 'SUPORTE-DELL', '::1'),
(209, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Charque, QUANT:1.5', '2019-12-02 11:31:33', 'SUPORTE-DELL', '::1'),
(210, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-02 11:33:22', 'SUPORTE-DELL', '::1'),
(211, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-02 15:55:06', 'SUPORTE-DELL', '::1'),
(212, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 15:55:12', 'SUPORTE-DELL', '::1'),
(213, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019111225, valor total: 7.50', '2019-12-02 16:08:24', 'SUPORTE-DELL', '::1'),
(214, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Pimenta cominho, QUANT:1', '2019-12-02 16:09:54', 'SUPORTE-DELL', '::1'),
(215, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:2', '2019-12-02 16:09:59', 'SUPORTE-DELL', '::1'),
(216, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cheiro verde, QUANT:3', '2019-12-02 16:10:08', 'SUPORTE-DELL', '::1'),
(217, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019161248, valor total: 15.00', '2019-12-02 16:10:30', 'SUPORTE-DELL', '::1'),
(218, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:2', '2019-12-02 16:11:37', 'SUPORTE-DELL', '::1'),
(219, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cheiro verde, QUANT:3', '2019-12-02 16:11:47', 'SUPORTE-DELL', '::1'),
(220, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 3, Cerveja Skol', '2019-12-02 16:12:36', 'SUPORTE-DELL', '::1'),
(221, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cerveja Skol, QUANT:5', '2019-12-02 16:12:45', 'SUPORTE-DELL', '::1'),
(222, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019161230, valor total: 26.00', '2019-12-02 16:14:12', 'SUPORTE-DELL', '::1'),
(223, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cerveja Skol, QUANT:5', '2019-12-02 16:16:51', 'SUPORTE-DELL', '::1'),
(224, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Pimenta cominho, QUANT:5', '2019-12-02 16:16:57', 'SUPORTE-DELL', '::1'),
(225, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:3', '2019-12-02 16:17:02', 'SUPORTE-DELL', '::1'),
(226, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019161241, valor total: 33.50', '2019-12-02 16:17:15', 'SUPORTE-DELL', '::1'),
(227, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:2', '2019-12-02 16:18:19', 'SUPORTE-DELL', '::1'),
(228, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019161214, valor total: 9.00', '2019-12-02 16:18:24', 'SUPORTE-DELL', '::1'),
(229, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-02 16:21:56', 'SUPORTE-DELL', '::1'),
(230, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019161249, valor total: 4.50', '2019-12-02 16:23:07', 'SUPORTE-DELL', '::1'),
(231, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-02 16:28:50', 'SUPORTE-DELL', '::1'),
(232, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019161244, valor total: 4.50', '2019-12-02 16:28:58', 'SUPORTE-DELL', '::1'),
(233, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-02 16:38:17', 'SUPORTE-DELL', '::1'),
(234, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019161212, valor total: 4.50', '2019-12-02 16:38:22', 'SUPORTE-DELL', '::1'),
(235, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019161222, valor total: 0.00', '2019-12-02 16:43:25', 'SUPORTE-DELL', '::1'),
(236, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019161222, valor total: 0.00', '2019-12-02 16:43:30', 'SUPORTE-DELL', '::1'),
(237, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019161222, valor total: 0.00', '2019-12-02 16:43:33', 'SUPORTE-DELL', '::1'),
(238, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-02 16:44:43', 'SUPORTE-DELL', '::1'),
(239, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019161219, valor total: 4.50', '2019-12-02 16:52:05', 'SUPORTE-DELL', '::1'),
(240, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-02 17:06:58', 'SUPORTE-DELL', '::1'),
(241, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019171252, valor total: 4.50', '2019-12-02 17:10:22', 'SUPORTE-DELL', '::1'),
(242, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-02 17:19:16', 'SUPORTE-DELL', '::1'),
(243, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019171237, valor total: 4.50', '2019-12-02 17:19:32', 'SUPORTE-DELL', '::1'),
(244, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-02 17:20:17', 'SUPORTE-DELL', '::1'),
(245, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019171211, valor total: 4.50', '2019-12-02 17:20:24', 'SUPORTE-DELL', '::1'),
(246, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-02 17:37:41', 'SUPORTE-DELL', '::1'),
(247, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-02 17:37:45', 'SUPORTE-DELL', '::1'),
(248, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 17:37:55', 'SUPORTE-DELL', '::1'),
(249, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-02 17:38:56', 'SUPORTE-DELL', '::1'),
(250, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019171250, valor total: 4.50', '2019-12-02 17:39:15', 'SUPORTE-DELL', '::1'),
(251, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-02 17:39:59', 'SUPORTE-DELL', '::1'),
(252, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019171253, valor total: 4.50', '2019-12-02 17:40:05', 'SUPORTE-DELL', '::1'),
(253, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Pimenta cominho, QUANT:1', '2019-12-02 17:41:27', 'SUPORTE-DELL', '::1'),
(254, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019171220, valor total: 1.50', '2019-12-02 17:41:36', 'SUPORTE-DELL', '::1'),
(255, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Pimenta cominho, QUANT:1', '2019-12-02 17:42:25', 'SUPORTE-DELL', '::1'),
(256, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 02122019171218, valor total: 1.50', '2019-12-02 17:42:31', 'SUPORTE-DELL', '::1'),
(257, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-02 17:43:41', 'SUPORTE-DELL', '::1'),
(258, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-02 17:43:54', 'SUPORTE-DELL', '::1'),
(259, 'Augusto Araújo', 'Alterou', 'Empresa', 'Usuário alterou dados da empresa', '2019-12-02 18:15:58', 'SUPORTE-DELL', '::1'),
(260, 'Augusto Araújo', 'Alterou', 'Empresa', 'Usuário alterou dados da empresa', '2019-12-02 18:16:42', 'SUPORTE-DELL', '::1'),
(261, 'Augusto Araújo', 'Alterou', 'Empresa', 'Usuário alterou dados da empresa', '2019-12-02 18:17:04', 'SUPORTE-DELL', '::1'),
(262, 'Augusto Araújo', 'Alterou', 'Empresa', 'Usuário alterou dados da empresa', '2019-12-02 18:17:55', 'SUPORTE-DELL', '::1'),
(263, 'Augusto Araújo', 'Alterou', 'Empresa', 'Usuário alterou dados da empresa', '2019-12-02 18:18:06', 'SUPORTE-DELL', '::1'),
(264, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-12-02 18:27:40', 'SUPORTE-DELL', '::1'),
(265, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-12-02 18:28:30', 'SUPORTE-DELL', '::1'),
(266, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-12-02 18:28:31', 'SUPORTE-DELL', '::1'),
(267, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-12-02 18:28:31', 'SUPORTE-DELL', '::1'),
(268, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-12-02 18:28:32', 'SUPORTE-DELL', '::1'),
(269, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-12-02 18:31:33', 'SUPORTE-DELL', '::1'),
(270, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou Augusto Araújo', '2019-12-02 18:31:40', 'SUPORTE-DELL', '::1'),
(271, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-12-02 18:31:41', 'SUPORTE-DELL', '::1'),
(272, 'Augusto Araújo', 'Alterou', 'Empresa', 'Usuário alterou dados da empresa', '2019-12-02 18:31:43', 'SUPORTE-DELL', '::1'),
(273, 'Augusto Araújo', 'Alterou', 'Empresa', 'Usuário alterou dados da empresa', '2019-12-02 18:31:49', 'SUPORTE-DELL', '::1'),
(274, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-12-02 18:32:30', 'SUPORTE-DELL', '::1'),
(275, 'Augusto Araújo', 'Alterou', 'Usuarios', 'Alterou permissão do usuário 1', '2019-12-02 18:32:35', 'SUPORTE-DELL', '::1'),
(276, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-04 14:54:07', 'SUPORTE-DELL', '::1'),
(277, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-04 14:54:12', 'SUPORTE-DELL', '::1'),
(278, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-05 11:53:29', 'SUPORTE-DELL', '::1'),
(279, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-05 11:53:39', 'SUPORTE-DELL', '::1'),
(280, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 12:06:16', 'SUPORTE-DELL', '::1'),
(281, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019121211, valor total: 4.50', '2019-12-05 12:06:23', 'SUPORTE-DELL', '::1'),
(282, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 12:08:03', 'SUPORTE-DELL', '::1'),
(283, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019121259, valor total: 4.50', '2019-12-05 12:08:10', 'SUPORTE-DELL', '::1'),
(284, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 12:08:25', 'SUPORTE-DELL', '::1'),
(285, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019121220, valor total: 4.50', '2019-12-05 12:08:29', 'SUPORTE-DELL', '::1'),
(286, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-05 13:57:50', 'SUPORTE-DELL', '::1'),
(287, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-05 13:57:54', 'SUPORTE-DELL', '::1'),
(288, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-05 14:10:02', 'SUPORTE-DELL', '::1'),
(289, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-05 14:10:09', 'SUPORTE-DELL', '::1'),
(290, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 14:12:42', 'SUPORTE-DELL', '::1'),
(291, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019141226, valor total: 4.50', '2019-12-05 14:13:01', 'SUPORTE-DELL', '::1'),
(292, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Pimenta cominho, QUANT:1', '2019-12-05 14:25:51', 'SUPORTE-DELL', '::1'),
(293, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019141232, valor total: 1.50', '2019-12-05 14:30:43', 'SUPORTE-DELL', '::1'),
(294, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 14:44:04', 'SUPORTE-DELL', '::1'),
(295, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019141258, valor total: 4.50', '2019-12-05 14:44:09', 'SUPORTE-DELL', '::1'),
(296, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:2', '2019-12-05 14:44:52', 'SUPORTE-DELL', '::1'),
(297, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019141248, valor total: 9.00', '2019-12-05 14:44:57', 'SUPORTE-DELL', '::1'),
(298, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 14:48:26', 'SUPORTE-DELL', '::1'),
(299, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019141252, valor total: 4.50', '2019-12-05 14:48:31', 'SUPORTE-DELL', '::1'),
(300, 'Augusto Cézar Pinheiro de Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 15:16:38', 'SUPORTE-DELL', '::1'),
(301, 'Augusto Cézar Pinheiro de Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019151232, valor total: 4.50', '2019-12-05 15:16:43', 'SUPORTE-DELL', '::1'),
(302, 'Augusto Cézar Pinheiro de Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 15:23:16', 'SUPORTE-DELL', '::1'),
(303, 'Augusto Cézar Pinheiro de Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019151211, valor total: 4.50', '2019-12-05 15:23:21', 'SUPORTE-DELL', '::1'),
(304, 'Augusto Cézar Pinheiro de Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 15:26:00', 'SUPORTE-DELL', '::1'),
(305, 'Augusto Cézar Pinheiro de Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019151238, valor total: 4.50', '2019-12-05 15:26:05', 'SUPORTE-DELL', '::1'),
(306, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-05 16:10:36', 'SUPORTE-DELL', '::1'),
(307, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-05 16:10:45', 'SUPORTE-DELL', '::1'),
(308, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019161246, valor total: 4.50', '2019-12-05 16:23:21', 'SUPORTE-DELL', '::1'),
(309, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 16:27:31', 'SUPORTE-DELL', '::1'),
(310, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019161221, valor total: 4.50', '2019-12-05 16:31:43', 'SUPORTE-DELL', '::1'),
(311, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:2', '2019-12-05 16:33:10', 'SUPORTE-DELL', '::1'),
(312, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019161204, valor total: 9.00', '2019-12-05 16:33:16', 'SUPORTE-DELL', '::1'),
(313, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Charque, QUANT:2', '2019-12-05 16:35:29', 'SUPORTE-DELL', '::1'),
(314, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019161245, valor total: 6.00', '2019-12-05 16:35:57', 'SUPORTE-DELL', '::1'),
(315, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 16:41:20', 'SUPORTE-DELL', '::1'),
(316, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Charque, QUANT:1.5', '2019-12-05 17:04:41', 'SUPORTE-DELL', '::1'),
(317, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-05 17:25:31', 'SUPORTE-DELL', '::1'),
(318, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-05 17:26:09', 'SUPORTE-DELL', '::1'),
(319, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019161201, valor total: 9.00', '2019-12-05 17:29:17', 'SUPORTE-DELL', '::1'),
(320, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-05 17:31:12', 'SUPORTE-DELL', '::1'),
(321, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-05 21:45:46', 'SUPORTE-DELL', '::1'),
(322, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-05 21:45:52', 'SUPORTE-DELL', '::1'),
(323, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-05 21:46:14', 'SUPORTE-DELL', '::1'),
(324, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Pimenta cominho, QUANT:2', '2019-12-05 21:46:20', 'SUPORTE-DELL', '::1'),
(325, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cheiro verde, QUANT:5', '2019-12-05 21:46:27', 'SUPORTE-DELL', '::1'),
(326, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Charque, QUANT:5', '2019-12-05 21:47:10', 'SUPORTE-DELL', '::1'),
(327, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 7, Cheiro verde', '2019-12-05 21:47:28', 'SUPORTE-DELL', '::1'),
(328, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 7, Cheiro verde', '2019-12-05 22:02:54', 'SUPORTE-DELL', '::1'),
(329, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 6, Pimenta cominho', '2019-12-05 22:03:33', 'SUPORTE-DELL', '::1'),
(330, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 7, Cheiro verde', '2019-12-05 22:04:56', 'SUPORTE-DELL', '::1'),
(331, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cheiro verde, QUANT:2', '2019-12-05 22:05:21', 'SUPORTE-DELL', '::1'),
(332, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cerveja Skol, QUANT:20', '2019-12-05 22:44:06', 'SUPORTE-DELL', '::1'),
(333, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 3, Cerveja Skol', '2019-12-05 22:45:39', 'SUPORTE-DELL', '::1'),
(334, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cerveja Skol, QUANT:20', '2019-12-05 22:45:51', 'SUPORTE-DELL', '::1'),
(335, 'Augusto Araújo', 'Alterou', 'Produto', 'Usuário alterou produto: 3, Cerveja Skol', '2019-12-05 22:46:09', 'SUPORTE-DELL', '::1'),
(336, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cerveja Skol, QUANT:20', '2019-12-05 22:46:49', 'SUPORTE-DELL', '::1'),
(337, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cerveja Skol, QUANT:20', '2019-12-05 22:48:05', 'SUPORTE-DELL', '::1'),
(338, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cerveja Skol, QUANT:25.5', '2019-12-05 22:48:41', 'SUPORTE-DELL', '::1'),
(339, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-06 00:14:47', 'SUPORTE-DELL', '::1'),
(340, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Cerveja Skol, QUANT:10', '2019-12-06 00:16:25', 'SUPORTE-DELL', '::1'),
(341, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-14 11:09:39', 'SUPORTE-DELL', '::1'),
(342, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-14 11:09:45', 'SUPORTE-DELL', '::1'),
(343, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-14 11:11:09', 'SUPORTE-DELL', '::1'),
(344, 'Augusto Araújo', 'Caixa', 'Fechou', 'Usuário fechou venda: 05122019211205, valor total: 34.00', '2019-12-14 11:11:40', 'SUPORTE-DELL', '::1'),
(345, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-14 11:12:11', 'SUPORTE-DELL', '::1'),
(346, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-18 16:57:05', 'SUPORTE-DELL', '::1'),
(347, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-18 16:57:13', 'SUPORTE-DELL', '::1'),
(348, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-18 17:00:57', 'SUPORTE-DELL', '::1'),
(349, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:1', '2019-12-18 17:02:27', 'SUPORTE-DELL', '::1'),
(350, 'Augusto Araújo', 'Saiu', 'Usuário', 'Augusto Araújo saiu do sistema', '2019-12-18 17:03:15', 'SUPORTE-DELL', '::1'),
(351, '', 'Saiu', 'Usuário', ' saiu do sistema', '2019-12-20 19:10:24', 'SUPORTE-DELL', '::1'),
(352, 'Augusto Araújo', 'Entrou', 'Usuário', 'Usuário entrou no sistema', '2019-12-20 19:10:51', 'SUPORTE-DELL', '::1'),
(353, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:2', '2019-12-20 19:21:29', 'SUPORTE-DELL', '::1'),
(354, 'Augusto Araújo', 'Venda', 'Vendas', 'Usuário vendeu novo produto Feijão preto, QUANT:2', '2019-12-20 19:22:20', 'SUPORTE-DELL', '::1'),
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
(1, 'Augusto Araújo', '69196222204', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(8, 'José', '12345678901', 'e10adc3949ba59abbe56e057f20f883e', 0, 0);

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

--
-- Indexes for dumped tables
--

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
