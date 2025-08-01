<?php
session_start();
require_once 'includes/db.php';
require_once 'includes/header.php';

$matches = $db->query("SELECT * FROM `match` ORDER BY date_match ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<h2 class="text-center text-white bg-success">Matchs Navétane</h2>
<div class="container">

    <div class="">
        <table class="table table-striped mt-3 border border-black">
            <tr class="bg-success text-white">
                <th>Match</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Statut</th>
            </tr>
    

            
            <?php foreach ($matches as $match): ?>
            <tr>
                <td><?= htmlspecialchars($match['equipe1_id']) ?> vs <?= htmlspecialchars($match['equipe2_id']) ?></td>
                <td><?= htmlspecialchars($match['date_match']) ?></td>
                <td><?= htmlspecialchars($match['heure_convocation']) ?></td>
                <td class="bg-warning font-bold text-center mx-3 "><?= htmlspecialchars($match['statut']) ?></td>
                <td><a class="btn btn-outline-success" href="match_edit.php?id=<?= $match['id'] ?>">Details</a></td>
            </tr>
            <?php endforeach; ?>
        </table>

<?php require_once 'includes/footer.php'; ?>
