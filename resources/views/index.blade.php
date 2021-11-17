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
    </head>

    <body>

        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-8 col-sm-12 mb-5">
                    <div class="card">
                        <div class="card-header">
                            Countries</div>
                        <div class="card-body"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            New Country
                        </div>
                        <div class="card-body">
                            <form>
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
        </script>
    </body>

</html>
