<?php
function startSetup() {
    echo 'I just ran a php function';
    //exec("php composer.phar install");
}

if (isset($_GET['install'])) {
    startSetup();
}
?>
<html>
    <head>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.0/js/materialize.min.js"></script>
    </head>
    <body>
        <h1>Installatie Geldvoorelkaar app</h1></hq>
        <a class="waves-effect waves-light btn" href="install/install.php?install=true"><i class="mdi-content-send right"></i> Start installatie  </a>

        <h2>Te installeren onderdelen:</h2>
        <?php echo exec('php composer.phar show -s'); ?>


        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.0/js/materialize.min.js"></script>
    </body>
</html>