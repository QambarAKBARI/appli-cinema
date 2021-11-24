<?php
    ob_start();
    include "db_functions.php";
   
    $genres = findAllGenres();
?>
<div class="product">
    <h1>La liste des Genres des films :</h1>
    <ul>
        <?php
        foreach($genres as $genre){
            ?>
            <li><a href='detailGenre.php?idGenre=<?= $genre['id_genre'] ?>'><?= $genre['nom_genre'] ?></a></li>
            <?php
        }
        ?>
    </ul>
</div>
<?php
$titre = "La liste des genres des films";
$result = ob_get_clean();
require "template.php";