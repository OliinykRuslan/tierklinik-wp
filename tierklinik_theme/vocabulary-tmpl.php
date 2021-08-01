<?php
/**
 * Template name: Vocabulary Template
 */
$post_id = get_the_ID();
$vocabulary_q = apply_filters('vocabulary_posts_query', true);

get_header(); ?>

<?php
include_once('template-parts/app_banner/index.php');
?>

<section>
    <div class="container mx-auto">
        <!-- alphabet  -->
        <?= apply_filters('alphabet_HTML_generation', true)?>

        <?= apply_filters('vocabulary_list_HTML_generate', $vocabulary_q) ;?>
    </div>
</section>

    <?php
    include_once('template-parts/go_home_btn/index.php');

get_footer();
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        let list_letter = jQuery('.alphabet li');
        list_letter.each(function (){
            let href = jQuery(this).find('a').attr('href')

            if(!jQuery(href).length){
                jQuery(this).addClass('disabled');
            }
        })

    });
</script>
