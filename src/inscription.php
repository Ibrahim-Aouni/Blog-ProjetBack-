<?php 

if (!empty($_POST['submit'])) {

    $name =htmlspecialchars($_POST['username']) ;

    $password = htmlspecialchars($_POST['password']);
   
    $email = $_POST['email'];
    //var_dump($email);

    $password_hashed=password_hash($password,PASSWORD_DEFAULT);

    $pdo = new PDO("mysql:host=database:3306;dbname=php_db", "root", "password");

    $query = $pdo->prepare("INSERT INTO user (username,password,email) VALUES (?,?,?)");

    $query->execute(array($name,$password_hashed,$email));

    header('location:login.php');
}


