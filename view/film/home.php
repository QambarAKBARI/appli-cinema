<?php

$films = $response["data"]["films"];

?>

<table>
<thead>
    <tr>
        <th>Titre</th>
        <th>Duree</th>
        <th>Date Sortie</th>
        <th>Synopsis</th>
        <th>Note</th>
    </tr>
</thead>
<tbody>
    <?php
    
    foreach($films as $film ){
        ?>
        <tr>
            <td><a href='?ctrl=&index=<?= $film->getId() ?>'><?= $film ?></a></td>
            <td><?= $film->getDuree()?></td>
            <td></td>
            <td><?= $film->getDateSortie()->format("Y")?></td>
            <td><?= $film->getNote()?></td>
        </tr>
        <?php
    }
    ?>
    <tr>
        <td><?= $film->getRealisateur()?></strong></td>
    </tr>
</tbody>
</table>