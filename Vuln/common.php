<?php
// common.php
// The common functions used for this program
// More functions are added in Secure directory compared to Vuln directory

session_start();

// Check if user is logged in
function isLoggedIn() {
    if ($_SESSION['isLoggedIn'] === true) {
        return true;
    }

    return false;
}

// To reset the account's balance and transactions
function resetAccount() {
    $_SESSION['balance'] = 500000;
    $_SESSION['transfers'] = [];
}
