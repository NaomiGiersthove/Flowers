<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
        <?php if (isset($_SESSION['login'])) {?>
            <a class="nav-link" href="logout_process.php">Logout</a>
        </li>
        <li>
            <a class="nav-link" href="edit_password.php">Wijzig wachtwoord</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="stockrooms.php">Magazijn overzicht</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="flowers.php">Bloemen overzicht</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="storage.php">Voorraad overzicht</a>
        </li>
        <?php } else {?>
            <a class="nav-link" href="login.php">Login</a>
        <?php }?>
        </li>        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>