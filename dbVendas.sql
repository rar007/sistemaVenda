CREATE TABLE unidade
(
	id INT NOT NULL AUTO_INCREMENT,
	descricao VARCHAR(30),
	sigla VARCHAR(2),
	PRIMARY KEY(id)
);

CREATE TABLE produto
(
	id INT NOT NULL AUTO_INCREMENT,
	descricao VARCHAR(50) NOT NULL,
	preco FLOAT NOT NULL DEFAULT 0,
	qtde INT NOT NULL DEFAULT 0,F
	unidade_id INT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(unidade_id) REFERENCES unidade (id)
);

CREATE TABLE status_venda
(
	id INT NOT NULL AUTO_INCREMENT,
	descricao VARCHAR(20) NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE venda
(
	id INT NOT NULL AUTO_INCREMENT,
	data_venda INT NOT NULL,
	status_venda_id INT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (status_venda_id) REFERENCES status_venda (id)
);

CREATE TABLE item_venda
(
	id INT NOT NULL AUTO_INCREMENT,
	venda_id INT NOT NULL,
	produto_id INT NOT NULL,
	qtde INT NOT NULL DEFAULT 1,
	desconto FLOAT NOT NULL DEFAULT 0,
	PRIMARY KEY(id),
	FOREIGN KEY(venda_id) REFERENCES venda (id),
	FOREIGN KEY(produto_id) REFERENCES produto (id)
);