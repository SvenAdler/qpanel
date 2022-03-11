<html>
<body>

<?php require('app/views/qp_head_panel.php'); ?>

<div class="d-flex" id="wrapper">

    <?php require('app/views/sidebar.php'); ?>

    <div class="container-tables container-fluid">
        <div class="container-fluid">
            <!--            <div class="card-group">-->
            <div class="row">
                <div class="col">
                    <!--TOPIC TABLE-->
                    <div class="container mt-4 table-card-container">
                        <div class="card panel-card">
                            <h5 class="card-header">
                                TOPICS
                            </h5>
                            <div class="card-body panel-card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped topic-table">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Related set</th>
                                            <th>Ordering number</th>
                                            <th>Title</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($topicController->getTopicsBySetID($set_id) ?: [] as $topic) :
                                            ?>
                                            <tr data-href="?topic_id=<?= urlencode($topic->id) ?>" class="isLink">
                                                <td> <?= $topic->id ?> </td>
                                                <td> <?= $set->title ?> </td>
                                                <td> <?= $topic->ordering ?> </td>
                                                <td> <?= htmlentities($topic->title) ?> </td>
                                                <td>
                                                    <div class="topic-wrapper-actions d-flex justify-content-evenly">
                                                        <!-- edit topic data -->
                                                        <div type="button" class="topic-edit-wrapper p-3"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#editTopicModal"
                                                             data-topic_id="<?= urlencode($topic->id) ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16"
                                                                 fill="#000000"
                                                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                <path fill-rule="evenodd"
                                                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                            </svg>
                                                        </div>
                                                        <!-- Trashcan and remove url-->
                                                        <div class="trashcan-wrapper p-3">
                                                            <a href="?removeTopic=<?= urlencode($topic->id) ?>"
                                                               data-title="<?= htmlentities($topic->title) ?>"
                                                               class="confirmRemove">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16"
                                                                     fill="#000000"
                                                                     class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                    <path fill-rule="evenodd"
                                                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <button type="button" class="new-wrapper d-flex btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#addTopicModal">
                                    <div class="new-set">
                                        NEW Topic
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require('app/views/modal_add_topic.php'); ?>
                <?php require('app/views/modal_edit_topic.php'); ?>

                <!--QUESTIONS TABLE-->
                <div class="col">
                    <div class="container mt-4 table-card-container">
                        <div class="card panel-card">
                            <h5 class="card-header">
                                QUESTIONS
                            </h5>
                            <div class="card-body panel-card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped questions-table">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Related topic</th>
                                            <th>Ordering number</th>
                                            <th>Question Type</th>
                                            <th>goto default</th>
                                            <th>Text</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($questionController->getAllByIDs($set_id, $topic_id) ?: [] as $question) :
                                            ?>
                                            <tr data-href="?question_id=<?= urlencode($question->id) ?>"
                                                class="isLink">
                                                <td> <?= $question->id ?> </td>
                                                <td> <?= $question->topic_title ?> </td>
                                                <td> <?= $question->ordering ?> </td>
                                                <td> <?= $question->question_type ?> </td>
                                                <td> <?= $question->goto_default ?> </td>
                                                <td> <?= htmlentities($question->question_text) ?> </td>
                                                <td>
                                                    <div class="question-wrapper-actions d-flex justify-content-evenly">
                                                        <!-- edit question data -->
                                                        <div type="button" class="question-edit-wrapper p-3"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#editQuestionModal"
                                                             data-question_id="<?= urlencode($question->id) ?>"
                                                             data-set_id=" <?= urlencode($set->id) ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16"
                                                                 fill="#000000"
                                                                 class="bi bi-pencil-square"
                                                                 viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                <path fill-rule="evenodd"
                                                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                            </svg>
                                                        </div>
                                                        <!-- Trashcan and remove url-->
                                                        <div class="trashcan-wrapper p-3">
                                                            <a href="?removeQuestion=<?= urlencode($question->id) ?>"
                                                               class="confirmQuestionRemove">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     width="16"
                                                                     height="16"
                                                                     fill="#000000"
                                                                     class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                    <path fill-rule="evenodd"
                                                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <button type="button" class="new-wrapper d-flex btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#addQuestionModal">
                                    <div class="new-set">
                                        NEW Question
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php require('app/views/modal_add_question.php'); ?>
                <?php require('app/views/modal_edit_question.php'); ?>

                <!--POSSIBLE ANSWERS TABLE-->
                <div class="col">
                    <div class="container mt-4 table-card-container">
                        <div class="card panel-card">
                            <h5 class="card-header">
                                POSSIBLE ANSWERS
                            </h5>
                            <div class="card-body panel-card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped possible-answers-table">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>ID of related question</th>
                                            <th>Ordering number</th>
                                            <th>Text</th>
                                            <th>minimal points</th>
                                            <th>maximal points</th>
                                            <th>goto</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($possibleAnswersController->getPossibleAnswersByQuestionID($question_id) ?: [] as $possible_answer) :
                                            ?>
                                            <tr>
                                                <td> <?= $possible_answer->id ?> </td>
                                                <td> <?= $possible_answer->question_id ?> </td>
                                                <td> <?= $possible_answer->ordering ?> </td>
                                                <td> <?= $possible_answer->answer_text ?> </td>
                                                <td> <?= $possible_answer->min_points ?> </td>
                                                <td> <?= $possible_answer->max_points ?> </td>
                                                <td> <?= $possible_answer->goto ?> </td>
                                                <td>
                                                    <div class="question-wrapper-actions d-flex justify-content-evenly">
                                                        <!-- edit question data -->
                                                        <div type="button" class="question-edit-wrapper p-3"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#editQuestionModal"
                                                             data-question_id="<?= urlencode($question->id) ?>"
                                                             data-set_id=" <?= urlencode($set->id) ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16"
                                                                 fill="#000000"
                                                                 class="bi bi-pencil-square"
                                                                 viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                <path fill-rule="evenodd"
                                                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                            </svg>
                                                        </div>
                                                        <!-- Trashcan and remove url-->
                                                        <div class="trashcan-wrapper p-3">
                                                            <a href="?remove_pa=<?= urlencode($possible_answer->id) ?>"
                                                               class="confirmQuestionRemove">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     width="16"
                                                                     height="16"
                                                                     fill="#000000"
                                                                     class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                    <path fill-rule="evenodd"
                                                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <button type="button" class="new-wrapper d-flex btn new-pa"
                                        data-bs-toggle="modal"
                                        data-bs-target="#addPossibleAnswersModal"
                                        data-topic_id="<?= urlencode($topic_id) ?>">
                                    <div class="new-set">
                                        NEW Possible Answer
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php require('app/views/modal_add_possible_answer.php'); ?>
                <?php require('app/views/modal_edit_possible_answer.php'); ?>

            </div>
        </div>
    </div><!-- end wrapper div-->

    <script src="/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</body>
</html>