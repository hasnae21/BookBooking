<?php
$title = 'Home';

include 'route.php';
include $tpm . 'connect.php';
include $tpl . 'header.inc';

include 'nav.html';
//include 'header.html';
?>

<?php
//on récupère le id dans le lien
$id = $_GET['id'];


$result = mysqli_query($con, "SELECT * FROM livre WHERE ISBN = $id");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    $idc = $row["Id_Catégorie"];
    $reqq = mysqli_query($con, "SELECT * FROM categorie WHERE Id_Catégorie=$idc ");
    $roww = mysqli_fetch_array($reqq);

?>
    <div style="display: flex; justify-content: space-around; align-items: center; padding: 55px  80px  15px ; ">
        <div>
            <div style="display: flex; justify-content: space-around; align-items: center; ">
                <img src="./images/<?php echo $row["Sommaire"]; ?>" width="350px"> <br>
                <img src="./images/<?php echo $row["couverture"] ?>" width="350px"> <br>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <p class="card-text">
                    <b>ISBN:</b> &nbsp; <?php echo $row["ISBN"]; ?><br><br>
                    <b>Titre: </b> &nbsp; <?php echo $row["Titre"]; ?> <br><br>
                    <b>Auteur: </b> &nbsp; <?php echo $row["Auteur"]; ?> <br><br>
                    <b>Categorie: </b> &nbsp; <?php echo $roww["Libelle_Catégorie"]; ?><br><br>
                    <b>Masion d'édition: </b> &nbsp; <?php echo $row["Maison_d_edition"]; ?><br><br>
                    <b>Nombre de pages:</b> &nbsp; <?php echo $row["Nbr_page"]; ?><br><br>
                    <b>Année de publication:</b> &nbsp; <?php echo $row["l_Edition"]; ?><br><br>
                </p>
            </div>
        </div>
    </div>

<?php } ?>


<!-- tableau de copies -->

<div style="margin: 50px 175px;">
    <h5 style="text-align: center;">Exemplaires du livre dans la bibliothèque :</h5><br>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Identifiant de la copie</th>
                <th>Situation de la copie</th>
                <th>Etat de la copie</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $req = mysqli_query($con, "SELECT * FROM copie WHERE ISBN=$id ORDER BY Id_Copie  ASC");
            if (mysqli_num_rows($req) > 0) {
                while ($rew = mysqli_fetch_array($req)) {
                    if ($rew["Présente"] == '1' && $rew["Réservé"] == '0' && $rew["empurnter"]=='0' ) {
                        //echo "bouquin disponible";
            ?>

                        <tr>
                            <td>
                                <?php echo $rew["Id_Copie"]; ?> <br>
                            </td>
                            <td>disponible </td>
                            <td>
                                <?php echo $rew["Etat_Copie"]; ?> <br>
                            </td>
                            <td>
                                <a href="reserver.php?id=<?= $rew["Id_Copie"]; ?>" class="btn btn-warning ">
                                    Empunter
                                </a>
                            </td>
                        </tr>

                <?php }}} ?>
        </tbody>
    </table>
    <br>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Identifiant de la copie</th>
                <th>Situation de la copie</th>
                <th>Etat de la copie</th>
                <th>Date de retoure prévisionnelle de la copie</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $req = mysqli_query($con, "SELECT * FROM copie WHERE ISBN=$id ORDER BY Id_Copie  ASC");
            if (mysqli_num_rows($req) > 0) {
                while ($rew = mysqli_fetch_array($req)) {
                    if ($rew["Présente"] == '0') {
                        if ($rew["Réservé"] == '1' || $rew["empurnter"]=='1' ) {

                        $idcp = $rew["Id_Copie"];
                        $raqq = mysqli_query($con, "SELECT * FROM emprunt WHERE Id_Copie=$idcp ");
                        if (mysqli_num_rows($raqq) > 0) {
                            $raww = mysqli_fetch_array($raqq);
                            //echo "bouquin non disponible";
            ?>

                        <tr>
                            <td>
                                <?php echo $rew["Id_Copie"]; ?> <br>
                            </td>
                            <td>indisponibles </td>
                            <td>
                                <?php echo $rew["Etat_Copie"]; ?> <br>
                            </td>
                            <td>
                                <?php echo $raww["Date_Prévisionnelle_De_Retour"]; ?> <br>
                            </td>
                        </tr>

            <?php }}}} }?>
        </tbody>
    </table>
</div>

<div>
    <h5 style="text-align: center;">Commentaire sur le livre par d'autres lecteurs:</h5><br>

</div>
<?php
// include 'body.html';
include $tpl . 'footer.inc';
include 'footer.html';
?>