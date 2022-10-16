<?php

 //var_dump(!empty($_POST['submit']));

if(!empty($_POST['username']) && !empty($_POST['password'])){

//    var_dump($name,$password);

  $name =htmlspecialchars($_POST['username']);
  $name = filter_input(INPUT_POST, 'username');

  $password = htmlspecialchars($_POST['password']);

    $pdo = new PDO("mysql:host=database:3306;dbname=php_db", "root", "password");

    $query = $pdo->prepare("SELECT * FROM user where username = :name");

    $query ->execute([
      ":name" => $name,
    ]);

    $state=$query->fetch(PDO::FETCH_ASSOC);
    //echo 'Habibi';
    if($query->rowCount() == 0){

      //echo "cet utilisateur n'existe pas";
      
    }
    //var_dump($query, $query->rowCount());
    if($query->rowCount() == 1){
      if(password_verify($password,$state['password'])){
        session_start();
        $_SESSION['id'] = $state['id'];
        $_SESSION['username'] = $state['username'];
        header('Location: publicationpage.php');
        
        //echo 'Le mot de passe est valide !';

  
    } else {
        
        //echo 'Le mot de passe est invalide.';
  
    }

  

    


    }


}