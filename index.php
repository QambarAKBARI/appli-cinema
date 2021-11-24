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
                    <a href="detail.php?id=<?= $film['id_film'] ?>">
                        <img width=170 height="226px" src="<?= $film['image']?>" alt="img">
                    </a>    
                    <h4><a href="detailR.php?id=<?= $film['id_realisateur'] ?>">Realisateur : <?= $film['realisateur'] ?></a></h4>
                </div>
                <?php
            }
        ?>
    </div>
<?php
    $titre = "La liste des films";
    $result = ob_get_clean();
    require "template.php";