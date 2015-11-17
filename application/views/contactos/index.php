 <?php echo add_jscript('jquery.confirm');?>
<script type="text/javascript">
$(document).ready(function(){
	actualizar();

	var timeout; 

	$('#buscador').keyup(function() { 
	    if(timeout) { 
	        clearTimeout(timeout); 
	        timeout = null;
	    }

	    timeout = setTimeout(function() {
	 		actualizar();
	 }, 100); 
	});

	$("#result").change(function(){
		actualizar();
	});

	$("#exportar").click(function(){
		//exportar();
		$("#my_form").submit();

	});

	$("body").on('click','.glyphicon-remove', function(){
		var product_id = $(this).attr('rel');
		$.confirm({
		    text: "Esta seguro que desea borrar el producto?",
		    title: "Borrar producto",
		    confirm: function(button) {
		        delete_product(product_id);
		    },
		    cancel: function(button) {
		        
		    },
		    confirmButton: "Si",
		    cancelButton: "No",
		    post: true,
		    confirmButtonClass: "btn-success",
		    cancelButtonClass: "btn-default",
		    dialogClass: "modal-dialog" 					
		});
	})
});

function delete_product(product_id){
	$.post('<?=base_url("dashboard/delete")?>',{product_id:product_id},function(data){
		$("#"+product_id).remove().fadeOut();	
	});
}

function actualizar(){
	total_resultados();
	var data = $('#buscador').val().toLowerCase();
	var result = $("#result").val();
		$.ajax({
			url: "<?=base_url('dashboard/list_products')?>",
			data: {valor:data,result:result}, 
			type: "POST",
			datatype: 'json',
			success: function(data){
				$("#contenido").html('');
				products = JSON.parse(data);
				$.each(products, function(i, value){
					
					$("#contenido").append("<tr id=\""+ value.id +"\"><td>" + value.id +
					 "</td><td>" + value.name + 
					 "</td><td>" + value.description + 
					 "</td><td>" + value.type + 
					 "</td><td><a href='<?=base_url('files/pdf/"+value.id+"')?>/"+ value.file_pdf +"' target=\"_blank\" title=\"Ver pdf\"><span class='glyphicon glyphicon-file'></span></a>					 </td><td>" + value.file_img + 
					 "</td><td><a href=\"javascript:void(0);\"  rel=\""+ value.id +"\" class=\"glyphicon glyphicon-remove\"></a><a href=\"<?=base_url('dashboard/editar_producto/" + value.id + "')?>\" class=\"glyphicon glyphicon-pencil\"></a> </td></tr>").fadeIn();
				});     
			}  
		});
	} 

	function total_resultados(){
		var data = $('#buscador').val().toLowerCase();
		$.post("<?=base_url('dashboard/result')?>", 
				{valor:data},
				function(data){
					$("#resultados").html(data).fadeIn("slow");
				}
			);
	}

</script>

<div class="panel panel-default">
	<div class="panel-heading">
	<div class="row">
		<div class="col-md-10"><h3 class="panel-title fix-title">Contactos</h3></div>
		
	</div>
	  
	  
	</div>
	<div class="panel-body">
	<div class="row">
		<form id="my_form" method="POST" action="<?=base_url('dashboard/obtener_xls')?>" >
			
			<div class="col-md-3 pull-left col-sm-12">
					<div class="form-group">
						<label for="result" class="form-label">Buscar:</label>
						<input type="text" name="buscador" id="buscador" class="form-control">
					</div>
				</div>			
				<div class="col-md-5 pull-left col-sm-12">
					<div class="form-group">
						<label for="result">Mostrar:</label>
						<select  id="result" name="result" class="form-control" >
						  <option value = "30">Mostrar 30</option>
						  <option value = "60">Mostrar 60</option>
						  <option value = "90">Mostrar 90</option>
						  <option value = " ">Mostrar todos</option>
						</select>
						<!--<div style="float:left;">De: </div><div style="float:left;" id="resultados"></div>-->
					</div>
					
				</div>				
				<div class="col-md-4 col-sm-12">
					<label>Exportar</label><br>
					
					<a href="dashboard/obtener_xls" class="btn btn-default pull-left"><span class="glyphicon glyphicon-download"></span> Reporte</a>
					<a href="javascript:void(0);" class="btn btn-default pull-left" style="margin-left:10px;" id="exportar"><span class="glyphicon glyphicon-download"></span> Exportar vista</a>
				</div>
		</form>
		</div>

		
		<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Tipo</th>
						<th>Pdf</th>
						<th>Imagen</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody id="contenido">

				</tbody>
			</table>
		</div>
	</div>
</div>
