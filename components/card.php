<?php
require_once("function.php");
$articles = getAllArticles();


foreach($articles as $article){
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
<?php } ?>
