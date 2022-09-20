<?php

	session_start();
	include "conexao.php";

$listausuario = <<<html
	  <form method="post" style="text-align: center;" >
	  <fieldset>
	  <legend><b>LISTA DE USUÁRIOS</b></legend><br>
	  <button name ="btnMenu">Retornar ao Menu</button>
	  <button name ="btnSair">Sair</button>	  
	  </fieldset>
	  </form>
html;

	echo $listausuario;

	if (isset ($_SESSION['conexao'])){
		
		$query = mysqli_query(conexao(), "SELECT * FROM usuarios");
		
		echo '<table border="1" style="width: 100%; text-align: center;">   <tr><th>ID</th><th>NOME</th><th>LOGIN</th><th>STATUS</th><th>ALTERAR CADASTRO</th><th>EXCLUIR CADASTRO</th></tr>';
		while($dados = mysqli_fetch_array($query))
		{
			$nome = str_replace(' ', '%20', $dados["nome"]);
			echo '<tr><td>'.$dados["id"].'</td>';
			echo '<td>'.$dados["nome"].'</td>';
			echo '<td>'.$dados["login"].'</td>';
			echo '<td>'.$dados["status"].'</td>';
			echo '<td><a href=alteracadastro.php?id='.$dados["id"].'&nome='.$nome.'&login='.$dados["login"].'&status='.$dados["status"].'><button>Alterar</button></td>';
			echo '<td><a href=deletarcadastro.php?id='.$dados["id"].'&nome='.$nome.'&login='.$dados["login"].'&status='.$dados["status"].'><button>Excluir</button></td></tr>';

		}
		
		echo '</table>';
		
		if (isset($_POST["btnMenu"])){
			header("Location: menu.php");
			
		}else if (isset($_POST["btnSair"])){
			unset($_SESSION['conexao']);
			echo '<script type="text/javascript">alert("Sessão Encerrada!"); window.location.href = "login.php"</script>';
		}
		
	}else{
		
		header("Location: login.php");
	}
	

?>