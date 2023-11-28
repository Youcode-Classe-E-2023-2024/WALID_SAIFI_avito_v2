
<?php
require_once "Database.php"; 
$conn = new Database();
$id = $_GET['id'];
$sql = "SELECT *  FROM  annonces  WHERE id_annonce = $id"; 
$result = $conn->getConnection()->query($sql);
$row = $result->fetch_assoc();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="style.css"> <!-- You can add your custom styles here -->
    <title>Modifier Annonce</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f3f4f6; /* Ajout d'une couleur de fond */
        }

        .cont_ajout {
            width: 100%;
            max-width: 480px; /* Ajustez la largeur maximale selon vos besoins */
        }
    </style>
</head>

<body>
    <div class="cont_ajout bg-white p-8 shadow-md rounded-md">
        <div class="header mb-8">
            <h2 class="text-2xl font-bold">Modifier une Annonce</h2>
        </div>
            <form class="form" id="form" method="post" action="update_annonces.php">
                <input type="hidden" name="id" value="<?php echo $row['id_annonce'] ?>">
                <div class="mb-4">
                    <label for="titre" class="block text-sm font-medium text-gray-600">Titre de l'Annonce</label>
                    <input type="text" id="titre" name="titre" value="<?php echo $row['titre'] ?>" class="mt-1 p-2 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-600">Description du produit/service :</label>
                    <input type="text" id="description" name="description" value="<?php echo $row['description'] ?>" class="mt-1 p-2 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="prix" class="block text-sm font-medium text-gray-600">Prix:</label>
                    <input type="text" id="prix" name="prix" value="<?php echo $row['prix'] ?>" class="mt-1 p-2 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="telephone" class="block text-sm font-medium text-gray-600">Telephone:</label>
                    <input type="text" id="telephone" name="telephone" value="<?php echo $row['telephone'] ?>" class="mt-1 p-2 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email'] ?>" class="mt-1 p-2 border rounded-md w-full">
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md"> <i
                        class="fas fa-user-plus"></i> Modifier</button>
            </form>
        </div>
    </div>
</body>

</html>
