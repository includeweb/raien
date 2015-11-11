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
		    text: "Esta seguro ?",
		    title: "Confirmation required",
		    confirm: function(button) {
		        delete_product(product_id);
		    },
		    cancel: function(button) {
		        
		    },
		    confirmButton: "Yes",
		    cancelButton: "No",
		    post: true,
		    confirmButtonClass: "btn-danger",
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
					 "</td><td><a href='<?=base_url('files/pdf/"+value.id+"')?>/"+ value.file_pdf +"' target=\"_blank\" >ver</a>					 </td><td>" + value.file_img + 
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
		<div class="col-md-10"><h3 class="panel-title">Productos</h3></div>
		<div class="col-md-2 text-right "><a href="<?=base_url();?>dashboard/agregar_producto" class="btn btn-default">Agregar</a></div>
	</div>
	  
	  
	</div>
	<div class="panel-body">
		<form id="my_form" method="POST" action="<?=base_url('dashboard/obtener_xls')?>">
			<div class="row">
				<div class="col-md-3 pull-left">
					<label for="result">Buscar:</label>
					<input type="text" name="buscador" id="buscador">
				</div>			
				<div class="col-md-5 pull-left">
					<label for="result">Mostrar:</label>
					<select  id="result" name="result" >
					  <option value = "30">Mostrar 30</option>
					  <option value = "60">Mostrar 60</option>
					  <option value = "90">Mostrar 90</option>
					  <option value = " ">Mostrar todos</option>
					</select>
					<span>De: </span><span id="resultados"></span>
				</div>				
				<div class="col-md-4">
					<?=anchor('dashboard/obtener_xls', 'Reporte', array('class'=>"btn btn-success pull-right"));?>
					<button class="btn btn-warning pull-right" id="exportar">Exportar vista</button>
				</div>
		</form>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>type</th>
						<th>pdf</th>
						<th>Imagen</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody id="contenido">

				</tbody>
			</table>
	</div>
</div>
