<?php require_once('components/navbar.php');
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){ 
    if(isset($_POST) && !empty($_POST)){
        $nom_categorie = $_POST['nom_categorie'];
        addCategorie($nom_categorie);
        header("location:newArticle.php");
    }
}else{
    header('location:404.php');
}
?>
<h1 class="container d-flex justify-content-center mt-3">AJOUTER UNE CATEGORIE</h1>
<form action="" method="post" class="d-flex align-items-center">
    <div class="formArticle">
        <input type="text" name='nom_categorie' placeholder='Nouvelle Catégorie' class="m-3" style= "width:100%">
        <div class="btnLog">
            <input type="submit" value="PUBLIER" style="width:50%">
        </div>
    </div>
</form>
<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){ ?>
     <h4 class="d-flex justify-content-center mt-5">
          <a href="newArticle.php" class="btn btn-warning">Retourner à la création d'article</a>
     </h4>
<?php } ?>
<div class="container d-flex flex-wrap justify-content-center mt-5">
    <?php foreach($categories as $categorie){ ?>
        <button class="btn btn-outline-info m-2"><a href="categorie.php?id=<?php echo $categorie['id']?>"><?php echo $categorie['nom_categorie']?></a></button>
    <?php } ?>
</div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
