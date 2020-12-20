<?php


namespace MyApp;


class CommentModel extends DBEngine
{
    public function __construct()
    {
        parent::__construct('comments');
    }
    public function getCommentsOnePost($post_id) {
        return $this->getParentComments($post_id) ;
        //echo "<br>";
        //varSuperDump($this->getSubComments(1));
    }
    public function getParentComments($post_id) {
        return $this->getManyRows([
            'post_id'=>$post_id,
            'comment_id'=>null
        ], 'date', 'DESC');
    }
    public function getSubComments($comment_id) {
        return $this->getManyRows([
            'comment_id'=>$comment_id
        ],'date', 'DESC');
    }
    public function addOneComment($post_id, $comment_id, $author, $email, $comment) {
        return $this->addNewRow([
            'post_id'=>$post_id,
            'comment'=>$comment,
            'login'=>$author,
            'email'=>$email,
            'comment_id'=>$comment_id
        ]);
    }
}