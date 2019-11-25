<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="header.css">
    <title>
        <?php
        echo  $sPageName;
        ?>
    </title>
</head>

<body>
    <div class="header-main">
        <header>
            <a href=""><img src="../graphics/preloved_logo.svg" alt="preloved_logo"></a>
            <div class="header-login">
                <a href="">Login</a>
                <a href="">Sign Up</a>
            </div>
        </header>
        <div class="nav-content">
            <nav>
                <div class="dropdown" id="dropdownMenu">
                    <div class="header-dropdown-content">

                        <h2><a href="">Home</a></h2>
                        <ul>
                            <h2><a href="">Women</a></h2>
                            <div class="header-list-item">
                                <li><a href="">Coats</a></li>
                                <li><a href="">Jackets</a></li>
                                <li><a href="">Blazers</a></li>
                                <li><a href="">Dresses</a></li>
                                <li><a href="">Shirts | Tops</a></li>
                                <li><a href="">Trousers</a></li>
                                <li><a href="">Jeans</a></li>
                                <li><a href="">T-Shirts</a></li>
                                <li><a href="">Sweatshirts</a></li>
                                <li><a href="">Skirts | Shorts</a></li>
                                <li><a href="">Shoes</a></li>
                                <li><a href="">Bags</a></li>
                            </div>
                        </ul>

                        <ul>
                            <h2><a href="">Men</a></h2>
                            <div class="header-list-item">
                                <li><a href="">Coats</a></li>
                                <li><a href="">Jackets</a></li>
                                <li><a href="">Blazers</a></li>
                                <li><a href="">Suits</a></li>
                                <li><a href="">Shirts</a></li>
                                <li><a href="">Knitwear</a></li>
                                <li><a href="">Cashmere</a></li>
                                <li><a href="">Trousers</a></li>
                                <li><a href="">Shorts</a></li>
                                <li><a href="">Jeans</a></li>
                                <li><a href="">Tracksuits</a></li>
                                <li><a href="">Sweatshirts</a></li>
                            </div>
                        </ul>
                        <h2><a href="">About</a></h2>
                        <h2><a href="">Contact</a></h2>
                        <div class="header-mobile-login">
                            <a href="">Login</a>
                        </div>
                    </div>

                </div>
            </nav>

            <div class="header-search">
                <div class="header-search-content">

                    <form class="header-form">
                        <input class="header-input">
                        <button class="header-button"><img src="../graphics/search-bar-icon.svg"></button>
                    </form>
                    <div class="header-mobile-logo">
                        <img src="../graphics/preloved-logo-mobile.svg"> </div>
                    <div class="burger-menu">
                        <a href="javascript:void(0);" id="icon" onclick="burgerMenu()"> 
                        <img src="../graphics/menu.svg">
                        </a>
                    
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
    
        if (matchMedia) {
            const mq = window.matchMedia("(min-width: 30em)");
            mq.addListener(WidthChange);
            WidthChange(mq);
        }

        // media query change
        function WidthChange(mq) {
            var x = document.getElementById("icon")
            if (mq.matches) {
                x.style.display = "none";
                document.getElementById("iconClose").style.display = "none";
                document.getElementById("dropdownMenu").style.display = "flex";
            } else {
                x.style.display = "block";
                document.getElementById("dropdownMenu").style.display = "none";
            }

        }


        // media burgermenu
        function burgerMenu() {
            var x = document.getElementById("dropdownMenu");

            if (x.style.display === "block") {
                x.style.display = "none";
          

               
                
            } else {
                x.style.display = "block";
          

                
            }
        }

    </script>