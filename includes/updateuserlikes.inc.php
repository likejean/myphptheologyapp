<?php
    require '../database/dbh.inc.php';
    require '../includes/errors.inc.php';

    session_start();
    $bibleInterpretationId =  mysqli_real_escape_string($conn, $_GET['bible-interpretation-id']);
    $authorId = $_SESSION['userId'];

    if(empty($bibleInterpretationId) || empty($authorId)){
        header("Location: ../theology.php?error=missingid");
        exit();
    }else {
        $sql = "SELECT * FROM userfavorites WHERE AuthorId=? AND BibleInterpretationId=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../theology.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $authorId, $bibleInterpretationId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                $sql = "DELETE FROM userfavorites WHERE AuthorId=? AND BibleInterpretationId=?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../theology.php?error=sqlerror&action=delete");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $authorId, $bibleInterpretationId);
                    mysqli_stmt_execute($stmt);
                    header('Location: ../theology.php?previous-like-removed=success');
                    $conn->close();
                }
            }else{
                $sql = "INSERT INTO userfavorites (AuthorId, BibleInterpretationId) VALUES (?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../theology.php?error=sqlerror&action=insert");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $authorId, $bibleInterpretationId);
                    mysqli_stmt_execute($stmt);
                    header('Location: ../theology.php?new-like-added=success');
                    $conn->close();
                }
            }
        }
    }