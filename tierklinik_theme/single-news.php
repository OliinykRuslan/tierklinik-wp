<?php
$post_id = get_the_ID();
$date    = strtotime(get_the_date());
$date_f  = date('d.F Y', $date);
$author = carbon_get_post_meta($post_id, 'signature_txt');
get_header();

include_once('template-parts/app_banner/index.php');

?>
    <div class="single-post-cont">
        <div class="container mx-auto">
            <p class="date-publication mt-10"><span style="color: #40ccb5;"><?= $date_f?></span></p>
            <h2 style="color: #37617a;font-size: 2em;text-align: center;margin: 2rem auto;"><?php the_title()?></h2>
            <?php
            the_content();

            if(!empty($author)):
            ?>
            <div class="rost-author">
                <h3 style="color: #37617a;margin-bottom: 0;"><?= __('Autor')?></h3>
                <?= wpautop($author)?>
            </div>
                <?php
            endif;
                ?>
        </div>
    </div>
<?php
get_footer();
