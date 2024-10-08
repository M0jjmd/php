<?php
$rooms = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photo = $_POST['photo'];
    $room_number = $_POST['room_number'];
    $bed_type = $_POST['bed_type'];
    $rate = $_POST['rate'];
    $offer_price = $_POST['offer_price'];
    $status = $_POST['status'];

    $photo = htmlspecialchars($photo);
    $room_number = htmlspecialchars($room_number);
    $bed_type = htmlspecialchars($bed_type);
    $rate = intval($rate);
    $offer_price = intval($offer_price);
    $status = htmlspecialchars($status);

    $rooms[] = [
        'photo' => $photo,
        'room_number' => $room_number,
        'bed_type' => $bed_type,
        'rate' => $rate,
        'offer_price' => $offer_price,
        'status' => $status
    ];
}
?>

<form method="POST" action="">
    <h2>Crear Nueva Habitación</h2>
    <label for="photo">Foto de habitación:</label>
    <input type="text" id="photo" name="photo" required><br>

    <label for="room_number">Número de habitación:</label>
    <input type="text" id="room_number" name="room_number" required><br>

    <label for="bed_type">Tipo de cama:</label>
    <select id="bed_type" name="bed_type" required>
        <option value="Single">Single</option>
        <option value="Double">Double</option>
        <option value="Queen">Queen</option>
        <option value="King">King</option>
    </select><br>

    <label for="rate">Precio normal:</label>
    <input type="number" id="rate" name="rate" step="0.01" required><br>

    <label for="offer_price">Precio de oferta:</label>
    <input type="number" id="offer_price" name="offer_price" step="0.01" required><br>

    <label for="status">Estado:</label>
    <select id="status" name="status" required>
        <option value="available">Disponible</option>
        <option value="booked">Reservado</option>
    </select><br>

    <input type="submit" value="Crear Habitación">
</form>

<h2>Lista de Habitaciones</h2>
<ol>
    <?php
    foreach ($rooms as $room) {
        echo "<li>";
        echo "Foto: " . htmlspecialchars($room['photo']) . "<br>";
        echo "Número de habitación: " . htmlspecialchars($room['room_number']) . "<br>";
        echo "Tipo de cama: " . htmlspecialchars($room['bed_type']) . "<br>";
        echo "Precio normal: $" . number_format($room['rate'], 2) . "<br>";
        echo "Precio de oferta: $" . number_format($room['offer_price'], 2) . "<br>";
        echo "Estado: " . htmlspecialchars($room['status']) . "<br>";
        echo "</li>";
    }
    ?>
</ol>