<?php
require_once('./db.php');
require_once('./Room.php');

Room::setConnection($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photo = $_POST['photo'];
    $room_number = $_POST['room_number'];
    $bed_type = $_POST['bed_type'];
    $rate = $_POST['rate'];
    $offer_price = $_POST['offer_price'];
    $status = $_POST['status'];

    $roomData = [
        "photo" => htmlspecialchars($photo),
        "room_number" => htmlspecialchars($room_number),
        "bed_type" => htmlspecialchars($bed_type),
        "rate" => intval($rate),
        "offer_price" => intval($offer_price),
        "status" => htmlspecialchars($status),
    ];

    $new_room_id = Room::insertRoom($roomData);
    header("Location: index6.php?id=$new_room_id");
    exit;
}

$conn->close();
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