<?
require_once 'inc/db-connect.inc.php';
require_once 'inc/header.inc.php'; 

$query_user = $db->prepare("SELECT * FROM users WHERE id = :id");

$query_user->execute([
    ':id' => $_GET['id'], 
]);

$user_selected = $query_user->fetch(); 
$first_name = $user_selected['first_name']; 
$last_name = $user_selected['last_name']; 
$full_name = " $first_name $last_name ";
?>

<div class="container">

    <h1>Fiche de <?=$full_name?></h1>
    <img src="<?=$user_selected['photo']?>" width="250px">
    <h3><?=$user_selected['first_name']?> <?=$user_selected['last_name']?></h3>
    <p>Email : <?=$user_selected['email']?></p>
    <p>Téléphone : <?=$user_selected['phone']?></p>
    <a href="index.php">Revenir à l'accueil</a>

    
<?require_once 'inc/footer.inc.php'?>
</div>

