create database migsupermarket;
use migsupermarket;

create table usuario(
codigo_usuario int not null auto_increment,
nome varchar(60),
email varchar(50),
senha varchar(16),
telefone bigint(13),
imagem varchar(100),
primary key(codigo_usuario)
);

create table produto(
codigo_produto int not null auto_increment,
nome_produto varchar(100),
preco_produto decimal(10,2),
primary key(codigo_produto)
)

