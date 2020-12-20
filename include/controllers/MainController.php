<?php

namespace MyApp;

class MainController extends MethodExecuter
{
    private $header = [];
    private $content = [];
    private $footer = [];


    private $navigateM = null;
    private $postM = null;
    public function __construct()
    {
        $this->navigateM = new NavigateModel();
        $this->postM = new PostModel();
        $this->header['navigate'] = $this->navigateM->getNavigationData();
    }

    public function index() {
        $this->content['last_posts'] = $this->postM->getLastPosts();
        View::Render(VIEWS_PATH."header".EXT, null, $this->header);
        View::Render(VIEWS_PATH."template".EXT, PAGES_PATH."main".EXT, $this->content);
        View::Render(VIEWS_PATH."footer".EXT, null, $this->footer);
    }

    public function __destruct()
    {
        unset($this->navigateM);
    }
}