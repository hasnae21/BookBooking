<?php
$title = 'Home';

include 'route.php';
include $tpm . 'connect.php';
include $tpl . 'header.inc';

include 'nav.html';
include 'header.html';
?>


<?php
//on récupère le id dans le lien
$id = $_GET['id'];


$query =  "SELECT * FROM livre WHERE ISBN = $id";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $idc = $row["Id_Catégorie"];
    $reqq = mysqli_query($con, "SELECT * FROM categorie WHERE Id_Catégorie=$idc ");
    $roww = mysqli_fetch_assoc($reqq);
?>
    <p>
        Titre:&nbsp; <?php echo $row["Titre"]; ?> <br>
        Auteur:&nbsp; <?php echo $row["Auteur"]; ?> <br>
        Categorie:&nbsp; <?php echo $roww["Libelle_Catégorie"]; ?>
    </p>

    <?php
    $req = mysqli_query($con, "SELECT * FROM copie WHERE ISBN=$id ");
    $rew = mysqli_fetch_assoc($req);
    while ($rew) {

    ?>
    <p>
        Etat de Copie : &nbsp; <?php echo $rew["Etat_Copie"]; ?> <br>
        Titre:&nbsp; <?php echo $rew["Présent"]; ?> <br>
        Categorie:&nbsp; <?php echo $rew["Réservé"]; ?>
        
    </p>

<?php
    }
}
?>

<?php
// include 'body.html';
include $tpl . 'footer.inc';
include 'footer.html';

?>