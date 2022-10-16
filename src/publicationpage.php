<?php
session_start();
$pdo = new PDO("mysql:host=database:3306;dbname=php_db", "root", "password");
//echo $_SESSION['id'];
if (!isset($_SESSION['id']))
{
    header('location: login.php');
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Style/blogpost.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php

$query = $pdo->prepare("SELECT * FROM post Left join user on user.id=post.user_id");


$query->execute([]);

$posts = $query->fetchAll(PDO::FETCH_ASSOC);

if(count($posts) > 0)
{
    foreach($posts as $post) {
        echo ' 
                <article class="blogpost">
                    <h3 >' . $post['titre'] . ', par '. $_SESSION['username'] .'</h3>
                    <p >'. $post['texte'] .'</p>
                    <button>Supprimer<button>
                </article>';
    }
}
?>
<header>

</header>
<div class="publication">
    <article class="blogpost">
            <form method="post" >
                <label for="newTitre">Titre :</label>
                <input type="text" name="newTitre">
                <textarea style="width: 100%; height: 50%; resize:none" rows="5" cols="30" name="postTexte" class="postTexte" placeholder="Entrez votre texte ici"></textarea>
                <button class="createPost" name="creer">Créer</button>
            </form>
        </article>
</div>

    <?php 
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['creer']))
    {
        $titre = filter_input(INPUT_POST, 'newTitre');

        $texte = filter_input(INPUT_POST, 'postTexte');

        if(!empty($titre) && !empty($texte) && isset($_SESSION['id']))
        {

            try {
                

                $query = $pdo->prepare("INSERT INTO post (titre, texte, user_id) VALUES (:titre, :texte, :user_id)");

                $query->execute([
                    ":titre" => $titre,
                    ":texte" => $texte,
                    ":user_id" => $_SESSION['id'],
                ]);
            }
            catch (Exception $e)
            {
                echo 'Erreur ! ' . $e;
            }
        }
    }
} 

    
    ?>

    
</body>
</html>