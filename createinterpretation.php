<div class="modal fade" id="create-interpretation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Add Bible Interpretation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="row py-1 d-flex align-items-center justify-content-center"><span>Topic:&nbsp;</span><span id="topic-title" class="badge badge-pill badge-secondary"></span></h5>
                <form class="create-interpretation" action="includes/createinterpretation.inc.php" method="post">
                    <div class="mb-3">
                        <label for="bible-interpretation-header" class="form-label">Header</label>
                        <input type="text" id="bible-interpretation-header" name="bible-interpretation-header"
                               class="form-control" placeholder="Add your bible interpretation header here..."/>
                    </div>
                    <div class="mb-3">
                        <label for="bible-interpretation-text" class="form-label">Interpretation</label>
                        <textarea type="text" id="bible-interpretation-text" name="bible-interpretation-text" class="form-control" placeholder="Add your bible interpretation text here..."></textarea>
                    </div>
                    <button type="submit" name="create-new-bible-interpretation-submit" value="create-new-bible-interpretation-submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button id="create-interpretation-modal-close-button" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>