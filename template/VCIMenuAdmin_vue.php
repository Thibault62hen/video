<?php
require("headAdmin.php"); 
?>
<h3 class="text-center">Bienvenue, <?= $_SESSION["admin"][0]?></h3>
<table class="table table-bordered table-dark table-hover w-50 mx-auto">
    <thead>
        <tr>
            <th>Nb de films</th>
            <th>Nb de catégories</th>
            <th>Nb d'adhérents</th>
            <th>Nb de réservations</th>
            <th>Nb de réservations expirées</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $testMovie?></td>
            <td><?= $testCat?></td>
            <td><?= $testUser?></td>
            <td><?= $testLocation?></td>
            <td class="text-danger"><?= $testLocation2?></td>
</tr>
</tbody>
</table>