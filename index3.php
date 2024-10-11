<?php
require_once('./Room.php');
$rooms = Room::getJsonData();
?>

<ol>

    <?php foreach ($rooms as $room): ?>
        <li>Type: <?= $room['BedType']; ?> </li>
        <li>Number: <?= $room['RoomNumber']; ?> </li>
        <li>price: <?= $room['Rate']; ?> </li>
        <li>Discount: <?= $room['OfferPrice']; ?> </li>
    <?php endforeach; ?>

</ol>