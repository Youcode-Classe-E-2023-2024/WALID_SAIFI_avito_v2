<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role']!='admin'){
  header('location:login.php');
}else{ 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Liste des Rôles</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>

<body class="bg-gray-500 text-white">
  <!-- Navbar -->
  <?php include 'nav_admin.php'; ?>
  <!-- Content -->
  <div class="content flex flex-col items-center">
    <h2 class="text-2xl font-semibold mb-4">Liste des Rôles</h2>

    <div class="overflow-x-auto w-full">
      <table class="w-full bg-white border border-gray-300">
        <thead>
          <tr>
            <th class="py-2 px-4 border-b text-white bg-gray-800">ID</th>
            <th class="py-2 px-4 border-b text-white bg-gray-800">Rôle</th>
            <th class="py-2 px-4 border-b text-white bg-gray-800">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once("Database.php");
          $db = new Database();
          $conn = $db->getConnection();
          $selectSql = "SELECT * FROM roles ";
          $result = $conn->query($selectSql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td class='py-2 px-4 border-b text-gray-700'>" . $row["id_role"] . "</td>";
              echo "<td class='py-2 px-4 border-b text-gray-700'>" . $row["role"] . "</td>";
              echo "<td class='py-2 px-4 border-b'>";
              echo "<a href='modifier_role.php?id=" . $row["id_role"] . "' class='bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded mx-1'>Éditer</a>";
              echo "<a href='supprime_role.php?id=" . $row["id_role"] . "' class='bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded mx-1'>Supprimer</a>";
              echo "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='3'>Aucun rôle trouvé</td></tr>";
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