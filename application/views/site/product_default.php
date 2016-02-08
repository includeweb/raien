
<div class="col-md-9">
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb">
				Productos <?php if ($breadcrumb) echo '> '.$breadcrumb ?>
			</div>
		</div>
	</div>
	<div class="row">
		<?php
		if (!empty($result)) {
		foreach ($result as $row) { ?>
			<div class="col-md-4 col-sm-6">
				<div>
					<div class="text">
						<div>
							<span><?=$row->nombre?></span>
						</div>
					</div>
					<div class="image" style="background-image: url('<?=base_url();?>images/productos/<?=$row->galimg?>')">
					</div>
					<div class="background">
					</div>
				</div>
			</div>
		<?php } } ?>

		<!-- <div class="col-md-4  col-sm-6">
			<div>
				<div class="text">
					<div>
						<span>software de ingeniería</span>
					</div>
				</div>
				<div class="image">
				</div>
				<div class="background">
				</div>
			</div>
		</div>
		<div class="col-md-4  col-sm-6">
			<div>
				<div class="text">
					<div>
						<span>adquisición de datos y control</span>
					</div>
				</div>
				<div class="image">
				</div>
				<div class="background">
				</div>
			</div>
		</div>
		<div class="col-md-4  col-sm-6">
			<div>
				<div class="text">
					<div>
						<span>pcs industriales</span>
					</div>
				</div>
				<div class="image">
				</div>
				<div class="background">
				</div>
			</div>
		</div>
		<div class="col-md-4  col-sm-6">
			<div>
				<div class="text">
					<div>
						<span>instrumentos de laboratorio</span>
					</div>
				</div>
				<div class="image">
				</div>
				<div class="background">
				</div>
			</div>
		</div>
		<div class="col-md-4  col-sm-6">
			<div>
				<div class="text">
					<div>
						<span>sensores y transductores</span>
					</div>
				</div>
				<div class="image">
				</div>
				<div class="background">
				</div>
			</div>
		</div> -->
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
