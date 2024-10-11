<?php
require_once('./db.php');
require_once('./Room.php');

Room::setConnection($conn);

$result = Room::getAllRooms();
?>

<ol>
    <?php foreach ($result as $room): ?>
        <li>Type: <?= $room['bed_type']; ?> </li>
        <li>Number: <?= $room['room_number']; ?> </li>
        <li>price: <?= $room['rate']; ?> </li>
        <li>Discount: <?= $room['offer_price']; ?> </li>
    <?php endforeach; ?>
</ol>

<?php $conn->close(); ?>