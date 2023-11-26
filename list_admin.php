
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List des Admin</title>
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
  <h2 class="text-2xl font-semibold mb-4">Liste des Admin</h2>

  <div class="overflow-x-auto w-full">
    <table class="w-full bg-white border border-gray-300">
      <thead>
        <tr>
          <th class="py-2 px-4 border-b text-white bg-gray-800">ID</th>
          <th class="py-2 px-4 border-b text-white bg-gray-800">Nom</th>
          <th class="py-2 px-4 border-b text-white bg-gray-800">Prénom</th>
          <th class="py-2 px-4 border-b text-white bg-gray-800">Username</th>
          <th class="py-2 px-4 border-b text-white bg-gray-800">Password</th>
          <th class="py-2 px-4 border-b text-white bg-gray-800">Actions</th>
        </tr>
      </thead>
      <tbody>
       
      <?php
            require_once("Database.php"); // Assurez-vous que le fichier Database.php est inclus
            // Connexion à la base de données
            $db = new Database();
            $conn = $db->getConnection();
            // Requête SQL pour sélectionner tous les utilisateurs
            $selectSql = "SELECT * FROM users WHERE id_role = 1";
            // Exécution de la requête SQL
            $result = $conn->query($selectSql);
            // Vérification si des utilisateurs ont été trouvés
            if ($result->num_rows > 0) {
                // Parcourir les résultats de la requête et afficher chaque utilisateur dans une ligne de tableau HTML
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='py-2 px-4 border-b text-gray-700'>" . $row["user_id"] . "</td>";
                    echo "<td class='py-2 px-4 border-b text-gray-700'>" . $row["nom"] . "</td>";
                    echo "<td class='py-2 px-4 border-b text-gray-700'>" . $row["prenom"] . "</td>";
                    echo "<td class='py-2 px-4 border-b text-gray-700'>" . $row["username"] . "</td>";
                    echo "<td class='py-2 px-4 border-b text-gray-700'>" . $row["password"] . "</td>";
                    echo "<td class='py-2 px-4 border-b'>";
                    echo "<button class='bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded'>Éditer</button>";
                    echo "<button class='bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded'>Supprimer</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                // Afficher un message si aucun utilisateur n'est trouvé
                echo "<tr><td colspan='6'>Aucun utilisateur trouvé</td></tr>";
            }

            // Fermer la connexion à la base de données
            $conn->close();
            ?>
      </tbody>

    </table>
  </div>
</div>


       

</body>
</html>

