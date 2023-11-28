<?php 
session_start();

if(!isset($_SESSION['username'])){
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
    /* Style général */
.content {
  margin: 100px;
}

/* Titre de la liste */
.text-2xl {
  font-size: 1.5rem;
}

/* Tableau principal */
.w-full {
  width: 100%;
}

.bg-white {
  background-color: #fff;
}

.border {
  border: 1px solid #ccc;
}

/* En-tête du tableau */
.bg-gray-800 {
  background-color: #333;
  color: #fff;
}

.py-2 {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.px-4 {
  padding-left: 1rem;
  padding-right: 1rem;
}

/* Cellules du tableau */
.text-gray-700 {
  color: #333;
}

/* Actions (boutons) */
.action-button {
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 0.25rem;
  cursor: pointer;
  margin-right: 0.5rem;
}

/* Bouton Éditer */
.edit-button {
  background-color: #3498db;
  color: #fff;
}

/* Bouton Supprimer */
.delete-button {
  background-color: #e74c3c;
  color: #fff;
}

/* Lignes de tableau alternées */
tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

/* Défilement horizontal pour le tableau */
.overflow-x-auto {
  overflow-x: auto;
}

/* Espacement pour les cellules du tableau */
.table-cell {
  padding: 8px;
}

    </style>
</head>
<body class="bg-gray-500 text-white">
<!-- Navbar -->
<nav class="bg-red-500 p-5">
  <div class="container mx-auto flex justify-between items-center">
    <a href="admin.php">
      <img src="avito-logo.webp" alt="Nom de votre site" class="h-13 w-28">
    </a>
    <div class="space-x-4">
      <a href="#" class="text-white">Home</a>
      <a href="#" class="text-white">About</a>
      <a href="#" class="text-white">Ajouter user</a>
      <span class="text-white">Type: <?php echo isset($_SESSION['role']) ? $_SESSION['role'] : ''; ?></span>
      <span class="text-white">Username: <?php echo $_SESSION['username'] ?></span>
      <a href="dec.php" class="text-2xl font-semibold">Deconnecter</a>
    </div>
  </div>
</nav>

<!-- Content -->
<div class="content flex flex-col items-center">
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
      <th class="py-3 px-6 bg-gray-800 text-white">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once("Database.php");
    // Connexion à la base de données
    $db = new Database();
    $conn = $db->getConnection();
    // Requête SQL pour sélectionner toutes les annonces
    $selectSql = "SELECT *
    FROM annonces
    JOIN users ON annonces.id_user = users.user_id
    JOIN roles ON users.id_role = roles.id_role;";
    // Exécution de la requête SQL
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr class='hover:bg-gray-100'>";
        echo "<td class='py-3 px-6 border-b text-black'>". $row["id_annonce"] . "</td>";
        echo "<td class='py-3 px-6 border-b text-black'>" . $row["titre"] . "</td>";
        echo "<td class='py-3 px-6 border-b text-black'>" . $row["description"] . "</td>";
        echo "<td class='py-3 px-6 border-b text-black'>" . $row["prix"] . "</td>";
        echo "<td class='py-3 px-6 border-b text-black'>" . $row["telephone"] . "</td>";
        echo "<td class='py-3 px-6 border-b text-black'>" . $row["email"] . "</td>";
        echo "<td class='py-3 px-6 border-b text-black'>" . $row["role"] . "</td>";
        echo "<td class='py-3 px-6 border-b text-black'>";
        echo "<a href='modifier_user.php?id=" . $row["id_annonce"] . "' class='bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded mr-2'>Modifier</a>";
        echo "<a href='supprimer.php?id=" . $row["id_annonce"] . "' class='bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded'>Supprimer</a>";
        echo "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='8' class='py-3 px-6 border-b'>Aucune annonce trouvée</td></tr>";
    }
    $conn->close();
    ?>
  </tbody>
</table>


  </div>
</div>




       

</body>
</html>
<?php } ?>
