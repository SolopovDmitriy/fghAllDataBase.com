<?php
if (!isset($data['post'])) {
    return;
}
$onePost = $data['post'];
?>
<section id="middle" class="light_section">
    <div class="container">
        <div class="row blog-single">
            <div class="col-sm-12">
                <div class="content-area" id="primary">
                    <div role="main" class="site-content" id="content" >
                        <article class="post type-post">
                            <header class="entry-header">
                                <div class="badgeBox">
                                    <div class="badge">
                                        8
                                        <span>apr</span>
                                    </div>
                                    <div class="extra-wrap text-center">
                                        <a class="tl " href="#"><?= $onePost['title'] ?></a>
                                    </div>
                                </div>
                                <!-- .entry-meta -->
                            </header>
                            <div class="entry-thumbnail">
                                <img alt="<?= $onePost['img_alt'] ?>" src="<?= $onePost['img_src'] ?>">
                            </div>
                            <!-- .entry-header -->

                            <div class="entry-content">
                                <blockquote><?= $onePost['slogan'] ?></blockquote>
                                <div class="content">
                                    <?= $onePost['content'] ?>
                                </div>
                            </div>
                            <br>
                            <!-- .entry-content -->
                            <!-- .entry-meta -->
                        </article>
                        <!-- #post -->

                        <div class="comments-area" id="comments">
                            <h2 class="comments-title">Комментарии: </h2>
                            <ol class="comment-list">
                                <?php
                                if (!empty($data['comments'])) {
                                    foreach ($data['comments'] as $key => $comment) {
                                        ?>
                                        <li class="comment byuser odd alt thread-odd thread-alt depth-1">
                                            <article class="comment-body">
                                                <div class="hidden comment_id">
                                                    <?= $comment['id'] ?>
                                                </div>
                                                <footer class="comment-meta">
                                                    <div class="comment-author vcard">
                                                        <a class="author_url" rel="external nofollow" href="#">
                                                            <?= $comment['login'] ?>
                                                        </a>
                                                    </div>
                                                    <div class="comment-metadata">
                                                        <span><?= $comment['date'] ?></span>
                                                    </div>
                                                    <div class="reply"><a href="#reply-title"
                                                                          class="comment-reply-link">Reply</a>
                                                    </div>
                                                </footer>
                                                <div class="comment-content">
                                                    <p><?= $comment['comment'] ?></p>
                                                </div>
                                                <input type="button" value="+" class="btn btn-info btn-more-comments">
                                            </article>

                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ol>
                            <!-- .comment-list -->
                            <hr style="margin-bottom: 160px;" class="anchor" id="reply-title">

                            <div class="comment-respond" id="respond">
                                <h3 class="comment-reply-title">Leave a Comment</h3>
                                <form class="comment-form" id="commentform">
                                    <p class="comment-form-author">
                                        <label for="author">Name <span class="required">*</span></label>
                                        <input type="text" aria-required="true" size="30" value="" name="author"
                                               id="author" class="form-control" placeholder="Name">
                                    </p>
                                    <input type="hidden" name="comment_id" value="" id="comment_id" class="comment_id">
                                    <input type="hidden" name="post_id" value="<?= $onePost['id'] ?>" id="post_id" class="post_id">
                                    <p class="comment-form-email">
                                        <label for="email">Email <span class="required">*</span></label>
                                        <input type="email" aria-required="true" size="30" value="" name="email"
                                               id="email" class="form-control" placeholder="Enter email">
                                    </p>
                                    <p class="comment-form-comment">
                                        <label for="comment">Comment</label>
                                        <textarea aria-required="true" rows="8" cols="45" name="comment" id="comment"
                                                  class="form-control" placeholder="Comment"></textarea>
                                    </p>
                                    <p class="form-submit">
                                        <input type="button" value="Отправить СМС" id="submit" name="submit"
                                               class="theme_btn">
                                    </p>
                                </form>
                            </div>
                            <!-- #respond -->
                            <script src="/static/js/comment.js"></script>
                        </div>
                        <!-- #comments -->

                    </div>
                    <!-- #content -->
                </div>

            </div>
        </div>
    </div>
</section>