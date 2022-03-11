<div class="modal fade" id="addTopicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Topic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                    <!--                   TODO related Set id-->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                        <input type="text" class="form-control" name="topic_title" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" min="0">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Related Set</span>
                        <input type="number" class="form-control" name="topic_rel_set" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" min="0">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Ordering number</span>
                        <input type="number" class="form-control" name="topic_ordering"
                               aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" min="0">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Save" class="btn new-wrapper">
            </div>
            </form>
        </div>
    </div>
</div>