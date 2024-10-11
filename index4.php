<?php
require_once('./Room.php');
$rooms = Room::getJsonData();

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "Put an ID.";
    exit;
}

$findRoom = null;

foreach ($rooms as $room) {
    if ($room["id"] == $id) {
        $findRoom = $room;
        echo ($room);
    }
}

if ($findRoom == null) {
    echo "No Room.";
}
?>

<ol>
    <?php if ($findRoom != null): ?>
        <li>Type: <?= $room['BedType']; ?> </li>
        <li>Number: <?= $room['RoomNumber']; ?> </li>
        <li>price: <?= $room['Rate']; ?> </li>
        <li>Discount: <?= $room['OfferPrice']; ?> </li>
    <?php endif; ?>
</ol>