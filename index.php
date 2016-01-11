<?php session_start();
//session_destroy();
	if(!isset($_SESSION['gold_total'])){
        $_SESSION['gold_total'] = 0;
        $_SESSION['power'] = 0;
        $_SESSION['ham1'] = 0;
        $_SESSION['ham2'] = 0;
        $_SESSION['ham3'] = 0;
        $_SESSION['ham-total'] = 0;
        $_SESSION['log'] = array();


        $_SESSION['price1'] = 1500;
        $_SESSION['price2'] = 10000;
        $_SESSION['price3'] = 50000;

    }
    else {
        $power = (int)$_SESSION['power'];
        $_SESSION['power'] = 0;
//        var_dump($_SESSION['power']);
//        var_dump($power);
        $_SESSION['gold_total'] = $_SESSION['gold_total'] + $power;
        $_SESSION['ham-total'] = $_SESSION['ham1'] + $_SESSION['ham2'] + $_SESSION['ham3'];




    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hamster Gold</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!--counter script-->
    <script type="text/javascript">
//  ************************ TRUNCATE FUNCTION ***********************************************
        function truncator(numToTruncate, intDecimalPlaces) {
            var numPowerConverter = Math.pow(10, intDecimalPlaces);
            return ~~(numToTruncate * numPowerConverter)/numPowerConverter;
        }
//  ***************************************************************************

//  ************************ COMMAS FUNCTION ***********************************************
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!|d))/g, ",");
}
//  **************************************************************************
        var power1 = 0 ;
        var power = 0 ;
        var sec = 0;
        var ham1 = 0;
        var ham11 =0;
        var ham2 = 0;
        var ham22 =0;
        var ham3 = 0;
        var ham33 =0;
        <?php if ($_SESSION['ham-total'] > 0){ ?>
            window.setInterval(
                function (){
                    ham11 = <?= $_SESSION['ham1']?>;
                    ham1 = ham11;
                    ham22 = <?= $_SESSION['ham2']?>;
                    ham2 = ham22 * 5;
                    ham33 = <?= $_SESSION['ham3']?>;
                    ham3 = ham33 * 40;

                    power1 = power + ham1 + ham2 + ham3;
                    power = truncator(power1, 0);





                    document.getElementById("power-num").innerHTML = power ;
                    document.getElementById("power-num1").value = power ;
                    document.getElementById("power-num0").value = power ;
                    document.getElementById("ham2p").value = power ;
                    document.getElementById("ham3p").value = power ;
                    document.getElementById("farm-p").value = power ;
                    document.getElementById("casino-p").value = power ;
                }, 100);
        <?php } ?>
    </script>
    <!--    counter script-->
</head>
<body>
<!-- *********************** OUTER WRAPPER *********************** -->
    <div id="outer-wrapper">


