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
			    			<div class="col-md-6 col-xs-9"><span>TELÉFONO:  011-4701-9316 &amp; líneas rotativas</span> EMAIL: ventas@raien.com.ar</div>
			    			<div class="col-md-6 col-xs-3">
			    				<div class="pull-right">
				    				<a href="" target="_blank">
				    					<img src="<?=base_url();?>images/web/youtube-icon.png" alt="Youtube">
				    				</a>
				    				<a href="" target="_blank">
				    					<img src="<?=base_url();?>images/web/facebook-icon.png" alt="Facebook">
				    				</a>
				    				<a href="" target="_blank">
				    					<img src="<?=base_url();?>images/web/blogger-icon.png" alt="Blogger">
				    				</a>
			    				</div>
			    			</div>
	    				</div>
    				</div>
				</nav>
	    		<nav class="navbar navbar-default  raien-navbar">
					<div class="container ">

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
				        <li><a href="<?=base_url();?>show">home</a></li>

				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">productos <span class="caret"></span></a>
				          <ul class="dropdown-menu">
				            <li class="sub-navigation-li">
				            	<a href="<?=base_url();?>show/products/categoria" class="subnavigation-item" data-img="<?=base_url();?>images/web/categoria-icon.png" data-hover="<?=base_url();?>images/web/categoria-icon-hover.png">
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
				        <li><a href="<?=base_url();?>show/engineering">ingeniería</a></li>
				        <li><a href="<?=base_url();?>show/training">capacitación</a></li>
				        <li><a href="<?=base_url();?>show/about">institucional</a></li>
				        <li><a href="<?=base_url();?>show/contact">contacto</a></li>
				        <li><a href="<?=base_url();?>show/team">trabaja con raien</a></li>
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
		      <input type="text" class="form-control" placeholder="¿QUÉ PRODUCTO ESTÁ BUSCANDO?">
		      <span class="input-group-btn">
		        <button class="btn btn-default hidden-xs btn-raien" type="button"><span class="glyphicon glyphicon-search"></span> BUSCAR</span></button>
		        <button class="btn btn-default show-xs hidden-sm hidden-md hidden-lg" type="button"><span class="glyphicon glyphicon-search"></span></button>
		      </span>
		    </div><!-- /input-group -->
		</div>
		<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
			<div class="row ">
				<div class="col-md-3 col-sm-12 no-padding-right separate-mobile">
					<!-- Split button -->
					<div class="btn-group full-width ">
						<div class="btn-title ">tipo de producto</div>
					  <button type="button" class="btn btn-buscador categoria_nombre">Seleccione un tipo</button>
					  <button type="button" class="btn btn-buscador-caret dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="caret"></span>
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu dropdown-buscador">
						  <?php foreach ($categorias as $categoria){ ?>
						    <li><a href="javascript:void(0);" class="categoria" data-id="<?=$categoria->id;?>"><?=$categoria->descripcion;?></a></li>
						  <?php } ?>
					  </ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-12  no-padding-right separate-mobile marcas-container">
					<!-- Split button -->
					<div class="btn-group full-width" >
					<div class="btn-title ">marca del producto</div>
					  <button type="button" class="btn btn-buscador marca_nombre" disabled="disabled">Seleccione una marca</button>
					  <button type="button" class="btn btn-buscador-caret dropdown-toggle" disabled="disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="caret"></span>
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu dropdown-buscador marcas-listado">

					  </ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-12  no-padding-right separate-mobile">
					<!-- Split button -->
					<div class="btn-group full-width">
					<div class="btn-title">producto</div>
					  <button type="button" class="btn btn-buscador" disabled="disabled">Seleccione un producto</button>
					  <button type="button" class="btn btn-buscador-caret dropdown-toggle" disabled="disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="caret"></span>
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu dropdown-buscador">
					    <li><a href="#">Action</a></li>
					    <li><a href="#">Another action</a></li>
					    <li><a href="#">Something else here</a></li>

					    <li><a href="#">Separated link</a></li>
					  </ul>
					</div>
				</div>
				<div class="col-md-2 col-sm-12 separate-mobile">
					<button type="submit" class="btn btn-default btn-raien"><span class="glyphicon glyphicon-search"></span> BUSCAR</button>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- / Content -->
    </div>
 	<!-- / Main container -->
 	<div class="footer">
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
								<input type="email" class="form-control" id="exampleInputAmount">
								<div class="input-group-addon"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>
							</div>
						</div>
					</form>
 				</div>
 			</div>
 		</div>
 		<div class="legals">
 			TODOS LOS DERECHOS RESERVADOS. RAIEN © 2015. TÉRMINOS Y CONDICIONES. POWERED BY QUTUWARA
 		</div>
 	</div>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
   <script type="text/javascript">
	$(document).ready(function(){

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
					  	 		$('.marcas-listado').append('<li><a href="#">'+json[i].nombre+'</a></li>');
					  	 	}
					  	}else{
					  		$('.marcas-listado').html('<li><a href="javascript:void(0);">No se encontraron marcas.</a></li>');
					  	}

						//$('.categoria_nombre').html(msg.);
					  });

			});

	});


</script>
  </body>
</html>
