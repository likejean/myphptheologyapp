<div class="modal fade" id="delete-topic-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body container-fluid">
                    <form id="deleteForm" action="./includes/deletetopic.inc.php?theologyId=10" method="post">
                        <div class="mb-3">
                            <p class="row d-flex justify-content-center">Are you sure you want to delete this item?</p>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" id="delete-topic-submit" name="delete-topic-submit" value="delete-topic-submit" class="btn btn-primary row">Delete</button>
                        </div>
                    </form>
                    <div class="modal-footer"
                        <button onClick="document.removeEventListener('click', clickOutside, false);" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
