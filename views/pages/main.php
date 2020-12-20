
<?php
//mail('div.solopov@gmail.com', 'Тема письма', 'Текст письма', 'From: testphp358@gmail.com');
//
////testphp358@gmail.com
//echo "рfccccfffffffffffffffffffffffffffffffffff ";
?>


<section id="mainslider" class="color_section">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="/static/example/slide_1.jpg" alt=""/>
                <div class="slide_description_wrapper">
                    <div class="slide_description">
                        <h3 data-animation="slideUp">Every Thursday</h3>
                        <h2 data-animation="slideUp">50%</h2>
                        <h3 data-animation="slideUp">discount on alcohol</h3>
                    </div>
                </div>
            </li>
            <li>
                <img src="/static/example/slide_2.jpg" alt=""/>
                <div class="slide_description_wrapper">
                    <div class="slide_description">
                        <h3 data-animation="slideUp">Every Thursday</h3>
                        <h2 data-animation="slideUp">50%</h2>
                        <h3 data-animation="slideUp">discount on alcohol</h3>

                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>

<section class="welcome-box grey_section">
    <div class="container">
        <div class="row">
            <article class="col-lg-12 text-center">
                <p class="title1 ">Welcome to our restaurant</p>
                <p class="description">We are lorem ipsum dolor sit amet <span>elit</span>of America.</p>
                <p>Consectetur adipiscing elit. Sed blandit massa vel mauris sollicitudin</p>
                <a class="btn-default btn2" href="#">go to services list</a>
            </article>
        </div>
    </div>
</section>

<section class="darkgrey_section" id="title_about">
    <div class="container">
        <div class="row">
            <?php
            if (!is_null($data['last_posts']) && count($data['last_posts'])) {
                foreach ($data['last_posts'] as $key => $value) {
                    ?>
                    <div class="col-sm-6 col-md-3 to_animate text-center" data-animation="fadeInUpBig">
                        <img src="<?= $value['img_src'] ?>" alt="<?= $value['img_alt'] ?>">
                        <div class="banner_description text-center">
                            <h4 class="title"><?= $value['title'] ?></h4>
                            <p class="title_description"><?= $value['slogan'] ?></p>
                            <a class="btn-default btn2" href="/post/onepost?post_id=<?=$value['id']?>">Дальше</a>
                        </div>
                    </div>
                    <?
                }
            }
            ?>

        </div>
    </div>
</section>

<section class="banner-box color_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="title">Delicious food with a secret ingredient</p>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                    deleniti atque corrupti quos dolores et quas molestias excepturi sint ducimus qui blanditiis.
                </p>
                <a class="btn-default btn2" href="#">Click Here!</a>
            </div>
        </div>
    </div>
</section>
