<?php

include_once __DIR__ . '/posts_data.php';
$vets = new Veterinarians($post_id, $vet_single, $vets_term);

if($vets->container_settings['show']):

global $post;
$page_slug = $post->post_name;
$button_class = '';

$button_url = '/team';
$button_class = 'more';

if($page_slug == 'team'){
    $button_url = '#';
}
?>

<section class="veterinarians-section pt-20 pb-32" style="background: <?= $vets->container_settings['bg']?>">
    <div class="container mx-auto">
        <?php
        if(!empty($vets->container_settings['subtitle'])):
        ?>
        <h6 class="section-subtitle color-green"><?= $vets->container_settings['subtitle']?></h6>
            <?php
        endif;

        if(!empty($vets->container_settings['title'])):
            ?>
        <h2 class="section-title"><?= $vets->container_settings['title']?></h2>
            <?php
        endif;
            ?>

        <div class="veterinarians <?= $vets->container_settings['class']?>">
            <?php
                foreach($vets->query_posts as $post):
            ?>
            <div class="slider-item max-w-xs shadow-lg">
                <a href="<?= $post['guid']?>">
                    <div class="slider-photo">
                        <picture>
                            <!--                    <source srcset="assets/images/webp/stefan.webp" type="image/webp">-->
                            <img src="<?= $post['thumbnail']['src']?>" alt="<?= $post['thumbnail']['alt']?>">
                        </picture>
                    </div>

                    <div class="slider-description p-5">
                        <div class="item-title"><?= $post['title']?></div>
                        <div>
                            <?php
                            if(!empty($post['rank'])):
                                ?>
                                <p><?= $post['rank']?></p>
                            <?php
                            endif;

                            if(!empty($post['diploma'])):
                                ?>
                                <p><?= $post['diploma']?></p>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                endforeach;
            ?>
        </div>
    </div>

    <a href="<?= $button_url?>" class="btn shadow-lg mx-auto <?= $button_class?>"><?= $vets->container_settings['button_txt']?></a>
</section>
<?php
endif;