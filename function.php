<?php 
function dbconnect(){
    try{
        $dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        return $dbh;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}


function addUser($nom, $prenom, $pseudo, $email, $password){
    $dbh = dbconnect();
    $query = "INSERT INTO users(nom, prenom, pseudo, email, password)
    VALUES (:nom, :prenom, :pseudo, :email, :password)";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':nom', $nom);
    $stmt -> bindParam(':prenom', $prenom);
    $stmt -> bindParam(':pseudo', $pseudo);
    $stmt -> bindParam(':email', $email);
    $stmt -> bindParam(':password', $password);
    $stmt ->execute();
}

function loginUser($email){
    $dbh = dbconnect();
    $query = "SELECT email, password, id, pseudo FROM users WHERE email = :email";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt -> FETCH(PDO::FETCH_ASSOC);
    return $result;
}

function addArticle($categorieId, $title, $texte, $userId){
    $dbh = dbconnect();
    $query = "INSERT INTO articles(categorie_id, titre_article, texte_article, user_id) 
    VALUES (:categorieId, :titre_article, :texte, :user_id)";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':categorieId', $categorieId);
    $stmt->bindParam(':titre_article', $title);
    $stmt ->bindParam(':texte', $texte);
    $stmt ->bindParam(':user_id', $userId);
    $stmt->execute();
    return $dbh ->lastInsertId();

}
function addImage(){
    $dbh = dbconnect();
    $query = "INSERT INTO images(chemin_image) VALUES (:formFile)";
    $stmt = $dbh->prepare($query);
    $stmt ->bindParam(':formFile', $image);
    $stmt->execute();
}

function getAllArticles(){
    $dbh = dbconnect();
    $query = "SELECT * FROM articles";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;

}
function getArticleById($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM articles JOIN categorie ON articles.categorie_id = categorie.id
    WHERE articles.articleId = :id";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':id', $id);
    $stmt -> execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function getNameCategorie($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM categorie WHERE id= :id";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':id', $id);
    $stmt -> execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function getUser($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM users  
    JOIN articles ON users.id = articles.user_id where categorie_id = :id" ;
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':id', $id);
    $stmt ->execute();
    $results= $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
function getCommentaire($articleid){
    $dbh = dbconnect();
    $query = "SELECT * FROM articles 
    JOIN users ON articles.user_id = users.id
    JOIN comment ON comment.article_id =articles.articleId
    JOIN users AS test ON comment.user_id = test.id
    WHERE articles.articleId = :articleid";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':articleid', $articleid);
    $stmt ->execute();
    $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getAllArticlesByCatId($id){
    $dbh = dbconnect();
    $query = "SELECT categorie_id, titre_article, texte_article, images, date, user_id, articleId FROM articles
    JOIN categorie ON articles.categorie_id = categorie.id
    WHERE categorie.id = :id";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':id', $id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;

}
function getAllArticlesByUser($id){
    $dbh = dbconnect();
    $query = "SELECT categorie_id, titre_article, texte_article, images, date, user_id, articleId FROM articles
    JOIN users ON articles.user_id = users.id
    WHERE users.id = :id";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':id', $id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getName($id){
    $dbh = dbconnect();
    $query = "SELECT pseudo FROM users
    WHERE users.id = :id";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':id', $id);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
function newComment($commentaire, $article_id, $user_id){
    $dbh = dbconnect();
    $query = "INSERT INTO comment(commentaire, article_id, user_id) 
    VALUES (:commentaire, :article_id, :user_id);";
     $stmt = $dbh->prepare($query);
     $stmt -> bindParam(':commentaire', $commentaire);
     $stmt -> bindParam(':article_id', $article_id);
     $stmt -> bindParam(':user_id', $user_id);
     $stmt ->execute();
}

function allCategorie(){
    $dbh = dbconnect();
    $query = "SELECT * FROM categorie";
    $stmt = $dbh->prepare($query);
    $stmt ->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function addCategorie($nom_categorie){
    $dbh = dbconnect();
    $query = "INSERT INTO categorie(nom_categorie) VALUES (:nom_categorie)";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':nom_categorie', $nom_categorie);
    $stmt ->execute();
}

function saveImage($files, $articleId){
    $dbh = dbconnect();
    $req = $dbh->prepare('UPDATE articles SET images = :file WHERE articleId = :articleId');
    $req-> bindParam(':file', $files);
    $req->bindParam(':articleId', $articleId);
    $req->execute();
}

function getCategorie(){
    $dbh = dbconnect();
    $query = "SELECT * FROM categorie";
    $stmt = $dbh->prepare($query);
    $stmt ->execute();
    $results = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    return $results; 
}
function modTitre($titreA, $articleId){
    $dbh = dbconnect();
    $query = 'UPDATE articles SET titre_article = :titreA WHERE articleId = :articleId';
    $stmt = $dbh -> prepare($query);
    $stmt -> bindParam(':titreA', $titreA);
    $stmt -> bindParam(':articleId', $articleId);
    $stmt ->execute();
}
?>