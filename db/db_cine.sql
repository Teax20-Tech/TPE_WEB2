CREATE TABLE cliente (
    id_cliente INT NOT NULL AUTO_INCREMENT,
    socio BOOLEAN NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    CONSTRAINT CLIENTE_pk PRIMARY KEY (id_cliente)
);

CREATE TABLE entrada (
    id_entrada INT NOT NULL AUTO_INCREMENT,
    valor_final INT NOT NULL,
    tipo_entrada VARCHAR(50) NOT NULL,
    descuento_aplicado INT NOT NULL,
    CLIENTE_id_cliente INT NOT NULL,
    CONSTRAINT ENTRADA_pk PRIMARY KEY (id_entrada)
);

CREATE TABLE usuario (
    id_usuario INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    CONSTRAINT USUARIO_pk PRIMARY KEY (id_usuario),
    CONSTRAINT UQ_USUARIO_usuario UNIQUE (usuario)
);

ALTER TABLE entrada
    ADD CONSTRAINT FK_ENTRADA_CLIENTE
    FOREIGN KEY (CLIENTE_id_cliente)
    REFERENCES cliente (id_cliente);

INSERT INTO cliente (socio, nombre, fecha_nacimiento) VALUES
(1, 'Juan Perez', '1995-04-15'),
(0, 'Maria Gomez', '2000-08-22'),
(1, 'Lucas Fernandez', '1988-11-10');

INSERT INTO entrada
(valor_final, tipo_entrada, descuento_aplicado, CLIENTE_id_cliente) VALUES
(8000, 'General', 10, 1),
(12000, 'VIP', 0, 2),
(8000, 'General', 10, 1),
(12000, 'VIP', 15, 3);

INSERT INTO usuario (usuario, password) VALUES
(
    'webadmin',
    '$2y$10$wo3bKF1mOtM2eXzYBxRoCufywkOxGyZeFzzdU30vZcR1VbORboRkq'
);