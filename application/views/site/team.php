<script type="text/javascript">
	$(document).ready(function(){
		$('.title-black').addClass('fadeInLeft').fadeIn('slow');
		setTimeout(function(){
			$('.title-orange').addClass('fadeInLeft').fadeIn('slow');
		}, 200);
		setTimeout(function(){
			$('.text').addClass('fadeInLeft').fadeIn('slow');
		}, 400);


		$('#fileForm').formValidation({
		       framework: 'bootstrap',
		       icon: {
		           valid: 'glyphicon glyphicon-ok',
		           invalid: 'glyphicon glyphicon-remove',
		           validating: 'glyphicon glyphicon-refresh'
		       },
		       fields: {
		           avatar: {
		               validators: {
		                   file: {
		                       extension: 'doc,pdf',
		                       type: 'application/msword,application/pdf',
		                       message: 'Solo documentos o pdf'
		                   }
		               }
		           }
		       }
		   });

	});


</script>
<div class="row team">
	<div class="col-md-3">
		<div class="title-black animated animate-hide">NUESTRO ORGULLO:</div>
		<div class="title-orange animated animate-hide">NUESTRO EQUIPO</div>
		<div class="text animated animate-hide">
		<p>Lo más importante que tenemos en nuestra compañía es el <b>equipo humano</b> que la integra y le da vida día a día.<br />Si desea ser parte de <b>RAIEN ARGENTINA</b>, envíenos su CV a: <a href="mailto:rrhh@raien.com.ar">rrhh@raien.com.ar</a>.</p>

		<p>Sus datos serán almacenados en nuestra base de datos y lo estaremos contactando cuando surja una búsqueda acorde a su perfil.</p>

		<p class="orange">Muchas gracias por su interés en&nbsp;RAIEN.</p>
		</div>
	</div>
	<div class="col-md-9">
		<?php if(!empty($insert)){?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			   <?=$insert?>
			</div>
		<?php } ?>
		<div>
			<form action=""  class="form-horizontal" method="post" enctype="multipart/form-data" id="fileForm">
			  <div class="form-group">
			  	<div class="col-md-12">
				    <label for="nombre">Nombre y apellido*</label>
				    <input type="text" class="form-control required" name="nombre" id="nombre" required>
				  </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-md-6">
				    <label for="telefono">Teléfono*</label>
				    <input type="text" class="form-control required"  name="telefono" id="telefono" required>
				  </div>
				  <div class="col-md-6">
				    <label for="mail">Mail*</label>
				    <input type="text" class="form-control required" name="email" id="email" required>
				  </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-md-6">
			  		<div>Subir curriculum</div>
				    <input id="uploadFile" placeholder="Seleccione archivo"  disabled="disabled" />
					<div class="fileUpload btn btn-primary">
					    <span><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></span>
					    <input id="uploadBtn"
					    type="file"
					     name="myFile"
					     class="upload"
					     required  accept=",.doc, .docx,application/pdf"/>

					</div>
				  </div>
				  <div class="col-md-6">
				  	<div>&nbsp;</div>
				    <button type="submit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviar</button>
				  </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-md-12">
				    <div>Los campos con asteriscos (*) son obligatorios.</div>
				  </div>
			  </div>
			</form>
		</div>
	</div>
</div>
