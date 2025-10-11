<!--
    login.php
    The login page for this program
    In Secure directory: The session is established with a token for it. User is redirected to account.php if the login details are correct, if not redirect to index.html
-->

<?php
require_once('common.php');
if ($_POST['username'] === 'student' && $_POST['password'] === 'ISEC3004') {
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['username'] = $_POST['username'];
    resetAccount();
    // CSRF Security Enhanced Patched
    $_SESSION['token'] = getCSRFToken($_POST['password']);
    header('Location: /account.php');
} else {
    header('Location: /index.html');
}
