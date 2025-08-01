<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['code'] === 'kennedy') {
        $_SESSION['admin'] = true;
        header('Location: admin/dashboard.php');
        exit();
    } else {
        $error = "Code incorrect.";
    }
}
?>
<form method="POST">
    <input type="password" name="code" placeholder="Code secret" required>
    <button type="submit">Entrer</button>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</form>