<!-- *********************** LEFT SIDEBAR *********************** -->
        <div id="sidebar">
            <div id="gold">
                <p class="gold-large">total gold</p>
                <h2><?= $_SESSION['gold_total']?></h2>
                <p class="gold-small"><span id="power-num"></span></p>
            </div>
            <div class="get">
                <form class="form-reset" action="process.php" method="post">
                    <input type="hidden" id="power-num0" name='value' value="">
                    <input type='hidden' name='action' value='get-gold'>
                    <button class="get-button" type="submit">collect hamster gold</button>
                </form>
            </div>
            <div id="buy-wrapper">
                <div class="dig">
                    <div class="dig1">
                        <form class="dig-form" action="process.php" method="post">
                            <input type="hidden" id="farm-p" name='value' value="">
                            <input type='hidden' name='action' value='farm'>
                            <button class="dig-button" type="submit">Dig for gold</button>
                        </form>
                        <div class="dig-info">
                            <h2>CAVE</h2>
                            <p>earns 1-200 Gold</p>
                        </div>
                    </div>
                    <div class="dig2">
                        <form class="dig-form" action="process.php" method="post">
                            <input type="hidden" id="casino-p" name='value' value="">
                            <input type='hidden' name='action' value='casino'>
                            <button class="dig-button" type="submit">Dig for gold</button>
                        </form>
                        <div class="dig-info">
                            <h2>CASINO</h2>
                            <p>earns or takes 10% Gold</p>
                        </div>
                    </div>
                </div>
                <div class="buy-title"><p>hamster shop</p></div>
                <div class="buy2">
                    <div class="buy-info">
                        <h3 class="ham1">Basic Ham</h3>
                        <img src="images/ham1.gif">
                        <p class="black">cost: <?=$_SESSION['price1']?> gold</p>
                        <p class="blue">gold / second: 10</p>
                    </div>
                    <form class="buy-form" action="process.php" method="post">
                        <input type="hidden" id="power-num1" name='value' value="">
                        <input type='hidden' name='action' value='ham1'>
                        <button class="buy-button" type="submit">BUY</button>
                    </form>
                </div>
                <div class="buy2">
                    <div class="buy-info">
                        <h3 class="ham2">cheer Ham</h3>
                        <img src="images/ham2.gif">
                        <p class="black">cost: <?=$_SESSION['price2']?> gold</p>
                        <p class="blue">gold / second: 50</p>
                    </div>
                    <form class="buy-form" action="process.php" method="post">
                        <input type="hidden" id="ham2p" name='value' value="">
                        <input type='hidden' name='action' value='ham2'>
                        <button class="buy-button" type="submit">BUY</button>
                    </form>
                </div>
                <div class="buy2">
                    <div class="buy-info">
                        <h3 class="ham3">spin Ham</h3>
                        <img src="http://rs5.pbsrc.com/albums/y179/brianmichaelwendt/Funny/hamsterdance.gif~c200">
                        <p class="black">cost: <?=$_SESSION['price3']?> gold</p>
                        <p class="blue">gold / second: 400</p>
                    </div>
                    <form class="buy-form" action="process.php" method="post">
                        <input type="hidden" id="ham3p" name='value' value="">
                        <input type='hidden' name='action' value='ham3'>
                        <button class="buy-button" type="submit">BUY</button>
                    </form>
                </div>





            </div>

            <div class="reset">
                <form class="form-reset" action="process.php" method="post">
                    <input type='hidden' name='action' value='reset'>
                    <button class="reset-button" type="submit">Reset</button>
                </form>
            </div>
        </div>


        <!-- *********************** MAIN WRAPPER *********************** -->
        <div id="wrapper">
            <div id="header">
                <h1>Hamster</h1>
                <img src="images/gold.gif">
                <h1>Gold</h1>
            </div>
            <div id="show-wrapper">
                <div class="show-header">
                    <div class="dig-description">
                        <p>Stats</p>
                    </div>
                    <div class="stats-wrapper1">
                        <p>total hamsters:<span><?= $_SESSION['ham-total'] ?></span></p>
                    </div>
                    <div class="stats-wrapper1">
                        <p> total gold/sec:<span><?= $_SESSION['ham1'] * 10 + $_SESSION['ham2'] * 100 + $_SESSION['ham3'] * 700?></span></p>
                    </div>
                </div>
                <div class="show-ham">
                    <?php
                    if ($_SESSION['ham1'] > 0){
                        $num1 = $_SESSION['ham1'];
                        echo "<p><span class='ham1'>Basic Ham</span> x $num1 </p>";
                        for ($i=0; $i < $_SESSION['ham1']; $i++) {
                            echo "<div id='ham1'></div>";
                        }
                    }?>
                </div>
                <div class="show-ham">
                    <?php
                    if ($_SESSION['ham2'] > 0){
                        $num2 = $_SESSION['ham2'];
                        echo "<p><span class='ham2'>Cheer Ham</span> x $num2 </p>";
                        for ($i=0; $i < $_SESSION['ham2']; $i++) {
                            echo "<div id='ham2'></div>";
                        }
                    }?>
                </div>
                <div class="show-ham">
                    <?php
                    if ($_SESSION['ham3'] > 0){
                        $num3 = $_SESSION['ham3'];
                        echo "<p><span class='ham3'>Spin Ham</span> x $num3 </p>";
                        for ($i=0; $i < $_SESSION['ham3']; $i++) {
                            echo "<div id='ham3'></div>";
                        }
                    }?>
                </div>
            </div>
            <div class="log">
                <?php
                foreach ($_SESSION['log'] as $value) {
                    echo "$value";
                } ?>
            </div>
        </div>
    </div>
</body>
</html>





