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