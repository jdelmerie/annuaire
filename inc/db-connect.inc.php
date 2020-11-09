<?
// fonction utilitaire pour débug mes tableaux
function debug ($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
};

require_once 'env.php';

// connexion à la db
try {
    $db = new PDO("mysql:host=$host; dbname=$dbname;", $username, $password);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
} catch (PDOException $error) {
    echo "Erreur!: " . $error->getMessage() . "<br/>";
    die();
}
?>