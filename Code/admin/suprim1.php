<?php
$title = 'Admin Dashboard';

include 'init.php';
include $tpd. 'connect.php';
include $tpl. 'header.inc';
include 'navbar.php';
?>

<div class="form">
            <?php 
            $Id_Catégorie= $_GET['id'];
            //requête de suppression
            $req = mysqli_query($con , "DELETE FROM categorie WHERE Id_Catégorie = $Id_Catégorie");
            //redirection vers la page index.php
            header("Location: categorie.php");
            ?>
        
    <br>
    <a href="index.php" class="back_btn">Retour</a>
</div>