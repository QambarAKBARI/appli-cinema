<?php
    ob_start();
    include "db_functions.php";

    $acteurs = findAllActeurs();
<<<<<<< HEAD
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
=======
?>
<div class="product">
    <h1>La liste des acteurs :</h1>
    <ul>
        <?php
        foreach($acteurs as $acteur){
            ?>
            <li><a href='detailA.php?idacteur=<?= $acteur['id_acteur'] ?>'><?= $acteur['acteur'] ?></a></li>
            <?php
        }
        ?>
    </ul>
</div>
<?php
$titre = "La liste des acteurs";
$result = ob_get_clean();
require "template.php";
>>>>>>> b7d14a75d06a5482768e4de33d84c5787b8f0f2a
