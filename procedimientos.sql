
DELIMITER $$
CREATE OR REPLACE PROCEDURE CREAR_CLIENTE(
    IN ID_CLIENTE_C INT,
    IN NOMBRE_C VARCHAR(30),
    IN DIRECCION_C VARCHAR(30),
    IN TELEFONO_C INT
)
BEGIN 
    INSERT INTO CLIENTE (ID_CLIENTE ,NOMBRE , DIRECCION, TELEFONO)
    VALUES (ID_CLIENTE_C, NOMBRE_C, DIRECCION_C, TELEFONO_C);
   	COMMIT;
END
$$

DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE UPDATE_CLIENTE(
	IN CLIENTEID_C INT,
    IN NOMBRE_C VARCHAR(30),
    IN DIRECCION_C VARCHAR(30),
    IN TELEFONO_C INT
)

BEGIN 
	UPDATE CLIENTE
    SET NOMBRE = NOMBRE_C , DIRECCION = DIRECCION_C , 
    TELEFONO = TELEFONO_C WHERE CLIENTE.ID_CLIENTE = CLIENTEID_C ;
   	COMMIT;
END
$$
DELIMITER;

DELIMITER $$
CREATE OR REPLACE PROCEDURE CREAR_CATEGORIA(
	IN ID_CATEGORIA_C INT,
	IN NOMBRE_C VARCHAR(30),
	IN DESCIPCION_C VARCHAR(100)
)

BEGIN 
	INSERT INTO CATEGORIA (ID_CATEGORIA, NOMBRE, DESCRIPCION)
	VALUES (ID_CATEGORIA_C, NOMBRE_C, DESCIPCION_C);
	COMMIT;
END
$$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE UPDATE_CATEGORIA(
	IN ID_CATEGORIA_C INT,
	IN NOMBRE_C VARCHAR(30),
	IN DESCRIPCION_C VARCHAR(100)
)
BEGIN 
	UPDATE CATEGORIA 
	SET ID_CATEGORIA = ID_CATEGORIA_C, NOMBRE = NOMBRE_C, DESCRIPCION = DESCRIPCION_C
	WHERE ID_CATEGORIA = ID_CATEGORIA_C;
	COMMIT;
END
$$
DELIMITER ;

DELIMITER $$

CREATE OR REPLACE PROCEDURE DELETE_CATEGORIA(
	IN ID_CATEGORIA_C INT
)
BEGIN 
	DELETE FROM CATEGORIA WHERE ID_CATEGORIA = ID_CATEGORIA_C;
	COMMIT;
END
$$
DELIMITER ;


CALL CREAR_CATEGORIA (1, "PLATOS CALIENTES", "PLATOS PREPARADOS CALIENTES");

CALL UPDATE_CATEGORIA (1, "P", "PP");

CALL DELETE_CATEGORIA (1);


SELECT *FROM CATEGORIA c ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE CREAR_PRODUCTO(
	IN ID_PRODUCTO_C INT,
	IN ID_CATEGORIA_C INT,
	IN NOMBRE_C VARCHAR(30),
	IN PRECIO_C INT,
	IN T_PREPARACION_C INT
)

BEGIN 
	INSERT INTO PRODUCTO (ID_PRODUCTO, ID_CATEGORIA, NOMBRE, PRECIO, T_PREPARACION_MIN)
	 VALUES (ID_PRODUCTO_C, ID_CATEGORIA_C, NOMBRE_C, PRECIO_C, T_PREPARACION_C);
	COMMIT;
END
$$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE UPDATE_PRODUCTO(
	IN ID_PRODUCTO_C INT,
	IN ID_CATEGORIA_C INT,
	IN NOMBRE_C VARCHAR(30),
	IN PRECIO_C INT,
	IN T_PREPARACION_C INT

)

BEGIN 
	UPDATE PRODUCTO 
	SET ID_PRODUCTO = ID_PRODUCTO_C, ID_CATEGORIA = ID_CATEGORIA_C, NOMBRE = NOMBRE_C,
	PRECIO = PRECIO_C, T_PREPARACION_MIN = T_PREPARACION_C WHERE ID_PRODUCTO = ID_PRODUCTO_C;
	COMMIT;
END
$$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE DELETE_PRODUCTO(
	ID_PRODUCTO_C INT
)
BEGIN 
	DELETE FROM PRODUCTO WHERE PRODUCTO.ID_PRODUCTO = ID_PRODUCTO_C;
	COMMIT;
END
$$
DELIMITER ;