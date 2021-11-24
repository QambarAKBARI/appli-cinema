<?php
    ob_start();
    include "db_functions.php";
    
    $id = filter_input(INPUT_GET, "idacteur", FILTER_VALIDATE_INT);
    $acteursFilms = findMoviesActeurs($id);

?>
    <div class="container">
        <div class='product'>
            <?php
                foreach($acteursFilms as $acteur){
                    ?>
                    <p><?=$acteur['nom_acteur']?>,<?=$acteur['prenom_acteur']?> </p>
                    <p> Sexe :<?=$acteur['sexe']?></p>
                    <p> Date naissance :<?=$acteur['date_naissance']?></p>
                    <p> Role :<a href="detailRoles.php?id=<?= $acteur['id_role'] ?>"><?=$acteur['nom_role']?></a>, dans :<a href="detail.php?id=<?= $acteur['id_film'] ?>"><?=$acteur['titre']?></a></p>

                    <?php
                }
            
            ?>
        </div>
    </div>

<?php
    $titre = "Détail Acteurs";
    $result = ob_get_clean();
    require "template.php";
