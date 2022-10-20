CREATE SCHEMA filmes_bd;
USE filmes_bd;

CREATE TABLE IF NOT EXISTS filme (
	id int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nome varchar(255),
	ano int(4)
);

CREATE TABLE IF NOT EXISTS avaliacao (
	id int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	enredo int(1),
	elenco int(1),
	direcao int(1),
	filme_id int(4),
	CONSTRAINT fk_filme FOREIGN KEY (filme_id) REFERENCES filmes(id)
);