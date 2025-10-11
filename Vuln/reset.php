<!--
    reset.php
    The reset page to reset bank account to original state
    This file is the same in both Vuln and Secure directories
-->

<?php
require_once('common.php');
if (!isLoggedIn()) {
    header('Location: /index.html');
}

resetAccount();

echo json_encode(array("balance" => $_SESSION['balance'], "transfers" => $_SESSION['transfers']));
