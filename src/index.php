<?php  include 'test.php'; 



?>
<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="UTF-8">
    <link href="/Style/index.css" rel="stylesheet">
    <title>Coucou</title>

</head>
<body>

<?php
#$filter_email=filter_input(INPUT_POST,"email");
#$filter_username=filter_input(INPUT_POST,"username");
#$filter_password=filter_input(INPUT_POST,"password");
$pdo = new PDO("mysql:host=database:3306;dbname=php_db", "root", "password");

?>
<div class="login">
    <form method="POST" >
    <h1>Inscription</h1>
    <br>
    <br>
    <div>
    <label>Nom d'utilisateur</label>

    <input type="text"  name="username" placeholder="Nom d'utilisateur" required>

    </div>

    
    <br>
    <div>

    <label>Email</label>

    <input type="email"  name="email" placeholder="email" required>

    </div>
    <br>
    <div>

    <label>Mot de passe</label>

    <input type="password"  name="password" placeholder="Mot de passe" required>

    </div>
    <br>
    <div>

    <input type="submit" id='submit' name="submit" value='LOGIN' >

    </div>
</form>
</div>




</body>
</html>