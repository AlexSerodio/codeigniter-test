<!DOCTYPE html>
<html>
<head>
	<title>Entrar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<?php echo form_open('Pages/login_validation'); ?>
		<!--<form method="post" action="<?php //echo base_url() ?>Pages/login_validation">-->
			<div class="from-group">
				<label>Usuário</label>
				<input type="text" name="username" class="form-control" />
				<span class="text-danger"><?php echo form_error('username'); ?></span>
			</div>
			<div class="from-group">
				<label>Senha</label>
				<input type="password" name="password" class="form-control" />
				<span class="text-danger"><?php echo form_error('password'); ?></span>
			</div>
			<div class="from-group">
				<input type="submit" name="entrar" value="Entrar" />
				<?php echo $this->session->flashdata("error"); ?>
			</div>
		</form>
	</div>
</body>
</html>