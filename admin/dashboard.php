<?php
session_start();
require_once '../includes/auth.php';
require_once '../includes/db.php';
$matches = $db->query("SELECT * FROM `match` ORDER BY date_match ASC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- lien bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
    <h1 class="text-center text-white bg-success ">Dashboard - Gestion des Matchs</h1>
    <div class="container">
<a class="btn btn-primary my-1" href="match_edit.php">Ajouter un match</a>
<table class="table table-striped mt-3 border border-black">
<tr class="bg-success text-white"><th>Match</th><th>Date</th><th>Heure</th><th>Statut</th><th>Actions</th></tr>
<?php foreach ($matches as $match): ?>
<tr>
    <td><?= $match['equipe1_id'] ?> vs <?= $match['equipe2_id'] ?></td>
    <td><?= $match['date_match'] ?></td>
    <td><?= $match['heure_convocation'] ?></td>
    <td><?= $match['statut'] ?></td>
    <td><a class="btn btn-outline-success" href="match_edit.php?id=<?= $match['id'] ?>">Modifier</a></td>
</tr>
<?php endforeach; ?>
<a class="btn btn-primary my-1" href="index.php">voir les match</a>
</table>
    </div>

</body>
</html>
