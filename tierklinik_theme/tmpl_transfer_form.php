<?php
/**
 * Template name: Transfer
 */

$post_id = get_the_ID();
$list_of_destinations = carbon_get_post_meta($post_id, 'list_of_destinations');
$destination_title_section = carbon_get_post_meta($post_id, 'destination_title_section');

get_header();

include_once('template-parts/app_banner/index.php');

if(!empty(get_the_content())):
?>
    <section class="tax-dynamic-desc">
        <div class="container mx-auto">
            <?php
            the_content();
            ?>
        </div>
    </section>
    <?php
endif;
    ?>
    <section id="application" class="section-application">
        <div class="container mx-auto">

            <div class="application-section">
                <div class="application-wrap">

                    <h2 class="section-title">Überweisungsformular</h2>

                    <h4 class="title-form">Überweisender Tierarzt</h4>

                    <?= do_shortcode('[contact-form-7 id="95" title="Transfer form"]')?>

                </div>
            </div>

        </div>
    </section>

<?php
if(!empty($list_of_destinations)):
?>
    <section class="doctors-section">
        <div class="container mx-auto">
            <?php
            if(!empty($destination_title_section)):
            ?>
            <h2 class="section-title"><?= $destination_title_section?></h2>
            <?php
            endif;
            ?>
            <div class="doctors-wrap">
                <?php
                foreach($list_of_destinations as $item):
                ?>
                <div class="doctor-item">
                    <h4 class="title-item"><?= $item['destination_title']?></h4>
                    <p><?= $item['destination_desc']?></p>
                    <a href="#" data-doctor="<?= $item['destination_title']?>" class="btn shadow-lg open-application-form"><?= __('zum Überweisungsformular') ?></a>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>
<?php
endif;
?>

<?php
include_once('template-parts/go_home_btn/index.php')
?>

    <div class="overlay overlayJs"></div>
<?php
get_footer(); ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(".open-application-form").click(function (e) {
            e.preventDefault();
            jQuery(".section-application").slideDown(
                "slow",
                function () {}
            );
        });

        let fileInput = jQuery('input[type=file]');

        fileInput.on('change', function (e){
            let label = jQuery(this).closest('.form-group').find('label');
            let txt = jQuery(this).closest('.form-group').find('.txt');
            let fileName = e.target.files[0].name;
            label.text(fileName);
            txt.remove();
        })
    })
</script>
