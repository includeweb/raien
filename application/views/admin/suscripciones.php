<?php echo add_jscript('function');?> 
 <?php echo add_jscript('jquery.confirm');?> 
<script type="text/javascript">     
    
    var base_url = "<?php echo base_url()?>";

    $(document).ready(function () {
        result = 20;
        $.post( base_url+"admin/get_suscripciones", function( data ) {
            contenedor = $("#content_contactos");
            table = $("#table_contactos");
            acction = [{
                            "link":'#',
                            "button":'',
                            "rel":'id',
							"target":'_self',
                            "class":'glyphicon glyphicon-remove remove' ,
                            "parameter":''
                        }];


            $('#buscador').val('');
            json = JSON.parse(data);
            json_active = json;
            load_content(json);
            selectedRow(json);
        });

        $("#report").click(function(){
            var d = new Date();
            var strDate = d.getFullYear() + "_" + (d.getMonth()+1) + "_" + d.getDate();
            var filename = 'Reporte_suscripciones_'+strDate;
            export_csv(json_active, filename, true);
        });

        $("body").on('click','.remove',function(){
            var id = $(this).attr('rel');
            $.confirm({
                text: "Desea eliminar esta Suscripcion?",
                title: "Confirmation required",
                confirm: function(button) {
                   delete_suscripcion(id)
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
        });

   });

function delete_suscripcion(id){
    $.post( base_url+"admin/delete_suscripcion",{id:id},function(data){
        $("#"+id).remove().fadeOut(); 
    });
}

</script>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10"><h3 class="panel-title fix-title">Suscripciones</h3></div>
            <div class="col-md-2 text-right "></div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">   
		<div class="col-md-3 pull-left col-sm-12">
				<div class="form-group">
					<label for="result">Buscar:</label>
					<input type="text" name="buscador" id="buscador" class="form-control">
				</div>
			</div>          
			<div class="col-md-5 pull-left col-sm-12">
				<div class="form-group">
					<label for="result">Mostrar:</label>
					<select  id="result" name="result" class="form-control">
					<option value="">Seleccione</option>
					</select>
					<span>De: </span><span id="numRows"></span>
				</div>
				
			</div>              
			<div class="col-md-4 col-sm-12">
				<label>Exportar</label><br>
				 <span class="btn btn-default pull-left" id="report" ><i class="fa fa-download"></i>Exportar Reporte</span>
			</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead id="table_contactos">
                      <tr>
                        <th rel="id"><a href="javascript:void(0)" class="asc" >Id</a></th>
                        <th rel="email"><a href="javascript:void(0)" class="asc" >Email</a></th>
                        <th rel="acction">Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="content_contactos">
                    </tbody>
                </table>         
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="my_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="title"></h4>
      </div>
      <div class="modal-body" id="body">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
