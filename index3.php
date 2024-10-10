<?php
require_once('./Room.php');
$rooms = Room::getJsonData();
?>

<ol>
    <?php
    foreach ($rooms as $room) {
        echo "<li>";
        echo "Type: " . htmlspecialchars($room['BedType']) . "<br>";
        echo "Number: " . htmlspecialchars($room['RoomNumber']) . "<br>";
        echo "price: " . htmlspecialchars($room['Rate']) . "<br>";
        echo "Discount: " . htmlspecialchars($room['OfferPrice']) . "<br>";
        echo "</li>";
    }
    ?>
</ol>