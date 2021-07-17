<div class="modal fade" id="create-interpretation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Bible Interpretation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="row justify-content-center"><span class="badge badge-pill badge-secondary">for Bible Topic</span></h4>
                <form action="includes/createinterpretation.inc.php" method="post">
                    <div class="mb-3">
                        <label for="bible-interpretation" class="form-label">Bible Interpretation Text</label>
                        <textarea type="text" id="bible-interpretation" name="bible-interpretation" class="form-control" placeholder="Add your bible interpetation here..."></textarea>
                    </div>
                    <button type="submit" name="create-new-bible-interpretation-submit" value="create-new-bible-interpretation-submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>