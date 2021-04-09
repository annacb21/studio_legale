<?php 
require_once("resources/config.php"); 
if(isset($_GET['n']) && isset($_GET['c']) && isset($_GET['e']) && isset($_GET['t']) && isset($_GET['m'])) {
    $nome = $_GET['n'];
    $cognome = $_GET['c'];
    $email = $_GET['e'];
    $telefono = $_GET['t'];
    $messaggio = $_GET['m'];
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Consulenza online | Studio Legale Turlon</title>
    <meta charset="utf-8">
    <meta name="description" content="Lo Studio Legale Turlon è diretto dall'Avv. Federica Turlon, con sede a Roma e Padova. Competenza nella tutela della persona, dei minori e della famiglia."/>
    <meta name="keywords" content="studio legale turlon, studio legale, avv, avvocato, Federica Turlon, famiglia, minori, Roma, Padova, consulenza, consulenza online"/>
    <meta name="author" content="Anna Cisotto Bertocco"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="icon" href="images/favicon.ico">
</head>
<body>
    <script src="https://www.paypal.com/sdk/js?client-id=ASg2Gj5ghXnKWcYuC6MvGzpDDrf8P50Sdk_SWNbuJzK-G7j5EKDNvWo1x1tZrM4raD4oDJ9tb6nSgWIa&currency=EUR&components=buttons,funding-eligibility"></script>
    
    <!-- NAVBAR -->
    <?php include(TEMPLATE_FRONT . DS . "navbar.php"); ?>

    <!-- HEADER FOTO -->
    <div class="position-relative">
        <img src="images/foto.jpg" alt="">
    </div>

    <!-- CHECKOUT -->
    <div class="row">
        <div class="col-lg-6">
            <h1>Conferma pagamento consulenza</h1>
            <table>
                <tr>
                    <th>Dettaglio consulenza</th>
                </tr>
                <tr>
                    <td><?php echo $nome . " " . $cognome; ?></td>
                </tr>
                <tr>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td><?php echo $telefono; ?></td>
                </tr>
                <tr>
                    <td><?php echo $messaggio; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6">
            <p>Costo totale</p>
            <p>50.00 €</p>
            <div id="paypal-button-container"></div>
        </div>
    </div>

    <script>
        var FUNDING_SOURCES = [
            paypal.FUNDING.PAYPAL,
            paypal.FUNDING.CARD
        ];
        // Loop over each funding source / payment method
        FUNDING_SOURCES.forEach(function(fundingSource) {

            // Initialize the buttons
            var button = paypal.Buttons({
                createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                    amount: {
                        value: '50.00'
                    }
                    }]
                });
                },
                onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                });
                },
                fundingSource: fundingSource
            });

            // Check if the button is eligible
            if (button.isEligible()) {

                // Render the standalone button for that funding source
                button.render('#paypal-button-container');
            }
        });
        
    </script>


    <!-- UP BUTTON -->
    <button type="button" class="btn rounded-circle shadow btn-lg" id="upBtn" onclick="backToTop()"><i class="fas fa-chevron-up"></i></button>

    <!-- FOOTER -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

    <script src="https://kit.fontawesome.com/90922573b7.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="js/scrollToTop.js"></script>
</body>
</html>