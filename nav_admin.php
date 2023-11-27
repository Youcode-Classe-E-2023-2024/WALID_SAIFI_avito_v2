<nav class="bg-black p-5">
  <div class="container mx-auto flex justify-between items-center">
    <a href="admin.php">
      <img src="avito-logo.webp" alt="Nom de votre site" class="h-13 w-28">
    </a>
    <div class="space-x-4 flex items-center">
      <a href="#" class="text-white flex items-center hover:text-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
          <!-- Icône pour "liste Role" -->
        </svg>
        Liste Role
      </a>
      <a href="list_user.php" class="text-white flex items-center hover:text-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
          <!-- Icône pour "Afficher Admin" -->
        </svg>
        Afficher les Utilisateur
      </a>
      <a href="ajouter_Admin.php" class="text-white flex items-center hover:text-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
          <!-- Icône pour "Ajouter Admin" -->
        </svg>
        Ajouter Admin
      </a>
      <!-- Vous pouvez réactiver ces lignes si nécessaire -->
      <!-- <span class="text-white">Type: <?php echo isset($_SESSION['role']) ? $_SESSION['role'] : ''; ?></span>
      <span class="text-white">Username: <?php echo $_SESSION['username'] ?></span> -->
      <a href="dec.php" class="text-white flex items-center text-2xl font-semibold bg-red-500 hover:bg-red-700 py-1 px-2 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20" fill="currentColor">
          <path d="M2 2v16h16V2H2zm14 14H4V8h12v8z"/>
        </svg>
        Deconnecter
      </a>
    </div>
  </div>
</nav>
