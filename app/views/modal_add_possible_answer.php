<div class="modal fade" id="addPossibleAnswersModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Possible Answer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body d-flex justify-content-center">
                    <div class="loader-wrapper" id="loader-add-possible-answers">
                        <img class="loader-rhombus" src="/media/rhombus.gif">
                    </div>
                    <div class="possible-answers-add-form">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Save" class="btn new-wrapper submit-form">
            </div>
        </div>
    </div>
</div>

<template id="add-possible-answer-id">

    <form action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
        <input type="hidden" name="add_possible_answer_id">

        <label for="type"> Related Question:</label>
        <br/>
        <select class="form-select mb-3" name="rel_pa" aria-label="Default select example">
        </select>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Answer Text</span>
            <input type="text" name="pa_text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Min and Max Points</span>
            <input type="number" name="min_points" aria-label="min" class="form-control" min="0">
            <input type="number" name="max_points" aria-label="max" class="form-control" min="0">
        </div>
        <label for="type">Next Question:</label>
        <br/>
        <select class="form-select mb-3" name="pa_goto" aria-label="Default select example">
        </select>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Ordering</span>
            <input type="number" class="form-control" name="pa_ordering" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" min="0">
        </div>
    </form>
</template>