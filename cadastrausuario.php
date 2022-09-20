<?php

	session_start();
	include "conexao.php";

$cadastrausuario = <<<html
	  <form method="post" style="text-align: center;">
	    <fieldset>
	      <legend><b>CADASTRO DE USUÁRIOS</b></legend><br>
		  <label for="txUsuario">Nome:</label>
		  <input type="text" name="nome" id="txNome"/>
		  <label for="txSenha">Login:</label>
		  <input type="text" name="login" id="txLogin"/>
		  <label for="txUsuario">Senha:</label>
		  <input type="password" name="senha" id="txSenha" />
		  <label for="txSenha">Status:</label>
		  <input type="checkbox" name="status" id="txLogin" class="slider" checked><br><br><br>
	      <button name ="btnGravar">Cadastrar usuário</button>
	      <button name ="btnApagar">Apagar Formulário</button>
	      <button name ="btnMenu">Retornar ao Menu</button>
	      <button name ="btnSair">Sair</button>	  
	    </fieldset>
	  </form>
html;

	echo $cadastrausuario;
	
	if (isset ($_SESSION['conexao'])){
		
		if (isset($_POST["btnGravar"])){
			if (isset($_POST["nome"], $_POST["login"], $_POST["senha"]) and !empty($_POST["nome"]) and !empty($_POST["login"]) and !empty($_POST["senha"])){
				$status = isset($_POST["status"]) ? 1 : 0;
				mysqli_query(conexao(), "INSERT INTO usuarios(nome, login, senha, status) VALUES ('".$_POST["nome"]."','".$_POST["login"]."','".$_POST["senha"]."',".$status.")");
				echo 'Usuário cadastrado com sucesso!';
			}else{
				echo 'Preencha todos os campos';
				
			}
		
		}else if (isset($_POST["btnApagar"])){
			return null;
			
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