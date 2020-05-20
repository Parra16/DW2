create database Fiestas;

create table usuario (email varchar (20)
			  		,tipoUsuario varchar (12)
			  		,contraseña varchar (12)
			  		,idUsuario int auto_increment
			  		,primary key (idUsuario));