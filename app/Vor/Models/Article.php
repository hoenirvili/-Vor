<?php declare(strict_types=1);

namespace Vor\Models;

use PDO;
use DateTime;
use LogicException;

class Article extends Model
{
    public function tags(int $id): array
    {
        if ($id < 1)
            throw new InvalidArgumentException("Invalid article id number");

        $sql = "SELECT Tag.Name As tag
            FROM Tag, ArticleTag
            WHERE
                Tag.Id = ArticleTag.TagId AND
                :id = ArticleTag.ArticleId";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id"=>$id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function byTag(string $name): array
    {
        if ($name === '')
            throw new InvalidArgumentException("Invalid tag name");

        $sql =  "SELECT ArticleTag.ArticleId as id
                FROM ArticleTag
                WHERE ArticleTag.TagId = 
                        (Select id 
                        FROM Tag 
                        WHERE Tag.Name = :name)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["name"=>$name]);
        $article_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
        if ($article_ids === [])
            return [];
        
            
        var_dump($article_ids);
        die();

        return [];
    }


    public function comments(int $id): array
    {
        if ($id < 1)
            throw new InvalidArgumentException("Invalid article id number");

        $sql = "SELECT name, email, content, time
                FROM Comment, ArticleComment
                WHERE
                    Comment.Id = ArticleComment.CommentId AND
                    :id = ArticleComment.ArticleId";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id"=>$id]);
        return $stmt->fetchAll();

    }

    public function nComments(int $id): int
    {
        if ($id < 1)
            throw new InvalidArgumentException("Invalid article id number");

        $sql = "SELECT COUNT(1)
                FROM Comment, ArticleComment
                WHERE
                    Comment.Id = ArticleComment.CommentId AND
                    :id = ArticleComment.ArticleId";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id"=>$id]);
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }

    public function navigation(int $n): array
    {
        if ($n < 1)
            throw new InvalidArgumentException("Invalid page number");

        if ($n === 1) {
            $previous= 0;
            $next = $n + 1;
        } else {
            $previous = $n - 1;
            $next = $n + 1;
        }

        return [
            'previous' => $previous,
            'next' => $next
        ];
    }

    public function page(int $n): array
    {
        if ($n < 1)
            throw new InvalidArgumentException("Invalid page number");

        $navigation = $this->navigation($n);

        $per_page = 3;
        $n -= 1;
        $n *= $per_page;
        $sql = "SELECT  Article.id, Article.title, Article.time,
                        SUBSTRING(Article.content, 1, 1500) as Preview,
                        User.username
                FROM Article
                INNER JOIN User
                    ON Article.AuthorId = User.Id
                ORDER BY Article.Time
                DESC LIMIT :offset, :len";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $n, PDO::PARAM_INT);
        $stmt->bindParam(2, $per_page, PDO::PARAM_INT);
        $stmt->execute();
        $articles = $stmt->fetchAll();
        foreach ($articles as &$article) {
            $id = $article['id'];
            $article['tags'] = $this->tags($id);
            $article['comments'] = $this->nComments($id);
        }

        if (count($articles) != $per_page)
            $navigation = [
                'previous' => $navigation['previous'],
                'next' => 0
            ];

        return [
            'articles' => $articles,
            'navigation' => $navigation,
        ];
    }

    public function get(int $n): array
    {
        if($n < 1)
            throw new InvalidArgumentException("Invalid article number");

        $sql = "SELECT Article.id, Article.title,
                       Article.time, Article.content,
                       User.username
                FROM Article
                INNER JOIN User ON Article.AuthorId = User.Id
                WHERE Article.Id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id" => $n]);
        $article = $stmt->fetch();

        $id = $article['id'];
        $article['tags'] = $this->tags($id);
        $article['comments'] = $this->comments($id);
        $article['ncomments'] = count($article['comments']);

        return $article;
    }

    public function set(string $name,
                        string $title,
                        DateTime $time,
                        string $author,
                        array $tags = []): void

    {
        if (($name === '') ||
            ($title === '') ||
            ($author === ''))
            throw new InvalidArgumentException("Invalid parameters passed.");


        $sql = "id FROM User WHERE username = {$author}";
        $data = $this->db->query($sql, Database::FETCH_SINGLE);
        if($data === [])
            throw new LogicException("Invalid author given, the author does not exist");

        $sql = "INSERT INTO article (Title, Time, Content, AuthorId)
                VALUES (?, ?, ?, ?)";


        //prepare//TODO

        $this->db->execute();

        // skip tags
        if ($tags === [])
            return;
        // article tags insert.
    }
}