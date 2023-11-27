<?php
require_once "Database.php"; 
$conn = new Database();
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE user_id = $id"; // Use the correct table name and column names
$result = $conn->getConnection()->query($sql);
if ($result) {
    $row = $result->fetch_assoc();
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
    <div class="cont_ajout">
        <div class="container mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-semibold">Modifier utilisateur</h2>
            </div>
            <form class="max-w-md mx-auto" id="form" method="post" action="update_user.php">
                <input type="hidden" name="id" value="<?php echo $row['user_id'] ?>">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">username</label>
                    <input type="text" id="username" name="username" value="<?php echo $row['username'] ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" id="username" name="password" value="<?php echo $row['password'] ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">Id</label>
                    <input type="text" id="username" name="id_role" value="<?php echo $row['id_role'] ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">Nom</label>
                    <input type="text" id="username" name="nom" value="<?php echo $row['nom'] ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">Prenom</label>
                    <input type="text" id="username" name="prenom" value="<?php echo $row['prenom'] ?>"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <!-- Add other fields as needed (password, role, nom, prenom, etc.) -->
                <button type="submit"
                    class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    <i class="fas fa-user-plus"></i> Modifier
                </button>
            </form>
        </div>
    </div>
</body>

</html>
