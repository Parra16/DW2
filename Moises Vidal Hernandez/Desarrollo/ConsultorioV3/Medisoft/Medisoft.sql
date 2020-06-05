DROP DATABASE Medisoft;
CREATE DATABASE Medisoft;
USE Medisoft;

CREATE TABLE Roles(Id_rol INT, 
				   rol VARCHAR(20),
				   PRIMARY KEY (Id_rol));

CREATE TABLE USUARIOS(Id_empleado VARCHAR(10) NOT NULL,
					  CURP VARCHAR(16)NOT NULL,
					  Nombre VARCHAR(30) NOT NULL,
					  Apellido_paterno VARCHAR(30) NOT NULL,
					  Apellido_materno VARCHAR(30) NOT NULL,
					  Telefono VARCHAR(10) NOT NULL,
					  Fecha_nacimiento DATE,
					  Direccion VARCHAR(180) NOT NULL,
					  Email VARCHAR(30) NOT NULL,
					  Contrasenia VARCHAR(30) NOT NULL,
					  ID_rol INT,
					  PRIMARY KEY (Id_empleado),
					  FOREIGN KEY (ID_rol) REFERENCES Roles(Id_rol),
					  UNIQUE(CURP, Email));

CREATE TABLE MEDICOS(Id_medico VARCHAR(30) NOT NULL,
					 Cedula VARCHAR(16) NOT NULL,
					 Especialidad VARCHAR(60) NOT NULL,
					 Fac_egreso VARCHAR(60) NOT NULL,
					 FOREIGN KEY(Id_medico) REFERENCES USUARIOS(Id_empleado));

CREATE TABLE MEDICAMENTOS(Folio INT,
						  Nombre_generico VARCHAR(60) NOT NULL,
						  Nombre_comercial VARCHAR(60) NOT NULL,
						  Contenido VARCHAR(30) NOT NULL,
						  Via_admin VARCHAR(30) NOT NULL,
						  Recipiente VARCHAR(30) NOT NULL,
						  Laboratorio VARCHAR(180) NOT NULL,
						  Caducidad DATE,
						  Lote VARCHAR(15) NOT NULL,
						  Stock VARCHAR(15),
						  PRIMARY KEY(Folio));

CREATE TABLE RECETA(Folio INT AUTO_INCREMENT,
					Id_medico VARCHAR(10) NOT NULL,
					Nombre_medico VARCHAR(60) NOT NULL,
					Cedula VARCHAR(120) NOT NULL,
					Fecha_consulta DATE,
					Paciente VARCHAR(60) NOT NULL,
					Edad INT NOT NULL,
					Estatura FLOAT NOT NULL,
					Peso FLOAT NOT NULL,
					Temperatura FLOAT,
					Presion FLOAT NOT NULL,
					Alergias VARCHAR(60) NOT NULL DEFAULT 'Ninguna',
					Padecimiento TEXT NOT NULL,
					Medicacion TEXT NOT NULL,
					PRIMARY KEY (Folio),
					FOREIGN Key (Id_medico) REFERENCES MEDICOS(Id_medico)	
					);

CREATE TABLE VENTA(Folio INT AUTO_INCREMENT,
				   Id_empleado VARCHAR(10) NOT NULL,
				   Fecha DATE,
				   Folio_medicamento INT,
				   Productos TEXT,
				   Total FLOAT,
				   PRIMARY Key (Folio),
				   FOREIGN key (Id_empleado) REFERENCES USUARIOS(Id_empleado),
				   FOREIGN KEY (Folio_medicamento) REFERENCES MEDICAMENTOS(Folio)
				   );