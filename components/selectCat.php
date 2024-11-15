<?php 
$allCategorie = allCategorie();
?>
<select name="categorieId" id="categorieId" class="m-3" style= "width:40%">
    <option value="0">Choisir Catégorie</option>
    <?php foreach($allCategorie as $categorie){ ?>
        <option  value="<?php echo $categorie["id"]?>"><?php echo $categorie["nom_categorie"]?></option>    
    <?php } ?>
</select>






