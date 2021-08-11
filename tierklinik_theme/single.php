<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tierklinik_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer(); ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        let eventBanner = $('.wpem-event-single-image-wrapper'),
            eventTitle = $('.wpem-event-title').find('.wpem-heading-text')

        if(eventTitle.length && eventBanner.length){
            let titleBanner = "<h1 class='title-page'>"+eventTitle.text()+"</h1>";
            eventBanner.find(".wpem-event-single-image").prepend(titleBanner);
            $(".wpem-event-title").remove();
        }
    });
</script>
