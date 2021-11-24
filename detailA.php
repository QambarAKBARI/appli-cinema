<?php
    ob_start();
    include "db_functions.php";
    include "functions.php";
    
    $id = filter_input(INPUT_GET, "idacteur", FILTER_VALIDATE_INT);
    $acteursFilms = findMoviesActeurs($id);

?>
    <div class="container">
        <div class='product'>
            <?php
                foreach($acteursFilms as $acteur){
                    ?>
                    <p><?=$acteur['acteur']?> </p>
                    <p> Sexe :<?=$acteur['sexe']?></p>
                    <p> Date naissance :<?=$acteur['date_naissance']?></p>
                    <p> Role :<?=$acteur['nom_role']?>, dans :<?=$acteur['titre']?></p>

                    <?php
                }
            
            ?>
        </div>
    </div>

<?php
    $titre = "Détail Acteurs";
    $result = ob_get_clean();
    require "template.php";
