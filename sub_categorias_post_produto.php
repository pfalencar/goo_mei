<?php include_once("conexao.php");
      session_start();

   

	$id_categoria = $_REQUEST['id_categoria'];
	$idusuario = $_SESSION['id_usuario']; 
	
	$result_sub_cat = "SELECT * FROM estoque WHERE id_usuario = '$idusuario' AND id_estoque = '$id_categoria' ORDER BY descricaoEstoque";
	$resultado_sub_cat = mysqli_query($conexao, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'id'	=> $row_sub_cat['preco'],
			'nome_sub_categoria' => utf8_encode($row_sub_cat['preco']),

		);
	}
	
	echo(json_encode($sub_categorias_post));