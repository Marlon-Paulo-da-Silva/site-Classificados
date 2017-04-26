<?php require "pages/header.php" ?>
<?php 
if(empty($_SESSION['cLogin'])){
	?>
	<script type="text/javascript">window.location.href="login.php"</script>
	<?php
	exit();
}

?>
<div class="container">
	<h1>Meus Anuncios</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Titulo</th>
				<th>Valor</th>
				<th>Ações</th>
				<th>Estado</th>
			</tr>
		</thead>
	</table>

	<?php require "classes/anuncios.class.php" 
	$anu = new Anuncios();
	$anuncios = $anu->getMeusAnuncios();

	?>
</div>

<?php require "pages/footer.php" ?>