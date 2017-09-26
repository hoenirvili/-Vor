# create the database
CREATE DATABASE Vor;
# create user
CREATE USER 'hoenir'@'localhost' IDENTIFIED BY 'password123';
# give access to the vor database
GRANT ALL PRIVILEGES ON Vor.* To 'hoenir'@'localhost' IDENTIFIED BY 'password123';
# reload them
FLUSH PRIVILEGES;
# select database
use Vor;

CREATE OR REPLACE TABLE User(
    Id              INT UNSIGNED    AUTO_INCREMENT PRIMARY KEY,
    Username        VARCHAR(32)     NOT NULL,
    Password        VARCHAR(50)     NOT NULL,
    Cookie          VARCHAR(512)    NOT NULL,
    CookieCreated   DATETIME        NOT NULL,
    CookieExpires   DATETIME        NOT NULL
);

CREATE OR REPLACE TABLE Article (
    Id          INT UNSIGNED    AUTO_INCREMENT PRIMARY KEY,
    Title       VARCHAR(350)    NOT NULL,
    Time        DATE            NOT NULL,
    Content     LONGTEXT        NOT NULL,
    AuthorId    INT UNSIGNED    NOT NULL,

    FOREIGN KEY (AuthorId)  REFERENCES User(Id)
);

CREATE OR REPLACE TABLE Tag (
    Id      INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name    VARCHAR(50) NOT NULL
);

CREATE OR REPLACE TABLE ArticleTag(
    ArticleId   INT UNSIGNED NOT NULL,
    TagId       INT UNSIGNED NOT NULL,

    FOREIGN KEY (ArticleId)  REFERENCES Article(Id),
    FOREIGN KEY (TagId)      REFERENCES Tag(Id)
);

CREATE OR REPLACE TABLE Comment (
    Id      INT UNSIGNED    AUTO_INCREMENT PRIMARY  KEY,
    Name    VARCHAR(32)     DEFAULT 'Anonymous',
    Time    DATE            NOT NULL,
    Email   VARCHAR(50),
    Content Text            NOT NULL
 );

CREATE OR REPLACE TABLE ArticleComment(
    ArticleId INT UNSIGNED NOT NULL,
    CommentId INT UNSIGNED NOT NULL,

    FOREIGN KEY (ArticleId)  REFERENCES Article(Id),
    FOREIGN KEY (CommentId)  REFERENCES Comment(Id)
);

CREATE OR REPLACE TABLE Notification(
    Id          INT UNSIGNED    AUTO_INCREMENT PRIMARY KEY,
    UserId      INT UNSIGNED    NOT NULL,
    CommentId   INT UNSIGNED    NOT NULL,
    Arrived     DATE            NOT NULL,
    Seen        BOOLEAN         DEFAULT 0,

    FOREIGN KEY (UserId)  REFERENCES User(Id),
    FOREIGN KEY (CommentId)  REFERENCES Comment(Id)
);

# AFAIK these are created automatically by innodb
CREATE UNIQUE INDEX User_Index          ON User(Id);
CREATE UNIQUE INDEX Article_Index       On Article(Id);
CREATE UNIQUE INDEX Comment_Index       ON Comment(Id);
CREATE UNIQUE INDEX Notification_Index  ON Notification(Id);
CREATE UNIQUE INDEX Tag_Index           On Tag(Id);
CREATE UNIQUE INDEX Tag_Name            On Tag(Name);