<?php

?>

<a href="<?= $single_item_permalink?>" class="news-item">
    <picture>
        <!--                        <source srcset="assets/images/webp/news-item.webp" type="image/webp">-->
        <img src="<?= $single_item_thumbnail_src?>" class="news-img" alt="<?= $single_item_thumbnail_alt?>">
    </picture>
    <div class="news-description">
        <p class="news-title"><?= $single_item_title?></p>
        <!--                        <p class="news-subtitle">Untertitel</p>-->
    </div>
    <?php
    if($single_item_arrow == true):
    ?>
    <div class="arrow">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 476.213 476.213">
            <polygon points="345.606,107.5 324.394,128.713 418.787,223.107 0,223.107 0,253.107 418.787,253.107 324.394,347.5
								345.606,368.713 476.213,238.106 "/>
        </svg>
    </div>
    <?php
    endif;
    ?>
</a>
