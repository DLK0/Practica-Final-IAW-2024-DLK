create database steam;
use steam;
create table biblioteca(
  id_game int(5) auto_increment,
  Nombre varchar(50) not null,
  Peso int(3),
  constraint biblioteca_pk primary key(id_game)
);

insert into biblioteca values(00001, 'Black Desert', 66);
insert into biblioteca values(00002, 'Doom Eternal', 80);
insert into biblioteca values(00003, 'Elden Ring', 47);
insert into biblioteca values(00004, 'Persona 3', 8);
insert into biblioteca values(00005, 'Persona 4', 11);
insert into biblioteca values(00006, 'Persona 5', 40);
insert into biblioteca values(00007, 'Dark Souls III', 25);
insert into biblioteca values(00008, 'The Witcher 3', 58);
insert into biblioteca values(00009, 'Black Mesa', 28);
insert into biblioteca values(00010, 'Counter-Strike 2', 35);
insert into biblioteca values(00011, 'Half-Life 2', 7);
insert into biblioteca values(00012, 'Metro Exodus', 78);
insert into biblioteca values(00013, 'Tomb Raider', 11);
insert into biblioteca values(00014, 'Grand Theft Auto V', 112);
insert into biblioteca values(00015, 'Monster Hunter: World', 100);

create table usuarios(
  id_user int(5) auto_increment,
  Nombre varchar(50) not null,
  Email varchar(50) not null,
  constraint usuarios_pk primary key(id_user)
);

insert into usuarios values(1, 'root', 'root@root.com');