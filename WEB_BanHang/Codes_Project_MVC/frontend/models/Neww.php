<?php

require_once 'models/Model.php';
class Neww extends Model
{
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
    public function getAllNew(){
        //do cả 2 bảng products và categories đều có trường name, nên cần phải thay đổi lại tên cột cho 1 trong 2 bảng
        $obj_select = $this->connection
            ->prepare("SELECT news.*,category_news.name AS category_name FROM news
          INNER JOIN category_news ON news.category_id = category_news.id");

        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM news WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    public function getNewTop(){
        $obj_select = $this->connection
            ->prepare("select * from news LIMIT 8");
        $obj_select->execute();
        $productTop = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $productTop;
    }

    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT news.*,category_news.name AS category_name FROM news
          INNER JOIN category_news ON news.category_id = category_news.id WHERE news.id = $id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
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
}