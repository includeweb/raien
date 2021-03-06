<script type="text/javascript">
$(document).ready(function(){
	$('.title-black').addClass('fadeInLeft').fadeIn('slow');
		setTimeout(function(){
			$('.p1').addClass('fadeInLeft').fadeIn('slow');
		}, 200);
		setTimeout(function(){
			$('.p2').addClass('fadeInLeft').fadeIn('slow');
		}, 400);
		setTimeout(function(){
			$('.p3').addClass('fadeInLeft').fadeIn('slow');
		}, 600);
		

	$("#submit").click(function(e){
		
		if($('#my_form')[0].checkValidity()){
			e.preventDefault();
			var nombre = $("#nombre").val();
			var empresa = $("#empresa").val();
			var direccion = $("#direccion").val();
			var ciudad = $("#ciudad").val();
			var pais = $("#pais").val();
			var telefono = $("#telefono").val();
			var email = $("#email").val();
			var consulta = $("#consulta").val();
			$.post('<?=base_url("show/add_contact")?>',
				{
					nombre:nombre,
					empresa:empresa,
					direccion:direccion,
					ciudad:ciudad,
					pais:pais,
					telefono:telefono,
					email:email,
					consulta:consulta
				},
				function(){
					alert("Se envio su consulta en breve nos comunicaremos con usted");
					$('#my_form')[0].reset();
				});

		}
		
	});
});
</script>

<div class="row">
	<div class="col-md-3">
		<div class="title-black animated animate-hide">Contactanos</div>
		<p class="p1 animated animate-hide">Contáctenos para obtener más infor-mación o solicitar cotizaciones. A la brevedad, un representante de <b class="orange">RAIEN</b> se estará comunicando con usted.<br />Si desconoce el producto adecuado para su aplicación, describa el tipo de producto e incluya un resumen de la aplicación. Nosotros lo guiaremos para encontrar precisamente lo que está necesitando.</p>

		<p class="p2 animated animate-hide"><b class="orange">OFICINAS EN ARGENTINA</b><br />
		CAPITAL FEDERAL<br />
		Congreso 2171, piso 6 (C1428BVE)<br />
		Tel: + 5411 4701-9316<br />
		(VER EN MAPA)</p>

		<p class="p3 animated animate-hide"><b class="orange">OFICINAS EN CHILE</b><br />
		VIÑA DEL MAR<br />
		1 Norte 461, Oficina 408<br />
		Mesa Central: 56 32 2973672</p>
	</div>
	<div class="col-md-9">
		<div>
			<form class="form-horizontal" id="my_form">
			  <div class="form-group">
			  	<div class="col-md-12">
				    <label for="nombre">Nombre y apellido*</label>
				    <input type="text" class="form-control " required id="nombre">
				  </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-md-6">
				    <label for="empresa">Empresa*</label>
				    <input type="text" class="form-control " required id="empresa">
				  </div>
				  <div class="col-md-6">
				    <label for="direccion">Dirección</label>
				    <input type="text" class="form-control " required id="direccion">
				  </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-md-6">
				    <label for="ciudad">Ciudad</label>
				    <input type="text" class="form-control " required id="ciudad">
				  </div>
				  <div class="col-md-6">
				    <label for="pais">País</label>
				    <input type="text" class="form-control " required id="pais">
				  </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-md-6">
				    <label for="telefono">Teléfono*</label>
				    <input type="text" class="form-control " required id="telefono">
				  </div>
				  <div class="col-md-6">
				    <label for="mail">Mail*</label>
				    <input type="text" class="form-control " required id="email">
				  </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-md-12">
				    <label for="consulta">Consulta</label>
				    <textarea class="form-control " required id="consulta" rows="3"></textarea>
				  </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-md-6">
				    <div>Los campos con asteriscos (*) son obligatorios.</div>
				  </div>
				  <div class="col-md-6">
				    <button type="submit" id="submit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviar</button>
				  </div>
			  </div>
			</form>
		</div>
	</div>
</div>
