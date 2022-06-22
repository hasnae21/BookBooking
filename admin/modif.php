<?php
$title = 'Admin Dashboard';

include 'init.php';
include $tpd . 'connect.php';
include $tpl . 'header.inc';
include 'navbar.php';

//on récupère le id dans le lien
$id = $_GET['id'];

//requête pour afficher les infos d'un employé
$req = mysqli_query($con, "SELECT * FROM livre WHERE ISBN = $id ");
$row = mysqli_fetch_assoc($req);



//vérifier que le bouton ajouter a bien été cliqué
if (isset($_POST['button'])) {
    //extraction des informations envoyé dans des variables par la methode POST
    extract($_POST);
    //verifier que tous les champs ont été remplis
    if (isset($ISBN) && isset($Titre) && isset($Auteur) && 
    isset($Maison_d_edition) && isset($Nbr_page) &&isset($Sommaire) &&
     isset($l_Edition) && $Id_Catégorie) {

        //requête de modification
        $req = mysqli_query($con, "UPDATE livre SET 
        ISBN = '$ISBN' , Titre = '$Titre' ,  Auteur = '$Auteur' ,
        Maison_d_edition = '$Maison_d_edition' , Nbr_page = '$Nbr_page' ,  
        Sommaire = '$Sommaire' , l_Edition = '$l_Edition' , Id_Catégorie = '$Id_Catégorie' ,
        WHERE id = $id");

        if ($req) { 
            header("location: index.php");
        } else { //si non
            $message = "livre non modifié";
        }
    } else {
        //si non
        $message = "Veuillez remplir tous les champs !";
    }
}
?>

<div class="form">
    
    <p class="erreur_message">
        <?php

        if (isset($message)) {
            echo $message;
        }
        ?>
    </p>

    <form action="" method="POST">
        <label>ISBN</label>
        <input type="text" name="ISBN" value="<?= $row['ISBN'] ?>">
        <label>Titre</label>
        <input type="text" name="Titre" value="<?= $row['Titre'] ?>">
        <label>Auteur</label>
        <input type="text" name="Auteur" value="<?= $row['Auteur'] ?>">
        <label>Maison d'edition</label>
        <input type="text" name="Maison_d_edition" value="<?= $row['Maison_d_edition'] ?>">
        <label>Nombre de pages</label>
        <input type="number" name="Nbr_page" value="<?= $row['Nbr_page'] ?>">
        <label>Sommaire</label>
        <input type="text" name="Sommaire" value="<?= $row['Sommaire'] ?>">
        <label>Edition</label>
        <input type="number" name="l_Edition" value="<?= $row['l_Edition'] ?>">
        <label>Catégorie</label>
        <input type="text" name="Id_Catégorie" value="<?= $row['Id_Catégorie'] ?>">

        <input type="submit" value="Modifier" name="button">
    </form>
    
    <br>
    <a href="index.php" class="back_btn">Retour</a>
</div>