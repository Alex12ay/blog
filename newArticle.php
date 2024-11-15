<?php require_once('components/navbar.php');

if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    if(isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $file = $_FILES['file'];
        $tmpName = $file['tmp_name'];
        $name = $file['name'];
        $size = $file['size'];
        $error = $file['error'];
 
    }
    if(isset($_POST) && !empty($_POST)) {
        $categorieId = $_POST['categorieId'];
        $title = $_POST['titre_article'];
        $texte = $_POST['texte'];
        $userId = $_SESSION['user']['id'];
        $articleId = addArticle($categorieId, $title, $texte, $userId);

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        $extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $maxSize = 400000;

        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
            $uniqueName = uniqid('', true);
            $files = $uniqueName.'.'.$extension; 
            $filePath = 'upload/' . $files;
            (move_uploaded_file($tmpName, './upload/' . $files));
                saveImage($filePath, $articleId);
                header("location:article.php?id=$articleId");
        }else{
            echo "Mauvaise extension";
        }          
    }else{
        echo "Erreur lors du téléchargement de l'image.";
    }
}else{
    header('location:404.php');
}

?>
<h1 class="container d-flex justify-content-center mt-5">AJOUTER UN ARTICLE</h1>
<form action="" method="post" enctype="multipart/form-data" class="container d-flex flex-wrap column align-items-center">
    <div class="formArticle">
        <input type="hidden" name="articleId" value="<?php echo $articleId; ?>">        
        <input class="inputForm" type="text" name='titre_article' placeholder='Titre' class="m-3" style= "width:100%">
        <div>
            <input class="inputForm" type="text" name='texte'placeholder='Votre texte'class="m-3" style= "width:100% ;height:10em">
            <?php require_once("components/selectCat.php")?>
            <a href="addCategorie.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
            <path d="M8 0q-.264 0-.523.017l.064.998a7 7 0 0 1 .918 0l.064-.998A8 8 0 0 0 8 0M6.44.152q-.52.104-1.012.27l.321.948q.43-.147.884-.237L6.44.153zm4.132.271a8 8 0 0 0-1.011-.27l-.194.98q.453.09.884.237zm1.873.925a8 8 0 0 0-.906-.524l-.443.896q.413.205.793.459zM4.46.824q-.471.233-.905.524l.556.83a7 7 0 0 1 .793-.458zM2.725 1.985q-.394.346-.74.74l.752.66q.303-.345.648-.648zm11.29.74a8 8 0 0 0-.74-.74l-.66.752q.346.303.648.648zm1.161 1.735a8 8 0 0 0-.524-.905l-.83.556q.254.38.458.793l.896-.443zM1.348 3.555q-.292.433-.524.906l.896.443q.205-.413.459-.793zM.423 5.428a8 8 0 0 0-.27 1.011l.98.194q.09-.453.237-.884zM15.848 6.44a8 8 0 0 0-.27-1.012l-.948.321q.147.43.237.884zM.017 7.477a8 8 0 0 0 0 1.046l.998-.064a7 7 0 0 1 0-.918zM16 8a8 8 0 0 0-.017-.523l-.998.064a7 7 0 0 1 0 .918l.998.064A8 8 0 0 0 16 8M.152 9.56q.104.52.27 1.012l.948-.321a7 7 0 0 1-.237-.884l-.98.194zm15.425 1.012q.168-.493.27-1.011l-.98-.194q-.09.453-.237.884zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a7 7 0 0 1-.458-.793zm13.828.905q.292-.434.524-.906l-.896-.443q-.205.413-.459.793zm-12.667.83q.346.394.74.74l.66-.752a7 7 0 0 1-.648-.648zm11.29.74q.394-.346.74-.74l-.752-.66q-.302.346-.648.648zm-1.735 1.161q.471-.233.905-.524l-.556-.83a7 7 0 0 1-.793.458zm-7.985-.524q.434.292.906.524l.443-.896a7 7 0 0 1-.793-.459zm1.873.925q.493.168 1.011.27l.194-.98a7 7 0 0 1-.884-.237zm4.132.271a8 8 0 0 0 1.012-.27l-.321-.948a7 7 0 0 1-.884.237l.194.98zm-2.083.135a8 8 0 0 0 1.046 0l-.064-.998a7 7 0 0 1-.918 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
            </svg></a>
        </div>
        <input class="form-control my-4" type="file" name="file"  placeholder="Choissez votre image">
        <div class="text-center">
            <input type="submit" value="PUBLIER" class="btn btn-warning w-50">
        </div>
    </div>
</form>

<div class="container d-flex flex-wrap justify-content-center mt-5">
    <?php foreach($categories as $categorie){ ?>
        <button class="btn btn-outline-info m-2"><a href="categorie.php?id=<?php echo $categorie['id']?>"><?php echo $categorie['nom_categorie']?></a></button>
    <?php } ?>
</div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



