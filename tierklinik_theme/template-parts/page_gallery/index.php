<?php

include_once __DIR__ . '/page_gallery.php';
$gallery = new Gallery($post_id);

?>

<section class="galerie-section">
    <div class="container mx-auto">
        <p class="section-subtitle color-green"><?= $gallery->subtitle?></p>
        <h2 class="section-title"><?= $gallery->title?></h2>
        <div class="galerie-wrap">
            <?php
            foreach($gallery->images as $image):
            ?>
            <div class="galerie-img">
                <picture>
                    <img src="<?= $image['src']?>" alt="<?= $image['alt']?>">
                </picture>
            </div>
            <?php
            endforeach;
            ?>
        </div>
        <a href="#" class="btn shadow-lg mx-auto"><?= $gallery->btn_txt?></a>
    </div>
</section>
