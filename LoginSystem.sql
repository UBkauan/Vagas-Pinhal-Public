CREATE DATABASE IF NOT EXISTS loginsystem;
USE loginsystem;
-- DROP DATABASE LoginSystem;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    nome VARCHAR(255),
    sobrenome VARCHAR(255)
);	

CREATE TABLE empresas (
    id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_empresa VARCHAR(255),
    email VARCHAR(255),
    senha VARCHAR(255) NOT NULL,
    cnpj VARCHAR(18),
    endereco VARCHAR(255)
);

CREATE TABLE vagas (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    empresa_id INT,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT,
    data_cadastro DATE,
    imagem VARCHAR(255)
);

CREATE TABLE candidatos (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE candidaturas (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    vaga_id INT,
    candidato_id INT,
    FOREIGN KEY (vaga_id) REFERENCES vagas(id),
    FOREIGN KEY (candidato_id) REFERENCES candidatos(id)
);



SELECT * FROM usuario;
SELECT * FROM empresas;
SELECT * FROM vagas ORDER BY data_cadastro;
SELECT * FROM candidaturas;

DROP TABLE candidaturas;
DROP TABLE vagas;