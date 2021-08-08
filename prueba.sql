CREATE DATABASE IF NOT EXISTS prueba;
USE prueba;
/*creación de la base de datos*/
CREATE TABLE productos(
	id int AUTO_INCREMENT not null PRIMARY KEY,
    nombre varchar(50),
    descripcion varchar(50),
    precio int
);

/*inserción de datos*/
insert into productos(nombre,descripcion,precio) values('leche','leche de soya', 20);
insert into productos(nombre,descripcion,precio) values('pasta','pasta vegetal', 50);
insert into productos(nombre,descripcion,precio) values('galletas','galletas de sal', 80);