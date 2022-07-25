<?php
$title = 'Home';

session_start();
error_reporting(0);

include 'route.inc';

include $tpm . 'connect.php';
include $tpl . 'header.inc';


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
            <button name="login" class="btn btn-dark "> Connection </button>
            <br>
        </form>
    </center>
</div>

<?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);
			
			$query 		= mysqli_query($con, "SELECT * FROM users WHERE  password='$password' and username='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					$_SESSION['user_id']=$row['user_id'];
					header('location:home.php');
					
				}
			else
				{
					echo 'Invalid Username and Password Combination';
				}
		}
  ?>
<?php

include $tpl . 'footer.inc';
?>