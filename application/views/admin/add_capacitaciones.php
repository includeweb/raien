<?php echo add_jscript('moment');?> 
<?php echo add_jscript('bootstrap-datetimepicker');?>  
<?php echo add_style('edit');?>
<?php echo add_style('bootstrap-datetimepicker.min');?>
<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
<form action=""  method="post" accept-charset="UTF-8" enctype="multipart/form-data" />
<div class="col-sm-8 col-sm-offset-2" style="height:75px;">
   <div class='col-md-6'>
		<div class="form-group">
			<div class='input-group date' id='from'>
				<input type='text' name="from" class="form-control" readonly data-format="yyyy-MM-dd HH:mm:ss"/>
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
			</div>
		</div>
	</div>
	<div class='col-md-6'>
		<div class="form-group">
			<div class='input-group date' id='to'>
				<input type='text' name="to" class="form-control" readonly data-format="yyyy-MM-dd HH:mm:ss" />
				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="title" class="col-sm-12 control-label">Descripci�n</label>
		<div class="col-sm-12">
		  <textarea type="text" name="descripcion" class="form-control" id="descripcion"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="filedatasheet">Documentaci�n</label>
		<input type="file" id="filedatasheet" name="file_pdf" accept="application/pdf" >
		<p class="help-block">Formato: PDF</p>
	</div>
	 <input style="margin-top: 10px" type="submit" class="pull-right btn btn-success" value="Gurdar evento">
</div>
	
</form>
</div>
<script type="text/javascript">
	$(function () {
		$('#from').datetimepicker({
			format: 'YYYY-MM-DD hh:mm:ss',
			language: 'es',
			minDate: new Date()
		});
		$('#to').datetimepicker({
			format: 'YYYY-MM-DD hh:mm:ss',
			language: 'es',
			minDate: new Date()
		});
		
	});
</script>
