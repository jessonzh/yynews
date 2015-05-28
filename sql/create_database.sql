set names utf8;
create database yynews;
use yynews;

create table categories (
    catId int AUTO_INCREMENT primary key,
    catName char(30) not null unique
)charset utf8;

create table news (
    newsId int AUTO_INCREMENT primary key,
    title varchar(100) not null unique,
    content text not null,
    createTime int not null,
    catId int
)charset utf8;

create table comments (
    commId int AUTO_INCREMENT primary key,
    content text not null,
    createTime int not null,
    userIP char(15) not null,
    newsId int
)charset utf8;
