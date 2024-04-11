CREATE DATABASE IF NOT EXISTS LoginSystem;
USE LoginSystem;
-- DROP DATABASE LoginSystem;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    nome VARCHAR(255),
    sobrenome VARCHAR(255),
    endereco VARCHAR(255),
    cidade VARCHAR(255),
    estado VARCHAR(255),
    cep VARCHAR(10)
);	

CREATE TABLE empresas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_empresa VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    senha VARCHAR(255) NOT NULL,
    cnpj VARCHAR(18),
    endereco VARCHAR(255),
    cidade VARCHAR(255),
    estado VARCHAR(255),
    cep VARCHAR(10)
);

CREATE TABLE vagas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    empresa_id INT,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT,
    FOREIGN KEY (empresa_id) REFERENCES empresas(id)
);

CREATE TABLE candidatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE candidaturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vaga_id INT,
    candidato_id INT,
    FOREIGN KEY (vaga_id) REFERENCES vagas(id),
    FOREIGN KEY (candidato_id) REFERENCES candidatos(id)
);


SELECT * FROM usuario;
SELECT * FROM empresas;
SELECT * FROM vagas;
SELECT * FROM candidaturas;
