<?php echo add_jscript('tiny.editor.packed');?>
<?php echo add_jscript('jquery.multi-select');?>   
<?php echo add_style('multi-select');?>  
<?php echo add_style('edit');?>
<script type="text/javascript">
var base_url = '<?=base_url()?>';
$(document).ready(function(){
	$('#categorias').multiSelect({
	  selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='categoria'>",
	  selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='categoria'>",
	  afterInit: function(ms){
	    var that = this,
	        $selectableSearch = that.$selectableUl.prev(),
	        $selectionSearch = that.$selectionUl.prev(),
	        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
	        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

	    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
	    .on('keydown', function(e){
	      if (e.which === 40){
	        that.$selectableUl.focus();
	        return false;
	      }
	    });

	    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
	    .on('keydown', function(e){
	      if (e.which == 40){
	        that.$selectionUl.focus();
	        return false;
	      }
	    });
	  },
	  afterSelect: function(){
	    this.qs1.cache();
	    this.qs2.cache();
	  },
	  afterDeselect: function(){
	    this.qs1.cache();
	    this.qs2.cache();
	  }
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
				    <input type="file" id="fileimage" name="file_jpg[]" multiple="multiple" accept="image/*" >
				    <p class="help-block">Formato: JPG, PNG</p>
			  	</div>
				  <button type="submit" class="btn btn-default" onClick="editor.post();" >Guardar</button>
			
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
				
				<div class="form-group">
					<label  for="fileimage">categorias</label>
					<select multiple class="form-control" name="categoria_id[]" id="categorias" required>
						<?php foreach ($categorias->result() as $categoria) {?>
							<option value ="<?=$categoria->id?>"><?=$categoria->descripcion?></option>
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