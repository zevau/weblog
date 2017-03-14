<nav class="navbar">
  <div class="navbar-container">
    <div class="navbar-header">
      <a class="navbar-brand">weblog</a>
    </div>
      <ul class="navbar-content" id="nav-links">
        <li><a href="?view=blog">Blog</a></li>
        <li><a href="?view=draft">Write</a></li>
        <li><a href="?view=search">Search</a></li>
      </ul>
        <ul class="navbar-content pull-right">
            <?php
            if (!isset($_SESSION["loggedIn"])){
              ?>
                <li><a href='?view=register'>Register</a></li>
                <li><a href='?view=login'>Login</a></li>
            <?php
            }else{
              ?>
                <li id="logged-in-as">Logged in as
                  <a href='?view=profile&user=<?php echo $_SESSION["username"];?>'>
              	   <?php
              	   echo $_SESSION["username"];
              	   ?>
                  </a>
                </li>
                <li>  <a href='?view=login&action=logout'>Logout</a></li>
              <?php

              }
            ?>
        </ul>
  </div>
</nav>
