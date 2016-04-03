<?php echo add_jscript('tiny.editor.packed');?>
<?php echo add_jscript('jquery.multi-select');?> 
<?php echo add_jscript('jquery.confirm');?>  
<?php echo add_style('multi-select');?>  
<?php echo add_style('edit');?>
<style type="text/css">
	.glyphicon-trash{
		font-size:16px;
		width: 100%;
		background-color:#ddd;
		padding:10px 0;
		color:#f00; 
		display: block;
		text-align: center;
		font-weight: bold;
		cursor: pointer;
	}
</style>
<script type="text/javascript">
$(document).ready(function(){
	var max_chars = 100;

    $('#max').html(max_chars);

    $('#small-description').keyup(function() {
        var chars = $(this).val().length;
        var diff = max_chars - chars;
        $('#contador').html(diff);   
    });
	
	$('#categorias').multiSelect({    
		afterSelect: function(){
			checked($('#categorias').val());
	    },
	    afterDeselect: function(){
			checked($('#categorias').val());
	    }
	});
	
	$(".glyphicon-trash").click(function(){
		var id = $(this).attr('rel');
		$.confirm({
                text: "Desea eliminar esta fotos?",
                title: "Por favor, elija una opción",
                confirm: function(button) {
                   fotos_delete(id);
                },
                cancel: function(button) {
                    
                },
                confirmButton: "Si",
                cancelButton: "No",
                post: true,
                confirmButtonClass: "btn-danger",
                cancelButtonClass: "btn-default",
                dialogClass: "modal-dialog"                     
            });
		
	});
	<?php if(!in_array(10,$selected_categorias)){?>
	$("#fotos").hide();
	<?php } ?>
	
});

function checked(categorias){
	var array = categorias.toString().split(',');
	$.each( array, function( i, val ){
		if(val == 10){
			$("#fotos").show();
		}
		
	});
}
function fotos_delete(id){
	$.post('<?=base_url('admin/fotos_delete')?>',{id:id},function(){
		$("#"+id).remove().fadeOut();
	});	
}
</script>
<div class="panel panel-default">
	<div class="panel-heading">
	<div class="row">
		<div class="col-md-10"><h3 class="panel-title">Agregar Producto</h3></div>
		<div class="col-md-2 text-right"><a href="<?=base_url('admin/productos')?>" class="btn btn-default">Volver</a></div>
	</div>
	  
	  
	</div>
	<div class="panel-body">

		<!-- aca contenido de la seccion-->
		<form method="post" action="" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" value="<?=$product->nombre?>" class="form-control" id="nombre" name="nombre" placeholder="Name">
				</div>
			</div>			
			<div class="col-md-6">
				<div class="form-group">
				    <label for="fileimage">Marca</label>
				    <select class="form-control" name="marca_id">
				    	<option value =" ">seleccione</option>
				    	<?php foreach ($marcas->result() as $marca) {?>
				    		<option value ="<?=$marca->id?>" <?=($marca->id == $product->marca_id)? "selected":""?>><?=$marca->nombre?></option>
				    	<? } ?>   	
				    </select>
			  	</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
				    <label for="descripcion">Descripción</label>
				    <textarea id="tinyeditor" style="width: 800px; height: 200px" name="descripcion"><?=$product->descripcion?></textarea>				  
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label><h4>Pequeña descripción</h4> </label>
					<small>(100 caracteres máximo)</small>
					<textarea class="form-control" id="small-description" name="copete" maxlength="100" ><?=$product->copete?></textarea>
					<div>Quedan <span id="contador">100</span>caracteres</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label  for="fileimage"><h4>Categorias</h4></label>
					<select multiple class="form-control" name="categoria_id[]" id="categorias" required>
						<?php foreach ($categorias->result() as $categoria) {?>
							<option value ="<?=$categoria->id?>" 
							<?=(in_array($categoria->id,$selected_categorias))? "selected":""?>  >
							<?=$categoria->descripcion?>
							</option>
						<? } ?>   	
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12"><h4>Archivos del producto</h4></div>
			<div class="col-md-12"><hr></div>

			<div class="col-md-6">	
				<div class="form-group">
				    <label for="filedatasheet">Datasheet <a href="<?=base_url('files/pdf/'.$product->id."/".$product->file_pdf)?>" target="_blank"> Ver pdf</a></label>
				    <input type="file" id="filedatasheet" name="file_pdf" accept="application/pdf" >
				    <p class="help-block">Formato: PDF</p>
			  	</div>

				<div class="form-group">
					<label>Imágen principal</label><a href="<?=base_url('files/images/'.$product->id."/".$product->file_img)?>" target="_blank"> Ver Imagen</a>
					<input type="file" id="fileimage" name="file1_jpg" accept="image/*" >
					<p class="help-block">Formato: JPG, PNG</p>
				</div>
				<div class="form-group" id="fotos">
				    <label for="fileimage">Más imágenes</label>
				    <input type="file" id="fileimage" name="file_jpg[]" accept="image/*" multiple="multiple">
				    <p class="help-block">Formato: JPG, PNG</p>
			  	</div>  			
			</div>
			
			
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label><h4>Foto Principal</h4></label>
					<div class="row">
						<div class="col-md-12">
							<?php if(!empty($product->file_img)){ ?>
								<ul style="list-style:none;padding:0;">
									<li class="ui-state-default admin-img-box thumbnail" id="0">					
										<img src="<?=base_url('/files/images/'.$product->id.'/'.$product->file_img);?>" class="img-responsive">		
									</li>
								</ul>
							<?php } ?>
						</div>

					</div>
					
				</div>
			</div>
			<div class="col-md-9">
				<div class="col-md-12">
					<label><h4>Fotos del Producto</h4></label>
				</div>
				<div  >
										
						<ul style="list-style:none;padding:0;">
						
								<?php foreach ($fotos->result() as $value) {?>
									<li class="ui-state-default col-md-2 admin-img-box thumbnail" id="<?=$value->id?>">					
										<img src="<?=base_url('/files/images/'.$product->id.'/'.$value->filename);?>" class="img-responsive">
										<span class="glyphicon glyphicon glyphicon-trash" rel="<?=$value->id?>"></span>			
									</li>
								<?}?>
							
						</ul>
						
					</div>
			</div>			
			
		</div>
		<div class="row">
			<div class="col-md-12"><hr></div>
			<div class="col-md-12 text-right"><button type="submit" class="btn btn-default" onClick="editor.post();" >Guardar</button></div>
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