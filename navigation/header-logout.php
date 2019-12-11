<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="../products-list/products-list.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link rel="stylesheet" href="../navigation/header.css">
    <title> <?php
            echo  $sPageName;
            ?> Preloved
    </title>
</head>

<body>
    <header>
        <nav class="header-nav">
            <div class="desktop-logo"><a href="../main/index.php"> <img src="../graphics/preloved_logo.svg" alt=""></a></div>
            <i class="fas fa-search"></i>
            <div class="logo"><a href="../main/index.php">
                    <h3 class="logo-title">PRE<span class="logo-title-color">LOVED</span></h3>
                </a>
            </div>
            <div id="menuToggle">
                <input name="checked-menu" type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul class="nav-links">

                <li><a href="../main/index.php">Home</a></li>
                <li class="dropdown"><a id="women">Women<i class="fas fa-arrow-right"></i></a>
                    <ul aria-label="submenu" class="dropdown-content nav-links">
                        <li><a href="../products-list/products-list.php?gender=1&category=1&size=&brand=">Coats</a></li>
                        <li><a href="../products-list/products-list.php?gender=1&category=2&size=&brand=">Jackets</a>
                        </li>
                        <li><a href="?gender=1&category=4&size=&brand=">Dresses</a></li>
                        <li><a href="../products-list/products-list.php?gender=1&category=6&size=&brand=">Shirts
                                | Tops</a></li>
                        <li><a href="../products-list/products-list.php?gender=1&category=8&size=&brand=">Trousers</a>
                        </li>
                        <li><a href="../products-list/products-list.php?gender=1&category=9&size=&brand=">Jeans</a>
                        </li>
                        <li><a href="../products-list/products-list.php?gender=1&category=10&size=&brand=">T-Shirts</a>
                        </li>
                        <li><a href="../products-list/products-list.php?gender=1&category=11&size=&brand=">Skirts
                                | Shorts</a></li>
                        <li><a href="../products-list/products-list.php?gender=1&category=14&size=&brand=">Shoes</a>
                        </li>
                        <li><a href="../products-list/products-list.php?gender=1&category=15&size=&brand=">Bags</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a id="men">Men<i class="fas fa-arrow-right"></i></a>
                    <ul aria-label="submenu" class="dropdown-content nav-links">
                        <li><a href="../products-list/products-list.php?gender=0&category=1&size=&brand=">Coats</a></li>
                        <li><a href="../products-list/products-list.php?gender=0&category=2&size=&brand=">Jackets</a></li>
                        <li><a href="../products-list/products-list.php?gender=0&category=3&size=&brand=">Blazers</a></li>
                        <li><a href="../products-list/products-list.php?gender=0&category=6&size=&brand=">Shirts</a></li>
                        <li><a href="../products-list/products-list.php?gender=0&category=7&size=&brand=">Knitwear</a></li>
                        <li><a href="../products-list/products-list.php?gender=0&category=8&size=&brand=">Trousers</a></li>
                        <li><a href="../products-list/products-list.php?gender=0&category=11&size=&brand=">Shorts</a></li>
                        <li><a href="../products-list/products-list.php?gender=0&category=9&size=&brand=">Jeans</a></li>
                        <li><a href="../products-list/products-list.php?gender=0&category=13&size=&brand=">Tracksuits</a></li>
                    </ul>
                </li>
                <li><a href="../about/about.php">About</a></li>
                <li><a href="#footer">Contact</a></li>
                <div class="nav-links-signup-login link">
                    <li><a href="../profile/profile.php">Profile</a></li>
                    <li><a href="../includes/logout.inc.php">Logout</a></li>
                </div>
            </ul>

            <ul id="drowpdown-women" class="nav-links subnav-women">
                <li><a href="../products-list/products-list.php?gender=1&category=1&size=&brand=">Coats</a>
                </li>
                <li><a href="../products-list/products-list.php?gender=1&category=2&size=&brand=">Jackets</a>
                </li>
                <li><a href="?gender=1&category=4&size=&brand=">Dresses</a></li>
                <li><a href="../products-list/products-list.php?gender=1&category=6&size=&brand=">Shirts
                        | Tops</a></li>
                <li><a href="../products-list/products-list.php?gender=1&category=8&size=&brand=">Trousers</a>
                </li>
                <li><a href="../products-list/products-list.php?gender=1&category=9&size=&brand=">Jeans</a>
                </li>
                <li><a href="../products-list/products-list.php?gender=1&category=10&size=&brand=">T-Shirts</a>
                </li>
                <li><a href="../products-list/products-list.php?gender=1&category=11&size=&brand=">Skirts
                        | Shorts</a></li>
                <li><a href="../products-list/products-list.php?gender=1&category=14&size=&brand=">Shoes</a>
                </li>
                <li><a href="../products-list/products-list.php?gender=1&category=15&size=&brand=">Bags</a>
                </li>
            </ul>

            <ul id="drowpdown-men" class="nav-links subnav-men">
                <li><a href="../products-list/products-list.php?gender=0&category=1&size=&brand=">Coats</a></li>
                <li><a href="../products-list/products-list.php?gender=0&category=2&size=&brand=">Jackets</a></li>
                <li><a href="../products-list/products-list.php?gender=0&category=3&size=&brand=">Blazers</a></li>
                <li><a href="../products-list/products-list.php?gender=0&category=6&size=&brand=">Shirts</a></li>
                <li><a href="../products-list/products-list.php?gender=0&category=7&size=&brand=">Knitwear</a></li>
                <li><a href="../products-list/products-list.php?gender=0&category=8&size=&brand=">Trousers</a></li>
                <li><a href="../products-list/products-list.php?gender=0&category=11&size=&brand=">Shorts</a></li>
                <li><a href="../products-list/products-list.php?gender=0&category=9&size=&brand=">Jeans</a></li>
                <li><a href="../products-list/products-list.php?gender=0&category=13&size=&brand=">Tracksuits</a></li>
            </ul>


        </nav>
    </header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        const hamburger = document.querySelector('#menuToggle');
        const navLinks = document.querySelector('.nav-links');
        const links = document.querySelector("link");
        const closeInput = document.querySelector("input");

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle("open");
            hamburger.classList.toggle('fixed');
            $('.subnav-women').removeClass("open-subnav");
            $('.subnav-men').removeClass("open-subnav");

            $("#women").click(function() {
                $('.subnav-women').toggleClass('open-subnav');
            });

            $("#men").click(function() {
                $('.subnav-men').toggleClass('open-subnav');
            });

            links.addEventListener('click', () => {
                navLinks.classList.remove("open");
                hamburger.classList.remove('fixed');
                closeInput.checked = false;

            });


        });
    </script>