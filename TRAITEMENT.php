php
<?php
$conn = new mysqli("localhost", "root", "", "gestion_services");
if ($conn->connect_error) {
  die("Erreur de connexion: ". $conn->connect_error);
}

// Exemple pour une commande
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$produits = $_POST['produits']; // à adapter selon ton formulaire
$total = $_POST['total'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO commandes (nom, prenom, telephone, produits, total, message) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("ssssss", $nom, $prenom, $telephone, $produits, $total, $message);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirection
header("Location: merci.html");
exit();
?>
