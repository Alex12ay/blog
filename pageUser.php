<?php
require_once('components/navbar.php'); 
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
$articlesByUser = getAllArticlesByUser($id);
$getName = getName($id);

}else{
    header('location:404.php');
}

?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div>
            
            <h1 class="text-center" style="text-transform:uppercase"><?php echo "Article créer par :".' '.$getName['pseudo']?></h1>
        </div>
        <?php foreach($articlesByUser as $article){ 

            $date = new DateTime($article['date']);
            $nvFormat = $date->format('d-m-y');?>
            <div class="card m-3" style="width: 18rem">
                <img src="<?php echo $article['images']?>" class="card-img-top mt-2" alt="image" width="90%" height="50%">
                <div class="card-body  d-flex justify-content-center flex-column align-items-center">
                    <h2 id="test3" class="card-title"style="text-transform:uppercase"><?php echo $article['titre_article']?></h2>
                    <p class="card-text"><?php echo $article['texte_article'];?></p>
                    <div class="dateCard">
                        <p><?php echo $nvFormat;?></p>
                    </div>
                    <a href="article.php?id=<?php echo $article['articleId']?>" class="btn btn-warning">Voir plus</a>
                </div>
            </div>
            <div class="mod">
                <div class="modA">Modifier
                <p>Delete</p>
            </div>
        <?php } ?>
    </div>
</div>


<?php require_once('components/footer.php')?>