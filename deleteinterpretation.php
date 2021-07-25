<div class="modal fade" id="delete-interpretation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body container-fluid">
                <form class="delete-topic" action="includes/deleteinterpretation.inc.php" method="post">
                    <div class="mb-3">
                        <p class="row d-flex justify-content-center">Are you sure you want to delete this bible interpretation?</p>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" id="delete-interpretation-submit" name="delete-interpretation-submit" value="delete-interpretation-submit" class="btn btn-primary row">Delete</button>
                    </div>
                </form>
                <div class="modal-footer">
                    <button id="delete-interpretation-modal-close-button" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>