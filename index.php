<?php
include "CsvImporter.php";

$importer = new CsvImporter("Betaalschema.csv",';'); 
$data = $importer->csv_to_array(); 
?>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div class="geldvoorelkaar" >
    <h1>Verwerkte data</h1>
    <table class="table table-hover table-curved project_table">
        <thead>
            <tr class="info">
                <th>ID</th>
                <th>Project naam:</th>
                <th>Ontvangen rente en aflossing</th>
                <th>Bedrag per maand</th>
                <th>Winst</th>
                <th>Meer</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total_received_interest = 0;
            $total_received_redemption = 0;
            $total_interest_monthly = 0;
            $total_profit = 0;
            $row_id = 1;
            foreach($data as $project){
                    $received_interest   = (float)preg_replace('/[^A-Za-z0-9\-.]/', '', str_replace(",", ".", $project['Ontvangen rente'])); 
                    $received_redemption = (float)preg_replace('/[^A-Za-z0-9\-.]/', '', str_replace(",", ".", $project['Ontvangen aflossing'])); 
                    $not_received_interest = (float)preg_replace('/[^A-Za-z0-9\-.]/', '', str_replace(",", ".", $project['Nog te ontvangen rente']));
                    $not_received_redemption = (float)preg_replace('/[^A-Za-z0-9\-.]/', '', str_replace(",", ".", $project['Nog te ontvangen aflossing']));
                    $total_received_interest += $received_interest; 
                    $total_received_redemption += $received_redemption; 
                    $interest_yearly_percentage = str_replace("%", "",str_replace(",", ".", $project['Rente']));
                    $interest_monthly_percentage = pow(1 + ($interest_yearly_percentage/100), 1/12) -1;
                    $investment =preg_replace('/[^A-Za-z0-9\-.,]/', '',$project['Investering'] );
                    $interest_montly = round(($interest_monthly_percentage/(1-pow((1+$interest_monthly_percentage),-$project['Looptijd'])))*str_replace(",",".",str_replace(".","",$investment)), 2);
                    $total_interest_monthly += $interest_montly;
                    $profit = $received_interest  + $received_redemption - str_replace(".","",$investment);
                    $total_profit += $profit;
                ?>
                <tr class="project">
                    <td><?php echo $project['Project'] ?></td>
                    <td><?php echo $project['Projectnaam'] ?></td>
                    <td><?php echo "&euro; " . str_replace(".",",",($received_interest  + $received_redemption ))?></td>
                    <td><?php echo '&euro; ' . $interest_montly ?></td>
                    <td id="project_profit_<?php echo $row_id ?>"><?php echo '&euro; ' . $profit ?> </td>
                    <td class="project_detail"><button type="button" class="btn btn-info">+</button>
                    <td class="investment" style="display:none;"><?php echo $investment; ?></td> 
                </tr>
                <tr class="project_detail_first_row">
                    <td class="first_cell first">Looptijd: </td>
                    <td><?php echo $project['Looptijd'] ?></td>
                    <td><?php echo "Risico: " . $project['Risico classificatie'] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="project_detail_row">
                    <td class="first_cell">Investering: </td>
                    <td><?php echo $project['Investering'] ?></td>
                    <td><?php echo "Graydon: " . $project['Graydon rating'] ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="project_detail_row">
                    <td class="first_cell">Rente: </td>
                    <td><?php echo $project['Rente'] ?></td>
                    <td><?php echo "Nog te ontvangen: " . '&euro; ' . str_replace(".",",",($not_received_interest + $not_received_redemption))?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        </tbody>
        <?php $row_id++; } ?>
        <tfoot>
            <tr class="project">
                <td><strong>Totaal</strong></td>
                <td></td>
                <td><strong>&euro; <?php echo $total_received_interest + $total_received_redemption; ?></strong></td>
                <td><strong>&euro; <?php echo $total_interest_monthly?></strong></td>
                <td id="project_profit_<?php echo $row_id ?>"><strong>&euro; <?php echo $total_profit ?></strong></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    
    <div id="file_upload">
        <?php 
            echo file_get_contents('./file_upload/index.php',FILE_USE_INCLUDE_PATH);
        ?>
    </div>
</div>

<div class="csv_data" style="border:1px solid;">
    <h1 style="text-align:center;">Raw data</h1>
    <?php 
        echo '<pre>';
        var_dump($data[1]); 
        echo '</pre>';
    ?>
</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>


<script>
//  show and hides the project details
$('.project').click(function(){
    $(this).find('button').text(function(_, value){return value=='+'?'-':'+'});
    if( $(this).nextUntil('tr.project').css( "display" ) == "none"){
        $(this).nextUntil('tr.project').show(1200);
    }
    else{
        $(this).nextUntil('tr.project').hide(750);
    }
});
</script>
<script>
// Fill the profit column with the correct color
$(document).ready(function(){
    for(var i = 1; i < 25; ++i)
    {
        var elem = document.getElementById("project_profit_" + i);
        if ($(elem).text().indexOf('-') === -1){
            $(elem).css("background-color", "#7AFA73"); //green 
        }
        else{
            $(elem).css("background-color", "FC7C7C"); //red
        }
    }
});
</script>
