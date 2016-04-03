<script>
$(document).ready(function(){
	
});
</script>
<div class="bs-example" data-example-id="simple-carousel"> 
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
		<div class="carousel-inner" role="listbox">  
		
		<?php foreach($rs->result() as $foto){?>
			<div class="item active">
				<img src="<?=base_url('files/images/'.$id.'/'.$foto->file_img)?>" data-holder-rendered="true" >
			</div>
		<?php }?>
		<?php foreach($rs1->result() as $foto1){?>
			<div class="item">
				<img src="<?=base_url('files/images/'.$id.'/'.$foto1->filename)?>" data-holder-rendered="true">
			</div>
		<?php }?>

		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 
		<span class="sr-only">Previous</span> </a> 
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> 
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> 
		<span class="sr-only">Next</span> </a> 
	</div> 
</div>