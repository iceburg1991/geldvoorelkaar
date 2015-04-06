<?php
include '../user_agent.php';

if(!empty($_GET["install"])){
    startSetup();
}
function startSetup() {
    $andSign = ";";
    if(isWindows()){
        $andSign = "&";
    }
    exec("cd ../ ". $andSign ." php composer.phar install");
    header("Location: /geldvoorelkaar");
}

function isWindows(){
    $isWindows = false;
    $windows = array(
       'Windows 10',
       'Windows 8.1',
       'Windows 8',
       'Windows 7',
       'Windows Vista',
       'Windows Server 2003/XP x64',
       'Windows XP',
       'Windows XP',
       'Windows 2000',
       'Windows ME',
       'Windows 98',
       'Windows 95',
       'Windows 3.11'
    );
    if(in_array(getOS(),$windows)){
        $isWindows = true;
    }
    return $isWindows;
}
?>

<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.0/js/materialize.min.js"></script>
        <link href="/geldvoorelkaar/css/style.css" rel="stylesheet">
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
                <p><?php
                    $andSign = ";";
                    if(isWindows()){
                        $andSign = "&";
                    }
                    $output = shell_exec('cd ../ '. $andSign .' php composer.phar show -s');
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
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.0/js/materialize.min.js"></script>
        </main>
        <footer class="page-footer blue darken-2">
            <div class="footer-copyright">
                <div class="container">
                    <span class="left">&copy; 2015 IJsbrand van Prattenburg</span>

                    <div class="right" style="margin-top:10px;">
                    <a class="github-button" href="https://github.com/iceburg1991/geldvoorelkaar" data-icon="octicon-eye"
                       data-style="mega" data-count-href="/iceburg1991/geldvoorelkaar/watchers"
                       data-count-api="/repos/iceburg1991/geldvoorelkaar#subscribers_count" data-count-aria-label="# watchers on GitHub"
                       aria-label="Watch iceburg1991/geldvoorelkaar on GitHub">Volg mij op GitHub</a>
                    </div>
                    <!--<a class="grey-text text-lighten-4 left" href="https://plus.google.com/u/0/+ijsbrandvanprattenburg/posts/p/pub">GitHub+</a>-->
                </div>
            </div>
            <!-- Place this tag right after the last button or just before your close body tag. -->
            <script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
        </footer>
    </body>
</html>