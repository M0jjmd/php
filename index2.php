<?php
require_once('./Room.php');
$rooms = Room::getJsonData();
?>

<pre>
    <?php print_r($rooms); ?>
</pre>