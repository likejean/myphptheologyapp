<script>

    //////////////////////CREATE BIBLE INTERPRETATION////////////////////////////////////
    $('span.create-interpretation-button').click(function(e) {
        let theologyTopicId = $(e.target).data('topic-id');
        let theologyTopicTitle = $(e.target).data('topic-title');
        let input = $("<input>").attr("class", "bible-interpretation-id").attr("type", "hidden").attr("name", "theology-topic-id").val(theologyTopicId);
        $('.create-interpretation').append(input);
        $('#topic-title').text(theologyTopicTitle.replace(/_/g, ' '));
    });

    $('#create-interpretation-modal-close-button').click(function() {
        $("input.bible-interpretation-id").remove();
    });

    ////////////////////DELETE THEOLOGY TOPIC/////////////////////////////////////

    $('span.delete-topic-button').click(function(e) {
        let bibleTopicId = $(e.target).data('topic-id');
        let input = $("<input>").attr("class", "theology-topic-id").attr("type", "hidden").attr("name", "theology-topic-id").val(bibleTopicId);
        $('.delete-topic').append(input);
    });

    $('#delete-topic-modal-close-button').click(function() {
        $("input.theology-topic-id").remove();
    });

    ////////////////////DELETE BIBLE INTERPRETATION/////////////////////////////////////

    $('span.delete-interpretation-button').click(function(e) {
        let bibleInterpretationId = $(e.target).data('interpretation-id');
        let input = $("<input>").attr("class", "bible-interpretation-id").attr("type", "hidden").attr("name", "bible-interpretation-id").val(bibleInterpretationId);
        $('.delete-topic').append(input);
    });

    $('#delete-interpretation-modal-close-button').click(function() {
        $("input.bible-interpretation-id").remove();
    });

    $('span.edit-topic-button').click(function(e) {
            let theologyTopicId = $(e.target).data('topic-id');
            let theologyTopicTitle = $(e.target).data('topic-title');
            let inputTopicId = $("<input>").attr("class", "edit-theology-topic-id").attr("type", "hidden").attr("name", "edit-theology-topic-id").val(theologyTopicId);
            $('div.edit-topic').append(inputTopicId);
            let inputTopicTitle = $("<input>").attr("type", "text").attr("class", "edit-theology-topic-title form-control").attr("name", "edit-theology-topic-title").val(theologyTopicTitle.replace(/_/g, ' '));
            $('div.edit-topic').append(inputTopicTitle);
        }
    )

    $('#edit-topic-modal-close-button').click(function() {
        $("input.edit-theology-topic-id").remove();
        $("input.edit-theology-topic-title").remove();
    });
</script>