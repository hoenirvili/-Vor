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

CREATE OR REPLACE TABLE User(
    Id              INT UNSIGNED    NOT NULL AUTO_INCREMENT PRIMARY_KEY
    Username        VARCHAR(50)     NOT NULL,
    Password        VARCHAR(512)    NOT NULL,
    Cookie          VARCHAR(512)    NOT NULL,
    CookieCreated   DATETIME        NOT NULL,
    CookieExpires   DATETIME        NOT NULL,
);

CREATE OR REPLACE TABLE Article (
    Id          INT UNSIGNED    NOT NULL AUTO_INCREMENT PRIMARY_KEY,
    Title       VARCHAR(350)    NOT NULL,
    Time        DATE            NOT NULL,
    Content     LONGTEXT        NOT NULL,
    Tags        VARCHAR(200),
    AuthorId    INT UNSIGNED    NOT NULL,

    FOREIGN KEY (AuthorId)  REFERENCES User(Id),
);

CREATE OR REPLACE TABLE ArticleComment(
    ArticleId INT UNSIGNED NOT NULL,
    CommentId INT UNSIGNED NOT NULL,

    FOREIGN KEY (ArticleId)  REFERENCES Article(Id),
    FOREIGN KEY (CommentId)  REFERENCES Comment(Id),
);

CREATE OR REPLACE TABLE Comment (
    Id      INT UNSIGNED    NOT NULL AUTO_INCREMENT PRIMARY_KEY,
    Name    VARCHAR(50)     DEFAULT 'Anonymous',
    Time    DATE            NOT NULL,
    Email   VARCHAR(50),
    Comment VARCHAR(512)    NOT NULL
);

CREATE UNIQUE INDEX User_Index      ON User (Id);
CREATE UNIQUE INDEX Comment_Index   ON Comment(Id);
CREATE UNIQUE INDEX Image_Index     On Image (Id);