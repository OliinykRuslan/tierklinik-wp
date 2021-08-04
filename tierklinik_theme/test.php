<?php
/**
 * Template name: Test page
 */

get_header();

$events = apply_filters('event_posts_query', true);
?>
<div class="news-prev-wrap">
<?php
if($events->have_posts()):
    while ($events->have_posts()):
        $events->the_post();
        $event_id = get_the_id();
        $start = get_post_meta($event_id, '_event_start_date', true);
        $end = get_post_meta($event_id, '_event_end_date', true);
        $registration_deadline = get_post_meta($event_id, '_event_registration_deadline', true);
        $event_location = get_post_meta($event_id, '_event_location', true);
        $thumbnail_id = get_post_meta($event_id, '_thumbnail_id', true);
        $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        $thumbnail_src = wp_get_attachment_image_url($thumbnail_id);
        echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
        var_dump($thumbnail_src);
    endwhile;
wp_reset_postdata();
endif;
?>
</div>
<?php

get_footer();
