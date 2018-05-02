create database if not exists pcp;

use pcp;

create user 'pcpmanager'@'localhost' identified by 'toor';
grant select, insert on pcpresent.* to pcpmanager@localhost;
flush privileges;