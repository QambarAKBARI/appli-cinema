<?php
    ob_start();
    include "db_functions.php";

    $acteurs = findAllActeurs();
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
