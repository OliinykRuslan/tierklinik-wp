<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Tierklinik_Theme
 */

get_header();
?>

    <section class="section-hero">
        <div class="hero-wrap">
        </div>
    </section>

    <section class="not-found-section">
        <h1 class="section-title"><?= __('404 - Seite nicht gefunden')?></h1>

        <a href="/" class="btn shadow-lg mx-auto">
            <?= __('Zurück zur Startseite')?>
        </a>
    </section>

    <picture>
        <source srcset="dist/assets/images/webp/Fotobanner_Desktop.webp" type="image/webp">
        <img src="dist/assets/images/Fotobanner_Desktop.png" alt="">
    </picture>
<?php
include_once('template-parts/go_home_btn/index.php');
?>

    <div class="overlay overlayJs"></div>

<?php
get_footer();
