<?php
/**
 * Template name: Gallery
 */

$post_id = get_the_ID();
$gallery = carbon_get_post_meta($post_id, 'gallery_images');
$gallery_title = carbon_get_post_meta($post_id, 'gallery_title');
$b = carbon_get_post_meta($post_id, 'banner_gallery_page');
$alltag = apply_filters('get_q_posts', 'alltag', 4);

get_header();
include_once('template-parts/app_banner/index.php');

if(!empty($gallery)): ?>
    <section class="galerie-section">
        <div class="container mx-auto">
            <?php
            if(!empty($gallery_title)):
            ?>
            <div class="section-title"><?= $gallery_title?></div>
                <div class="galerie-wrap">
            <?php
            endif;

            foreach($gallery as $item):
                $img_id         = $item["gallery_img"];
                $attachment     = get_post($img_id);
                $alt            = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
                $src            = $attachment->guid;
                ?>
                <div class="galerie-img">
                    <picture>
                        <img src="<?= $src?>" alt="<?= $alt?>">
                    </picture>
                </div>
            <?php
            endforeach;  ?>
                </div>
        </div>
    </section>
<?php
endif;

if(!empty($b)):
?>
        <section class="tax_banner">
            <picture>
                <img src="<?= $b?>" alt="gallery page banner">
            </picture>
        </section>
<?php
endif;

if($alltag->have_posts()): ?>
<section class="galerie-section">
    <div class="container mx-auto">
        <div class="section-title"><?= __("Aus dem Tierklinik Alltag")?></div>
            <div class="galerie-wrap">
            <?php
            while($alltag->have_posts()):
                $alltag->the_post();
            $th = get_post_thumbnail_id();
            $alt = get_post_meta($th, '_wp_attachment_image_alt', true)
            ?>
                <div class="galerie-img">
                    <picture>
                        <img src="<?= get_the_post_thumbnail_url()?>" alt="<?= $alt?>">
                    </picture>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <a href="/alltag" class="btn"><?= __("Mehr laden")?></a>

</section>
       <?php
include_once('template-parts/go_home_btn/index.php');
endif;
get_footer();