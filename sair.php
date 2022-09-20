<?php 
	session_start();
	unset($_SESSION['conexao']);
	echo '<script type="text/javascript">alert("Sessão Encerrada!"); window.location.href = "login.php"</script>';
?>