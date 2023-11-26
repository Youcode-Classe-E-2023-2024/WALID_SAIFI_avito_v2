<?php
require_once "Database.php"; 
$conn = new Database();
$id = $_GET['id'];
$sql = "SELECT * FROM annonces WHERE  id_annonce= $id";
$result = $conn->getConnection()->query($sql);
if ($result) {
    $row = $result->fetch_assoc();
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Modifier Annonce</title>
</head>

<body class="bg-gray-200">
    <div class="cont_ajout">
        <div class="container mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-semibold">Modifier une Annonce</h2>
            </div>
            <form class="max-w-md mx-auto" id="form" method="post" action="update.php">
                <input type="hidden" name="id" value="<?php echo $row['id_annonce'] ?>">
                <div class="mb-4">
                    <label for="titre" class="block text-sm font-medium text-gray-600">Titre de l'Annonce</label>
                    <input type="text" id="titre" name="titre" value="<?php echo $row['titre'] ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-600">Description du
                        produit/service :</label>
                    <input type="text" id="description" name="description" value="<?php echo $row['description'] ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="prix" class="block text-sm font-medium text-gray-600">Prix:</label>
                    <input type="text" id="prix" name="prix" value="<?php echo $row['prix'] ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="telephone" class="block text-sm font-medium text-gray-600">Telephone:</label>
                    <input type="text" id="telephone" name="telephone" value="<?php echo $row['telephone'] ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email'] ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <button type="submit"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    <i class="fas fa-user-plus"></i> Modifier
                </button>
            </form>
        </div>
    </div>
</body>

</html>
