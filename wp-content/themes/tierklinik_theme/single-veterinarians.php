<?php
get_header();
$post_id = get_the_ID();

include_once ('template-parts/vet_posts/posts_data.php');
$vets = new Veterinarians($post_id, true);
//include_once('template-parts/app_banner/index.php');

//var_dump($vets);
?>


   <section class="section-hero">
       <div class="hero-wrap">
           <div class="container mx-auto relative">
               <div class="hero-content">
                   <p class="subtitle-page">Innere Medizin</p>
                   <h1 class="title-page"><?= $vets->query_posts[0]["title"]?></h1>

                   <div class="section-subtitle">
                       <p><?= $vets->query_posts[0]["rank"]?></p>
							<?php
                       if(!empty($vets->query_posts[0]["diploma"])):
                        ?>
                       <p><?= $vets->query_posts[0]["diploma"]?></p>
                            <?php
                       endif;
                           ?>
                   </div>


                  <?php
                       if(!empty(get_the_content())): ?>
                       <h2 class="section-title">Biografie</h2>
						    <div class="description-txt">
                      <?php
                       the_content();
                       ?>
                           </div>
                          <?php
                       endif;
                           ?>


                   <div class="hero-img">
                       <picture>
                           <img src="<?= $vets->query_posts[0]["thumbnail"]["src"]?>" alt="<?= $vets->query_posts[0]["thumbnail"]["alt"]?>">
                       </picture>

                      <?php
                       if(!empty($vets->query_posts[0]["resume"])):
                       ?>
                       <a href="<?= $vets->query_posts[0]["resume"]?>" download="proposed_file_name" class="btn download-btn bg-green">
                           <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" fill="#fff"
                                 viewBox="0 0 477.867 477.867" style="enable-background:new 0 0 477.867 477.867;" xml:space="preserve" class="btn-ico">
										<path d="M443.733,307.2c-9.426,0-17.067,7.641-17.067,17.067v102.4c0,9.426-7.641,17.067-17.067,17.067H68.267
											c-9.426,0-17.067-7.641-17.067-17.067v-102.4c0-9.426-7.641-17.067-17.067-17.067s-17.067,7.641-17.067,17.067v102.4
											c0,28.277,22.923,51.2,51.2,51.2H409.6c28.277,0,51.2-22.923,51.2-51.2v-102.4C460.8,314.841,453.159,307.2,443.733,307.2z"/>
                               <path d="M335.947,295.134c-6.614-6.387-17.099-6.387-23.712,0L256,351.334V17.067C256,7.641,248.359,0,238.933,0
											s-17.067,7.641-17.067,17.067v334.268l-56.201-56.201c-6.78-6.548-17.584-6.36-24.132,0.419c-6.388,6.614-6.388,17.099,0,23.713
											l85.333,85.333c6.657,6.673,17.463,6.687,24.136,0.031c0.01-0.01,0.02-0.02,0.031-0.031l85.333-85.333
											C342.915,312.486,342.727,301.682,335.947,295.134z"/>
								</svg>
                           <span>Download CV</span>
                       </a>
                          <?php
                       endif;
                           ?>
                   </div>
               </div>
           </div>

       </div>
   </section>

    <section class="aarau-west-section text-center">
        <div class="container mx-auto">
            <h3 class="section-title">
                «Die Tierklinik Aarau West
                bietet mir als Ärztin die
                Infrastruktur, um meinen
                Patienten die beste Behandlung
                vorzunehmen.»
            </h3>
            <p class="section-subtitle">Franziska Sonderegger</p>
        </div>
    </section>

    <section class="news-section">
		<div class="container mx-auto">
			<div class="news-wrap">

				<div class="title-wrap">
					<h2 class="section-title">Publizierte Artikel</h2>
				</div>

				<div class="item-wrap">
					<a href="#" class="news-item">
						<picture>
							<source srcset="assets/images/webp/news-item.webp" type="image/webp">
							<img src="assets/images/news-item.png" class="news-img" alt="news-item">
						</picture>
						<div class="news-description">
							<p class="news-title">Langer Titel</p>
							<p class="news-subtitle">Untertitel</p>
						</div>
						<div class="arrow">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								viewBox="0 0 476.213 476.213">
								<polygon points="345.606,107.5 324.394,128.713 418.787,223.107 0,223.107 0,253.107 418.787,253.107 324.394,347.5 
								345.606,368.713 476.213,238.106 "/>
							</svg>
						</div>
					</a>

					<a href="#" class="news-item">
						<picture>
							<source srcset="assets/images/webp/news-item.webp" type="image/webp">
							<img src="assets/images/news-item.png" class="news-img" alt="news-item">
						</picture>
						<div class="news-description">
							<p class="news-title">Langer Titel</p>
							<p class="news-subtitle">Untertitel</p>
						</div>
						<div class="arrow">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								viewBox="0 0 476.213 476.213">
								<polygon points="345.606,107.5 324.394,128.713 418.787,223.107 0,223.107 0,253.107 418.787,253.107 324.394,347.5 
								345.606,368.713 476.213,238.106 "/>
							</svg>
						</div>
					</a>

					<a href="#" class="news-item">
						<picture>
							<source srcset="assets/images/webp/news-item.webp" type="image/webp">
							<img src="assets/images/news-item.png" class="news-img" alt="news-item">
						</picture>
						<div class="news-description">
							<p class="news-title">Langer Titel</p>
							<p class="news-subtitle">Untertitel</p>
						</div>
						<div class="arrow">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								viewBox="0 0 476.213 476.213">
								<polygon points="345.606,107.5 324.394,128.713 418.787,223.107 0,223.107 0,253.107 418.787,253.107 324.394,347.5 
								345.606,368.713 476.213,238.106 "/>
							</svg>
						</div>
					</a>
				</div>

			</div>
		</div>
	</section>

    <section class="competence-section">	
		<div class="competence-wrap">
			<div class="competence-img" style="background-image: url('assets/images/istockphoto-626535934-2048x2048.jpg');">
			</div>
			<div class="text-item">
				<p class="section-subtitle color-green">Innere Medizin</p>
				<h2 class="section-title">
					Erfahren Sie mehr über
					den Fachbereich von
					Stefan Schellenberg
				</h2>
				<a href="#" class="btn shadow-lg">
					Mehr erfahren
				</a>
			</div>
		</div>
	</section>

    <a href="#" class="btn full-btn bg-green">
		<span class="arrow arrow-left mr-2"></span>
		Alle Tierärzte
	</a>

	<div class="overlay overlayJs"></div>

<?php
get_footer();


