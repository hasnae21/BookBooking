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
            <th>Detail sur le livre</th>
            <th>Reserver par </th>
            <th>Date de reservation</th>

        </tr>
        <?php
        //requête pour afficher la liste des employés
        $req = mysqli_query($con, "SELECT * FROM emprunt");
        $reqq = mysqli_query($con, "SELECT * FROM copie");

        if (mysqli_num_rows($req) == 0 && mysqli_num_rows($reqq) == 0) {
            //s'il n'existe pas de donnees dans la base de donné , alors on affiche ce message :
            echo "Il n'y a pas encore d'emrunts ajouter !";
        } else {
            //si non , affichons la liste complete
            while ($row = mysqli_fetch_assoc($req) && $roww = mysqli_fetch_assoc($req)) {
        ?>
                <tr>
                    <td><?= $roww['ISBN'] ?></td>
                    <td><?= $row['Nom'] ?></td>
                    <td><?= $row[''] ?></td>
                </tr>

        <?php
            }}
        ?>
</table>

<br><br><br>
<a href="ajou.php"  class="Btn_add">  Ajouter </a>

</div>
<?php include $tpl . 'footer.inc'; ?>