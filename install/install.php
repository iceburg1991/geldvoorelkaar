<?php
include '../user_agent.php';

if(!empty($_GET["install"])){
    startSetup();
}
function startSetup() {
    exec("cd ../ & php composer.phar install");
    header("Location: /geldvoorelkaar");
}?>

<!doctype html>
<html>
    <head>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.0/js/materialize.min.js"></script>
    </head>
    <body>
        <header>
            <nav class="blue">
                <div class="container">
                    <div class="nav-wrapper">
                        <a class="brand-logo">Installatie Geldvoorelkaar</a>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <h5>Te installeren:</h5>
                <p><?php $output = shell_exec('cd ../ & php composer.phar show -s');
                        $required_packages = trim(str_replace('requires','',strstr($output,'requires')));
                        $required_packages = explode("\n", $required_packages);
                    foreach($required_packages as $package){
                        echo "<strong>Naam:</strong> " . $package . '<br />';
                    }
                    ?>
                 </p>
                <div class="divider"></div>
                <h5>Informatie over jouw systeem:</h5>
                <p>
                    <strong>Besturingssysteem:</strong> <?php echo getOS(); ?><br />
                    <strong>Browser:</strong> <?php echo getBrowser(); ?>
                </p>
                <a class="waves-effect waves-light btn" href="?install=true"><i class="mdi-content-send right"></i> Start installatie  </a>
            </div>
            <!--Import jQuery before materialize.js-->
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <!-- Compiled and minified JavaScript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.0/js/materialize.min.js"></script>
        </main>
    </body>
</html>