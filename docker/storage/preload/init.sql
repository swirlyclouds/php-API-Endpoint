CREATE DATABASE IF NOT EXISTS services_db;
USE  services_db;
DROP TABLE services;
CREATE TABLE IF NOT EXISTS services (
    Ref varchar(10) NOT NULL PRIMARY KEY,
    Centre varchar(255) NOT NULL,
    Service varchar(255) NOT NULL,
    Country varchar(2) NOT NULL
);

insert into services VALUES ("APPLAB1", "Aperture Science", "Portal Technology", "fr");
insert into services VALUES ("BMELAB1", "Black Mesa", "Interdimensional Travel", "de");
insert into services VALUES ("BMELAB2", "Black Mesa", "Interdimensional Travel", "DE");
insert into services VALUES ("WEYLAB1", "Weyland Yutani Research", "Xeno-biology", "gb");
insert into services VALUES ("BLULAB3", "Blue Sun R&D", "Behaviour Modification", "cz");
insert into services VALUES ("TYRLAB2","Tyrell Research","Synthetic Consciousness","GB");
