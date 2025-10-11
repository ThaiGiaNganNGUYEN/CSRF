<!--
    transfer.php
    The code to make transactions to attacker
    In Secure: The program is security enhanced because there is a token that get checked even after user is authenticated for a session
-->

<?php
require_once('common.php');
if (!isLoggedIn()) {
    header('Location: /index.html');
}

$amount = $_REQUEST['amount'];
$to = $_REQUEST['to'];

if ($amount > $_SESSION['balance']) {
    die("Insufficient Funds!");
}

$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

if (!$token || $token !== $_SESSION['token']) {

    // CSRF Security Enhanced Patched
    echo "<script>
alert('CSRF Attack Detected! You are not authorized to access the page!');
window.location.href='/index.html';
</script>";
    // session_destroy();
    exit;
} else {
    // Process the form
    $_SESSION['balance'] -= $amount;
    array_push($_SESSION['transfers'], array("to" => $to, "from" => $_SESSION['username'], "amount" => $amount));

    header('Content-Type: application/json');
    header('Location: /account.php');
    $_SESSION['alertMessage'] = "Ehehe =) Thank you for the money <3";
    echo json_encode(array("balance" => $_SESSION['balance'], "transfers" => $_SESSION['transfers']));
}
