<!DOCTYPE html>
<html>
<head>
	<title>Entrar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">

	</nav>
	<div class="container">
		<div class="row-centered">
			<div class="col-md-5 col-sm-offset-3">
				<?php 
					$attributes = array('id' => 'login_form', 'name' => 'login_form', 'class' => 'form-horizontal');
					echo form_open('User/login_validation', $attributes); 
				?>
					<fieldset>
						<div class="form-group">
							<label for="username" class="col-lg-2 control-label">Usuário</label>
							<div class="col-lg-10">
								<input type="text" name="username" class="form-control" />
							</div>
							<span class="text-danger"><?php echo form_error('username'); ?></span>
						</div>
						<div class="form-group">
							<label for="password" class="col-lg-2 control-label">Senha</label>
							<div class="col-lg-10">
								<input type="password" name="password" class="form-control" />
							</div>
							<span class="text-danger"><?php echo form_error('password'); ?></span>
						</div>
						<div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button type="submit" name="login" class="btn btn-primary">Entrar</button> 
								<?php echo $this->session->flashdata("error"); ?>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
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