<div class="container-fluid p-3 bg-dark text-light text-start">
    <div class="qp-wrapper d-flex justify-content-between">
        <div class="logo d-flex justify-content-evenly">
            <a class="qp-logo" href="/nullSession.php">
                <h2 class="qp">QP</h2>
            </a>
            <div class="curr-title">
                <h5>- <?= htmlentities($set->title) ?></h5>
            </div>
        </div>
        <div class="generate-form d-flex justify-content-between">
            <form action="/output.php?set_id=<?= urlencode($set->id) ?>" method="post" target="_blank" rel="noopener noreferrer">
                <input class="gen-test-wrapper btn justify-content-center" type="submit"
                       value="generate - <?= htmlentities($set->title) ?> - JSON">
            </form>
            <form action="/downloadJSON.php?set_id=<?= urlencode($set->id) ?>" method="post" target="_blank" rel="noopener noreferrer">
                <input class="gen-test-wrapper btn justify-content-center" type="submit"
                       value="download JSON">
            </form>
            <form action="/test_quiz/test.html" method="post" target="_blank" rel="noopener noreferrer">
                <input class="gen-test-wrapper btn justify-content-center" type="submit"
                       value="test - <?= htmlentities($set->title) ?>">
            </form>
        </div>
    </div>
</div>