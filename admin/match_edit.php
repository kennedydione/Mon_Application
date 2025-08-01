<?php
session_start();
require_once '../includes/auth.php';
require_once '../includes/db.php';

if (isset($_POST['save'])) {
    $e1 = $_POST['equipe1'];
    $e2 = $_POST['equipe2'];
    $date = $_POST['date_match'];
    $heure = $_POST['heure_convocation'];
    $statut = $_POST['statut'];
    $id = $_POST['id'];

    if ($id) {
        $sql = "UPDATE `match` SET equipe1_id=?, equipe2_id=?, date_match=?, heure_convocation=?, statut=? WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$e1, $e2, $date, $heure, $statut, $id]);
    } else {
        $sql = "INSERT INTO `match` (equipe1_id, equipe2_id, date_match, heure_convocation, statut) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$e1, $e2, $date, $heure, $statut]);
    }
    header("Location: dashboard.php");
    exit();
}

$match = ['equipe1_id'=>'','equipe2_id'=>'','date_match'=>'','heure_convocation'=>'','statut'=>'','id'=>''];
if (isset($_GET['id'])) {
    $stmt = $db->prepare("SELECT * FROM `match` WHERE id=?");
    $stmt->execute([$_GET['id']]);
    $match = $stmt->fetch();
}
?>
<form method="POST">
    <input type="hidden" name="id" value="<?= $match['id'] ?>">
    <input name="equipe1" value="<?= $match['equipe1_id'] ?>" placeholder="Équipe 1" required>
    <input name="equipe2" value="<?= $match['equipe2_id'] ?>" placeholder="Équipe 2" required>
    <input type="date" name="date_match" value="<?= $match['date_match'] ?>" required>
    <input type="time" name="heure_convocation" value="<?= $match['heure_convocation'] ?>" required>
    <select name="statut">
        <option value="à venir" <?= $match['statut']=='à venir'?'selected':'' ?>>À venir</option>
        <option value="en cours" <?= $match['statut']=='en cours'?'selected':'' ?>>En cours</option>
        <option value="terminé" <?= $match['statut']=='terminé'?'selected':'' ?>>Terminé</option>
    </select>
    <button type="submit" name="save">Enregistrer</button>
</form>