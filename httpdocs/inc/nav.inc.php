<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">weblog</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="?view=blog">Blog</a></li>
        <li><a href="?view=draft">Write</a></li>
        <li><a href="?view=search">Search</a></li>
        <!-- dropdown-toggle-menu for categories.
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">not</a></li>
            <li><a href="#">yet</a></li>
            <li><a href="#">implemented</a></li>
          </ul>
        </li>-->
      </ul>
        <ul class="pull-right">
            <?php
            if (!isset($_SESSION["loggedIn"])){
              ?>
                <li><a href='?view=register'>Register</a></li>
                <li><a href='?view=login'>Login</a></li>
            <?php
            }else{
              ?>
                <li>  <a href='?view=login&action=logout'>Logout</a></li>
              <?php

              }
            ?>
        </ul>
    </div>
  </div>
</nav>
