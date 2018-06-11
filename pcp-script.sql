create database if not exists pcp;

use pcp;

create user 'pcpmanager'@'localhost' identified by 'toor';
grant all on pcp.* to pcpmanager@localhost;
flush privileges;

create table user (
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
    primary key(mid),
	foreign key(entrycreatorfk) references user(uid)
);

insert into user (username, password) values('JPModified', 'yes');
insert into user (username, password) values('Singularity', 'yes');
insert into user (username, password) values('BitWit', 'yes');


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
    
    
#SCRIPT TESTING BELOW

insert into computer (name, description, picture, entrycreatorfk) values ('Test','test','./src/test1McK','5');

select uid from user where username = 'in16kejo';

SELECT * FROM computer ORDER BY RAND() LIMIT 4;

SELECT c.name, c.picture, u.username FROM computer as c, user as u WHERE c.entrycreatorfk = u.uid  ORDER BY RAND() LIMIT 4;

INSERT INTO computer (cid, name, description, picture, created, entrycreatorfk) VALUES (NULL, 'test', 'test', 'test', NOW(), '3');

SELECT c.name, c.description, c.picture, u.username, DATE_FORMAT(c.created, '%d/%m/%Y %H:%i') as created FROM computer as c, user as u WHERE c.entrycreatorfk = u.uid;

