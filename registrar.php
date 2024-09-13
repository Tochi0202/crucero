<?php
include 'conexion.php';
include 'header.php';
?>
<div id="at-homeslider-holder" class="at-homeslider-holder at-haslayout">
	<div class="at-homeslider">
	<div id="at-homeslidervone" class="at-homeslidervone owl-carousel">
		<figure class="item"><img src="images/slider-imgs/img-01.jpg" alt="slider img"></figure>
		<figure class="item"><img src="images/slider-imgs/img-02.jpg" alt="slider img"></figure>
		<figure class="item"><img src="images/slider-imgs/img-05.jpg" alt="slider img"></figure>
		<figure class="item"><img src="images/slider-imgs/img-08.jpg" alt="slider img"></figure>
	</div>
	<div id="at-homeslider-thumbnail" class="at-homeslider-thumbnail owl-carousel">
		<div class="item at-thumbnail-content">
			<h3><em>01.</em><span>Start Your Day in</span>Birmingham</h3>
			<a href="javascript:void(0);" class="at-btn at-btnactive">Start Exploring</a>
		</div>
		<div class="item at-thumbnail-content">
			<h3><em>02.</em><span>Luxury House in</span>Beautiful Forest</h3>
			<a href="javascript:void(0);" class="at-btn at-btnactive">Start Exploring</a>
		</div>
		<div class="item at-thumbnail-content">
			<h3><em>03.</em><span>Enjoy Your Holiday in</span>United Emirates</h3>
			<a href="javascript:void(0);" class="at-btn at-btnactive">Start Exploring</a>
		</div>
		<div class="item at-thumbnail-content">
			<h3><em>04.</em><span>Start Your Day in</span>Birmingham</h3>
			<a href="javascript:void(0);" class="at-btn at-btnactive">Start Exploring</a>
		</div>
	</div>
	</div>
	<div class="at-home-banner at-home-bannervone at-haslayout">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="at-slider-content">
				<div class="at-title">
					<h2><span>Registro de Cliente</h2>
				</div>
				<div class="at-formtheme at-formbanner">
					<fieldset class="at-guestsform">
						<legend class="at-formtitle">Nombre</legend>
						<input type="text" name="nombre" id="nombre" class="form-control">
					</fieldset>
					<fieldset class="at-guestsform">
						<legend class="at-formtitle">Apellido Paterno</legend>
						<input type="text" name="apepat" id="apepat" class="form-control">
					</fieldset>
					<fieldset class="at-guestsform">
						<legend class="at-formtitle">Apellido Materno</legend>
						<input type="text" name="apemat" id="apemat" class="form-control">
					</fieldset>
					<fieldset class="at-guestsform">
						<legend class="at-formtitle">DNI</legend>
						<input type="text" name="dni" id="dni" class="form-control">
					</fieldset>
					<fieldset class="at-guestsform">
						<legend class="at-formtitle">Correo</legend>
						<input type="email" name="correo" id="correo" class="form-control">
					</fieldset>
					<fieldset class="at-guestsform">
						<legend class="at-formtitle">Fecha de Nacimiento</legend>
						<input type="date" name="fecnac" id="fecnac" class="form-control">
					</fieldset>
					<fieldset class="at-guestsform">
						<input type="submit" id="enviar" class="btn btn-block btn-danger" value="Enviar datos">
					</fieldset>
				</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<script>
	function calcularEdad(fecha) {
		var hoy = new Date();
		var cumpleanos = new Date(fecha);
		var edad = hoy.getFullYear() - cumpleanos.getFullYear();
		var m = hoy.getMonth() - cumpleanos.getMonth();

		if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
			edad--;
		}

		return edad;
	}
</script>
<script>
	$(document).ready(function(){
		$("#enviar").click(function(){
			var nombre = $("#nombre").val();
			var apepat = $("#apepat").val();
			var apemat = $("#apemat").val();
			var dni = parseInt($("#dni").val());
			var correo = $("#correo").val();
			var fecnac = $("#fecnac").val();
			var fecharest = calcularEdad(fecnac);

			if (fecharest > 18) {
				$.ajax({
					type:"POST",
					url:"http://localhost/crucero/insertar_reserva.php",
					dataType: "json",
					data:{
						nombre:nombre,
						apepat:apepat,
						apemat:apemat,
						dni:dni,
						correo:correo,
						fecnac:fecnac
					}, 
					success:function(data){
						console.log(data);
						if (data['error'] == 0) {
							swal(
								'Excelente',
								data['message'],
								'success'
							);
						}else{
							swal(
								'Error',
								data['message'],
								'error'
							);
						}
					}
				})
			}else{
				swal(
					'Error',
					'Eres menor de edad , por lo tanto no puedes registrar tu reserva',
					'error'
				);
			}
		});
	});
</script>
<?php 
include 'footer.php';
?>