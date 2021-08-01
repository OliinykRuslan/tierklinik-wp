<?php

foreach ($vacancies->terms as $vacancy) {
    $single_item_permalink = $vacancy['url'];
    $single_item_thumbnail_src = $vacancy["thumb_src"] ?? null;
    $single_item_thumbnail_alt = $vacancy["thumb_alt"] ?? null;
    $single_item_title = $vacancy["name"] . '<span class="percent">' . $vacancy['percentage_of_occupied_places'] . '%</span>';
    $single_item_arrow = true;
    include(get_template_directory() . '/template-parts/news/single_item.php');
}

