<?php
// common.php
// The common functions used for this program
// More functions are added in Secure directory compared to Vuln directory

session_start();

/**
 * Generate, store, and return the Token
 * @return string[]
 */

// Generate a security token
$password = "testtesttest";
function getCSRFToken($password)
{
    $nonce = uniqid();
    $expires = time() + 3600;
    $data = bin2hex($nonce) . "-" . session_id() . "-" . $expires;
    $hash = hash_hmac('sha256', $data, $password);

    echo $data . "-" . $hash;
    return $data . "-" . $hash;
}

// Check if user is logged in
function isLoggedIn()
{
    if ($_SESSION['isLoggedIn'] === true) {
        return true;
    }
    return false;
}

// To reset the account's balance and transactions
function resetAccount()
{
    $_SESSION['balance'] = 500000;
    $_SESSION['transfers'] = [];
}
