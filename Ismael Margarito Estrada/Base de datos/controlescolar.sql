CREATE DATABASE controlescolar;

use controlescolar;

CREATE TABLE docente(nocuenta int PRIMARY KEY 
,nombre varchar(20)
,apaterno varchar(20)
,amaterno varchar(20)
,contrasena char(10)
,correo varchar(30)
,matricula char(10)
,curp char(18));

Create table alumno(nocuenta int PRIMARY KEY
,nombre varchar(20)
,apaterno varchar(20)
,amaterno varchar(20)
,contrasena char(10)
,correo varchar(30)
,curp char (18)
,direccion varchar(50)
,telefono char(10));

Create table calificacion(nocuenta int 
,indicador char(1)
,periodo char (5)
,creditos int
,materia varchar(15)
,pparcial char(4)
,sparcial char(4)
,ordinario char(4)
,extraordinario char(4)
,FOREIGN KEY (nocuenta) REFERENCES alumno(nocuenta));


LOAD DATA INFILE './alumno.txt' INTO TABLE alumno
FIELDS TERMINATED BY '\t' 
LINES TERMINATED BY '\n';