<!DOCTYPE html>
<html>
<head>
	<title>Entrar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</head>
<body>
	<div class="container">
		<?php 
			$attributes = array('id' => 'login_form', 'name' => 'login_form');
			echo form_open('Pages/login_validation', $attributes); 
		?>
			<div class="form-group">
				<label for="username">Usuário</label>
				<input type="text" name="username" class="form-control" />
				<span class="text-danger"><?php echo form_error('username'); ?></span>
			</div>
			<div class="form-group">
				<label for="password">Senha</label>
				<input type="password" name="password" class="form-control" />
				<span class="text-danger"><?php echo form_error('password'); ?></span>
			</div>
			<div class="form-group">
				<input type="submit" name="login" value="Entrar" />
				<?php echo $this->session->flashdata("error"); ?>
			</div>
		</form>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		console.log("teste");

		$("#login_form").validate({
			rules: {
				username: {
					required: true,
					rangelength: [4,20]
				},
				password: {
					required: true,
					rangelength: [4,20]
				}
			},
			submitHandler: function(form) {
				form.submit();
			}
		});
	});
</script>