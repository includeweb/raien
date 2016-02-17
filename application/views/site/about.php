<script type="text/javascript">
	$(document).ready(function(){
		$('.img-1').addClass('fadeInLeft').fadeIn('slow');
		setTimeout(function(){
			$('.img-2').addClass('fadeInLeft').fadeIn('slow');
		}, 200);
		setTimeout(function(){
			$('.img-3').addClass('fadeInLeft').fadeIn('slow');
		}, 400);

	});
</script>
<div class="row about">
	<div class="col-md-3">
		<div class="img-1 animated animate-hide"><img class="img-responsive" src="<?=base_url();?>images/about/foto1.jpg"></div>
		<div class="img-2 animated animate-hide"><img class="img-responsive" src="<?=base_url();?>images/about/foto2.jpg"></div>
		<div class="img-3 animated animate-hide"><img class="img-responsive" src="<?=base_url();?>images/about/foto3.jpg"></div>
	</div>
	<div class="col-md-9">
		<div>
			<p>Con más de <b>20 años de experiencia</b> en productos y servicios para ingenieros y científicos, nuestra empresa pone a su disposición una variedad de sistemas para <b>recolectar, procesar y almacenar datos</b> en laboratorio o terreno, incluyendo computadores robustos, sistemas de adquisición de datos, instrumentos de alta sensibilidad, sensores y software técnico. Nuestra amplia gama de clientes incluye universidades, instituciones de investigación, empresas de ingeniería, integradores, industria minera, petroquímica y manufacturera, empresas de diseño y fuerzas armadas, entre otros.</p>
			<p class="orange">MISIÓN</p>
			<p><b>Ser Socios de Valor Agregado</b> de nuestros clientes, entregando productos y soluciones en constante innovación tecnológica.</p>
			<p class="orange">NUESTROS VALORES</p>
			<ul>
				<li>Compromiso</li>
				<li>Trabajo en equipo</li>
				<li>Confianza</li>
				<li>Aprendizaje Continuo</li>
				<li>Respeto</li>
				<li>Honestidad</li>
			</ul>
		</div>
	</div>
</div>
