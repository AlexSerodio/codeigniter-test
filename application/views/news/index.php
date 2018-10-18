<!DOCTYPE html>
<html>
	<head>
		<title>Entrar</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<h2><?php echo $title; ?></h2>

			<!--<form action="<?php //echo site_url('news/search') ?>" method='post'>-->
			<?php echo form_open('News/search'); ?>
				<input type="text" name="search-title">
				<input type="submit" name="submit" value="Procurar">
			</form>

			<table id="table" class="table table-striped table-bordered">
			    <thead>
			        <tr>
			            <th>Nome</th>
			            <th>Endereço</th>
			            <th>CEP</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach ($news as $store_item): ?>
			            <tr>
				            <td><?php echo $store_item['name']; ?></td>
				            <td><?php echo $store_item['address']; ?></td>
			                <td><?php echo $store_item['zipcode']; ?></td>
			            </tr>
			        <?php endforeach; ?>
			    </tbody>
			</table>
			<?php 
				echo '<label><a href="'.base_url().'index.php/news/create">Cadastrar novo</a></label><br />'; 
				echo '<label><a href="'.base_url().'index.php/pages/logout">Sair</a></label><br />';
			?>
		</div>
	</body>
</html>