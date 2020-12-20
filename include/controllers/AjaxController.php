<?php


namespace MyApp;

class AjaxController extends MethodExecuter
{
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function getcomments()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['comment_id'])) {
                $comment_id = intval($_GET['comment_id']);
                $commentM = new CommentModel();
                if ($comment_id > 0) {
                    $comments = $commentM->getSubComments($comment_id);
                    echo json_encode($comments, JSON_UNESCAPED_UNICODE); //сереализация
                    return;
                }
            }
        }
        //echo 'error-comments-empty';
    }

    public function saveComment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $author = htmlspecialchars(trim($_POST['author']));
            $email = htmlspecialchars(trim($_POST['email']));
            $comment = htmlspecialchars(trim($_POST['comment']));
            $comment_id = htmlspecialchars(trim($_POST['comment_id']));
            $post_id = intval(htmlspecialchars(trim($_POST['post_id'])));
            ///валидация!!!!!!!!
            if (mb_strlen($comment_id) > 0) {
                $comment_id = intval($comment_id);
            } else {
                $comment_id = null;
            }
            if ($post_id > 0) {
                $commentM = new CommentModel();
                if ($commentM->addOneComment($post_id, $comment_id, $author, $email, $comment)) {
                    echo "ADDED";
                } else {
                    echo "NOTADDED";
                }
            }
        }
    }
}