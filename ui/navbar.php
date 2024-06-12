<head>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/index.css">
</head>

<!-- navbar disini -->
<nav class="navbar navbar-expand-md p-3 bg fixed-top">
  <a class="navbar-brand" href="#">Games 4Y</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <button class="nav-link" href="#">Home <span class="sr-only"></span></button>
      </li>
      <li class="nav-item ">
          <button class="nav-link" href="#">Dashboard</button>
      </li>
      <li class="nav-item dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kategori Game
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="game.php?platform=pc">PC</a></li>
              <li><a class="dropdown-item" href="game.php?platform=mobile">Mobile</a></li>
              <li><a class="dropdown-item" href="game.php?platform=console">Console</a></li>
            </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>