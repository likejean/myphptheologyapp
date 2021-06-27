<?php


if(isset($_POST['login-submit'])){

    require '../database/dbh.inc.php';
//
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(empty($email) || empty($password)){
        header("Location: ../login.php?error=emptyfields");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE email=? OR password=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $passwordCheck = password_verify($password, $row['password']);
                if($passwordCheck == false) {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }else{
                    session_start();
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['role'] = $row['role'];
                    header("Location: ../index.php?login=success");
                    exit();
                }

            }else{
                header("Location: ../login.php?error=notfound");
                exit();
            }
        }
    }

}
else {
    header('Location: ../index.php');
    exit();
}