<?php
include 'Database.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center h-screen">
   <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full sm:w-96">
        <h3 class="text-2xl font-semibold text-center mb-6 text-white">Ajouter Admin </h3>
           <form id="signupForm" method="post" action="ajouter_Admin.php">
                        <div class="mb-4">
                  <label for="nom" class="block text-sm font-medium text-gray-400">Nom</label>
                <input type="text" id="nom" name="nom"
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
    </div>

  
    <button type="submit"
        class="w-full px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">Ajouter
    </button>
</form>

        </div>
    </div>

</body>

</html>
