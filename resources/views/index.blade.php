<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Yajra Datatables</title>
        <link rel="stylesheet" href="{{ asset('assets/bootstrap-4.6.1-dist/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/datatables/css/jquery.dataTables.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />
    </head>
    <body>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-8 col-sm-12 mb-5">
                    <div class="card">
                        <div class="card-header">Countries</div>
                        <div class="card-body">
                            <table id="main-table" class="table table-striped table-hover mt-3 mb-3">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Index</th>
                                    <th scope="col">Country name</th>
                                    <th scope="col">Capital city</th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            New Country
                        </div>
                        <div class="card-body">
                            <form id="main" action="{{ route('store') }}" method="POST">
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
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.edit-country')
        <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap-4.6.1-dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap-4.6.1-dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
        <script>
            toastr.options.preventDuplicates = true;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const mainForm = $('#main'),
                  updateModal = $('#update-modal'),
                  updateForm = $('#update-form');
            mainForm.on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: mainForm.attr('action'),
                    method: mainForm.attr('method'),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    data: new FormData(mainForm[0]),
                    beforeSend: function () {
                        mainForm.find('.text-danger').text('');
                    },
                    success: function (response) {
                        if (response.status == 1) {
                            mainForm[0].reset();
                            $('#main-table').DataTable().ajax.reload(null, false);
                            toastr.success(response.message);
                        } else {
                            $.each(response.errors, function (prefix, value) {
                                mainForm.find('small.' + prefix + '_error').text(value[0]);
                            });
                        }
                    },
                    error: function () {
                        console.log('error')
                    },
                    completed: function () {
                        console.log('completed')
                    }
                });
            });

            $('#main-table').DataTable({
                processing: true,
                info: true,
                ajax: '{{ url("getCountries") }}',
                pageLength: 5,
                aLengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'All']],
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'country_name', name: 'country_name' },
                    { data: 'capital_city', name: 'capital_city' },
                    { data: 'action_update', name: 'action_update' },
                    { data: 'action_delete', name: 'action_delete' },
                ]
            });

            $(document).on('click', '.update-button', function (e) {
                e.preventDefault();
                const country_id = $(this).data('id');

                updateModal.find('form')[0].reset();
                updateModal.find('small.text-danger').text('');

                $.post('<?= route("getCountryDetails") ?>', {country_id: country_id}, function (result) {
                    if (result.status == 1) {
                        updateModal.find('input[name="cid"]').val(result.details.id);
                        updateModal.find('input[name="country_name"]').val(result.details.country_name);
                        updateModal.find('input[name="capital_city"]').val(result.details.capital_city);

                        // updateModal.modal('show');
                    } else {
                        toastr.error(result.message);
                    }
                }, 'json');
            });

            updateForm.on('submit', function (e) {
                e.preventDefault();


                $.ajax({
                    url: updateForm.attr('action'),
                    method: updateForm.attr('method'),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    data: new FormData(updateForm[0]),
                    beforeSend: function () {
                        updateForm.find('small.text-danger').text('');
                    },
                    success: function (response) {
                        if (response.status == 1) {
                            updateForm[0].reset();
                            updateModal.modal('hide');
                            $('#main-table').DataTable().ajax.reload(null, false);
                            toastr.success(response.message);
                        } else {
                            $.each(response.errors, function (prefix, value) {
                                updateForm.find('small.' + prefix + '_error').text(value[0]);
                            });
                        }
                    }
                });
            });

            $(document).on('click', '.delete-button', function (e) {
                e.preventDefault();
                const country_id = $(this).data('id');
                $.ajax({
                    url: '{{ route("delete") }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        country_id: country_id
                    },
                    success: function (response) {
                        if (response.status == 1) {
                            $('#main-table').DataTable().ajax.reload(null, false);
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                });
            })
        </script>
    </body>

</html>
