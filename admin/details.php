<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

$id = $_GET['id'] ?? 0;

// Récupération des infos du match
$stmt = $db->prepare("SELECT * FROM `match` WHERE id = ?");
$stmt->execute([$id]);
$match = $stmt->fetch();

// Récupération des statistiques liées à ce match
$stats = $db->prepare("SELECT * FROM statistiques WHERE match_id = ?");
$stats->execute([$id]);
$statistiques = $stats->fetchAll();
?>

<h2>Détails du Match</h2>
<div class="card">
  <h3><?= htmlspecialchars($match['equipe1_id']) ?> 🆚 <?= htmlspecialchars($match['equipe2_id']) ?></h3>
  <p>📅 <?= $match['date_match'] ?> 🕓 <?= substr($match['heure_convocation'], 0, 5) ?></p>
  <p>Statut : <strong><?= $match['statut'] ?></strong></p>
</div>

<h3>Statistiques</h3>
<div class="match-cards">
<?php foreach ($statistiques as $stat): ?>
  <div class="card">
    <h4><?= htmlspecialchars($stat['equipe']) ?></h4>
    <p>⚽ Buts : <?= $stat['buts'] ?></p>
    <p>🟨 Jaunes : <?= $stat['jaunes'] ?> | 🟥 Rouges : <?= $stat['rouges'] ?></p>
    <p>🎯 Possession : <?= $stat['possession'] ?>%</p>
    <p>🥅 Corners : <?= $stat['corners'] ?></p>
  </div>
<?php endforeach; ?>
</div>

<?php require_once 'includes/footer.php'; ?>
