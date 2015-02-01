<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

<div class="wrapper" style="width:75%;margin:auto;">
    <h1 style="text-align:center;">Verwerkte data</h1>
    <table class="table table-hover table-curved project_table" style="margin-left:10px;">
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
            <tr class="project">
                <td>1639</td>
                <td>Bakkerij gebakken goud</td>
                <td><?php echo "&euro; " . 100 ?></td>
                <td><?php echo '&euro; ' . 10 ?></td>
                <td id="project_profit_1"><?php echo '&euro; ' . -900 ?> </td>
                <td class="project_detail"><button type="button" class="btn btn-info">+</button>
                <td class="investment" style="display:none;"><?php echo 1000; ?></td> 
            </tr>
            <tr class="project_detail_first_row">
                <td class="first_cell first">Looptijd: </td>
                <td><?php echo 36 ?></td>
                <td><?php echo "Risico: " . 3 ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="project_detail_row">
                <td class="first_cell">Investering: </td>
                <td><?php echo '&euro; ' . 1000 ?></td>
                <td><?php echo "Graydon: " . 'AA' ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="project_detail_row">
                <td class="first_cell">Rente: </td>
                <td>8%</td>
                <td><?php echo "Nog te ontvangen: " . '&euro; ' . 900 ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            
            
            <tr class="project">
                <td>1704</td>
                <td>Zonnestudio Bruin de Beer</td>
                <td><?php echo "&euro; " . 1200 ?></td>
                <td><?php echo '&euro; ' . 30 ?></td>
                <td id="project_profit_2"><?php echo '&euro; ' . 200 ?> </td>
                <td class="project_detail"><button type="button" class="btn btn-info">+</button>
                <td class="investment" style="display:none;"><?php echo 1000; ?></td> 
            </tr>
            <tr class="project_detail_first_row">
                <td class="first_cell first">Looptijd: </td>
                <td><?php echo 24 ?></td>
                <td><?php echo "Risico: " . 2 ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="project_detail_row">
                <td class="first_cell">Investering: </td>
                <td><?php echo '&euro; ' . 1000 ?></td>
                <td><?php echo "Graydon: " . 'BB' ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="project_detail_row">
                <td class="first_cell">Rente: </td>
                <td>8%</td>
                <td><?php echo "Nog te ontvangen: " . '&euro; ' . 900 ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="project">
                <td><strong>Totaal</strong></td>
                <td></td>
                <td><strong>&euro; <?php echo 1300 ?></strong></td>
                <td><strong>&euro; <?php echo 40 ?></strong></td>
                <td id="project_profit_3"><strong>&euro; <?php echo -700 ?></strong></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>


<script>
$('.project').click(function(){
    $(this).find('button').text(function(_, value){return value=='+'?'-':'+'});
    if( $(this).nextUntil('tr.project').css( "display" ) == "none"){
        $(this).nextUntil('tr.project').show("slow");
    }
    else{
        $(this).nextUntil('tr.project').hide("fast");
    }
});
</script>
<script>
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