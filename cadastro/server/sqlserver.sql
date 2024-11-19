create database sqlserver;
use sqlserver;

create table usuario(
	id int primary key auto_increment,
	nome varchar(80) not null,
    email varchar(80) not null,
    senha varchar(100) not null,
    endereco varchar(70),
    data_nasc date
);

