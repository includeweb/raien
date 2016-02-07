<div class="row products brands">
	<div class="col-md-3">
		<div>
			<div>
				Categoría
			</div>
			<ul>
				<?php foreach ($categorias as $categoria) { ?>
					<li><?=$categoria->nombre?></li>
				<?php } ?>
			</ul>
			<div>
				Aplicación
			</div>
			<ul>
				<?php foreach ($aplicaciones as $aplicacion) { ?>
					<li><?=$aplicacion->nombre?></li>
				<?php } ?>
			</ul>
			<div>
				Marcas
			</div>
			<ul>
					<li><a href="<?=base_url();?>show/products/marcas">Ver todas</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumb">
					Productos <?php if ($breadcrumb) echo '> '.$breadcrumb ?>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($result as $row) { ?>
			<div class="col-md-3 col-xs-6">
				<div>
					<!-- <img src="<?=base_url();?>images/productos/logos/<?=$row->imagen?>"> -->
					<img src="http://placehold.it/155x90">
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.col-md-4 > div').mouseenter(function() {
			$(this).find('.background').css('background-color', '#DCA427');
		});

		$('.col-md-4 > div').mouseleave(function() {
			$(this).find('.background').css('background-color', '#404041');
		});
	});
</script>
