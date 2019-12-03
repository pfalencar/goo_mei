<?php include_once("conexao.php");
      session_start();

   

	$id_categoria = $_REQUEST['id_categoria'];
	$idusuario = $_SESSION['id_usuario']; 
	
	$result_sub_cat = "SELECT * FROM servico WHERE id_usuario = '$idusuario' AND id_servico = '$id_categoria' ORDER BY descricaoservico";
	$resultado_sub_cat = mysqli_query($conexao, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'id'	=> $row_sub_cat['precoservico'],
			'nome_sub_categoria' => utf8_encode($row_sub_cat['precoservico']),

		);
	}
	
	echo(json_encode($sub_categorias_post));