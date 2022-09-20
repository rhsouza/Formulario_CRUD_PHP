<html>
	  <form method="post" style="text-align: center;">
	  <fieldset>
	  <legend><b>ALTERAR CADASTRO</b></legend><br>
	  	<p><b>VISUALIZANDO ID: <?php echo $_REQUEST['id'] ?> </b></p>
		  <label for="txNome"><b>Nome:</b></label> <?php echo $_REQUEST['nome'] ?><br>
		  <label for="txLogin"><b>Login:</b></label> <?php echo $_REQUEST['login'] ?><br>
		  <label for="txStatus"><b>Status:</b></label> <?php echo $_REQUEST['status'] ?><br>

		  <button name ="btnExcluir">Excluir</button>
		  <button name ="btnListarUsuarios">Listar Usuários</button>
		  <button name ="btnMenu">Retornar ao Menu</button>
		  <button name ="btnSair">Sair</button>
	  </fieldset>
	  </form>
</html>	  
<?php

	session_start();
	include "conexao.php";
	
	if (isset($_SESSION['conexao'])){
		
		if (isset($_POST["btnExcluir"])){

			mysqli_query(conexao(), "DELETE FROM usuarios where id = ". $_REQUEST["id"]);
			echo '<script type="text/javascript">alert("Usuário removido do banco de dados"); window.location.href = "listausuario.php"</script>';
			
		}else if (isset($_POST["btnListarUsuarios"])){
				header("Location: listausuario.php");

		}else if (isset($_POST["btnMenu"])){
			header("Location: menu.php");
			
		}else if (isset($_POST["btnSair"])){
			unset($_SESSION['conexao']);
			echo '<script type="text/javascript">alert("Sessão Encerrada!"); window.location.href = "login.php"</script>';
		}
			
	}
	
	
?>