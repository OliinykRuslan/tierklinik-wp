<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tierklinik_Theme
 */

$nav_args = array(
        'theme_location'    => 'main_menu',
        'container' => false,
        'items_wrap' => '%3$s'
);

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="navbar-wrapper">
    <div class="container mx-auto nav-container">
        <header class="header">
            <div class="head-menu">
                <div class="navbar-wrapper-list">
                    <a href="/">
							<span class="main-logo">
								<picture>
									<source srcset=<?= get_template_directory_uri() . "/dist/assets/images/webp/logo-white.webp"?> type="image/webp">
									<img src=<?= get_template_directory_uri() . "/dist/assets/images/logo-white.png"?> class="logo" alt="logo">
								</picture>
							</span>
                        <span class="fixed-logo">
                                <picture>
                                    <source srcset=<?= get_template_directory_uri() .  "/dist/assets/images/webp/logo.webp"?> type="image/webp">
                                    <img src=<?= get_template_directory_uri() . "/dist/assets/images/logo.png" ?> class="logo" alt="logo">
                                </picture>
							</span>
                    </a>
                    <div class="w-full">
                        <ul class="list-menu nav toggleMenu">
                            <?php wp_nav_menu($nav_args)?>
                        </ul>
                    </div>
                </div>
                <div class="custom_navbar">
                    <button class="navbar-toggler showMenu closed">
							<span class="header_btn">
								<span class="bit-1"></span>
								<span class="bit-2"></span>
								<span class="bit-3"></span>
							</span>
                    </button>
                </div>
            </div>
        </header>
    </div>
</div>
