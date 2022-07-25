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
           if(isset($Id_Catégorie) && isset($Libelle_Catégorie)){

                //requête d'ajout
                $req = mysqli_query($con , "INSERT INTO categorie VALUES('$Id_Catégorie', '$Libelle_Catégorie')");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: categorie.php");
                }else {//si non
                    $message = "categorie non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
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
        <form action="" method="POST">
            <label>Id_Catégorie</label>
            <input type="text" name="Id_Catégorie">
            <label>Libelle_Catégorie</label>
            <input type="text" name="Libelle_Catégorie">

            <input type="submit" value="Ajouter" name="button">
        </form>
        <br>
        <a href="categorie.php" class="back_btn">Retour</a>
    </div>