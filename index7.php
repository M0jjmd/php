<?php
require_once('./db.php');

$query = "SELECT bed_type, room_number, rate, offer_price FROM rooms";
$result = [];

if (isset($_POST['reset'])) {
    $result = $conn->query($query);
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_id = $_POST['room_id'];
    if (is_numeric($target_id)) {
        $queryID = "SELECT id, bed_type, room_number, rate, offer_price FROM rooms where id = ?";
        $stmt = $conn->prepare($queryID);

        if ($stmt) {
            $stmt->bind_param("i", $target_id);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            echo "Error al preparar la consulta.";
        }
    } else {
        echo "Por favor, ingrese un ID válido.";
    }
} else {
    $result = $conn->query($query);
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
    if ($result->num_rows > 0) {
        while ($room = $result->fetch_assoc()) {
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

    if (isset($stmt)) {
        $stmt->close();
    }

    $conn->close();
    ?>
</ol>