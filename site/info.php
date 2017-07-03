<?php

require('php/autoload.php');
require('php/top.php');

$json = file_get_contents('https://api.xively.com/v2/feeds/56185000?key=KqdcJ7M2h2xd9URUn5fPiuGwoSGC8qNiMyPP0DYYhY5sDeUB');
$obj = json_decode($json, true);

?>

<div class="body-content container">

	<h3 class="false-title">Robots <small>- All Events <?php echo $_GET['events']; ?></small></h3>

    <table class="table table-condensed">
        <tr>
            <th>status</th>
            <th>channel</th>
            <th>updated</th>
            <th>min</th>
            <th>max</th>
            <th>current</th>
            <th>symbol</th>
        </tr>
        <tr>
            <td><?php echo $obj['status']; ?></td>
            <td><?php echo $obj['datastreams'][0]['id']; ?></td>
            <td><?php echo $obj['datastreams'][0]['at']; ?></td>
            <td><?php echo $obj['datastreams'][0]['min_value']; ?></td>
            <td><?php echo $obj['datastreams'][0]['max_value']; ?></td>
            <td><?php echo (isset($obj['datastreams'][0]['current_value'])) ? $obj['datastreams'][0]['current_value'] : 0 ?></td>
            <td><?php echo $obj['datastreams'][0]['unit']['symbol']; ?></td>
        </tr>
        <tr class="danger"><td>off</td><td>robot-2</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-3</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-4</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-5</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-6</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-7</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-8</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-9</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-10</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-11</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-12</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-13</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-14</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-15</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-16</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-17</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        <tr class="danger"><td>off</td><td>robot-18</td><td>#</td><td>#</td><td>#</td><td>#</td><td>lm</td></tr>
        
    </table>
	

</div>

<?php

//var_dump($obj);

require('php/bottom.php');
?>