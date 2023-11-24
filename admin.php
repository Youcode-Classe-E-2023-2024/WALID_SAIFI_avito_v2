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
  <title>Navbar Example</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">

<!-- Navbar -->
<nav class="bg-gray-900 p-5">
  <div class="container mx-auto flex justify-between items-center">
  <a href="admin.php">
      <img src="avito-logo.webp" alt="Nom de votre site" class="h-13 w-28">
    </a>
    <div class="space-x-4">
      <a href="#" class="text-white">Home</a>
      <a href="#" class="text-white">About</a>
      <a href="#" class="text-white">Contact</a>
      <span class="text-white">Username: <?php echo $_SESSION['username'] ?></span>
      <a href="deconnexion.php" class="text-2xl font-semibold">Deconnecter</a>
    </div>
  </div>
</nav>


<!-- Content -->
<div class="container mx-auto mt-5">
  <div class="p-8 bg-gray-300 rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold mb-4">Page Content</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam massa nec tellus venenatis, a volutpat turpis vulputate.</p>
  </div>
</div>

</body>
</html>
<?php  } ?>