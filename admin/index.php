<?php
$title = 'Admin Dashboard';

include 'init.php';
include $tpd. 'connect.php';
include $tpl. 'header.inc';
include 'navbar.php';
?>


<div class="container">

    <table>
        <tr id="items">
            <th>ISBN</th>
            <th>Titre </th>
            <th>Auteur</th>
            <th>Maison d'edition</th>
            <th>Nombre de pages</th>
            <th>Sommaire</th>
            <th>Edition</th>
            <th>Catégorie</th>
            <th></th>
        </tr>
        <?php
        //requête pour afficher la liste des employés
        $req = mysqli_query($con, "SELECT * FROM livre");
        $reqq = mysqli_query($con, "SELECT * FROM categorie");

        if (mysqli_num_rows($req) == 0 && mysqli_num_rows($reqq) == 0 ) {
            //s'il n'existe pas de donnees dans la base de donné , alors on affiche ce message :
            echo "Il n'y a pas encore de livres ajouter !";
        } else {
            //si non , affichons la liste complete
            while($roww = mysqli_fetch_assoc($reqq) ){
            while ($row = mysqli_fetch_assoc($req)) {
        ?>
                <tr>
                    <td><?= $row['ISBN'] ?></td>
                    <td><?= $row['Titre'] ?></td>
                    <td><?= $row['Auteur'] ?></td>
                    <td><?= $row['Maison_d_edition'] ?></td>
                    <td><?= $row['Nbr_page'] ?></td>
                    <td><?= $row['Sommaire'] ?></td>
                    <td><?= $row['l_Edition'] ?></td>
                    <td><?= $roww['Libelle_Catégorie'] ?></td>

                    <td><a href="modif.php?id=<?=$row['ISBN']?>" class="Btn_addd">  Modifier </a>
                    <a href="suprim.php?id=<?=$row['ISBN']?>"  class="Btn_addd">  Supprimer </a></td>
                </tr>

        <?php
            }}}
        ?>

</table>

<br><br><br>
<a href="ajou.php"  class="Btn_add">  Ajouter </a>


</div>
<?php include $tpl . 'footer.inc'; ?>