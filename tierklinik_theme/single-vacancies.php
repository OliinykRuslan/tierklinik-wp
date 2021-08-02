<?php

$post_id            = get_the_ID();
$banner_url         = carbon_get_post_meta($post_id, 'banner_background_img');
$banner_background  = sprintf("style='background: no-repeat center url(%s); background-size: cover;'", $banner_url);
$banner_title       = carbon_get_post_meta($post_id, 'banner_title');
$banner_subtitle    = carbon_get_post_meta($post_id, 'banner_page_subtitle');
$content            = get_the_content();

$title      = __('Stellenausschreibung');
$subtitle   = __('Offene Stellen');
if(!empty($banner_title)){
    $title = get_the_title();
}

if(!empty($banner_subtitle)){
    $subtitle = $banner_subtitle;
}
get_header();
?>
    <section class="section-hero">
        <div class="hero-wrap" <?= $banner_background?>>
            <div class="container mx-auto">
                <div class="pb-14">
                    <div>
                        <div class="hero-content">
                            <p class="subtitle-page"><?= $subtitle?></p>

                            <h1 class="title-page"><?= $title?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
if(!empty($content)):
?>
    <section class="tax-dynamic-desc">
        <?= wpautop($content)?>

        <a class="btn shadow-lg mx-auto more open-modal-form"><?= __('Jetzt Bewerben') ?></a>
    </section>
<?php
endif;?>

    <section id="application" class="section-application">
        <div class="container mx-auto">
            <div class="application-section">
                <div class="application-wrap">

                    <h2 class="section-title"><?= __('Bewerbungsformular')?></h2>
                    <h4 class="section-subtitle"><?= __('Schnupperlehre')?></h4>

                    <h4 class="title-form"><?= __('Persönliche Angaben')?></h4>
                    <div class="application-form">
                        <?= do_shortcode('[contact-form-7 id="96" title="Application for Jobs"]')?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a href="/offene-stellen" class="btn full-btn bg-green">
        <span class="arrow arrow-left mr-2"></span>
        <?= __('Alle Stellen') ?>
    </a>
<?php
get_footer();
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        let vacancyName = '<?= $tax_terms->name . " ID:" . $post_id?>';
        let vacancyNameInput = jQuery('input[name="vacansy-name"]');
        let fileInput = jQuery('input[type=file]');

        fileInput.on('change', function (e){
            let label = jQuery(this).closest('.form-group').find('label');
            let txt = jQuery(this).closest('.form-group').find('.txt');
            let fileName = e.target.files[0].name;
            label.text(fileName);
            txt.remove();
        })

        if(vacancyNameInput.length){
            vacancyNameInput.val(vacancyName);
        }
    });
</script>