<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <title>Document</title>
</head>
<body>
<?php include 'php/navbar.php'; ?>

<div id="main-cont">
    <div id="intro-cont">
    <div id="slideshow">
        <div class="slide"></div>
        <div class="slide"></div>
        <div class="slide"></div>

    </div>
        <div id="intro-cont-head">
        <h1>HIKINGPATH.LV<br>  
        PĀRGĀJIENU MARŠRUTI</h1>
        </div>
        <div id="intro">
        <h3>
        Pārgājienu maršruti Taviem “offline” piedzīvojumiem. Ved savus draugus un ģimeni pārgājienā tā, it kā Tu būtu jau pieredzes bagāts meža vilks. Redzi vietas, skatus un dabas objektus, par kuriem neraksta tradicionālajos tūrisma ceļvežos.
        </h3>
        </div>
    </div>

    <div id="nl-cont">
        <div id="nl-head">
        <h1>Pievienojies "HikingPath" Bez Maksas un Dodies Dabā!</h1>
        </div>
        <div id="nl-apr">
        <h3>Saņem svaigākās un jaunākās ziņas un informāciju par turmpākajiem pārgājieniem un aktivitātēm dabā! Atstāj savus kontaktus šeit:</h3>
        </div>
        <div id="nl">
        <form id="newsletter-form" method="POST" action="php/db/db_newsletter.php">
            <input type="text" id="name" name="name" placeholder="Vārds">
            <input type="text" id="surname" name="surname" placeholder="Uzvārds">
            <input type="email" id="email" name="email" placeholder="Epasts">
            <input type="tel" id="phone" name="phone" placeholder="Tel.nr">
            <button type="submit">Pieteikties</button>
        </form>
        </div>

    </div>

    <div id="infopan-con">
        <div id="infopan-head">
        <h1>Ko Tu Atradīsi "Camp EDZAHIKING"?</h1>
        </div>
        <div id="infopan">
            <div id="inforow">
                <div id="infoimg">
                <img src="img/img5.jpg" alt="">
                </div>
                <div id="textinfo">
                    <div id="textinfohead">
                    <h2>Netradicionāli Pārgājienu Maršruti Latvijā</h2>
                    </div>
                    <div id="info">
                    Šeit atrodas pārgājieni gar Braslas upi, Lojas upītes takas, Amatas ģeotaka un izaicinošais Raunis. Bez tiem šeit ir pieejama informācija gan par zināmākām, gan arī ne tik zināmām vietām, kurās ir apslēptas īstas pērles. Tas viss – dažu klikšķu attālumā un pieejams jebkurā viedierīcē, kas atbalsta GPX navigāciju.
                    </div>
                </div>
            </div>

            <div id="inforow">
                <div id="infoimg">
                <img src="img/img6.jpg" alt="">
                </div>
                <div id="textinfo">
                    <div id="textinfohead">
                    <h2>Detalizēti Apraksti un Attēli Par Gaidāmo Pārgājienu</h2>
                    </div>
                    <div id="info">
                    Katrs pārgājiena maršruts ir izstaigāts vairākkārt, tāpēc ir detalizēti aprakstīts ar piezīmēm, ko vērts ņemt vērā, par to kā nokļūt un atgriezties no pārgājiena ar sabiedrisko vai privāto transportu.  Var teikt, ka vienīgais kas pašiem jāizplāno – pārgājiena izpilde, jo viss pārējais ir izdarīts Tavā vietā. 
                    </div>
                </div>
            </div>

            <div id="inforow">
                <div id="infoimg">
                <img src="img/img7.jpg" alt="">
                </div>
                <div id="textinfo">
                    <div id="textinfohead">
                    <h2>Regulāri Tiek Pievienoti Jauni Pārgājienu Maršruti</h2> 
                    </div>
                    <div id="info">
                    Šis pārgājienu projekts pastāv jau vairāk kā 2 gadus un šajā laikā, tas ir piedzīvojis izaugsmi arī ar pārgājienu maršrutu izvēli. Tiek pētītas aizvien jaunas takas un pārgājienu maršruti, lai Tev nepietrūktu ko atklāt. Patiesībā, ja Tu sāktu pārgājienā doties katru otro nedēļas nogali, tev šobrīd iešanai pietiktu teju pilnam gadam. 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="merch-head">
        <h1>Nēsā līdzi motivāciju, kur vien Tu doties!</h1>
    </div>

    <div class="slideshow-container">
    <div class="mySlides">
        <img src="img/merch/merch1.webp">
        <div class="merchhead">
        Krekls6
        </div>
        <div class="merchprice">
        &euro;99.99
        </div>
    </div>
    <div class="mySlides">
        <img src="img/merch/merch2.png">
        <div class="merchhead">
        Krekls6
        </div>
        <div class="merchprice">
        &euro;99.99
        </div>
    </div>

    <div class="mySlides">
        <img src="img/merch/merch3.webp">
        <div class="merchhead">
        Krekls6
        </div>
        <div class="merchprice">
        &euro;99.99
        </div>
    </div>

    <div class="mySlides">
        <img src="img/merch/merch4.webp">
        <div class="merchhead">
        Krekls6
        </div>
        <div class="merchprice">
        &euro;99.99
        </div>
    </div>

    <div class="mySlides">
        <img src="img/merch/merch5.webp">
        <div class="merchhead">
        Krekls6
        </div>
        <div class="merchprice">
        &euro;99.99
        </div>
    </div>

    <div class="mySlides">
        <img src="img/merch/merch6.jpg">
        <div class="merchhead">
        Krekls6
        </div>
        <div class="merchprice">
        &euro;99.99
        </div>
    </div>

</div>

    <script>
        $(document).ready(function(){
        $('.slideshow-container').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
        });
        });
    </script>
        
    <script src="js/cart.js"></script>

</div>



</body>
</html>