
<?php
    require './header.php';
    echo '<div class="row d-flex justify-content-center my-2 text-muted">';
        require './includes/errors.inc.php';
    echo '</div>';
    require './database/dbh.inc.php';
    require './theologytopics.php';
    require './createtopic.php';
    require './deletetopic.php';
    require './createinterpretation.php';

$sql = "SELECT * FROM theologytopics";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $count = 1;
            if(!isset($_SESSION['userId']) || $_SESSION['userId'] == ''){
                echo '<div class="row d-flex justify-content-center my-2 text-muted"><div class="alert alert-danger d-flex justify-content-start align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mx-3 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <span class="ml-1">Please, login to add new theology topics or bible interpretations</span>
                        </div>
                   </div>';
            }else{
                echo '<div class="row d-flex justify-content-center my-3 text-muted">
                    <button type="button" data-toggle="modal" data-target="#create-topic-modal" class="btn btn-secondary">Add new theology topic</button>
                </div>';
            }

            while ($row = mysqli_fetch_array($result)) {
                $id = $row["TheologyTopicId"];
                echo fetchTheologyTopics($id, $row["TheologyTopicTitle"], $count);
                $count = $count + 1;
            }
            mysqli_free_result($result);
        } else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
    require './footer.php';
    ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>
            $('span.create-interpretation-button').click(function(e) {
                let bibleTopicId = $(e.target).data('topic-id');
                let bibleTopicTitle = $(e.target).data('topic-title');
                let input = $("<input>").attr("class", "bible-interpretation-id").attr("type", "hidden").attr("name", "theology-topic-id").val(bibleTopicId);
                $('.create-interpretation').append(input);
                $('#topic-title').text(bibleTopicTitle.replace(/_/g, ' '));
            });

            $('#create-interpretation-modal-close-button').click(function() {
                $("input.bible-interpretation-id").remove();
            });

            ////////////////////

            $('span.delete-topic-button').click(function(e) {
                let bibleTopicId = $(e.target).data('topic-id');
                let input = $("<input>").attr("class", "theology-topic-id").attr("type", "hidden").attr("name", "theology-topic-id").val(bibleTopicId);
                $('.delete-topic').append(input);
            });

            $('#delete-topic-modal-close-button').click(function() {
                $("input.theology-topic-id").remove();
            });
        </script>
        </body>
    </html>




