

<ul class="nav nav-pills my-2 justify-content-end">
    <?php
        if(!isset($_SESSION['username'])){
            echo '<li class="nav-item"><a class="nav-link" href="login.php?page=login">Login</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="signup.php?page=signup">Signup</a></li>';
        }else{
            echo '<li class="nav-item"><a class="nav-link" href="#"><button type="button" class="btn btn-primary position-relative">
  ' . $_SESSION["firstname"] . ' ' . $_SESSION["lastname"] . ' 
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'. $_SESSION["role"] .'</span></button></h4></a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="includes/logout.inc.php?page=logout">Logout</a></li>';
        }
    ?>
</ul>