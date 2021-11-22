<div class="modal fade" id="update-modal" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="update-form" action="<?= route('update') ?>" method="POST">
            @csrf
            <input type="hidden" name="cid" />
            <div class="form-group">
                <label for="country_name">Country name</label>
                <input type="text" class="form-control" name="country_name" id="country_name" />
                <small class="form-text text-danger country_name_error"></small>
            </div>
            <div class="form-group">
                <label for="capital_city">Capital city</label>
                <input type="text" class="form-control" name="capital_city" id="capital_city" />
                <small class="form-text text-danger capital_city_error"></small>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="update-form">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </div>
</div>
</div>
