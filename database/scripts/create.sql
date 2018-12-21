# more information can be found here
# on why we picked the charset and collate options
#
# https://stackoverflow.com/questions/38363566/trouble-with-utf-8-characters-what-i-see-is-not-what-i-stored/38363567#38363567
#
CREATE OR REPLACE DATABASE Vor
    CHARACTER SET = 'utf8mb4'
    COLLATE = 'utf8mb4_unicode_520_ci';

# create a new internal user
CREATE OR REPLACE USER 'hoenir'@'localhost' IDENTIFIED BY 'password123';

# give access to the Vor database to the previous created user
GRANT ALL PRIVILEGES ON Vor.* TO 'hoenir'@'localhost' IDENTIFIED BY 'password123';

# reload grant privileges command
FLUSH PRIVILEGES;

# select database to execute further queries
use Vor;

# create the user table
#
# How we choosed the password fields based on:
#
#  https://crackstation.net/hashing-security.htm
#
#
# How we choosed token expiration creation
#
# https://stackoverflow.com/questions/409286/should-i-use-the-datetime-or-timestamp-data-type-in-mysql

CREATE OR REPLACE TABLE User (
    Id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username        VARCHAR(20) NOT NULL,
    Password        VARCHAR(50) NOT NULL,
    Salt            BINARY(128) NOT NULL,
    Token           VARCHAR(128) NOT NULL,
    TokenExpiration TIMESTAMP NULL,
    TokenCreation   TIMESTAMP NULL
);