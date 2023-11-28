<?php 
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role']!='client'){
  header('location:login.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>


    </style>
</head>
<body class="bg-gray-500 text-white">
<!-- Navbar -->
<nav class="bg-red-500 p-5">
  <div class="container mx-auto flex justify-between items-center">
    <a href="Client.php">
      <img src="avito-logo.webp" alt="Nom de votre site" class="h-13 w-28">
    </a>
    <div class="space-x-4">
      <a href="Client.php" class="text-white">Home</a>
      <a href="ajouter_annoces.php" class="text-white">Ajouter annonces</a>
      <span class="text-white">Type: <?php echo isset($_SESSION['role']) ? $_SESSION['role'] : ''; ?></span>
      <span class="text-white">Username: <?php echo $_SESSION['username'] ?></span>
      <a href="dec.php" class="text-2xl font-semibold">Deconnecter</a>
    </div>
  </div>
</nav>

<!-- Content -->
<div class="content flex flex-col items-center p-8">
  <h2 class="text-2xl font-semibold mb-4">Liste des Annonces</h2>

  <div class="overflow-x-auto w-full">
    <table class="w-full bg-white border border-gray-300">
      <thead>
        <tr>
          <th class="py-3 px-6 bg-gray-800 text-white">ID</th>
          <th class="py-3 px-6 bg-gray-800 text-white">Titre</th>
          <th class="py-3 px-6 bg-gray-800 text-white">Description</th>
          <th class="py-3 px-6 bg-gray-800 text-white">Prix</th>
          <th class="py-3 px-6 bg-gray-800 text-white">Téléphone</th>
          <th class="py-3 px-6 bg-gray-800 text-white">Email</th>
          <th class="py-3 px-6 bg-gray-800 text-white">Role</th>
        </tr>
      </thead>
      <tbody>
    <?php
    require_once("Database.php");
    // Connexion à la base de données
    $db = new Database();
    $conn = $db->getConnection();

    // Requête SQL pour sélectionner toutes les annonces
    $selectSql = "SELECT * FROM annonces
    JOIN users ON annonces.id_user = users.user_id
    JOIN roles ON users.id_role = roles.id_role;";

    // Exécution de la requête SQL avec gestion des erreurs
    $result = $conn->query($selectSql);

    if (!$result) {
        die("Erreur d'exécution de la requête: " . $conn->error);
    }

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr class='hover:bg-gray-100'>";
        echo "<td class='py-3 px-6 border-b text-gray-800'>" . htmlspecialchars($row["id_annonce"]) . "</td>";
        echo "<td class='py-3 px-6 border-b text-gray-800'>" . htmlspecialchars($row["titre"]) . "</td>";
        echo "<td class='py-3 px-6 border-b text-gray-800'>" . htmlspecialchars($row["description"]) . "</td>";
        echo "<td class='py-3 px-6 border-b text-gray-800'>" . htmlspecialchars($row["prix"]) . "</td>";
        echo "<td class='py-3 px-6 border-b text-gray-800'>" . htmlspecialchars($row["telephone"]) . "</td>";
        echo "<td class='py-3 px-6 border-b text-gray-800'>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td class='py-3 px-6 border-b text-gray-800'>" . htmlspecialchars($row["role"]) . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='8' class='py-3 px-6 border-b text-gray-800'>Aucune annonce trouvée</td></tr>";
    }
    
    // Fermeture de la connexion
    $conn->close();
    ?>
  </tbody>
</table>



  </div>
</div>




       

</body>
</html>
<?php } ?>
