<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/trips.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Pārgājieni</title>
</head>
<body>
<?php include 'php/navbar.php'; ?>
<div id="main-container">


    <?php
    include 'php/modals/modal1.php';
    include 'php/modals/modal2.php';
    include 'php/modals/modal3.php';
    include 'php/modals/modal4.php';
    include 'php/modals/modal5.php';
    include 'php/modals/modal6.php';
    ?>

    <div id="description-head">
    <h1>
    Pārgājienu Kalendārs, Kurā Apkopoti Aktuālie Publiskie Pārgājieni Latvijā
    </h1>
    </div>
    <div id="description">
    Šajā pārgājienu kalendārā ir apkopoti teju visi publiskie pārgājieni Latvijā, kuros vari piedalīties kopā ar citiem. Šo pārgājienu informācija, tās precizitāte un citas detaļas nav HIKINHPATH.LV atbildībā. Ja ir radušies jautājumi par dalību pārgājienā, vērsies pie organizatora spiežot “Uzzināt Vairāk.” Šo pārgājienu apkopošana un informācijas uzturēšana ir brīvprātīgs darbs. p.s. pievienojies pārgājienu grupai Telegram!
    </div>
    
        <div id="trip-container">
            <div id="month-cont">
                <div id="month-name">
                <h1>Jūnijs</h1>
                </div>
                <div id="trips">
                    <div id="trips-row" style="justify-content: center;">
                        
                    <?php
                    include 'php/thumbnails/tbn1.php';
                    include 'php/thumbnails/tbn2.php';
                    include 'php/thumbnails/tbn3.php';
                    
                    ?>

                    </div>
                </div>
            </div>
            <div id="month-cont">
                <div id="month-name">
                <h1>Jūlijs</h1>
                </div>
                <div id="trips">
                    <div id="trips-row" style="justify-content: flex-start;">
                        
                    <?php
                    include 'php/thumbnails/tbn4.php';
                    include 'php/thumbnails/tbn5.php';
                    ?>

                    </div>
                </div>
            </div>
            </div>
            <div id="month-cont">
                    <div id="month-name">
                    <h1>Augusts</h1>
                    </div>
                    <div id="trips">
                        <div id="trips-row" style="justify-content: flex-start; ">
                            
                        <?php
                        include 'php/thumbnails/tbn6.php';
                        ?>

                        </div>
                    </div>
                </div>
        </div>
        </div>
</div>

<script src="js/modal.js"></script>
<script src="js/send_id.js"></script>



</body>
</html>