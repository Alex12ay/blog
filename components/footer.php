<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){ ?>
     <h4 class="d-flex justify-content-center mt-5">
          <a href="newArticle.php" class="btn btn-warning">Ajouter un Article</a>
     </h4>
<?php } ?>

<div class="footer">
    <div class="container d-flex flex-wrap justify-content-center mt-5">
        <?php foreach($categories as $categorie){ ?>
                <button class="btn btn-outline-danger m-2 mt-5" style="text-transform:uppercase"><a href="categorie.php?id=<?php echo $categorie['id']?>"><?php echo $categorie['nom_categorie']?></a></button>
            <?php } ?>
    </div>
    <?php if(empty($_SESSION['user'])){ ?>
        <h4 class="d-flex justify-content-center mt-5 pb-5" style="color:white">CONNECTE-TOI POUR AJOUTER OU COMMENTER UN ARTICLE
        </h4>
    <?php } ?>
</div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

