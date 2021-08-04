<?php
/**
 * Template name: Events
 */

$post_id = get_the_ID();
$events = apply_filters('event_posts_query', true);

get_header();
include_once('template-parts/app_banner/index.php');

if($events->have_posts()):
?>
<section class="events-wrap">
    <?php
    while ($events->have_posts()):
        $events->the_post();
        $event_id = get_the_id();
        $event_href = get_the_permalink();
        $start = get_post_meta($event_id, '_event_start_date', true);
        $end = get_post_meta($event_id, '_event_end_date', true);
        $start_time = get_post_meta($event_id, '_event_start_time', true);
        $registration_deadline = get_post_meta($event_id, '_event_registration_deadline', true);
        $event_location = get_post_meta($event_id, '_event_location', true);
//        $thumbnail_id = get_post_meta($event_id, '_thumbnail_id', true);
//        $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
//        $thumbnail_src = wp_get_attachment_image_url($thumbnail_id);
        $enddate_str = strtotime($end);
        $enddate_f = date("j.F Y", $enddate_str);
        $start_time_str = strtotime($start_time);
        $start_time_f   = date('h', $start_time_str);
        ?>

        <div class="single-event">
            <a href="<?= $event_href?>"></a>
            <div class="event-img" style="background-image: url(<?= get_the_post_thumbnail_url($event_id, 'large')?>);">

            <div class="items">
                <p class="section-subtitle color-green"><?= $enddate_f?></p>
                <h2 class="section-title"><?= get_the_title()?></h2>
                <div class="time-location">
                    <p class="time"><?= $start_time_f . " " .__("Uhr")?></p>
                    <p class="location"><?= $event_location?></p>
                </div>
            </div>
        </div>

        <?php
    endwhile;
    wp_reset_postdata();
    ?>
</section>
<?php
endif;
get_footer();