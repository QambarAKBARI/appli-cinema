
<?php
    ob_start();
    include "db_functions.php";
    
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    $acteurs = MoviesActeurs($id);
    if(!$id || !$film = findOneById($id)){
        setMessage("error", "Le film demandé n'existe pas...");
        redirect("index.php");
    }

?>

    <div class="container">
        <div class='product'>
            <h1><?= $film['titre'] ?></h1>
            <p> Duree : <?= $film['duree'] ?>&nbsp;min</p>
            <p>Date sortie : <?= $film['date_sortie'] ?></p>
            <p>Synopsis : <?= $film['synopsis'] ?></p>
            <p>note : <?= $film['note'] ?></p>
            <h3><a href="detailR.php?id=<?= $film['id_realisateur'] ?>">Realisateur : <?= $film['nom_realisateur'] ?></a></h3>
            <h3>la liste des acteurs :</h3>
            <?php
                foreach($acteurs as $acteur){
                    ?>
                    <p>
                        <a href="detailA.php?idacteur=<?= $acteur['id_acteur'] ?>">
                            <?= $acteur['nom_acteur']." ".$acteur['prenom_acteur'] ?>
                        </a>
                    </p>
                    <?php
                }
            ?>
        </div>
    </div>
<?php
    $titre = "Casting de Film";
    $result = ob_get_clean();
    require "template.php";        