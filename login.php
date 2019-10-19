<?php
  session_start();
  require 'config.php';


if(isset($_POST['email']) && !empty($_POST['email'])){
    
   $email = addslashes($_POST['email']);
   $senha = md5(addslashes($_POST['senha']));
   
   $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
   $sql->bindValue(":email",$email);
   $sql->bindValue(":senha",$senha);
   $sql->execute();
   
   if($sql->rowCount() > 0){
   	   $info = $sql->fetch();
   	   $_SESSION['logado'] = $info['id'];
       header("Location:index.php");
   }else{
   	   echo"Usuario nao cadastrado!";
   }
}


?>


<h3>Login</h3>
<fieldset>
  <form method="POST">
     E-mail:</br>
     <input type="email" name="email"></br></br>
     Senha:</br>
     <input type="password" name="senha"></br></br>
     <input type="submit" value="Logar"> - <a href="cadastrar.php">Cadastrar</a>
  </form>
</fieldset>
