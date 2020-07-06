create database  productos;
use productos;
create table usuarios
(
    id_usuario int PRIMARY KEY Auto_Increment ,
    nombre varchar(25),
    edad int,
    estado varchar(25),
    municipio varchar(25),
    usuario varchar(50),
    contrasenia varchar(50),
    telefono varchar(10),
    clave varchar(5),
    correo varchar(75),
    puntuacion float,
    numero int
);

create table categoria
(
    id_categoria int  PRIMARY KEY Auto_Increment,
    nombre varchar(30)
);

create table publicacion
(
    id_publicacion int PRIMARY KEY Auto_Increment,
    descripcion varchar(25),knsldksjldafkjlnkjlwndjklfnñsdlkajflkas
    fecha_actual date,
    imagen varchar(50),
    likes int,
    id_categoria int,
    id_usuario int,
    foreign key (id_usuario) references usuarios(id_usuario),
    foreign key (id_categoria) references categoria(id_categoria)
);

create table comentario
(
    id_comentario int PRIMARY KEY Auto_Increment,
    comentario int,
    fecha date,
    id_publicacion int,
    foreign key (id_publicacion) references publicacion(id_publicacion)
);

create table grupo
(
    id_grupo int PRIMARY KEY Auto_Increment,
    nombre_grupo varchar(50)
);

create table categoria_grupo
(
    id_grupo int,
    id_categoria int,
    foreign key (id_grupo) references grupo(id_grupo),
    foreign key (id_categoria) references categoria(id_categoria)
);

create table imagen
(
    id_imagen int primary key Auto_Increment,
    nombre_imagen varchar(100),
    id_usuario int,
    foreign key (id_usuario) references usuarios(id_usuario)
);
