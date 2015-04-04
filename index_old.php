<?php
include "IndexController.php";
$controller = new IndexController();
?>

<html>
    <head>
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="geldvoorelkaar" >
            <h1>Verwerkte data</h1>
            <div class="project_table_container"></div> 
            
            <div id="file_upload">
                <?php 
                    echo file_get_contents('./file_upload/index.php',FILE_USE_INCLUDE_PATH);
                ?>
            </div>
        </div>
    </body>
</html>

<script>
    $(document).ready(
        function(){
            $('.project_table_container').load("_project_table.php");
        }
    );
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>