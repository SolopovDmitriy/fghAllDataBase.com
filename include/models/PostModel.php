<?php

namespace MyApp {
    class PostModel extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('posts');
        }

        public function getLastPosts($count = 4, $status_id = 2)
        {
            return $this->getManyRows([
                'status_id' => $status_id
            ], 'date_published', 'DESC', $count);
        }

        public function getPostsForPage($pagenum = 1, $count = 6, $status_id = 2)
        {
            return $this->getManyRows([
                'status_id' => $status_id
            ], 'date_published', 'DESC', $count, ($pagenum - 1) * $count);
        }
    }
}