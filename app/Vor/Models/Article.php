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

        $sql = "SELECT Tag.Name As tag
            FROM Tag, ArticleTag
            WHERE
                Tag.Id = ArticleTag.TagId AND
                {$id} = ArticleTag.ArticleId";

        return $this->db->query($sql, PDO::FETCH_COLUMN);
    }

    public function nComments(int $id): int
    {
        if ($id < 1)
            throw new InvalidArgumentException("Invalid article id number");

        $sql = "SELECT COUNT(1)
                FROM Comment, ArticleComment
                WHERE
                    Comment.Id = ArticleComment.CommentId AND
                    {$id} = ArticleComment.ArticleId";

        $data = $this->db->query($sql, \PDO::FETCH_COLUMN);
        return $data[0];
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
                        Article.content, User.username
                FROM Article
                INNER JOIN User
                    ON Article.AuthorId = User.Id
                ORDER BY Article.Time
                DESC LIMIT {$n}, {$per_page}";

        $articles = $this->db->query($sql);
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
}