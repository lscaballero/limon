CREATE DATABASE IF NOT EXISTS limon;
USE limon;

CREATE TABLE IF NOT EXISTS contacts(
id              int(255) auto_increment not null,
nombres         varchar(100),
apellidos       varchar(100),
genero          varchar(200),
celular         int(255),
dni             int(100),
email           varchar(255),
ciudad          varchar(100),
fecha           datetime,
creado          datetime,
CONSTRAINT pk_contacts PRIMARY KEY(id)
)ENGINE=InnoDb;