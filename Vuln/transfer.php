<!--
    transfer.php
    The code to make transactions to attacker
    In Vuln: The program is vulnerable because CSRF attack can happen as soon as user has an authenticatd session established
-->

<?php
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
header('Location: /account.php');
$_SESSION['alertMessage'] = "Ehehe =) Thank you for the money <3";
echo json_encode(array("balance" => $_SESSION['balance'], "transfers" => $_SESSION['transfers']));
