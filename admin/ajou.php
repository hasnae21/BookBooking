<?php
$title = 'Admin Dashboard';

include 'init.php';
include $tpd . 'connect.php';
include $tpl . 'header.inc';
include 'navbar.php';

       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if (isset($ISBN) && isset($Titre) && isset($Auteur) && 
           isset($Maison_d_edition) && isset($Nbr_page) &&isset($Sommaire) &&
            isset($Edition) && $Id_Catégorie) {

                //requête d'ajout
                $req = mysqli_query($con , "INSERT INTO livre 
                VALUES(NULL,'$ISBN, '$Titre', '$Auteur','$Maison_d_edition',
                '$Maison_d_edition','$Nbr_page','$Sommaire',
                '$l_Edition', '$Id_Catégorie')");

                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "Livre non ajouté";
                }

           }else {
               //si non
               $message = "Erreur";
           }
       }
    
    ?>
    <div class="form">
        <p class="erreur_message">
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>

    <form action="" method="POST" >
            <input type="text" name="ISBN" placeholder="ISBN"><br>
            <input type="text" name="Titre" placeholder="Titre"><br>
            <input type="text" name="Auteur" placeholder="Auteur"><br>
            <input type="text" name="Maison_d_edition" placeholder="Maison d'edition"><br>
            <input type="number" name="Nbr_page" placeholder="Nombre de pages"><br>
            <input type="text" name="Sommaire" placeholder="Sommaire"><br>
            <input type="number" name="Edition" placeholder="Edition"><br>
            <input type="text" name="Id_Catégorie" placeholder="Id Catégorie"><br>
            <input type="submit" value="Ajouter" name="button">
    </form>
    <br>
    <a href="index.php" class="back_btn">Retour</a>
</div>