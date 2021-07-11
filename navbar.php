<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <div class="container-fluid">
        <a href="#">
            <img src="img/php_logo.png" width="100px" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="font-size: 25px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="theology.php" style="font-size: 25px;">Theology</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 25px;">About me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 25px;">Contact</a>
                </li>
            </ul>
        </div>
        <?php
            if(isset($_SESSION["firstname"])){
                echo '<button type="button" class="btn btn-primary position-relative">';
                require 'avatar.php';
                echo $_SESSION["firstname"] .' '. $_SESSION["lastname"];
                echo '<span class="position-absolute top-0 start-85 translate-middle badge rounded-pill bg-danger">';
                echo$_SESSION["role"];
                echo '</span></button>';
            }
        ?>
    </div>
</nav>