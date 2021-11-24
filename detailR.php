<?php
    ob_start();
    include "db_functions.php";
    
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

    if(!$id || !$realisateur = findOneRealisateur($id)){
        setMessage("error", "Le film demandé n'existe pas...");
        redirect("index.php");
    }

    $realisateurFilms = findMoviesRealisateur($id);
?>

    <div class="container">
        <div class='product'>
            <h1><?= $realisateur['nom_realisateur'] , $realisateur['prenom_realisateur'] ?> </h1>
            <p>sexe : <?= $realisateur['sexe'] ?></p>
            <p>Date naissance : <?= $realisateur['date_naissance'] ?></p>
            <h3>La liste des films :</h3>
            <?php
                foreach($realisateurFilms as $film){
                    ?>
                    <p>
                        <a href="detail.php?id=<?= $film['id_film'] ?>">
                            <?=$film['titre']?>
                        </a>
                    </p>
                    <?php
                }
            
            ?>
        </div>
    </div>
<?php
    $titre = "Détail Réalisateur";
    $result = ob_get_clean();
    require "template.php";



           