<?php
	session_start();
    date_default_timezone_set('America/Los_Angeles');
	$time_stamp = date('F jS Y g:i:s a');
    $collect = 0;
    // farm and casino *****************************************************
	if(isset($_POST['action']) && $_POST['action'] == 'farm'){
        // collect
        if ($_POST['value'] != 0) {
            $_SESSION['power'] = $_POST['value'];
            $collect = $_POST['value'];
            array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
        }
		$gold = rand(1,200);
		$_SESSION['gold_total'] = $_SESSION['gold_total'] + $gold;
		// $message = "got "
		array_unshift($_SESSION['log'], "<h6>You entered a cave and earned $gold gold.&nbsp&nbsp&nbsp($time_stamp)</h6>");
	}
	if(isset($_POST['action']) && $_POST['action'] == 'casino'){
        // collect
        if ($_POST['value'] != 0) {
            $_SESSION['power'] = $_POST['value'];
            $collect = $_POST['value'];
            array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
        }
		$ouch = rand(0,1);
        $percent = round($_SESSION['gold_total'] * 0.1);
		if ($ouch == 1){
			$_SESSION['gold_total'] = $_SESSION['gold_total'] + $percent;
			array_unshift($_SESSION['log'], "<h6>You entered a casino and earned $percent gold.&nbsp&nbsp&nbsp($time_stamp)</h6>");
		}
		else{
			$_SESSION['gold_total'] = $_SESSION['gold_total'] - $percent;
			array_unshift($_SESSION['log'], "<p>You entered a casino and lost $percent gold.. OUCH!.&nbsp&nbsp&nbsp($time_stamp)</p>");
		}
	}
    // buy hamsters *****************************************************
    if(isset($_POST['action']) && $_POST['action'] == 'ham1'){
        if($_SESSION['gold_total'] > $_SESSION['price1']) {
            // collect
            if ($_POST['value'] != 0) {
                $_SESSION['power'] = $_POST['value'];
                $collect = $_POST['value'];
                array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
            }
            $_SESSION['gold_total'] = $_SESSION['gold_total'] - $_SESSION['price1'];
            $price = $_SESSION['price1'];
            array_unshift($_SESSION['log'], "<h5>You bought 1 basic ham for $price gold.&nbsp&nbsp&nbsp($time_stamp)</h5>");
            $_SESSION['ham1'] = $_SESSION['ham1'] + 1;
            $_SESSION['price1'] = floor($_SESSION['price1'] * 1.15);
        }
        else {
            // collect
            if ($_POST['value'] != 0) {
                $_SESSION['power'] = $_POST['value'];
                $collect = $_POST['value'];
                array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
            }
            array_unshift($_SESSION['log'], "<p>You do not have enough gold to buy that!!&nbsp&nbsp&nbsp($time_stamp)</p>");
        }
    }
    if(isset($_POST['action']) && $_POST['action'] == 'ham2'){
        if($_SESSION['gold_total'] > $_SESSION['price2']) {
            // collect
            if ($_POST['value']!= 0) {
                $_SESSION['power'] = $_POST['value'];
                $collect = $_POST['value'];
                array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
            }
            $_SESSION['gold_total'] = $_SESSION['gold_total'] - $_SESSION['price2'];
            $price = $_SESSION['price2'];
            array_unshift($_SESSION['log'], "<h5>You bought 1 cheer ham for $price gold.&nbsp&nbsp&nbsp($time_stamp)</h5>");
            $_SESSION['ham2'] = $_SESSION['ham2'] + 1;
            $_SESSION['price2'] = floor($_SESSION['price2'] * 1.15);
        }
        else {
            // collect
            if ($_POST['value']) {
                $_SESSION['power'] = $_POST['value'];
                $collect = $_POST['value'];
                array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
            }
            array_unshift($_SESSION['log'], "<p>You do not have enough gold to buy that!!&nbsp&nbsp&nbsp($time_stamp)</p>");
        }
    }
    if(isset($_POST['action']) && $_POST['action'] == 'ham3'){
        if($_SESSION['gold_total'] > $_SESSION['price3']) {
            // collect
            if ($_POST['value']!= 0) {
                $_SESSION['power'] = $_POST['value'];
                $collect = $_POST['value'];
                array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
            }
            $_SESSION['gold_total'] = $_SESSION['gold_total'] - $_SESSION['price3'];
            $price = $_SESSION['price3'];
            array_unshift($_SESSION['log'], "<h5>You bought 1 spin ham for $price gold.&nbsp&nbsp&nbsp($time_stamp)</h5>");
            $_SESSION['ham3'] = $_SESSION['ham3'] + 1;
            $_SESSION['price3'] = floor($_SESSION['price3'] * 1.15);
        }
        else {
            // collect
            if ($_POST['value']) {
                $_SESSION['power'] = $_POST['value'];
                $collect = $_POST['value'];
                array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
            }
            array_unshift($_SESSION['log'], "<p>You do not have enough gold to buy that!!&nbsp&nbsp&nbsp($time_stamp)</p>");
        }
    }





    if(isset($_POST['action']) && $_POST['action'] == 'get-gold'){
        if ($_POST['value']!= 0) {
            $_SESSION['power'] = $_POST['value'];
            $collect = $_POST['value'];
            array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
        }
    }
    if(isset($_POST['action']) && $_POST['action'] == 'play'){
        array_unshift($_SESSION['log'], "<h3>Welcome to Hamster Gold! Hamsters cost money yo. Dig for gold first then buy your first hamster! &nbsp&nbsp&nbsp($time_stamp)</h3>");
    }


// reset ***************
    if(isset($_POST['action']) && $_POST['action'] == 'reset'){
        session_destroy();
    }
// **********************


	header('Location: index.php');

