<?php
/**
 * Template name: Test page
 */

get_header();
?>

<div class="container mx-auto">
<h1>Test page</h1>

	<!-- gallery -->
	<section class="veterinarians-section pt-20 pb-32" style="background-color: inherit;">
		
		<div class="veterinarians gallery">

			<!-- fancybox -->
			<a 
				data-fancybox="gallery" 
				data-src="<?= get_template_directory_uri().'/dist/assets/images/_03A8593.jpg'?>" 
				data-caption="<h4 class='item-title'>Barbara Sommer</h4><div><p>Dr. med. vet.</p><p>FVH für Kleintiere</p></div>" 
				class="slider-item"
			>
				<div class="slider-photo">
					<picture>
						<img src="<?= get_template_directory_uri().'/dist/assets/images/_03A8593.jpg'?>" />
					</picture>
				</div>
				<div class="slider-description p-5">
					<h4 class="item-title">Titel</h4>
					<div>
						<p>Hier steht zu diesem Foto eine kurze Information zum Foto.</p>
					</div>
				</div>
			</a>

			<a 
				data-fancybox="gallery" 
				data-src="<?= get_template_directory_uri().'/dist/assets/images/stefan.jpg'?>" 
				data-caption="<h4 class='item-title'>Stefan Schellenberg</h4><div><p>Dr. med. vet.</p><p>Dipl. ACVIM</p></div>" 
				class="slider-item">
				<div class="slider-photo">
					<picture>
						<img src="<?= get_template_directory_uri().'/dist/assets/images/stefan.jpg'?>" />
					</picture>
				</div>
				<div class="slider-description p-5">
					<div class="item-title">Stefan Schellenberg</div>
					<div>
						<p>Dr. med. vet.</p>
						<p>Dipl. ACVIM</p>
					</div>
				</div>
			</a>

			<a 
				data-fancybox="gallery"
				data-src="<?= get_template_directory_uri().'/dist/assets/images/peter.jpg'?>"
				data-caption="<h4 class='item-title'>Peter Beck</h4><div><p>Dr. med. vet.</p></div>" 
				class="slider-item"
			>
				<div class="slider-photo">
					<picture>
						<img src="<?= get_template_directory_uri().'/dist/assets/images/peter.jpg'?>" />
					</picture>
				</div>
				<div class="slider-description p-5">
					<div class="item-title">Peter Beck</div>
					<div>Dr. med. vet.</div>
				</div>
			</a>

			<a 
				data-fancybox="gallery" 
				data-src="<?= get_template_directory_uri().'/dist/assets/images/barbara.jpg'?>" 
				data-caption="<h4 class='item-title'>Barbara Sommer</h4><div><p>Dr. med. vet.</p><p>FVH für Kleintiere</p></div>" 
				class="slider-item"
			>
				<div class="slider-photo">
					<picture>
						<img src="<?= get_template_directory_uri().'/dist/assets/images/barbara.jpg'?>" />
					</picture>
				</div>
				<div class="slider-description p-5">
					<h4 class="item-title">Barbara Sommer</h4>
					<div>
						<p>Dr. med. vet.</p>
						<p>FVH für Kleintiere</p>
					</div>
				</div>
			</a>

			<a 
				data-fancybox="gallery" 
				data-src="<?= get_template_directory_uri().'/dist/assets/images/stefan.jpg'?>" 
				data-caption="<h4 class='item-title'>Stefan Schellenberg</h4><div><p>Dr. med. vet.</p><p>Dipl. ACVIM</p></div>" 
				class="slider-item">
				<div class="slider-photo">
					<picture>
						<img src="<?= get_template_directory_uri().'/dist/assets/images/stefan.jpg'?>" />
					</picture>
				</div>
				<div class="slider-description p-5">
					<div class="item-title">Stefan Schellenberg</div>
					<div>
						<p>Dr. med. vet.</p>
						<p>Dipl. ACVIM</p>
					</div>
				</div>
			</a>

			<a 
				data-fancybox="gallery"
				data-src="<?= get_template_directory_uri().'/dist/assets/images/peter.jpg'?>"
				data-caption="<h4 class='item-title'>Peter Beck</h4><div><p>Dr. med. vet.</p></div>" 
				class="slider-item"
			>
				<div class="slider-photo">
					<picture>
						<img src="<?= get_template_directory_uri().'/dist/assets/images/peter.jpg'?>" />
					</picture>
				</div>
				<div class="slider-description p-5">
					<div class="item-title">Peter Beck</div>
					<div>Dr. med. vet.</div>
				</div>
			</a>
			<!--  -->

		</div>

		<a href="#" class="btn shadow-lg mx-auto my">Mehr laden</a>

	</section>

</div>


 <?php
 get_footer();
