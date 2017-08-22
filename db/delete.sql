# drop index from table
ALTER TABLE User DROP INDEX IF EXISTS User_Index;
ALTER TABLE Comment DROP INDEX IF EXISTS Comment_Index;
ALTER TABLE Article DROP INDEX IF EXISTS Article_Index;
# drop table;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS Article;

# delete the database
DROP DATABASE IF EXISTS Vor;
# delete the user;
DROP USER IF EXISTS 'hoenir'@'localhost';
# reload them
FLUSH PRIVILEGES;