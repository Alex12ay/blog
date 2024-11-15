<?php

require_once('components/navbar.php');
?>
<div  class="text-center mt-5">
     <h1>MyBlog</h1>
     <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
          $session= $_SESSION['user']; ?>
          <p class="mt-5" style="font-size:20px">Bienvenue<a href="pageUser.php?id=<?php echo $session['id']?>"style="color:blue"><?php echo ' '. $session['pseudo'];?></a></p>
     <?php } ?>
</div>
<div class="container">
     <div class="row justify-content-center">
<?php require_once('components/card.php')?>
</div>
</div></a>



   
<?php require_once('components/footer.php')?>