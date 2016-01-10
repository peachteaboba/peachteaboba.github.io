<?php
	session_start();
    date_default_timezone_set('America/Los_Angeles');
	$time_stamp = date('F jS Y g:i:s a');
    $collect = 0;
	if(isset($_POST['action']) && $_POST['action'] == 'farm'){
        // collect
        if ($_POST['value'] != 0) {
            $_SESSION['power'] = $_POST['value'];
            $collect = $_POST['value'];
            array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
        }
		$gold = rand(10,20);
		$_SESSION['gold_total'] = $_SESSION['gold_total'] + $gold;
		// $message = "got "
		array_unshift($_SESSION['log'], "<h6>You entered a farm and earned $gold gold.&nbsp&nbsp&nbsp($time_stamp)</h6>");
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
        if($_SESSION['gold_total'] > 30) {
            // collect
            if ($_POST['value'] != 0) {
                $_SESSION['power'] = $_POST['value'];
                $collect = $_POST['value'];
                array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
            }
            $_SESSION['gold_total'] = $_SESSION['gold_total'] - 30;
            array_unshift($_SESSION['log'], "<h5>You bought 1 basic hamster for 30 gold.&nbsp&nbsp&nbsp($time_stamp)</h5>");
            $_SESSION['ham1'] = $_SESSION['ham1'] + 1;
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
        if($_SESSION['gold_total'] > 1000) {
            // collect
            if ($_POST['value']!= 0) {
                $_SESSION['power'] = $_POST['value'];
                $collect = $_POST['value'];
                array_unshift($_SESSION['log'], "<h4>Collected $collect gold from hamsters!!!&nbsp&nbsp&nbsp($time_stamp)</h4>");
            }
            $_SESSION['gold_total'] = $_SESSION['gold_total'] - 1000;
            array_unshift($_SESSION['log'], "<h5>You bought 1 cheerleader hamster for 1000 gold.&nbsp&nbsp&nbsp($time_stamp)</h5>");
            $_SESSION['ham2'] = $_SESSION['ham2'] + 1;
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


// reset ***************
    if(isset($_POST['action']) && $_POST['action'] == 'reset'){
        session_destroy();
    }
// **********************


	header('Location: index.php');

