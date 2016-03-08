<?php
	function transliterateString($txt) {
	    $transliterationTable = array('á' => 'a', 'Á' => 'A', 'à' => 'a', 'À' => 'A', 'ă' => 'a', 'Ă' => 'A', 'â' => 'a', 'Â' => 'A', 'å' => 'a', 'Å' => 'A', 'ã' => 'a', 'Ã' => 'A', 'ą' => 'a', 'Ą' => 'A', 'ā' => 'a', 'Ā' => 'A', 'ä' => 'ae', 'Ä' => 'AE', 'æ' => 'ae', 'Æ' => 'AE', 'ḃ' => 'b', 'Ḃ' => 'B', 'ć' => 'c', 'Ć' => 'C', 'ĉ' => 'c', 'Ĉ' => 'C', 'č' => 'c', 'Č' => 'C', 'ċ' => 'c', 'Ċ' => 'C', 'ç' => 'c', 'Ç' => 'C', 'ď' => 'd', 'Ď' => 'D', 'ḋ' => 'd', 'Ḋ' => 'D', 'đ' => 'd', 'Đ' => 'D', 'ð' => 'dh', 'Ð' => 'Dh', 'é' => 'e', 'É' => 'E', 'è' => 'e', 'È' => 'E', 'ĕ' => 'e', 'Ĕ' => 'E', 'ê' => 'e', 'Ê' => 'E', 'ě' => 'e', 'Ě' => 'E', 'ë' => 'e', 'Ë' => 'E', 'ė' => 'e', 'Ė' => 'E', 'ę' => 'e', 'Ę' => 'E', 'ē' => 'e', 'Ē' => 'E', 'ḟ' => 'f', 'Ḟ' => 'F', 'ƒ' => 'f', 'Ƒ' => 'F', 'ğ' => 'g', 'Ğ' => 'G', 'ĝ' => 'g', 'Ĝ' => 'G', 'ġ' => 'g', 'Ġ' => 'G', 'ģ' => 'g', 'Ģ' => 'G', 'ĥ' => 'h', 'Ĥ' => 'H', 'ħ' => 'h', 'Ħ' => 'H', 'í' => 'i', 'Í' => 'I', 'ì' => 'i', 'Ì' => 'I', 'î' => 'i', 'Î' => 'I', 'ï' => 'i', 'Ï' => 'I', 'ĩ' => 'i', 'Ĩ' => 'I', 'į' => 'i', 'Į' => 'I', 'ī' => 'i', 'Ī' => 'I', 'ĵ' => 'j', 'Ĵ' => 'J', 'ķ' => 'k', 'Ķ' => 'K', 'ĺ' => 'l', 'Ĺ' => 'L', 'ľ' => 'l', 'Ľ' => 'L', 'ļ' => 'l', 'Ļ' => 'L', 'ł' => 'l', 'Ł' => 'L', 'ṁ' => 'm', 'Ṁ' => 'M', 'ń' => 'n', 'Ń' => 'N', 'ň' => 'n', 'Ň' => 'N', 'ñ' => 'n', 'Ñ' => 'N', 'ņ' => 'n', 'Ņ' => 'N', 'ó' => 'o', 'Ó' => 'O', 'ò' => 'o', 'Ò' => 'O', 'ô' => 'o', 'Ô' => 'O', 'ő' => 'o', 'Ő' => 'O', 'õ' => 'o', 'Õ' => 'O', 'ø' => 'oe', 'Ø' => 'OE', 'ō' => 'o', 'Ō' => 'O', 'ơ' => 'o', 'Ơ' => 'O', 'ö' => 'oe', 'Ö' => 'OE', 'ṗ' => 'p', 'Ṗ' => 'P', 'ŕ' => 'r', 'Ŕ' => 'R', 'ř' => 'r', 'Ř' => 'R', 'ŗ' => 'r', 'Ŗ' => 'R', 'ś' => 's', 'Ś' => 'S', 'ŝ' => 's', 'Ŝ' => 'S', 'š' => 's', 'Š' => 'S', 'ṡ' => 's', 'Ṡ' => 'S', 'ş' => 's', 'Ş' => 'S', 'ș' => 's', 'Ș' => 'S', 'ß' => 'SS', 'ť' => 't', 'Ť' => 'T', 'ṫ' => 't', 'Ṫ' => 'T', 'ţ' => 't', 'Ţ' => 'T', 'ț' => 't', 'Ț' => 'T', 'ŧ' => 't', 'Ŧ' => 'T', 'ú' => 'u', 'Ú' => 'U', 'ù' => 'u', 'Ù' => 'U', 'ŭ' => 'u', 'Ŭ' => 'U', 'û' => 'u', 'Û' => 'U', 'ů' => 'u', 'Ů' => 'U', 'ű' => 'u', 'Ű' => 'U', 'ũ' => 'u', 'Ũ' => 'U', 'ų' => 'u', 'Ų' => 'U', 'ū' => 'u', 'Ū' => 'U', 'ư' => 'u', 'Ư' => 'U', 'ü' => 'ue', 'Ü' => 'UE', 'ẃ' => 'w', 'Ẃ' => 'W', 'ẁ' => 'w', 'Ẁ' => 'W', 'ŵ' => 'w', 'Ŵ' => 'W', 'ẅ' => 'w', 'Ẅ' => 'W', 'ý' => 'y', 'Ý' => 'Y', 'ỳ' => 'y', 'Ỳ' => 'Y', 'ŷ' => 'y', 'Ŷ' => 'Y', 'ÿ' => 'y', 'Ÿ' => 'Y', 'ź' => 'z', 'Ź' => 'Z', 'ž' => 'z', 'Ž' => 'Z', 'ż' => 'z', 'Ż' => 'Z', 'þ' => 'th', 'Þ' => 'Th', 'µ' => 'u', 'а' => 'a', 'А' => 'a', 'б' => 'b', 'Б' => 'b', 'в' => 'v', 'В' => 'v', 'г' => 'g', 'Г' => 'g', 'д' => 'd', 'Д' => 'd', 'е' => 'e', 'Е' => 'E', 'ё' => 'e', 'Ё' => 'E', 'ж' => 'zh', 'Ж' => 'zh', 'з' => 'z', 'З' => 'z', 'и' => 'i', 'И' => 'i', 'й' => 'j', 'Й' => 'j', 'к' => 'k', 'К' => 'k', 'л' => 'l', 'Л' => 'l', 'м' => 'm', 'М' => 'm', 'н' => 'n', 'Н' => 'n', 'о' => 'o', 'О' => 'o', 'п' => 'p', 'П' => 'p', 'р' => 'r', 'Р' => 'r', 'с' => 's', 'С' => 's', 'т' => 't', 'Т' => 't', 'у' => 'u', 'У' => 'u', 'ф' => 'f', 'Ф' => 'f', 'х' => 'h', 'Х' => 'h', 'ц' => 'c', 'Ц' => 'c', 'ч' => 'ch', 'Ч' => 'ch', 'ш' => 'sh', 'Ш' => 'sh', 'щ' => 'sch', 'Щ' => 'sch', 'ъ' => '', 'Ъ' => '', 'ы' => 'y', 'Ы' => 'y', 'ь' => '', 'Ь' => '', 'э' => 'e', 'Э' => 'e', 'ю' => 'ju', 'Ю' => 'ju', 'я' => 'ja', 'Я' => 'ja');
	    return str_replace(array_keys($transliterationTable), array_values($transliterationTable), $txt);
	}

	function seoUrl($string) {
	    //
	    $string = transliterateString($string);
	    //Lower case everything
	    $string = strtolower($string);
	    //Make alphanumeric (removes all other characters)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    return $string;
	}

	foreach ($result as $row) {
		if ($row->url == $url) {
			$subcategoria = $row;
		}
	}



