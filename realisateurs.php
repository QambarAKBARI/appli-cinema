<?php
    include "db_functions.php";

    $realisateurs = findAllRealisateurs();
?>    
    <h1>La liste des acteurs :</h1>
    <ul>
    <?php    
    foreach($realisateurs as $realisateur){
        ?>
        <li>
            <a href='detailR.php?id=<?= $realisateur['id_realisateur'] ?>'>
                <?=$realisateur['realisateur']?>
            </a>
        </li>
        <?php
    }
    ?>
    </ul>