
<?php require "pages/header.php"; ?>

<?php require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
$an = new Anuncios();
$us = new Usuarios();
$total_anuncio = $an->getTotalAnuncios();
$total_empresas = $us->getTotalUsuarios();

$pagina_atual = 1;

if(isset($_GET['pagina_atual']) && !empty($_GET['pagina_atual'])){
	$pagina_atual = addslashes($_GET['pagina_atual']);
}

$por_pagina = 2;

$total_paginas = ceil($total_anuncio / $por_pagina);

$anuncios = $an->getUltimosAnuncios($pagina_atual, $por_pagina);

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
			<ul class="pagination">
				<?php for ($q=0; $q < $total_paginas ; $q++):?>
					<li class="<?php echo ($pagina_atual == ($q+1))?'active':'' ?>"><a href="index.php?pagina_atual=<?php echo ($q+1); ?>"><?php echo ($q+1); ?></a></li>
				<?php endfor; ?>
			</ul>
		</div>
	</div>
</div>

<?php require "pages/footer.php"; ?>
