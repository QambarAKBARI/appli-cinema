    <nav>
        <div class="shopping-basket">
            <?php
                
                if(preg_match("/recap.php/", $_SERVER["REQUEST_URI"])){
                    echo "<div class='btn-supprime'><a href='traitement.php?action=deleteAll'></a></div>";
                }
            ?>
            <div class="shopping-cart">
                <a class="panier" href="recap.php"></i></a>
            </div>

        </div>
        <div class="home">
            <a href="index.php">ACCEUIL</a>
            <a href="acteurs.php">ACTEURS</a>  
            <a href="realisateurs.php">REALISATEURS</a>  
        </div>
        
    </nav>
<?= getMessage() ?>
