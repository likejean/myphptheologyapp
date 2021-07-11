<!-- USEFUL LINKS: https://database.guide/create-a-relationship-in-sql/-->

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
            } {
                return 0;
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

    function renderHeartIconFill($count)
    {
        if ($count == 0) return '<i class="fa fa-heart-o" style="cursor: pointer; font-size: 15px; padding-right: 8px; color: #FF0000;"></i>' . $count;
        else return '<i class="fa fa-heart" style="cursor: pointer; font-size: 15px; padding-right: 8px; color: #FF0000;"></i>' . $count;
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


    function fetchBibleInterpretations($id)
    {

        require './database/dbh.inc.php';

        $sql = "SELECT * FROM bibleinterpretations WHERE TheologyTopicId = $id";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $count = 1;
                echo '<h5 class="card-subtitle d-flex justify-content-center my-3 text-muted">
                                <span class="badge badge-light d-flex align-items-center mx-2"> Interpretations: ' . mysqli_num_rows($result) . '</span>
                                <span class="badge badge-light d-flex justify-content-center"><i class="fa fa-plus p-1" style="cursor: pointer; font-size: 15px; padding-right: 8px; color: darkblue;"></i></span>
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
                                    <span class="badge badge-light d-flex align-items-center pr-2 mx-2" style="font-size: 10px;">
                                    <i class="fa fa-user" style="font-size: 15px; padding-right: 8px"></i> 
                                    ' . fetchAuthorName($author)["firstname"] . ' ' . fetchAuthorName($author)["lastname"] . '
                                    </span>
                                    <span class="badge badge-light d-flex align-items-center pr-2 mx-2" style="font-size: 10px;">
                                    <i class="fa fa-calendar" style="font-size: 15px; padding-right: 8px"></i> 
                                    ' . $date . '
                                    </span> 
                                    <span class="badge badge-light d-flex align-items-center pr-2 mx-2" style="font-size: 10px;">                               
                                    ';
                    echo renderHeartIconFill($likes);
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
                echo '<div style="display: flex"><span class="badge badge-light" style="color: lightcoral; font-style: italic; width: 100rem;"><h6>No interpretations were added to this topic yet.</h6></span></div>';
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

    function fetchTheologyTopics($theologyTopicId, $title, $count)
    {
        echo '    
                <div class="row mx-5 my-2 justify-content-center">
                    <div class="tabs">
                        <div class="tab">
                            <input class="tab-input" type="checkbox" id="chck' . $theologyTopicId . '">
                                <label class="tab-label" for="chck' . $theologyTopicId . '">' . $count . '. ' . $title . '</label>';
                            echo fetchBibleInterpretations($theologyTopicId);
                            echo '</div>
                        </div>    
                    </div>
                </div>        
            ';
    }




