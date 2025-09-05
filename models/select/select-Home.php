<?php
# Selection des Articles publier
$statut = 0;
$publication=0;
$getArticle = $connexion->prepare("SELECT * FROM `article` WHERE article.statut=? AND article.publication=? ORDER BY article.id DESC LIMIT 10;");
$getArticle->execute([$statut,$publication]);
if(isset($_GET['Article'])){
    $IdArticle = $_GET['Article'];
    if(!empty($IdArticle)){
        $getSelectedArt = $connexion->prepare("SELECT * FROM `article` WHERE article.id=?;");
        $getSelectedArt->execute([$IdArticle]);
    }else{
        header("Location: index.php");
    }
}
# Selection des Articles populaires