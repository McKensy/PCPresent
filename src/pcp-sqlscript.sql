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
    name varchar(64),
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
	description = 'SPECS: Lian Li PC 011 Dynamic - AMD Ryzen Threadripper 1950x Gigabyte X399 Designare EX T-Force Night Hawk RGB 4x8gb Nvidia Geforce GTX 1080 Founders Edition Thermaltake RGB 850 Titanium Watercooling by EK Waterblocks.
    Example Text:
    Pellentesque diam volutpat commodo sed egestas. Pellentesque nec nam aliquam sem. Tempus iaculis urna id volutpat lacus laoreet. Id ornare arcu odio ut sem nulla pharetra diam. Dolor sit amet consectetur adipiscing elit. Amet mauris commodo quis imperdiet massa tincidunt. Leo a diam sollicitudin tempor. Nunc vel risus commodo viverra maecenas accumsan. Tellus in metus vulputate eu scelerisque. Leo urna molestie at elementum eu facilisis sed odio morbi. Vitae aliquet nec ullamcorper sit amet risus nullam. Sit amet consectetur adipiscing elit. Vitae sapien pellentesque habitant morbi tristique. Sapien faucibus et molestie ac feugiat sed lectus. Porta nibh venenatis cras sed felis eget velit. At imperdiet dui accumsan sit amet nulla facilisi morbi. Ac auctor augue mauris augue neque gravida in fermentum. Faucibus purus in massa tempor nec feugiat nisl pretium. Faucibus interdum posuere lorem ipsum. Nibh sit amet commodo nulla facilisi nullam.',
	picture = './src/1JPModified.jpg',
    created = '2018-06-14 07:55:26',
    entrycreatorfk = 1;

insert into computer
set name = 'VERY NEW: Build 33: SMA8 Symmetrical Loops',
	description = 'Parts List: AMD Threadripper 1950X - https://amzn.to/2IOpNHg Asus Zenith Extreme - https://amzn.to/2pCpI0b Corsair 64GB Vengeance White LED - https://amzn.to/2pDkZeX Zotac GTX 1080Ti - https://amzn.to/2G3fBg3 Corsair AX1500i - https://amzn.to/2G7fDj9 Western Digital Red 3TB - https://amzn.to/2FZEucx Samsung 850 Pro 256GB - https://amzn.to/2FZEitL Samsung 950 Pro 512GB - https://amzn.to/2FZjSkA Caselabs SMA8 EK PE 360mm - https://amzn.to/2GjzRt5 EK PE 560mm. EK PE 280mm EK GTX 1080Ti Nickel Plexi - https://amzn.to/2udY6nZ EK GTX 1080Ti Backplate Black. EK ROG Zenith Nickel Plexi Monoblock. SC Protium Black Polished Large Reservoir - http://bit.ly/sc-large-protium SC Protium D5 Pump Top Polished Acrylic - http://bit.ly/sc-protium-d5-pt-polish... SC Protium D5 Pump Cover Black Silver Rings - http://bit.ly/2uAVSLz Ethereal Dual Silver Reservoir Mount - http://bit.ly/sc-ethereal-dual Aquaero 6 XT- http://bit.ly/sc-aquaero-6xt MDPC-X Bulk Kit #1 - http://bit.ly/sc-mdpcx-bulk-kit-1 SC Custom Wiring Bulk Kit #1- http://bit.ly/scbulk-kit-1 SC Bolt Pack Extreme - http://bit.ly/get-sc-bp-extreme',
	picture = './src/2Singularity.jpg',
    created = NOW(),
    entrycreatorfk = 2;

insert into computer
set name = 'BitWits Personal Build',
	description = 'Example Text:
    Pellentesque diam volutpat commodo sed egestas. Pellentesque nec nam aliquam sem. Tempus iaculis urna id volutpat lacus laoreet. Id ornare arcu odio ut sem nulla pharetra diam. Dolor sit amet consectetur adipiscing elit. Amet mauris commodo quis imperdiet massa tincidunt. Leo a diam sollicitudin tempor. Nunc vel risus commodo viverra maecenas accumsan. Tellus in metus vulputate eu scelerisque. Leo urna molestie at elementum eu facilisis sed odio morbi. Vitae aliquet nec ullamcorper sit amet risus nullam. Sit amet consectetur adipiscing elit. Vitae sapien pellentesque habitant morbi tristique. Sapien faucibus et molestie ac feugiat sed lectus. Porta nibh venenatis cras sed felis eget velit. At imperdiet dui accumsan sit amet nulla facilisi morbi. Ac auctor augue mauris augue neque gravida in fermentum. Faucibus purus in massa tempor nec feugiat nisl pretium. Faucibus interdum posuere lorem ipsum. Nibh sit amet commodo nulla facilisi nullam.',
	picture = './src/3BitWit.jpg',
    created = '2018-03-14 13:55:26',
    entrycreatorfk = 3;

insert into computer
set name = 'Jordans PC',
	description = 'Specifications: CPU: AMD Ryzen 7 1700 @ 3.7GHz,
GPU: ASUS ROG Strix RX 480 O8G,
MB: ASUS X370 Crosshair VI Hero,
RAM: 2x 8GB Corsair Vengeance RGB DDR4-3200MHz,
PSU: Corsair RM750x,
SSD: Samsung 840 EVO 250GB,
HDD: 2x Seagate Barracuda 2TB,
CHA: Corsair Carbide 400C,
Example Text:
Pellentesque diam volutpat commodo sed egestas. Pellentesque nec nam aliquam sem. Tempus iaculis urna id volutpat lacus laoreet. Id ornare arcu odio ut sem nulla pharetra diam. Dolor sit amet consectetur adipiscing elit. Amet mauris commodo quis imperdiet massa tincidunt. Leo a diam sollicitudin tempor. Nunc vel risus commodo viverra maecenas accumsan. Tellus in metus vulputate eu scelerisque. Leo urna molestie at elementum eu facilisis sed odio morbi. Vitae aliquet nec ullamcorper sit amet risus nullam. Sit amet consectetur adipiscing elit. Vitae sapien pellentesque habitant morbi tristique. Sapien faucibus et molestie ac feugiat sed lectus. Porta nibh venenatis cras sed felis eget velit. At imperdiet dui accumsan sit amet nulla facilisi morbi. Ac auctor augue mauris augue neque gravida in fermentum. Faucibus purus in massa tempor nec feugiat nisl pretium. Faucibus interdum posuere lorem ipsum. Nibh sit amet commodo nulla facilisi nullam.',
	picture = './src/4Jordan.jpg',
    created = '2017-03-18 17:55:26',
    entrycreatorfk = 4;
