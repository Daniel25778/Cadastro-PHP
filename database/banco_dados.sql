#CRIAR O BANCO DE DADOS:
create database cadastro_atividade_crud;

#HABILITAR O BANCO DE DADOS:
use cadastro_atividade_crud;

#CRIAR A TABELA DE PESSOAS NO BANCO DE DADOS:
create table tbl_pessoa(
cod_pessoa int unsigned auto_increment primary key,
nome varchar(250) not null,
sobrenome varchar(500) not null,
email varchar(500) not null,
celular varchar(20) not null
);