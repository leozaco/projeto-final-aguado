drop database if exists arrebenta;
create database arrebenta;
use arrebenta;

create table usuarios(
    nome VARCHAR(30) NOT NULL,
    senha VARCHAR(30) NOT NULL
    
    );
    
Create table musicas(
     id int (100) not null,
     Nome varchar(100) not null
     
     );
	
    
insert into usuarios(nome,senha) values
     ('admin','123');
     
insert into musicas(id,nome) values
    (01,'breaking the law (Judas Priest)'),
    (02,'Iron man (Black Sabath)'),
    (03,'Enter sandman ( Metallica)');
    
    
CREATE USER 'eu'@'localhost' IDENTIFIED BY 'ifsp'; 
GRANT ALL PRIVILEGES ON * . * TO 'eu'@'localhost'; 
FLUSH PRIVILEGES;