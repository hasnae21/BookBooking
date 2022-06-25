<?php
$title = 'Admin Dashboard';

include 'init.php';
include $tpd. 'connect.php';
include $tpl. 'header.inc';
//include 'navbar.php';


if (isset($_POST['submit'])) {
    $identificateur =$_POST['Identfcateur'];
    $mdp =$_POST['Password']; 
    
if($identificateur == 'Hasnae' && $mdp == 'HasnaeFilrouge'){
    header("Location: ./index.php");
}else{
    echo "Your are not an Admin";    
    header("Location: ./login.php");
}
}

?>
<center style=" padding-top: 125px;" >
    <h1> Bonjour Admin </h1>
    <div class="cards" >
    <div style="display: flex; flex-direction: row;
    flex-wrap: wrap;     justify-content: center;
    align-items: center; margin: 55px; " >

            <div class="card text-center border border-dark shadow-0 "  style="background-color: #487367; color:#fff;">
                    <div class="card-body">
                        <form action="" method="POST">
                                    <div class="mb-3">
                        
                                        <label class="form-label">Identfcateur</label><br>
                                        <input type="text" class="form-control" placeholder="Entrer votre identifiant" 
                                        name="Identfcateur" required   >
                        
                                        <label class="form-label">Password</label><br>
                                        <input type="text" class="form-control" placeholder="Entrer votre Password" 
                                        name="Password" required>
                        
                                    </div>
                                    <button name="submit" class="btn btn-warning "> Entrer </button>
                                    <br>
                                </form>

                </div>
            </div>
        </div>

        </div>

        </center>
<?php include $tpl . 'footer.inc'; ?>