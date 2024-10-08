<?php
require_once('./db.php');

$query = "SELECT * FROM rooms";
$result = $conn->query($query);

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "Put an ID.";
    exit;
}
?>

<ol>
    <?php
    if ($result->num_rows > 0) {
        while ($room = $result->fetch_assoc()) {
            if ($room["id"] == $id) {
                echo "<li>";
                echo "Type: " . htmlspecialchars($room['bed_type']) . "<br>";
                echo "Number: " . htmlspecialchars($room['room_number']) . "<br>";
                echo "price: " . htmlspecialchars($room['rate']) . "<br>";
                echo "Discount: " . htmlspecialchars($room['offer_price']) . "<br>";
                echo "</li>";
            }
        }
    }

    $conn->close();
    ?>
</ol>