/*
* Creacion de Tablas 
*/


CREATE TABLE CLIENTE(
	ID_CLIENTE INT UNIQUE,
	NOMBRE VARCHAR (30),
	DIRECCION VARCHAR (30),
	TELEFONO INT
);

CREATE TABLE PRODUCTO(
	ID_PRODUCTO INT UNIQUE,
	ID_CATEGORIA INT,
	NOMBRE VARCHAR (30),
	PRECIO INT,
	T_PREPARACION_MIN INT 
);

CREATE TABLE CATEGORIA(
	ID_CATEGORIA INT UNIQUE,
	NOMBRE VARCHAR (30),
	DESCRIPCION VARCHAR (100)
);

CREATE TABLE DETALLE(
	ID_CARRITO INT,
	ID_PRODUCTO INT,
	CANTIDAD INT
);

CREATE TABLE CARRITO(
	ID_CARRITO INT UNIQUE,
	ID_CLIENTE INT,
	TIEMPO_ESTIMADO INT,
	TOTAL INT
);

CREATE TABLE PEDIDO(
	ID_PEDIDO INT UNIQUE,
	ID_CARRITO INT,
	ID_CLIENTE INT,
	ID_REPARTIDOR INT,
	ACEPTADO BOOLEAN,
	ENTREGADO BOOLEAN,
	MEDIO_PAGO VARCHAR (30)
);

CREATE TABLE REPARTIDOR(
	ID_REPARTIDOR INT UNIQUE,
	NOMBRE VARCHAR (30),
	VEHICULO VARCHAR (30),
	TELEFONO INT UNIQUE
);

/*
*Creacion de Claves Primarias
*/

ALTER TABLE CLIENTE 	ADD CONSTRAINT PK_CLIENTE 	PRIMARY KEY(ID_CLIENTE);
ALTER TABLE PRODUCTO 	ADD CONSTRAINT PK_PRODUCTO 	PRIMARY KEY(ID_PRODUCTO);
ALTER TABLE CATEGORIA 	ADD CONSTRAINT PK_CATEGORIA PRIMARY KEY(ID_CATEGORIA);
ALTER TABLE CARRITO 	ADD CONSTRAINT PK_CARRITO 	PRIMARY KEY(ID_CARRITO);
ALTER TABLE PEDIDO 		ADD CONSTRAINT PK_PEDIDO 	PRIMARY KEY(ID_PEDIDO);
ALTER TABLE REPARTIDOR 	ADD CONSTRAINT REPARTIDOR 	PRIMARY KEY(ID_REPARTIDOR);


/*
* Creacion de Claves Foraneas
*/
ALTER TABLE PRODUCTO 	ADD CONSTRAINT FK_PRODUCTO 	FOREIGN KEY (ID_CATEGORIA) 		REFERENCES CATEGORIA(ID_CATEGORIA);
ALTER TABLE DETALLE 	ADD CONSTRAINT FK_DETALLE_1 FOREIGN KEY (ID_CARRITO)		REFERENCES CARRITO(ID_CARRITO);
ALTER TABLE DETALLE 	ADD CONSTRAINT FK_DETALLE_2 FOREIGN KEY (ID_PRODUCTO) 		REFERENCES PRODUCTO(ID_PRODUCTO);
ALTER TABLE CARRITO 	ADD CONSTRAINT FK_CARRITO 	FOREIGN KEY (ID_CLIENTE) 		REFERENCES CLIENTE(ID_CLIENTE);
ALTER TABLE PEDIDO 		ADD CONSTRAINT FK_PEDIDO_1 	FOREIGN KEY (ID_CARRITO) 		REFERENCES CARRITO(ID_CARRITO);
ALTER TABLE PEDIDO 		ADD CONSTRAINT FK_PEDIDO_2 	FOREIGN KEY (ID_CLIENTE) 		REFERENCES CLIENTE(ID_CLIENTE);
ALTER TABLE PEDIDO 		ADD CONSTRAINT FK_PEDIDO_3 	FOREIGN KEY (ID_REPARTIDOR) 	REFERENCES REPARTIDOR(ID_REPARTIDOR);
