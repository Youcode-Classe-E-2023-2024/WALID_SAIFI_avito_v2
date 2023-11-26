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
<nav class="bg-red-500 p-5">
  <div class="container mx-auto flex justify-between items-center">
    <a href="admin.php">
      <img src="avito-logo.webp" alt="Nom de votre site" class="h-13 w-28">
    </a>
    <div class="space-x-4">
      <a href="#" class="text-white">liste Role</a>
      <a href="#" class="text-white">Afficher Admin</a>
      <a href="ajouter_Admin.php" class="text-white">Ajouter Admin</a>
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
          <th class="py-2 px-4 border-b text-white bg-gray-800">ID</th>
          <th class="py-2 px-4 border-b text-white bg-gray-800">Titre</th>
          <th class="py-2 px-4 border-b text-white bg-gray-800">Description</th>
          <th class="py-2 px-4 border-b text-white bg-gray-800">Prix</th>
          <th class="py-2 px-4 border-b text-white bg-gray-800">Téléphone</th>
          <th class="py-2 px-4 border-b text-white bg-gray-800">Email</th>
          <th class="py-2 px-4 border-b text-white bg-gray-800">Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Ajoutez vos lignes de données ici -->
        <tr>
          <td class="py-2 px-4 border-b text-gray-700">1</td>
          <td class="py-2 px-4 border-b text-gray-700">Titre de l'annonce</td>
          <td class="py-2 px-4 border-b text-gray-700">Description de l'annonce</td>
          <td class="py-2 px-4 border-b text-gray-700">1000€</td>
          <td class="py-2 px-4 border-b text-gray-700">123456789</td>
          <td class="py-2 px-4 border-b text-gray-700">exemple@email.com</td>
          <td class="py-2 px-4 border-b">
            <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded">Éditer</button>
            <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded">Supprimer</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


       

</body>
</html>
<?php } ?>
