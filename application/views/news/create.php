<h2><?php echo $title; ?></h2>


<?php echo validation_errors(); ?>

<?php echo form_open('news/create'); ?>

    <label for="name">Nome</label>
    <input type="text" name="name" /><br />

    <label for="address">Endereço</label>
    <input type="text" name="address" /><br />

    <label for="zipcode">CEP</label>
    <input type="text" name="zipcode" /><br />

    <input type="submit" name="cadastrar" value="Cadastrar" />

</form>
<?php
echo '<h2>Bem Vindo - ' . $this->session->userdata('username') . '</h2>';
echo '<label><a href="http://localhost/index.php/pages/logout">Sair</a></label><br />';
?>