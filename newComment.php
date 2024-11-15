<?php require_once('components/navbar.php');
if(isset($_POST)&& !empty($_POST)){
    $user_id = $_POST['auteurCom'];
    $commentaire = $_POST['commentaire'];
    $article_id = $_POST['article_id'];
    newComment($commentaire, $article_id, $user_id);
    header("location:article.php?id=". $article_id);
}else{
    header('location:404.php');
}

?>

