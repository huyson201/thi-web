<?php

class Post extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDefaultPost()
    {
        $sql = "SELECT * FROM `posts` ORDER BY post_id DESC LIMIT 5";
        $stmt = self::$connection->prepare($sql);
        return $this->execute($stmt);
    }

    public function getByCategory($cate)
    {
        if ($cate == 0) return $this->getDefaultPost();
        $key = "%$cate%";
        $sql = "SELECT * FROM `posts` WHERE category_id LIKE ? ORDER BY post_id DESC LIMIT 5";
        $stmt = self::$connection->prepare($sql);
        $stmt->bind_param("s", $key);
        return $this->execute($stmt);
    }

    public function getPostByPage($page = 1, $cate = 0)
    {
        $total = $this->count($cate)['count'];
        $perPage = 5;
        $index = ($page - 1) * $perPage;

        $sql = "SELECT * FROM `posts` ORDER BY post_id DESC LIMIT $index,$perPage";
        $stmt = self::$connection->prepare($sql);

        if ($cate == 0) {
            $sql = "SELECT * FROM `posts` ORDER BY post_id DESC LIMIT $index,$perPage";
            $stmt = self::$connection->prepare($sql);
        } else {
            $key = "%$cate%";
            $sql = "SELECT * FROM `posts`  WHERE category_id LIKE ?  ORDER BY post_id DESC LIMIT $index,$perPage";
            $stmt = self::$connection->prepare($sql);
            $stmt->bind_param("s", $key);
        }


        $post = $this->execute($stmt);
        $lastPage = $total <= $perPage * $page;

        return [
            "posts" => $post,
            "lastPage" => $lastPage
        ];
    }

    public function count($cate = 0)
    {
        $sql = "";
        $stmt = null;
        if ($cate == 0) {
            $sql = "SELECT COUNT(post_id) AS count from posts ";
            $stmt = self::$connection->prepare($sql);
        } else {
            $key = "%$cate%";
            $sql = "SELECT COUNT(post_id) AS count from posts WHERE category_id LIKE ? ";
            $stmt = self::$connection->prepare($sql);
            $stmt->bind_param("s", $key);
        }
        return $this->execute($stmt)[0];
    }
}
