<?php

if(isset($_POST['create-new-bible-interpretation-submit'])){

    require '../database/dbh.inc.php';
    require '../includes/errors.inc.php';
//
    session_start();
    $bibleInterpretationHeader =  mysqli_real_escape_string($conn, $_POST['bible-interpretation-header']);
    $bibleInterpretationDescription =  mysqli_real_escape_string($conn, $_POST['bible-interpretation-text']);
    $theologyTopicId =  mysqli_real_escape_string($conn, $_POST['theology-topic-id']);
    $authorId = $_SESSION['userId'];

    if(empty($bibleInterpretationHeader) || empty($bibleInterpretationDescription)){
        header("Location: ../theology.php?error=emptyfields");
        exit();
    }else if(empty($theologyTopicId) || empty($authorId)) {
        header("Location: ../theology.php?error=missingid");
        exit();
    } else{
        $sql = "INSERT INTO bibleinterpretations (BibleInterpretationHeader, BibleInterpretationDescription, TheologyTopicId, AuthorId) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../theology.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $bibleInterpretationHeader,  $bibleInterpretationDescription, $theologyTopicId, $authorId);
            mysqli_stmt_execute($stmt);
            header('Location: ../theology.php?new-bible-interpretation-created=success');
            $conn->close();
        }
    }
}
else {
    header('Location: ../theology.php');
    exit();
}