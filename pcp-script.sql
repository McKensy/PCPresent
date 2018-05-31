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
    mid integer auto_increment,
    name varchar(64),
    description varchar(512),
    picture varchar(192),
    created varchar(12),
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
    entrycreatorfk = 1;
    
insert into computer 
set name = 'Sicc pc from Singularity Computer',
	description = 'A fast-talking mercenary with a morbid sense of humor is subjected to a rogue experiment that leaves him with accelerated healing powers and a quest for revenge.',
	picture = './src/2Singularity.jpg',
    entrycreatorfk = 2;
    
insert into computer 
set name = 'BitWits Personal Build',
	description = 'Personal Computer of BitWit. lorem ipsum ',
	picture = './src/3BitWit.jpg',
    entrycreatorfk = 3;
    

create user 'moviesql'@'localhost' identified by 'toor';
grant select, insert on movie2k.* to moviesql@localhost;
flush privileges;

select * from user;
insert ignore into user (username, password) values('hash4', 'yes');
INSERT INTO `movie` (`name`, `subtitle`, `description`, `trailer`, `genrefk`, `entrycreatorfk`) VALUES ('dass', 'dsad', 'dsadasd', 'addsa', '32132', 3, 10);
INSERT INTO `movie` (`mid`, `name`, `subtitle`, `description`, `trailer`, `genrefk`, `entrycreatorfk`) VALUES (NULL, 'Kimi no na wa', 'veri gud', 'Is a timewarping lovestory', 'https:yourapudopa', '1', '10');