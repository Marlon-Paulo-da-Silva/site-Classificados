
<?php require "pages/header.php"; ?>

<?php require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
$an = new Anuncios();
$us = new Usuarios();
$total_anuncio = $an->getTotalAnuncios();
$total_empresas = $us->getTotalUsuarios();

$anuncios = $an->getUltimosAnuncios();

?>



<div class="container-fluid">
	<div class="jumbotron">
		<h2>Nós temos para hoje <?php echo $total_anuncio; ?> offertas</h2>
		<p>Mais de <?php echo $total_empresas; ?> empresas cadastradas</p>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<h4>Pesquisa Avançada</h4>
		</div>
		<div class="col-sm-9">
			<h4>Últimos Anúncios</h4>
			<table class="table table-striped">
				<tbody>
					<?php foreach($anuncios as $anuncio): ?>
						<tr>
							<td>
								<?php if(empty($anuncio['url'])): ?>
									<img src="assets/images/default.png" border="0"  height="100"/>
								<?php else: ?>
									<img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" class="foto_redimensionada" border="0" width="100" height="100"/>
								<?php endif; ?>
							</td>
							<td>
								<a href="produto.php?id=<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo']; ?></a><br />
								<?php echo $anuncio['categoria'] ?>
							</td>
							<td>
								R$ <?php echo number_format($anuncio['valor'], 2); ?>
							</td>
						</tr>

					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php require "pages/footer.php"; ?>
