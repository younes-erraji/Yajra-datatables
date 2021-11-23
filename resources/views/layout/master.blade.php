<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Yajra Datatables</title>
        <link rel="icon" href="{{ asset('favicon.ico') }}" />
        <link rel="stylesheet" href="{{ asset('assets/bootstrap-4.6.1-dist/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/datatables/css/jquery.dataTables.min.css') }}" />
        @yield('styles')
    </head>

    <body>

        <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Yajra DataTables</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06"
                    aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample06">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('buttons') }}">Buttons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown"
                                aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown06">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-md-0">
                        <input class="form-control" type="text" placeholder="Search">
                    </form>
                </div>
            </div>
        </nav>
        @yield('content')
        <footer class="page-footer font-small pt-4 bg-dark text-white">
            <div class="container text-center text-md-left">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <h5 class="text-uppercase">Footer Content</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nemo incidunt, sit corrupti deserunt neque in debitis impedit consectetur? Itaque, voluptates facilis.</p>
                    </div>
                    <hr class="clearfix w-100 d-md-none pb-3">
                    <div class="col-md-3 mb-md-0 mb-3">
                        <h5 class="text-uppercase">Links</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a>Link 1</a>
                            </li>
                            <li>
                                <a>Link 2</a>
                            </li>
                            <li>
                                <a>Link 3</a>
                            </li>
                            <li>
                                <a>Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 mb-md-0 mb-3">
                        <h5 class="text-uppercase">Links</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a>Link 1</a>
                            </li>
                            <li>
                                <a>Link 2</a>
                            </li>
                            <li>
                                <a>Link 3</a>
                            </li>
                            <li>
                                <a>Link 4</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="#"> Younes ERRAJI</a>
            </div>
        </footer>
        <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap-4.6.1-dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap-4.6.1-dist/js/bootstrap.bundle.min.js') }}"></script>
        @yield('scripts')
    </body>

</html>
