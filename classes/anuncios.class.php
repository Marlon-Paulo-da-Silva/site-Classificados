<?php 

class Anuncios{
	public function getMeusAnuncios(){
		global $pdo;

		$array = array();
		$sql = $pdo->prepare("SELECT 
			*,
			(select anuncios_imagens.url from anuncios_imagens where anuncios_imagens.id_anuncio = anuncios.id limit 1) as url 
			from anuncios
			where id_usuario = :id_usuario");
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->execute();

		if($sql->rowCount() > 0)
			$array = $sql->fetchAll();

		return $array;
	}

	public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado){
		global $pdo;

		$sql = $pdo->prepare("INSERT INTO anuncios set id_categoria = :id_categoria ,id_usuario = :id_usuario, titulo = :titulo, descricao = :descricao, valor = :valor, estado = :estado");
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":estado", $estado);
		$sql->execute();


	}

	public function deleteAnuncio($id){
		global $pdo;


		$sql = $pdo->prepare("DELETE from anuncios_imagens where id_anuncio = :id_anuncio");
		$sql->bindValue(":id_anuncio", $id);
		$sql->execute();

		$sql = $pdo->prepare("DELETE from anuncios where id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

	}

	public function getAnuncio($id){
		$array = array();
		global $pdo;


		$sql = $pdo->prepare("SELECT * from anuncios where id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();



		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $id){
		global $pdo;
		$sql = $pdo->prepare("UPDATE anuncios set titulo = :titulo, id_categoria = :categoria, descricao = :descricao, valor = :valor, estado = :estado where anuncios.id = :id");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":categoria",$categoria);
		$sql->bindValue(":valor",$valor);
		$sql->bindValue(":descricao",$descricao);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":id",$id);
		$sql->execute();
	}
}

?>
