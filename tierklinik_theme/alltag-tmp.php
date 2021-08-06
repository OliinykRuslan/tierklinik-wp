<?php
/**
 * Template name: Alltag Template
 */

get_header();
$post_id = get_the_ID();
$add_sections = carbon_get_post_meta($post_id, 'additional_sections');
$alltag = apply_filters('get_q_posts', 'alltag', -1);

include_once('template-parts/app_banner/index.php');

if($alltag->have_posts()):
?>

<section class="veterinarians-section pt-20 pb-32" style="background: #fff">
        <div class="container mx-auto">
            <div class="veterinarians gallery">
                <?php
                while($alltag->have_posts()):
                    $alltag->the_post();
                    $th = get_post_thumbnail_id();
                    $attachment     = get_post($th);
                    $alt            = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
                    $src            = $attachment->guid;
                    ?>
                    <div class="slider-item max-w-xs shadow-lg">
<!--                        <a href="--><?//= get_permalink()?><!--">-->
                            <div class="slider-photo">
                                <picture>
                                    <img src="<?= $src?>" alt="<?= $alt?>">
                                </picture>
                            </div>

                            <div class="slider-description p-5">
                                <div class="item-title"><?= the_title()?></div>
                                <div><?php the_excerpt()?></div>
                            </div>
<!--                        </a>-->
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>

    </section>


<?php
endif;

include_once('template-parts/go_home_btn/index.php');
?>

    <div class="overlay overlayJs"></div>
<?php
get_footer();
