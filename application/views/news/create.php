<!DOCTYPE html>
	<html>
	<head>
		<title>Cadastrar</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<h2>Cadastro de Estabelecimentos Comerciais</h2>
			<?php echo validation_errors(); ?>

			<?php 
				$attributes = array('id' => 'store_form');
				echo form_open('store/create', $attributes); 
			?>
				<div class="form-group">
				    <label for="name">Nome</label>
				    <input type="text" name="name" class="form-control" /><br />
				</div>
			    <label for="address">Endereço</label>
			    <input type="text" name="address" class="form-control" /><br />

			    <div class="form-group">
				    <label for="zipcode">CEP</label>
				    <input type="text" name="zipcode" class="form-control" /><br />
				</div>
				<div class="form-group">
				    <input type="submit" name="cadastrar" value="Cadastrar" />
				</div>
			</form>
			<?php
			echo '<h2>Bem Vindo - ' . $this->session->userdata('login') . '</h2>';
			echo '<label><a href="'.base_url().'index.php/store">Lista de Estabelecimentos</a></label><br />'; 
			echo '<label><a href="'.base_url().'index.php/user/logout">Sair</a></label><br />';
			?>
		</div>
	</body>
</html>
<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		console.log("teste");
	});	
</script>