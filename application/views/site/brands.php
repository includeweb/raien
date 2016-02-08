<div class="col-md-9 brands">
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
