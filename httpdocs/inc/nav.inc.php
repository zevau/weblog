<nav class="navbar">
  <div>
    <!-- Aus Bootstrap.. teilweise. -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">BLOG</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav-buttons">
        <li><a href="?view=blog">Blog</a></li>
        <li><a href="?view=write">Write</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">4</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">5</a></li>
          </ul>
        </li>
      </ul>
        <ul class="nav-buttons pull-right">
            <?php
            if (!isset($_SESSION["loggedIn"])){
                echo("<li>
                        <a href='?view=login'>Login</a>
                      </li>");
            }else{
                echo ("<li>
                         <a href='?view=login&action=logout'>Logout</a>
                       </li>");
            }
            ?>
            <li></li>
        </ul>
    </div>
  </div>
</nav>
