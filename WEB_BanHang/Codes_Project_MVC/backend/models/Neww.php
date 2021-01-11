<?php
require_once 'models/Model.php';

class Neww extends Model
{
    public $id;
    public $category_id;
    public $title;
    public $summary;
    public $avatar;
    public $content;
    public $status;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $created_at;
    public $updated_at;

    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND news.title LIKE '%{$_GET['title']}%'";
        }
        if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
            $this->str_search .= " AND news.category_id = {$_GET['category_id']}";
        }
    }

    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM news WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT news.*, category_news.name as category_name FROM news
          INNER JOIN category_news ON news.category_id = category_news.id 
          WHERE TRUE $this->str_search
          ORDER BY news.updated_at DESC, news.created_at DESC LIMIT $start, $limit");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $news = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $news;
    }

    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO news(category_id, title, avatar, summary, content, seo_title, seo_description, seo_keywords, status) 
                                VALUES (:category_id, :title, :avatar, :summary, :content, :seo_title, :seo_description, :seo_keywords, :status)");
        $arr_insert = [
            ':category_id' => $this->category_id,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':seo_title' => $this->seo_title,
            ':seo_description' => $this->seo_description,
            ':seo_keywords' => $this->seo_keywords,
            ':status' => $this->status,
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT news.*,category_news.name AS category_name FROM news
          INNER JOIN category_news ON news.category_id = category_news.id WHERE news.id = $id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE news SET category_id=:category_id, title=:title, avatar=:avatar, summary=:summary, content=:content, seo_title=:seo_title, seo_description=:seo_description, seo_keywords=:seo_keywords, status=:status, updated_at=:updated_at WHERE id = $id");
        $arr_update = [
            ':category_id' => $this->category_id,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':seo_title' => $this->seo_title,
            ':seo_description' => $this->seo_description,
            ':seo_keywords' => $this->seo_keywords,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM news WHERE id = $id");
        return $obj_delete->execute();
    }

    public function countNewTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM news");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

}