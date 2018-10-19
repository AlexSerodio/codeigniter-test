<!DOCTYPE html>
<html>
	<head>
		<title>Entrar</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container">
				<?php 
					echo '<h2>Bem Vindo - ' . $this->session->userdata('login') . '</h2>';
					echo '<label><a href="'.base_url().'index.php/store/create">Cadastrar novo</a></label> | '; 
					echo '<label><a href="'.base_url().'index.php/user/logout">Sair</a></label>';
				?>
			</div>
		</nav>
		<div class="container">
			<?php echo form_open('store/search'); ?>
				<legend>Estabelecimentos Cadastrados</legend>
				<div class="form-group">
					<div class="col-lg-10">
						<input type="text" name="search-title" placeholder="Digite um CEP" class="form-control input-md">
					</div>
					<button type="submit" name="search-button" class="btn btn-primary">Procurar</button>
				</div>
			<?php echo form_close(); ?>

			<table id="table" class="table table-striped table-bordered">
			    <thead>
			        <tr>
			            <th>Nome</th>
			            <th>Endereço</th>
			            <th>CEP</th>
			        </tr>
			    </thead>
			    <tbody>
			        <?php foreach ($store as $store_item): ?>
			            <tr>
				            <td><?php echo $store_item['name']; ?></td>
				            <td><?php echo $store_item['address']; ?></td>
			                <td><?php echo $store_item['zipcode']; ?></td>
			            </tr>
			        <?php endforeach; ?>
			    </tbody>
			</table>
		</div>
	</body>
</html>