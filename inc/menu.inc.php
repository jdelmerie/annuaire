<?
require_once 'inc/db-connect.inc.php';
require_once 'inc/header.inc.php';

$gender = $_GET['gender'] ?? '';

if ($gender == 'male') {
    $query = $db->query("SELECT * FROM users WHERE gender = 'Male'");
} else if ($gender == 'female') {
    $query = $db->query("SELECT * FROM users WHERE gender = 'Female'");
} else {
    $query = $db->query("SELECT * FROM users");
}

$users = $query->fetchAll();

$query = $db->query("SELECT gender, COUNT(*) AS nb FROM users GROUP BY gender");
$count = $query->fetchAll();

$total_gender = 0;
foreach ($count as $type) {
    $total_gender += $type['nb'];
}

?>
<ul class="nav nav-pills navbar">
    <a class="nav-link btn btn-info" href="index.php">Tous les robots (<?=$total_gender?>)</a>
    <?foreach ($count as $gender) {
    $gender_fr = ($gender['gender'] == 'Male') ? 'Homme' : 'Femme';?>
    <a class="nav-link btn btn-info" href="index.php?gender=<?=strtolower($gender['gender'])?>"><?=$gender_fr?> (<?=$gender['nb']?>)</a>
    <?}?>
    <a class="nav-link btn btn-info" href="add_user.php">Ajouter un utilisateur</a>
</ul>
<hr>