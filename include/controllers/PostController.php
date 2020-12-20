<?php

namespace MyApp;
class PostController extends MethodExecuter
{
    private $header = [];
    private $content = [];
    private $footer = [];

    private $navigateM = null;
    private $postM = null;
    private $catM = null;
    private $commentM = null;

    public function __construct()
    {
        $this->content['error'] = null;
        $this->content['success'] = null;

        $this->navigateM = new NavigateModel();
        $this->postM = new PostModel();
        $this->catM = new CategoryModel();

        $this->header['navigate'] = $this->navigateM->getNavigationData();
    }

    public function index()
    {
        $this->content['count_posts_by_cat'] = $this->catM->getCountPostsByCategories();
        $this->content['pagination'] = [];
        $this->content['pagination']['posts_for_page'] = 6;
        $this->content['pagination']['count_posts'] = $this->postM->getCountRows();
        $this->content['pagination']['count_pages'] =
            ceil($this->content['pagination']['count_posts'] /
                $this->content['pagination']['posts_for_page']);

        $page = 1;
        if (isset($_GET['pagenum'])) {
            $page = intval($_GET['pagenum']) == 0 ? 1 : intval($_GET['pagenum']);
        };
        $this->content['posts'] = $this->postM->getPostsForPage($page, $this->content['pagination']['posts_for_page']);

        View::Render(VIEWS_PATH . "header" . EXT, null, $this->header);
        View::Render(VIEWS_PATH . "template" . EXT, PAGES_PATH . "post" . EXT, $this->content);
        View::Render(VIEWS_PATH . "footer" . EXT, null, $this->footer);
    }

    public function onepost()
    {
        $post_id = null;
        if (isset($_GET['post_id'])) {
            $post_id = intval($_GET['post_id']) == 0 ? null : intval($_GET['post_id']);
        }
        if ($post_id == null) {
            $this->content['error'] = "Выбранный Вами пост не существует";
        } else {
            $this->commentM = new CommentModel();
            $this->content['post'] = $this->postM->getOneRow($post_id);
            $this->content['comments'] = $this->commentM->getCommentsOnePost($post_id);
        }
        View::Render(VIEWS_PATH . "header" . EXT, null, $this->header);
        View::Render(VIEWS_PATH . "template" . EXT, PAGES_PATH . "onepost" . EXT, $this->content);
        View::Render(VIEWS_PATH . "footer" . EXT, null, $this->footer);
    }

    public function __destruct()
    {
        unset($this->navigateM);
    }
}