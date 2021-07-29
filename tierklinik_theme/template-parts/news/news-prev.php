<?php

if($news_posts->have_posts()):
?>
<section class="news-section">
    <div class="container mx-auto">
        <div class="news-wrap">

            <div class="title-wrap">
                <h2 class="section-title">Publizierte Artikel</h2>
            </div>

            <div class="item-wrap">
                <?php
                while ($news_posts->have_posts()):
                    $news_posts->the_post();
                ?>
                <a href="<?= get_permalink()?>" class="news-item">
                    <picture>
<!--                        <source srcset="assets/images/webp/news-item.webp" type="image/webp">-->
                        <img src="<?= get_the_post_thumbnail_url()?>" class="news-img" alt="news-item">
                    </picture>
                    <div class="news-description">
                        <p class="news-title"><?= the_title()?></p>
<!--                        <p class="news-subtitle">Untertitel</p>-->
                    </div>
                    <div class="arrow">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 476.213 476.213">
                            <polygon points="345.606,107.5 324.394,128.713 418.787,223.107 0,223.107 0,253.107 418.787,253.107 324.394,347.5
								345.606,368.713 476.213,238.106 "/>
                        </svg>
                    </div>
                </a>
                    <?php
                endwhile;
                    ?>
            </div>

        </div>
    </div>
</section>
<?php
endif;