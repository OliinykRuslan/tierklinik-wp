<?php
/**
 * Template name: Vocabulary Template
 */

$vocabulary_q = apply_filters('vocabulary_posts_query', true);

get_header(); ?>


<section>
    <div class="container mx-auto">
        <!-- alphabet  -->
        <?= apply_filters('alphabet_HTML_generation', true)?>

        <?= apply_filters('vocabulary_list_HTML_generate', $vocabulary_q) ;?>
    </div>
</section>
    <?php
get_footer();
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        let list_letter = jQuery('.alphabet li'),
            vocabulary_single_group = jQuery('.vocabulary_single_group')

        list_letter.each(function (){
            let href = jQuery(this).find('a').attr('href')

            if(!jQuery(href).length){
                jQuery(this).addClass('disabled');
            }
        })

    });
</script>
