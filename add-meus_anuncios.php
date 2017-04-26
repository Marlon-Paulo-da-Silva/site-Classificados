<?php require 'pages/header.php'; ?>
<?php 
if(empty($_SESSION['cLogin']))
{
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit();
}
?>

<div class="container">
	<h1>Adicionar Anúncios</h1>

	<form action="" method="Post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="categoria">Categoria:</label>
			<select name="categoria" id="categoria" class="form-control">
				<?php
				require 'classes/categorias.class.php';

				$cat = new Categorias();
				$categorias = $cat->getLista();

				foreach ($categorias as $categoria):
					?>
				<option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nome'] ?></option>
				<?php
				endforeach;
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="titulo">Titulo:</label>
			<input type="text" name="titulo" id="titulo" class="form-control">
		</div>
		<div class="form-group">
			<label for="valor">Valor:</label>
			<input type="text" name="valor" id="valor" class="form-control">
		</div>
		<div class="form-group">
			<label for="descricao">Descrição:</label>
			<textarea type="text" name="descricao" id="descricao" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="estado">Estado de Conservação:</label>
			<select name="estado" id="estado" class="form-control">
				<option value="0">Ruim</option>
				<option value="1">Bom</option>
				<option value="2">Otimo</option>
				<option value="3">Nunca usado</option>
			</select>
		</div>
		<button class="btn btn-default" type="submit">Adicionar Anuncio</button>
	</form>
</div>

<?php require 'pages/footer.php'; ?>