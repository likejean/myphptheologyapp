
<?php

if(isset($_POST['delete-topic-submit'])) {

    require '../database/dbh.inc.php';
    require '../includes/errors.inc.php';

    if (isset($_POST['theology-topic-id'])) {
        $theologyTopicId = $_POST['theology-topic-id'];
        if (empty($theologyTopicId)) {
            header("Location: ../theology.php?error=missingid");
            exit();
        } else {
            $sql = "DELETE FROM theologytopics WHERE (TheologyTopicId = ?);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../theology.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $theologyTopicId);
                mysqli_stmt_execute($stmt);
                header('Location: ../theology.php?theology-topic-deleted=success');
                $conn->close();
            }
        }
    } else {
        header("Location: ../theology.php?delete=failed");
        exit();
    }
}

