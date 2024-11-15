<?php 

require_once('components/navbar.php'); 

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $article = getArticleById($id);
}else {
    header('location:404.php');
}
$categorie = getNameCategorie($article['id']);
 $users = getUser($article['id']);
 $coms = getCommentaire($id);
$date = new DateTime($article['date']);
$nvFormat = $date->format('d-m-y');


?>
    <div class="container mt-5 w-50">
        <div class="contImage">
            <img src="<?php echo $article['images']?>" width="60%" alt="image" class="image">
        </div>
        <h1 class="title_card"><?php echo $article['titre_article'];?></h1>
        <h4 class="texteArticle m-0"><?php echo $article['texte_article'] ?></h4>
        <div class="cat ">
            <p><a href="categorie.php?id=<?php echo $categorie['id'] ?>"class=categorie_card><?php echo $categorie['nom_categorie']?></a></p>
        <div id="detail">
            <div id="detailDate">
                <p class="m-0">Date:</p>
                <p class="date"><?php echo $nvFormat;?></p>
            </div>
            <div id="detailUser">
                <p class="m-0">Créateur:</p>
                <p><a href="pageUser.php?id=<?php echo $users['id']?>" class="author"><?php echo $users['pseudo']?></a></p>
            </div>
        </div>
        <div class="sous_classe">Commentaire:<br/>
            <?php foreach($coms as $com){ 
                $comNv = new DateTime($com['date']);
                $comNvFormat = $date->format('d-m-y');?>
                <div class="commentaire">
                    <h5><?php echo $com["commentaire"] ?><br/></h5>
                    
                    <div id="comDate">
                        <p ><a href="pageUser.php?id=<?php echo $com['id']?>"id="authorCom"><?php echo $com['pseudo']?></a></p>
                        <div>
                            <p class="m-0">Date:</p>
                            <p class="dateCom"><?php echo $comNvFormat?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                $session= $_SESSION['user']; ?>
            <h6 class="my-3">Ajouter un commentaire</a></h6>
            <form action="newComment.php" method="post" id="formCom" >
                <input type="hidden" name="article_id" value="<?php echo $id?>">
                <textarea name="commentaire" id="zoneCommentaire" style='width:100%' required></textarea>
                <input type="hidden" value="<?php echo $session['id'] ?>"name="auteurCom">
                <input type="submit" class="btn btn-secondary d-flex justify-content center w-25 mb-5" value="ENVOYER">
            </form>
            <?php }?>
        </div>
    </div>
    </div>
    <?php require_once('components/footer.php')?>
    </body>
</html>