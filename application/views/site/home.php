<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Raien</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
	<link href='https://fonts.googleapis.com/css?family=Raleway:300,400,500,700,900' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,700' rel='stylesheet' type='text/css'>
	<!-- Optional theme -->
	 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo add_style('style');?>
    <?php echo add_style('font-awesome.min');?>
  </head>
  <body>
    <!-- Main container -->
    <div class="container-fluid no-padding">
  		<!-- Top info -->



    	<!-- / Top info -->


				<nav class="navbar navbar-default site-nav hidden-xs home-nav">
					<div class="container">
						<div class="row">
			    			<div class="col-md-6 col-xs-9"><span>TELÉFONO:  011-4701-9316 &amp; líneas rotativas</span> EMAIL: <a href="mailto:ventas@raien.com.ar" style="color:#fff">ventas@raien.com.ar</a></div>
			    			<div class="col-md-6 col-xs-3">
			    				<div class="pull-right">
				    				<a href="https://www.facebook.com/raienargentina/" target="_blank">
				    					<img src="<?=base_url();?>images/web/youtube-icon.png" alt="Youtube">
				    				</a>
				    				<a href="https://www.youtube.com/user/RaienArgentina" target="_blank">
				    					<img src="<?=base_url();?>images/web/facebook-icon.png" alt="Facebook">
				    				</a>
				    				<a href="http://raienargentina.blogspot.com.ar/" target="_blank">
				    					<img src="<?=base_url();?>images/web/blogger-icon.png" alt="Blogger">
				    				</a>
			    				</div>
			    			</div>
	    				</div>
    				</div>
				</nav>
	    		<nav class="navbar navbar-default  raien-navbar" id="navbar-desktop">
					<div class="container">

				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand hidden-xs show-sm show-md show-lg" href="#" ><img src="<?=base_url();?>images/web/logo-raien.png" /></a>
				      <a class="navbar-brand show-xs hidden-sm hidden-md hidden-lg" href="#"><img src="<?=base_url();?>images/web/logo-mobile.png" class="img-responsive"></a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				      <ul class="nav navbar-nav navbar-right">
				        <li><a href="<?=base_url();?>show" title="Home" class="active-menu">home</a></li>

				        <li class="dropdown" style="width:120px;">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Productos">productos <span class="caret"></span></a>
				          <ul class="dropdown-menu centered-submenu">
				            <li class="sub-navigation-li">
				            	<a href="<?=base_url();?>show/products/categoria" class="subnavigation-item" data-img="<?=base_url();?>images/web/categoria-icon.png" data-hover="<?=base_url();?>images/web/categoria-icon-hover.png" >
				            		<div class="sub-navigation">
				            			<div class="sub-navigation-icon">
				            				<img src="<?=base_url();?>images/web/categoria-icon.png" />
				            			</div>
				            			<div class="sub-navigation-text">
				            				Categoría
				            			</div>
				            		</div>
				            	</a>
				            </li>
				            <li class="sub-navigation-li">
				            	<a href="<?=base_url();?>show/products/aplicacion" class="subnavigation-item" data-img="<?=base_url();?>images/web/aplicacion-icon.png" data-hover="<?=base_url();?>images/web/aplicacion-icon-hover.png">
				            		<div class="sub-navigation">
				            			<div class="sub-navigation-icon">
				            				<img src="<?=base_url();?>images/web/aplicacion-icon.png" />
				            			</div>
				            			<div class="sub-navigation-text">
				            				Aplicación
				            			</div>
				            		</div>
				            	</a>
				            </li>
				            <li class="sub-navigation-li">
				            	<a href="<?=base_url();?>show/products/marcas" class="subnavigation-item" data-img="<?=base_url();?>images/web/marca-icon.png" data-hover="<?=base_url();?>images/web/marca-icon-hover.png">
				            		<div class="sub-navigation">
				            			<div class="sub-navigation-icon">
				            				<img src="<?=base_url();?>images/web/marca-icon.png" />
				            			</div>
				            			<div class="sub-navigation-text">
				            				Marca
				            			</div>
				            		</div>
				            	</a>
				            </li>

				          </ul>
				        </li>
				        <li><a href="<?=base_url();?>show/engineering" title="Ingeniería">ingeniería</a></li>
				        <li><a href="<?=base_url();?>show/training" title="Capacitación">capacitación</a></li>
				        <li><a href="<?=base_url();?>show/about" title="Institucional">institucional</a></li>
				        <li><a href="<?=base_url();?>show/contact" title="Contacto">contacto</a></li>
				        <li><a href="<?=base_url();?>show/team" title="Trabajá con Raien">Trabajá con raien</a></li>
				      </ul>
				    </div><!-- /.navbar-collapse -->

				  	</div>
				</nav>
				

			


    </div>
    <div class="container-fluid no-padding">
    <div class="mobile-header visible-sm visible-xs">
    	<div class="col-md-12 text-center" style="padding-top:200px;">
		  		<img src="<?=base_url();?>images/web/slider-text.png" width="200"/>
		  	</div>
    </div>
		<!-- Content -->
