<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
    </head>
    <body>

        <?php
            require 'navbar.php';
            require 'auth.php';
        ?>

        <div class="container-fluid mt-5 w-25">
            <div class="row d-flex justify-content-center my-5"><h2>Register</h2></div>
            <div class="row d-flex justify-content-center">
                <form action="includes/signup.inc.php" method="post">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Firstname">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Lastname">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">User Nickname</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="repeat-password" class="form-label">Repeat Password</label>
                        <input type="password" name="repeat-password" class="form-control" id="repeat-password" placeholder="Repeat Password">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">User Access</label>
                        <select class="form-select form-select-sm mb-1" name="role" id="role" aria-label=".form-select-sm example" >
                            <option selected>Open to select role</option>
                            <option value="guest">Guest</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" name="signup-submit" value="signup-submit" class="btn btn-primary">Signup</button>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
