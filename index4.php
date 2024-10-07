<?php
$data = file_get_contents("ApiData.json");
$json = json_decode($data, true);

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "Put an ID.";
    exit;
}
$rooms = $json['rooms'];
if (isset($rooms) && is_array($rooms)) {
    foreach ($rooms as $room) {
        if ($room['RoomID'] == $id) {
            $foundRoom = $room;
            break;
        }
    }
}
?>

<ol>
    <?php
    echo "<li>";
    echo "Type: " . htmlspecialchars($foundRoom['BedType']) . "<br>";
    echo "Number: " . htmlspecialchars($foundRoom['RoomNumber']) . "<br>";
    echo "price: " . htmlspecialchars($foundRoom['Rate']) . "<br>";
    echo "Discount: " . htmlspecialchars($foundRoom['OfferPrice']) . "<br>";
    echo "</li>";
    ?>
</ol>