INSERT INTO user (Username, Password, Cookie, CookieCreated, CookieExpires)
VALUES ('Hoenir', 'password123', 'SomeCookie', '2012-04-19 13:08:22', '2012-04-19 13:08:22');

INSERT INTO article (Title, Time, Content, AuthorId)
    VALUES ('Intro To React.js Library', '2012-04-19','content example', 1);

INSERT INTO article (Title, Time, Content, AuthorId)
    VALUES ('Why I Love Golang', '2012-04-19','content example', 1);

INSERT INTO article (Title, Time, Content, AuthorId)
    VALUES ('So you think you know C?', '2012-04-19','content example', 1);

INSERT INTO Tag (Name) Values ('react'), ('javascript'), ('framework'), ('front-end'), ('facebook'),
('php'), ('xhp'), ('ui-design'), ('golang'), ('go'), ('later'), ('reasons'), ('comunity');

INSERT INTO ArticleTag (ArticleId, TagId) VALUES (44, 1), (44, 2), (44, 6), (44, 3), (44, 7);
INSERT INTO ArticleTag (ArticleId, TagId) VALUES (45, 2), (45, 9), (45, 8);
INSERT INTO ArticleTag (ArticleId, TagId) VALUES (46, 4), (46, 5), (46, 10), (46, 11), (46, 12), (46,13);


INSERT INTO Comment (Name, Time, Email, Content) VALUES ('Ana', '2013-02-14', 'ana@gmail.com', 'Nice blog post');
INSERT INTO Comment (Name, Time, Email, Content) VALUES ('Bob', '2013-02-17', 'bob@gmail.com', 'This blog post changed my life');
INSERT INTO Comment (Name, Time, Email, Content) VALUES ('Killer', '2014-02-17', 'killer@hotmail.com', 'I think this is new to me');

INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (44, 1), (44, 2), (44, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (45, 1), (45, 2), (45, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (46, 1), (46, 2), (46, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (47, 1), (44, 2), (44, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (48, 1), (44, 2), (44, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (49, 1), (44, 2), (44, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (50, 1), (44, 2), (44, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (51, 1), (44, 2), (44, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (52, 1), (44, 2), (44, 3);