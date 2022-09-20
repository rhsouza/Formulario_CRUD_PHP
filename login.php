<?php

	session_start();
	include "conexao.php";

$login = <<<html
	  <form method="post" style="text-align: center;">
	  <fieldset>
	  <legend><b>CONECTAR</b></legend><br>
		  <label for="txUsuario">Usuário:</label>
		  <input type="text" name="usuario" id="txUsuario" required />
		  <label for="txSenha">Senha:</label>
		  <input type="password" name="senha" id="txSenha" required/><br><br><br>

		  <button name ="btnAcesso">Login</button>
		  <button name ="btnCancelar">Cancelar</button>
	  </fieldset>
	  </form>
html;

	echo $login;
	
	if (isset($_POST["btnAcesso"])){
		
		if (isset($_POST["usuario"]) and isset($_POST["senha"])){
			
			$usuario = $_POST["usuario"];
			$senha = $_POST["senha"];
			
			$query = mysqli_query(conexao(), "SELECT status FROM usuarios where login = '". $_POST["usuario"] ."' and senha = '" .  $_POST["senha"] ."'");

			$dados = mysqli_fetch_array($query);

				if ($dados['status'] == 1){
					$_SESSION['conexao'] = 'conectado';
					header("Location: menu.php");
				}else{
					echo "Login/Senha incorreta!";
				}
			
		} else {
			echo "Preencha os campos para continuar";
		}
	}
	
	if (isset($_POST["btnCancelar"])){

			unset($_SESSION['conexao']);
			echo "Preencha os campos para continuar";
	}
	
	
?>