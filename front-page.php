<?php get_header() ?>
	

	<!-- Header -->
	<header class="swiper home-header">
		<!-- Header Background -->
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<div class="home-header-content" style="background-image: url(/wp-content/themes/aseycor/assets/images/header-home-banner.jpg)">
					<div class="home-header-content__overlay"></div>

					<!-- Header Content -->
					<div class="home-header-content__container">
						<h3 class="home-header-content__title">
							Cabecera de ejemplo del slider principal 1
						</h3>
						<p class="home-header-content__description">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel
							urna sit amet dolor aliquet interdum.
						</p>
						<p class="home-header-content__size">220m2</p>
					</div>
					<div class="home-header-content__price">
						<p class="home-header-content__price-text">$ 100.000.000</p>
					</div>
				</div>
			</div>
			<div class="swiper-slide">
				<div class="home-header-content">
					<div class="home-header-content__overlay"></div>

					<!-- Header Content -->
					<div class="home-header-content__container">
						<h3 class="home-header-content__title">
							Cabecera de ejemplo del slider principal 2
						</h3>
						<p class="home-header-content__description">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel
							urna sit amet dolor aliquet interdum.
						</p>
						<p class="home-header-content__size">220m2</p>
					</div>
					<div class="home-header-content__price">
						<p class="home-header-content__price-text">$ 100.000.000</p>
					</div>
				</div>
			</div>
		</div>
		<div class="swiper-button swiper-button-prev"></div>
		<div class="swiper-button swiper-button-next"></div>

		<!-- Search Bar -->
		<!-- <div class="home-header-search-bar">
			<form class="home-header-search-bar__form" action="">
				<div class="home-header-search-bar__input-container">
					<input class="home-header-search-bar__input" type="text">
					<select class="home-header-search-bar__select" name="" id=""></select>
					<select class="home-header-search-bar__select" name="" id=""></select>
					<select class="home-header-search-bar__select" name="" id=""></select>
				</div>
				<div>
					<button class="home-header-search-bar__button" type="submit"></button>
				</div>
			</form>
		</div> -->
	</header>
	<main class="container">
		<section class="main-section featured-products swiper">
			<h2 class="section-title">Propiedades destacadas</h2>
			<div class="featured-products__card-list swiper-wrapper">

<?php 
$loop = new WP_Query( ['post_type' => 'propiedades', 'posts_per_page' => 10, 'orderBy' => ['date' => 'ASC']] );

function custom_field($field_name, $post_id = false){
	$value = get_field($field_name, $post_id);
	if(is_array($value)){
		$value = @implode(', ', $value);
	}
	return $value;
}

while($loop->have_posts()):
	$loop->the_post();
	echo '<a href='.get_permalink().'></a>';
?>
				<div class="swiper-slide">
					<div class="card featured-products__card">
						<div class="card__header">
							<div class="card__image-overlay"></div>
							<div class="card__image-container">
								<img class="card__image" src="/wp-content/themes/aseycor/assets/images/card-example.jpg" alt="" />
							</div>
							<?php //if(custom_field('propiedad_type') === 'venta') :  ?>
							<div class="card__header-tag " ><?php the_field('propiedad_type') ?></div>
							<div class="card__image-description">
								<i class="card__image-description-icon fa-solid fa-images"></i>
								<p class="card__image-description-text">20</p>
							</div>
						</div>
						<div class="card__body">
							<div class="card__title-container">
								<h3 class="card__title"><?php the_title() ?></h3>
							</div>
							<h4 class="card__price">
							<?php echo the_field('propiedad_uf') ? 'UF '. get_field('propiedad_price_uf') : '$ '. number_format(custom_field('propiedad_price'), 0, '','.') ?>
							</h4>
							<div class="card__tag" style="<?php echo custom_field('propiedad_type') === 'venta' ? 'visibility:hidden' : '' ?>">Mensual</div>
							<div class="card__info-container">
								<div class="card__info">
									<i class="card__info-icon fa-solid fa-bed"></i>
									<p class="card__info-text"><?php the_field('num_dormitorios') ?></p>
								</div>

								<div class="card__info">
									<i class="card__info-icon fa-solid fa-bath"></i>
									<p class="card__info-text"><?php the_field('num_banos') ?></p>
								</div>

								<div class="card__info">
									<i class="card__info-icon fa-solid fa-chart-area"></i>
									<p class="card__info-text"><?php the_field('area_propiedad') ?>m2</p>
								</div>
							</div>
						</div>
						<div class="card__footer">
							<i class="card__footer-icon fa-solid fa-location-dot"></i>
							<p class="card__footer-text"><?php the_field('propiedad_location') ?> </p>
						</div>
					</div>
				</div>
<?php echo '</a>' ?>
<?php endwhile; ?>

				
			</div>
			<div class="swiper-button swiper-button-prev"></div>
			<div class="swiper-button swiper-button-next"></div>

			<!-- If we need pagination -->
			<div class="swiper-pagination"></div>
		</section>

		<section class="main-section product">
			<!-- <h2 class="section-title">Propiedades destacadas?</h2> -->

			<div class="product-list">
<?php  
$mainLoop = new WP_Query( ['post_type' => 'propiedades', 'posts_per_page' => 20, 'orderBy' => ['date' => 'ASC']] );	
while($mainLoop->have_posts()) :
	$mainLoop->the_post();
?>
				<div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title"><?php the_title() ?></h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div>
