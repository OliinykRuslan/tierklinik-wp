<?php
    $img_id     = carbon_get_theme_option('contacts_section_thumb');
    $attachment = get_post($img_id);
    $numbers    = carbon_get_theme_option('contacts_section_phones');
    $schedules  = carbon_get_theme_option('schedule');
    $networks   = carbon_get_theme_option('networks_list');
    $copyright  = carbon_get_theme_option('copyright');
    $info_mail  = carbon_get_theme_option('info_mail');

    $emergency_title = carbon_get_theme_option('emergency_title');
    $emergency_phone = carbon_get_theme_option('emergency_phone');
    $emergency_add_txt = carbon_get_theme_option('emergency_substring');
    $emergency_link_text = carbon_get_theme_option('emergency_link_text');
    $emergency_link     = carbon_get_theme_option('emergency_link');
?>
<section class="contact-section">
    <a href="" id="backtotop" class="backtop-btn"><i class="fas fa-arrow-up"></i></a>
    <div class="contact-container container mx-auto">
        <div class="contact-wrap">
            <div class="contact-col contact-img">
                <picture>
<!--                    <source srcset="assets/images/webp/_03A1831.webp" type="image/webp">-->
                    <img src="<?= $attachment->guid?>" alt="<?= get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)?>">
                </picture>
            </div>

            <div class="contact-col">
                <h6 class="section-subtitle color-green order-1">Kontakt</h6>
                <div class="mb-4 order-2"><?= wpautop(carbon_get_theme_option('contacts_section_address'))?></div>

                <?php
                foreach($numbers as $number):
                ?>
                <div class="md:mb-2 order-3 md:flex">
                    <span class="mr-8 hidden md:block"><?= $number['contact_ph_desc']?></span>
                    <a href="<?= str_replace(' ', '',$number['contact_ph_num'])?>" class="mob-btn"><?= $number['contact_ph_num']?></a>
                </div>
                <?php
                endforeach;
                ?>

                <a href="tel:<?= str_replace(' ', '',$emergency_phone)?>" class="btn shadow-lg bg-red max-w-full my-6 order-5 emergency-btn">
                    <span class="mr-2"><?= $emergency_title?> <?= $emergency_phone?></span>
                    <span class="text-xs"><?= $emergency_add_txt?></span>
                </a>

                <?php
                if(!empty($info_mail)):
                ?>
                <a href="<?= $info_mail?>" class="btn shadow-lg max-w-full order-6"><?= $info_mail?></a>
                <?php
                endif;
                ?>
            </div>

            <div class="contact-col">
                <h6 class="section-subtitle color-green">Öffnungszeiten</h6>
                <?php
                foreach($schedules as $schedule):
                ?>
                <div class="mb-6">
                    <?php
                    if(!empty($schedule['schedule_title'])):
                    ?>
                    <p><?= $schedule['schedule_title']?></p>
                    <?php
                    endif;

                    if(!empty($schedule['schedule_graphic'])):
                    ?>
                    <p><?= $schedule['schedule_graphic']?></p>
                    <?php
                    endif;

                    if(!empty($schedule['schedule_desc'])):
                    ?>
                    <p class="font-light"><?= $schedule['schedule_desc']?></p>
                    <?php
                    endif;
                    ?>
                </div>
                <?php
                endforeach;
                ?>

                <?php
                if(!empty($networks)):
                ?>
                <ul class="social-list flex mt-3">
                    <?php
                    foreach($networks as $network):
                    ?>
                    <li><a href="<?= $network['network_href']?>"><i class="fab <?= $network['network_icon_class']?>"></i></a></li>
                    <?php
                    endforeach;
                    ?>
                </ul>
                <?php
                endif;
                ?>
            </div>

        </div>
        <?php
        if(!empty($copyright)):
        ?>
        <p class="copyright"><?= $copyright?></p>
        <?php
        endif;
        ?>
    </div>
</section>