?>


<style type="text/css">
.products .col-md-4 div > .image {
	z-index: 0;
}
</style>

<div class="col-md-9 details">
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb">
				<a href="<?=base_url();?>show/products/">Productos</a><?php if ($breadcrumb) { ?><span> &gt; </span><a href="<?=base_url();?>show/products/<?=seoUrl($breadcrumb)?>/"><?=$breadcrumb;?></a><?php } ?><?php if ($subcategoria) { ?><span> &gt; </span><?=$subcategoria->descripcion;?><?php } ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php
			if (!empty($result)) {
			foreach ($result as $row) { ?>
				<div class="thumbnails">
					<a href="<?=base_url();?>show/products/<?=seoUrl($breadcrumb)?>/<?=seoUrl($row->descripcion)?>"><img src="<?=base_url();?>images/productos/<?=$row->url?>.jpg" alt="" /></a>
				</div>
			<?php } } ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 title">
			<?=$subcategoria->descripcion?>
		</div>
	</div>
	<div class="img-carousel">
		<?php foreach ($marcasSubcategoria as $row) { ?>
			<div class="brands-carousel">
				<div data-id="<?=$row->id?>" data-image="<?=$row->imagen?>" data-name="<?=$row->nombre?>" id="marca-<?=$row->id?>">
					<img src="<?=base_url();?>images/productos/logos/<?=seoUrl($row->nombre)?>.png" style="width:100%" />
					<!-- <img src="http://placehold.it/155x90" class="img-responsive"> -->
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="row" id="gallery">
		<div class="col-md-12 product-gallery">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-4">
						<!-- <img src="http://placehold.it/155x90" class="img-responsive"> -->
					</div>
					<div class="col-sm-8">
						<!-- <div>Tekscan's patented tactile force and pressure sensing solutions provide our customers with the actionable information they need to optimize product design and improve clinical and research outcomes. Our sensors and systems are used across a wide range of applications within test and measurement, medical, dental, and retail; as stand-alone solutions or as embedded technology to create better and differentiated products. Our passion for innovation, broad expertise and commitment to quality help turn your vision into reality.</div> -->
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<!-- <div class="col-md-4 col-sm-6">
						<a href="">
							<div>
								<div class="text">
								</div>
								<div class="image" style="http://placehold.it/155x90">
								</div>
								<div class="background">
								</div>
							</div>
						</a>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<div class="row hidden" id="product-details">
		<div class="col-md-12">
			<div class="container-fluid">
				<div class="row top-info">
					<div class="col-md-4">
						<div id="product-img">

						</div>
					</div>
					<div class="col-lg-4 col-md-8">
						<div class="product-info">
							<div id="category">

							</div>
							<div id="product-name">

							</div>
						</div>
						<div id="brand-img">

						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-lg-4 hidden-md hidden-sm hidden-xs">
						<div id="more-products">
							<div id="other-products"></div>
							<div id="other-products-carousel" class="container-fluid"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">

					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<span>
							<a href="<?=base_url();?>files/pdf/<?=$producto_id;?>/<?=$producto->file_pdf;?>">DESCARGAR ESPECIFICACIONES</a>
						</span>
						<span>
							<a href="javascript:void(0)" onclick="goBack();">VOLVER</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="marca_id" value="<?=$marca_id;?>">
<input type="hidden" id="producto_id" value="<?=$producto_id;?>">
<input type="hidden" id="url" value="<?=$this->uri->segment(4)?>">
<script type="text/javascript" defer>

	var marca;
	var categoria = '<?=$subcategoria->descripcion?>';
	var nombreMarca;
	var productosRelacionados;
	var carousel = 0;
	var url;

	$('.brands-carousel > div').click(function() {
		marca = $(this).data('image');
		nombreMarca = $(this).data('name');
		$(this).addClass('active');
		$(this).parent().siblings().find('.active').removeClass('active');
		$.ajax({
			method: "GET",
			url: "<?=base_url();?>show/getProducts/<?=seoUrl($breadcrumb);?>/<?=$url;?>/"+($(this).data('id'))
		}).done(function(data) {
			var json = $.parseJSON(data);
			productosRelacionados = json['productos'];
			var brandImg = '<img src="<?=base_url();?>images/productos/logos/'+json.productos[0].imagen+'.png" />';
			var brandText = '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>';

			var gallery = '';

			json['productos'].forEach(function(elem, index, array) {
				gallery += '<div class="col-md-4 col-sm-6"><a href="javascript:void(0)" onclick="showDetails('+elem.id+');" data-id="'+elem.id+'"><div><div class="image" style="background-size:100%;background-image:url(<?=base_url();?>files/images/'+elem.id+'/'+elem.file_img+')"></div><div class="background" style="height:40%"><div><div><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></div><div><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></div><div class="clearfix"></div></div><div>'+elem.nombre+'</div></div></div></a></div>';
			});
			if ($('#gallery').hasClass('hidden')) {
				$('#product-details').fadeOut(function() {
					$('#product-details').addClass('hidden');
					$('#gallery').removeClass('hidden');
					$('#gallery').fadeIn();
				});
			}

			$('.product-gallery').fadeOut(function() {
				$('.product-gallery > .container-fluid:first-child .col-sm-4').html(brandImg);
				$('.product-gallery > .container-fluid:first-child .col-sm-8').html(brandText);
				$('.product-gallery > .container-fluid:last-child .row').html(gallery);

				$('.product-gallery').fadeIn();

				$('.product-gallery .col-md-4 > a > div').mouseenter(function() {
					$(this).find('.background').stop();
					$(this).find('.background').animate({height: "100%"}, 300);
				});

				$('.product-gallery .col-md-4 > a > div').mouseleave(function() {
					$(this).find('.background').stop();
					$(this).find('.background').animate({height: "40%"}, 300);
				});
			})
		});

	});

function showProducts(id, callback) {
		marca = $(this).data('image');
		nombreMarca = $(this).data('name');
		$(this).addClass('active');
		$(this).parent().siblings().find('.active').removeClass('active');
		$.ajax({
			method: "GET",
			url: "<?=base_url();?>show/getProducts/categoria/"+url+"/"+id
		}).done(function(data) {
			var json = $.parseJSON(data);
			console.log(json);
			productosRelacionados = json['productos'];
			var brandImg = '<img src="<?=base_url();?>images/productos/logos/'+json.productos[0].imagen+'.png" />';
			var brandText = '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>';

			var gallery = '';

			json['productos'].forEach(function(elem, index, array) {
				gallery += '<div class="col-md-4 col-sm-6"><a href="javascript:void(0)" onclick="showDetails('+elem.id+');" data-id="'+elem.id+'"><div><div class="image" style="background-size:100%;background-image:url(<?=base_url();?>files/images/'+elem.id+'/'+elem.file_img+')"></div><div class="background" style="height:40%"><div><div><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></div><div><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></div><div class="clearfix"></div></div><div>'+elem.nombre+'</div></div></div></a></div>';
			});
			if ($('#gallery').hasClass('hidden')) {
				$('#product-details').fadeOut(function() {
					$('#product-details').addClass('hidden');
					$('#gallery').removeClass('hidden');
					$('#gallery').fadeIn();
				});
			}

			$('.product-gallery').fadeOut(function() {
				$('.product-gallery > .container-fluid:first-child .col-sm-4').html(brandImg);
				$('.product-gallery > .container-fluid:first-child .col-sm-8').html(brandText);
				$('.product-gallery > .container-fluid:last-child .row').html(gallery);

				$('.product-gallery').fadeIn();

				$('.product-gallery .col-md-4 > a > div').mouseenter(function() {
					$(this).find('.background').stop();
					$(this).find('.background').animate({height: "100%"}, 300);
				});

				$('.product-gallery .col-md-4 > a > div').mouseleave(function() {
					$(this).find('.background').stop();
					$(this).find('.background').animate({height: "40%"}, 300);
				});
			})
			callback+'()';
		});


	}



	function showDetails(id) {
		var carouselString = '';
		$(window).scrollTop(0);

		if (carousel) {
			$('#other-products-carousel').slick('unslick');
		}
		else {
			carousel = 1;
		}

		$.ajax({
			method: "GET",
			url: "<?=base_url();?>show/getProduct/"+id
		}).done(function(data) {
			console.log(data);
			var product = $.parseJSON(data);
			$('#product-details .container-fluid .col-md-12').html(product.descripcion);
			$('#product-name').html(product.nombre);
			$('#category').html(categoria);
			$('#brand-img').html('<img src="<?=base_url();?>images/productos/logos/'+marca+'.png"/>');
			$('#product-img').html('<img src="<?=base_url();?>files/images/'+id+'/'+product.file_img+'" />');
			$('#other-products').html('Otros productos <strong>'+nombreMarca+'</strong>');
			carouselString += '<div class="carousel-row">';
			var i = 0;
			productosRelacionados.forEach(function(elem, index, array) {
				if (i == 9) {
					i = 0;
					carouselString += '</div><div class="carousel-row">';
				}
				carouselString += '<div class="carousel-col"><a href="javascript:void(0)" onclick="changeProduct('+elem.id+');" data-id="'+elem.id+'"><div style="background-size:100%;background-image:url(<?=base_url();?>files/images/'+elem.id+'/'+elem.file_img+')">'+elem.nombre+'</div></a></div>';
				// carouselString += '<div class="carousel-col"><div> </div></div>';
				i++;
			});
			carouselString += '</div>';


			$('#gallery').fadeOut(function() {
				$('#gallery').addClass('hidden');
				$('#product-details').removeClass('hidden');
				$('#product-details').fadeIn(function(){
					$('#other-products-carousel').html(carouselString);
					$('#other-products-carousel').slick({
					  dots: false,
					  infinite: false,
					  speed: 300,
					  slidesToShow: 1,
					  slidesToScroll: 1,
						focusOnSelect: false,
						prevArrow: '<button type="button" class="slick-prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></button>',
						nextArrow: '<button type="button" class="slick-next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button>',
					  responsive: [
					    {
					      breakpoint: 1024,
					      settings: {
					        slidesToShow: 3,
					        slidesToScroll: 3,
					        infinite: true,
					        dots: false
					      }
					    },
					    {
					      breakpoint: 600,
					      settings: {
					        slidesToShow: 2,
					        slidesToScroll: 2
					      }
					    },
					    {
					      breakpoint: 480,
					      settings: {
					        slidesToShow: 1,
					        slidesToScroll: 1
					      }
					    }
					    // You can unslick at a given breakpoint now by adding:
					    // settings: "unslick"
					    // instead of a settings object
					  ]
					});
				});
			});
		});
	}

	function changeProduct(id) {
		$('#product-details').fadeOut(function() {
			$.ajax({
				method: "GET",
				url: "<?=base_url();?>show/getProduct/"+id
			}).done(function(data) {
				console.log(data);
				var product = $.parseJSON(data);
				$('#product-details .container-fluid .col-md-12').html(product.descripcion);
				$('#product-name').html(product.nombre);
				$('#category').html(categoria);
				$('#brand-img').html('<img src="<?=base_url();?>images/productos/logos/'+marca+'.png"/>');
				$('#product-img').html('<img src="<?=base_url();?>files/images/'+id+'/'+product.file_img+'" />');
				$('#other-products').html('Otros productos <strong>'+nombreMarca+'</strong>');
				$('#product-details').fadeIn();
			});
		});
	}

	function goBack() {
		$(window).scrollTop(0);
		$('#product-details').fadeOut(function() {
			$('#product-details').addClass('hidden');
			$('#gallery').removeClass('hidden');
			$('#gallery').fadeIn();
		});
	}

	var marca_id = $('#marca_id').val();
	var producto_id = $('#producto_id').val();
	url = $('#url').val();
	//alert(url);
	if(marca_id != 0 && producto_id != 0){
		//showProducts(marca_id, showDetails(producto_id));
		// $('#marca-'+marca_id).click();
		marca = $('#marca-'+marca_id).data('image');
		nombreMarca = $('#marca-'+marca_id).data('name');
		$('#marca-'+marca_id).addClass('active');
		$('#marca-'+marca_id).parent().siblings().find('.active').removeClass('active');
		$.ajax({
			method: "GET",
			url: "<?=base_url();?>show/getProducts/categoria/"+url+"/"+marca_id
		}).done(function(data) {
			var json = $.parseJSON(data);
			console.log(json);
			productosRelacionados = json['productos'];
			var brandImg = '<img src="<?=base_url();?>images/productos/logos/'+json.productos[0].imagen+'.png" />';
			var brandText = '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>';
			var gallery = '';
			json['productos'].forEach(function(elem, index, array) {
				gallery += '<div class="col-md-4 col-sm-6"><a href="javascript:void(0)" onclick="showDetails('+elem.id+');" data-id="'+elem.id+'"><div><div class="image" style="http://placehold.it/155x90"></div><div class="background" style="height:40%"><div><div><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></div><div><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></div><div class="clearfix"></div></div><div>'+elem.nombre+'</div></div></div></a></div>';
			});
			// if ($('#gallery').hasClass('hidden')) {
			// 	$('#product-details').hide(function() {
			// 		$('#product-details').addClass('hidden');
			// 		$('#gallery').removeClass('hidden');
			// 		$('#gallery').show();
			// 	});
			// }

			$('.product-gallery > .container-fluid:first-child .col-sm-4').html(brandImg);
			$('.product-gallery > .container-fluid:first-child .col-sm-8').html(brandText);
			$('.product-gallery > .container-fluid:last-child .row').html(gallery);

			$('.product-gallery').show();

			$('.product-gallery .col-md-4 > a > div').mouseenter(function() {
				$(this).find('.background').stop();
				$(this).find('.background').animate({height: "100%"}, 300);
			});

			$('.product-gallery .col-md-4 > a > div').mouseleave(function() {
				$(this).find('.background').stop();
				$(this).find('.background').animate({height: "40%"}, 300);
			});
			showDetails(producto_id);
		});
	}
</script>
