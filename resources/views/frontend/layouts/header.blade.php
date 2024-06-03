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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{url('frontend/lib/slick/slick.css')}}" rel="stylesheet">
    <link href="{{url('frontend/lib/slick/slick-theme.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{url('frontend/css/fancybox.css')}}" rel="stylesheet">

    <link href="{{url('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/newstyle.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/timeline.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/bootstrap-touch-slider.css')}}" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

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



    <nav>
    <div class="navbar">
        <i class='bx bx-menu menu-toggle'></i>
        <div class="logo"> <a href="{{route('index')}}">
                <img src="{{url("frontend/img/translogo1.png")}}" height="70px" width="80px" style="background-color:	#F5F5F5;">
            </a></div>
        <div class="nav-links">
            <div class="sidebar-logo">
                <a href="{{route('index')}}">
                    <img src="{{url("frontend/img/logo.png")}}" height="70px" width="80px">
                </a>
                <i class='bx bx-x'></i>
            </div>
            <ul class="links main-menu">
                <li> <a href="{{route("index")}}">Home</a></li>

                <!-- Add your dynamic menu items here -->
                @foreach($menu as $men)
                    @if($men->status === 'published')
                        <li>
                            @if(isset($men->submenus) && count($men->submenus) > 0)
                                <a href="#">{{ $men->title }}</a>
                                <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
                            @else
                                <a href="{{ route('menu.body', $men->id) }}">{{ $men->title }}</a>
                            @endif
                            @if(isset($men->submenus) && count($men->submenus) > 0)
                                <ul class="htmlCss-sub-menu sub-menu">
                                    @foreach($men->submenus as $submen)
                                        <li class="{{ isset($submen->subsubmenus) && count($submen->subsubmenus) > 0 ? 'more' : '' }}">
                                            @if(!isset($submen->subsubmenus) || count($submen->subsubmenus) == 0)
                                                <a href="{{ route('submenu.body', $submen->id) }}">{{ $submen->title1 }}</a>
                                            @else
                                                <a href="#">{{ $submen->title1 }}</a>
                                                @if(isset($submen->subsubmenus) && count($submen->subsubmenus) > 0)
                                                    <i class='bx bxs-chevron-right arrow more-arrow'></i>
                                                @endif
                                            @endif
                                            @if(isset($submen->subsubmenus) && count($submen->subsubmenus) > 0)
                                                <ul class="more-sub-menu sub-menu">
                                                    @foreach($submen->subsubmenus as $subsubmen)
                                                        <li>
                                                            <a href="{{ route('subsubmenu.body', $subsubmen->id) }}">{{ $subsubmen->subsubmenutitle }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
                <!-- End dynamic menu items -->
                <li> <a href="{{route("about")}}">About</a></li>
                <li> <a href="{{route("auth")}}">SSR</a></li>
                <li> <a href="{{route("news")}}">News</a></li>
                <li> <a href="{{route("academics")}}">Academics</a></li>
                <li> <a href="{{route("gallery")}}">Gallery</a></li>
                <li> <a href="{{route("notice")}}">Notice</a></li>
                <li> <a href="{{route("contact")}}">Contact</a></li>
            </ul>
        </div>

    </div>
</nav>







    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Menu Toggle Button
    const menuToggle = document.querySelector('.menu-toggle');
    const mainMenu = document.querySelector('.main-menu');

    menuToggle.addEventListener('click', function() {
        mainMenu.classList.toggle('show-menu');
    });

    // Submenu Toggle Buttons
    const submenuToggles = document.querySelectorAll('.htmlcss-arrow, .more-arrow');

    submenuToggles.forEach(function(submenuToggle) {
        submenuToggle.addEventListener('click', function(event) {
            // Prevent the default link behavior
            event.preventDefault();
            // Toggle the submenu display
            const submenu = this.nextElementSibling;
            submenu.classList.toggle('show-submenu');
        });
    });
});


// search-box open close js code
let navbar = document.querySelector(".navbar");

// sidebar open close js code
let navLinks = document.querySelector(".nav-links");
let menuOpenBtn = document.querySelector(".navbar .bx-menu");
let menuCloseBtn = document.querySelector(".nav-links .bx-x");
menuOpenBtn.onclick = function() {
navLinks.style.left = "0";
}
menuCloseBtn.onclick = function() {
navLinks.style.left = "-100%";
}


// sidebar submenu open close js code
let htmlcssArrow = document.querySelector(".htmlcss-arrow");
htmlcssArrow.onclick = function() {
 navLinks.classList.toggle("show1");
}
let moreArrow = document.querySelector(".more-arrow");
moreArrow.onclick = function() {
 navLinks.classList.toggle("show2");
}

    </script>


<style>

