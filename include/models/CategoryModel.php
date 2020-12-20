<?php


namespace MyApp;


class CategoryModel extends DBEngine
{
    public function __construct()
    {
        parent::__construct('categories');
    }
    public function getCountPostsByCategories()
    {
        $query = "SELECT categories.category, COUNT(*) as count_posts FROM posts, categories WHERE posts.category_id = categories.id GROUP BY category_id";
        return $this->executeQuery($query);
    }
}