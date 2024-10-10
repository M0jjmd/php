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
    <?php
    if ($findRoom != null) {
        echo "<li>";
        echo "Type: " . htmlspecialchars($findRoom['BedType']) . "<br>";
        echo "Number: " . htmlspecialchars($findRoom['RoomNumber']) . "<br>";
        echo "price: " . htmlspecialchars($findRoom['Rate']) . "<br>";
        echo "Discount: " . htmlspecialchars($findRoom['OfferPrice']) . "<br>";
        echo "</li>";
    }
    ?>
</ol>