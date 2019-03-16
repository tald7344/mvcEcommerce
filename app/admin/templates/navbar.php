
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand" href="/admin"><?= $text_dashboard ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav navbar-custom">
      <li class="nav-item">
        <a class="nav-link" href="/admin/categories"><?= $text_categories ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/items"><?= $text_items ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/members"><?= $text_members ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/comments"><?= $text_comments ?></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/admin/languages"><i class="fa fa-globe m-1"></i><?= $this->session == 'ar' ? 'EN' : 'AR';?></a>
      </li>
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