<?php
get_header();
$post_id = get_the_ID();

include_once ('template-parts/vet_posts/posts_data.php');
$vets = new Veterinarians($post_id, true);
$tax = get_the_terms($post_id, 'fachgebiet');
$news_posts = apply_filters('news_posts_query', 3);
$st = $tax[0]->name?? null;
$t = '';
$l = get_term_link( $tax[0]->term_id, $tax[0]->taxonomy );
$btn_txt = '';
$img = '';
if(!empty(carbon_get_post_meta($post_id, 'link_to_branch_text'))){
    $t = carbon_get_post_meta($post_id, 'link_to_branch_text') . ' ' . $vets->query_posts[0]['title'];
}
if(!empty(carbon_get_post_meta($post_id, 'link_to_branch_btn_txt'))){
    $btn_txt = carbon_get_post_meta($post_id, 'link_to_branch_btn_txt');
}
if(!empty(carbon_get_post_meta($post_id, 'link_to_branch_tmb'))){
    $img = carbon_get_post_meta($post_id, 'link_to_branch_tmb');
}
?>

    <section class="section-hero">
        <div class="hero-wrap">

            <div class="container mx-auto relative">
                <div class="hero-content">
                    <p class="subtitle-page"><?= $tax[0]->name?></p>
                    <h1 class="title-page"><?= $vets->query_posts[0]['title']?></h1>

                    <div class="section-subtitle">
                        <?php
                        if(!empty($vets->query_posts[0]['rank'])):
                        ?>
                        <p><?= $vets->query_posts[0]['rank']?></p>
                            <?php
                        endif;

                        if(!empty($vets->query_posts[0]['diploma'])):
                            ?>
                        <p><?= $vets->query_posts[0]['diploma']?></p>
                            <?php
                        endif;
                            ?>
                    </div>

                    <?php
                    if(!empty(get_the_content())):
                    ?>
                    <h2 class="section-title"><?= __('Biografie')?></h2>
                    <div class="description-txt">
                        <?php the_content(); ?>
                    </div>
                        <?php
                    endif;
                        ?>

                    <div class="hero-img">
                        <picture>
<!--                            <source srcset="assets/images/webp/stefan.webp" type="image/webp">-->
                            <img src="<?= $vets->query_posts[0]['thumbnail']['src']?>" alt="<?= $vets->query_posts[0]['thumbnail']['alt']?>">
                        </picture>

                        <?php
                        if(!empty($vets->query_posts[0]['resume'])):
                        ?>
                        <a href="<?= $vets->query_posts[0]['resume']?>" download="<?= $vets->query_posts[0]['resume']?>" class="btn download-btn bg-green">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" fill="#fff"
                                 viewBox="0 0 477.867 477.867" style="enable-background:new 0 0 477.867 477.867;" xml:space="preserve" class="btn-ico">
									<path d="M443.733,307.2c-9.426,0-17.067,7.641-17.067,17.067v102.4c0,9.426-7.641,17.067-17.067,17.067H68.267
										c-9.426,0-17.067-7.641-17.067-17.067v-102.4c0-9.426-7.641-17.067-17.067-17.067s-17.067,7.641-17.067,17.067v102.4
										c0,28.277,22.923,51.2,51.2,51.2H409.6c28.277,0,51.2-22.923,51.2-51.2v-102.4C460.8,314.841,453.159,307.2,443.733,307.2z"/>
                                <path d="M335.947,295.134c-6.614-6.387-17.099-6.387-23.712,0L256,351.334V17.067C256,7.641,248.359,0,238.933,0
										s-17.067,7.641-17.067,17.067v334.268l-56.201-56.201c-6.78-6.548-17.584-6.36-24.132,0.419c-6.388,6.614-6.388,17.099,0,23.713
										l85.333,85.333c6.657,6.673,17.463,6.687,24.136,0.031c0.01-0.01,0.02-0.02,0.031-0.031l85.333-85.333
										C342.915,312.486,342.727,301.682,335.947,295.134z"/>
							</svg>
                            <span><?= __('Download CV')?></span>
                        </a>
                            <?php
                        endif;
                            ?>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php
        if(carbon_get_post_meta($post_id, 'show_slogan') == true):
    ?>
    <section class="aarau-west-section text-center">
        <div class="container mx-auto">
            <h3 class="section-title">«<?= $vets->query_posts[0]['slogan']['content']?>»</h3>
            <?php
            if(!empty($vets->query_posts[0]['slogan']['author'])):
            ?>
            <p class="section-subtitle"><?= $vets->query_posts[0]['slogan']['author']?></p>
                <?php
            endif;
                ?>
        </div>
    </section>
    <?php
        endif;

        include_once('template-parts/news/news-prev.php');

        include_once('template-parts/recruiting_&_career_sections/index.php');
    ?>

    <a href="/team" class="btn full-btn bg-green">
        <span class="arrow arrow-left mr-2"></span>
        <?= __('Alle Tierärzte') ?>
    </a>

    <div class="overlay overlayJs"></div>

<?php
get_footer();


