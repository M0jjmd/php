<?php
require_once('./db.php');
require_once('./Room.php');

Room::setConnection($conn);

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "Put an ID.";
    exit;
}

$result = Room::getSingleRoom($id);

if (empty($result)) {
    echo "No se encontró ninguna habitación con el ID proporcionado.";
    exit;
}
?>

<ol>
    <?php if (count($result) > 0): ?>
        <?php foreach ($result as $room): ?>
            <li>Type: <?= $room['bed_type']; ?> </li>
            <li>Number: <?= $room['room_number']; ?> </li>
            <li>price: <?= $room['rate']; ?> </li>
            <li>Discount: <?= $room['offer_price']; ?> </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ol>

<?php
$conn->close();
?>