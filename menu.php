<?php
	session_start();
	include "conexao.php";
	
	$menu = <<<html
	  <form method="post" style="text-align: center;">
	  <fieldset>
	  <legend><b>MENU</b></legend><br>
		  <button name ="btnListarUsuarios">Listar Usuários</button>
		  <button name ="btnCadastrarUsuarios">Cadastrar Usuários</button>
		  <button name ="btnSair">Sair</button>
	  </fieldset>
	  </form>
html;

	echo $menu;

	if ( isset ($_SESSION['conexao'])){
		
		if (isset($_POST["btnListarUsuarios"])){
			header("Location: listausuario.php");
			
		}else if (isset($_POST["btnCadastrarUsuarios"])){
			header("Location: cadastrausuario.php");
			
		}else if (isset($_POST["btnSair"])){
			unset($_SESSION['conexao']);
			echo '<script type="text/javascript">alert("Sessão Encerrada!"); window.location.href = "login.php"</script>';
		}
	
	}else{
		
		header("Location: login.php");
	}

?>