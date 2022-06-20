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
            <th>Photo</th>
            <th>Nom</th>
            <th>Prénom </th>
            <th>CIN</th>
            <th>Date_naissance</th>
            <th>Email</th>
            <th>Téléphone</th>
        </tr>
        <?php
        //requête pour afficher la liste des employés
        $req = mysqli_query($con, "SELECT * FROM adherent");

        if (mysqli_num_rows($req) == 0) {
            //s'il n'existe pas de donnees dans la base de donné , alors on affiche ce message :
            echo "Il n'y a pas encore de livres ajouter !";
        } else {
            //si non , affichons la liste complete
            while ($row = mysqli_fetch_assoc($req) ) {
        ?>
                <tr>
                    <td><img src="../images/<?= $row['Photo'] ?>" ></td>
                    <td><?= $row['Nom'] ?></td>
                    <td><?= $row['Prénom'] ?></td>
                    <td><?= $row['CIN'] ?></td>
                    <td><?= $row['Date_naissance'] ?></td>
                    <td><?= $row['Email'] ?></td>
                    <td><?= $row['Téléphone'] ?></td>

                    <td><a href="modif2.php?id=<?=$row['Id_Adhérant']?>" class="Btn_addd">  Modifier </a>
                    <a href="suprim2.php?id=<?=$row['Id_Adhérant']?>"  class="Btn_addd">  Supprimer </a>
                </td>
                </tr>

        <?php
            }}
        ?>

</table>

<br><br><br>
<a href="ajou.php"  class="Btn_add">  Ajouter </a>
</div>
<?php include $tpl . 'footer.inc'; ?>