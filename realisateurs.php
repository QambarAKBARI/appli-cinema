<?php
    include "db_functions.php";
    
    $realisateurs = findAllRealisateurs();

    foreach($realisateurs as $realisateur){
        echo "<p>".$realisateur['realisateur']."</p>";
    }