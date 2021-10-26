<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <div class="page-wrapper chiller-theme toggled">
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <div class="sidebar-brand">
                        <a href="#" class="text-center">Dashboard</a>
                        <div id="close-sidebar">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="sidebar-header">
                        <div class="user-pic">
                            <img class="img-responsive img-rounded"
                                src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                                alt="User picture">
                        </div>
                        <div class="user-info">
                            <span class="user-name">
                                <strong>{{auth()->user()->name}}</strong>
                            </span>
                            <span class="user-role">{{auth()->user()->role}}</span>
                            <span class="user-status">
                                <i class="fa fa-circle"></i>
                                <span>Online</span>
                            </span>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        @auth
                        @if (auth()->user()->role === "Etudiant")
                        <ul>
                            <li class="header-menu">
                                <span>Student</span>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="{{route('etudiant.index')}}">
                                    <i class="fa fa-tachometer-alt"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="{{route('projet.index')}}">
                                    <i class="far fa-file"></i>
                                    <span>Formulaire</span>
                                </a>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="{{route('etudiant.create')}}">
                                    <i class="fas fa-file-medical-alt"></i>
                                    <span>Suivi</span>
                                </a>
                            </li>
                        </ul>
                        @elseif(auth()->user()->role === "Admin")
                        <ul>
                            <li class="header-menu">
                                <span>Admin</span>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Gestion User</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{route('admin.show',$id="all")}}">All</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.show',$id="formateur")}}">Formateurs</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.show',$id="etudiant")}}">Etudiants</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.show',$id="juries")}}">Juries</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="far fa-gem"></i>
                                    <span>Gestion Soutenances</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{route('admin.index')}}">Pas encore valideé</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.show',$id="validee")}}">Deja Validé</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.show',$id="resultat")}}">Resultat</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('admin.show',$id="classe")}}">
                                    <i class="fa fa-chart-line"></i>
                                    <span>Gestion Class</span>
                                </a>
                            </li>
                        </ul>
                        @else
                        <ul>
                            <li class="header-menu">
                                <span>Formateur</span>
                            </li>
                            <li>
                                <a href="{{route('formateur.index')}}">
                                    <i class="fa fa-tachometer-alt"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('projet.create')}}">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>Projet non valide</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('AccepteProjet')}}">
                                    <i class="far fa-check-circle"></i>
                                    <span>Soutenances Validée</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('RefusedProjet')}}">
                                    <i class="fas fa-times-circle"></i>
                                    <span>Soutenances refusées</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('reunion.index')}}">
                                    <i class="far fa-handshake"></i>
                                    <span>Reunion</span>
                                </a>
                            </li>
                        </ul>
                        @endif

                        @endauth
                    </div>
                </div>
                <!-- sidebar-content  -->
                <div class="sidebar-footer">
                    <a href="#">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-pill badge-warning notification">3</span>
                    </a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </nav>
            <main class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script>
        jQuery(function ($) {
            $(".sidebar-dropdown > a").click(function () {
                $(".sidebar-submenu").slideUp(200);
                if ($(this).parent().hasClass("active")) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this).parent().removeClass("active");
                } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this).next(".sidebar-submenu").slideDown(200);
                    $(this).parent().addClass("active");
                }
            });

            $("#close-sidebar").click(function () {
                $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function () {
                $(".page-wrapper").addClass("toggled");
            });
            $(window).on('resize', function () {
                var win = $(this); //this = window
                if (win.width() <= 780) {
                    $(".page-wrapper").removeClass("toggled");
                } else {
                    $(".page-wrapper").addClass("toggled");
                }
            });

        });

        var currentTab = 0;
        document.addEventListener("DOMContentLoaded", function (event) {

            showTab(currentTab);

        });

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
                submit_button()
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            fixStepIndicator(n)
        }

        function submit_button() {

            var btn = document.getElementById("nextBtn");
            btn.setAttribute('type', 'submit');

        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {
                document.getElementById("nextprevious").style.display = "none";
                document.getElementById("all-steps").style.display = "none";
                document.getElementById("register").style.display = "none";
                document.getElementById("text-message").style.display = "block";
            }
            showTab(currentTab);
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }
            }
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }

    </script>
</body>

</html>
