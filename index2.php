<?php
$data = file_get_contents("ApiData.json");
$json = json_decode($data, true);
$rooms = $json['rooms']
?>

<pre>
    <?php print_r($rooms); ?>
</pre>