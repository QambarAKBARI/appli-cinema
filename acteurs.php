<?php
    include "db_functions.php";

    $acteurs = findAllActeurs();
?>    
    <h1>La liste des acteurs :</h1>
    <ul>
    <?php    
    foreach($acteurs as $acteur){
        ?>
        <li>
            <a href='detailA.php?idacteur=<?= $acteur['id_acteur'] ?>'>
                <?=$acteur['acteur']?>
            </a>
        </li>
        <?php
    }
    ?>
    </ul>