<?php endwhile; ?>
				<!--div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title">Nombre de la propiedad de la lechuga de la ensalada del</h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div>
				<div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title">Nombre de la propiedad de la lechuga de la ensalada del</h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div>
				<div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title">Nombre de la propiedad de la lechuga de la ensalada del</h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div>
				<div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title">Nombre de la propiedad de la lechuga de la ensalada del</h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div>
				<div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title">Nombre de la propiedad de la lechuga de la ensalada del</h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div>
				<div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title">Nombre de la propiedad de la lechuga de la ensalada del</h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div>
				<div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title">Nombre de la propiedad de la lechuga de la ensalada del</h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div>
				<div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title">Nombre de la propiedad de la lechuga de la ensalada del</h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div>
				<div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title">Nombre de la propiedad de la lechuga de la ensalada del</h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div>
				<div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title">Nombre de la propiedad de la lechuga de la ensalada del</h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div>
				<div class="card">
					<div class="card__header">
						<div class="card__image-overlay"></div>
						<div class="card__image-container">
							<img class="card__image" src="assets/images/card-example.jpg" alt="" />
						</div>
						<div class="card__header-tag">Estado</div>
						<div class="card__image-description">
							<i class="card__image-description-icon fa-solid fa-images"></i>
							<p class="card__image-description-text">20</p>
						</div>
					</div>
					<div class="card__body">
						<div class="card__title-container">
							<h3 class="card__title">Nombre de la propiedad de la lechuga de la ensalada del</h3>
						</div>
						<h4 class="card__price">UF 5000</h4>
						<div class="card__tag">Mensual</div>
						<div class="card__info-container">
							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bed"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-bath"></i>
								<p class="card__info-text">1</p>
							</div>

							<div class="card__info">
								<i class="card__info-icon fa-solid fa-chart-area"></i>
								<p class="card__info-text">300m2</p>
							</div>
						</div>
					</div>
					<div class="card__footer">
						<i class="card__footer-icon fa-solid fa-location-dot"></i>
						<p class="card__footer-text">Direccion de la propiedad</p>
					</div>
				</div-->

			</div>
			<div class="product-list__button-container">
				<button class="product-list__button">Cargar mas resultados</button>
			</div>

		</section>

		<section class="main-section features">
			<h2 class="section-title">Caracteristicas</h2>
			<div class="features-list">
				<div class="features__item">
					<i class="fa-solid fa-"></i>
					<h4>Descripcion de la propiedad</h4>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores et libero ullam alias quam
						incidunt officiis pariatur deleniti, eveniet nisi!</p>
				</div>
				<div class="features__item">
					<i class="fa-solid fa-"></i>
					<h4>Descripcion de la propiedad</h4>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores et libero ullam alias quam
						incidunt officiis pariatur deleniti, eveniet nisi!</p>
				</div>
				<div class="features__item">
					<i class="fa-solid fa-"></i>
					<h4>Descripcion de la propiedad</h4>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores et libero ullam alias quam
						incidunt officiis pariatur deleniti, eveniet nisi!</p>
				</div>
			</div>
		</section>

	</main>
	<div class="full-banner--dark">
		<img src="https://via.placeholder.com/1440x600" alt="" class="full-banner__image">
		<div class="full-banner__content--left">
			<h5 class="full-banner__epigraph">TITULO DEL BANNER</h5>
			<h2 class="full-banner__title">TITULO DEL BANNER</h2>
			<p class="full-banner__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum
				dui erat.</p>
				<button class="full-banner__button">Texto del boton</button>
		</div>
	</div>

	<footer class="footer">
		<div class="footer__content">
			<div class="footer__section footer-logo">
				<div class="footer-logo__image-container">
					<img class="footer-logo__image" src="/wp-content/themes/aseycor/assets/images/logo-transparent.png" alt="">
				</div>
				<p class="footer-logo__description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea illo
					cumque illum, hic alias laborum esse! Sint voluptatum facere laudantium?</p>
			</div>
			<div class="footer__section footer-body">
				<div class="footer-body__item">
					<h3 class="footer-body__title">Información de contacto</h3>
					<ul class="footer-body-list">
						<li class="footer-body-list__item">
							<i class="footer-body-list__icon fa-solid fa-envelope"></i>
							<p href="" class="footer-body-list__text">contacto@aseycor.cl</p>
						</li>
						<li class="footer-body-list__item">
							<i class="footer-body-list__icon fa-solid fa-phone"></i>
							<p href="" class="footer-body-list__text">+56 9 1234 5678</p>
						</li>
					</ul>
				</div>
				<div class="footer-body__item">
					<h3 class="footer-body__title">Redes sociales</h3>
					<ul class="footer-body-list--icons">
                        <li class="footer-body-list__item--icons">
                            <a href="https://www.youtube.com" class="footer-body-list__link" target="_blank">
                                <i class="footer-body-list__icon fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="footer-body-list__item--icons">
                            <a href="https://www.youtube.com" class="footer-body-list__link" target="_blank">
                                <i class="footer-body-list__icon fa-brands fa-twitter"></i>
                            </a>
                        </li>
                        <li class="footer-body-list__item--icons">
                            <a href="https://www.youtube.com" class="footer-body-list__link" target="_blank">
                                <i class="footer-body-list__icon fa-brands fa-linkedin-in"></i>
                            </a>
                        </li>
                        <li class="footer-body-list__item--icons">
                            <a href="https://www.youtube.com" class="footer-body-list__link" target="_blank">
                                <i class="footer-body-list__icon fa-brands fa-youtube"></i>
                            </a>
                        </li>
                        <li class="footer-body-list__item--icons">
                            <a href="https://www.youtube.com" class="footer-body-list__link" target="_blank">
                                <i class="footer-body-list__icon fa-brands fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
				</div>
			</div>
		</div>
		<div class="footer__bottom">ASEyCOR 2022</div>
	</footer>

	<?php get_footer() ?>