<?php
    include "db_functions.php";

    $acteurs = findAllActeurs();
    echo "<h1>La liste des acteurs :</h1>";
    echo "<ul>";
    foreach($acteurs as $acteur){
        echo "<li><a href='detailA.php?idacteur=<?= {$acteur['id_acteur'] }?>'>".$acteur['acteur']."</a></li>";
    }
    echo "</ul>";