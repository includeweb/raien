<?php echo add_jscript('function');?>  
<script type="text/javascript">     
    
    var base_url = "<?php echo base_url()?>";

    $(document).ready(function () {
        result = 20;


        $.post( base_url+"admin/products_get", function( data ) {
            contenedor = $("#content_news");
            table = $("#table_news");
            acction = [{
                            "link":base_url+'admin/editar_producto/',
                            "button":'' ,
                            "rel":'',
                            "class":'glyphicon glyphicon-pencil' ,
                            "parameter": 'id'
                        },{
                            "link":'#',
                            "button":'',
                            "rel":'id',
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
            var filename = 'Reporte_noticias_'+strDate;
            export_csv(json_active, filename, true);
        });

        $("body").on('click','.remove',function(){
            var id = $(this).attr('rel');
            $.confirm({
                text: "Desea eliminar esta nota?",
                title: "Confirmation required",
                confirm: function(button) {
                   news_delete(id)
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
    
        $("body").on('click','.ver_pdf',function(){
          var id =  $(this).data("id");  
          var data =  $(this).attr("rel");  
          var url = base_url+'files/pdf/'+id+'/'+data
          window.open(url,'_blank');
        }); 

        $("body").on('click','.ver_img',function(){
            var id =  $(this).data("id");
            $.ajax({
                url: "<?=base_url('admin/get_product')?>",
                data: {id:id},
                type: "POST",
                datatype: 'json',
                success: function(data){        
                    products = JSON.parse(data);
                    var img = base_url+"files/images/"+id+"/"+products.file_img;
                    $('#title').html('Foto del Producto');
                    $('#body').html("<img src=\""+img+"\" alt=\"Smiley face\">");
                    $('#my_modal').modal('show');
                }  
            });
        });

        $("body").on('click','.edition', function(){
        var id = $(this).attr('rel');
        $.ajax({
            url: "<?=base_url('admin/get_product')?>",
            data: {id:id},
            type: "POST",
            datatype: 'json',
            success: function(data){        
                products = JSON.parse(data);
                $('#title').html('Descripción del Producto');
                $('#body').html(products.descripcion);
                $('#my_modal').modal('show');

            }  
        });
    });

    });

function news_delete(id){
    $.post( base_url+"admin/news_delete",{id:id},function(data){
        $("#"+id).remove().fadeOut(); 
    });
}

</script>
<div class="row std-article std-admin">
    <div class="col-sm-6">
        <h2>Listado de Noticias</h2>
    </div>
    <div class="col-sm-6">
        <span class="btn-admin-return" id="report"><i class="fa fa-download"></i>Exportar Reporte</span>
        <?=anchor('admin/news_new', '<span class="btn-admin-return"><i class="fa fa-arrow-circle-o-right"></i>Nueva Noticias</span>')?>
    </div>
</div>
<div class="row std-article std-admin">
    <div class="col-md-6 pull-left">
        <label for="result">Buscar:</label>
        <input type="text" name="buscador" id="buscador" class="form-control">
    </div>          
    <div class="col-md-6 pull-left">
        <label for="result">Mostrar:</label>
        <select  id="result" name="result" class="form-control">
            <option value="">Seleccione</option>
        </select>
        <span>De: </span><span id="numRows"></span>
    </div>
</div>
<div class="row std-article std-admin">
    <div class="col-xs-12">
        <table class="table table-hover">
            <thead id="table_news">
              <tr>
                <th rel="id"><a href="javascript:void(0)" class="asc" >Id</a></th>
                <th rel="nombre"><a href="javascript:void(0)" class="asc" >Fecha</a></th>
                <th rel="descripcion" class="editable"><a href="javascript:void(0)" class="asc" >Publicación</a></th>
                <th rel="file_pdf" class="view" data-class ="ver_pdf glyphicon glyphicon-floppy-save"><a href="javascript:void(0)" class="asc" >Documentación</a></th>
                <th rel="file_img" class="view" data-class ="ver_img glyphicon glyphicon-picture"><a href="javascript:void(0)" class="asc" >Foto</a></th>
                <th rel="acction">Acciones</th>
              </tr>
            </thead>
            <tbody id="content_news">
            </tbody>
        </table> 
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