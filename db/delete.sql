# drop index from table
ALTER TABLE User DROP INDEX IF EXISTS User_Index;
ALTER TABLE Comment DROP INDEX IF EXISTS Comment_Index;
ALTER TABLE Article DROP INDEX IF EXISTS Article_Index;
ALTER TABLE Notification DROP INDEX IF EXISTS Notification_Index;

# drop table;
DROP TABLE IF EXISTS ArticleComment;
DROP TABLE IF EXISTS Notification;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS Article;
DROP TABLE IF EXISTS User;

# delete the database
DROP DATABASE IF EXISTS Vor;
# delete the user;
DROP USER IF EXISTS 'hoenir'@'localhost';
# reload them
FLUSH PRIVILEGES;