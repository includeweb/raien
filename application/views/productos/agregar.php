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
		  <li><a href="#">Home</a></li>
		  <li><a href="#">Library</a></li>
		  <li class="active">Data</li>
		</ol>
		<!-- aca contenido de la seccion-->
		<div class="row">
			<div class="col-md-8">
				<form method="post" action="#">
				  <div class="form-group">
				    <label for="nombre">Nombre</label>
				    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Email">
				  </div>
				  <div class="form-group">
				    <label for="descripcion">Descripción</label>
				    <textarea id="tinyeditor" style="width: 400px; height: 200px"></textarea>
				    
				  </div>
				  <button type="submit" class="btn btn-default">Guardar</button>
				</form>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				    <label for="filedatasheet">Datasheet</label>
				    <input type="file" id="filedatasheet">
				    <p class="help-block">Formato: PDF</p>
			  	</div>
			  	<div class="form-group">
				    <label for="fileimage">Imagen</label>
				    <input type="file" id="fileimage">
				    <p class="help-block">Formato: JPG, PNG</p>
			  	</div>
			</div>
		</div>

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