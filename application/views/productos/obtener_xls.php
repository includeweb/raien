<?php
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=$filename");
?>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<th>id</th>
				<th>Nombre</th>
				<th>tipo</th>
				<th>Descripcion</th>
				<th>imagen</th>
				<th>pdf</th>	
			<tr>
		</thead>

		<tbody>
			<?php foreach ($products->result() as $product) {?>
			<tr>
				<td><?=$product->id?></td>
				<td><?=$product->name?></td>
				<td><?=$product->type?></td>
				<td><?=$product->description?></td>
				<td><?=base_url('files/pdf/'.$product->file_pdf)?></td>
				<td><?=base_url('files/images/'.$product->file_img)?></td>
			</tr>
			<?php }?>
		</tbody>

	</table>
</body>
</html>	