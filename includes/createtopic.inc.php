<?php

if(isset($_POST['create-new-topic-submit'])){

    require '../database/dbh.inc.php';
    require '../includes/errors.inc.php';
//
    session_start();
    $theologyTopic =  mysqli_real_escape_string($conn, $_POST['theology-topic']);
    $authorId = $_SESSION['userId'];

    if(empty($theologyTopic) || empty($authorId)){
        header("Location: ../theology.php?error=emptyfields");
        exit();
    }else {
        $sql = "INSERT INTO theologytopics (TheologyTopicTitle, AuthorId) VALUES (?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../theology.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $theologyTopic, $authorId);
            mysqli_stmt_execute($stmt);
            header('Location: ../theology.php?new-theology-topic-created=success');
            $conn->close();
        }
    }
}
else {
    header('Location: ../theology.php');
    exit();
}