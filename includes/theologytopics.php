<!-- USEFUL LINKS: https://database.guide/create-a-relationship-in-sql/-->

<?php

    function fetchAuthorName($id) {
        require './database/dbh.inc.php';
        $sql = "SELECT * FROM users WHERE userId = $id";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                mysqli_free_result($result);
                return $row;
            }else {
                echo "No records matching your query were found.";
            }
        }else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

    function fetchBibleInterpretations($id) {

        require './database/dbh.inc.php';

        $sql = "SELECT * FROM bibleinterpretations WHERE TheologyTopicId = $id";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $count = 1;
                echo '<h6 class="card-subtitle d-flex justify-content-center mb-2 text-muted">
                            <span class="badge badge-primary"> Interpretations: '. mysqli_num_rows($result) . '</span>
                       </h6>';
                while ($row = mysqli_fetch_array($result)) {
                    $text = $row["BibleInterpretationDescription"];
                    $header = $row["BibleInterpretationHeader"];
                    $author = $row["AuthorId"];
                    $date = $row["BibleInterpretationDateCreated"];
                        echo '<div class="tab-content">
                            <span class="badge badge-secondary d-flex justify-content-center mb-2 p-1 text-muted"> 
                                <span class="badge badge-light d-flex align-items-center pr-2 mx-2" style="font-size: 10px;">
                                <i class="fa fa-user" style="font-size: 15px; padding-right: 8px"></i> 
                                ' . fetchAuthorName($author)["firstname"] . ' ' . fetchAuthorName($author)["lastname"] . '
                                </span>
                                <span class="badge badge-light d-flex align-items-center pr-2 mx-2" style="font-size: 10px;">
                                <i class="fa fa-calendar" style="font-size: 15px; padding-right: 8px"></i> 
                                '. $date . '
                                </span> 
                                <span class="badge badge-light d-flex align-items-center pr-2 mx-2" style="font-size: 10px;">
                                <i class="fa fa-heart" style="font-size: 15px; padding-right: 8px; color:"#FF0000";"></i> 
                                3
                                </span>
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
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

    function fetchTheologyTopics($theologyTopicId, $title, $count) {
       echo '    
            <div class="row mx-5 my-2 justify-content-center">
                <div class="tabs">
                    <div class="tab">
                        <input type="checkbox" id="chck'.$theologyTopicId.'">
                            <label class="tab-label" for="chck'.$theologyTopicId.'">'. $count . '. ' . $title .'</label>';
                            echo fetchBibleInterpretations($theologyTopicId);
                        echo '</div>
                    </div>    
                </div>
            </div>        
        ';
    }