<div class="row no-margin hidden-sm hidden-xs" id="carousel-home">
	<div class="col-md-12 no-padding">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		  	<div class="banner-centered">
		  		<img src="<?=base_url();?>images/web/slider-text.png" />
		  	</div>
		    <div class="item active ">
		      <img src="<?=base_url();?>images/web/slider-1.jpg" class="img-responsive">

		    </div>
		    <div class="item">
		      <img src="<?=base_url();?>images/web/slider-2.jpg" class="img-responsive">

		    </div>
		    <div class="item">
		      <img src="<?=base_url();?>images/web/slider-3.jpg" class="img-responsive">

		    </div>
		    <div class="item">
		      <img src="<?=base_url();?>images/web/slider-4.jpg" class="img-responsive">

		    </div>

		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <div> <img src="<?=base_url();?>images/web/carousel-left.png" /></div>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		   <div> <img src="<?=base_url();?>images/web/carosuel-right.png" /></div>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
</div>


<div class="row buscador no-margin " >
	<div class="container">
		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<div class="input-group">
		      <input type="text" class="form-control" placeholder="¿QUÉ PRODUCTO ESTÁ BUSCANDO?" id="input-product" style="color:#fff">
		      <span class="input-group-btn">
		        <button class="btn btn-default hidden-xs btn-raien" type="button" id="search-form-1"><span class="glyphicon glyphicon-search"></span> BUSCAR</span></button>
		        <button class="btn btn-default show-xs hidden-sm hidden-md hidden-lg" type="button"><span class="glyphicon glyphicon-search"></span></button>
		      </span>
		    </div><!-- /input-group -->
		</div>
		<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 borde">
			<div class="row ">
				<div class="col-md-3 col-sm-12 no-padding-right separate-mobile">
					<!-- Split button -->
					<div class="btn-group full-width ">
						<div class="btn-title ">tipo de producto</div>
					  <button type="button" class="btn btn-buscador categoria_nombre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seleccione un tipo</button>
					  <button type="button" class="btn btn-buscador-caret dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="caret"></span>
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu dropdown-buscador">
						  <?php foreach ($categorias as $categoria){ ?>
						    <li><a href="javascript:void(0);" class="categoria" data-id="<?=$categoria->id;?>" data-url="<?=$categoria->url;?>"><?=$categoria->descripcion;?></a></li>
						  <?php } ?>
					  </ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-12  no-padding-right separate-mobile marcas-container">
					<!-- Split button -->
					<div class="btn-group full-width" >
					<div class="btn-title ">marca del producto</div>
					  <button type="button" class="btn btn-buscador marca_nombre" disabled="disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seleccione una marca</button>
					  <button type="button" class="btn btn-buscador-caret dropdown-toggle" disabled="disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="caret"></span>
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu dropdown-buscador marcas-listado">

					  </ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-12  no-padding-right separate-mobile productos-container">
					<!-- Split button -->
					<div class="btn-group full-width">
					<div class="btn-title">producto</div>
					  <button type="button" class="btn btn-buscador producto_nombre" disabled="disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seleccione un producto</button>
					  <button type="button" class="btn btn-buscador-caret dropdown-toggle" disabled="disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="caret"></span>
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu dropdown-buscador productos-listado">
					    
					  </ul>
					</div>
				</div>
				<div class="col-md-2 col-sm-12 separate-mobile">
					<button type="submit" class="btn btn-default btn-raien" id="search-form-2"><span class="glyphicon glyphicon-search"></span> BUSCAR</button>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- / Content -->
    </div>
 	<!-- / Main container -->
 	<div class="footer top30">
 		<div class="container">
 			<div class="row">
 				<div class="col-md-6 one-half">
 					<img src="<?=base_url();?>images/logo_footer.png"><img src="<?=base_url();?>images/qr_footer.jpg">
 				</div>
 				<div class="col-md-6 one-half last">
 					<form class="form-inline">
						<div class="form-group">
							<div>¿LE GUSTARÍA RECIBIR NUESTRO NEWSLETTER?</div>
							<div class="input-group full-width">
								<input type="email" class="form-control required" id="email">
								<div class="input-group-addon"><a href="javascript:void(0);" id="news"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a></div>
							</div>
						</div>
					</form>
 				</div>
 			</div>
 		</div>
 		<div class="legals">
 			TODOS LOS DERECHOS RESERVADOS. RAIEN © 2015. TÉRMINOS Y CONDICIONES. POWERED BY <a href="http://www.qutuwara.com" target="_blank">QUTUWARA</a>
 		</div>
 	</div>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?=base_url();?>js/jquery.validate_es.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
   <script type="text/javascript">

   	var categoria_selected;
   	var marca_selected;
   	var producto_selected;
   	var categoria_selected_url;
   	var base_url = '<?=base_url();?>'+'show/products/categoria/';

	$(document).ready(function(){
		$('.form-inline').validate();

		$('#news').click(function(){
			if ($(".form-inline").valid()) {
				var mail = $('#email').val();
		        	$.ajax({
					  method: "POST",
					  url: "<?=base_url();?>show/newsletter",
					  data: { mail: mail}
					})
					  .done(function(msg) {
					  	$('.last').html('Recibimos sus datos correctamente.');
					  });

		    }
			
		
			});
		

			$('.subnavigation-item').hover(

		       	function(){
		       		var hover = $(this).data('hover');

		       		$(this).find('img').attr('src', hover)
		       	},
		       	function(){

		       		var img = $(this).data('img');
		       		$(this).find('img').attr('src', img)
		       	}
			);

			$('.categoria').click(function(){

				var categoria_id = $(this).data('id');
				categoria_selected = $(this).data('id');
				categoria_selected_url = $(this).data('url');

				$('.marcas-listado').html('');
				$.ajax({
					  method: "POST",
					  url: "<?=base_url();?>show/traerMarcaPorCategoria",
					  data: { categoria_id: categoria_id}
					})
					  .done(function(msg) {
					  	$('.marcas-container button').removeAttr('disabled');
					  	if(msg != "error"){

					  		var json = $.parseJSON(msg);
					  		$('.categoria_nombre').html(json[0].codigo);
					  	 	for(var i = 0; i <= (json.length - 1 ); i++){
					  	 		$('.marcas-listado').append('<li><a href="javascript:void(0);" class="marca" data-id="'+json[i].marca_id+'" data-nombre="'+json[i].nombre+'">'+json[i].nombre+'</a></li>');
					  	 	}
					  	}else{
					  		$('.marcas-listado').html('<li><a href="javascript:void(0);">No se encontraron marcas.</a></li>');
					  	}

						//$('.categoria_nombre').html(msg.);
					  });

			});

			$('.marcas-listado').on('click', '.marca', (function(){

				var marca_nombre = $(this).data('nombre');
				var marca_id = $(this).data('id');		
				
				$('.marca_nombre').html(marca_nombre);
				$('.productos-listado').html('');
				$.ajax({
					  method: "POST",
					  url: "<?=base_url();?>show/getProductsHome/"+categoria_selected+'/'+marca_id
					
					})
					  .done(function(msg) {
					  	$('.productos-container button').removeAttr('disabled');
					  	if(msg != "error"){

					  		var json = $.parseJSON(msg);
					  		marca_selected = json[0].marca;
					  	 	for(var i = 0; i <= (json.length - 1 ); i++){
					  	 		$('.productos-listado').append('<li><a href="javascript:void(0);" class="producto" data-id="'+json[i].id+'" data-nombre="'+json[i].nombre+'">'+json[i].nombre+'</a></li>');
					  	 	}
					  	}else{
					  		$('.productos-listado').html('<li><a href="javascript:void(0);">No se encontraron productos.</a></li>');
					  	}

						//$('.categoria_nombre').html(msg.);
					  });

			}));

			$('.productos-listado').on('click', '.producto', (function(){

				var producto_nombre = $(this).data('nombre');
				var producto_id = $(this).data('id');
				
				$.ajax({
					  method: "POST",
					  url: "<?=base_url();?>show/getProductById/",
					  data: {producto_id : producto_id}
					
					}).done(function(data) {
					  	var json = $.parseJSON(data)
					  	producto_selected = json.nombre;
					  });

				$('.producto_nombre').html(producto_nombre);
			}));

			$('#search-form-2').click(function(e){
				e.preventDefault;
		
				var url = base_url+categoria_selected_url.replace(/ /g,"-").toLowerCase()+'/'+marca_selected.replace(/ /g,"-").toLowerCase()+'/'+producto_selected.replace(/ /g,"-").toLowerCase();
			
				window.location = url;

			});

			$('#search-form-1').click(function(e){
				e.preventDefault;
				var producto = $('#input-product').val().replace(/ /g,"-").toLowerCase();
				$.ajax({
					  method: "POST",
					  url: "<?=base_url();?>show/getProductHome/"+producto
					
					}).done(function(data) {
					  	var json = $.parseJSON(data);
					  	if(json == null){
					  		window.location = '<?=base_url();?>show/error/'+producto;
					  	}else{
					  		if(data.tipo_id == 1){
					  		var url = base_url+json.categoria+'/'+json.marca_nombre.replace(/ /g,"-").toLowerCase()+'/'+json.producto_url.replace(/ /g,"-").toLowerCase();

						  	}else{
						  		var url = '<?=base_url();?>'+'show/products/aplicacion/'+json.categoria+'/'+json.marca_nombre.replace(/ /g,"-").toLowerCase()+'/'+json.producto_url.replace(/ /g,"-").toLowerCase();
						  	}
						  	
							window.location = url;
					  	}
					  	
					  });
			});
	});


</script>
  </body>
</html>
