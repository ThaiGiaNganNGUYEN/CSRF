<!--
    account.php
    The main dashboard of user's bank account to make payments and view transactions
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
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
        <title>Personal Bank Account</title>
    </head>
    <body>
        <header>
            <h1 class="h3"> 
                <span class="gold">Bank of</span> <span class="blue">CC</span><span class="green">$</span><span class="purple">E</span><span class="red">P</span>
            </h1>
            <nav>
                <ul class="nav pull-right">
                    <li>
                        <button id="reset" class="btn btn-primary">Reset</button>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="jumbotron">
                <h1><strong>Current Balance:</strong> $<span id="balance"><?= $_SESSION['balance'] ?></span></h1>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h3>Transactions History</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($_SESSION['transfers'] as $transfer) {
                            ?>
                            <tr>
                                <td><?= $transfer['from'] ?></td>
                                <td><?= $transfer['to'] ?></td>
                                <td><?= $transfer['amount'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h3>Make a Payment</h3>
                    <form method="POST" action="transactions.php">
                        <div class="form-group">
                            <label for="to">To</label>
                            <input class="form-control" type="text" name="to" id="to"/>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input class="form-control" type="text" name="amount" id="amount"/>
                        </div>
                        <input type="submit" class="btn btn-success" value="Send"/>
                    </form>
                </div>
            </div>
        </main>
<?php
if (isset($_SESSION['alertMessage'])) { ?>
<script>alert("Ehehe =) Thank you for the money <3")</script>
<?php
}
unset($_SESSION['alertMessage']);
?>
    </body>

    <script>
        $(document).ready(function () {
            function drawPage(data) {
                $('#balance').text(data.balance);
                $('tbody>tr').remove();
                for (var i = 0; i < data.transfers.length; i++) {
                    var transfer = data.transfers[i];
                    var html = '<tr><td>' + transfer.from + '</td><td>' + transfer.to + '</td><td>' + transfer.amount + '</td></tr>'
                    var el = $(html);
                    $('tbody').append(el);
                }
            }

            $('form').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    "url": "/transactions.php",
                    "method": "POST",
                    "dataType": "json",
                    "data": {"to": $('#to')[0].value, "amount": $('#amount')[0].value},
                    "success": function (data, status, xhr) {
                        drawPage(data);
                    }
                });
                return false;
            });

            $('#reset').on('click', function (event) {
                event.preventDefault();
                $.ajax({
                    "url": "/reset.php",
                    "method": "POST",
                    "dataType": "json",
                    "success": function (data, status, xhr) {
                        drawPage(data);
                    }
                })
                return false;
            });
        });
    </script>
</html>
