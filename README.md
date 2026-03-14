# Synopsis
Cyber Crime and Security Enhanced Programming - ISEC3004
Assignment 1
Cross Site Request Forgery

## Description
This program simulates a CSRF attack where the attacker tricks victim users to execute unwanted actions on a web application in which they are currently authenticated using their credentials

## Contents
README - The manual file for CSRF attack

Vuln - Folder contains all vulnerable program files <br>
|_index.html - The index file for web browser <br>
|_account.php - The main dashboard to make payments and view transactions <br>
|_common.php - The common functions for this program <br>
|_evil.php - The attacker CSRF attack page for this program <br>
|_login.php - The login page for this program <br>
|_reset.php - The reset page to reset bank account to original state <br>
|_transfer.php - The code to make transactions to attacker. This is where the differences between vulnerable code and security enhanced code is <br>
|_transactions.php - The code to make transactions and view transactions history <br>
|_style.css - The file for style sheet of the web browser <br>

Secure - Folder contains all security enhanced program files <br>
|_index.html - The index file for web browser <br>
|_account.php - The main dashboard to make payments and view transactions <br>
|_common.php - The common functions for this program <br>
|_evil.php - The attacker CSRF attack page for this program <br>
|_login.php - The login page for this program <br>
|_reset.php - The reset page to reset bank account to original state <br>
|_transfer.php - The code to make transactions to attacker. This is where the differences between vulnerable code and security enhanced code is <br>
|_transactions.php - The code to make transactions and view transactions history <br>
|_style.css - The file for style sheet of the web browser <br>

## Explanation
The differences between transfer.php file in Vuln and Security directories: <br>
In Vuln, there is a slight modification where it redirects the user to account.php and set a session variable called alertMessage. <br>
In Security, there are more changes as it has to compare the token of user and token stored in session. If tokens match, it will execute the POST request. Else, the request will be rejected.

## Dependencies
PHP <br>
HTML <br>
CSS <br>
Bootstrap <br>

## Instruction to get PHP
sudo apt install php7.4-cli

## Execution to host web browswer for vulnerable program
cd Vuln <br>
php -S 127.0.0.1:8888

## Execution to host web browser for security enhanced program
cd Secure <br>
php -S 127.0.0.1:8888

## Accessing the web browser
In browser: http://127.0.0.1:8888

## Default login details for both programs
Username: student <br>
Password: ISEC3004

# Authors
Group 10: <br>
Thai Gia Ngan Nguyen - 22259499 <br>
Rupanshu Garg - 22027324 <br>
Areej Khan - 21790230 <br>
Amanda Nguyen - 22223850 <br>
Param Rajivbhai Parmar - 21678491 <br>
