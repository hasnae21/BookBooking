<?php
$title = 'Admin Dashboard';

include 'init.php';
include $tpd. 'connect.php';
include $tpl. 'header.inc';
include  'navbar.php';
?>

<div class="container">
    
    <table>
        <tr id="items">
            <th>Id categorie</th>
            <th>Libelle de la Catégorie </th>

        </tr>
        <?php
        //requête pour afficher la liste des employés
        $req = mysqli_query($con, "SELECT * FROM categorie");

        if (mysqli_num_rows($req) == 0) {
            //s'il n'existe pas de donnees dans la base de donné , alors on affiche ce message :
            echo "Il n'y a pas encore de livres ajouter !";
        } else {
            //si non , affichons la liste complete
            while ($row = mysqli_fetch_assoc($req) ) {
        ?>
                <tr>
                    <td><?= $row['Id_Catégorie'] ?></td>
                    <td><?= $row['Libelle_Catégorie'] ?></td>

                    <td><a href="modif1.php?id=<?=$row['Id_Catégorie']?>" class="Btn_addd">  Modifier </a></td>
                    <td><a href="suprim1.php?id=<?=$row['Id_Catégorie']?>"  class="Btn_addd">  Supprimer </a></td>
                </tr>

        <?php
            }}
        ?>

</table>

<br><br><br>
<a href="ajou1.php"  class="Btn_add">  Ajouter </a>


</div>
<?php include $tpl . 'footer.inc'; ?>