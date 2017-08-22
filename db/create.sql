# create the database
CREATE DATABASE Vor;
# create user
CREATE USER 'hoenir'@'localhost' IDENTIFIED BY 'password123';
# give access to the vor database
GRANT ALL PRIVILEGES ON vor.* To 'hoenir'@'localhost' IDENTIFIED BY 'password123';
# reload them
FLUSH PRIVILEGES;
# select database
use Vor;

CREATE TABLE OR REPLACE User(
    Id          INT UNSIGNED    NOT NULL AUTO_INCREMENT,
    Username    VARCHAR(50)     NOT NULL,
    Password    VARCHAR(512)    NOT NULL,

    PRIMARY_KEY(Id),
);

CREATE UNIQUE INDEX User_Index
    ON User (Id);


CREATE TABLE OR REPLACE Image(
    Id, INT UNSIGNED            NOT NULL AUTO_INCREMENT,
    Localtion VARCHAR(256)      NOT NULL,

    PRIMARY_KEY(Id),
);

CREATE UNIQUE INDEX Image_Index
    ON Image (Id);
