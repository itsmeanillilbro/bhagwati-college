<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BHAGAWATI ENGLISH SECONDARY SCHOOL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{url('frontend/img/logo.png')}}" rel="icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/navbars/navbar-1/assets/css/navbar-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{url('frontend/lib/slick/slick.css')}}" rel="stylesheet">
    <link href="{{url('frontend/lib/slick/slick-theme.css')}}" rel="stylesheet">



    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{url('frontend/css/fancybox.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/newstyle.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/timeline.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/bootstrap-touch-slider.css')}}" rel="stylesheet">



</head>

<body>
    <!-- Top Bar Start -->
    <div class="header-top w-100 py-2 text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 d-flex justify-content-between">
                    <div class="cnt">
                        <a href="mailto:info@peoplescampus.edu.np"
                            style="padding-right: 10px;margin-right: 10px;border-right: 2px solid #fff;"><i
                                class="fa fa-envelope" aria-hidden="true"></i> bhagawati.hses@gmail.com</a>
                        <a href="tel:+977-1-5351990"><i class="fa fa-phone" aria-hidden="true"></i>
                            9854020179</a>
                    </div>
                    <div class="medias">
                        <a href="https://www.facebook.com/educationpeoples/"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://np.linkedin.com/company/racpeoples"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar Start -->

    <!-- Nav Bar Start -->
    <nav class="navbar navbar-expand-md bg-light bsb-navbar bsb-navbar-hover bsb-navbar-caret ">
        <div class="container">
            <a class="navbar-brand " href="{{route('index')}}">
                <img src="{{url("frontend/img/logo.png")}}" style="height:70px" width="80px" ;>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route("index")}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{route("about")}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#!">Programs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{route("news")}}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{route("academics")}}">Academics</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{route("gallery")}}">Gallery</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Admission</a>
                            <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                                <li><a class="dropdown-item" href="#!">+2</a></li>
                                <li><a class="dropdown-item" href="#!">CMAT</a></li>
                                <li><a class="dropdown-item" href="#!">BBA/BBM/BBS</a></li>
                                <li><a class="dropdown-item" href="#!">Masters</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("notice")}}">Notice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("contact")}}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <!-- Nav Bar End -->
