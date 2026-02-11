    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>StayEase</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ url('/css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    </head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">StayEase</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

{{--             <div class="d-flex" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Find</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/">All Hotels</a></li>
                            <li><a class="dropdown-item" href="{{ route('chambres.index') }}">All Rooms</a></li>
                        </ul>
                    </li>
                </ul>
                <button class="btn btn-outline-dark" type="button">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button> --}}

                <div class="d-flex" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Find</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/">All Hotels</a></li>
                                <li><a class="dropdown-item" href="#!">All Rooms</a></li>
                                <li><a class="dropdown-item" href="chambres/test">test</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="d-flex mx-2">
                        @auth
                            <button class="btn btn-outline-dark" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Cart
                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </button>
                        @endauth
                        @auth
                            <a class="btn btn-outline-dark mx-2" href="/profile">
                                <i class="bi bi-person-circle me-1"></i>
                                Profile
                            </a>
                        @endauth


                        @auth
                            <form action="/logout" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-dark" type="submit">Logout</button>
                            </form>
                        @endauth
                        @guest
                            <div class="mx-2">
                                <a class="btn btn-dark" href="/register">Register</a>
                                <a class="btn btn-dark" href="/login">Login</a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>




        {{ $slot }}



        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; StayEase 2027</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>

    </html>
