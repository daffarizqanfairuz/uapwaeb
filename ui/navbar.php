<?php
include '../db/auth.php';
?>
<head>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/f1396b40aa.js" crossorigin="anonymous"></script>
</head>

<!-- navbar disini -->
<nav class="navbar navbar-expand-md p-3 bg fixed-top">
  <a class="navbar-brand" href="index.php">Games 4Y</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
      </li>
      <?php if($akses === 1): ?>
      <li class="nav-item ">
          <a class="nav-link" href="">Dashboard</a>
      </li>
      <?php endif; ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="kategoriGameDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Kategori Game
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="game.php?platform=pc&genre=Action">PC</a></li>
          <li><a class="dropdown-item" href="game.php?platform=mobile&genre=Action">Mobile</a></li>
          <li><a class="dropdown-item" href="game.php?platform=console&genre=Action">Console</a></li>
        </ul>
    </div>
      <ul class="navbar-nav ms-auto">
          <?php if($logon === 0): ?>
          <li class="nav-item">
              <a class="nav-link" href="login.html">Login</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="register.html">Register</a>
          </li>
          <?php endif;?>
          <?php if($logon === 1): ?>
          <li class="nav-item">
              <a class="nav-link" href="register.html"><?php echo $nama;?></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
          </li>
          <?php endif; ?>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>