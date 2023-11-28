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
  <link href="style.css" rel="stylesheet">
</head>
<body class="bg-gray-500 text-white">
<!-- Navbar -->
<?php  
 include 'nav_admin.php'; 
 ?>
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
        echo "<a href='modifier_annonces.php?id=" . $row["id_annonce"] . "' class='bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded mr-2'>Modifier</a>";
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
