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
    <?php
    if (count($result) > 0) {
        foreach ($result as $room) {
            echo "<li>";
            echo "Type: " . htmlspecialchars($room['bed_type']) . "<br>";
            echo "Number: " . htmlspecialchars($room['room_number']) . "<br>";
            echo "price: " . htmlspecialchars($room['rate']) . "<br>";
            echo "Discount: " . htmlspecialchars($room['offer_price']) . "<br>";
            echo "</li>";
        }
    }
    ?>
</ol>

<?php
$conn->close();
?>