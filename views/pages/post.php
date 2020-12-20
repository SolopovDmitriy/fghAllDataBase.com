<section id="middle" class="light_section">
    <div class="container">
        <div class="row blog">
            <div class="col-sm-9">
                <div class="content-area" id="primary">
                    <div role="main" class="site-content" id="content">
                        <?php
                        if (!empty($data['posts'])) {
                            foreach ($data['posts'] as $key => $post) {
                                ?>
                                <article class="post format-standard">
                                    <header class="entry-header">
                                        <h2 class="entry-title text-center">
                                            <a href="/post/onepost?post_id=<?= $post['id'] ?>" rel="bookmark">
                                                <?= $post['title'] ?>
                                            </a>
                                        </h2> <br>
                                        <div class="entry-thumbnail">
                                            <img alt="<?= $post['img_alt'] ?>" src="<?= $post['img_src'] ?>">
                                        </div>
                                        <div class="entry-meta">
                                            By
                                            <span class="author vcard">
										<a rel="author" href="#" class="url fn n">Alan Smith</a>
									</span>
                                            <span class="categories-links">
										In
										<a rel="category" href="#">Graphic Design</a>, 
										<a rel="category" href="#">Photography</a>
									</span>
                                            <span class="date">
										Posted
										<time datetime="2013-08-08T15:05:23+00:00"
                                              class="entry-date">December 8, 2013</time>
									</span>
                                            <span class="comments-link">
										<a href="#">5 comments</a>
									</span>
                                        </div>
                                        <!-- .entry-meta -->
                                    </header>
                                    <!-- .entry-header -->

                                    <div class="entry-content">
                                        <p><?= $post['slogan']?></p>
                                    </div>
                                    <!-- .entry-content -->
                                    <div class="entry-tags">
                                        <span class="tags-links">
                                            <a rel="tag" href="#">Graphic Design</a>,
                                            <a rel="tag" href="#">Photography</a>
                                        </span>
                                    </div>
                                    <!-- .entry-tags -->
                                </article>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <!-- #content -->
                </div>
                <div class="text-center">
                    <ul class="pagination">
                        <li><a href="/post/index?pagenum=1"><i class="arrow-icon-left-open-mini"></i></a></li>
                        <?php
                        $pagination = $data['pagination'];
                        for ($i = 0; $i < $pagination['count_pages']; $i++) {
                            ?>
                            <li><a href="/post/index?pagenum=<?= $i + 1 ?>"><?= $i + 1 ?></a></li>
                            <?php
                        }
                        ?>
                        <li><a href="/post/index?pagenum=<?= $pagination['count_pages'] ?>"><i
                                        class="arrow-icon-right-open-mini"></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="col-sm-3">

                <div class="block widget_categories">
                    <h3>Категории</h3>
                    <ul>
                        <?php
                        if (!empty($data['count_posts_by_cat'])) {
                            foreach ($data['count_posts_by_cat'] as $key => $value) {
                                ?>
                                <li class="cat-item"><a href="#"><?= $value['category'] ?></a>
                                    (<?= $value['count_posts'] ?>)
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>


                <div class="block widget_archive">
                    <h3>Blog Archives</h3>
                    <ul>
                        <li><a href="#">July 2013</a></li>
                        <li><a href="#">June 2013</a></li>
                        <li><a href="#">May 2013</a></li>
                        <li><a href="#">April 2013</a></li>
                        <li><a href="#">March 2013</a></li>
                    </ul>
                </div>


                <div class="block widget_tag_cloud">
                    <h3>Tags</h3>
                    <div class="tagcloud">
                        <a href="#" class="tag-link">Graphic Design</a>
                        <a href="#" class="tag-link">Photography</a>
                        <a href="#" class="tag-link">Design</a>
                        <a href="#" class="tag-link">Media</a>
                        <a href="#" class="tag-link">Typography</a>
                    </div>
                </div>


                <div class="block widget_news">
                    <h3>Recent Posts</h3>
                    <ul>
                        <li class="item">
							<span class="news_introimg">
								<a href="#">
									<img alt="" src="example/team/01.jpg">
								</a>
							</span>
                            <div class="news_right">
                                <h5>
                                    <a href="#">At vero eos</a>
                                </h5>
                                <p>Lorem ipsum dolor sit amet</p>
                            </div>
                        </li>

                        <li class="item">
							<span class="news_introimg">
								<a href="#">
									<img alt="" src="example/team/02.jpg">
								</a>
							</span>
                            <div class="news_right">
                                <h5>
                                    <a href="#">Sanctus sea</a>
                                </h5>
                                <p>Lorem ipsum dolor sit amet</p>
                            </div>
                        </li>

                        <li class="item">
							<span class="news_introimg">
								<a href="#">
									<img alt="" src="example/team/01.jpg">
								</a>
							</span>
                            <div class="news_right">
                                <h5>
                                    <a href="#">At vero eos</a>
                                </h5>
                                <p>Lorem ipsum dolor sit amet</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </aside><!-- eof sidebar -->

        </div>
    </div>
</section>