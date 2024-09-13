<?php
include 'conexion.php';
include 'header.php';
?>
<style>
	.at-navigationarea {
		background-color: black !important;
	}
</style>
<div id="at-homeslider-holder" class="at-homeslider-holder at-haslayout">
	<div class="at-homeslider">
		<div id="at-homeslidervone" class="at-homeslidervone owl-carousel">
		</div>
	</div>
</div>
<main id="at-main" class="at-main at-haslayout">
	<!-- Recommended Section Start -->
	<section class="at-haslayout at-main-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-sm-12 col-md-12 push-md-0 col-lg-10 push-lg-1 col-xl-8 push-xl-2">
				<div class="at-sectionhead">
					<br>
				<div class="at-sectiontitle">
					<h2>Destinos para Ti</h2>
				</div>
				<div class="at-description">
					<p>Encuentra los mejores destinos en crucero para ti en nuestra agencia.</p>
				</div>
				</div>
			</div>
			<div class="at-recommended-gallery at-haslayout">
				<?php
				$query = $conn->query ("SELECT * FROM destino");
				while ($valores = mysqli_fetch_array($query)) { ?>
					<div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left">
						<div class="tr-trip-imgs">
							<figure>
								<a href="javascript:void(0)">
								<img src="<?php echo $valores['des_img'] ?>" alt="img description">
								</a>
								<figcaption>
									<div class="at-trip-content">
									<h3><?php echo $valores['des_descri'] ?></h3>
									<h4>S/. <?php echo $valores['des_prec'] ?></h4>
									</div>
								</figcaption>
							</figure>
						</div>
					</div>
				<?php }
				?>
			</div>
		</div>
	</div>
	</section>
	<!-- Recommended Section Start -->
</main>
<?php 
include 'footer.php';
?>