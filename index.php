<?php
$title = 'Home';

include 'route.php';
include $tpm . 'connect.php';
include $tpl . 'header.inc';

include 'nav.html';
include 'header.html';
?>

<!-- <h2 class="mt-5"> Liste des Livre:</h2> -->
<div style="display: flex;">
<?php
$query =  "SELECT * FROM livre ORDER BY ISBN ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $id = $row["Id_Catégorie"];
        $reqq = mysqli_query($con, "SELECT * FROM categorie WHERE Id_Catégorie=$id ");
        $roww = mysqli_fetch_assoc($reqq);
?>
        <div class="cards" >
            <div class="card text-center border border-dark shadow-0 "  style="background-color: #487367; color:#fff;">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img alt="" src="./images/<?php echo $row["couverture"]; ?>" class="img-fluid" width="250px"/>
                    <a href="./copy.php?id=<?=$row['ISBN']?>">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                    </a>
                </div>
                    <div class="card-body">
                        <p class="card-text">
                        Titre:&nbsp;  <?php echo $row["Titre"]; ?> <br>
                        Auteur:&nbsp;  <?php echo $row["Auteur"]; ?> <br>
                        Categorie:&nbsp;  <?php echo $roww["Libelle_Catégorie"]; ?>
                    </p>
                </div>
            </div>
        </div>

<?php }
}
?>
</div>
<?php
// include 'body.html';
include 'footer.html';
include $tpl . 'footer.inc';

?>