<?php
$sPageName = "About";
session_start();
if(isset($_SESSION['username'])){
    require_once(__DIR__ . '/../navigation/header-logout.php');
} 

if(empty($_SESSION)){
    require_once(__DIR__ . '/../navigation/header.php');
}
?> 




    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
  crossorigin="anonymous">
    
    <section class="about">
        <h2 class="about-title">
          <span class="white-title">ABOUT </span>PRELOVED
        </h2>
        <div class="about-container">
            <div class="about-content">
                <p class="about-text">
                A service for young adults who like to afford clothes. 
                The platform lets people buy & sell second-hand clothes. <br><br>
                Unlike other services, our service puts focus on the affordability 
                of the customers.
                </p>
                <img class="about-image" src="../graphics/photo-of-woman-using-her-laptop.svg" alt="photo-of-woman-using-her-laptop">
            </div>
            <div class="about-content">
                <p class="about-text right-text">
                Nowadays, fashion launched on the market by huge companies is not sustainable.<br><br>
                People are buying more and more clothes without thinking of the 
                huge damage that they are causing to the environment.<br><br>
                The amount of clothes bought by people all over the globe has tripled since 1960. 
                </p>
                <img class="about-image left-image" src="../graphics/we-see-what-we-want.svg" alt="we-see-what-we-want">
            </div>
            <div class="about-content">
                <p class="about-text">
                The rapid consumption greatly affected the environment which leads to the 
                fashion industry to be the major polluting industries on the globe.
                </p>
                <img class="about-image" src="../graphics/turtle-in-danger.svg" alt="turtle-in-danger">
            </div>
            <div class="about-content">
                <p class="about-text right-text">
                The concern that we are trying to solve is focused on fast fashion and the 
                clothes waste it produces every year, which are produced as low quality clothing in high volumes, 
                what creates a problem for humans as well as natural enviroment.
                </p>
                <img class="about-image left-image" src="../graphics/photo-of-woman-near-clothes.svg" alt="photo-of-woman-near-clothes">
            </div>
        </div>
        <h2 class="about-title">
        <span class="white-title">TE</span>AM
        </h2>
        <div class="team">
        <div class="team-container">
            <div class="team-content">
                <div class="team-profile image-paulina">
                    </div>
                    <h4 class="team-name">
                        Paulina Kazmierczak
                    </h4>
                    <p class="team-description">
                    "It isn’t enough just looking for the quality in the products we buy, 
                    we must ensure that there is quality in the lives of the people who make them."
                    </p>
                    <a href="https://www.facebook.com/paolakaz" class="team-link">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="team-content active-profile">
                <div class="team-profile image-andreea">
                </div>
                    <h4 class="team-name">
                        Andreea Steriu
                    </h4>
                    <p class="team-description">
                    "Every time you spend money, you’re casting a vote for 
                    the kind of world you want."
                    </p>
                    <a href="https://www.facebook.com/deckaSis" class="team-link">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="team-content">
                <div class="team-profile image-ida">
                    </div>
                    <h4 class="team-name">
                        Ida Green
                    </h4>
                
                    <p class="team-description">
                    "Infinite growth of material consumption in a finate world is an impossibility."
                    </p>
                    <a href="https://www.facebook.com/ida.green.7777" class="team-link">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $('.team-content').hover(function(){
        $(this).css({"background-color":"#f2cec5", "color":"#FFF", "opacity":"1"});
        $('.team-link').css('opacity','1');
        
    }, function(){
        $(this).css({"background-color":"#e6e6e6", "color":"#707070", "opacity":".4"});
        $('.team-link').css('opacity','0');
       
    })
</script>

  <?php require_once(__DIR__ . '/../footer/footer.php'); ?>  