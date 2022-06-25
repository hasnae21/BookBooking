<?php
$title = 'Home';

include 'route.inc';
include $tpm . 'connect.php';
include $tpl . 'header.inc';

include $tpl . 'nav.html';

?>
<div style="display: flex; flex-direction: column;
    flex-wrap: wrap;     justify-content: center;
    align-items: center;">

    <div style="display: flex; flex-direction: row;
    flex-wrap: wrap;     justify-content: center;
    align-items: center; margin: 5px;">
        <?php

        $reqq = mysqli_query($con, "SELECT * FROM categorie ORDER BY Id_Catégorie ASC");


        if (mysqli_num_rows($reqq) > 0) {
            while ($roww = mysqli_fetch_array($reqq)) {
        ?>
                <div class="cards">
                    <div class="card text-center border border-dark shadow-0 ">
                        <div class="card-header">
                            <h5><br>
                                <?php echo $roww["Libelle_Catégorie"]; ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">

                                <?php
                                $ctg = $roww["Id_Catégorie"];
                                $query =  "SELECT * FROM livre WHERE Id_Catégorie = $ctg";
                                $result = mysqli_query($con, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    $nbr = mysqli_num_rows($result);  ?>
                                    Nombre de Livres =
                                <?php echo $nbr;
                                } else { ?>
                                    Nombre de Livres = 0
                                <?php } ?>

                            </p>
                        </div>
                    </div>
                </div>
        <?php }
        }
        ?>

    </div>
    <div>
        <?php
        if (isset($_POST['Search'])) {
            $valueToSearch = $_POST['valueToSearch'];

            $query = "SELECT * FROM livre WHERE   ";
            $search_result = filterTable($query);
        } else {
            $query = "SELECT * FROM livre";
            $search_result = filterTable($query);
        }

        function filterTable($query)
        {
            $con = mysqli_connect("localhost", "root", "", "bookbooking");
            $filter_Result = mysqli_query($con, $query);
            return $filter_Result;
        }
        ?>

        <br />
        <form class="d-flex" action="category.php" method="post" autocomplete="off">
            <input class="form-control me-2" type="text" placeholder="Entrer une categorie" name="valueToSearch" style="width: 70%" />
            <input class="btn btn-dark" type="submit" value="Search" name="Search" />
        </form>

        <br>
    </div>
</div>





<!-- <?php
$query =  "SELECT * FROM livre ORDER BY ISBN ASC";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
       while ($row = mysqli_fetch_array($search_result)) {

        $id = $row["Id_Catégorie"];
        $reqq = mysqli_query($con, "SELECT * FROM categorie WHERE Id_Catégorie=$id ");
        $roww = mysqli_fetch_array($reqq);
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

<?php 
}}}
?>
 -->


<?php
// include 'body.html';
include $tpl . 'footer.html';
include $tpl . 'footer.inc';
?>