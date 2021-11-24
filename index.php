<?php
ob_start();
session_start();
include "functions.php";
include "db_functions.php";
$films = findAllFilm();

?>
    <div class="container">
        <?php
            foreach($films as $film){
                ?>
                <div class='product'>
                    <h1>
                        <a href="detailF.php?id=<?= $film['id_film'] ?>">
                            <?= $film['titre'] ?>
                        </a>
                    </h1>
                    <div id="gallery"><img src="<?= $film['image'] ?>"></div>
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