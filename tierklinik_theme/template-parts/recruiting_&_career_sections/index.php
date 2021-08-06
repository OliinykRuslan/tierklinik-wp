<?php
$img         = $img?? carbon_get_theme_option('recruiting_img');
$subtitle   = $st?? carbon_get_theme_option('recruiting_slogan');
$content    = $t?? carbon_get_theme_option('recruiting_tile');
$link       = $l?? '#';
$button_text = $btn_txt?? carbon_get_theme_option('recruiting_btn_txt');
$a_attr     = $l_b_attr?? null;
?>
    <section class="competence-section" style="background: <?= carbon_get_theme_option('recruiting_container_bg')?>">
        <div class="competence-wrap">
            <div class="competence-img" style="background-image: url(<?= $img?>);">
            </div>
            <div class="text-item">
                <p class="section-subtitle color-green"><?= $subtitle?></p>
                <h2 class="section-title"><?= $content?></h2>
                <a href="<?= $link?>" class="btn shadow-lg" <?= $a_attr?>>
                    <?= $button_text?>
                </a>
            </div>
        </div>
    </section>
