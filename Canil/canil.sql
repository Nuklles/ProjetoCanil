CREATE DATABASE canil;
USE canil;

drop database canil;

CREATE TABLE cadastro_empresa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome varchar(300),
  cnpj varchar(14),
  telefone varchar(30),
  email varchar(100)
    
);

CREATE TABLE cadastro_usuario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome varchar(300),
  cpf varchar(11),
  telefone varchar(30),
  email varchar(100)
  
);

CREATE TABLE login (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email varchar(50),
  senha varchar(50)
  
);

CREATE TABLE pets (
  id_pets INT AUTO_INCREMENT PRIMARY KEY,
  id int(255),
  nome varchar(255),
  arquivo longblob,
  nomepet varchar(30),
  especie varchar(30),
  porte varchar(30),
  sexo varchar(30),
  obs varchar(30)
  
);

CREATE TABLE pets_empresa(
  id_pets INT AUTO_INCREMENT PRIMARY KEY,
  id int(255),
  nome varchar(255),
  arquivo longblob,
  nomepet varchar(30),
  especie varchar(30),
  porte varchar(30),
  sexo varchar(30),
  obs varchar(30)
  
);