<?php echo add_jscript('tiny.editor.packed');?>
<?php echo add_style('edit');?>
<div class="panel panel-default">
	<div class="panel-heading">
	<div class="row">
		<div class="col-md-10"><h3 class="panel-title">Agregar Producto</h3></div>
		<div class="col-md-2 text-right"><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-default">Volver</a></div>
	</div>
	  
	  
	</div>
	<div class="panel-body">
	   <ol class="breadcrumb">
		  <li><a href="<?=base_url();?>admin">Dashboard</a></li>
		  <li><a href="<?=base_url();?>admin/productos">Productos</a></li>
		  <li class="active">Agregar producto</li>
		</ol>
		<!-- aca contenido de la seccion-->
		<form method="post" action="" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-5">
				
				  <div class="form-group">
				    <label for="nombre">Nombre</label>
				    <input type="text" class="form-control" id="nombre" name="name" placeholder="Name">
				  </div>
				  <div class="form-group">
				    <label for="descripcion">Descripción</label>
				    <textarea id="tinyeditor" style="width: 400px; height: 200px" name="description"></textarea>
				    
				  </div>
				 
				 <div class="form-group">
				    <label for="filedatasheet">Datasheet</label>
				    <input type="file" id="filedatasheet" name="file_pdf" accept="application/pdf" >
				    <p class="help-block">Formato: PDF</p>
			  	</div>
			  	<div class="form-group">
				    <label for="fileimage">Imagen</label>
				    <input type="file" id="fileimage" name="file_jpg" accept="image/*" >
				    <p class="help-block">Formato: JPG, PNG</p>
			  	</div>
				  <button type="submit" class="btn btn-default" onClick="editor.post();" >Guardar</button>
			
			</div>
			<div class="col-md-4">

				<div class="form-group">
				    <label for="fileimage">Tipo</label>
				    <select class="form-control" name="type_id">
				    	<?php foreach ($types->result() as $type) {?>
				    		<option value ="<?=$type->id?>"><?=$type->name?></option>
				    	<? } ?>   	
				    </select>
				    
			  	</div>
			</div>
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