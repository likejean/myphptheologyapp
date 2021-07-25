<?php

if(isset($_POST['delete-interpretation-submit'])) {

    require '../database/dbh.inc.php';
    require '../includes/errors.inc.php';

    if (isset($_POST['bible-interpretation-id'])) {
        $bibleInterpretationId = $_POST['bible-interpretation-id'];
    } else {
        header("Location: ../theology.php?delete=failed");
        exit();
    }

    if (empty($bibleInterpretationId)) {
        header("Location: ../theology.php?error=missingid");
        exit();
    } else {
        $sql = "DELETE FROM bibleinterpretations WHERE (BibleInterpretationId = ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../theology.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $bibleInterpretationId);
            mysqli_stmt_execute($stmt);
            header('Location: ../theology.php?bible-interpretation-deleted=success');
            $conn->close();
        }
    }
}
