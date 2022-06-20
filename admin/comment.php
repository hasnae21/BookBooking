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
            <th> Detail commentaire</th>
            <th> Ecrit par </th>
            <th> Date d'ecrture du commentaire</th>
        </tr>

        <?php
        //requête pour afficher la liste des employés
        $req = mysqli_query($con, "SELECT * FROM commentaire");
        
        if (mysqli_num_rows($req) == 0) {
            //s'il n'existe pas de donnees dans la base de donné , alors on affiche ce message :
            echo "Il n'y a pas encore de commentaire ajouter !";
        } else {
            //si non , affichons la liste complete
            while ($row = mysqli_fetch_assoc($req) ) {
         ?>
                <tr>
                    <td> <?= $row['Detail_Commentaire'] ?> </td>
                    <td> </td>
                    <td><?= $row['Date_Commentaire'] ?> </td>

                    <td><a href=""  class="Btn_addd">  Supprimer </a></td>
                </tr>

        <?php
            }}
        ?>

</table>

<br><br><br>
<a href="ajou.php"  class="Btn_add">  Ajouter </a>


</div>
<?php include $tpl . 'footer.inc'; ?>