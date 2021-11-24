<?php
    ob_start();
    include "db_functions.php";
    
    $id = filter_input(INPUT_GET, "idGenre", FILTER_VALIDATE_INT);
    $genreFilms = findMoviesByGenre($id);

?>
    <div class="container">
        <div class='product'>
            <?php
                if(count($genreFilms) === 0){
                    ?>
                    <p>Pour ce film aucun genre n'a été attribué !!</p>
                <?php
                }
                foreach($genreFilms as $genre){
                    ?>
                    <p> Genre :<?=$genre['nom_genre']?><br> Titre de film :<a href="detail.php?id=<?= $genre['id_film'] ?>" ><?=$genre['titre']?></a></p>

                    <?php
                }
            
            ?>
        </div>
    </div>

<?php
    $titre = "Détail Genre Film";
    $result = ob_get_clean();
    require "template.php";
