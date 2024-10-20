<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link"href="index.php">Les questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publish-question.php">Publier une question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-questions.php">Mes questions</a>
        </li>
        <?php 
          if(isset($_SESSION['auth'])){
            ?>
          <li class="nav-item">
            <a class="nav-link" href="profile.php?id=<?=$_SESSION['id'] ?>">Mon profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="actions/users/logoutAction.php">Déconnexion</a>
          </li>
            <?php
          }
        ?>
    
      </ul>
    </div>
  </div>
</nav>