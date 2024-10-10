<?php
require_once('./db.php');
require_once('./Room.php');

Room::setConnection($conn);

$result = Room::getAllRooms();
?>

<ol>
    <?php
    foreach ($result as $room) {
        echo "<li>";
        echo "Type: " . htmlspecialchars($room['bed_type']) . "<br>";
        echo "Number: " . htmlspecialchars($room['room_number']) . "<br>";
        echo "price: " . htmlspecialchars($room['rate']) . "<br>";
        echo "Discount: " . htmlspecialchars($room['offer_price']) . "<br>";
        echo "</li>";
    }

    $conn->close();
    ?>
</ol>