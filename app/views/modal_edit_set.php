<div class="modal fade" id="editSetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Set</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <div class="loader-wrapper" id="loader">
                    <img class="loader-rhombus" src="/media/rhombus.gif">
                </div>
                <div class="edit-form"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Save" class="btn new-wrapper submit-form">
            </div>
        </div>
    </div>
</div>

<template id="set-id-edit">
    <form action="/saveSet.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
        <input type="hidden" name="ed_id">

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
            <input type="text" class="form-control" name="ed_title" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Ordering number</span>
            <input type="number" class="form-control" name="ed_ordering" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default">
        </div>
    </form>
    <br/>
</template>
