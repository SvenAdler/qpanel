<div class="modal fade" id="editTopicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Topic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <div class="loader-wrapper" id="loader-edit-topic">
                    <img class="loader-rhombus" src="/media/rhombus.gif">
                </div>
                <div class="topic-edit-form"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Save" class="btn new-wrapper submit-form">
            </div>
        </div>
    </div>
</div>

<template id="topic-id-edit">
    <form action="/saveTopic.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
        <input type="hidden" name="ed_topic_id">
        <label for="ordering">Related Set:</label>
        <br/>
        <select name="ed_topic_relset"></select>
        <br/>
        <label for="ordering">Ordering number:</label>
        <br/>
        <input type="number" name="ed_topic_ordering">
        <br/>
        <label for="title">Title:</label>
        <br/>
        <input type="text" name="ed_topic_title">
    </form>
    <br/>
</template>