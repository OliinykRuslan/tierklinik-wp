<?php

if($news_posts->have_posts()):
?>
<section class="news-section">
    <div class="container mx-auto">
        <div class="news-wrap">

            <div class="title-wrap">
                <h2 class="section-title"><?= __('Publizierte Artikel')?></h2>
            </div>

            <div class="item-wrap">
                <?php
                while ($news_posts->have_posts()):
                    $news_posts->the_post();
                    $single_item_title          = get_the_title();
                    $single_item_permalink      = get_the_permalink();
                    $single_item_thumbnail_src  = get_the_post_thumbnail_url();
                    $single_item_arrow          = true;
                    include(__DIR__ . '/single_item.php');
                endwhile;
                    ?>
            </div>

        </div>
    </div>
</section>
<?php
endif;