<?php
require_once('./db.php');
require_once('./Room.php');

Room::setConnection($conn);

$result = [];

if (isset($_POST['reset'])) {
    $result = Room::getAllRooms();
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_id = $_POST['room_id'];
    if (is_numeric($target_id)) {
        $result = Room::getSingleRoom($target_id);
    } else {
        echo "Por favor, ingrese un ID válido.";
    }
} else {
    $result = Room::getAllRooms();
}
?>

<form method="POST" action="">
    <label for="room_id">Ingrese el ID de la habitación:</label>
    <input type="text" id="room_id" name="room_id">
    <input type="submit" value="Buscar">
    <button type="submit" name="reset">Ver todas las habitaciones</button>
</form>

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
    } else {
        echo "No available rooms";
    }

    $conn->close();
    ?>
</ol>