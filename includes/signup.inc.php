<?php


if(isset($_POST['signup-submit'])){
    require '../database/dbh.inc.php';

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordRepeat = mysqli_real_escape_string($conn, $_POST['repeat-password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    if(empty($firstname)|| empty($lastname) || empty($username)
        || empty($email) || empty($password) || empty($passwordRepeat) || empty($role)){
        header("Location: ../signup.php?error=emptyfields");
        exit();
    } else {
        if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)){
            header("Location: ../signup.php?error=invalidchar");
            exit();
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                header("Location: ../signup.php?error=invalidemail&invalidusername&firstname=$firstname&lastname=$lastname");
                exit();
            }
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?error=invalidemail&firstname=$firstname&lastname=$lastname&username=$username");
                exit();

            }else if($password != $passwordRepeat) {
                header("Location: ../signup.php?error=passwordcheck&email=$email&firstname=$firstname&lastname=$lastname&username=$username");
                exit();
            }

            //Verify if username already exists
            else{
                $sql = "SELECT * FROM users WHERE username=? OR email=?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    echo "<br>".$resultCheck."<br>";
                    if($resultCheck > 0){
                        header("Location: ../signup.php?error=username_or_email_already_exists&email=$email&firstname=$firstname&lastname=$lastname&password=$password");
                        exit();
                    }

                    $sql = "INSERT INTO users (firstname, lastname, username, email, password, role) VALUES (?, ?, ?, ?, ?, ?);";
                    $stmt = mysqli_stmt_init($conn);

                    //Verify
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    } else {
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $username, $email, $hashedPassword, $role);
                        mysqli_stmt_execute($stmt);
                        header('Location: ../signup.php?signup=success');

                    }
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    exit();
                }
            }
        }
    }

} else {
    header('Location: ../signup.php');
    exit();
}