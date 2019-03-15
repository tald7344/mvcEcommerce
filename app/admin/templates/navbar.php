<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand" href="/admin"><?= $dashboard ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/admin/categories"><?= $categories ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/items"><?= $items ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/members"><?= $members ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/comments"><?= $comments ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/languages">Lang</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><?= $logout ?></a>
        </div>
      </li>      
    </ul>
  </div>
</div>
</nav>
<div class="container">