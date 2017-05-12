
<?php require "pages/header.php"; ?>

<?php require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
$an = new Anuncios();
$us = new Usuarios();

if(isset($_GET['id']) && !empty($_GET['id'])){
	$id = addslashes($_GET['id']);
}else{
	?>
	<script type="text/javascript">window.location.href="index.php"</script>
	<?php
}

$info = $an->getAnuncio($id);
?>



<div class="container-fluid">


	<div class="row">
		<div class="col-sm-4">
			...
		</div>
		<div class="col-sm-8">
			...
		</div>
	</div>
</div>
<?php require "pages/footer.php"; ?>
