<?php
  session_start();
  require 'config.php';

  if(empty($_SESSION['logado'])){
  	header("Location:login.php");
  	exit;
  }

 $sql = $pdo->query("SELECT * FROM usuarios WHERE id = '".addslashes($_SESSION['logado'])."'");

if($sql->rowCount() > 0){
	$info = $sql->fetch();
    $email = $info['email'];
    $codigo = $info['codigo'];

}

?>

<h1>Area interna do sistema</h1>
<p>Usuario:<?php echo $email;?> - <a href="sair.php">Sair</a></p></br>
<p>Codigo: http://localhost/js/cadastrar.php?codigo=<?php echo $codigo;?></p>
