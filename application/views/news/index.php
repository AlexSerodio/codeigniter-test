<!DOCTYPE html>
<html>
	<head>
		<title>Entrar</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-default">

		</nav>
		<div class="container">
			<h2><?php echo $title; ?></h2>

			<?php echo form_open('store/search'); ?>
				<div class="form-group">
					<input type="text" name="search-title" id="search_box" class="form-control input-lg typeahead">
					<input type="submit" name="submit" value="Procurar">
				</div>
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
				echo '<label><a href="'.base_url().'index.php/store/create">Cadastrar novo</a></label><br />'; 
				echo '<label><a href="'.base_url().'index.php/user/logout">Sair</a></label><br />';
			?>
		</div>
	</body>
</html>