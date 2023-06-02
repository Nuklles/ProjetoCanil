CREATE DATABASE nuvem;
USE nuvem;

CREATE TABLE dados (
  id int(255),
  nome VARCHAR(300),
  cpf VARCHAR(11),
  cidade VARCHAR(50),
  estado VARCHAR(50),
  cep VARCHAR(15),  
  telefone VARCHAR(30),
  email VARCHAR(100),
  especie VARCHAR(100),
  porte VARCHAR(100),
  sexo VARCHAR(100),
  obs VARCHAR(100)   
  
);
CREATE TABLE caches (
ordem INT AUTO_INCREMENT PRIMARY KEY,
id int(255)

); 