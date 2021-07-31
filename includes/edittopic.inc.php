<?php

if(isset($_POST['edit-theology-topic-submit'])) {

    require '../database/dbh.inc.php';
    require '../includes/errors.inc.php';

    if (isset($_POST['edit-theology-topic-id']) && isset($_POST['edit-theology-topic-title'])) {
        $theologyTopicId = $_POST['edit-theology-topic-id'];
        $theologyTopicTitle = $_POST['edit-theology-topic-title'];

        if (empty($theologyTopicId)) {
            header("Location: ../theology.php?error=missingid");
            exit();
        } elseif (empty($theologyTopicTitle)) {
            header("Location: ../theology.php?error=missintheologytopictitle");
            exit();
        }
        else {
            $sql = "UPDATE theologytopics SET TheologyTopicTitle = ? WHERE TheologyTopicId = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../theology.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $theologyTopicTitle, $theologyTopicId);
                mysqli_stmt_execute($stmt);
                header('Location: ../theology.php?theology-topic-updated=success');
                $conn->close();
            }
        }
    } else {
        header("Location: ../theology.php?update=failed");
        exit();
    }
}