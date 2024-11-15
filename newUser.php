<?php require_once('components/navbar.php');
if(isset($_POST)&& !empty($_POST)){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    addUser($nom, $prenom, $pseudo, $email, $passwordHash);
    header("location:login.php");
}else{
    header('location:404.php');
}

?>
<div class="container">
<h1 class="m-4 text-center">S'Inscrire</h1>
<form action="" method="post" class="d-flex align-items-center" >
    <div id="formUser">
        <div class="nomForm">
            <input type="text" placeholder="Nom" name="nom">
            <input type="text" placeholder="Prenom" name="prenom">
        </div>
        <input class="inputForm" type="text" placeholder="Pseudo" name="pseudo">
        <input class="inputForm"type="email" placeholder="Email" name="email">
        <input class="inputForm"type="password" placeholder="Mot de Passe" name="password">
        <div class="btn_inscription">
            <input type="submit" value="INSCRIPTION" class="btn btn-warning" id="btnForm">
        </div>
    </div>
</form>
</div>
    <?php   
    require_once('components/footer.php');?>
            