@media (max-width: 768px) {
    .htmlCss-sub-menu {
        display: none; /* Hide submenu by default on mobile */
    }
    .show-menu {
        display: block !important; /* Show menu on mobile when toggled */
    }
    .show-submenu {
        display: block !important; /* Show submenu on mobile when toggled */
    }
}


        /* Googlefont Poppins CDN Link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
        }

        nav {

            width: 100%;
            height: 100%;
            height: 70px;
            background: #3E8DA8;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            z-index: 99;
        }

        nav .navbar {
            height: 100%;
            max-width: 1250px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: auto;
            /* background: red; */
            padding: 0 50px;
        }

        .navbar .logo a {
            font-size: 30px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        nav .navbar .nav-links {
            line-height: 70px;
            height: 100%;
        }

        nav .navbar .links {
            display: flex;
        }

        nav .navbar .links li {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            list-style: none;
            padding: 0 14px;
        }

        nav .navbar .links li a {
            height: 100%;
            text-decoration: none;
            white-space: nowrap;
            color: #fff;
            font-size: 15px;
            font-weight: 500;
        }

        .links li:hover .htmlcss-arrow,
        .links li:hover .js-arrow {
            transform: rotate(180deg);
        }

        nav .navbar .links li .arrow {
            /* background: red; */
            height: 100%;
            width: 22px;
            line-height: 70px;
            text-align: center;
            display: inline-block;
            color: #fff;
            transition: all 0.3s ease;
        }

        nav .navbar .links li .sub-menu {
            position: absolute;
            top: 70px;
            left: 0;
            line-height: 40px;
            background: #3E8DA8;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            border-radius: 0 0 4px 4px;
            display: none;
            z-index: 2;
            margin: 0 !important;
            padding: 0 !important;
        }

        nav .navbar .links li:hover .htmlCss-sub-menu,
        nav .navbar .links li:hover .js-sub-menu {
            display: block;
        }

        .navbar .links li .sub-menu li {

            width: auto;
            padding: 0 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar .links li .sub-menu a {
            color: #fff;
            font-size: 15px;
            font-weight: 500;
        }

        .navbar .links li .sub-menu .more-arrow {
            line-height: 40px;
        }

        .navbar .links li .htmlCss-more-sub-menu {
            /* line-height: 40px; */
        }

        .navbar .links li .sub-menu .more-sub-menu {
            position: absolute;
            top: 0;
            left: 100%;
            border-radius: 0 4px 4px 4px;
            z-index: 1;
            display: none;
        }

        .links li .sub-menu .more:hover .more-sub-menu {
            display: block;
        }

        .navbar .search-box {
            position: relative;
            height: 40px;
            width: 40px;
        }

        .navbar .search-box i {
            position: absolute;
            height: 100%;
            width: 100%;
            line-height: 40px;
            text-align: center;
            font-size: 22px;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .navbar .search-box .input-box {
            position: absolute;
            right: calc(100% - 40px);
            top: 80px;
            height: 60px;
            width: 300px;
            background: #3E8DA8;
            border-radius: 6px;
            opacity: 0;
            pointer-events: none;
            transition: all 0.4s ease;
        }

        .navbar.showInput .search-box .input-box {
            top: 65px;
            opacity: 1;
            pointer-events: auto;
            background: #3E8DA8;
        }

        .search-box .input-box::before {
            content: '';
            position: absolute;
            height: 20px;
            width: 20px;
            background: #3E8DA8;
            right: 10px;
            top: -6px;
            transform: rotate(45deg);
        }

        .search-box .input-box input {
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 4px;
            transform: translate(-50%, -50%);
            height: 35px;
            width: 280px;
            outline: none;
            padding: 0 15px;
            font-size: 16px;
            border: none;
        }

        .navbar .nav-links .sidebar-logo {
            display: none;
        }

        .navbar .bx-menu {
            display: none;
        }

        @media (max-width:920px) {
            nav .navbar {
                max-width: 100%;
                padding: 0 25px;
            }

            nav .navbar .logo a {
                font-size: 27px;
            }

            nav .navbar .links li {
                padding: 0 10px;
                white-space: nowrap;
            }

            nav .navbar .links li a {
                font-size: 15px;
            }
        }

        @media (max-width:800px) {
            nav {
                /* position: relative; */
            }

            .navbar .bx-menu {
                display: block;
            }

            nav .navbar .nav-links {
                position: fixed;
                top: 0;
                left: -100%;
                display: block;
                max-width: 270px;
                width: 100%;
                background: #3E8DA8;
                line-height: 40px;
                padding: 20px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                transition: all 0.5s ease;
                z-index: 1000;
            }

            .navbar .nav-links .sidebar-logo {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .sidebar-logo .logo-name {
                font-size: 25px;
                color: #fff;
            }

            .sidebar-logo i,
            .navbar .bx-menu {
                font-size: 25px;
                color: #fff;
            }

            nav .navbar .links {
                margin: 0 !important;
                padding: 0 !important;
                display: block;
                margin-top: 20px;
            }

            nav .navbar .links li .arrow {
                line-height: 40px;
            }

            nav .navbar .links li {
                display: block;
            }

            nav .navbar .links li .sub-menu {
                position: relative;
                top: 0;
                box-shadow: none;
                display: none;
            }

            nav .navbar .links li .sub-menu li {
                border-bottom: none;

            }

            .navbar .links li .sub-menu .more-sub-menu {
                display: none;
                position: relative;
                left: 0;
            }

            .navbar .links li .sub-menu .more-sub-menu li {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .links li:hover .htmlcss-arrow,
            .links li:hover .js-arrow {
                transform: rotate(0deg);
            }

            .navbar .links li .sub-menu .more-sub-menu {
                display: none;
            }

            .navbar .links li .sub-menu .more span {
                /* background: red; */
                display: flex;
                align-items: center;
                /* justify-content: space-between; */
            }

            .links li .sub-menu .more:hover .more-sub-menu {
                display: none;
            }

            nav .navbar .links li:hover .htmlCss-sub-menu,
            nav .navbar .links li:hover .js-sub-menu {
                display: none;
            }

            .navbar .nav-links.show1 .links .htmlCss-sub-menu,
            .navbar .nav-links.show3 .links .js-sub-menu,
            .navbar .nav-links.show2 .links .more .more-sub-menu {
                display: block;
            }

            .navbar .nav-links.show1 .links .htmlcss-arrow,
            .navbar .nav-links.show3 .links .js-arrow {
                transform: rotate(180deg);
            }

            .navbar .nav-links.show2 .links .more-arrow {
                transform: rotate(90deg);
            }
        }

        @media (max-width:370px) {
            nav .navbar .nav-links {
                max-width: 100%;
            }
        }
    </style>
