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
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Optional theme -->
	 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo add_style('style');?>
    <?php echo add_style('font-awesome.min');?>
    <?php echo add_style('animate');?>
  </head>
  <body>
  <div class="wrapper">
    <!-- Main container -->
    <div class="container-fluid no-padding">
  		<!-- Top info -->



    	<!-- / Top info -->


				<nav class="navbar navbar-default navbar-fixed-top site-nav">
					<div class="container">
						<div class="row">
			    			<div class="col-md-6 col-sm-6"><span>TELÉFONO: 011-4701-9316 &amp; líneas rotativas</span> EMAIL:&nbsp;ventas@raien.com.ar</div>
			    			<div class="col-md-6 col-sm-6">
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
	    		<nav class="navbar navbar-default navbar-fixed-top raien-site-navbar">
					<div class="container ">

				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#"><img src="<?=base_url();?>images/logo.jpg"></a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				      <ul class="nav navbar-nav navbar-right">
				        <li><a href="<?=base_url();?>show">home</a></li>

				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">productos</a>
				          <ul class="dropdown-menu">
				            <li>
				            	<a href="<?=base_url();?>show/products/categoria">
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
				            <li>
				            	<a href="<?=base_url();?>show/products/aplicacion">
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
				            <li>
				            	<a href="<?=base_url();?>show/products/marcas">
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
				        <li><a href="#">institucional</a></li>
				        <li><a href="<?=base_url();?>show/contact">contacto</a></li>
				        <li><a href="<?=base_url();?>show/team">trabaja con raien</a></li>
				      </ul>
				    </div><!-- /.navbar-collapse -->
				  	</div>
				</nav>


	    </div>
	    <div class="container content">
	    	<div class="row products">
				<div class="col-md-3">
					<div id="accordion">
						<div>
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Categoría</a>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in colapsable" role="tabpanel" aria-labelledby="headingOne">
							<ul>
								<?php foreach ($categorias as $categoria) { ?>
									<li><a href="<?=base_url();?>show/products/categoria/<?=seoUrl($categoria->nombre)?>"><?=$categoria->nombre?></a></li>
								<?php } ?>
							</ul>
						</div>
						<div>
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Aplicación</a>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse in colapsable" role="tabpanel" aria-labelledby="headingTwo">
							<ul>
								<?php foreach ($aplicaciones as $aplicacion) { ?>
									<li><a href="<?=base_url();?>show/products/aplicacion/<?=seoUrl($aplicacion->nombre)?>"><?=$aplicacion->nombre?></a></li>
								<?php } ?>
							</ul>
						</div>
						<div>
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Marcas</a>
						</div>
						<div id="collapseThree" class="panel-collapse collapse in colapsable" role="tabpanel" aria-labelledby="headingThree">
							<ul>
									<li><a href="<?=base_url();?>show/products/marcas">Ver todas</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Content -->
				<?php echo $content_for_layout?>
				<!-- / Content -->
			</div>
	    </div>
	    <div class="push"></div>
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




    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	$.fn.animateRotate = function(startAngle, endAngle, duration, easing, complete){
		    return this.each(function(){
		        var elem = $(this);

		        $({deg: startAngle}).animate({deg: endAngle}, {
		            duration: duration,
		            easing: easing,
		            step: function(now){
		                elem.css({
		                  '-moz-transform':'rotate('+now+'deg)',
		                  '-webkit-transform':'rotate('+now+'deg)',
		                  '-o-transform':'rotate('+now+'deg)',
		                  '-ms-transform':'rotate('+now+'deg)',
		                  'transform':'rotate('+now+'deg)'
		                });
		            },
		            complete: complete || $.noop
		        });
		    });
		};

		$('.colapsable').on('hide.bs.collapse', function() {
			$(this).prev().find('.glyphicon-triangle-bottom').animateRotate(0, -90);
			// $(this).prev().find('.glyphicon-triangle-bottom').addClass('rotateHide');
		});

		$('.colapsable').on('show.bs.collapse', function() {
			$(this).prev().find('.glyphicon-triangle-bottom').animateRotate(-90, 0);
		});
    </script>
  </body>
</html>