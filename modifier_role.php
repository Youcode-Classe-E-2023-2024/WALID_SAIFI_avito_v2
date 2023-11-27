<?php
require_once "Database.php"; 
$conn = new Database();
$id = $_GET['id'];
$sql = "SELECT *  FROM roles WHERE id_role = $id"; 
$result = $conn->getConnection()->query($sql);
$row = $result->fetch_assoc();
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
                <h2 class="text-2xl font-semibold">Modifier Role</h2>
            </div>
            <form class="max-w-md mx-auto" id="form" method="post" action="">
                <input type="hidden" name="id" value="<?php echo $row['id_role'] ?>">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">username</label>
                    <input type="text" id="username" name="username" value="<?php echo $row['role'] ?>"
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
