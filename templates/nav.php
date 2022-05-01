<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Coding w/ Beto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= $upFolderPlaceholder."index.php" ?>">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Articles</a>
            <ul>
                <li><a href="<?= $upFolderPlaceholder. "articles/index.php?articles=html" ?>">HTML</a></li>
                <li><a href="<?= $upFolderPlaceholder. "articles/index.php?articles=css" ?>">CSS</a></li>
                <li><a href="<?= $upFolderPlaceholder. "/articles/index.php?articles=php" ?>">PHP</a></li>
                <li><a href="<?= $upFolderPlaceholder. "/articles/index.php?articles=mysql" ?>">MYSQL</a></li>
                <li><a href="<?= $upFolderPlaceholder. "articles/index.php?articles=tutorials" ?>">TUTORIALS</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About Me</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
