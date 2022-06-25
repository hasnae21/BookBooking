<?php
$title = 'Admin Dashboard';

include 'init.php';
include $tpd. 'connect.php';
include $tpl. 'header.inc';
include 'navbar.php';
?>

<div class="form">
            <?php 
            $id= $_GET['id'];
            //requête de suppression
            $req = mysqli_query($con , "DELETE FROM livre WHERE id = $id");
            //redirection vers la page index.php
            header("Location:index.php");
            ?>
        
    <br>
    <a href="index.php" class="back_btn">Retour</a>
</div>
