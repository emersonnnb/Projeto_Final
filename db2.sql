drop database if exists bd_pdv2;
create database bd_pdv2;
use bd_pdv2;

-- ---------------------- Estrutura da tabela Unidade de Medida ------------------------------

create table unidade_medida(
 idUnidade int(25) not null auto_increment primary key,
 nome varchar (255)
);
INSERT INTO `unidade_medida` (`idUnidade`, `nome`) VALUES (NULL, 'Unidade'), (NULL, 'Kg');

-- ---------------------- Estrutura da tabela Categoria -------------------------------------

create table categoria(
 idCategoria int(25) not null auto_increment primary key,
 nome varchar(255)  not null
);
INSERT INTO `categoria` (`idCategoria`, `nome`) VALUES (NULL, 'Massas'), (NULL, 'Cereias');

-- ---------------------- Estrutura da tabela Sub-categoria ----------------------------------

create table sub_categoria(
 idSubcategoria int(25) not null auto_increment primary key,
 id_categoria int,
 nome varchar(255) not null,
 foreign key (id_categoria) REFERENCES categoria (idCategoria)
);
INSERT INTO `sub_categoria` (`idSubcategoria`, `id_categoria`, `nome`) VALUES (NULL, '1', 'Macarrão'), (NULL, '2', 'Arroz');

-- ---------------------- Estrutura da tabela Produto ---------------------------------------

create table produto (
 idProduto int(25) not null auto_increment primary key,
 codigo int(100),
 nome varchar(255) not null,
 id_unidade int not null,
 id_categoria int not null,
 id_subcategoria int,
 precoCusto decimal(10,2) not null,
 precoVenda decimal(10,2) not null,
 codigoBarra int(15),
 dataCadastro date not null,
 usuarioCadastro varchar(50),
 statusProduto int(1)not null,

 foreign key (id_unidade) REFERENCES unidade_medida (idUnidade),
 foreign key (id_categoria) REFERENCES categoria (idCategoria),
 foreign key (id_subcategoria) REFERENCES sub_categoria (idSubcategoria)
);

INSERT INTO `produto` (`idProduto`, `codigo`, `nome`, `id_unidade`, `id_categoria`, `id_subcategoria`, `precoCusto`, `precoVenda`, `codigoBarra`, `dataCadastro`, `usuarioCadastro`, `statusProduto`) VALUES 
(NULL, '12', 'Arroz', '2', '2', '2', '5.50', '8.50', NULL, '2020-01-13', NULL, '1');

-- ---------------------- Estrutura da tabela PDV ---------------------------------------
create table pdv (
idPdv int(25) not null auto_increment primary key,
nome varchar(10) not null,
dataCadatro date not null,
usuarioCadastro varchar(50),
statusPdv int(1)not null
);

INSERT INTO `pdv` (`idPdv`, `nome`, `dataCadatro`, `usuarioCadastro`, `statusPdv`) VALUES (NULL, '01', '2020-01-13', NULL, '1'), (NULL, '02', '2020-01-13', NULL, '1');

-- ---------------------- Estrutura da tabela Usu�rio ---------------------------------------

create table usuario (
 idUsuario int not null auto_increment primary key,
 nome varchar(255) not null,
 cpf int(15),
 senha varchar(255)not null,
 id_pdv int,
 statusUsuario int(1),
 datacadastro date not null,
 usuarioCadastro varchar(255),
 
 foreign key (id_pdv) references  pdv (idPdv)
);



- Vendas (id_ven, codigo_pro, nome_produto, quantidade_pro, preco_venda_pro, desconto, acrescimo, valor total, data_venda, num_pdv, status_ven, usuario_cad)
	Chave estrangeiras = nome_produto(produtos) / num_pdv(pdv)

- Forma_pg (id_pag, descriçao, data_cad, usuario_cad)

- Permissoes (id_per, id_usuario, tipo, status) chave estrangeira de usuario
