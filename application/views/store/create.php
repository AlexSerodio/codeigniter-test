<!DOCTYPE html>
	<html>
	<head>
		<title>Cadastrar</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container">
				<label><a href= <?php echo base_url('index.php/store') ?>>Lista de Estabelecimentos</a></label> | 
				<label><a class='logout' href=<?php echo base_url('index.php/user/logout') ?>>Sair</a></label>
			</div>
		</nav>
		<div class="container">
			<form id="store_form" method="POST" action="<?php echo base_url('store/create'); ?>" >
				<legend>Cadastro de Novo Estabelecimento Comercial</legend>
				<div class="form-group">
				    <label for="name">Nome</label>
				    <input type="text" name="name" class="form-control" />
				</div>
				<div class="form-group">
				    <label for="zipcode">CEP</label>
				    <input type="text" name="zipcode" class="form-control" onblur="searchZipcode(this.value);"/>
				</div>
				<div class="form-group">
				    <label for="address">Endereço</label>
				    <input type="text" name="address" id="address" class="form-control" />
				</div>
				<div class="form-group">
				    <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
					<span id='error-message' class='text-danger'></span>
				</div>
			</form>
		</div>
	</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">

	jQuery.validator.addMethod("exactlength", function(value, element, param) {
		return this.optional(element) || value.length == param;
	}, $.validator.format("Informe um valor com exatamente {0} dígitos."));

	jQuery.extend(jQuery.validator.messages, {
    	required: "Campo obrigatório.",
    	digits: "Informe apenas dígitos.",
    	rangelength: jQuery.validator.format("Informe um valor entre {0} e {1} caracteres.")
    });

	$(document).ready(function(){
		// $.ajax({
		// 	url:  '/codeignitor-test/index.php/user/validateLogin',
		// 	type: 'POST',
		// 	headers: { "authorization-token": localStorage.getItem('token') },
		// 	success: function(result){
		// 		alert("Está logado");
		// 	},
		// 	error: function(result) {
		// 		window.location.href = '/codeignitor-test/index.php/user';
		// 	}
		// });

		$("a.logout").click(function() {
			localStorage.removeItem('token');
		});

		$("#store_form").validate({
			rules: {
				name: {
					required: true,
					rangelength: [2,20]
				},
				zipcode: {
					required: true,
					digits: true,
					exactlength: 8
				},
				address: {
					required: true
				}
			},
			submitHandler: function(form) {
				$.ajax({
					url:  $(form).attr('action'),
					type: 'POST',
					data: $(form).serialize(),
					headers: { "authorization-token": localStorage.getItem('token') },
					success: function(result){
						window.location.href = '/codeignitor-test/index.php/store';
					},
					error: function(result) {
						$('#error-message').text('Cadastro não efetuado. Logue-se para poder realizar o cadastro.');
						$(form).trigger("reset");
					}
				});
				return false;
			}
		});
	});

    function searchZipcode(fieldValue) {
        var zipcode = fieldValue.replace(/\D/g, '');
        if (zipcode != "") {
            var validateZipcode = /^[0-9]{8}$/;

            if(validateZipcode.test(zipcode)) {
                document.getElementById('address').value="...";
                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/'+ zipcode + '/json/?callback=address_callback';
                document.body.appendChild(script);
            } else {
                clean_zipcode_form();
            }
        } else {
            clean_zipcode_form();
        }
    }

    function clean_zipcode_form() {
        document.getElementById('address').value=("");
    }

    function address_callback(callbackData) {
        if (!("erro" in callbackData)) {
            var address = callbackData.logradouro + ', ' + callbackData.bairro + ', ' + callbackData.localidade + ', ' + callbackData.uf; 
            document.getElementById('address').value=(address);
        } else {
            clean_zipcode_form();
            alert("CEP não encontrado.");
        }
    }
</script>