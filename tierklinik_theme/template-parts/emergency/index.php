<?php
$emergency_title = carbon_get_theme_option('emergency_title');
$emergency_phone = carbon_get_theme_option('emergency_phone');
$emergency_add_txt = carbon_get_theme_option('emergency_substring');
$emergency_link_text = carbon_get_theme_option('emergency_link_text');
$emergency_link     = carbon_get_theme_option('emergency_link');
?>
<div class="emergency-btn">
    <p class="emergency-title">
        <span class="emergencyOpen"><?= $emergency_title?></span>
        <i class="close-btn emergencyClose"></i>
    </p>
    <div class="emergency-toggle">
        <?php
        if(!empty($emergency_phone)):
            ?>
            <a href="tel:<?= str_replace(' ', '',$emergency_phone)?>">
                <i class="fas fa-phone-alt mr-2"></i>
                <span class="phone-num"><?= $emergency_phone?></span>
            </a>
        <?php
        endif;

        if(!empty($emergency_add_txt)):
            ?>
            <p class="font-light pl-6 pb-10"><?= $emergency_add_txt?></p>
        <?php
        endif;
        ?>
        <a href="<?= $emergency_link?>" class="pb-2 pr-5 flex items-center" style="color: white;">
            <span><?= $emergency_link_text?></span>
            <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</div>
