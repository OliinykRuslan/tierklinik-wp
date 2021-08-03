<section class="facts-section" style="background-image: url(<?= carbon_get_theme_option('about_section_bg') ?>) ;">
    <div class="container mx-auto">
        <p class="section-subtitle"><?= carbon_get_theme_option('about_section_subtitle') ?></p>
        <h2 class="section-title"><?= carbon_get_theme_option('about_section_title') ?></h2>
        <div class="facts-wrap">
            <?php
            foreach (carbon_get_theme_option('about_section_facts') as $fact):
                ?>
                <div class="txt-item">
                    <p class="section-subtitle"><?= $fact['about_fact_val'] ?></p>
                    <p class="section-txt"><?= $fact['about_fact_title'] ?></p>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <a href="#" class="btn shadow-lg mx-auto"><?= carbon_get_theme_option('about_section_btn_txt') ?></a>
    </div>
</section>

