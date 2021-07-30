<?php

$tax_terms = get_queried_object();
$show_logo  = get_term_meta($tax_terms->term_id, '_show_logo', true);
$logo_id  = get_term_meta($tax_terms->term_id, '_tax_page_logo', true);
$logo_src = wp_get_attachment_image_url($logo_id, "full");
$logo_alt = get_post_meta($logo_id, '_wp_attachment_image_alt', true);
$f_banner_id  = get_term_meta($tax_terms->term_id, '_tax_first_banner', true);
$f_banner_src = wp_get_attachment_image_url($f_banner_id, 'full');
$f_banner_alt = get_post_meta($f_banner_id, '_wp_attachment_image_alt', true);
$services     = carbon_get_term_meta($tax_terms->term_id, 'services_list');
$services_title = carbon_get_term_meta($tax_terms->term_id, 'tax_service_title');
$b_banner_id  = get_term_meta($tax_terms->term_id, '_tax_bottom_banner', true);
$b_banner_src = wp_get_attachment_image_url($b_banner_id, "full");
$b_banner_alt = get_post_meta($b_banner_id, '_wp_attachment_image_alt', true);
$knowledge_desc = carbon_get_term_meta($tax_terms->term_id, 'knowledge_section_desc');
$knowledge_conditional = carbon_get_term_meta($tax_terms->term_id, 'knowledge_conditional');
$tax_desc  = $tax_terms->description;
$post_id = $tax_terms->term_id;
$vet_single = false;
$vets_term  = [
    'slug'  => $tax_terms->taxonomy,
    'id'    => $tax_terms->term_id
];
get_header(); ?>

<section class="section-hero">
    <div class="hero-wrap" style="background: url(<?= get_template_directory_uri(). '/dist/assets/images/hero-bg-scale.jpg'?>)">
        <div class="container mx-auto">
            <div class="pb-14">
                <div class="flex">
                    <div class="hero-content">
                        <p class="subtitle-page"><?= __('Fachbereich')?></p>

                        <h1 class="title-page"><?= $tax_terms->name?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tax-dynamic-desc">
    <?php
    if(!empty($tax_desc)):
    ?>
    <div class="tax-desc"><?= $tax_desc?></div>
    <?php
        endif;

    if($show_logo = true):
    ?>
        <picture class="tax-page-logo">
            <img src="<?= $logo_src?>" alt="<?= $logo_alt?>">
        </picture>
        <?php
    endif;
        ?>
</section>

<?php
if(!empty($f_banner_id)):
?>
<section class="tax_banner">
        <picture>
            <img src="<?= $f_banner_src?>" alt="<?= $f_banner_alt?>">
        </picture>
</section>
    <?php
endif;
?>


<?php
if(!empty($services)):
?>
<section class="services">
    <div class="container mx-auto">
        <div class="single-post-cont">
            <div class="services_title">
                <span><?= $services_title?></span>
                <span><?= $tax_terms->name?></span>
            </div>
            <ul class="list-services">
                <?php
                foreach ($services as $service):
                    $vets_term[] = $service['tsx_single_service'];
                ?>
                <li><?= $service['tsx_single_service']?></li>
                    <?php
                endforeach;
                    ?>
            </ul>
        </div>
    </div>
</section>
<?php
endif;
?>


<section class="news-section news-col">
    <div class="container mx-auto">
        <div class="news-wrap">
            <div class="title-wrap">
                <h2 class="section-title"><?= __('Wissen')?></h2>
                <?php
                if(!empty($knowledge_desc)):
                ?>
                <span class="knowledge_desc"><?= $knowledge_desc?></span>
                    <?php
                endif;
                    ?>
            </div>

            <div class="item-wrap">
                <?php
                foreach($knowledge_conditional as $item):
                    $knowledge = get_term_by( 'id', $item, 'knowledge_area' );
                    $single_item_title = $knowledge->name;
                    $single_item_permalink = get_term_link($item);
                    $thmb_id = get_term_meta($item, '_tax_thumbnail', true);
                    $single_item_thumbnail_src = wp_get_attachment_image_url($thmb_id);
                    $single_item_thumbnail_alt = get_post_meta($thmb_id, '_wp_attachment_image_alt', true);
                    $single_item_arrow  = true;

                    include('template-parts/news/single_item.php');

                endforeach;
                    ?>
            </div>
        </div>
    </div>
</section>

<?php
 include_once('template-parts/vet_posts/list_view.php');
?>

<?php
if(!empty($b_banner_id)):
    ?>
<section class="tax_banner">
        <picture>
            <img src="<?= $b_banner_src?>" alt="<?= $b_banner_alt?>">
        </picture>
    </section>
<?php
endif;
?>

<?php
get_footer();