
<?php require "pages/header.php"; ?>

<?php require 'classes/anuncios.class.php';
$an = new Anuncios(); 

$total_anuncio = $an->getTotalAnuncios();
$total_empresas = $an->getTotalUsuarios();
?>



<div class="container-fluid">
	<div class="jumbotron">
		<h2>Nós temos para hoje <?php echo $total_anuncio; ?> offertas</h2>
		<p>Mais de <?php echo $total_empresas; ?> empresas cadastradas</p>
	</div>
	<div class="row">
		<div class="col-sm-3"><h4>Pesquisa Avançada</h4></div>
		<div class="col-sm-9"><h4>Últimos Anúncios</h4></div>
	</div>
</div>

<?php require "pages/footer.php"; ?>
