INSERT INTO user (Username, Password, Cookie, CookieCreated, CookieExpires)
VALUES ('Hoenir', 'password123', 'SomeCookie', '2012-04-19 13:08:22', '2012-04-19 13:08:22');

INSERT INTO article (Title, Time, Content, AuthorId)
    VALUES ('Intro To React.js Library', '2012-04-08','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea deserunt facilis odio, dolore omnis natus consectetur cum quod soluta, asperiores eaque consequuntur ex repellat provident optio iste repellendus reiciendis aut.', 1);
INSERT INTO article (Title, Time, Content, AuthorId)
    VALUES ('Why I Love Golang', '2013-04-01','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident facilis error ex a dignissimos aspernatur excepturi assumenda, necessitatibus consequuntur quasi illum omnis perferendis, saepe repellendus ratione repudiandae dolore, ipsum minima!', 1);
INSERT INTO article (Title, Time, Content, AuthorId)
    VALUES ('So you think you know C?', '2014-04-19','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias cupiditate, maxime accusantium nam numquam eveniet eos, officiis dicta perferendis. Dolores ad quisquam adipisci odio aliquid dolor a quod maxime tempore.', 1);
INSERT INTO article (Title, Time, Content, AuthorId)
    VALUES ('amet !', '2015-02-02','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit quis neque quaerat iure quibusdam id odio eum quos beatae, obcaecati magnam, ratione enim, quisquam accusantium facilis ipsam natus officia temporibus.e', 1);
INSERT INTO article (Title, Time, Content, AuthorId)
    VALUES ('sit !', '2011-05-19','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit quis neque quaerat iure quibusdam id odio eum quos beatae, obcaecati magnam, ratione enim, quisquam accusantium facilis ipsam natus officia temporibus.e', 1);
INSERT INTO article (Title, Time, Content, AuthorId)
    VALUES ('sit !', '2017-02-10','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit quis neque quaerat iure quibusdam id odio eum quos beatae, obcaecati magnam, ratione enim, quisquam accusantium facilis ipsam natus officia temporibus.e', 1);
INSERT INTO article (Title, Time, Content, AuthorId)
    VALUES ('dolor', '2017-03-01','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit quis neque quaerat iure quibusdam id odio eum quos beatae, obcaecati magnam, ratione enim, quisquam accusantium facilis ipsam natus officia temporibus.e', 1);


INSERT INTO Tag (Name) Values ('react'), ('javascript'), ('framework'), ('front-end'), ('facebook'),
('php'), ('xhp'), ('ui-design'), ('golang'), ('go'), ('later'), ('reasons'), ('comunity');

INSERT INTO ArticleTag (ArticleId, TagId) VALUES (1, 1), (1, 2), (1, 6), (1, 3), (1, 7);
INSERT INTO ArticleTag (ArticleId, TagId) VALUES (2, 2), (2, 9), (2, 8);
INSERT INTO ArticleTag (ArticleId, TagId) VALUES (3, 4), (3, 5), (3, 10), (3, 11), (3, 12), (3,13);
INSERT INTO ArticleTag (ArticleId, TagId) VALUES (4, 2), (4, 9), (4, 8);
INSERT INTO ArticleTag (ArticleId, TagId) VALUES (5, 2), (5, 1), (5, 4), (5, 2);


INSERT INTO Comment (Name, Time, Email, Content) VALUES ('Ana', '2013-02-14', 'ana@gmail.com', 'Nice blog post');
INSERT INTO Comment (Name, Time, Email, Content) VALUES ('Bob', '2013-02-17', 'bob@gmail.com', 'This blog post changed my life');
INSERT INTO Comment (Name, Time, Email, Content) VALUES ('Killer', '2014-02-17', 'killer@hotmail.com', 'I think this is new to me');

INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (1, 1), (1, 2), (1, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (2, 1), (2, 2), (2, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (3, 1), (3, 2), (3, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (4, 1), (4, 2), (4, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (5, 1), (5, 2), (5, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (6, 1), (6, 2), (6, 3);
INSERT INTO ArticleComment (ArticleId, CommentId) VALUES (7, 1), (7, 2), (7, 3);
