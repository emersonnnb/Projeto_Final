-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Fev-2020 às 00:42
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `comercio`
--
CREATE DATABASE IF NOT EXISTS `comercio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `comercio`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso_restrito`
--

CREATE TABLE `acesso_restrito` (
  `id_restrito` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acesso_restrito`
--

INSERT INTO `acesso_restrito` (`id_restrito`, `nome`, `email`, `telefone`, `login`, `senha`) VALUES
(1, 'Administrador', 'admin@admin.com', '(21)0000-0000', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `dtnasc` date NOT NULL,
  `identidade` varchar(12) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(70) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `celular` varchar(13) NOT NULL,
  `imagem` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `dtnasc`, `identidade`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `email`, `senha`, `celular`, `imagem`) VALUES
(9, 'Maria', '2000-03-20', '0000-00-00', '1003240932', '20030-041', 'Rua Santa Luzia', '323', '2323', 'Centro', 'Rio de Janeiro', 'RJ', 'pedro@gmail.com', '123', '3424334', '359e26dfb685a25e7bcbfa744c5543f5.jpg'),
(10, 'Marcos', '2000-02-10', '0000-00-00', '0-40-43-0', '21220310', 'Estrada Coronel Vieira', '33', '33', 'IrajÃ?Â¡', 'Rio de Janeiro', 'RJ', 'marcos@gmail.com', '123', '123443', '1423f8d3adade1fe7ec05a1b21d7b211.jpg'),
(11, 'Maria', '2000-02-20', '0000-00-00', '90909009', '21512340', 'Beco SÃ?Â£o Pedro', '22', '22', 'Costa Barros', 'Rio de Janeiro', 'RJ', 'maria@gmail.com', '123', '323232', '5c4e10ec30e9cb0d58aa010cfe6b7873.jpg'),
(12, 'Ana', '2000-02-20', '0000-00-00', '9999090', '21220310', 'Estrada Coronel Vieira', '12', '11', 'IrajÃ?Â¡', 'Rio de Janeiro', 'RJ', 'ana@gmail.com', '123', '219990093', 'f1b5f3a0125d44360cb35012a51603d0.jpg'),
(13, 'Ana', '2000-02-20', '0000-00-00', '9999090', '21220310', 'Estrada Coronel Vieira', '12', '11', 'IrajÃ?Â¡', 'Rio de Janeiro', 'RJ', 'ana@gmail.com', '123', '219990093', '3004bf293ee729e294c4f29c876b9937.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `sub` float(10,2) NOT NULL,
  `total` float(10,2) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `datacompra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `qtd`, `sub`, `total`, `id_cliente`, `id_produto`, `datacompra`) VALUES
