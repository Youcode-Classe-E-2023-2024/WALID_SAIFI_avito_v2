<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 flex items-center justify-center h-screen">

<div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full sm:w-96">
  <h3 class="text-2xl font-semibold text-center mb-6 text-white">Login</h3>
  <form id="loginForm" onsubmit="return validateForm()">
    <div class="mb-4">
      <label for="username" class="block text-sm font-medium text-gray-400">Username</label>
      <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
    </div>
    <div class="mb-4">
      <label for="password" class="block text-sm font-medium text-gray-400">Password</label>
      <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
    </div>
    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
  </form>
</div>

<!-- Custom JavaScript -->
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
