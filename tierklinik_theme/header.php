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
                    <a href="homepage.html">
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
                            <li class="nav-item"><a href="#" class="nav-btn">Fachgebiete</a></li>
                            <li class="nav-item"><a href="#" class="nav-btn">Tierhalter</a></li>
                            <li class="nav-item submenuCollapse">
                                <p class="nav-btn">
                                    Für Tierärzte
                                    <i class="fas fa-chevron-down menu-arrow"></i>
                                </p>
                                <ul class="submenu">
                                    <li><a href="#">Information</a></li>
                                    <li><a href="#">Aufenthalt</a></li>
                                    <li><a href="#">Prävention</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Kundenmagazin</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenuCollapse">
                                <p class="nav-btn">
                                    Karriere
                                    <i class="fas fa-chevron-down menu-arrow"></i>
                                </p>
                                <ul class="submenu">
                                    <li><a href="#">Information</a></li>
                                    <li><a href="#">Aufenthalt</a></li>
                                    <li><a href="#">Prävention</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Kundenmagazin</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenuCollapse">
                                <p class="nav-btn">
                                    Über uns
                                    <i class="fas fa-chevron-down menu-arrow"></i>
                                </p>
                                <ul class="submenu">
                                    <li><a href="#">Information</a></li>
                                    <li><a href="#">Aufenthalt</a></li>
                                    <li><a href="#">Prävention</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Kundenmagazin</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-btn">Wissen</a></li>
                            <li class="nav-item search-box">
                                <a href='#' onclick="event.preventDefault()" class="searchBox nav-btn"><i class="fas fa-search"></i></a>

                                <form action="#" class="search-form">
                                    <div class="search-wrap">
                                        <div class="form-group">
                                            <i class="fas fa-search icon-search"></i>
                                            <input type="text" class="search-input" placeholder="Suchbegriff" />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="" class="search-btn">
                                            <button type="button">
                                                <i class="fas fa-arrow-right icon-serch-btn"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </li>

                            <li class="nav-item phone">
                                <a href="tel:0627378000" class="items-center">
                                    <i class="fas fa-phone-alt mr-2"></i>
                                    <span class="phone-num">062 737 80 00</span>
                                </a>
                            </li>

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
