<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Raien - Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
      	<?php echo add_style('bootstrap.min');?>
        <?php echo add_style('override');?>
        <?php echo add_jscript('jquery-1.11.1.min');?>		
        <?php echo add_jscript('bootstrap.min');?>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300' rel='stylesheet' type='text/css'>
      
		
    </head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><div class="pull-left"><img src="<?=base_url();?>images/logo.jpg" /></div><div class="logo"> Raien</div></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
         
     
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$username;?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?=base_url();?>auth/change_password">Cambiar contraseña</a></li>
            <li class="divider"></li>
            <li><a href="<?=base_url();?>auth/logout">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<div class="row-fluid">
		<div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
          <div class="panel panel-default">
           
            <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
              <li role="presentation" class="active"><a href="<?=base_url();?>admin">Admin</a></li>
              <li role="presentation"><a href="<?=base_url();?>admin" class="list-group-item">Productos</a></li>
              <li role="presentation"><a href="<?=base_url();?>admin/contactos" class="list-group-item">Contactos</a></li>
              <li role="presentation"><a href="<?=base_url();?>admin/cvs" class="list-group-item">CVS</a></li>
            </ul>
            </div>
          </div>
        </div>
        <div class="col-md-10" id="content-app">
          <?php echo $content_for_layout?>
        </div>
      </div>
          
        </div>
    </div>    
</body>
</html>