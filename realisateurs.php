<?php
    ob_start();
    include "db_functions.php";

    $realisateurs = findAllRealisateurs();
?>
<div class="product">
    <h1>La liste des Réalisateurs :</h1>
    <ul>
        <?php
        foreach($realisateurs as $realisateur){
            ?>
            <li><a href='detailA.php?idacteur=<?= $realisateur['id_realisateur'] ?>'><?= $realisateur['realisateur'] ?></a></li>
            <?php
        }
        ?>
    </ul>
</div>
<?php
    $titre = "La liste des réalisateurs";
    $result = ob_get_clean();
    require "template.php";