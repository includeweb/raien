<?php echo add_jscript('tiny.editor.packed');?>
<?php echo add_jscript('jquery.multi-select');?>   
<?php echo add_style('multi-select');?>  
<?php echo add_style('edit');?>
<script type="text/javascript">
$(document).ready(function(){
	$('#categorias').multiSelect(); 
	
	var max_chars = 100;

    $('#max').html(max_chars);

    $('#small-description').keyup(function() {
        var chars = $(this).val().length;
        var diff = max_chars - chars;
        $('#contador').html(diff);   
    });
	
});
</script>
<div class="panel panel-default">
	<div class="panel-heading">
	<div class="row">
		<div class="col-md-10"><h3 class="panel-title">Agregar Producto</h3></div>
		<div class="col-md-2 text-right"><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-default">Volver</a></div>
	</div>
	  
	  
	</div>
	<div class="panel-body">
		<!-- aca contenido de la seccion-->
		<form method="post" action="" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-5">
				
				  <div class="form-group">
				    <label for="nombre">Nombre</label>
				    <input type="text" class="form-control" id="nombre" name="name" placeholder="Name" required > 
				  </div>
				  	
				 
				
				
			
			</div>

			

			<div class="col-md-4">
				<div class="form-group">
				    <label for="fileimage">Marca</label>
				    <select class="form-control" name="marca_id" required>
				    	<?php foreach ($marcas->result() as $marca) {?>
				    		<option value ="<?=$marca->id?>"><?=$marca->nombre?></option>
				    	<? } ?>   	
				    </select>
			  	</div>
				
				
				
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			  <div class="form-group">
			    <label for="descripcion">Descripción</label>
			    <textarea id="tinyeditor" style="width: 100%; height: 200px" name="description"></textarea>
			  </div>
			</div>
			<div class="col-md-12">
			  <div class="form-group">
			    <label for="descripcion">Pequeña descripción</label> <small>Máximo 100 caracteres</small>
			    <textarea id="small-description" class="form-control" name="copete" ></textarea>
			  </div>
			  <div>Quedan <span id="contador">100</span>caracteres</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
			  <div class="form-group">
					<label  for="fileimage">Categorías</label>
					<select multiple class="form-control" name="categoria_id[]" id="categorias" required>
						<?php foreach ($categorias->result() as $categoria) {?>
							<option value ="<?=$categoria->id?>"><?=$categoria->descripcion?></option>
						<? } ?>   	
					</select>
				</div>
			</div>
			<div class="col-md-6">
			   <div class="form-group">
				    <label for="filedatasheet">Datasheet</label>
				    <input type="file" id="filedatasheet" name="file_pdf" accept="application/pdf" >
				    <p class="help-block">Formato: PDF</p>
			  	</div>
			  	<div class="form-group">
				    <label for="fileimage">Imágen</label>
				    <input type="file" id="fileimage" name="file_jpg[]" multiple="multiple" accept="image/*" >
				    <p class="help-block">Formato: JPG, PNG</p>
			  	</div>
			</div>
			<div class="col-md-12 text-right">  <button type="submit" class="btn btn-default" onClick="editor.post();" >Guardar</button></div>
		</div>
	</form>
		<!-- / fin contenido -->
	</div>
</div>
<script>
var editor = new TINY.editor.edit('editor', {
	id: 'tinyeditor',
	width: 584,
	height: 175,
	cssclass: 'tinyeditor',
	controlclass: 'tinyeditor-control',
	rowclass: 'tinyeditor-header',
	dividerclass: 'tinyeditor-divider',
	controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
		'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
		'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
		'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
	footer: true,
	fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
	xhtml: true,
	cssfile: 'custom.css',
	bodyid: 'editor',
	footerclass: 'tinyeditor-footer',
	toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
	resize: {cssclass: 'resize'}
});
</script>