<?php declare(strict_types=1);

namespace Vor\Models;

use Vor\Core\Database;
use PDO;

class Article extends Model
{
    public function tags(int $id): array
    {
        if ($id < 1)
            throw new InvalidArgumentException("Invalid article id number");

        $sql = "SELECT Tag.Name As Tag
            FROM Tag, ArticleTag
            WHERE
                Tag.Id = ArticleTag.TagId AND
                {$id} = ArticleTag.ArticleId";

        return $this->db->query($sql, PDO::FETCH_COLUMN);
    }

    public function comments(int $id): array
    {
        if ($id < 1)
            throw new InvalidArgumentException("Invalid article id number");

        $sql = "SELECT Name, Time, Email, Content
                FROM Comment, ArticleComment
                WHERE
                    Comment.Id = ArticleComment.CommentId AND
                    {$id} = ArticleComment.ArticleId";

        return $this->db->query($sql);
    }

    public function page(int $n): array
    {
        if ($n < 1)
            throw new InvalidArgumentException("Invalid page number");

        $per_page = 3;
        $n -= 1;
        $n *= $per_page;
        $sql = "SELECT  Article.Id, Article.Title, Article.Time,
                        Article.Content, User.Username
                FROM Article
                INNER JOIN User
                    ON Article.AuthorId = User.Id
                ORDER BY Article.Time
                DESC LIMIT {$n}, {$per_page}";

        $articles = $this->db->query($sql);

        foreach ($articles as &$article) {
            $id = (int)$article['Id'];
            $article['tags'] = $this->tags($id);
            $comments = $this->comments($id);
            $article['comments'] = [
                'n' => count($comments),
                'data' => $comments,
            ];
        }

        return $articles;
    }
}