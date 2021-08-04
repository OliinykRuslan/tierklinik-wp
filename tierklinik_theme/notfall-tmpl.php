<?php
/**
 * Template name: Notfall
 */

$post_id = get_the_ID();
$emergency_phone = carbon_get_theme_option('emergency_phone');
$emergency_add_txt = carbon_get_theme_option('emergency_substring');
$emergency_list = carbon_get_post_meta($post_id, 'emergency_list');
$emergency_list_title = carbon_get_post_meta($post_id, 'emergency_list_title');
get_header();
?>

    <section class="section-hero">
        <div class="hero-wrap">

            <div class="container mx-auto">
                <div class="flex justify-between">
                    <div class="hero-content">
                        <h1 class="title-page"><?php the_title()?></h1>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <section class="emergency-section">
        <div class="container mx-auto">
            <h2 class="section-title">
                <?= __("Notfallnummer") . ":" ?>
                <?php
                if(!empty($emergency_phone)):
                    ?>
                <a href="tel:<?= str_replace(' ', '',$emergency_phone)?>" class="phone-btn">
                    <i class="phone-ico fas fa-phone-alt"></i>
                    <?= $emergency_phone?>
                    <?php
                    if(!empty($emergency_add_txt)):
                    ?>
                    <span class="btn-description"><?= $emergency_add_txt?></span>
                    <?php
                    endif;
                    ?>
                </a>
                    <?php
                endif;
                    ?>
            </h2>
            <?php
            if(!empty($emergency_list)):
            ?>
                <?php
                if(!empty($emergency_list_title)):
                ?>
            <h3 class="section-title"><?= $emergency_list_title?></h3>
                    <?php
                    endif; ?>
            <ol class="emergency-list">
                <?php
                    Foreach($emergency_list as $item):
                ?>
                <li><?= $item['emergency_list_item']?></li>
                        <?php
                    endforeach;
                        ?>
            </ol>
                <?php
            endif;
                ?>
        </div>
    </section>

<?php include_once('template-parts/go_home_btn/index.php')?>

    <div class="overlay overlayJs"></div>
<?php
get_footer();