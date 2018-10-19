<!DOCTYPE html>
	<html>
	<head>
		<title>Cadastrar</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container">
				<?php
					echo '<h2>Bem Vindo - ' . $this->session->userdata('login') . '</h2>';
					echo '<label><a href="'.base_url().'index.php/store">Lista de Estabelecimentos</a></label> | ';
					echo '<label><a href="'.base_url().'index.php/user/logout">Sair</a></label>';
				?>
			</div>
		</nav>
		<div class="container">
			<?php echo validation_errors(); ?>

			<?php 
				$attributes = array('id' => 'store_form');
				echo form_open('store/create', $attributes); 
			?>
				<legend>Cadastro de Novo Estabelecimento Comercial</legend>
				<div class="form-group">
				    <label for="name">Nome</label>
				    <input type="text" name="name" class="form-control" />
				</div>
				<div class="form-group">
				    <label for="zipcode">CEP</label>
				    <input type="text" name="zipcode" class="form-control" onblur="pesquisacep(this.value);"/>
				</div>
				<div class="form-group">
				    <label for="address">Endereço</label>
				    <input type="text" name="address" id="address" class="form-control" />
				</div>
				<div class="form-group">
				    <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</body>
</html>

<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
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
				form.submit();
			}
		});
	});

    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;

            if(validacep.test(cep)) {
                document.getElementById('address').value="...";
                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            } else {
                limpa_formulário_cep();
            }
        } else {
            limpa_formulário_cep();
        }
    }

    function limpa_formulário_cep() {
            document.getElementById('address').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            var address = conteudo.logradouro + ', ' + conteudo.bairro + ', ' + conteudo.localidade + ', ' + conteudo.uf; 
            document.getElementById('address').value=(address);
        } else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
</script>