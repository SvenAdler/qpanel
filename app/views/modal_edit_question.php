<div class="modal fade" id="editQuestionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <div class="loader-wrapper" id="loader-edit-question">
                    <img class="loader-rhombus" src="/media/rhombus.gif">
                </div>
                <div class="question-edit-form"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Save" class="btn edit-wrapper submit-form">
            </div>
        </div>
    </div>
</div>

<template id="question-id-edit">
    <form action="/saveQuestion.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
        <input type="hidden" name="ed_question_id">
        <label for="ordering">Related Topic:</label>
        <br/>
        <select name="ed_question_reltopic"></select>
        <br/>
        <label for="ordering">Ordering number:</label>
        <br/>
        <input type="number" name="ed_question_ordering">
        <br/>
        <label for="title">Question Type:</label>
        <br/>
        <select name="ed_question_type">
            <?php
            foreach (app\controller\Quiz::QUESTION_TYPES as $QUESTION_TYPE) :
                ?>
                <option value='<?= strtolower($QUESTION_TYPE) ?>'><?= $QUESTION_TYPE ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <br/>
        <label for="title">Question Text:</label>
        <br/>
        <input type="text" name="ed_question_text">
        <br/>
        <label for="title">Following Question by default:</label>
        <br/>
        <input type="text" name="ed_goto_default">
    </form>
    <br/>
</template>