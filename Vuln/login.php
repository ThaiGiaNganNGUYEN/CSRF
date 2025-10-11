<!--
    login.php
    The login page for this program
    In Vuln directory: The session is established and user is redirected to account.php if the login details are correct. If login details are not correct, redirect to index.html
-->

<?php
require_once('common.php');
if ($_POST['username'] === 'student' && $_POST['password'] === 'ISEC3004') {
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['username'] = $_POST['username'];
    resetAccount();
    header('Location: /account.php');
} else {
    header('Location: /index.html');
}
