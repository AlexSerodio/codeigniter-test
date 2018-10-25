<!DOCTYPE html>
<html>
<head>
	<title>Entrar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<h1 class="text-center">Sisteminha Feliz :)</h1>
		</div>
	</nav>
	<div class="container">
		<div class="row-centered">
			<div class="col-md-5 col-sm-offset-3">

				<form id="login_form" class="form-horizontal" method="POST" action="<?php echo base_url('user/login_validation'); ?>" >
					<fieldset>
						<legend>Entrar</legend>
						<div class="form-group">
							<label for="username" class="col-lg-2 control-label">Usuário</label>
							<div class="col-lg-10">
								<input type="text" name="username" placeholder="admin" class="form-control" />
							</div>
							<span class="text-danger"><?php echo form_error('username'); ?></span>
						</div>
						<div class="form-group">
							<label for="password" class="col-lg-2 control-label">Senha</label>
							<div class="col-lg-10">
								<input type="password" name="password" placeholder="admin" class="form-control" />
							</div>
							<span class="text-danger"><?php echo form_error('password'); ?></span>
						</div>
						<div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button type="submit" name="login" id="login" class="btn btn-primary">Entrar</button>
								<span id='error-message' class='text-danger'></span>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">

	jQuery.extend(jQuery.validator.messages, {
    	required: "Campo obrigatório.",
    	rangelength: jQuery.validator.format("Informe um valor entre {0} e {1} caracteres.")
    });

	$(document).ready(function(){
		$("#login_form").validate({
			rules: {
				username: {
					required: true,
					rangelength: [2,20]
				},
				password: {
					required: true,
					rangelength: [5,20]
				}
			},
			submitHandler: function(form){
				$.ajax({
					url:  $(form).attr('action'),
					type: 'POST',
					data: $(form).serialize(),
					//beforeSend: function() {
					//	"<?php  ?>"
					//},
					success: function(result){
						localStorage.setItem('token', result['success']);
						window.location.href = 'store/';
					},
					error: function(result) {
						$('#error-message').text('Usuário ou senha inválido.');
						$(form).trigger("reset");
					}
				});
				return false;
			}
		});
	});
</script>
