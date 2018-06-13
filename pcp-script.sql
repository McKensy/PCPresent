create database if not exists pcp;

use pcp;

create user 'pcpmanager'@'localhost' identified by 'toor';
grant all on pcp.* to pcpmanager@localhost;
flush privileges;

create table users (
	uid integer auto_increment,
    username varchar(16),
    password varchar(512),
    primary key(uid)
);

create table computer (
    cid integer auto_increment,
    name varchar(32),
    description varchar(2048),
    picture varchar(192),
    created datetime,
    entrycreatorfk integer default NULL,
    primary key(cid),
	foreign key(entrycreatorfk) references users(uid)
);

insert into users (username, password) values('JPModified', 'xxx');
insert into users (username, password) values('Singularity', 'xxx');
insert into users (username, password) values('BitWit', 'xxx');
insert into users (username, password) values('Jordan', 'xxx');


insert into computer
set name = 'JPModifieds Computer',
	description = 'SPECS: Lian Li PC 011 Dynamic – AMD Ryzen Threadripper 1950x Gigabyte X399 Designare EX T-Force Night Hawk RGB 4x8gb Nvidia Geforce GTX 1080 Founders Edition Thermaltake RGB 850 Titanium Watercooling by EK Waterblocks.',
	picture = './src/1JPModified.jpg',
    created = NOW(),
    entrycreatorfk = 1;

insert into computer
set name = 'Sicc pc from Singularity Computer',
	description = 'A fast-talking mercenary with a morbid sense of humor is subjected to a rogue experiment that leaves him with accelerated healing powers and a quest for revenge.',
	picture = './src/2Singularity.jpg',
    created = NOW(),
    entrycreatorfk = 2;

insert into computer
set name = 'BitWits Personal Build',
	description = 'Personal Computer of BitWit. lorem ipsum ',
	picture = './src/3BitWit.jpg',
    created = NOW(),
    entrycreatorfk = 3;

insert into computer
set name = 'Jordans PC',
	description = 'Specifications: CPU: AMD Ryzen 7 1700 @ 3.7GHz
GPU: ASUS ROG Strix RX 480 O8G
MB: ASUS X370 Crosshair VI Hero
RAM: 2x 8GB Corsair Vengeance RGB DDR4-3200MHz
PSU: Corsair RM750x
SSD: Samsung 840 EVO 250GB
HDD: 2x Seagate Barracuda 2TB
CHA: Corsair Carbide 400C',
	picture = './src/4Jordan.jpg',
    created = NOW(),
    entrycreatorfk = 4;


#SCRIPT TESTING BELOW

insert into computer (name, description, picture, entrycreatorfk) values ('Test','test','./src/test1McK','5');

select uid from users where username = 'in16kejo';

SELECT * FROM computer ORDER BY RAND() LIMIT 4;

SELECT c.name, c.picture, u.username FROM computer as c, users as u WHERE c.entrycreatorfk = u.uid  ORDER BY RAND() LIMIT 4;

INSERT INTO computer (cid, name, description, picture, created, entrycreatorfk) VALUES (NULL, 'test', 'test', 'test', NOW(), '3');

SELECT c.name, c.description, c.picture, u.username, DATE_FORMAT(c.created, '%d/%m/%Y %H:%i') as created FROM computer as c, users as u WHERE c.entrycreatorfk = u.uid;

SELECT c.name, c.description, c.picture, u.username, DATE_FORMAT(c.created, '%d.%m.%Y %H:%i') as created FROM computer as c, users as u WHERE c.entrycreatorfk = u.uid AND (c.name LIKE '%few%' OR c.description LIKE '%fwe%');
