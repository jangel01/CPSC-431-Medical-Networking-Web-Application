drop database if exists jason_schedulePlatform_db;
create database jason_schedulePlatform_db;

drop table if exists users;
create table users(
	id int auto_increment primary key,
    username varchar(255) not null,
    password varchar(255) not null
);
