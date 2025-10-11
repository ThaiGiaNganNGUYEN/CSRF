<?php
// transactions.php
// The code to make transactions and view transactions history
// This file is the same in both Vuln and Secure directories

require_once('common.php');
if(!isLoggedIn()) {
    header('Location: /index.html');
}

$amount = $_REQUEST['amount'];
$to = $_REQUEST['to'];

if ($amount > $_SESSION['balance']) {
    die("Insufficient Funds!");
}

$_SESSION['balance'] -= $amount;
array_push($_SESSION['transfers'], array("to" => $to, "from" => $_SESSION['username'], "amount" => $amount));

header('Content-Type: application/json');
echo json_encode(array("balance" => $_SESSION['balance'], "transfers" => $_SESSION['transfers']));
