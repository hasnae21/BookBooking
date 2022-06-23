<?php
$title = 'Home';

session_start();
error_reporting(0);
include 'route.php';

include $tpm . 'connect.php';
include $tpl . 'header.inc';

//include 'nav.html';
//include 'header.html';


if (isset($_SESSION['Id_Adhérant'])) {
    header("Location: index.php");
    echo "<script>alert(' your are loged in.')</script>";
}

if (isset($_POST['submit'])) {
    $Identfcateur = $_POST['Identfcateur'];

    $sql = "SELECT * FROM adherent WHERE Id_Adhérant == $Identfcateur";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['Id_Adhérant'] = $row['Id_Adhérant'];

        header("Location: index.php");
    } else {
        echo "<script>alert('Woops! Id Adhérant is Wrong.')</script>";
    }
}
?>

<div class="col-12 p-3">
    <center>
        <h1> Login </h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Identfcateur</label><br>
                <input type="text" class="form-control" placeholder="Entrer votre identifiant" 
                name="Identfcateur" required  value="<?php echo $_POST['Identfcateur']; ?>"  >
            </div>
            <button name="submit" class="btn btn-dark "> Connection </button>
            <br>
        </form>
    </center>
</div>


<?php
// include 'body.html';
//include 'footer.html';
include $tpl . 'footer.inc';
?>