<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter Annonce</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px; /* Adjust the width as needed */
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6">Ajouter un Annonce</h2>
            <form class="space-y-4" id="form" method="post" action="add_annoces.php">
                <div class="flex flex-col">
                    <label for="titre" class="text-sm font-semibold">Titre de l'Annonce</label>
                    <input type="text" id="titre" name="titre" class="border p-2 rounded-md">
                </div>
                <div class="flex flex-col">
                    <label for="description" class="text-sm font-semibold">Description du produit/service :</label>
                    <input type="text" id="description" name="description" class="border p-2 rounded-md">
                </div>
                <div class="flex flex-col">
                    <label for="prix" class="text-sm font-semibold">Prix:</label>
                    <input type="text" id="prix" name="prix" class="border p-2 rounded-md">
                </div>
                <div class="flex flex-col">
                    <label for="telephone" class="text-sm font-semibold">Telephone:</label>
                    <input type="text" id="telephone" name="telephone" class="border p-2 rounded-md">
                </div>
                <div class="flex flex-col">
                    <label for="email" class="text-sm font-semibold">Email:</label>
                    <input type="email" id="email" name="email" class="border p-2 rounded-md">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md"> <i class="fas fa-user-plus"></i> S'inscrire</button>
            </form>
        </div>
    </div>
</body>
</html>
