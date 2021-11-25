<?php
    ob_start();
    include "db_functions.php";

    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    $roles = findActeursByRole($id);
?>
<div class="product">
    <h1>La liste des Rôles joués par cet acteurs :</h1>
    <ul>
        <?php
        foreach($roles as $role){
            ?>
            <li>le role : <?= $role['nom_role']?> a été joué par : <a href="detailA.php?idacteur=<?= $role['id_acteur'] ?>"><?= $role['acteur']?></a> dans le film :<a href="detailF.php?id=<?= $role['id_film'] ?>"><?= $role['titre']?></a></li>
            <?php
        }
        ?>
    </ul>
</div>
<?php
$titre = "Détail Roles";
$result = ob_get_clean();
require "template.php";