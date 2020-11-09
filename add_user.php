<?
require_once 'inc/db-connect.inc.php';
require_once 'inc/header.inc.php';
?>
<div class="container">
    <h1>Ajouter un utilisateur</h1>
    <? require_once 'inc/menu.inc.php'; ?>
    <form method="POST">
        <div class="row">
            <h5 class="col-2">Prénom : </h5>
            <div class="col-10">
            <input type="text" name="first_name">
            </div>
        </div>
        <div class="row">
            <h5 class="col-2">Nom : </h5>
            <div class="col-10">
            <input type="text" name="last_name">
            </div>
        </div>
        <div class="row">
            <h5 class="col-2">Email : </h5>
            <div class="col-10">
            <input type="email" name="email">
            </div>
        </div>
        <div class="row">
            <h5 class="col-2">Genre : </h5>
            <div class="col-10">
            <select name="gender">
                <option value="Male">Homme</option>
                <option value="Female">Femme</option>
            </select>
            </div>
        </div>
        <div class="row">
            <h5 class="col-2">Photo (lien) : </h5>
            <div class="col-10">
            <input type="url" name="photo">
            </div>
        </div>
        <div class="row">
            <h5 class="col-2">Téléphone : </h5>
            <div class="col-10">
            <input type="tel" name="phone">
            </div>
        </div>
        <div class="row">
            <h5 class="col-2">Slogan : </h5>
            <div class="col-10">
            <input type="text" name="slogan">
            </div>
        </div>
        <br>
        <a href="index.php" class="btn btn-outline-warning">Retourner à l'accueil</a>
        <input type="submit" class="btn btn-info" value="Créer">
    </form>
    

</div>

<?

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $gender = $_POST['gender'] ?? '';
    $photo = filter_input(INPUT_POST, 'photo', FILTER_VALIDATE_URL);
    $phone = $_POST['phone'] ?? '';
    $slogan = $_POST['slogan'] ?? '';

    $query = $db->prepare("INSERT INTO users (first_name, last_name, email, gender, photo, phone, slogan) VALUES (:first_name, :last_name, :email, :gender, :photo, :phone, :slogan)");

    $query->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':email' => $email,
        ':gender' => $gender,
        ':photo' => $photo,
        ':phone' => $phone,
        ':slogan' => $slogan,
    ]);

    echo "Un utilisateur a été enregistré"; 
    // if ($db->errorCode() == '00000'){
    //    echo "Un utilisateur a été enregistré";  
    // } else {
    //     deg
    // }

    
}

?>