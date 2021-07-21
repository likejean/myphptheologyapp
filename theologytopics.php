<!-- USEFUL LINKS: https://database.guide/create-a-relationship-in-sql/-->

<script>
    function clickHeartIconHandler(id){
        window.location.href = "./includes/updateuserlikes.inc.php?bible-interpretation-id=" + id;
    }
</script>
<?php
function fetchUserLikes($id)
{
    require './database/dbh.inc.php';
    $sql = "SELECT * FROM userfavorites WHERE BibleInterpretationId = $id";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $count = 0;
            while ($row = mysqli_fetch_array($result)) {
                $count++;
            }
            return $count;
        }
        {
            return 0;
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

function renderHeartIconFill($count, $bibleInterpretationId)
{
    if ($count == 0) return '<i onclick="clickHeartIconHandler(' . $bibleInterpretationId . ');" class="fa fa-heart-o" style="cursor: pointer; font-size: 15px; padding-right: 8px; color: #FF0000;"></i>' . $count;
    else return '<i onclick="clickHeartIconHandler(' . $bibleInterpretationId . ');" class="fa fa-heart" style="cursor: pointer; font-size: 15px; padding: 0px 5px; color: #FF0000;"></i>' . $count;
}

function fetchAuthorName($id)
{
    require './database/dbh.inc.php';
    $sql = "SELECT * FROM users WHERE userId = $id";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            mysqli_free_result($result);
            return $row;
        } else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}


function fetchBibleInterpretations($id, $title)
{
    require './database/dbh.inc.php';
    $sql = "SELECT * FROM bibleinterpretations WHERE TheologyTopicId = $id";
    $title = str_replace(array(' '), '_', $title);

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $count = 1;
            echo '<h5 class="card-subtitle d-flex justify-content-center my-3 text-muted">
                    <span class="badge badge-light d-flex align-items-center mx-2"> Interpretations: ' . mysqli_num_rows($result) . '</span>
                    <span class="create-interpretation-button badge badge-light d-flex justify-content-center" style="cursor: pointer;" data-toggle="modal" data-target="#create-interpretation-modal">
                        <i data-topic-title=' . $title . ' data-topic-id=' . $id . ' class="fa fa-plus p-1"></i>
                    </span>
               </h5>';

            while ($row = mysqli_fetch_array($result)) {
                $bibleInterpretationId = $row["BibleInterpretationId"];
                $text = $row["BibleInterpretationDescription"];
                $header = $row["BibleInterpretationHeader"];
                $author = $row["AuthorId"];
                $date = $row["BibleInterpretationDateCreated"];
                $likes = fetchUserLikes($bibleInterpretationId);
                echo '<div class="tab-content">
                               
                                <span class="badge badge-secondary d-flex justify-content-center mb-2 p-1 text-muted"> 
                                    <span class="badge badge-light d-flex align-items-center pr-2 mx-2" style="font-size: 15px;">
                                        <i class="fa fa-user" style="font-size: 15px; padding: 5px;"></i> 
                                        ' . fetchAuthorName($author)["firstname"] . ' ' . fetchAuthorName($author)["lastname"] . '
                                    </span>
                                    <span class="badge badge-light d-flex align-items-center pr-2 mx-2" style="font-size: 15px;">
                                        <i class="fa fa-calendar" style="font-size: 15px; padding: 5px;"></i> 
                                        ' . $date . '
                                    </span> 
                                    <span class="badge badge-light d-flex align-items-center pr-2 mx-2" style="font-size: 15px;">                               
                                    ';
                echo renderHeartIconFill($likes, $bibleInterpretationId);
                echo '</span>
                                </span>
                                <div class="card">
                                    <h5 class="card-title mt-4 d-flex justify-content-center">' . $header . '</h5>                                
                                    <div class="card-body">' . $text . '</div>
                            </div>
                        </div>';
                $count = $count + 1;
            }
            mysqli_free_result($result);
        } else {
            echo '<h5 class="card-subtitle d-flex justify-content-center my-3 text-muted">
                     <span class="create-interpretation-button badge badge-light d-flex justify-content-center" style="cursor: pointer;" data-toggle="modal" data-target="#create-interpretation-modal">
                        <i data-topic-title=' . $title . ' data-topic-id=' . $id . ' class="fa fa-plus p-1"></i>
                    </span>
               </h5>';
            echo '<div style="display: flex"><span class="badge badge-light" style="color: lightcoral; font-style: italic; width: 100rem;"><h6>No interpretations were added to this topic yet.</h6></span></div>';
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

function fetchTheologyTopics($theologyTopicId, $title, $count)
{
    echo '
                <div class="row mx-5 my-5 justify-content-center">
                    <div class="tabs">                       
                        <div class="tab">
                                <input class="tab-input" type="checkbox" id="chck' . $theologyTopicId . '">
                                <label class="tab-label" for="chck' . $theologyTopicId . '">' . $count . '. ' . $title . '
                                    <span class="delete-topic-button" data-toggle="modal" data-target="#delete-topic-modal" type="button" theologyId='. $theologyTopicId . ' data-toggle="modal" style="margin-left: auto; cursor: pointer; padding: 2px 25px; font-size: 21px;">
                                        <i data-topic-id=' . $theologyTopicId . ' class="fa fa-trash"></i>
                                    </span>
                                </label>';
                            echo fetchBibleInterpretations($theologyTopicId, $title);
                            echo '<div id="delete-topic-modal"></div>';
                            echo '</div>
                        </div>
                    </div>
                </div>        
            ';
}

?>





