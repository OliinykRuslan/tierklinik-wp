<?php

include_once __DIR__ . '/main_banner.php';
$banner = new MainBanner($post_id);

$container_class = "flex";
$title_line_style = null;
if(empty($banner->right_side_img)){
    $container_class = '';
    $title_line_style = "style='max-width: 100%;'";
}
?>

<section class="section-hero">
    <div class="hero-wrap" <?= $banner->background?>>
        <div class="container mx-auto">
            <div class="pb-14">
                <div class="<?= $container_class?>">
                    <div class="hero-content">
                        <h1 class="title-page" <?= $title_line_style?>><?= $banner->title?></h1>
                        <?php
                        if(!empty($banner->subtitle)):
                        ?>
                        <p class="subtitle-page"><?= $banner->subtitle?></p>
                        <?php
                        endif;

                        if(!empty($banner->button['txt'])):
                        ?>
                        <a href="<?= $banner->button['lnk']?>" class="btn"><?= $banner->button['txt']?></a>
                        <?php endif ?>
                    </div>

                    <?php
                    if(!empty($banner->is_emergency) || !empty($banner->right_side_img)): ?>
                        <div class="hero-img">
                            <?php
                            if($banner->is_emergency):
                                include_once( get_template_directory(). '/template-parts/emergency/index.php');
                            endif;
                            ?>
                            <picture>
                                <img src="<?= $banner->right_side_img['src'] ?>" alt="<?= $banner->right_side_img['alt'] ?>">
                            </picture>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
