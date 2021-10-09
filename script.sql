DROP TABLE IF EXISTS categorii;

CREATE TABLE categorii (
    id INTEGER(3) PRIMARY KEY AUTO_INCREMENT, 
    categorie_denumire VARCHAR(30) NOT NULL,
    categorie_is_active BOOLEAN DEFAULT TRUE
);

DROP TABLE IF EXISTS produse;

CREATE TABLE produse (
    id INTEGER(3) PRIMARY KEY AUTO_INCREMENT, 
    produs_denumire VARCHAR(80) NOT NULL,
    produs_imagine VARCHAR(80) NOT NULL,
    produs_categorie INTEGER(3) REFERENCES categorii(categorie_id),
    produs_pret DOUBLE(5, 3) NOT NULL,
    produs_is_active BOOLEAN DEFAULT TRUE,
    produs_stock INTEGER(4)
);

drop table if exists `auth_assignment`;
drop table if exists `auth_item_child`;
drop table if exists `auth_item`;
drop table if exists `auth_rule`;

create table `auth_rule`
(
`name` varchar(64) not null,
`data` text,
`created_at` integer,
`updated_at` integer,
    primary key (`name`)
) engine InnoDB;

create table `auth_item`
(
`name` varchar(64) not null,
`type` integer not null,
`description` text,
`rule_name` varchar(64),
`data` text,
`created_at` integer,
`updated_at` integer,
primary key (`name`),
foreign key (`rule_name`) references `auth_rule` (`name`) on delete set null on update cascade,
key `type` (`type`)
) engine InnoDB;

create table `auth_item_child`
(
`parent` varchar(64) not null,
`child` varchar(64) not null,
primary key (`parent`, `child`),
foreign key (`parent`) references `auth_item` (`name`) on delete cascade on update cascade,
foreign key (`child`) references `auth_item` (`name`) on delete cascade on update cascade
) engine InnoDB;

create table `auth_assignment`
(
`item_name` varchar(64) not null,
`user_id` varchar(64) not null,
`created_at` integer,
primary key (`item_name`, `user_id`),
foreign key (`item_name`) references `auth_item` (`name`) on delete cascade on update cascade
) engine InnoDB;