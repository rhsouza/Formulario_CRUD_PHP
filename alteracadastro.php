<html>
	  <form method="post" style="text-align: center;">
	  <fieldset>
	  <legend><b>ALTERAR CADASTRO</b></legend><br>
	  	<p><b>VISUALIZANDO ID: <?php echo $_REQUEST['id'] ?> </b></p>
		  <label for="txNome">Nome:</label>
		  <input type="text" name="nome" id="txNome" value = "<?php echo $_REQUEST['nome'] ?>"/><br>
		  <label for="txLogin">Login:</label>
		  <input type="text" name="login" id="txLogin" value = "<?php echo $_REQUEST['login'] ?>"/><br>
		  <label for="txSenha">Senha:</label>
		  <input type="password" name="senha" id="txSenha" /><br>
		  <label for="txSenha">Status:</label>
		  <input type="checkbox" name="status" id="txLogin" class="slider" <?php echo isset($_REQUEST["status"]) ? 'checked' : ''; ?>><br><br><br>
		  <button name ="btnAlterar">Alterar</button>
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
		
		if (isset($_POST["btnAlterar"])){

			$nome = isset($_POST["nome"]) ? $_POST["nome"] : $_REQUEST["nome"];
			$login = isset($_POST["login"]) ? $_POST["login"] : $_REQUEST["login"];
			$status = isset($_POST["status"]) ? 1 : 0;

			if (isset($_POST["senha"]) & !empty($_POST["senha"])){
				mysqli_query(conexao(), "UPDATE usuarios set nome = '". $nome ."', login = '". $login ."', senha = '". $_POST["senha"] ."', status = ". $status ." where id = ". $_REQUEST["id"]);
				echo '<script type="text/javascript">alert("Dados atualizados!"); window.location.href = "listausuario.php"</script>';
			
			}else{
				mysqli_query(conexao(), "UPDATE usuarios set nome = '". $nome ."', login = '". $login ."', status = ". $status ." where id = ". $_REQUEST["id"]);
				echo '<script type="text/javascript">alert("Dados atualizados!"); window.location.href = "listausuario.php"</script>';
			
			}
		} 
		
		else if (isset($_POST["btnListarUsuarios"])){
			header("Location: listausuario.php");

		}else if (isset($_POST["btnMenu"])){
			header("Location: menu.php");
			
		}else if (isset($_POST["btnSair"])){
			unset($_SESSION['conexao']);
			echo '<script type="text/javascript">alert("Sessão Encerrada!"); window.location.href = "login.php"</script>';
		}
			
	}else{
		
		header("Location: login.php");
	}
	
	
?>