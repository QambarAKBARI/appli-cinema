<?php
    ob_start();
    include "db_functions.php";

    $roles = findAllRoles();
?>
<div class="product">
    <h1>La liste des Rôles joués par les acteurs :</h1>
    <ul>
        <?php
        foreach($roles as $role){
            ?>
            <li><a href='detailRoles.php?id=<?= $role['id_role'] ?>'><?= $role['nom_role'] ?></a></li>
            <?php
        }
        ?>
    </ul>
</div>
<?php
$titre = "La liste des rôles";
$result = ob_get_clean();
require "template.php";