# drop index from table
ALTER TABLE User
DROP INDEX IF EXISTS User_Index;
ALTER TABLE Image
DROP INDEX IF EXISTS Image_Index;

# drop table;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Image;


# delete the database
DROP DATABASE IF EXISTS Vor;
# delete the user;
DROP USER IF EXISTS 'hoenir'@'localhost';
# reload them
FLUSH PRIVILEGES;