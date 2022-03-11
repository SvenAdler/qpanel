<div class="modal fade" id="addQuestionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Related Topic</span>
                        <input type="number" class="form-control" name="question_rel_topic" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" min="0">
                    </div>

                    <label for="type">Question Type:</label>
                    <br/>
                    <select class="form-select mb-3" name="question_type" aria-label="Default select example">
                        <option value="" selected disabled hidden></option>
                        <option value="content">content</option>
                        <option value="singlechoice">singlechoice</option>
                        <option value="numeric">numeric</option>
                        <option value="multiplechoice">multiplechoice</option>
                        <option value="topic_eval">Evalutation for topic</option>
                        <option value="set_eval">Evalutation for set</option>
                    </select>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Question text</span>
                        <input type="text" name="question_text" class="form-control" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Following Question</span>
                        <input type="number" class="form-control" name="goto_default" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" min="0">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Ordering</span>
                        <input type="number" class="form-control" name="question_ordering" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default" min="0">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Save" class="btn edit-wrapper">
            </div>
            </form>
        </div>
    </div>
</div>