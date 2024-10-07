<?php
$data = file_get_contents("ApiData.json");
$json = json_decode($data, true);
?>

<ol>
    <?php
    $rooms = $json['rooms'];
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