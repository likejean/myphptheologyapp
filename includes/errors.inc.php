<?php

    //FAILURE:
    if(isset($_GET['error'])){
        $error = $_GET['error'];
        if($error == 'emptyfields'){
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                Please, fill missing fields!
                              </div>
                            </div>';
        }else if($error == 'missingid'){
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                Internal error occurred. Missing id values possibly. Please, try again...
                              </div>
                            </div>';
        }else if($error == 'wrongpassword'){
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                Wrong username or password!
                              </div>
                            </div>';
        }else if($error == 'notfound'){
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                This user not found!
                              </div>
                            </div>';
        }else if($error == 'invalidemail'){
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                You have invalid email!
                              </div>
                            </div>';
        }else if($error == 'passwordcheck'){
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                Repeat password does not match!
                              </div>
                            </div>';
        }else if($error == 'sqlerror'){
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                SERVER ERROR. Please, try again...
                              </div>
                            </div>';
        }

    }


    //SUCCESS:
    else if(isset($_GET['signup'])){
        $register = $_GET['signup'];
        if($register == 'success'){
            echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                You have registered successfully!
                              </div>
                            </div>';
        }
    }

    else if(isset($_GET['new-theology-topic-created'])) {
        $theology = $_GET['new-theology-topic-created'];
        if ($theology == 'success') {
            echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 mx-2 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                You have created new theology topic successfully!
                              </div>
                            </div>';
        }
    }
    else if(isset($_GET['new-bible-interpretation-created'])) {
        $theology = $_GET['new-bible-interpretation-created'];
        if ($theology == 'success') {
            echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 mx-2 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                          <div>
                            You have created new bible interpretation successfully!
                          </div>
                        </div>';
        }
    }
    else if(isset($_GET['theology-topic-deleted'])){
        $theology = $_GET['theology-topic-deleted'];
        if($theology == 'success'){
            echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 mx-2 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                You have deleted theology topic...
                              </div>
                            </div>';
        }
    }else if(isset($_GET['bible-interpretation-deleted'])){
        $interpretation = $_GET['bible-interpretation-deleted'];
        if($interpretation == 'success'){
            echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 mx-2 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                You have deleted bible interpretation...
                              </div>
                            </div>';
        }
    }else if(isset($_GET['new-like-added'])){
        $theology = $_GET['new-like-added'];
        if($theology == 'success'){
            echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 mx-2 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                You have added <i class="fa fa-heart" style="font-size: 15px; padding: 0px 5px; color: #FF0000;"></i>
                                to this bible interpretation!
                              </div>
                            </div>';
        }
    }else if(isset($_GET['previous-like-removed'])){
        $theology = $_GET['previous-like-removed'];
        if($theology == 'success'){
            echo '<div class="alert alert-primary d-flex align-items-center" role="alert">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-3 mx-2 bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                              <div>
                                You have removed <i class="fa fa-heart-o" style="font-size: 15px; padding: 0px 5px; color: #FF0000;"></i>
                                from this bible interpretation!
                              </div>
                            </div>';
        }
    }



