
<?php
function format_date($date){
	setlocale(LC_ALL,"es_ES");
	return strftime("%d de %B",strtotime($date));
}
function format_mont($date){
	setlocale(LC_ALL,"es_ES");
	return strftime("%B",strtotime($date));
}
$c = 0;
?>
<script type="text/javascript" src="<?=base_url();?>js/jquery.mCustomScrollbar.js"></script>
<style type="text/css" src="<?=base_url();?>css/jquery.mCustomScrollbar.min.css"></style>

<div class="row training">
	<div class="col-md-3">
		<div class="title-orange animated animate-hide">CURSOS, CAPACITACIONES Y&nbsp;WORKSHOPS</div>
		<p class="p animated animate-hide">Nuestro Servicio de Post-Venta ofrece capacitaciones in-company y workshops. Porque no sólo vendemos productos, sino que capacitamos al personal en su uso, hablándoles el mismo idioma y adentrándonos en sus compañías, atendiendo sus necesidades específicas.</p>
	</div>
	<div class="col-md-9 ">
		<div class="table-responsive training-table">
			<table class="table">
			<? foreach ($capacitaciones as $capacitacion) { ?>
				<?php if($c == 1){
					if($mount != format_mont($capacitacion->from)){
						$c=0;
					}
				} ?>
			
				<?php if($c == 0){?>
				<thead>

					<tr>
						<th colspan="4"><?=format_mont($capacitacion->from);?></th>
					</tr>
					<tr>
						<th>Fecha</th>
						<th>Descripción</th>
						<th>+Info</th>
						<th>Disponibilidad</th>
					</tr>
				</thead>
				
				<?php $mount = format_mont($capacitacion->from); ?>
				<?php $c = 1; ?>
				<?php } ?>
				
				<tbody>	
						<tr>
							<td><?=format_date($capacitacion->from);?> - <?=format_date($capacitacion->to);?></td>
							<td><?=$capacitacion->descripcion;?></td>
							<td><a href="<?=base_url();?>files/pdf/capacitaciones/<?=$capacitacion->file_pdf;?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></a></td>
							<td><a href="<?=base_url();?>/show/contact">CONSULTAR</a></td>
						</tr>
				
				</tbody>
					<? } ?>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
			/*	$(".training-table").mCustomScrollbar({
		    theme:"dark"
		});*/
		$('.title-orange').addClass('fadeInLeft').fadeIn('slow');
		setTimeout(function(){
			$('.p').addClass('fadeInLeft').fadeIn('slow');
		}, 500);

	});
</script>