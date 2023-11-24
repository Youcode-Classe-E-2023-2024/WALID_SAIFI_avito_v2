<?php
include 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start(); 
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($username) && isset($password)) {
        $db = new Database();
        $conn = $db->getConnection();
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "SELECT users.user_id, users.username, users.password, roles.role
                  FROM users 
                  JOIN roles ON users.id_role = roles.id_role 
                  WHERE username='$username' AND password='$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];

            switch ($row['role']) {
                case 'admin':
                    header("Location: admin.php");
                    break;
                case 'advertiser':
                    header("Location: advertiser.php");
                    break;
                case 'client':
                    header("Location: client.php");
                    break;
                default:
                    header("Location: login.php");
                    break;
            }

            exit(); 
        } else {
        }

        $conn->close();
    }
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

<body class="bg-gray-900 flex items-center justify-center h-screen">

    <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full sm:w-96">
        <h3 class="text-2xl font-semibold text-center mb-6 text-white">Login</h3>
        <form id="loginForm" onsubmit="return validateForm()" method="post" action="">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-400">Username</label>
                <input type="text" id="username" name="username"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-400">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
            <button type="submit"
                class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
        </form>

        <div class="mt-4">
            <a href="SignUp.php" >
            <button
                class="w-full px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">
                Sign Up
            </button>
            </a>
        </div>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if (!username || !password) {
                alert('Veuillez remplir tous les champs.');
                return false;
            }

            return true;
        }
    </script>

</body>

</html>
