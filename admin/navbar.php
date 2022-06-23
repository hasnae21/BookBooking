    <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
        <a href="#" class="navbar-brand text-light mt-5">
            <div class="display-5 font-weight-bold"> 
            <img src="../images/bookbooking.png">
            </div>
        </a>
            <br>
        <ul class="navbar-nav d-flex flex-column mt-5 w-100">

            <li class="nav-item w-100">
                <a href="index.php" class="nav-link  pl-4">Liste des livres</a>
            </li>
            <li class="nav-item w-100">
                <a href="categorie.php" class="nav-link  pl-4">Liste des categories  </a>
            </li>
            <li class="nav-item w-100">
                <a href="emprunter.php" class="nav-link  pl-4">Liste des livres empunter </a>
            </li>
            <li class="nav-item w-100">
                <a href="reserver.php" class="nav-link  pl-4">Liste des livres reserver  </a>
            </li>
            <li class="nav-item w-100">
                <a href="adherent.php" class="nav-link  pl-4">Liste des adherents   </a>
            </li>
            <li class="nav-item w-100">
                <a href="comment.php" class="nav-link  pl-4">Liste des commentaires  </a>
            </li>
            <br>
            <br>
            <br>

            <li class="nav-item w-100">
                <a href="./logout.php" class="nav-link text-dark pl-4"> Log out </a>
            </li>
        </ul>
    </nav>
    <section class="p-4 my-container">
        <button class="btn my-4" id="menu-btn"> <b> Sidebar <b> </button>
      
    </section>


<!-- js -->
<script>
    <?php
    include 'init.php'; 
    include $tjs . 'script.js'; ?>
</script>