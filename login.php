<?php  require_once('components/navbar.php');

if(isset($_POST) && !empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = loginUser($email);
    if($user){
        $registered_password = $user['password'];
        $isCredentialsOK = password_verify($password, $registered_password);
        if($isCredentialsOK){
            session_start();
            $_SESSION['user'] = [
                'id' =>$user['id'],
                'email'=>$user['email'],
                'pseudo' => $user['pseudo'],
                
            ];
            header('location:index.php');
        }else{
            echo 'Mauvais mot de passe';
        }
    }else{
        echo 'mauvais identifiant';
    }
}else{
    header('location:404.php');
}

?>
<div class="container">
<h1 class="m-4 text-center">Se Connecter</h1>
<form action="" method="post" class="d-flex align-items-center">
    <div class="formArticle">
        <input type="email" placeholder="Email" name="email"class="inputForm">
        <input type="password" placeholder="Mot de Passe" name="password"class="inputForm">
        <div class="btnLog">
            <input type="submit" value="CONNEXION" class="btn btn-warning" id="btnForm">
        </div>
    </div>
</form>

<?php require_once('components/footer.php');?>