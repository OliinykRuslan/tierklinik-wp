<?php
    while($vacancies->vacancies_data->have_posts()){
        $vacancies->vacancies_data->the_post();
        $v_id = get_the_ID();
        $vacancy_employment_percentage = carbon_get_post_meta($v_id, 'vacancy_employment_percentage');
        $single_item_permalink = get_the_permalink();
        $single_item_thumbnail_src = $vacancy["thumb_src"] ?? null;
        $single_item_thumbnail_alt = $vacancy["thumb_alt"] ?? null;
        $single_item_title = get_the_title() . '<span class="percent">' . $vacancy_employment_percentage . '</span>';
        $single_item_arrow = true;

        include(get_template_directory() . '/template-parts/news/single_item.php');
    }

