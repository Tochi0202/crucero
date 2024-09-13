<?php
include 'conexion.php';
include 'header.php';
?>
<div id="at-homesilder-holder" class="at-homeslider-holder at-haslayout">
	<div class="at-homeslidervideo">
	<video autoplay loop muted>
		<source src="images/video.mp4" type="video/mp4">
		<source src="images/video.mp4" type="video/ogg">
	</video>
	</div>
	<div class="at-home-banner at-home-banner-two at-haslayout">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-12 push-md-0 col-lg-10 push-lg-1 col-xl-8 push-xl-2">
				<div class="at-slider-header">
					<div class="at-title">
						<h1>Reservar</h1>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-12 col-xl-11 push-xl-1">
				<div class="at-slider-content">
					<div class="at-title">
						<h4>Solicitar Reserva</h4>
					</div>
					<div class="row">
						<div class="col-12 col-md-12 col-lg-6 float-left">
							<div class="at-formtheme at-formbanner">
								<fieldset class="at-datetime">
								<div class="form-group">
									<div class="at-select">
										<select id="destiid">
											<option value="" hidden>Seleccione destino</option>
											<?php
												$query = $conn->query ("SELECT * FROM destino");
												while ($valores = mysqli_fetch_array($query)) {
													echo '<option value="'.$valores['des_id'].'">'.$valores['des_descri'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								</fieldset>
								<fieldset class="at-guestsform">
										<legend class="at-formtitle">DNI del usuario</legend>
										<input type="text" name="dni" id="dni" class="form-control">
										<input type="hidden" name="idcliente" id="idcliente" class="form-control">
								</fieldset>
								<fieldset class="at-guestsform">
										<button class="btn btn-block btn-danger" id="enviar">Registrar Reserva</button>
								</fieldset>
							</div>
						</div>
						<div class="col-12 col-md-12 col-lg-6 float-left">
							<div class="at-formtheme at-formbanner">
								<fieldset class="at-roomform">
									<fieldset class="at-guestsform">
										<legend class="at-formtitle">Nombre del Cliente</legend>
										<input type="text" name="nombre" id="nombre" class="form-control" disabled>
									</fieldset>
									<fieldset class="at-guestsform">
										<legend class="at-formtitle">Apellido Paterno</legend>
										<input type="text" name="apepat" id="apepat" class="form-control" disabled>
									</fieldset>
									<fieldset class="at-guestsform">
										<legend class="at-formtitle">Apellido Materno</legend>
										<input type="text" name="apemat" id="apemat" class="form-control" disabled>
									</fieldset>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$("#dni").blur(function(){
			var dni = $("#dni").val();
			$.ajax({
					type:"POST",
					url:"http://localhost/crucero/sel_cliente.php",
					dataType: "json",
					data:{
						dni:dni
					}, 
					success:function(data){
						if (data.length > 0 ) {
							swal(
								'Excelente',
								'SE ENCONTRARON DATOS CON EL DNI',
								'success'
							);
							$("#idcliente").val(data[0]['cli_id']);
							$("#nombre").val(data[0]['cli_nomb']);
							$("#apepat").val(data[0]['cli_apepat']);
							$("#apemat").val(data[0]['cli_apemat']);
						}else{
							swal(
								'Error',
								'NO SE ENCONTRARON DATOS , PORFAVOR REGISTRARSE',
								'error'
							);
							$("#idcliente").val("");
							$("#nombre").val("");
							$("#apepat").val("");
							$("#apemat").val("");
						}

					}
			});
		});

		$("#enviar").click(function(){
			var destiid = $("#destiid").val();
			var idcliente = $("#idcliente").val();
			$.ajax({
				type:"POST",
				url:"http://localhost/crucero/reservar_registro.php",
				dataType: "json",
				data:{
					destiid:destiid,
					idcliente:idcliente
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
		});
	});
</script>
<?php 
include 'footer.php';
?>