create table enquete(
   id int primary key auto_increment,
   nome varchar(200)
);

create table resposta(
    id int primary key auto_increment,
    id_enquete int not null,
    nome varchar(200)
    qunatidade int,
    foreign key (id_enquete) references enquete (id)
);