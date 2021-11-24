<?php
ob_start();
session_start();
include "db_functions.php";
$films = findAllFilm();

?>
    <div class="container">
        <?php
            foreach($films as $film){
                ?>
                <div class='product'>
                    <h1>
                        <a href="detail.php?id=<?= $film['id_film'] ?>">
                            <?= $film['titre'] ?>
                        </a>
                    </h1>
                    <p> Duree : <?= $film['duree'] ?>&nbsp;min</p>
                    <p>Date sortie : <?= $film['date_sortie'] ?></p>
                    <p>Synopsis : <?= $film['synopsis'] ?></p>
                    <p>note : <?= $film['note'] ?></p>
                    <h4><a href="detailR.php?id=<?= $film['id_realisateur'] ?>">Realisateur : <?= $film['nom_realisateur'] ?></a></h4>
                </div>
                <?php
            }
        ?>
    </div>
<?php
    $titre = "La liste des films";
    $result = ob_get_clean();
    require "template.php";