(1, 1, 199.00, 199.00, 9, 2, '2019-08-10'),
(2, 1, 250.00, 449.00, 9, 3, '2019-08-10'),
(3, 2, 500.00, 500.00, 9, 3, '2019-08-10'),
(4, 1, 389.00, 889.00, 9, 4, '2019-08-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `preco` varchar(12) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `descricao`, `categoria`, `preco`, `imagem`) VALUES
(1, 'Kit para Arduino', 'Kits Didáticos', '67.00', 'kitarduino.png'),
(2, 'Kit Iniciante V8 para Arduino', 'Kits Didáticos', '199.00', 'kitiniciantev8.png'),
(3, 'Kit Avancado V4 para Arduino', 'Kits Didáticos', '250.00', 'kitavancadov4.png'),
(4, 'Master Kit: Kit Iniciante V8 + Kit Avançado V4', 'Kits Didáticos', '389.00', 'kitiniciantev8v4.png'),
(5, 'Kit Iniciante para Robotica', 'Kits Didáticos', '349.00', 'kitrobotica.png'),
(6, 'Arduino Shield - Ethernet W5500', 'Shields para Arduino', '119.00', 'ethernetw5500.png'),
(7, 'Arduino Shield - Padawan', 'Shields para Arduino', '49.00', 'padawan.png'),
(8, 'Arduino Shield - Albatross Master', 'Shields para Arduino', '69.00', 'albastrossmaster.png'),
(9, 'Arduino Shield - CNC V3', 'Shields para Arduino', '29.00', 'cncv3.png'),
(10, 'Arduino Shield - Joystick', 'Shields para Arduino', '49.00', 'joystick.png'),
(11, 'Placa Nano V3 + Cabo USB para Arduino', 'Placas Arduino', '39.00', 'placananov3.png'),
(12, 'Placa RC FTDI V1.1', 'Placas Arduino', '35.00', 'placarcftdi.png'),
(13, 'Placa STM32F103C8T6 ARM Cortex M3', 'Placas Arduino', '35.00', 'cortexm3.png'),
(14, 'Placa Uno R3 + Cabo USB para Arduino', 'Placas Arduino', '54.00', 'placaunor3.png'),
(15, 'ATmega328 com Arduino Optiboot (UNO)', 'Placas Arduino', '21.50', 'atmega328.png'),
(16, 'Braço Robótico RoboARM', 'Originais RoboCore', '149.00', 'braco.png'),
(17, 'BlackBoard Pro Mini - 5V/16MHz', 'Originais RoboCore', '25.00', 'board.png'),
(18, 'Kit Resistor 500', 'Originais RoboCore', '29.00', 'resistor.png'),
(19, 'Módulo Display Serial', 'Originais RoboCore', '25.00', 'display.png'),
(20, 'Sensor de Som', 'Originais RoboCore', '12.00', 'sensor.png'),
(21, 'Multìmetro Digital Hikari HM-1001', 'Novidades', '39.00', 'multi.png'),
(22, 'Linux para Makers', 'Novidades', '75.00', 'linux.png'),
(23, 'Micro Servo MG90S TowerPro', 'Novidades', '25.00', 'servo.png'),
(24, 'Carregador de Bateria iMax B6 com Fonte', 'Novidades', '215.00', 'carregador.png'),
(25, 'Fita LED RGB EndereçÃ¡vel WS2812B 5050 - 1 metro', 'Novidades', '59.00', 'fita.png'),
(26, 'Albatross - Fonte 12V 1A para módulos escravos', 'Automação Resid', '19.00', 'escravos.png'),
(27, 'Albatross Slave - Relê', 'Automação Resid', '289.00', 'slave.png'),
(28, 'Cabo de Rede 3,0m - Patch Cord', 'Automação Resid', '8.50', 'cabo.png'),
(29, 'Albatross cabo IR - 5m', 'Automação Resid', '9.00', 'caboir.png'),
(30, 'VÃ¡lvula Solenoide 1/2 x 1/2', 'Automação Resid', '49.00', 'valvula.png'),
(31, 'Botão Arcade Amarelo', 'Itens Eletrônicos', '9.00', 'yellowp.png'),
(32, 'Botão Arcade Azul', 'Itens Eletrônicos', '9.00', 'blup.png'),
(33, 'Botão Arcade Verde', 'Itens Eletrônicos', '9.00', 'greenp.png'),
(34, 'Botão Arcade Vermelho', 'Itens Eletrônicos', '9.00', 'redp.png'),
(35, 'Joystick Arcade', 'Itens Eletrônicos', '49.00', 'jostick.png'),
(36, 'Cartão de Memória MicroSD 16GB Classe 10 Sandisk', 'Embarcados', '39.00', 'caard.png'),
(37, 'Cartão de Memória MicroSD 32GB Classe 10 Sandisk', 'Embarcados', '99.00', 'card.png'),
(38, 'Guia do Maker para o Apocalipse Zumbi', 'Embarcados', '59.00', 'zumbi.png'),
(39, 'WorkPlate 400', 'Embarcados', '14.90', 'work.png'),
(40, 'Câmera para Raspberry Pi Rev 1.3', 'Embarcados', '69.90', 'rasp.png'),
(41, 'Módulo WiFi - ESP8266', 'Internet das Coisas', '25.00', 'modulo.png'),
(42, 'ESP32 - WiFi & Bluetooth', ' Internet das Coisas', '79.00', 'eps.png'),
(43, 'Módulo Ethernet ENC28J60', 'Internet das Coisas', '29.00', 'enc.png'),
(44, 'NodeMCU ESP8266-12 V2', 'Internet das Coisas', '49.00', 'node.png'),
(45, 'Adaptador para ESP8266', ' Internet das Coisas', '14.90', 'epss.png'),
(46, 'Adaptador HDMI - VGA com Audio', 'Cabos e Conectores', '49.00', 'hdmivga.png'),
(47, 'Adaptador P4 Fêmea - Borne', 'Cabos e Conectores', '2.90', 'pp.png'),
(48, 'Adaptador P4 Macho - Borne', 'Cabos e Conectores', '2.90', 'pm.png'),
(49, 'Borne Emenda 2 Vias', 'Cabos e Conectores', '2.50', 'borne.png'),
(50, 'Deans Style T-Connectors', 'Cabos e Conectores', '10.00', 'style.png'),
(51, 'Caixa de Redução Orbit500 4:1', 'Caixas de Redução', '99.00', 'caixab.png'),
(52, 'Orbit500 - Bloco Frontal', 'Caixas de Redução', '42.00', 'orbit.png'),
(53, 'Orbit500 - Engrenagem Planeta / Pinhão (Jogo)', 'Caixas de Redução', '10.00', 'engre.png'),
(54, 'Orbit500 - Eixo 8mm', 'Caixas de Redução', '15.00', 'eixo.png'),
(55, 'Orbit500 - Prato de Saìda p/ Eixo', 'Caixas de Redução', '14.50', 'pratoo.png'),
(56, 'LCD 16x2 5V Laranja no Preto', 'Displays e LCDs', '16.90', 'lcd.png'),
(57, 'LCD 16x2 5V Preto no Verde com Barra de Pinos Soldada', 'Displays e LCDs', '23.90', 'lcdb.png'),
(58, 'LCD 16x2 Com Interface I2C', 'Displays e LCDs', '39.00', 'lcda.png'),
(59, 'LCD 20x4 5V Preto no Verde', 'Displays e LCDs', '40.90', 'lcdv.png'),
(60, 'Display LCD TFT Touch 3.5 para Raspberry Pi', 'Displays e LCDs', '159.00', 'lcdtft.png'),
(61, 'Circuito Meia Ponte BTN7970B', 'Drivers de Motores', '24.90', 'ponte.png'),
(62, 'Circuito Ponte-H - L293D', 'Drivers de Motores', '9.90', 'ponteh.png'),
(63, 'Driver para motor de passo DM322E 50VDC / 2.2A', 'Drivers de Motores', '199.00', 'motor.png'),
(64, 'Driver de Motor de Passo A4988', 'Drivers de Motores', '14.90', 'motorp.png'),
(65, 'SyRen 25A', 'Drivers de Motores', '499.00', 'syren.png'),
(66, 'Alicate de Bico Longo HK-507', 'Ferramentas', '19.90', 'alicate.png'),
(67, 'Alicate de Corte de Precisão', 'Ferramentas', '19.00', 'alicatep.png'),
(68, 'Chave Phillips 1/8 x 3 Pol PH0 - Stanley', 'Ferramentas', '4.50', 'chavep.png'),
(69, 'Multìmetro Digital DT-830D', 'Ferramentas', '39.00', 'multid.png'),
(70, 'Kit de Chaves Philips e Fenda', 'Ferramentas', '45.00', 'kitchave.png'),
(71, 'Bateria LiPo 11,1V 2200mAh 30C', 'Fontes e Baterias', '149.00', 'fonteb.png'),
(72, 'Fonte AjustÃ¡ável para Protoboard', 'Itens Eletrônicos', '9.90', 'proto.png'),
(73, 'Monitor de Tensão para Baterias 1S-8S', 'Fontes e Baterias', '19.00', 'tensao.png'),
(74, 'Fonte de Alimentação Variável 0~32V / 0~3A HF-3203', 'Fontes e Baterias', '599.00', 'fonteali.png'),
(80, 'Kit Material Escolar', 'Material Escolar', '99.00', 'mat.jpg'),
(81, 'Material De Pintura Summer Store 9pcs', 'Material Escolar', '44,00', 'mat2.jpg'),
(82, 'Kit Mochila Escolar Rebecca Bonbon E Estojo ', 'Material Escolar', '169.90', 'mat3.jpg'),
(83, 'Kit Escolar Infantil Com Mochila de Rodinhas + Lancheira + Estojo Motocicleta', 'Material Escolar', '99,00', 'mat4.jpg'),
(84, 'Smartphone Motorola One Vision 128GB Dual Chip Android Pie 9.0 Tela 6,3\" 4G + Câmera 48+5MP - Azul Safira', 'Smartphone', '1.499,00', 'cel.jpg'),
(86, 'Smart TV Oled 55\" LG OLED55C9 HDR Ativo com Dolby Vision e Dolby Atmos 4 HDMI 3 USB Wi-Fi com Inteligência Artificial ', 'Smart TV', '5.899,99', 'smart1.jpg'),
(87, 'Micro-ondas Consul Espelhado - 20L - Cinza 220V - Cm020', 'Eletrodomésticos', '420.50', 'micro.jpg'),
(88, 'Fritadeira Elétrica Sem Óleo - Air Fryer Mondial AF-30 Family IV 3,5L Preta com Timer 110v', 'Eletrodomesticos', '250.00', 'frit.jpg'),
(89, 'Smartphone Samsung Galaxy A50 Android 9.0 Tela 6.4\" Octa-Core 128GB 4G Câmera Tripla 25MP + 5MP + 8MP - Preto', 'Smartphone', '1.398,99', 'cel1.jpg'),
(90, 'Relógio Inteligente Smartwatch com Bluetooth Cores Preto, Azul, Vermelho e Roxo', 'Relogio', '53.99', 'rel.jpg'),
(91, 'Aparador De Pelos Multigroom com 6 Acessórios MG3712 - Philips.', 'Beleza', '89.99', 'apar.jpg'),
(92, 'Geladeira/Refrigerador Electrolux 382 litros TW42S Inox Top Freezer Com Dispenser De Água 110v', 'Eletrodomésticos', '2.268,99', 'gel.jpg'),
(93, 'Ar-Condicionado Split HW LG Dual Inverter 18.000 BTUs Só Frio 220V', 'Eletro', '3.200,00', 'ar.jpg'),
(94, 'Ar Condicionado Split Inverter Electrolux 18.000 BTU/h Frio QI18F', 'Eletrodomesticos', '2.248,99', 'ar1.jpg'),
(95, 'Purificador De Água Branco Com Painel Touch Bivolt (pe11b)', 'Eletrodomésticos', '409.99', 'pur.jpg'),
(96, 'Fogão Brastemp 6 Bocas BFS6N Branco - Bivolt', 'Eletrodomésticos', '1.067,00', 'fog.jpg'),
(97, 'Lavadora de Roupas Brastemp 15kg BWH15 Branco - 110v', 'Eletrodomésticos', '1.798,99', 'maq.jpg'),
(98, 'Lavadora De Roupas Colormaq Lca 15kg Branca 220v', 'Eletrodomésticos', '1.299,00', 'maq1.jpg'),
(99, 'Cadeira Charles Eames Wood - Daw - Com Braços - Design', 'Moveis', '169.48', 'cad.jpg'),
(100, 'Kit Mesa Jantar Eames Eiffel 80cm + 4 Cadeiras Eames Eiffel - Preta', 'Moveis', '476.99', 'cad1.jpg'),
(101, 'Sofá-cama 3 Lugares Casal Premium Suede Cinza', 'Moveis', '819.99', 'sof.jpg'),
(102, 'Cama Solteiro Bau Larissa Com cama auxiliar Dani Framar Branco', 'Moveis', '499.99', 'cam.jpg'),
(103, 'Smart Bedz Dubai - Cama Multifuncional Don Mills - Com massagem, USB, Som ', 'Moveis', '10.990,00', 'cam1.jpg'),
(104, 'Beliche 3 Gavetas Havana Plus Santos Andirá', 'Moveis', '700.00', 'cam2.jpg'),
(105, 'Guarda Roupa Casal 100% MDF com Espelho Madesa Royale 3 Portas de Correr', 'Moveis', '1.313.99', 'guar.jpg'),
(106, 'Guarda Roupa Casal 100% MDF Madesa Eros 3 Portas de Correr com Espelho', 'Moveis', '1.259.99', 'guar1.jpg'),
(107, 'Tênis Timberland Gorge C2 - Masculino', 'Calcados', '199.99', 'ten.jpg'),
(108, 'Chinelo Grendene Rider R89 Ad - Slide - Masculino', 'Calcados', '74,99', 'chi.jpg'),
(109, 'Smartphone LG K12 Plus 32GB Dual Chip Android 8.1 Oreo Tela 5,7\" Octa Core 2.0GHz 4G Câmera 16MP Inteligência Artificial - Azul', 'Smartphone', '620.00', 'cel2.jpg'),
(110, 'Penteadeira LED com Espelho 9 Gavetas Camarim Planet Baby Branco', 'Moveis', '817.00', 'pent.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `celular`, `email`, `senha`) VALUES
(1, 'Ana', '215905409590', 'ana@gmail.com', '123'),
(2, 'Maria', '210949034390', 'maria@gmail.com', '123'),
(3, 'JosÃ?Â©', '2109493490', 'jose@gmail.com', '123'),
(4, 'Naira', '2159090', 'naira@gmail.com', '123454'),
(5, 'Marcos', '21003030', 'marcos@gmail.com', '1234567');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acesso_restrito`
--
ALTER TABLE `acesso_restrito`
  ADD PRIMARY KEY (`id_restrito`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `codproduto` (`id_produto`),
  ADD KEY `codcliente` (`id_cliente`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acesso_restrito`
--
ALTER TABLE `acesso_restrito`
  MODIFY `id_restrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
