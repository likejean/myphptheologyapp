<div class="modal fade" id="create-topic-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Theology Topic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/createtopic.inc.php" method="post">
                    <div class="mb-3">
                        <label for="theology-topic" class="form-label">Theology Topic</label>
                        <input type="text" id="theology-topic" name="theology-topic" class="form-control" placeholder="Create your topic here...">
                    </div>
                    <button type="submit" name="create-new-topic-submit" value="create-new-topic-submit" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>